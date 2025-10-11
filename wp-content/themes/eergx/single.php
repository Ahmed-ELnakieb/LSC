<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eergx
 */

get_header();
$breadcrumb_bg = cs_get_option('breadcrumb_bg');
?>
<div class="egx-blog-details-hero bg-default" <?php if(!empty($breadcrumb_bg['url'])):?> data-background="<?php echo esc_url($breadcrumb_bg['url']);?>" <?php endif;?>>
	<div class="container egx-container-2">
		<a href="<?php echo esc_url(home_url());?>/blog" class="breadcrumb">
			<span class="icon">
				<i class="fa-solid fa-angle-left"></i>
			</span>
			<span class="text"><?php esc_html_e('Back to Blog Page', 'eergx');?></span>
		</a>
		<div class="top-wrap">
			<div class="meta">
				<div class="item">
					<span class="icon">
						<i class="fa-solid fa-circle-user"></i>
					</span>
					<span class="text"><?php the_author();?></span>
				</div>
				<div class="item">
					<span class="icon">
						<i class="fa-regular fa-comment-dots"></i>
					</span>
					<span class="text"> <?php esc_html_e( 'comments', 'eergx' )?> (<?php echo esc_attr(get_comments_number());?>)</span>
				</div>
				<div class="item">
					<span class="icon">
						<i class="fa-solid fa-calendar-days"></i>
					</span>
					<span class="text"><?php echo get_the_date();?></span>
				</div>
			</div>
			<h1 class="hero-title egx-heading-1 egx-split-text split-in-right"><?php the_title();?></h1>
		</div>
	</div>
</div>
<div class="egx-blog-details-area">
	<?php eergx_single_post_loop(); ?>
</div>
<?php
get_footer();
