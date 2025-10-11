<div class="egx-footer-2-gallery">
    <?php foreach($settings['gallery'] as $item):?>
    <a href="<?php echo esc_url($item['url']);?>" aria-label="gallery img" class="gallery-item img-cover popup_img">
        <img src="<?php echo esc_url($item['url']);?>" alt="">
        <span class="icon-1">
            <i class="fa-regular fa-image"></i>
        </span>
    </a>
    <?php endforeach;?>
   
</div>