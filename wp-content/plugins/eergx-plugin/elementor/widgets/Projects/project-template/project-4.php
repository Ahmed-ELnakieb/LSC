<?php 
    if ( ! empty( $settings['link']['url'] ) ) {
        $this->add_link_attributes( 'link', $settings['link'] );
    }
?>
<div class="egx-project-5-wrap">
    <div class="egx-project-5-card">
        <div class="card-img">
            <img src="<?php echo esc_url($settings['project_img']['url']);?>" alt="<?php if(!empty($settings['project_img']['alt'])){ echo esc_attr($settings['project_img']['alt']);}?>">
        </div>
        <div class="card-content">
            <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h4>
            <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="link">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>