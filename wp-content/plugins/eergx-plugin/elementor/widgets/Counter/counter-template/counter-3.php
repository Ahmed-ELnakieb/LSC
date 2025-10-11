<div class="egx-team-3-left">
    <div class="left-wrap">
        <div class="experience">
            <?php foreach($settings['counters'] as $item):?>
                <div class="item">
                    <h3 class="number">
                        <span class="counter"><?php echo eergx_wp_kses($item['count'])?></span><?php if(!empty($item['prefix'])):?><?php echo eergx_wp_kses($item['prefix'])?><?php endif;?>
                    </h3>
                    <h5 class="title egx-heading-1"><?php echo eergx_wp_kses($item['title'])?></h5>
                </div>
            <?php endforeach;?> 

        </div>
        <?php if(!empty($settings['desc'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['desc']);?></p>
        <?php endif;?>
    </div>
</div>