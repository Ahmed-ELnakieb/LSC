<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-section-title-1 has-color-white egx-split-text-2 egx-split-text-2-ani' );
?>
<div class="egx-cta-2-wrap">
    <?php if(!empty($settings['subtitle'])):?>
        <h5 class="egx-subtitle-1">
            <?php if(!empty($settings['sub_title_icon']['url'])):?>
                <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
            <?php endif;?>
            <span class="white-color"><?php echo eergx_wp_kses($settings['subtitle'])?></span>
        </h5>
    <?php endif;?>
    <?php printf('<%1$s %2$s>%3$s</%1$s>',
        tag_escape($settings['title_tag']),
        $this->get_render_attribute_string('title'),
        $settings['title']
    ); ?>
    <?php if(!empty($settings['description'])):?>
        <div class="egx-para-1 disc elementor-gt-desc"><?php echo eergx_wp_kses($settings['description'])?></div>
    <?php endif;?>
    <div class="btn-wrap">
        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 btn-black">
            <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label']);?></span>
            <span class="btn-icon">
                <i class="fa-solid fa-arrow-right"></i>
            </span>
        </a>
    </div>
</div>