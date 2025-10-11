<?php if(!empty($settings['image']['url'])):?>
    <div class="main-img egx_left_Up_1">
        <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
    </div>
<?php endif;?>