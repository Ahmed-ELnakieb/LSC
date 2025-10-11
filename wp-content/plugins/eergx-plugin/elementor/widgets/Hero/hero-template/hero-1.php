<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading hero-title egx-split-text split-in-right' );

    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-hero-1-area">
    <?php if(!empty($settings['img_1']['url'])):?>
        <div class="bg-image">
            <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
        </div>
    <?php endif;?>
    <?php if(!empty($settings['img_2']['url'])):?>
        <div class="shape-1">
            <img src="<?php echo esc_url($settings['img_2']['url']);?>" alt="<?php if(!empty($settings['img_2']['alt'])){ echo esc_attr($settings['img_2']['alt']);}?>">
        </div>
    <?php endif;?>
    <?php if(!empty($settings['img_3']['url'])):?>
        <div class="shape-2">
            <img src="<?php echo esc_url($settings['img_3']['url']);?>" alt="<?php if(!empty($settings['img_3']['alt'])){ echo esc_attr($settings['img_3']['alt']);}?>">
        </div>
    <?php endif;?>
    <?php if(!empty($settings['img_4']['url'])):?>
        <div class="shape-3">
            <img src="<?php echo esc_url($settings['img_4']['url']);?>" alt="<?php if(!empty($settings['img_4']['alt'])){ echo esc_attr($settings['img_4']['alt']);}?>">
        </div>
    <?php endif;?>
    <div class="container egx-container-1">
        <div class="egx-hero-1-wrap">
            <?php if(!empty($settings['img_5']['url'])):?>
                <div class="main-img egx-hero-1-slideleft">
                    <img src="<?php echo esc_url($settings['img_5']['url']);?>" alt="<?php if(!empty($settings['img_5']['alt'])){ echo esc_attr($settings['img_5']['alt']);}?>">
                </div>
            <?php endif;?>
            <div class="hero-content">
                <?php if(!empty($settings['sub_title'])):?>
                    <h5 class="egx-subtitle-1 sub-elementor-gt-heading">
                        <?php if(!empty($settings['sub_title_icon']['url'])):?>
                            <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
                        <?php endif;?>
                        <span class="gradient-2"><?php echo eergx_wp_kses($settings['sub_title'])?></span>
                    </h5>
                <?php endif;?>
                <?php printf('<%1$s %2$s txaa-split-text-1>%3$s</%1$s>',
                    tag_escape($settings['title_tag']),
                    $this->get_render_attribute_string('title'),
                    $settings['title']
                ); ?>

                <?php if(!empty($settings['description'])):?>
                    <p class="egx-para-1 elementor-para-text disc mt-20"><?php echo eergx_wp_kses($settings['description'])?></p>
                <?php endif;?>

                <div class="feature">
                    <?php foreach($settings['features'] as $item):?>
                        <div class="item">
                            <span class="icon">
                                <?php if ($item['type'] === 'image' && ($item['icon_img']['url'])) :?>
                                    <img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="<?php if(!empty($item['icon_img']['alt'])){ echo esc_attr($item['icon_img']['alt']);}else{esc_attr_e('List', 'goyto-plugin');}?>">
                                <?php else:?>
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif;?>
                            </span>
                            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                        </div>
                    <?php endforeach;?>
                    
                </div>
                <?php if(!empty($settings['btn_label'])):?>
                    <div class="btn-wrap">
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
                            <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label'])?>" data-front="<?php echo eergx_wp_kses($settings['btn_label'])?>"></span>
                        </a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>