<div class="egx-feature-3-item">
    <div class="main-img">
        <?php if ($settings['type'] === 'image' && ($settings['icon_img']['url'])) :?>
            <img src="<?php echo esc_url($settings['icon_img']['url']);?>" alt="<?php if(!empty($settings['icon_img']['alt'])){ echo esc_attr($settings['icon_img']['alt']);}else{esc_attr_e('List', 'goyto-plugin');}?>">
        <?php else:?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php endif;?>
    </div>
    <span class="icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['top_icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </span>
    <?php if(!empty($settings['title'])):?>
        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h5>
    <?php endif;?>
</div>