<div class="egx-our_history-1-wrap">
    <?php foreach($settings['services'] as $item):?>
        <div class="egx-our_history-1-card">
            <?php if(!empty($item['service_img']['url'])):?>
                <div class="main-img img-cover">
                    <img src="<?php echo esc_url($item['service_img']['url']);?>" alt="<?php if(!empty($item['service_img']['alt'])){ echo esc_attr($item['service_img']['alt']);}?>">
                </div>
            <?php endif;?>
            <div class="content">
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                <?php if(!empty($item['description'])):?>
                    <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
                <?php endif;?>
            </div>
        </div>
    <?php endforeach;?>
</div>