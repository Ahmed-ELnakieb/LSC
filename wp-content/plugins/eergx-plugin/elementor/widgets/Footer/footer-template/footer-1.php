<div class="egx-footer-1-wrap">
    <div class="footer-info">
        <?php if(!empty($settings['c_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['c_title'])?></h5>
        <?php endif;?>
        <div class="action">
            <?php foreach($settings['infos'] as $item):?>
                <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" class="link">
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <span class="link-text"><?php echo eergx_wp_kses($item['description'])?></span>
                </a>
            <?php endforeach;?>
        </div>
    </div>
    <div class="footer-menu">
        <?php if(!empty($settings['l_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['l_title'])?></h5>
        <?php endif;?>
        <div class="footer-list">
            <ul>
                <?php foreach($settings['links'] as $item):?>
                    <li>
                        <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>">
                            <i class="fa-regular fa-circle-check"></i>
                            <span><?php echo eergx_wp_kses($item['description'])?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
            <ul>
                <?php foreach($settings['links2'] as $item):?>
                    <li>
                        <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>">
                            <i class="fa-regular fa-circle-check"></i>
                            <span><?php echo eergx_wp_kses($item['description'])?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <div class="footer-newsletter">
        <?php if(!empty($settings['n_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['n_title'])?></h5>
        <?php endif;?>
        <?php if(!empty($settings['text'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['text'])?></p>
        <?php endif;?>
        <div class="newsletter-form">
            <?php echo do_shortcode($settings['shortcode']);?>
        </div>
        <?php if(!empty($settings['info'])):?>
            <span class="egx-para-1 update-mess"><?php echo eergx_wp_kses($settings['info'])?></span>
        <?php endif;?>
    </div>
</div>