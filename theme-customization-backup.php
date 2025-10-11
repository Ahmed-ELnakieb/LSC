<?php
/**
 * Theme Customization Backup Script
 *
 * This script creates backups of your theme customizations and helps
 * restore them if they get overwritten by theme updates.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

class Theme_Customization_Backup {

    private $theme_name = 'eergx';
    private $backup_dir;

    public function __construct() {
        $this->backup_dir = WP_CONTENT_DIR . '/theme-backups/' . $this->theme_name;
        add_action('admin_menu', array($this, 'add_backup_menu'));
        add_action('admin_init', array($this, 'handle_backup_actions'));
    }

    public function add_backup_menu() {
        add_management_page(
            'Theme Backup Manager',
            'Theme Backup Manager',
            'manage_options',
            'theme-backup-manager',
            array($this, 'backup_admin_page')
        );
    }

    public function backup_admin_page() {
        ?>
        <div class="wrap">
            <h1>Theme Customization Backup Manager</h1>
            <p>This tool helps you backup and restore your theme customizations.</p>

            <?php $this->display_backup_status(); ?>
            <?php $this->display_backup_actions(); ?>
            <?php $this->display_restore_options(); ?>
        </div>
        <?php
    }

    private function display_backup_status() {
        $backups = $this->get_available_backups();

        echo '<h2>Backup Status</h2>';
        if (empty($backups)) {
            echo '<p style="color: orange;">No backups found. Create your first backup below.</p>';
        } else {
            echo '<p><strong>Available backups:</strong> ' . count($backups) . '</p>';
            echo '<ul>';
            foreach ($backups as $backup) {
                echo '<li>' . esc_html(basename($backup)) . '</li>';
            }
            echo '</ul>';
        }
    }

    private function display_backup_actions() {
        ?>
        <h2>Create Backup</h2>
        <p>Create a backup of your current theme customizations before making changes.</p>
        <a href="<?php echo admin_url('tools.php?page=theme-backup-manager&action=create_backup&nonce=' . wp_create_nonce('backup_action')); ?>"
           class="button button-primary">Create Backup Now</a>
        <?php
    }

    private function display_restore_options() {
        $backups = $this->get_available_backups();

        if (empty($backups)) {
            return;
        }

        ?>
        <h2>Restore from Backup</h2>
        <p>Select a backup to restore your theme customizations.</p>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php wp_nonce_field('restore_backup_action'); ?>
            <input type="hidden" name="action" value="restore_theme_backup">

            <select name="backup_file" required>
                <option value="">Select a backup to restore...</option>
                <?php foreach ($backups as $backup): ?>
                    <option value="<?php echo esc_attr(basename($backup)); ?>">
                        <?php echo esc_html(basename($backup)); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Restore Selected Backup" class="button button-secondary"
                   onclick="return confirm('Are you sure you want to restore this backup? This will overwrite current customizations.')"
                   style="color: red; border-color: red;">
        </form>
        <?php
    }

    public function handle_backup_actions() {
        if (!isset($_GET['action'], $_GET['nonce'])) {
            return;
        }

        if (!wp_verify_nonce($_GET['nonce'], 'backup_action')) {
            wp_die('Security check failed');
        }

        $action = sanitize_text_field($_GET['action']);

        if ($action === 'create_backup') {
            $result = $this->create_backup();
            $message = $result ? 'Backup created successfully!' : 'Failed to create backup.';

            add_action('admin_notices', function() use ($message) {
                $type = strpos($message, 'Failed') === false ? 'success' : 'error';
                echo '<div class="notice notice-' . $type . ' is-dismissible"><p>' . esc_html($message) . '</p></div>';
            });

            wp_redirect(admin_url('tools.php?page=theme-backup-manager'));
            exit;
        }
    }

    public function create_backup() {
        // Create backup directory
        if (!file_exists($this->backup_dir)) {
            wp_mkdir_p($this->backup_dir);
        }

        $theme_dir = get_theme_root() . '/' . $this->theme_name;
        $backup_name = $this->theme_name . '_backup_' . date('Y-m-d_H-i-s');
        $backup_path = $this->backup_dir . '/' . $backup_name;

        // Files to backup
        $files_to_backup = array(
            'header.php',
            'footer.php',
            'functions.php',
            'style.css',
            'inc/template-tags.php',
            'inc/customizer.php'
        );

        $backed_up_files = array();

        foreach ($files_to_backup as $file) {
            $source_file = $theme_dir . '/' . $file;
            $backup_file = $backup_path . '/' . $file;

            if (file_exists($source_file)) {
                // Create subdirectory structure in backup
                $backup_file_dir = dirname($backup_file);
                if (!file_exists($backup_file_dir)) {
                    wp_mkdir_p($backup_file_dir);
                }

                if (copy($source_file, $backup_file)) {
                    $backed_up_files[] = $file;
                }
            }
        }

        // Create a manifest file
        $manifest = array(
            'backup_date' => date('Y-m-d H:i:s'),
            'theme_name' => $this->theme_name,
            'backed_up_files' => $backed_up_files,
            'wordpress_version' => get_bloginfo('version')
        );

        file_put_contents($backup_path . '/manifest.json', json_encode($manifest, JSON_PRETTY_PRINT));

        return !empty($backed_up_files);
    }

    private function get_available_backups() {
        if (!file_exists($this->backup_dir)) {
            return array();
        }

        $backups = array();
        $iterator = new DirectoryIterator($this->backup_dir);

        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                $backups[] = $fileinfo->getPathname();
            }
        }

        // Sort by modification time (newest first)
        usort($backups, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return $backups;
    }

    public function restore_backup($backup_name) {
        $backup_path = $this->backup_dir . '/' . $backup_name;
        $theme_dir = get_theme_root() . '/' . $this->theme_name;

        if (!file_exists($backup_path . '/manifest.json')) {
            return false;
        }

        $manifest = json_decode(file_get_contents($backup_path . '/manifest.json'), true);
        $restored_files = array();

        foreach ($manifest['backed_up_files'] as $file) {
            $backup_file = $backup_path . '/' . $file;
            $restore_file = $theme_dir . '/' . $file;

            if (file_exists($backup_file)) {
                // Create directory structure if needed
                $restore_dir = dirname($restore_file);
                if (!file_exists($restore_dir)) {
                    wp_mkdir_p($restore_dir);
                }

                if (copy($backup_file, $restore_file)) {
                    $restored_files[] = $file;
                }
            }
        }

        return $restored_files;
    }
}

// Handle backup restoration
function handle_restore_theme_backup() {
    if (!wp_verify_nonce($_POST['_wpnonce'], 'restore_backup_action')) {
        wp_die('Security check failed');
    }

    $backup_manager = new Theme_Customization_Backup();
    $backup_file = sanitize_text_field($_POST['backup_file']);
    $restored_files = $backup_manager->restore_backup($backup_file);

    if ($restored_files) {
        add_action('admin_notices', function() use ($restored_files, $backup_file) {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p><strong>Backup restored successfully!</strong></p>';
            echo '<p>Restored files: ' . implode(', ', $restored_files) . '</p>';
            echo '<p>From backup: ' . esc_html($backup_file) . '</p>';
            echo '</div>';
        });
    } else {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error is-dismissible"><p>Failed to restore backup.</p></div>';
        });
    }

    wp_redirect(admin_url('tools.php?page=theme-backup-manager'));
    exit;
}
add_action('admin_post_restore_theme_backup', 'handle_restore_theme_backup');

// Initialize the backup manager
new Theme_Customization_Backup();
?>