<div class="list-mainarea">
    <?php foreach($settings['lists'] as $item):?>
        <div class="item">
            <span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
            <span class="item-text"><?php echo eergx_wp_kses($item['title'])?></span>
        </div>
    <?php endforeach;?>
</div>