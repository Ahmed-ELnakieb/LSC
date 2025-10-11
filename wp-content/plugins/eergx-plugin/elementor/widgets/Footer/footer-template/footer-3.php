<div class="egx-footer-3-wrap">
    <div class="footer-info">
        <?php if(!empty($settings['logo']['url'])):?>
            <a href="<?php echo esc_url(home_url());?>" aria-label="name" class="logo">
                <img class="logo_site-size" src="<?php echo esc_url($settings['logo']['url']);?>" alt="<?php if(!empty($settings['logo']['alt'])){ echo esc_attr($settings['logo']['alt']);}?>">
            </a>
        <?php endif;?>
        <?php if(!empty($settings['abouts'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['abouts'])?></p>
        <?php endif;?>

        <?php if(!empty($settings['socials'])):?>
            <div class="social-media">
                <?php foreach($settings['socials'] as $item):?>
                    <a href="<?php echo esc_url($item['link']['url']);?>" class="social-link">
                        <span class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
                        <?php if(!empty($item['title'])):?>
                            <span class="text"><?php echo esc_html($item['title']);?></span>
                        <?php endif;?>
                    </a>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
    <div class="footer-menu-wrap">
        <div class="footer-menu">
            <ul>
                <?php foreach($settings['links'] as $item):?>
                <li>
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>">
                        <span class="icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                        <span class="text"><?php echo eergx_wp_kses($item['description'])?></span>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="footer-menu">
            <ul>
               <?php foreach($settings['links2'] as $item):?>
                    <li>
                        <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>">
                            <span class="icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                            <span class="text"><?php echo eergx_wp_kses($item['description'])?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="footer-menu">
            <ul>
            <?php foreach($settings['links3'] as $item):?>
                <li>
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>">
                        <span class="icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                        <span class="text"><?php echo eergx_wp_kses($item['description'])?></span>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<div class="divider-1"></div>