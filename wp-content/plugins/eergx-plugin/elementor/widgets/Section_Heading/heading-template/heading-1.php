<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-section-title-1 egx-split-text split-in-right' );
?>
<div class="prthalign">
    <?php if(!empty($settings['subtitle'])):?>
        <h5 class="egx-subtitle-1">
            <?php if(!empty($settings['sub_title_icon']['url'])):?>
                <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
            <?php endif;?>
            <span class="gradient"><?php echo eergx_wp_kses($settings['subtitle'])?></span>
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
</div>
