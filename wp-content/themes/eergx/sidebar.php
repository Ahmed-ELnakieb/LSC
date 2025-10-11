<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eergx
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div class="col-lg-4">
	<aside id="secondary" class="blog-sidebar">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</aside><!-- #secondary -->
</div><!-- #secondary -->