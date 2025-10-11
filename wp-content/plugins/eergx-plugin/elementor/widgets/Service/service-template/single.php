<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-services-details-area">

    <?php if(!empty($settings['shape_img']['url'])):?>
        <div class="top-shape">
            <img src="<?php echo esc_url($settings['shape_img']['url']);?>" alt="<?php if(!empty($settings['shape_img']['alt'])){ echo esc_attr($settings['shape_img']['alt']);}?>">
        </div>
    <?php endif;?>

    <div class="container egx-container-2">
        <div class="top-wrap">
            <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="breadcrumb">
                <span class="icon">
                    <i class="fa-solid fa-angle-left"></i>
                </span>
                <span class="text"><?php echo eergx_wp_kses($settings['btn_label']);?></span>
            </a>
            <?php if(!empty($settings['title'])):?>
                <div class="title-wrap">
                    <h1 class="hero-title egx-heading-1 egx-split-text split-in-right"><?php echo eergx_wp_kses($settings['title'])?></h1>
                </div>
            <?php endif;?>
        </div>
    </div>
    <?php if(!empty($settings['service_img']['url'])):?>
        <div class="thumbnails-1">
            <div class="img-cover image-pllx">
                <img src="<?php echo esc_url($settings['service_img']['url']);?>" alt="<?php if(!empty($settings['service_img']['alt'])){ echo esc_attr($settings['service_img']['alt']);}?>">
            </div>
        </div>
    <?php endif;?>
</div>