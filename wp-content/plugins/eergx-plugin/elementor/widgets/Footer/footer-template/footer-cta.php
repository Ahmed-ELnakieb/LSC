<div class="egx-footer-1-top">
    <div class="title-wrap">
        <?php if(!empty($settings['subtitle'])):?>
            <h5 class="subtitle"><?php echo eergx_wp_kses($settings['subtitle'])?></h5>
        <?php endif;?>
        <?php if(!empty($settings['title'])):?>
            <h3 class="egx-heading-1 title egx-split-text split-in-right"><?php echo eergx_wp_kses($settings['title'])?>
        </h3><?php endif;?>
    </div>
    <div class="store-wrap">
        <?php foreach($settings['apps'] as $item):?>
            <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" aria-label="name" class="<?php if(!empty($item['c_class'])){ echo esc_attr($item['c_class']);}?>">
                <img src="<?php echo esc_url($item['icon']['url']);?>" alt="<?php if(!empty($item['icon']['alt'])){ echo esc_attr($item['icon']['alt']);}else{esc_attr_e('Team Image', 'goyto-plugin');}?>">
            </a>
        <?php endforeach;?>
    </div>
</div>
<div class="footer-divider"></div>