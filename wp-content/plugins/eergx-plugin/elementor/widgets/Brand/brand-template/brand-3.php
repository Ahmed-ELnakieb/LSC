<div class="egx-client-3-area">
    <?php if(!empty($settings['title'])):?>
        <div class="section-title-wrap text-center">
            <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title'])?></h4>
        </div>
    <?php endif;?>
    <div class="egx-client-3-wrap">

        <?php foreach($settings['brands'] as $item):?>     
            <div class="client-item">
                <div class="img">
                <img src="<?php echo esc_url($item['brand_img']['url']);?>" alt="<?php if(!empty($settings['brand_img']['alt'])){ echo esc_attr($settings['brand_img']['alt']);}?>">
                </div>
                <div class="img">
                    <img src="<?php echo esc_url($item['brand_img']['url']);?>" alt="<?php if(!empty($settings['brand_img']['alt'])){ echo esc_attr($settings['brand_img']['alt']);}?>">
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>
