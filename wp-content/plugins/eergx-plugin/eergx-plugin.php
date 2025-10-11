<?php
/*
Plugin Name: Eergx Plugin
Plugin URI: https://themeforest.net/user/themexriver
Description: After install the eergx WordPress Theme, you must need to install this "eergx-plugin" first to get all functions of eergx WP Theme.
Author: Raziul Islam
Author URI: http://themexriver.com/
Version: 1.0.0
Text Domain: eergx-plugin
*/
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Define Core Path
 */
define( 'EERGX_VERSION', '1.0.0' );
define( 'EERGX_DIR_PATH',plugin_dir_path(__FILE__) );
define( 'EERGX_DIR_URL',plugin_dir_url(__FILE__) );
define( 'EERGX_INC_PATH', EERGX_DIR_PATH . '/inc' );
define( 'EERGX_PLUGIN_IMG_PATH', EERGX_DIR_URL . '/assets/img' );

/**
 * Css Framework Load
 */
if ( file_exists(EERGX_DIR_PATH.'/lib/codestar-framework/codestar-framework.php') ) {
    require_once  EERGX_DIR_PATH.'/lib/codestar-framework/codestar-framework.php';
}

/**
 *  Elementor - Remove Font Awesome 
 */
add_action( 'elementor/frontend/after_register_styles',function() {
    foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
      wp_deregister_style( 'elementor-icons-fa-' . $style );
    }
  }, 20 );


/**
 * Register Custom Widget
 *
 * @return void
 */
function eergx_cw_wisget(){
    register_widget( 'Eergx_Recent_Posts' );
}
add_action('widgets_init', 'eergx_cw_wisget');


/**
 * Deregister Elementor Animation
 *
 * @return void
 */
function eergx_de_reg() {
    wp_deregister_style( 'e-animations' );
}
add_action( 'wp_enqueue_scripts', 'eergx_de_reg' );

/**
 * Enqueue Admin Style
 *
 * @return void
 */
function eergx_enqueue_admin_customstyle() {
    wp_enqueue_style( 'admin-style', EERGX_DIR_URL . 'assets/css/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'eergx_enqueue_admin_customstyle' );

/**
 * Enqueue Admin Style
 *
 * @return void
 */
function eergx_enqueue_customstyle() {
    wp_enqueue_script( 'eergx-addon-core', EERGX_DIR_URL . '/assets/js/core.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'eergx_enqueue_customstyle' );

/**
 * Dequeue Elemenotr Swiper Slider
 *
 * @return  [type]  [return description]
 */
function dequeue_wpml_styles(){
    wp_dequeue_style( 'swiper' );
    wp_deregister_style( 'swiper' );

    wp_dequeue_script( 'swiper' );
    wp_deregister_script( 'swiper' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_wpml_styles', 20 );


/**
 * Script Remove
 *
 * @return  [type]  [return description]
 */
function remove_jquery_sticky() {
		wp_dequeue_script( 'swiper' );
		wp_deregister_script( 'swiper' );
}
add_action( 'elementor/frontend/after_register_scripts', 'remove_jquery_sticky' );


/**
 * Custom Widget
 */
include_once EERGX_INC_PATH . "/custom-widget/recent-post.php";

/**
 * Themeoption
 */
include_once EERGX_INC_PATH . "/eergx-plugin-helper.php";

/**
 * Custom Metabox
 */
include_once EERGX_INC_PATH . "/options/theme-metabox.php";

/**
 * Themeoption
 */
include_once EERGX_INC_PATH . "/options/theme-option.php";


/**
 * Helper Function
 */
include_once EERGX_INC_PATH . "/helper.php";

/**
 * Codestar Custom Icon Liberary
 */
include_once EERGX_INC_PATH . "/csf-custom-icon.php";
/**
 * Elementor Custom Icon
 */

include_once EERGX_INC_PATH . "/constim-icon.php";

/**
 * Custom Template CPT
 */
include_once EERGX_INC_PATH . "/post-type/template.php";

/**
 * Custom Template CPT
 */
include_once EERGX_INC_PATH . "/post-type/listing_taxnomy.php";


/**
 * Elementor Configuration
 */
include_once EERGX_DIR_PATH . "/elementor/elementor-init.php";

/**
 * Contact Form 7 Autop Remove
 */
add_filter('wpcf7_autop_or_not', '__return_false');


