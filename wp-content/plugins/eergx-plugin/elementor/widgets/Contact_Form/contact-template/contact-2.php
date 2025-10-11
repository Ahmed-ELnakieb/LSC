<div class="egx-contact-4-area">

    <?php if(!empty($settings['image']['url'])):?>
        <div class="egx-contact-4-bg">
            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
        </div>
    <?php endif;?>
    <div class="container egx-container-2">
        <div class="egx-contact-4-form bg-default" data-background="<?php echo esc_url($settings['bg_img']['url']);?>">

            <?php if(!empty($settings['title'])):?>
                <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h4>
            <?php endif;?>

            <div class="divider"></div>
            <?php if(!empty($settings['shortcode'])){ echo do_shortcode($settings['shortcode']);}?>
        </div>
    </div>
</div>