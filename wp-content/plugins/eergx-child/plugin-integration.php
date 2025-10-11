<?php
/**
 * Eergx Child Theme - Plugin Integration
 *
 * This file ensures the child theme properly integrates with the eergx-plugin
 * and its Codestar Framework options panel.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

class Eergx_Child_Plugin_Integration {

    public function __construct() {
        add_action('plugins_loaded', array($this, 'ensure_plugin_integration'), 5);
        add_action('admin_init', array($this, 'verify_plugin_options'));
        add_filter('csf_eergx_theme_options_save', array($this, 'enhance_options_save'), 10, 2);
    }

    /**
     * Ensure plugin integration is loaded early
     */
    public function ensure_plugin_integration() {
        // Check if eergx-plugin is active
        if (!is_plugin_active('eergx-plugin/eergx-plugin.php')) {
            add_action('admin_notices', function() {
                echo '<div class="notice notice-error"><p>';
                echo 'The <strong>Eergx Plugin</strong> is required for the theme options panel to work properly. ';
                echo 'Please activate the Eergx Plugin to access "Haptic Options by Raziul".';
                echo '</p></div>';
            });
            return;
        }

        // Force load theme options if not already loaded
        if (class_exists('CSF')) {
            $this->load_theme_options();
        }
    }

    /**
     * Load theme options manually if needed
     */
    private function load_theme_options() {
        $plugin_options_file = WP_PLUGIN_DIR . '/eergx-plugin/inc/options/theme-option.php';

        if (file_exists($plugin_options_file)) {
            // Check if options are already registered
            $options_exist = false;

            if (isset(CSF::$args['admin_options']['eergx_theme_options'])) {
                $options_exist = true;
            }

            // Only include if not already loaded
            if (!$options_exist) {
                include_once $plugin_options_file;
            }
        }
    }

    /**
     * Verify plugin options are working
     */
    public function verify_plugin_options() {
        if (!is_admin()) {
            return;
        }

        // Check if we're on the theme options page
        $current_screen = get_current_screen();
        if ($current_screen && $current_screen->id === 'toplevel_page_eergx-theme-option') {

            // Test if options can be saved
            if (isset($_POST['action']) && $_POST['action'] === 'csf_eergx_theme_options_save') {
                add_action('admin_notices', function() {
                    echo '<div class="notice notice-success"><p>';
                    echo 'Theme options are working correctly!';
                    echo '</p></div>';
                });
            }
        }
    }

    /**
     * Enhance options save process
     */
    public function enhance_options_save($request, $options) {
        // Ensure options are saved properly
        if (!empty($options)) {
            update_option('eergx_theme_options', $options);
        }

        return $request;
    }

    /**
     * Debug function to check plugin status
     */
    public static function debug_plugin_status() {
        if (!current_user_can('manage_options')) {
            return;
        }

        echo '<!-- Eergx Child Theme Plugin Integration Debug -->';
        echo '<div style="background: #f9f9f9; padding: 10px; margin: 10px; border: 1px solid #ddd; font-family: monospace; font-size: 12px;">';

        echo '<h4>Plugin Integration Status:</h4>';

        // Check if plugin is active
        $plugin_active = is_plugin_active('eergx-plugin/eergx-plugin.php');
        echo 'Eergx Plugin Active: ' . ($plugin_active ? 'YES' : 'NO') . '<br>';

        // Check if CSF class exists
        $csf_exists = class_exists('CSF');
        echo 'Codestar Framework Available: ' . ($csf_exists ? 'YES' : 'NO') . '<br>';

        // Check if options are registered
        $options_registered = isset(CSF::$args['admin_options']['eergx_theme_options']);
        echo 'Theme Options Registered: ' . ($options_registered ? 'YES' : 'NO') . '<br>';

        // Check current options
        $current_options = get_option('eergx_theme_options');
        echo 'Current Options in DB: ' . ($current_options ? 'YES (' . count($current_options) . ' options)' : 'NO') . '<br>';

        if ($current_options) {
            echo 'Sample Options: ';
            $samples = array_slice($current_options, 0, 3, true);
            foreach ($samples as $key => $value) {
                echo $key . ' => ' . (is_array($value) ? 'Array' : (strlen($value) > 50 ? substr($value, 0, 50) . '...' : $value)) . ', ';
            }
            echo '<br>';
        }

        echo '</div>';
        echo '<!-- End Debug -->';
    }
}

// Initialize the plugin integration
new Eergx_Child_Plugin_Integration();

// Add debug info to admin footer (only for admins)
if (current_user_can('manage_options') && isset($_GET['debug_plugin'])) {
    add_action('admin_footer', array('Eergx_Child_Plugin_Integration', 'debug_plugin_status'));
}

/**
 * Enhanced options functions that work with the plugin
 */
function eergx_child_plugin_get_option($option = '', $default = null) {
    // Ensure plugin is loaded
    if (!class_exists('CSF')) {
        return $default;
    }

    // Use CSF function if available
    if (function_exists('cs_get_option')) {
        return cs_get_option($option, $default);
    }

    // Fallback to direct database access
    $options = get_option('eergx_theme_options');
    return (isset($options[$option])) ? $options[$option] : $default;
}

/**
 * Force reload theme options
 */
function eergx_child_reload_theme_options() {
    if (current_user_can('manage_options') && isset($_GET['reload_options'])) {
        // Clear any cached options
        delete_option('eergx_theme_options');

        // Force reload the options file
        $plugin_integration = new Eergx_Child_Plugin_Integration();
        $plugin_integration->load_theme_options();

        add_action('admin_notices', function() {
            echo '<div class="notice notice-success"><p>Theme options reloaded successfully!</p></div>';
        });

        wp_redirect(admin_url('admin.php?page=eergx-theme-option'));
        exit;
    }
}
add_action('admin_init', 'eergx_child_reload_theme_options');

/**
 * Enhanced options save function
 */
function eergx_child_save_options($options) {
    // Ensure options are saved to the correct location
    if (!empty($options)) {
        update_option('eergx_theme_options', $options);

        // Add a success message
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>';
            echo 'Theme options saved successfully!';
            echo '</p></div>';
        });
    }

    return $options;
}
add_filter('csf_eergx_theme_options_save_before', 'eergx_child_save_options');
?>