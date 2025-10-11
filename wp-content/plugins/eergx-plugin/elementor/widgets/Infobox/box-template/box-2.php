<?php 
    if ( ! empty( $settings['link']['url'] ) ) {
        $this->add_link_attributes( 'link', $settings['link'] );
    }
?>
<div class="egx-hero-2-right">
    <?php if(!empty($settings['img_1']['url'])):?>
        <span class="icon">
            <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
        </span>
    <?php endif;?>
    <div>
        <?php if(!empty($settings['title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h5>
        <?php endif;?>
        <?php if(!empty($settings['description'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['description'])?></p>
        <?php endif;?>
    </div>
    <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="link">
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>