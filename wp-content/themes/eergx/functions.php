<?php
/**
 * eergx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eergx
 */

define('EERGX_THEME_DRI', get_template_directory());
define('EERGX_INC_DRI', get_template_directory() . '/inc/');
define('EERGX_THEME_URI', get_template_directory_uri());
define('EERGX_CSS_PATH', EERGX_THEME_URI . '/assets/css');
define('EERGX_JS_PATH', EERGX_THEME_URI . '/assets/js');
define('EERGX_IMG_PATH', EERGX_THEME_URI . '/assets/images');
define('Eergx_Admin_DRI', EERGX_THEME_DRI . '/admin');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eergx_setup(){
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eergx, use a find and replace
	 * to change 'eergx' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('eergx', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	add_image_size('eergx-img-size-1', 435, 323, true);
	add_image_size('eergx-img-size-2', 733, 465, true);
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	remove_theme_support('widgets-block-editor');
	add_filter( 'big_image_size_threshold', '__return_false' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	//Woocommerc
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'eergx'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support('post-formats', [
		'standard', 'image', 'video', 'gallery'
	]);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'eergx_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'eergx_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eergx_content_width(){
	$GLOBALS['content_width'] = apply_filters('eergx_content_width', 640);
}
add_action('after_setup_theme', 'eergx_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eergx_widgets_init(){
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'eergx'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'eergx'),
			'before_widget' => '<div id="%1$s" class="%2$s sidebar-box wow fadeInUp">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="sidebar-box-title egx-heading-1">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Shop Siderbar', 'eergx'),
			'id' => 'shop-sidebar-1',
			'description' => esc_html__('Add widgets here.', 'eergx'),
			'before_widget' => '<div id="%1$s" class="widget mt-30 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget__title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'eergx_widgets_init');



/**
 *Google Font Load 
 */
if (!function_exists('eergx_fonts_url')):

	function eergx_fonts_url(){
		$fonts_url = '';
		$font_families = array();
		$subsets = 'latin';

		if ('off' !== _x('on', 'Inter: on or off', 'eergx')) {
			$font_families[] = 'Inter:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i';
		}
		if ('off' !== _x('on', 'Urbanist: on or off', 'eergx')) {
			$font_families[] = 'Urbanist:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}
		
		if ($font_families) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode(implode('|', $font_families)),
					'subset' => urlencode($subsets),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return esc_url_raw($fonts_url);
	}
endif;


/**
 * Enqueue scripts and styles.
 */
function eergx_scripts(){

	wp_enqueue_style('eergx-google-fonts', eergx_fonts_url(), array(), null);

	wp_enqueue_style('bootstrap', EERGX_CSS_PATH . '/bootstrap.min.css');
	wp_enqueue_style('all-min', EERGX_CSS_PATH . '/fontawesome.min.css');
	wp_enqueue_style('e-animations', EERGX_CSS_PATH . '/animate.css');
	wp_enqueue_style('image-reveal', EERGX_CSS_PATH . '/image-reveal.css');
	wp_enqueue_style('magnific-popup', EERGX_CSS_PATH . '/magnific-popup.css');
	wp_enqueue_style('swiper-eergx', EERGX_CSS_PATH . '/swiper.min.css');
	wp_enqueue_style('nice-select', EERGX_CSS_PATH . '/nice-select.css');
	wp_enqueue_style('eergx-main', EERGX_CSS_PATH . '/main.css');

	if (class_exists('WooCommerce')) {
		wp_enqueue_style('woocommerce-style', get_template_directory_uri() . '/woocommerce/woocommerce.css');
	}

	$your_curnt_lang = apply_filters('wpml_current_language', NULL);
	if (is_rtl() && $your_curnt_lang != 'en') {
		wp_enqueue_style('eergx-rtl', EERGX_CSS_PATH . '/rtl.css');
	}

	wp_enqueue_style('eergx-style', get_stylesheet_uri(), array());

	wp_enqueue_script( 'jquery-masonry', array( 'jquery' ), false, true );
	wp_enqueue_script( 'imagesloaded', ['jquery'], false, true );
	wp_enqueue_script('bootstrap-bundle', EERGX_JS_PATH . '/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('swiper-bundle', EERGX_JS_PATH . '/swiper-bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('appear', EERGX_JS_PATH . '/appear.js', array('jquery'), '1.0', true);
	wp_enqueue_script('wow', EERGX_JS_PATH . '/wow.js', array('jquery'), '1.0', true);
	wp_enqueue_script('magnific-popup', EERGX_JS_PATH . '/magnific-popup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('SplitText', EERGX_JS_PATH . '/SplitText.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('isotope', EERGX_JS_PATH . '/isotope.pkgd.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('nice-select', EERGX_JS_PATH . '/nice-select.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('gsap', EERGX_JS_PATH . '/gsap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('counterup', EERGX_JS_PATH . '/counterup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('marquee', EERGX_JS_PATH . '/marquee.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('waypoints', EERGX_JS_PATH . '/waypoints.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('lenis', EERGX_JS_PATH . '/lenis.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('ScrollTrigger', EERGX_JS_PATH . '/ScrollTrigger.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('reveal', EERGX_JS_PATH . '/reveal.js', array('jquery'), '1.0', true);
	
	wp_enqueue_script('eergx-main', EERGX_JS_PATH . '/main.js', array('jquery'), '1.0', true);

	$your_curnt_lang = apply_filters('wpml_current_language', NULL);
	if (is_rtl() && $your_curnt_lang != 'en') {
		wp_enqueue_script('eergx-rtl', EERGX_JS_PATH . '/rtl.js', array('jquery'), '1.0', true);
	}


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'eergx_scripts');

/**
 * Implement the Custom Header feature.
 */
require EERGX_THEME_DRI . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require EERGX_THEME_DRI . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require EERGX_THEME_DRI . '/inc/class-wp-eergx-navwalker.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require EERGX_THEME_DRI . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require EERGX_THEME_DRI . '/inc/eergx-functions.php';

/**
 * Cs Fremwork Config
 */
require EERGX_THEME_DRI . '/inc/cs-framework-functions.php';

/**
 * Dynamic Style
 */
require EERGX_THEME_DRI . '/inc/dynamic-style.php';

/**
 * eergx Core Functions
 */
require EERGX_THEME_DRI . '/inc/eergx-helper-class.php';

/**
 * eergx Core Functions
 */
require EERGX_THEME_DRI . '/inc/admin/class-admin-dashboard.php';

/**
 * eergx Core Functions
 */
require EERGX_THEME_DRI . '/inc/admin/demo-import/functions.php';

/**
 * Customizer additions.
 */
require EERGX_THEME_DRI . '/inc/customizer.php';


/**
 * Initial Breadcrumb
 */
require EERGX_THEME_DRI . '/inc/breadcrumb-init.php';



/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require EERGX_THEME_DRI . '/inc/jetpack.php';
}

