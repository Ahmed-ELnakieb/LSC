<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading hero-title egx-split-text split-in-right' );

    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-hero-3-area bg-default" data-background="<?php echo esc_url($settings['img_1']['url']);?>">
    <div class="container egx-container-1">
        <div class="egx-hero-3-wrap">
            <div class="egx-hero-3-left">
                <?php if(!empty($settings['sub_title'])):?>
                <h5 class="egx-subtitle-1">
                    <?php if(!empty($settings['sub_title_icon']['url'])):?>
                        <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
                    <?php endif;?>
                    <span class="gradient"><?php echo eergx_wp_kses($settings['sub_title'])?></span>
                </h5>
                <?php endif;?>
                <?php printf('<%1$s %2$s txaa-split-text-1>%3$s</%1$s>',
                    tag_escape($settings['title_tag']),
                    $this->get_render_attribute_string('title'),
                    $settings['title']
                ); ?>
                <?php if(!empty($settings['description'])):?>
                    <p class="egx-para-1 elementor-para-text disc"><?php echo eergx_wp_kses($settings['description'])?></p>
                <?php endif;?>
                <div class="feature">
                    <?php foreach($settings['features'] as $item):?>
                        <div class="item">
                            <spna class="icon">
                                <?php if ($item['type'] === 'image' && ($item['icon_img']['url'])) :?>
                                    <img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="<?php if(!empty($item['icon_img']['alt'])){ echo esc_attr($item['icon_img']['alt']);}else{esc_attr_e('List', 'goyto-plugin');}?>">
                                <?php else:?>
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif;?>
                            </spna>
                            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                        </div>
                    <?php endforeach;?>

                </div>
                <?php if(!empty($settings['btn_label'])):?>
                    <div class="btn-wrap">
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2">
                            <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label'])?></span>
                            <span class="btn-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                <?php endif;?>

            </div>
            <?php if(!empty($settings['img_2']['url'])):?>
                <div class="egx-hero-3-right">
                    <img src="<?php echo esc_url($settings['img_2']['url']);?>" alt="<?php if(!empty($settings['img_2']['alt'])){ echo esc_attr($settings['img_2']['alt']);}?>">
                </div>
            <?php endif;?>
        </div>
    </div>
</div>