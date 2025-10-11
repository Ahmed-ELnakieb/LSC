<div class="egx-about-2-left">
    <?php if(!empty($settings['image']['url'])):?>
        <div class="main-img img-cover image-pllx">
            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
        </div>
    <?php endif;?>
    <div class="pop-wrap bg-default" data-background="<?php echo esc_url($settings['upload_video']['url']);?>">
        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="popup-video">
            <span class="icon">
                <i class="fa-solid fa-play"></i>
            </span>
        </a>
    </div>
</div>