<?php
/**
 * Eergx Child Theme - Options Framework Integration
 *
 * This file ensures the child theme properly integrates with the parent theme's
 * Codestar Framework options panel and customizer functionality.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

class Eergx_Child_Options_Integration {

    public function __construct() {
        add_action('after_setup_theme', array($this, 'ensure_parent_options_loaded'));
        add_action('init', array($this, 'verify_options_functionality'));
        add_action('admin_enqueue_scripts', array($this, 'fix_admin_scripts'));
    }

    /**
     * Ensure parent theme options are loaded
     */
    public function ensure_parent_options_loaded() {
        // Check if parent theme's options framework is loaded
        if (!function_exists('cs_get_option')) {
            // Force load parent theme's options functions
            $parent_functions = get_template_directory() . '/inc/cs-framework-functions.php';
            if (file_exists($parent_functions)) {
                require_once $parent_functions;
            }
        }

        // Ensure theme options exist in database
        $this->initialize_theme_options();
    }

    /**
     * Initialize theme options if they don't exist
     */
    private function initialize_theme_options() {
        $existing_options = get_option('eergx_theme_options');

        if ($existing_options === false) {
            // Create default options structure
            $default_options = array(
                'eergx_logo' => array(),
                'header_layout' => 'header_1',
                'preloader' => '0',
                'back_to_top' => '0',
            );

            update_option('eergx_theme_options', $default_options);
        }
    }

    /**
     * Verify options functionality
     */
    public function verify_options_functionality() {
        // Test if options functions work
        if (function_exists('cs_get_option')) {
            $test_option = cs_get_option('eergx_logo');
            if ($test_option === null) {
                // Options framework loaded but no options saved
                error_log('Eergx Child Theme: Options framework loaded but no options found');
            }
        } else {
            error_log('Eergx Child Theme: Options framework not loaded');
        }
    }

    /**
     * Fix admin scripts for options panel
     */
    public function fix_admin_scripts($hook) {
        // Only load on theme options pages
        if ($hook === 'toplevel_page_eergx' || $hook === 'eergx_page_eergx_theme_options') {
            // Ensure parent theme's admin scripts are loaded
            $parent_admin_css = get_template_directory_uri() . '/inc/cs-framework/assets/css/style.css';
            $parent_admin_js = get_template_directory_uri() . '/inc/cs-framework/assets/js/main.js';

            wp_enqueue_style('eergx-parent-admin', $parent_admin_css, array(), '1.0.0');
            wp_enqueue_script('eergx-parent-admin-js', $parent_admin_js, array('jquery'), '1.0.0', true);
        }
    }

    /**
     * Debug function to check options status
     */
    public static function debug_options_status() {
        if (!current_user_can('manage_options')) {
            return;
        }

        echo '<!-- Eergx Child Theme Options Debug -->';
        echo '<div style="background: #f1f1f1; padding: 10px; margin: 10px; border: 1px solid #ddd; font-family: monospace; font-size: 12px;">';

        echo '<h4>Options Framework Status:</h4>';
        echo 'cs_get_option function exists: ' . (function_exists('cs_get_option') ? 'YES' : 'NO') . '<br>';

        if (function_exists('cs_get_option')) {
            $logo_option = cs_get_option('eergx_logo');
            echo 'Logo option value: ' . (is_array($logo_option) ? 'Array (set)' : 'Not set') . '<br>';

            $header_layout = cs_get_option('header_layout');
            echo 'Header layout: ' . ($header_layout ? $header_layout : 'Not set') . '<br>';
        }

        $raw_options = get_option('eergx_theme_options');
        echo 'Raw options in database: ' . ($raw_options ? 'YES' : 'NO') . '<br>';

        if ($raw_options) {
            echo 'Number of options: ' . count($raw_options) . '<br>';
        }

        echo '</div>';
        echo '<!-- End Debug -->';
    }
}

// Initialize the options integration
new Eergx_Child_Options_Integration();

// Add debug info to admin footer (only for admins)
if (current_user_can('manage_options') && isset($_GET['debug_options'])) {
    add_action('admin_footer', array('Eergx_Child_Options_Integration', 'debug_options_status'));
}

/**
 * Enhanced options functions for child theme
 */
function eergx_child_get_option($option = '', $default = null) {
    // Ensure options framework is loaded
    if (!function_exists('cs_get_option')) {
        $parent_functions = get_template_directory() . '/inc/cs-framework-functions.php';
        if (file_exists($parent_functions)) {
            require_once $parent_functions;
        }
    }

    return cs_get_option($option, $default);
}

/**
 * Test function to verify options are working
 */
function eergx_test_options_panel() {
    if (!current_user_can('manage_options')) {
        return false;
    }

    // Test saving an option
    $test_options = get_option('eergx_theme_options', array());

    if (empty($test_options)) {
        // Initialize with defaults
        $test_options = array(
            'header_layout' => 'header_1',
            'preloader' => '0',
        );
        update_option('eergx_theme_options', $test_options);
    }

    return true;
}
?>