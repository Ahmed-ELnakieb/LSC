<?php 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
}
?>
<div class="egx-energy-1-area">
    <div class="egx-energy-1-top">
        <div class="section-title-wrap">

            <?php if(!empty($settings['subtitle'])):?>
                <h2 class="energy-title"><?php echo eergx_wp_kses($settings['subtitle']);?></h2>
            <?php endif;?>

            <?php if(!empty($settings['title'])):?>
                <h2 class="energy-title-big"><?php echo eergx_wp_kses($settings['title']);?></h2>
            <?php endif;?>

        </div>
        <?php if(!empty($settings['btn_label'])):?>
            <div class="btn-wrap">
                <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
                    <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label']);?>" data-front="<?php echo eergx_wp_kses($settings['btn_label']);?>"></span>
                </a>
            </div>
        <?php endif;?>
        <?php if(!empty($settings['img_1']['url'])):?>
            <div class="cloud-2">
                <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
            </div>
        <?php endif;?>
    </div>
    <div class="egx-energy-1-wrap">
        <?php if(!empty($settings['img_2']['url'])):?>
        <div class="cloud-1">
            <img src="<?php echo esc_url($settings['img_2']['url']);?>" alt="<?php if(!empty($settings['img_2']['alt'])){ echo esc_attr($settings['img_2']['alt']);}?>">
        </div>
        <?php endif;?>
        <div class="energy-left egx-class-add">
            <?php if(!empty($settings['img_3']['url'])):?>
                <div class="main-img">
                    <img src="<?php echo esc_url($settings['img_3']['url']);?>" alt="<?php if(!empty($settings['img_3']['alt'])){ echo esc_attr($settings['img_3']['alt']);}?>">
                </div>
            <?php endif;?>
            <?php if(!empty($settings['img_4']['url'])):?>
                <div class="shape-bg">
                    <img src="<?php echo esc_url($settings['img_4']['url']);?>" alt="<?php if(!empty($settings['img_4']['alt'])){ echo esc_attr($settings['img_4']['alt']);}?>">
                </div>
            <?php endif;?>
            <?php if(!empty($settings['count'])):?>
                <div class="saving">
                    <h3 class="number"><span class="counter"><?php echo esc_html($settings['count'])?></span><?php if(!empty($settings['prefix'])):?><span class="parcent"><?php echo esc_html($settings['prefix'])?></span> <?php endif;?>
                    </h3>
                    <?php if(!empty($settings['count_title'])):?>
                        <h5 class="egx-heading-1 title"><?php echo esc_html($settings['count_title'])?></h5>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
        <?php if(!empty($settings['features'])):?>
        <div class="energy-right">
            <?php foreach($settings['features'] as $item):?>
            <div class="item">
                <span class="icon">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
            </div>
            <?php endforeach;?>

        </div>
        <?php endif;?>
    </div>
</div>