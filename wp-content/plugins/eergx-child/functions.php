<?php
/**
 * Eergx Child Theme Functions
 *
 * This file contains custom functions and modifications for the Eergx child theme.
 * All customizations should be made here instead of modifying the parent theme files.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit('Direct access denied.');
}

class Eergx_Child_Theme {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_child_styles'), 99);
        add_action('after_setup_theme', array($this, 'child_theme_setup'));
        add_action('init', array($this, 'prevent_parent_theme_updates'));
    }

    /**
     * Enqueue child theme styles
     */
    public function enqueue_child_styles() {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }

    /**
     * Child theme setup
     */
    public function child_theme_setup() {
        // Add child theme text domain
        load_child_theme_textdomain('eergx-child', get_stylesheet_directory() . '/languages');

        // Enable additional theme features if needed
        // add_theme_support('custom-logo');
        // add_theme_support('custom-header');
    }

    /**
     * Prevent parent theme updates from overwriting customizations
     * This adds an extra layer of protection
     */
    public function prevent_parent_theme_updates() {
        // Add filter to prevent auto-updates for parent theme
        add_filter('auto_update_theme', array($this, 'disable_parent_theme_auto_update'), 10, 2);
    }

    /**
     * Disable auto-updates for the parent theme
     */
    public function disable_parent_theme_auto_update($update, $item) {
        // Disable auto-updates for the eergx parent theme
        if ($item->stylesheet === 'eergx') {
            return false;
        }
        return $update;
    }

    /**
     * Backup reminder function
     * Call this function to create backups of your custom files
     */
    public static function create_customization_backup() {
        $backup_dir = get_stylesheet_directory() . '/backup';
        $custom_files = array(
            'style.css',
            'functions.php',
            'header.php',
            'footer.php'
        );

        // Create backup directory if it doesn't exist
        if (!file_exists($backup_dir)) {
            wp_mkdir_p($backup_dir);
        }

        foreach ($custom_files as $file) {
            $source_file = get_stylesheet_directory() . '/' . $file;
            $backup_file = $backup_dir . '/' . $file . '.' . date('Y-m-d-H-i-s');

            if (file_exists($source_file)) {
                copy($source_file, $backup_file);
            }
        }
    }

    /**
     * Log theme modifications for tracking
     */
    public static function log_modification($file, $description) {
        $log_file = get_stylesheet_directory() . '/modification-log.txt';
        $log_entry = sprintf(
            "[%s] Modified: %s - %s\n",
            date('Y-m-d H:i:s'),
            $file,
            $description
        );

        file_put_contents($log_file, $log_entry, FILE_APPEND);
    }
}

// Initialize the child theme
new Eergx_Child_Theme();

// Include options integration for parent theme compatibility
require_once get_stylesheet_directory() . '/options-integration.php';

// Include plugin integration for eergx-plugin compatibility
require_once get_stylesheet_directory() . '/plugin-integration.php';

// Helper functions for theme customization
function eergx_child_backup() {
    Eergx_Child_Theme::create_customization_backup();
}

function eergx_child_log($file, $description) {
    Eergx_Child_Theme::log_modification($file, $description);
}

/**
 * Custom functions and modifications go here
 * Example:
 *
 * function custom_excerpt_length($length) {
 *     return 30; // Custom excerpt length
 * }
 * add_filter('excerpt_length', 'custom_excerpt_length');
 *
 * function custom_excerpt_more($more) {
 *     return '...'; // Custom excerpt more text
 * }
 * add_filter('excerpt_more', 'custom_excerpt_more');
 */
?>