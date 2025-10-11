<div class="egx-experience-4-area">
        <?php if(!empty($settings['image']['url'])):?>
            <div class="bg-img img-cover">
                <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
            </div>
       <?php endif;?>
    <div class="content-wrap">
        <div class="egx-experience-4-wrap bg-default parallax-img" data-background="<?php echo esc_url($settings['ct_bg_image']['url']);?>">
            <div class="egx-experience-4-item bg-default" data-background="<?php echo esc_url($settings['ct_single_bg']['url']);?>">
                <h3 class="number"><span class="counter"><?php echo esc_html($settings['count']);?></span><?php if(!empty($settings['prefix'])):?><span class="last"><?php echo eergx_wp_kses($settings['prefix'])?></span><?php endif;?></h3>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h5>
            </div>
            <div class="bottom-items">
                <?php foreach($settings['counters'] as $item):?>
                <div class="egx-experience-4-item bg-default <?php if(!empty($item['c_class'])){ echo esc_attr($item['c_class']);}?>" data-background="<?php echo esc_url($item['ct_single_bg']['url']);?>">
                    <h3 class="number"><span class="counter"><?php echo esc_html($item['count']);?></span><?php if(!empty($item['prefix'])):?><span class="last">
                            <?php echo eergx_wp_kses($item['prefix'])?>
                        </span><?php endif;?></h3>
                    <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                </div>
                <?php endforeach;?> 
            </div>
        </div>
    </div>
</div>