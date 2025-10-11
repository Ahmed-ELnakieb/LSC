<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eergx
 */
if (get_post_meta(get_the_ID(), 'eergx_page_meta', true)) {
	$header_meta = get_post_meta(get_the_ID(), 'eergx_page_meta', true);
} else {
	$header_meta = array();
}

if (array_key_exists('page_header_disable', $header_meta)) {
	$page_header_disable = $header_meta['page_header_disable'];
} else {
	$page_header_disable = false;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Solar Energy WordPress Theme"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('fd-home-5'); ?>>
<?php wp_body_open(); ?>


<div id="page" class="site site_wrapper">
	<?php
	if(function_exists('eergx_preloader')){
		eergx_preloader();
	};
	if(function_exists('eergx_scroll_up_btn')){
		eergx_scroll_up_btn();
	};
	if ($page_header_disable != true) {
		Eergx_Helper::eergx_header_template();
	}
	do_action('eergx_before_main_content');
	?>
	<div class="body-bg-1 bg-default">