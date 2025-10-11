<?php 
    if ( ! empty( $settings['link']['url'] ) ) {
        $this->add_link_attributes( 'link', $settings['link'] );
    }
?>
<a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="egx-services-1-card wow slideInDown" data-wow-delay="<?php if(!empty($settings['animsp'])){ echo esc_attr($settings['animsp']);}?>">
    <div class="card-img">
        <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
    </div>
    <?php if(!empty($settings['count'])):?>
        <h5 class="egx-heading-1 number"><?php echo esc_html($settings['count']);?></h5>
    <?php endif;?>
    <div class="content">
        <?php if(!empty($settings['title'])):?>
            <h5 class="egx-heading-1 subtitle"><?php echo eergx_wp_kses($settings['title'])?></h5>
        <?php endif;?>
        <?php if(!empty($settings['description'])):?>
            <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['description'])?></h4>
        <?php endif;?>
    </div>
</a>