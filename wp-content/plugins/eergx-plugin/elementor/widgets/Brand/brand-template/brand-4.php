<div class="egx-client-4-wrap">
    <?php foreach($settings['brands'] as $item):?>  
        <div class="client-item">
            <img src="<?php echo esc_url($item['brand_img']['url']);?>" alt="<?php if(!empty($item['brand_img']['alt'])){ echo esc_attr($item['brand_img']['alt']);}?>">
        </div>
    <?php endforeach;?>
</div>