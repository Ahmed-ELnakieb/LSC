<?php
   
   if(get_post_meta(get_the_ID(), 'eergx_post_format_meta', true)) {
    $post_video_meta = get_post_meta(get_the_ID(), 'eergx_post_format_meta', true);
} else {
    $post_video_meta = array();
}

if( array_key_exists( 'video_link', $post_video_meta )) {
    $video_link = $post_video_meta['video_link'];
} else {
    $video_link = '';
} 

?>
<div class="blog-list-slide-item">
    <?php the_post_thumbnail( 'full', ['class' => 'img-fluid'] );?>
    <a class="egx-plybtn-1 popup-video" href="<?php echo esc_url($video_link);?>" style="visibility: visible; animation-duration: 3s; animation-name: fadeInLeft;">
        <span class="icon">
            <i aria-hidden="true" class="fas fa-play"></i>
        </span>
    </a>
</div>