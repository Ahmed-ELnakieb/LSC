<?php

/**
 * [Eergx_Admin description]
 */
if (!class_exists('Eergx_Admin')) {
    class Eergx_Admin{

        private static $instance = null;

        /**
         * register instance
         *
         * @return void
         */
        public static function init(){
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * init Construct
         */
        public function __construct(){
            add_action('init', [$this, 'eergx_tgm_dashboard'], 1);
            add_action('admin_menu', [$this, 'Eergx_Admin_dashboard'], 1);
            add_action('admin_menu', [$this, 'eergx_template_dashboard'], 20);
            add_action('ocdi/plugin_page_setup', [$this, 'eergx_import_dsb'], 20);
            add_action('admin_enqueue_scripts', array($this, 'eergx_admin_enqueue_scripts'));
        }

        /**
         * Admin Dashboard
         *
         * @return void
         */
        public function Eergx_Admin_dashboard(){
            add_menu_page(
                esc_html__('Elnakieb', 'eergx'),
                esc_html__('Elnakieb', 'eergx'),
                'manage_options',
                'eergx',
                [$this, 'display_eergx_admin_dashboard'],
                get_template_directory_uri() . '/inc/admin/assets/img/favicon.png',
                2
            );


        }

        /**
         * Template Dashboard
         *
         * @return void
         */
        public function eergx_template_dashboard() {
            add_submenu_page(
                'eergx',
                esc_html__('Templates', 'eergx'),
                esc_html__('Templates', 'eergx'),
                'manage_options',
                'edit.php?post_type=eergx_template',
                false
            );
        }

        /**
         * admin style Add
         */
        public function eergx_admin_enqueue_scripts()
        {
            wp_enqueue_style('eergx-admin', get_theme_file_uri('inc/admin/assets/css/admin.css'), array(), null, 'all');
        }

        public function display_eergx_admin_dashboard()
        {
            require_once EERGX_INC_DRI . 'admin/admin-page.php';
        }

        public function eergx_tgm_dashboard()
        {
            require_once EERGX_INC_DRI . 'admin/class-tgm-plugin-activation.php';
            require_once EERGX_INC_DRI . 'admin/plugin-activation.php';
        }

        public function eergx_import_dsb($default)
        {
            $default['parent_slug'] = 'eergx';
            $default['page_title'] = esc_html__('One Click Demo Import', 'eergx');
            $default['menu_title'] = esc_html__('Import Demo Data', 'eergx');
            $default['capability'] = 'import';
            $default['menu_slug'] = 'one-click-demo-import';

            return $default;
        }
    }
    Eergx_Admin::init();
}
