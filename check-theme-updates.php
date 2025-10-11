<?php
/**
 * WordPress Theme Auto-Update Checker and Disabler
 *
 * This script checks if your theme is set for auto-updates and helps disable it
 * to prevent customizations from being overwritten.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

class Theme_Update_Checker {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'handle_theme_update_actions'));
    }

    public function add_admin_menu() {
        add_management_page(
            'Theme Update Manager',
            'Theme Update Manager',
            'manage_options',
            'theme-update-manager',
            array($this, 'admin_page')
        );
    }

    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Theme Update Manager</h1>
            <p>This tool helps you manage theme auto-updates to prevent customizations from being overwritten.</p>

            <?php $this->display_current_settings(); ?>
            <?php $this->display_theme_actions(); ?>
        </div>
        <?php
    }

    private function display_current_settings() {
        $auto_updates = get_site_option('auto_update_themes', array());
        $themes = wp_get_themes();

        echo '<h2>Current Auto-Update Settings</h2>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Theme</th><th>Auto-Update Status</th><th>Actions</th></tr></thead>';
        echo '<tbody>';

        foreach ($themes as $theme_slug => $theme) {
            $is_auto_update = in_array($theme_slug, $auto_updates);
            $status = $is_auto_update ? '<span style="color: red;">Enabled</span>' : '<span style="color: green;">Disabled</span>';
            $action = $is_auto_update ? 'disable' : 'enable';

            echo '<tr>';
            echo '<td><strong>' . esc_html($theme->get('Name')) . '</strong><br><em>' . esc_html($theme_slug) . '</em></td>';
            echo '<td>' . $status . '</td>';
            echo '<td>';
            echo '<a href="' . admin_url('tools.php?page=theme-update-manager&action=' . $action . '&theme=' . $theme_slug . '&nonce=' . wp_create_nonce('theme_update_action')) . '"
                   class="button button-' . ($is_auto_update ? 'secondary' : 'primary') . '">';
            echo $is_auto_update ? 'Disable Auto-Update' : 'Enable Auto-Update';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }

    private function display_theme_actions() {
        ?>
        <h2>Additional Protection</h2>
        <p><strong>Recommended:</strong> Create a child theme for your customizations instead of modifying the parent theme directly.</p>

        <div style="margin: 20px 0; padding: 15px; background: #fff; border: 1px solid #ddd;">
            <h3>Prevention Tips:</h3>
            <ul>
                <li><strong>Use a child theme</strong> for all customizations</li>
                <li><strong>Disable auto-updates</strong> for themes you've customized</li>
                <li><strong>Keep regular backups</strong> of your custom files</li>
                <li><strong>Document your changes</strong> for easier restoration</li>
            </ul>
        </div>

        <h3>WordPress Constants (Add to wp-config.php)</h3>
        <p>Add these constants to your wp-config.php file for additional protection:</p>
        <code style="display: block; background: #f4f4f4; padding: 10px; margin: 10px 0;">
            // Disable automatic theme updates<br>
            define('AUTOMATIC_UPDATER_DISABLED', true);<br><br>
            // Or disable only theme updates<br>
            define('WP_AUTO_UPDATE_CORE', 'minor'); // Updates core only
        </code>
        <?php
    }

    public function handle_theme_update_actions() {
        if (!isset($_GET['action'], $_GET['theme'], $_GET['nonce'])) {
            return;
        }

        if (!wp_verify_nonce($_GET['nonce'], 'theme_update_action')) {
            wp_die('Security check failed');
        }

        $action = sanitize_text_field($_GET['action']);
        $theme = sanitize_text_field($_GET['theme']);
        $auto_updates = get_site_option('auto_update_themes', array());

        if ($action === 'disable') {
            $auto_updates = array_diff($auto_updates, array($theme));
            update_site_option('auto_update_themes', $auto_updates);
            $message = 'Auto-updates disabled for theme: ' . $theme;
        } elseif ($action === 'enable') {
            if (!in_array($theme, $auto_updates)) {
                $auto_updates[] = $theme;
                update_site_option('auto_update_themes', $auto_updates);
            }
            $message = 'Auto-updates enabled for theme: ' . $theme;
        }

        add_action('admin_notices', function() use ($message) {
            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($message) . '</p></div>';
        });

        wp_redirect(admin_url('tools.php?page=theme-update-manager'));
        exit;
    }
}

// Initialize the checker
new Theme_Update_Checker();
?>