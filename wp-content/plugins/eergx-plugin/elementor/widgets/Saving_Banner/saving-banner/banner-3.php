<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-energy-3-wrap">
    <div class="egx-energy-3-left">
        <div class="section-title-wrap">
            <?php if(!empty($settings['subtitle'])):?>
                <h2 class="energy-title"><?php echo eergx_wp_kses($settings['subtitle'])?></h2>
            <?php endif;?>

            <?php if(!empty($settings['title'])):?>
                <h2 class="energy-title-big"><?php echo eergx_wp_kses($settings['title'])?></h2>
            <?php endif;?>
            <?php if(!empty($settings['description'])):?>
                <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['description'])?></p>
            <?php endif;?>
            <?php if(!empty($settings['btn_label'])):?>
                <div class="btn-wrap">
                    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 without-icon">
                        <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label']);?></span>
                    </a>
                </div>
            <?php endif;?>
        </div>
        <div class="bottom-content scroll_slide_right">

            <div class="video bg-default" data-background="<?php echo esc_url($settings['video_bg']['url']);?>">
                <a href="<?php echo esc_url($settings['video_link']);?>" class="popup-video">
                    <span class="icon">
                        <i class="fa-solid fa-play"></i>
                    </span>
                </a>
            </div>
            <?php if(!empty($settings['video_image']['url'])):?>
                <div class="men-img">
                    <img src="<?php echo esc_url($settings['video_image']['url']);?>" alt="<?php if(!empty($settings['video_image']['alt'])){ echo esc_attr($settings['video_image']['alt']);}?>">
                </div>
            <?php endif;?>
            <div class="action">
                <?php if(!empty($settings['video_title'])):?>
                    <h5 class="egx-heading-1 subtitle"><?php echo eergx_wp_kses($settings['video_title'])?></h5>
                <?php endif;?>
                <?php if(!empty($settings['video_text'])):?>
                    <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['video_text'])?></h4>
                <?php endif;?>
                <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="link">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <?php if(!empty($settings['banner_img']['url'])):?>
        <div class="egx-energy-3-right img-cover scroll_slide_top">
            <img src="<?php echo esc_url($settings['banner_img']['url']);?>" alt="<?php if(!empty($settings['banner_img']['alt'])){ echo esc_attr($settings['banner_img']['alt']);}?>">
        </div>
    <?php endif;?>
</div>