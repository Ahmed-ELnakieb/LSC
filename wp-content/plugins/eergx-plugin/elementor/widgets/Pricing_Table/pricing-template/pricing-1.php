<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-benefit-1-card">
    <div class="card-top">
        <?php if(!empty($settings['shape']['url'])):?>
            <span class="icon">
                <img src="<?php echo esc_url($settings['shape']['url']);?>" alt="<?php if(!empty($settings['shape']['alt'])){ echo esc_attr($settings['shape']['alt']);}?>">
            </span>
        <?php endif;?>
        <div>
            <?php if(!empty($settings['price'])):?>
                <h3 class="price"><span class="dollar"><?php echo esc_attr($settings['currency']);?></span><?php echo esc_attr($settings['price']);?><span class="type"><?php echo eergx_wp_kses($settings['period'])?></span></h3>
            <?php endif;?>

            <?php if(!empty($settings['title'])):?>
                <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h4>
            <?php endif;?>
        </div>
    </div>
    <?php if(!empty($settings['pricing_img']['url'])):?>
        <div class="card-img img-cover">
            <img src="<?php echo esc_url($settings['pricing_img']['url']);?>" alt="<?php if(!empty($settings['pricing_img']['alt'])){ echo esc_attr($settings['pricing_img']['alt']);}?>">
        </div>
    <?php endif;?>
    <div class="card-body">
        <ul>
            <?php foreach($settings['lists'] as $list):?>
                <li>
                    <span class="icon"><?php \Elementor\Icons_Manager::render_icon( $list['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <span class="list-text"><?php echo eergx_wp_kses($list['list_title'])?></span>
                </li>
            <?php endforeach;?>
        </ul>
        <?php if(!empty($settings['btn_label'])):?>
            <div class="btn-wrap">
                <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
                    <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label']);?>" data-front="<?php echo eergx_wp_kses($settings['btn_label']);?>"></span>
                </a>
            </div>
        <?php endif;?>
    </div>
</div>