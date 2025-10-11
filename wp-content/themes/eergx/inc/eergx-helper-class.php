<?php
if (!defined('ABSPATH')) {
	exit;
}
/**
 * eergx Theme Helper
 *
 *
 * @class        Eergx_Helper
 * @version      1.0
 * @category 	 Class
 */

if (!class_exists('Eergx_Helper')) {
	class Eergx_Helper{

		/**
		 * Header Template
		 *
		 * @return  [type]  [return description]
		 */
		public static function eergx_header_template()
		{
			$meta = get_post_meta(get_the_ID(), 'eergx_page_meta', true);
			$meta_header_option = isset($meta['meta_header_type']) ? $meta['meta_header_type'] : '';

			$f_style = cs_get_option('header_style');
			$header_style = '';

			$meta_header = isset($meta['meta_header_style']) ? $meta['meta_header_style'] : '';

			if ($meta_header_option == true || $meta_header_option == 1) {
				$header_style .= $meta_header;
			} else {
				$header_style .= $f_style;
			}

			if (class_exists('Eergx_Plugin_Helper') && $header_style && (get_post($header_style)) && in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
				<?php $elementor_instance = Elementor\Plugin::instance(); ?>
				<?php echo Eergx_Plugin_Helper::eergx_render_header($header_style); ?>
			<?php
			} else {
				get_template_part('template-parts/header/default', 'header');
			}
		}

		/**
		 * Footer Template
		 *
		 * @return  [type]  [return description]
		 */
		public static function eergx_footer_template()
		{
			$meta = get_post_meta(get_the_ID(), 'eergx_page_meta', true);
			$meta_footer_option = isset($meta['meta_footer_type']) ? $meta['meta_footer_type'] : '';

			$f_style = cs_get_option('footer_style');
			$footer_style = '';

			$meta_footer = isset($meta['meta_footer_style']) ? $meta['meta_footer_style'] : '';

			if ($meta_footer_option == true || $meta_footer_option == 1) {
				$footer_style .= $meta_footer;
			} else {
				$footer_style .= $f_style;
			}

			if (class_exists('Eergx_Plugin_Helper') && $footer_style && (get_post($footer_style)) && in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
				<?php $elementor_instance = Elementor\Plugin::instance(); ?>
				<?php echo Eergx_Plugin_Helper::eergx_render_footer($footer_style); ?>
			<?php
			} else {
				get_template_part('template-parts/footer/default', 'footer');
			}
		}

	}

	// Instantiate theme
	new Eergx_Helper();
}