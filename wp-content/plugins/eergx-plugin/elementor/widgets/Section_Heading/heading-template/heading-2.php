<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-section-title-2 has-color-white egx-split-text-2 egx-split-text-2-ani' );
?>
<div class="section-title-wrap prthalign <?php if(!empty($settings['align'])){echo $settings['align'];}?>">

    <?php if(!empty($settings['subtitle'])):?>
        <h5 class="egx-subtitle-2 egx-class-add jst">
            <div class="bubble-left">
                <span class="bubble-1"></span>
                <span class="bubble-2"></span>
                <span class="bubble-3"></span>
                <span class="bubble-4"></span>
            </div>
            <?php echo eergx_wp_kses($settings['subtitle'])?>
            <div class="bubble-right">
                <span class="bubble-1"></span>
                <span class="bubble-2"></span>
                <span class="bubble-3"></span>
                <span class="bubble-4"></span>
            </div>
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