<div class="egx-client-2-wrap">
    <?php foreach($settings['brands'] as $item):?>     
        <div class="item">
            <img src="<?php echo esc_url($item['brand_img']['url']);?>" alt="<?php if(!empty($settings['brand_img']['alt'])){ echo esc_attr($settings['brand_img']['alt']);}?>">
        </div>
    <?php endforeach;?>
</div>