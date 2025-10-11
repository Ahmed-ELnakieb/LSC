
<?php 
    if(get_post_meta(get_the_ID(), 'eergx_post_gall_meta', true)) {
        $post_gall_meta = get_post_meta(get_the_ID(), 'eergx_post_gall_meta', true);
    } else {
        $post_gall_meta = array();
    }

    if( array_key_exists( 'post-gall-item', $post_gall_meta )) {
        $gallerys = $post_gall_meta['post-gall-item'];
    } else {
        $gallerys = '';
    } 
    $gallery_ids = explode( ',', $gallerys );
?>
<div class="swiper-container blog_list_slide_active fix">
    <div class="swiper-wrapper">

        <?php foreach($gallery_ids as $gall):?>
        <div class="swiper-slide">
            <div class="blog-list-slide-item">
                <img src="<?php echo esc_url(wp_get_attachment_url($gall));?>" alt="<?php esc_attr_e('Gallery','eergx') ?>">
            </div>
        </div>
        <?php endforeach;?>

    </div>
    <!-- slider navigation  -->
    <div class="egx-blog-slider-navigation">
        <div class="egx_blog_list_prev">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        <div class="egx_blog_list_next">
            <i class="fa-solid fa-angle-right"></i>
        </div>
    </div>
</div>