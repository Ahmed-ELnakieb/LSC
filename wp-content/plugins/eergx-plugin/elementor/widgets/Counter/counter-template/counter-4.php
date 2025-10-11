<div class="egx-explore-3-right">
    <?php if(!empty($settings['image']['url'])):?>
        <div class="right-img">
            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
        </div>
    <?php endif;?>

    <div class="goal wow slideInUp">
        <?php if(!empty($settings['title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h5>
        <?php endif;?>
        <div class="goal-wrap">
         <?php foreach($settings['counters'] as $item):?>
            <div class="item">
                <span class="icon">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <div>
                    <h4 class="number egx-heading-1"><span class="counter"><?php echo eergx_wp_kses($item['count'])?></span><?php if(!empty($item['prefix'])):?><?php echo eergx_wp_kses($item['prefix'])?><?php endif;?></h4>
                    <span class="egx-heading-1 item-title"><?php echo eergx_wp_kses($item['title'])?></span>
                </div>
            </div>
            <?php endforeach;?> 

        </div>
    </div>
</div>