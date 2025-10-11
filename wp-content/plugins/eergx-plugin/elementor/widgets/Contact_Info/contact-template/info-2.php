<div class="egx-client-2-action">    
    <div class="action-item">
        <span class="icon">
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </span>
        <?php if(!empty($settings['title'])):?>
            <span class="title"><?php echo eergx_wp_kses($settings['title'])?></span>
        <?php endif;?>
        <a href="<?php echo eergx_wp_kses($settings['info_link']['url'])?>" class="link"><?php echo eergx_wp_kses($settings['info'])?></a>
    </div>
</div>