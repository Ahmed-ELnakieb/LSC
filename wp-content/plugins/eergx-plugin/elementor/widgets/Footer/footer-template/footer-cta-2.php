<?php 
    if ( ! empty( $settings['link']['url'] ) ) {
        $this->add_link_attributes( 'link', $settings['link'] );
    }
?>
<div class="egx-footer-2-top">
    <h3 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?>
        <?php if(!empty($settings['link_text'])):?>
            <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="link"><?php echo eergx_wp_kses($settings['link_text'])?></a>
        <?php endif;?>
    </h3>
    <?php if(!empty($settings['shortcode'])):?>
        <div class="footer-form">
            <?php echo do_shortcode($settings['shortcode']);?>
        </div>
    <?php endif;?>
</div>