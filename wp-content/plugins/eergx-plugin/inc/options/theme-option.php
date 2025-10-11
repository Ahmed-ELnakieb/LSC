<?php
/*
 * Theme Options
 * @package eergx
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'eergx';

    //
    // Create options
    CSF::createOptions( $prefix . '_theme_options', array(
        'menu_title'         => 'Eergx Option',
        'menu_slug'          => 'eergx-theme-option',
        'menu_type'          => 'menu',
        'enqueue_webfont'    => true,
        'show_in_customizer' => true,
        'menu_icon' => 'dashicons-category',
        'menu_position' => 50,
        'theme'                   => 'dark',
        'framework_title'    => wp_kses_post( 'Haptic Options <small>by Raziul <br/> Version: 1.0</small> ' ),
        'footer_text'    => wp_kses_post( 'The Theme will Created By Themexriver ' ),
    ) );

    // Create a top-tab
    CSF::createSection( $prefix . '_theme_options', array(
        'id'    => 'header_opts', // Set a unique slug-like ID
        'title' => 'Header',
    ) );


    /*-------------------------------------------------------
     ** Logo Settings  Options
    --------------------------------------------------------*/

    /*-------------------------------------------------------
     ** Header  Options
    --------------------------------------------------------*/

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'General Settings',
        'id'     => 'general_settings',
        'icon'   => 'fa fa-refresh',
        'fields' => array(

            array(
                'id'      => 'preloader_enable',
                'title'   => esc_html__( 'Enable Preloader', 'eergx-tools' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable or Disable Preloader', 'eergx-tools' ),
                'default' => true,
            ),
            
            array(
                'id'      => 'eergx_custom_preloader',
                'title'   => esc_html__( 'Upload Loader Logo', 'eergx-tools' ),
                'type'    => 'media',
                'desc'    => esc_html__( 'If you Want to Upload Svg or png logo for preloader? them at first remove preloader logo text and then upload logo here', 'eergx-tools' ),
                'dependency' => array( 
                    'preloader_enable', '==', 'true',
                ),
            ),
            array(
                'id'      => 'scroll_up_btn',
                'title'   => esc_html__( 'Scroll Up SHOW/HIDE', 'eergx-tools' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable or Disable Scroll UP', 'eergx-tools' ),
                'default' => true,
            ),

        ),
    ) );

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Header', 'eergx-tools' ),
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Layout', 'eergx-tools' ) . '</h3>',
            ),

            array(
                'id'          => 'header_style',
                'type'        => 'select',
                'title'       => __('Select Header Style', 'eergx-tools' ),
                'options'     => Eergx_Plugin_Helper::get_header_types(),
            ), 
            array(
                'id'      => 'eergx_logo',
                'title'   => esc_html__( 'Default Logo', 'eergx-tools' ),
                'type'    => 'media',
                'desc'    => esc_html__( 'Upload Logo', 'eergx-tools' ),
                'default' => true,
            ),
           
        ),
    ) );

    
    /*-------------------------------------
     ** Typography Options
    -------------------------------------*/
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Typography', 'eergx-tools' ),
        'id'     => 'typography_options',
        'icon'   => 'fa fa-font',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Body', 'eergx-tools' ) . '</h3>',
            ),

            array(
                'id'     => 'body-typography',
                'type'   => 'typography',
                'output' => 'body',

            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Heading', 'eergx-tools' ) . '</h3>',
            ),

            array(
                'id'     => 'heading-gl-typo',
                'type'   => 'typography',
                'output' => 'h1, h2, h3, h4, h5, h6',
            ),

        ),
    ) );

    // Product
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Woocommerce Option', 'eergx-tools' ),
        'id'     => 'woo_option',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Woocommerce Option', 'eergx-tools' ) . '</h3>',
            ),

            array(
                'id'      => 'product_count',
                'title'   => esc_html__( 'Product Count', 'eergx-tools' ),
                'type'    => 'text',
                'default' => '12',
            ),
            array(
				'id'       => 'enable_shop_preadcrumb',
				'type'     => 'switcher',
				'title'    => __( 'Page Breadcrumb', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => true
			),
            array(
                'id'      => 'shop_breadcrumb_bg',
                'title'   => esc_html__( 'Shop Breadcrumb BG', 'eergx-tools' ),
                'type'    => 'media',
                'dependency' => array( 'enable_shop_preadcrumb', '==', 'true' ),
            ),
            array(
                'id'      => 'shop_breadcrumb_title',
                'title'   => esc_html__( 'Shop Breadcrumb Title', 'eergx-tools' ),
                'type'    => 'text',
                'dependency' => array( 'enable_shop_preadcrumb', '==', 'true' ),
            ),
            array(
				'id'       => 'enable_single_product_preadcrumb',
				'type'     => 'switcher',
				'title'    => __( 'Shop Enable Breadcrumb', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => true
			),
            array(
                'id'      => 'product_single_breadcrumb_bg',
                'title'   => esc_html__( 'Product Single Breadcrumb BG', 'eergx-tools' ),
                'type'    => 'media',
                'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
            ),
            array(
                'id'      => 'product_single_breadcrumb_title',
                'title'   => esc_html__( 'Shop Breadcrumb Title', 'eergx-tools' ),
                'type'    => 'text',
                'dependency' => array( 'enable_single_product_preadcrumb', '==', 'true' ),
            ),
           
        ),
    ) );

    // blog optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Blog', 'eergx-tools' ),
        'id'     => 'blog_page',
        'icon'   => 'fa fa-rss-square',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Blog Options', 'eergx-tools' ) . '</h3>',
            ),
            
            array(
                'id'      => 'br_custom_title',
                'type'    => 'text',
                'title'   => esc_html__('Blog Breadcrumb Title', 'eergx-tools'),
                'desc'    => esc_html__('If you Do not Blog Breadcrumb Custom Title then type Title Here', 'eergx-tools'),
            ),
            array(
                'id'      => 'breadcrumb_bg',
                'type'    => 'media',
                'title'   => esc_html__('Single Breadcrumb BG', 'eergx-tools'),
            ),
            
            array(
                'id'      => 'blog_btn_text',
                'type'    => 'text',
                'title'   => esc_html__( 'Blog Read More Button', 'eergx-tools' ),
                'default' => esc_html__( 'Explore More', 'eergx-tools' ),
                'desc'    => esc_html__( 'Type Blog Read More Button Text Here', 'eergx-tools' ),
            ),
        ),
    ) );
    

   // eergx Color Setting
   CSF::createSection( $prefix . '_theme_options', array(
    'title'  => 'Color Control',
    'id'     => 'apix_color_control',
    'icon'   => 'fa fa-paint-brush',
    'fields' => array(
        

        array(  //nav bar one start
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Theme Global Color', 'eergx-tools' ) . '</h3>',
        ),
        array(
            'id'    => 'theme-color-1',
            'type'  => 'color',
            'title' => 'Theme Primary Color',
            'default' => '#7cbb3b'
        ),
        array(
            'id'    => 'theme-color-2',
            'type'  => 'color',
            'title' => 'Theme Secondary Color',
            'default' => '#B9D32A'
        ),
        array(
            'id'        => 'gradient_mp',
            'type'      => 'color_group',
            'title'     => 'Gradient Color One',
            'options'   => array(
              'color-1' => 'Color 1',
              'color-2' => 'Color 2',
              'color-3' => 'Color 3',
            ),
            'default'   => array(
                'color-1' => '#d6df22',
                'color-2' => '#7cbb3b',
                'color-3' => '#219753',
            )
        ),
        array(
            'id'        => 'gradient_sp',
            'type'      => 'color_group',
            'title'     => 'Gradient Color Two',
            'options'   => array(
              'color-1' => 'Color 1',
              'color-2' => 'Color 2',
            ),
            'default'   => array(
                'color-1' => '#209753',
                'color-2' => '#B9D32A',
            )
        ),
        
        
    ),
) );

    // Create a section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Error Page',
        'id'     => 'error_page',
        'icon'   => 'fa fa-exclamation-triangle',
        'fields' => array(

            array(
                'id'      => 'breadcrumb_bg_img',
                'type'    => 'media',
                'title'   => esc_html__('Breadcrumb BG', 'artisticx-tools'),
            ),
            

            array(  //nav bar one start
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( '404 Page Options', 'eergx-tools' ) . '</h3>',
            ),
            
            array(
                'id'      => 'error_code_img',
                'type'    => 'media',
                'title'   => esc_html__( 'Error Code Image', 'eergx-tools' ),
            ),
            array(
                'id'      => 'error_title',
                'type'    => 'text',
                'title'   => esc_html__( '404 Title', 'eergx-tools' ),
                'default' => esc_html__( 'Oops!', 'eergx-tools' ),
            ),
            array(
                'id'      => 'error_code',
                'type'    => 'text',
                'title'   => esc_html__( '404 Code', 'eergx-tools' ),
                'default' => esc_html__( '404 Error!', 'eergx-tools' ),
            ),
            array(
                'id'      => 'error_desc',
                'type'    => 'textarea',
                'title'   => esc_html__( '404 Desc', 'eergx-tools' ),
                'default' => esc_html__( 'We canxt find the page that youre looking for. Cant find what you need? Take a moment and search below!', 'eergx-tools' ),
            ),
           
            array(
                'id'      => 'error_button',
                'type'    => 'text',
                'title'   => esc_html__( '404 Button', 'eergx-tools' ),
                'default' => esc_html__( 'back to Home page ', 'eergx-tools' ),
            )

                     
        ),
    ) );


    /*-------------------------------------------------------
     ** Footer  Options
    --------------------------------------------------------*/
    
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Footer Options', 'eergx-tools' ),
        'icon'   => 'fa fa-copyright',
        'fields' => array(

            array(
                'id'          => 'footer_style',
                'type'        => 'select',
                'title'       => __('Select Footer Style', 'eergx-tools' ),
                'options'     => Eergx_Plugin_Helper::get_footer_types(),
            ),     
            array(
                'id'    => 'footer_copyright',
                'type'  => 'wp_editor',
                'title' => 'Default Footer Copyright',
                'default' => '© 2023 eergx - IT Services. All rights reserved.',
            ),

        ),
    ) );

    // Backup section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Backup Export', 'eergx-tools' ),
        'id'     => 'backup_options',
        'icon'   => 'fa fa-window-restore',
        'fields' => array(
            array(
                'type' => 'backup',
            ),
        ),
    ) );




}