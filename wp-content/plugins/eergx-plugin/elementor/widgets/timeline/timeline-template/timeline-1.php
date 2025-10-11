<div class="egx-process-2-wrap fix">
    <div class="step-top">
        <div class="step-number">
            <?php foreach($settings['timelines'] as $item):?>
                <h5 class="number egx-heading-1"><span><?php echo esc_html($item['count']);?></span></h5>
            <?php endforeach;?>
        </div>

        <?php foreach($settings['timelines'] as $item):?>
            <div class="item wow slideInDown" <?php if(!empty($item['anims'])):?> data-wow-delay="<?php echo esc_attr($item['anims']);?>" <?php endif;?>>
                <?php if(!empty($item['image']['url'])):?>
                    <span class="icon">
                        <img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php if(!empty($item['image']['alt'])){ echo esc_attr($item['image']['alt']);}?>">
                    </span>
                <?php endif;?>
                <?php if(!empty($item['title'])):?>
                    <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                <?php endif;?>
            </div>
        <?php endforeach;?>

    </div>
    <div class="step-progress">
        <?php if(!empty($settings['start'])):?>
            <div class="start">
                <h5 class="title"><?php echo eergx_wp_kses($settings['start'])?></h5>
            </div>
        <?php endif;?>
        <?php if(!empty($settings['finish'])):?>
            <div class="finish">
                <h5 class="title"><?php echo eergx_wp_kses($settings['finish'])?></h5>
            </div>
        <?php endif;?>
    </div>
    <div class="step-bottom">
        <div class="step-number">
        <?php foreach($settings['timelines2'] as $item):?>
            <h5 class="number egx-heading-1"><span><?php echo esc_html($item['count']);?></span></h5>
        <?php endforeach;?>
        </div>
        <?php foreach($settings['timelines2'] as $item):?>
            <div class="item wow slideInUp" <?php if(!empty($item['anims'])):?> data-wow-delay="<?php echo esc_attr($item['anims']);?>" <?php endif;?>>
                <?php if(!empty($item['image']['url'])):?>
                    <span class="icon">
                        <img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php if(!empty($item['image']['alt'])){ echo esc_attr($item['image']['alt']);}?>">
                    </span>
                <?php endif;?>
                <?php if(!empty($item['title'])):?>
                    <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                <?php endif;?>
            </div>
        <?php endforeach;?>
    </div>
</div>