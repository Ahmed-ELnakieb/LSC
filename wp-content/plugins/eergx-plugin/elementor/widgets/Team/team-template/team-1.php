<div class="egx-team-3-right">
    <div class="swiper-container egx_team_3_active">
        <div class="swiper-wrapper">
            <?php foreach($settings['teams'] as $item):?>
                <div class="swiper-slide">
                <div class="egx-team-3-item">
                    <div class="team-top">
                        <div class="team-img img-cover">
                            <img src="<?php echo esc_url($item['team_img']['url']);?>" alt="<?php if(!empty($item['team_img']['alt'])){ echo esc_attr($item['team_img']['alt']);}else{esc_attr_e('Team Image', 'goyto-plugin');}?>">
                        </div>
                        <div class="plus-icon">
                            <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="social-media">
                            <?php foreach($item['social_links'] as $social):?>
                                <a class="social-link" target="<?php echo esc_attr( $social['social_link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $social['social_link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $social['social_link']['url'] ? esc_url($item['link']['url']) : ''; ?>" aria-label="name"><?php \Elementor\Icons_Manager::render_icon( $social['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="egx-heading-1 name"><?php echo eergx_wp_kses($item['name'])?></h4>
                        <span class="egx-heading-1 designation"><?php echo eergx_wp_kses($item['designation'])?></span>
                    </div>
                </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="navigator">
        <div class="egx-team-3-prev">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="egx-team-3-next">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
    </div>
    </div>