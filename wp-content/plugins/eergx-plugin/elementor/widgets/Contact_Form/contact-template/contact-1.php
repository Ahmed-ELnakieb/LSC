<div class="egx-experience-3-right">
    <?php if(!empty($settings['image']['url'])):?>
        <div class="main-img scroll_slide_top">
            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
        </div>
    <?php endif;?>

    <div class="form-wrap">
        <?php if(!empty($settings['subtitle'])):?>
            <span class="subtitle"><?php echo eergx_wp_kses($settings['subtitle'])?></span>
        <?php endif;?>

        <?php if(!empty($settings['title'])):?>
            <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h4>
        <?php endif;?>
        <?php if(!empty($settings['shortcode'])){ echo do_shortcode($settings['shortcode']);}?>
    </div>
</div>