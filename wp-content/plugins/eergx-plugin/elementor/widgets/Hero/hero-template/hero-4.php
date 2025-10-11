<div class="egx-hero-4-area">
    <div class="egx-hero-4-wrap">
        <?php if(!empty($settings['img_1']['url'])):?>
        <div class="shape-1">
            <img src="<?php echo esc_url($settings['img_1']['url']);?>" alt="<?php if(!empty($settings['img_1']['alt'])){ echo esc_attr($settings['img_1']['alt']);}?>">
        </div>
        <?php endif;?>
        <?php if(!empty($settings['img_2']['url'])):?>
        <div class="shape-2">
            <img src="<?php echo esc_url($settings['img_2']['url']);?>" alt="<?php if(!empty($settings['img_2']['alt'])){ echo esc_attr($settings['img_2']['alt']);}?>">
        </div>
        <?php endif;?>

        <div class="fan">
            <?php if(!empty($settings['img_3']['url'])):?>
                <div class="fan-circle">
                    <img src="<?php echo esc_url($settings['img_3']['url']);?>" alt="<?php if(!empty($settings['img_3']['alt'])){ echo esc_attr($settings['img_3']['alt']);}?>">
                </div>
            <?php endif;?>
            <?php if(!empty($settings['img_4']['url'])):?>
                <div class="fan-line">
                    <img src="<?php echo esc_url($settings['img_4']['url']);?>" alt="<?php if(!empty($settings['img_4']['alt'])){ echo esc_attr($settings['img_4']['alt']);}?>">
                </div>
            <?php endif;?>
        </div>

        <?php if(!empty($settings['socials'])):?>
        <div class="social-media">
            <?php foreach($settings['socials'] as $item):?>
                <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" class="social-link">
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <?php if(!empty($item['title'])):?>
                    <span class="social-text"><?php echo eergx_wp_kses($item['title']); ?></span>
                    <?php endif;?>
                </a>
            <?php endforeach;?>
            
        </div>
        <?php endif;?>
        <!-- slider pagination -->
        <div class="egx-hero-4-pagination"></div>
        <div class="swiper-container egx_hero_4_active">
            <div class="swiper-wrapper">
                <?php foreach($settings['sliders'] as $item):
                    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-heading-1 hero-title egx-split-text' );
                ?>
                <div class="swiper-slide">
                <div class="container egx-container-2">
                    <div class="egx-hero-4-item">
                    <?php if(!empty($item['sub_title'])):?>
                        <h5 class="egx-subtitle-2 egx-class-add">
                            <div class="bubble-left">
                                <span class="bubble-1 sbl_1"></span>
                                <span class="bubble-2 sbl_2"></span>
                                <span class="bubble-3 sbl_3"></span>
                                <span class="bubble-4 sbl_4"></span>
                            </div>
                            <?php echo eergx_wp_kses($item['sub_title']); ?>
                            <div class="bubble-right">
                                <span class="bubble-1"></span>
                                <span class="bubble-2"></span>
                                <span class="bubble-3"></span>
                                <span class="bubble-4"></span>
                            </div>
                        </h5>
                        <?php endif;?>
                        <?php printf('<%1$s %2$s txaa-split-text-1>%3$s</%1$s>',
                    tag_escape($item['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $item['title']
                        ); ?>
                        <?php if(!empty($item['description'])):?>
                            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description']); ?></p>
                        <?php endif;?>
                        <?php if(!empty($item['btn_label'])):?>
                        <div class="btn-wrap">
                            <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="egx-btn-3">
                                <span class="btn-text"><?php echo eergx_wp_kses($item['btn_label'])?></span>
                                <span class="btn-icon">
                                    <svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="1" width="30" height="30" rx="15" stroke="white" stroke-width="2"/>
                                        <path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z" />
                                        <path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php if(!empty($item['slide_img']['url'])):?>
                        <div class="bg-img">
                            <img src="<?php echo esc_url($item['slide_img']['url']);?>" alt="<?php if(!empty($item['slide_img']['alt'])){ echo esc_attr($item['slide_img']['alt']);}?>">
                        </div>
                    <?php endif;?>
                    <?php if(!empty($item['text'])):?>
                        <h2 class="hightlight-text egx-split-text-large"><?php echo eergx_wp_kses($item['text'])?></h2>
                    <?php endif;?>
                </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>
    </div>