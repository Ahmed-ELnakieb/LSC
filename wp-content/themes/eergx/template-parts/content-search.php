<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eergx
 */
$categories = get_the_category();
$blog_btn_text = cs_get_option('blog_btn_text');
$hide_blog_date = cs_get_option('hide_blog_date');
$hide_authore = cs_get_option('hide_authore');
$hide_cmt_date = cs_get_option('hide_cmt_date');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('egx-blog-7-card'); ?>>
	<div class="blog-list-slider-wrap">
		<?php get_template_part('template-parts/post-formats/content'); ?>
	</div>

	<div class="card-content">
		<div class="meta-data">
			<span class=" name"><i class="fa-solid fa-circle-user"></i> <?php esc_html_e('By', 'eergx');?> <?php the_author();?></span>
			<span class=" name"><i class="fa-regular fa-comment-dots"></i> (<?php echo esc_attr(get_comments_number());?>) <?php esc_html_e( 'comments', 'eergx' )?> </span>
			<span class=" name"><i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date();?></span>
		</div>
		<h3 class="egx-heading-1 title">
			<a href="<?php the_permalink();?>" aria-label="name">
				<?php the_title();?>
			</a>
		</h3>
		<div class="egx-para-1 disc"><?php the_excerpt();?></div>
		<a class="blog-list-btn" href="<?php the_permalink();?>">
			<span class="btn-text"><?php if(!empty($blog_btn_text)){echo esc_html($blog_btn_text);}else{esc_html_e( 'Read More', 'eergx' );}?></span>
			<span class="btn-icon">
				<i class="fa-solid fa-arrow-right"></i>
			</span>
		</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->