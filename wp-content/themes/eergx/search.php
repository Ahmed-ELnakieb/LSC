<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package eergx
 */

get_header();
$eergxPostClass = '';
if (is_active_sidebar('sidebar-1')) {
	$eergxPostClass = 'col-xxl-8 col-xl-8 col-lg-8';
} else {
	$eergxPostClass = 'col-lg-10 offset-lg-1';
}
?>
<div class="egx-blog-7-area fix">
		<div class="container egx-container-2">
			<div class="row">

			<!-- Content Side -->
			<div class="<?php echo esc_attr($eergxPostClass); ?>">
				<div class="egx-blog-7-wrap">
					<?php eergx_search_loop(); ?>
				</div>
			</div>
			<!-- Sidebar Side -->
			<?php get_sidebar(); ?>

		</div>
	</div>
</div>


<?php
get_footer();
