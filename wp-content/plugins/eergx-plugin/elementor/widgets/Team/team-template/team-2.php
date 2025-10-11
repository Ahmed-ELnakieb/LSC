<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-team-4-area">
    <div class="egx-team-4-wrap">
        <?php foreach($settings['teams'] as $item):?>
        <div class="egx-team-4-card">
            <div class="card-img bg-default" data-background="<?php echo esc_url($settings['team_bg_img']['url']);?>">
                <img src="<?php echo esc_url($item['team_img']['url']);?>" alt="<?php if(!empty($item['team_img']['alt'])){ echo esc_attr($item['team_img']['alt']);}else{esc_attr_e('Team Image', 'goyto-plugin');}?>">
            </div>
            <div class="card-content">
                <h5 class="egx-heading-1 name"><?php echo eergx_wp_kses($item['name'])?></h5>
                <span class="egx-heading-1 designation"><?php echo eergx_wp_kses($item['designation'])?></span>
                <div class="divider"></div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="team-bottom">
    <?php if(!empty($settings['info'])):?>
        <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['info'])?></p>
    <?php endif;?>
        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="link"><?php echo eergx_wp_kses($settings['btn_label']);?></a>
    </div>    
</div>