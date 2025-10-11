<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading cta-title egx-split-text split-in-right' );

    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-cta-1-wrap egx_scale_1">
    <div class="section-title-wrap">
        <?php if(!empty($settings['subtitle'])):?>
            <h5 class="egx-subtitle-1 text-black">
                <?php if(!empty($settings['sub_title_icon']['url'])):?>
                    <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
                <?php endif;?>
                <span><?php echo eergx_wp_kses($settings['subtitle'])?></span>
            </h5>
        <?php endif;?>
        <?php printf('<%1$s %2$s>%3$s</%1$s>',
        tag_escape($settings['title_tag']),
            $this->get_render_attribute_string('title'),
            $settings['title']
        ); ?>
        <?php if(!empty($settings['btn_label'])):?>
            <div class="btn-wrap">
                <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
                    <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label']);?>" data-front="<?php echo eergx_wp_kses($settings['btn_label']);?>"></span>
                </a>
            </div>
        <?php endif;?>
    </div>
    <div class="cta-content">
        <?php if(!empty($settings['c_image']['url'])):?>
            <div class="main-img">
                <img src="<?php echo esc_url($settings['c_image']['url']);?>" alt="<?php if(!empty($settings['c_image']['alt'])){ echo esc_attr($settings['c_image']['alt']);}?>">
            </div>
        <?php endif;?>
        <?php if(!empty($settings['count'])):?>
            <div class="savings">
                <h3 class="number"><span class="counter"><?php echo esc_html($settings['count'])?></span><?php if(!empty($settings['prefix'])):?><span class="parcent"><?php echo esc_html($settings['prefix'])?></span><?php endif;?>
                </h3>
                <?php if(!empty($settings['count_title'])):?>
                    <h5 class="title"><?php echo esc_html($settings['count_title'])?></h5>
                <?php endif;?>
            </div>
        <?php endif;?>
        <?php if(!empty($settings['features'])):?>
            <div class="feature">
                <?php foreach($settings['features'] as $item):?>
                    <div class="item">
                        <span class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
                        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</div>