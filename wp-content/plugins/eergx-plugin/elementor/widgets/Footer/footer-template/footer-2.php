<div class="egx-footer-2-wrap">
    <div class="footer-info">

        <?php if(!empty($settings['logo']['url'])):?>
            <a href="<?php echo esc_url(home_url());?>" aria-label="name" class="footer-logo">
                <img class="logo_site-size" src="<?php echo esc_url($settings['logo']['url']);?>" alt="<?php if(!empty($settings['logo']['alt'])){ echo esc_attr($settings['logo']['alt']);}?>">
            </a>
        <?php endif;?>
        <?php if(!empty($settings['abouts'])):?>
            <h4 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['abouts'])?></h4>
        <?php endif;?>
    </div>
    <div class="footer-menu">

        <?php if(!empty($settings['l_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['l_title'])?></h5>
        <?php endif;?>
        <ul>
            <?php foreach($settings['links'] as $item):?>
                <li>
                    <span class="icon"><i class="fa-solid fa-circle-check"></i></span>
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" class="link"><?php echo eergx_wp_kses($item['description'])?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="footer-menu">
        <?php if(!empty($settings['l2_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['l2_title'])?></h5>
        <?php endif;?>
        <ul>
            <?php foreach($settings['links2'] as $item):?>
                <li>
                    <span class="icon"><i class="fa-solid fa-circle-check"></i></span>
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" class="link"><?php echo eergx_wp_kses($item['description'])?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="footer-contact">
        <?php if(!empty($settings['c_title'])):?>
            <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['c_title'])?></h5>
        <?php endif;?>
        <?php if(!empty($settings['address'])):?>
            <p class="egx-para-1 address"><?php echo eergx_wp_kses($settings['address'])?></p>
        <?php endif;?>
        <?php if(!empty($settings['socials'])):?>
            <div class="social-media">
                <?php foreach($settings['socials'] as $item):?>
                    <a href="<?php echo esc_url($item['link']['url']);?>" class="social-link">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>
                <?php endforeach;?>

            </div>
        <?php endif;?>
    </div>
</div>
<div class="divider"></div>