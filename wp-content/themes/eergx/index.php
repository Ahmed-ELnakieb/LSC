<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eergx
 */

get_header();
$eergxPostClass = '';
if (is_active_sidebar('sidebar-1')) {
	$eergxPostClass = 'col-xxl-8 col-xl-8';
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
					<?php eergx_post_loop(); ?>
				</div>
			</div>
			<!-- Sidebar Side -->
			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php
get_footer();
