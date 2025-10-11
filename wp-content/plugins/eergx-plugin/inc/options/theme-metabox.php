<?php
/*
 * Theme Metabox
 * @package eergx-tools
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'eergx';

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'eergx_page_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Page Options',
        'post_type' => array('plan', 'page', 'post'),
    ) );

    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Header Option', 'eergx-tools' ),
            ),

            array(
				'id'       => 'meta_header_type',
				'type'     => 'switcher',
				'title'    => __( 'Header Style', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => false
			),
            array(
				'id'          => 'meta_header_style',
				'type'        => 'select',
				'title'       => __('Select Header Style', 'eergx-plugin' ),
				'options'     => Eergx_Plugin_Helper::get_header_types(),
                'dependency' => array( 'meta_header_type', '==', 'true' ),
			),
            array(
				'id'       => 'page_header_disable',
				'type'     => 'switcher',
				'title'    => __( 'DIsable This page Header?', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => false
			),
        ),
    ) );

    CSF::createSection( $post_metabox, array(
        'title'  => 'Page Breadcrumb',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Page Breadcrumb', 'eergx-tools' ),
            ),
            array(
				'id'       => 'enable_page_preadcrumb',
				'type'     => 'switcher',
				'title'    => __( 'Page Breadcrumb', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => true
			),
            array(
				'id'       => 'hide_bg_img',
				'type'     => 'switcher',
				'title'    => __( 'Hide Breadcrumb Page Image', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => true
			),
            array(
                'id'    => 'bg_img_from_page',
                'type'  => 'media',
                'title' => esc_html__( 'Page Breadcrumb Background Image', 'eergx-tools' ),
                'dependency' => array( 'enable_page_preadcrumb', '==', 'true' ),
                
            ),
            array(
				'id'       => 'enable_custom_title',
				'type'     => 'switcher',
				'title'    => __( 'Enable Page Custom Title', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => false
			),
            
            array(
                'id'    => 'page_custom_title',
                'type'  => 'text',
                'title' => esc_html__( 'Page Custom Title', 'eergx-tools' ),
                'dependency' => array( 'enable_custom_title', '==', 'true' ),
            ),
            array(
                'id'    => 'page_desc_desc',
                'type'  => 'textarea',
                'title' => esc_html__( 'Page Description', 'eergx-tools' ),
                'default' => esc_html__( 'Renewable energy harnessed from solar power offers a sustainable and eco-friendly solution to meet the worlds.', 'eergx-tools' )
            ),
            array(
                'id'       => 'br_btn_link',
                'type'     => 'link',
                'title'    => 'Button',
                'default'  => array(
                  'url'    => 'themexriver.com',
                  'text'   => 'Discover More',
                  'target' => '_blank'
                ),
            ),
            
        )
    ) );

    CSF::createSection( $post_metabox, array(
        'title'  => 'Page Style',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Page Style', 'eergx-tools' ),
            ),
            array(
                'id'      => 'enable_ovh_layout',
                'type'    => 'switcher',
                'title'   => 'Overflow Hidded',
                'label'   => 'Do you want Full Body Overflow Hidded ?',
                'default' => false
            ),
            array(
                'id'     => 'scroll-bar',
                'type'   => 'color',
                'title'  => 'Page Scroll Bar Color',
                'output'      => 'body::-webkit-scrollbar-thumb',
                'output_mode' => 'background',
            ),
            array(
                'id'     => 'scroll-up',
                'type'   => 'color',
                'title'  => 'Page Scroll UP BUtton Color',
                'output'      => '.scroll-top',
                'output_mode' => 'background',
            ),
            array(
                'id'     => 'border-up',
                'type'   => 'color',
                'title'  => 'Breadcrumb Border Color',
                'output'      => '.feh-breadcrumb-area',
                'output_mode' => 'border-color',
            ),
            
            
        )
    ) );
    

    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Footer',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Footer Option', 'eergx-tools' ),
            ),

            array(
				'id'       => 'meta_footer_type',
				'type'     => 'switcher',
				'title'    => __( 'Footer Style', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => false
			),
            array(
				'id'          => 'meta_footer_style',
				'type'        => 'select',
				'title'       => __('Select Footer Style', 'eergx-plugin' ),
				'options'     => Eergx_Plugin_Helper::get_footer_types(),
                'dependency' => array( 'meta_footer_type', '==', 'true' ),
			),
            array(
				'id'       => 'page_footer_disable',
				'type'     => 'switcher',
				'title'    => __( 'DIsable This page Footer?', 'eergx-plugin' ),
				'text_on'  => __( 'Yes', 'eergx-plugin' ),
				'text_off' => __( 'No', 'eergx-plugin' ),
				'default'  => false
			),

        ),
    ) );

     /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'eergx_pricing_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Pricing Options',
        'post_type' => 'eergx_pricing',
    ) );

    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'eergx Pricing Table ',
        'fields' => array(
            array(
                'id'      => 'populer_item',
                'type'    => 'checkbox',
                'title'   => 'Select Populer Item',
                'label'   => 'If you want to Populer Item then please check the box',
                'default' => false // or false
            ),
            array(
                'id'    => 'offer_text',
                'type'  => 'text',
                'title' => esc_html__( 'Offer Text', 'eergx-tools' ),
            ),
            array(
                'id'    => 'currency',
                'type'  => 'text',
                'title' => esc_html__( 'Currency', 'eergx-tools' ),
                'default' => '$',
            ),
            array(
                'id'    => 'monthly_price',
                'type'  => 'text',
                'title' => esc_html__( 'Monthly Price ', 'eergx-tools' ),
            ),
            array(
                'id'    => 'yearly_price',
                'type'  => 'text',
                'title' => esc_html__( 'Yearly Price ', 'eergx-tools' ),
            ),
            array(
                'id'    => 'mon_period',
                'type'  => 'text',
                'title' => esc_html__( 'Monthly Period ', 'eergx-tools' ),
                'default' => esc_html__( '/ Monthly', 'eergx-tools' ),
            ),
            array(
                'id'    => 'yr_period',
                'type'  => 'text',
                'title' => esc_html__( 'Yearly Period ', 'eergx-tools' ),
                'default' => esc_html__( '/ Yearly', 'eergx-tools' ),
            ),
            array(
                'id'         => 'pricing_lists',
                'type'       => 'group',
                'title'      => 'Add Pricing List Item',
                'fields'     => array(
                    
                    array(
                        'id'    => 'list-item',
                        'type'  => 'text',
                        'title' => esc_html__( 'Pricing List Item', 'eergx-tools' ),
                    ),
                    array(
                        'id'      => 'exclude-in-package',
                        'title'   => esc_html__( 'Exclude In This Package', 'eergx-tools' ),
                        'type'    => 'switcher',
                        'default' => false,
                    ),
                )

            ),
            array(
                'id'    => 'pricing_btn',
                'type'  => 'link',
                'title' => esc_html__( 'Pricing Button', 'eergx-tools' ),
            ),
            array(
                'id'    => 'pricing_txt',
                'type'  => 'text',
                'title' => esc_html__( 'Pricing Text', 'eergx-tools' ),
            ),

        ),
    ) );

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'eergx_career_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Career Options',
        'post_type' => 'eergx_career',
    ) );

    // Header Section
    CSF::createSection( $post_metabox, array(
        'fields' => array(
            
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__( 'Job Icon', 'eergx-tools' ),
            ),
           
            array(
                'id'    => 'job_type',
                'type'  => 'text',
                'title' => esc_html__( 'Job Type', 'eergx-tools' ),
                'desc' => esc_html__( 'Job Type Means Full Time Job or Part Time Job', 'eergx-tools' ),
            ),
            array(
                'id'    => 'job_location',
                'type'  => 'text',
                'title' => esc_html__( 'Job Location', 'eergx-tools' ),
                'desc' => esc_html__( 'Type Yor Job Location', 'eergx-tools' ),
            ),
            array(
                'id'    => 'job_date',
                'type'  => 'date',
                'title' => esc_html__( 'Job Date', 'eergx-tools' ),
                'desc' => esc_html__( 'Type Yor Job Ending Date Here', 'eergx-tools' ),
            ),
            array(
                'id'    => 'job_salary',
                'type'  => 'text',
                'title' => esc_html__( 'Job Salary', 'eergx-tools' ),
                'desc' => esc_html__( 'Type Yor Job Salary Range Here', 'eergx-tools' ),
            ),
            array(
                'id'    => 'job_excerpt',
                'type'  => 'textarea',
                'title' => esc_html__( 'Job Excerpt', 'eergx-tools' ),
                'desc' => esc_html__( 'Type Yor Job Short Description Here', 'eergx-tools' ),
            ),
        ),
    ) );



    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $eergx_temp_meta = 'eergx_temp_meta';

    CSF::createMetabox( $eergx_temp_meta, array(
        'title'     => 'Template Type',
        'post_type' => array('eergx_template'),
        'data_type' => 'unserialize'
    ) );

     // Header Section
     CSF::createSection( $eergx_temp_meta, array(
        'fields' => array(
            array(
                'id'          => 'eergx_template_type',
                'type'        => 'select',
                'title'       => 'Select Template Type',
                'placeholder' => 'Select Template Type',
                'options'     => array(
                  'tf_header_key'  => 'Header',
                  'tf_footer_key'  => 'Footer',
                ),
                'default'     => ''
            ),
        ),
    ) );


    /*-------------------------------------
    Portfolio Options
    -------------------------------------*/
    $eergx_port_meta = 'eergx_portfolio_meta';

    CSF::createMetabox( $eergx_port_meta, array(
        'title'     => 'Portfolio Option',
        'post_type' => array('eergx_portfolio'),
    ) );

     // Header Section
     CSF::createSection( $eergx_port_meta, array(
        'fields' => array(
            array(
                'id'          => 'port-column',
                'type'        => 'select',
                'title'       => 'Select Portfolio Column',
                'options'     => array(
                  '12'  => 'Full Column',
                  '6'   => 'Two Column',
                  '3'   => 'Four Column',
                  '4'   => 'Three Column',
                ),
                'default'     => '12'
            ),
            array(
                'id'    => 'cl_no',
                'type'  => 'text',
                'title' => esc_html__( 'Job Salary', 'eergx-tools' ),
                'desc' => esc_html__( 'Type Yor Job Salary Range Here', 'eergx-tools' ),
            ),
        ),
    ) );


    /*-------------------------------------
    Post Format Options
    -------------------------------------*/
    $post_format_metabox = 'eergx_post_format_meta';

    CSF::createMetabox( $post_format_metabox, array(
        'title'     => 'Post Video',
        'post_type' => 'post',
		'post_formats' => 'video',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
    ) );

    // Video Link
    CSF::createSection( $post_format_metabox, array(
        'fields' => array(
            array(
                'id'      => 'video_link',
                'type'    => 'text',
                'title'   => esc_html__('Video Link', 'eergx-plugin'),
                'desc'    => esc_html__('Enter Video Link Here', 'eergx-plugin'),
            ),
        ),
    ) );
    /*-------------------------------------
    Post Audio Options
    -------------------------------------*/
    $post_audio_metabox = 'post_audio_metabox';

    CSF::createMetabox( $post_audio_metabox, array(
        'title'     => 'Post Audio',
        'post_type' => 'post',
		'post_formats' => 'audio',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
    ) );

    // Video Link
    CSF::createSection( $post_audio_metabox, array(
        'fields' => array(
            array(
                'id'      => 'audio_link',
                'type'    => 'text',
                'title'   => esc_html__('Audio Link', 'eergx-plugin'),
                'desc'    => esc_html__('Enter Audio Link Here', 'eergx-plugin'),
            ),
        ),
    ) );

    /**
     * Post Gallery Format
     */
    $post_format_gall_metabox = 'eergx_post_gall_meta';

    CSF::createMetabox( $post_format_gall_metabox, array(
        'title'     => 'Post Gallery',
        'post_type' => 'post',
		'post_formats' => 'gallery',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
    ) );

    // Video Link
    
    CSF::createSection( $post_format_gall_metabox, array(
        'fields' => array(
            array(
                'id'          => 'post-gall-item',
                'type'        => 'gallery',
                'title'       => 'Gallery',
                'add_title'   => 'Add Images',
                'edit_title'  => 'Edit Images',
                'clear_title' => 'Remove Images',
              ),
          ),
    ) );


    
    

} //endif
