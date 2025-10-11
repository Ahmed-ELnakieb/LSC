<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-power-3-card wow fadeInUp">
    <div class="card-top">
        <div class="capacitye">
            <?php if(!empty($settings['title'])):?>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h5>
            <?php endif;?>
            <h3 class="egx-heading-1 number"><span class="counter"><?php echo esc_attr($settings['price']);?></span><span class="type"><?php echo eergx_wp_kses($settings['period'])?></span></h3>
        </div>
        <?php if(!empty($settings['pricing_img']['url'])):?>
            <div class="card-img">
                <img src="<?php echo esc_url($settings['pricing_img']['url']);?>" alt="<?php if(!empty($settings['pricing_img']['alt'])){ echo esc_attr($settings['pricing_img']['alt']);}?>">
            </div>
        <?php endif;?>
    </div>
    
    <?php if(!empty($settings['description'])):?>
        <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['description'])?></p>
    <?php endif;?>
    <div class="card-content">
        <ul>
            <?php foreach($settings['lists'] as $list):?>
                <li>
                    <spna class="icon"><?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?></spna>
                    <span class="list-text"><?php echo eergx_wp_kses($list['list_title'])?></span>
                </li>
            <?php endforeach;?>
        </ul>
        <?php if(!empty($settings['btn_label'])):?>
            <div class="btn-wrap">
                <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 power-btn hover-black-btn">
                    <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label']);?></span>
                </a>
            </div>
        <?php endif;?>
    </div>
</div>