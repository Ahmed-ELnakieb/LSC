<div class="egx-services-2-area">
    <div class="egx-services-2-wrap" data-fx="1">
        <?php foreach($settings['services'] as $item):?>
            <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>" class="block__link" data-img="<?php echo esc_url($item['service_img']['url']);?>">
                <div class="egx-services-2-item">
                    <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h4>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </a>
        <?php endforeach;?>
    </div>
</div>