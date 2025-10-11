<div class="wrapper">
    <div class="egx-gallery-1-wrap">
        <?php foreach($settings['gallery'] as $item):?>
            <div class="item">
                <img src="<?php echo esc_url($item['url']);?>" alt="">
            </div>
        <?php endforeach;?>
    </div>
</div>