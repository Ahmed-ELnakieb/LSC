<div class="egx-services-4-wrap fix">
    <?php foreach($settings['services'] as $item):?>
    <div class="egx-services-4-card bg-default wow slideInUp" <?php if(!empty($item['anims'])):?> data-wow-delay="<?php echo esc_attr($item['anims']);?>" <?php endif;?> data-background="<?php echo esc_url($item['service_bg_img']['url']);?>">
        <?php if(!empty($item['service_img']['url'])):?>
        <span class="icon">
            <img src="<?php echo esc_url($item['service_img']['url']);?>" alt="<?php if(!empty($item['service_img']['alt'])){ echo esc_attr($item['service_img']['alt']);}?>">
        </span>
        <?php endif;?>
        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
        <?php if(!empty($item['description'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
        <?php endif;?>
        <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>" class="link">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
    <?php endforeach;?>
    
</div>