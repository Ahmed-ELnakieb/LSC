<div class="egx-about-5-wrap">
    <div class="about-left">
        <?php if(!empty($settings['image']['url'])):?>
            <div class="main-img img-cover image-pllx">
                <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
            </div>
        <?php endif;?>
    </div>
</div>