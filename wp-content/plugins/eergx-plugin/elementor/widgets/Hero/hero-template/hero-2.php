<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading hero-title egx-split-text split-in-rotate' );

    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
    if ( ! empty( $settings['btn_link_2']['url'] ) ) {
        $this->add_link_attributes( 'btn_link_2', $settings['btn_link_2'] );
    }
?>
<div class="egx-hero-2-area bg-default" data-background="<?php echo esc_url($settings['bg_img']['url']);?>">
    <div class="container egx-container-1">
        <div class="egx-hero-2-wrap">
            <div class="egx-hero-2-left">
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
                    <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['description'])?></p>
                <?php endif;?>

                <div class="btn-wrap">
                    <?php if(!empty($settings['btn_label'])):?>
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 hero-2-btn">
                            <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label'])?></span>
                            <span class="btn-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    <?php endif;?>
                    <?php if(!empty($settings['btn_label_2'])):?>
                        <a <?php echo $this->get_render_attribute_string( 'btn_link_2' ); ?> class="egx-btn-2-white hero-2-btn">
                            <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label_2'])?></span>
                        </a>
                    <?php endif;?>
                </div>

                <div class="client wow fadeInLeft">
                    <?php if(!empty($settings['video_link'])):?>
                        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="popup-video">
                            <span class="icon">
                                <i class="fa-solid fa-play"></i>
                            </span>
                        </a>
                    <?php endif;?>
                    <?php if(!empty($settings['video_title']) || !empty($settings['video_txt'])):?>
                        <div class="client-cont">
                            <span class="subtitle"><?php echo eergx_wp_kses($settings['video_title'])?></span>
                            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['video_txt'])?></h5>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>