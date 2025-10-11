<div class="egx-marque-2-area">
    <div class="egx-1-marquee">
        <div class="marque-wrapper">
            <?php foreach($settings['movings'] as $item):?>
                <div class="item">
                    <?php if(!empty($item['icon_img']['url'])):?>
                        <span class="icon">
                            <img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="<?php if(!empty($item['icon_img']['alt'])){ echo esc_attr($item['icon_img']['alt']);}else{esc_attr_e('List', 'eergx-plugin');}?>">
                        </span>
                    <?php endif;?>
                    <h3 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h3>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>