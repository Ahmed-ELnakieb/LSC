<div class="egx-blog-4-wrap">
    <div class="side-card-wrap">
        <?php
            if ( $query->have_posts() ) {
            $i = 0;
            while ( $query->have_posts() ) {
            $query->the_post();
                $tags = get_the_tags(get_the_ID());
                $categories = get_the_terms( get_the_ID(), 'category' );
                $i++;
        ?>
        <div class="egx-blog-4-card">
            <div class="meta">
                <span class="publish"><?php echo get_the_date();?></span>
                <span class="author"><?php esc_html_e('by', 'eergx-plugin')?> <?php the_author();?></span>
            </div>
            <h5 class="egx-heading-1 title">
                <a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')  ;?></a>
            </h5>
            <div class="card-img img-cover">
                <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail( 'full' );
                    }
                ?>
            </div>
        </div>    
        <?php } wp_reset_query(); } ?>
    </div>
</div>