<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eergx
 */
$categories = get_the_category();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('fx-blog-details-content'); ?>>
    <div class="container">
        <div class="thumbails img-cover fix">
            <div class="image-pllx">
                <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail('full') ?>
                <?php } ?>
            </div>
        </div>
        <div class="blog-sub-details-wrap">
            <div class="egx-blog-details-content">
                <div class="en_con">
                <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eergx' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        )
                    );

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eergx' ),
                            'after'  => '</div>',
                        )
                    );
                ?>
            </div>
            <div class="tag-wrap">
                        <?php if (function_exists('eergx_entry_footer')): ?>
                            <div class="tag">
                                <h5 class="egx-heading-1 title"><?php esc_html_e('Tag:', 'eergx');?></h5>
                                <div class="tag-items">
                                    <?php eergx_entry_footer();?>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if (function_exists('eergx_post_share')): ?>
                            <?php eergx_post_share();?>
                        <?php endif;?>
                    </div>
                    <?php if(function_exists('eergx_authore_info')){ eergx_authore_info();}?>
                    <div class="comment-form-wrap">
                        <?php if (comments_open() || get_comments_number()):
                            comments_template();
                        endif;?>
                    </div>
            </div>
        </div>
    </div>
</div>
