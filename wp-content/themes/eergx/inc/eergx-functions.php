<?php


/**
 * Preloader
 *
 * @return  [type]  [return description]
 */
function eergx_preloader(){
    $preloader_enable = cs_get_option('preloader_enable');
    $eergx_custom_preloader = cs_get_option('eergx_custom_preloader');

    if ($preloader_enable == true):
        ?>
        <div id="preloader">
          <div class="preloader-wrap">
              <div class="loading">
                <img  src="<?php
                    if (!empty($eergx_custom_preloader['url'])) {
                        echo esc_url($eergx_custom_preloader['url']);
                    }
                    ?>" alt="<?php if(!empty($eergx_custom_preloader['alt'])){ echo esc_attr($eergx_custom_preloader['alt']);}else{ esc_attr_e('Preloader', 'eergx');}?>">
              </div>
          </div>
        </div>
        <?php
    endif;
}

function eergx_scroll_up_btn(){
    $scroll_up_btn = cs_get_option('scroll_up_btn');

    if ($scroll_up_btn == true):
        ?>
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
            </svg>
        </div>
        <?php
    endif;
}

/**
 * eergx Post Loop
 *
 * @return  [type]  [return description]
 */
function eergx_post_loop(){
    if (have_posts()):

        /* Start the Loop */
        while (have_posts()):
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part('template-parts/content', get_post_type());

        endwhile; ?>
        <!-- pagination -->
        <div class="egx-pagination">
            <?php
            eergx_pagination(
                '
                    <i class="fa-solid fa-angles-left"></i>',
                '<i class="fa-solid fa-angles-right"></i>',
                '',
                ['class' => '']
            );
            ?>
        </div>



    <?php else:

        get_template_part('template-parts/content', 'none');

    endif;
}

/**
 * Single Post Loop
 *
 * @return  [type]  [return description]
 */
function eergx_single_post_loop(){
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content', 'single');
    endwhile; // End of the loop.
}

/**
 * Archive Loop
 *
 * @return  [type]  [return description]
 */
function eergx_post_archive_loop(){
    if (have_posts()):
        /* Start the Loop */
        while (have_posts()):
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part('template-parts/content', get_post_type());

        endwhile; ?>

        <div class="egx-pagination">
        <?php
            eergx_pagination(
                '
                    <i class="fa-solid fa-angles-left feh-pagination-icon"></i>',
                '<i class="fa-solid fa-angles-right feh-pagination-icon"></i>',
                '',
                ['class' => '']
            );
            ?>
        </div>

    <?php else:

        get_template_part('template-parts/content', 'none');

    endif;
}

/**
 * Search Loop
 *
 * @return  [type]  [return description]
 */
function eergx_search_loop(){
    if (have_posts()):

        /* Start the Loop */
        while (have_posts()):
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part('template-parts/content', 'search');

        endwhile; ?>
        <div class="egx-pagination">
            <?php
            eergx_pagination(
                '
                    <i class="fa-solid fa-angles-left feh-pagination-icon"></i>',
                '<i class="fa-solid fa-angles-right feh-pagination-icon"></i>',
                '',
                ['class' => '']
            );
            ?>
        </div>

    <?php else:

        get_template_part('template-parts/content', 'none');

    endif;
}

/**
 * Page Loop
 *
 * @return  [type]  [return description]
 */
function eergx_page_loop(){
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()):
            comments_template();
        endif;

    endwhile; // End of the loop.
}
