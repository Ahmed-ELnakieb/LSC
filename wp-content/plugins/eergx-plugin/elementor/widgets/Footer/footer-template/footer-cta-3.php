<div class="egx-footer-3-bottom">
    <div class="newsletter">
        <?php if(!empty($settings['title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['title']);?></h5>
        <?php endif;?>
        <?php if(!empty($settings['shortcode'])){
            echo do_shortcode($settings['shortcode']);
        }?>
    </div>
    <div class="gallery-wrap">
        <div class="gallery">
            <?php foreach($settings['gallery'] as $item):?>
                <a href="<?php echo esc_url($item['url']);?>" aria-label="gallery img" class="gallery-item img-cover popup_img">
                    <img src="<?php echo esc_url($item['url']);?>" alt="">
                    <span class="icon-1">
                        <i class="fa-regular fa-image"></i>
                    </span>
                </a>
            <?php endforeach;?>
        </div>
        <?php if(!empty($settings['infos'])):?>
            <div class="action">
                <ul>
                    <?php foreach($settings['infos'] as $item):?>
                        <li>
                            <span class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </span>
                            <a href="<?php echo esc_html($item['link']['url']);?>" class="link"><?php echo esc_html($item['title']);?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        <?php endif;?>
    </div>
</div>
<?php if(!empty($settings['copyright'])):?>
    <p class="copyright"><?php echo eergx_wp_kses($settings['copyright'])?></p>
<?php endif;?>