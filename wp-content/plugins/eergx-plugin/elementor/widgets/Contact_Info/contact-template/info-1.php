<div class="contact-wrapper">
    <span class="icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </span>
    <div class="call">
        <?php if(!empty($settings['title'])):?>
            <span class="call-text"><?php echo eergx_wp_kses($settings['title'])?></span>
        <?php endif;?>
        <a href="tel:<?php echo eergx_wp_kses($settings['phone'])?>" class="call-link"><?php echo eergx_wp_kses($settings['phone'])?></a>
    </div>
</div>