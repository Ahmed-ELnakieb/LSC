<div class="egx-header-4-area txa_sticky_header">
    <div class="container egx-header-4-container">
        <div class="egx-header-4-wrap">
            <div class="egx-header-4-row">

                <!-- logo -->
                <a href="<?php echo esc_url(home_url());?>" aria-label="name" class="egx-header-4-logo d-block">
                    <img class="logo_site-size" src="<?php echo esc_url($settings['rzlogo']['url']);?>" alt="<?php if(!empty($settings['rzlogo']['alt'])){ echo esc_attr($settings['rzlogo']['alt']);}?>">
                </a>
                
                <!-- menu -->
                <nav class="main-navigation has-menu-4 d-none d-lg-block">
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

            <!-- actions -->
            <div class="egx-header-4-action">

                <div class="left">
                    <?php if(!empty($settings['phone_no'])):?>
                        <div class="call">
                            <span class="call-text"><?php echo esc_html($settings['phone_title']);?></span>
                            <a href="tel:<?php echo esc_attr($settings['phone_no']);?>" class="call-link"><?php echo esc_html($settings['phone_no']);?></a>
                        </div>
                    <?php endif;?>
                    <?php if(!empty($settings['btn_label'])):?>
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="header-btn"><span><?php echo eergx_wp_kses($settings['btn_label']);?></span></a>
                    <?php endif;?>
                </div>
                <?php if($settings['sear_hide_show'] === 'yes'):?>
                    <button class="search search_btn_toggle">
                        <span class="icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <span class="search-text"><?php echo esc_html($settings['search_btn_label']);?></span>
                    </button>
                <?php endif;?>
                <?php if($settings['hamburger'] === 'yes'):?>
                    <button class="sidebar-btn offcanvas_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
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
<?php $this->mobile_menu(); $this->___search_body(); $this->eergx_offcanvas_menu();?>