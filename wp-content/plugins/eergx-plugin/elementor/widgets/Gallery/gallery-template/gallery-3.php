<div class="mainp__gal">
    <div class="gallery-wrap">
        <div class="gallery">
            <a href="<?php echo esc_url($settings['gallery']['url']);?>" aria-label="gallery img" class="gallery-item img-cover popup_img">
                <img src="<?php echo esc_url($settings['gallery']['url']);?>" alt="<?php if(!empty($settings['gallery']['alt'])){ echo esc_attr($settings['gallery']['alt']);}?>">
                <span class="icon-1">
                    <i class="fa-regular fa-image"></i>
                </span>
            </a>
        </div>
    </div>
</div>