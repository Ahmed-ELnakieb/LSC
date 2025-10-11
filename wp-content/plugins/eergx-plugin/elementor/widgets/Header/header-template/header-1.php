<div class="egx-header-1-area txa_sticky_header has-shadow">
    <div class="egx-header-1-topbar">
        <div class="topbar-wrap">
            <div class="action">
                <?php foreach($settings['infos'] as $item):?>
                    <a href="<?php echo eergx_wp_kses($item['link']['url'])?>">
                        <sapn class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icons'], [ 'aria-hidden' => 'true' ] ); ?>
                        </sapn>
                        <span class="link-text"><?php echo eergx_wp_kses($item['info_text'])?></span>
                    </a>
                <?php endforeach;?>

            </div>
            <div class="social-media">
                <?php foreach($settings['header_socials'] as $item):?>
                    <a href="<?php echo esc_url($item['link']['url']);?>" class="social-link">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icons'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="container egx-header-1-container">
        <div class="egx-header-1-wrap">
            <div class="egx-header-1-row" >

                <!-- logo -->
                <a href="<?php echo esc_url(home_url());?>" aria-label="name" class="egx-header-1-logo d-block">
                    <img class="logo_site-size" src="<?php echo esc_url($settings['rzlogo']['url']);?>" alt="<?php if(!empty($settings['rzlogo']['alt'])){ echo esc_attr($settings['rzlogo']['alt']);}?>">
                </a>
                
                
                <!-- menu -->
                <div class="egx-header-1-navigation-bar d-none d-lg-flex">

                    <nav class="main-navigation d-none d-lg-block">
                        <?php
                            echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'], wp_nav_menu( array(
                                'echo'           => false,
                                'menu' => !empty($settings['choose-menu']) ? $settings['choose-menu'] : 'menu-1',
                                'menu_id'        =>'main-nav',
                                'menu_class'        =>'nav navbar-nav clearfix',
                                'container'=>false,
                                'fallback_cb'    => 'Navwalker_Class::fallback',
                                'walker'         => class_exists( 'Rs_Mega_Menu_Walker' ) ? new \Rs_Mega_Menu_Walker : '',
                            )) );
                        ?>
                    </nav> 
                </div>
                
            </div>

            <!-- actions -->
            <div class="egx-header-1-action">
                <?php if(!empty($settings['btn_label'])):?>
                    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
                        <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label']);?>" data-front="<?php echo eergx_wp_kses($settings['btn_label']);?>"></span>
                    </a>
                <?php endif;?>
                <?php if($settings['sear_hide_show'] === 'yes'):?>
                    <button class="egx-header-1-search-btn search_btn_toggle">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                <?php endif;?>
            </div>

            <!-- menu btn -->
            <button class="egx-menu-btn-1 d-lg-none open_menu open_mobile_menu" id="menuToggle">
                <svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" x="0px" y="0px" viewBox="0 0 24 24"
                    style="enable-background:new 0 0 24 24;" xml:space="preserve">
                    <path class="svg-path" d="M1,12h22 M1,4.7h22 M8.3,19.3H23"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
<?php $this->mobile_menu(); $this->___search_body();?>