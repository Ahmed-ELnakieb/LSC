<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eergx
 */

get_header();
$eergxPostClass = '';
if(is_active_sidebar('sidebar-1')){
	$eergxPostClass = 'col-xxl-8 col-xl-8';
}else{
	$eergxPostClass = 'col-lg-10 offset-lg-1';
}
?>
<section class="egx-blog-7-area fix">
	<div class="container egx-container-2">
		<div class="row">
			<!-- Content Side -->
			<div class="<?php echo esc_attr($eergxPostClass);?>">
				<div class="egx-blog-7-wrap">
					<?php eergx_page_loop(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
