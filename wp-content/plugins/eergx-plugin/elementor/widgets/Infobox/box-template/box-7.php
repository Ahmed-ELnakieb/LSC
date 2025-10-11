<div class="egx-design-2-left">
    <?php foreach($settings['infos'] as $item):?>
        <div class="egx-design-2-card wow fadeInUp" data-wow-duration="1s">
            <span class="icon">
                <?php if ($item['type'] === 'image' && ($item['icon_img']['url'])) :?>
                    <img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="<?php if(!empty($item['icon_img']['alt'])){ echo esc_attr($item['icon_img']['alt']);}else{esc_attr_e('List', 'goyto-plugin');}?>">
                <?php else:?>
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif;?>
            </span>

            <?php if(!empty($item['title'])):?>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
            <?php endif;?>

            <?php if(!empty($item['description'])):?>
                <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
            <?php endif;?>
            <?php if(!empty($item['link_label'])):?>
                <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>" class="card-btn">
                    <span class="btn-text"><?php echo esc_html($item['link_label']);?></span>
                    <span class="btn-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                </a>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</div>