<div class="egx-blog-1-wrap">
    <?php
        if ( $query->have_posts() ) {
        $i = 0;
        while ( $query->have_posts() ) {
        $query->the_post();
            $tags = get_the_tags(get_the_ID());
            $categories = get_the_terms( get_the_ID(), 'category' );
            $i++;
    ?>
    <div class="egx-blog-1-card wow fadeInUp">
        <div class="card-top">
            <div class="card-img img-cover">
                <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail( 'full' );
                    }
                ?>
            </div>
            <div class="card-img img-cover">
                <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail( 'full' );
                    }
                ?>
            </div>
            <div class="publish">
                <span class="date"><?php echo get_the_date('M');?></span>
                <span class="month"><?php echo get_the_date('d');?></span>
            </div>
        </div>
        <div class="card-content">
            <div class="author">
                <div class="auth-img img-cover">
                    <?php echo eergx_post_author_avatars(50);?>
                </div>
                <div class="auth-cont img-cover">
                    <span class="position"><?php esc_html_e('Posted By', 'eergx-plugin')?></span>
                    <h5 class="egx-heading-1 name"><?php the_author();?></h5>
                </div>
            </div>
            <h4 class="egx-heading-1 title">
                <a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')  ;?></a>
            </h4>
            <div class="mt-25">
                <a href="<?php the_permalink();?>" class="egx-btn-1 blog-btn">
                    <span class="btn-text" data-back="read more" data-front="read more"></span>
                    <span class="btn-icon">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <?php } wp_reset_query(); } ?>

</div>