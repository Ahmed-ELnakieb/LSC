<div class="egx-experience-1-wrap">
    <?php foreach($settings['counters'] as $item):?>
        <div class="egx-experience-1-item">
            <span class="icon">
                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </span>
            <h3 class="number egx-heading-1"><span class="counter"><?php echo eergx_wp_kses($item['count'])?></span><?php if(!empty($item['prefix'])):?><?php echo eergx_wp_kses($item['prefix'])?><?php endif;?>
            </h3>
            <span class="title"><?php echo eergx_wp_kses($item['title'])?></span>
        </div>
    <?php endforeach;?> 
</div>