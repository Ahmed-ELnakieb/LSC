<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-about-4-wrap egx-class-add">

    <?php if(!empty($settings['img_1']['url'])):?>
        <div class="img-1">
            <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
        </div>
    <?php endif;?>

    <?php if(!empty($settings['img_2']['url'])):?>
        <div class="img-2">
            <img src="<?php echo esc_url($settings['img_2']['url']);?>" alt="<?php if(!empty($settings['img_2']['alt'])){ echo esc_attr($settings['img_2']['alt']);}?>">
        </div>
    <?php endif;?>

    <?php if(!empty($settings['img_3']['url'])):?>
        <div class="img-3">
            <img src="<?php echo esc_url($settings['img_3']['url']);?>" alt="<?php if(!empty($settings['img_3']['alt'])){ echo esc_attr($settings['img_3']['alt']);}?>">
        </div>
    <?php endif;?>

    <?php if(!empty($settings['img_4']['url'])):?>
        <div class="img-4">
            <img src="<?php echo esc_url($settings['img_4']['url']);?>" alt="<?php if(!empty($settings['img_4']['alt'])){ echo esc_attr($settings['img_4']['alt']);}?>">
        </div>
    <?php endif;?>
    <?php if(!empty($settings['subtitle'])):?>
        <h5 class="egx-subtitle-2 egx-class-add">
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
    <h4 class="egx-heading-1 title egx-split-text-2 egx-split-text-2-ani"><?php echo eergx_wp_kses($settings['title'])?></h4>
    <div class="line-wrap">
        <div class="line about-4-line"></div>
        <div class="circle about-4-line-circle"></div>
    </div>
    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-3">
        <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label'])?></span>
        <span class="btn-icon">
            <svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="30" height="30" rx="15" stroke="white" stroke-width="2"/>
                <path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z" />
                <path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z" />
            </svg>
        </span>
    </a>
</div>