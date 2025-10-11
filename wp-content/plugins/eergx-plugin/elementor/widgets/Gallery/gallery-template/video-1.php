<div class="egx-testimonial-5-area">
    <div class="swiper-container egx_t5_slider_active fix">
        <div class="swiper-wrapper">
            <?php foreach($settings['gallerys'] as $item):?>
                <div class="swiper-slide">
                    <div class="egx-testimonial-5-item">
                        <div class="img-wrap img-cover">
                            <img src="<?php echo esc_url($item['gallery_img']['url']);?>" alt="<?php if(!empty($item['gallery_img']['alt'])){ echo esc_attr($item['gallery_img']['alt']);}?>">
                        </div>
                        <a href="<?php echo esc_url($item['video_link']['url']);?>" class="popup-video">
                            <span class="icon">
                                <i class="fa-solid fa-play"></i>
                            </span>
                        </a>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
        <div class="egx-t5-pargination"></div>
    </div>
</div>