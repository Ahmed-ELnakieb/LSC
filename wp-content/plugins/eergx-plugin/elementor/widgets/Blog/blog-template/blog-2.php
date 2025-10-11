<div class="egx-blog-3-area">
    <div class="egx-blog-3-wrap">
    <?php
            if ( $query->have_posts() ) {
            $i = 0;
            while ( $query->have_posts() ) {
            $query->the_post();
                $tags = get_the_tags(get_the_ID());
                $categories = get_the_terms( get_the_ID(), 'category' );
                $i++;
        ?>
        <div class="egx-blog-3-card">
            <div class="card-img img-cover">
                <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail( 'full' );
                    }
                ?>
            </div>
            <div class="date">
                <span class="date-text"><?php echo get_the_date('M d');?></span>
            </div>
            <div class="card-content">
                <div class="meta">
                    <div class="user">
                        <span class="icon">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <span class="text"><?php the_author();?></span>
                    </div>
                    <div class="user">
                        <span class="icon">
                            <i class="fa-regular fa-comment"></i>
                        </span>
                        <span class="text"><?php echo esc_attr(get_comments_number());?> <?php esc_html_e('comments', 'eergx-plugin'); ?></span>
                    </div>
                </div>
                <h4 class="egx-heading-1 title">
                    <a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')  ;?></a>
                </h4>
                <div class="egx-para-1 disc"><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?></div>
            </div>
        </div>

        <?php } wp_reset_query(); } ?>
    </div>
        <?php if(!empty($settings['desc'])):?>
            <p class="bottom-text egx-para-1"><?php echo eergx_wp_kses($settings['desc'])?></a></p>
        <?php endif;?>
</div>