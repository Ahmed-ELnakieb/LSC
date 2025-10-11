<div class="egx-experience-2-item">
    <span class="icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </span>
    <div>
        <h4 class="number"><span class="counter"><?php echo eergx_wp_kses($settings['count'])?></span><?php if(!empty($settings['prefix'])):?><?php echo eergx_wp_kses($settings['prefix'])?><?php endif;?>
    </h4>
        <span class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></span>
    </div>
</div>