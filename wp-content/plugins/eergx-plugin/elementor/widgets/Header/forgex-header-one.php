<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class eergx_Header_One extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eergx-header-1';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'eergx Header', 'eergx-plugin' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eergx-custom-icon';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'eergx_widgets' ];
	}


	protected function register_controls() {
		$this->start_controls_section(
			'__header__style__',
			[
				'label' => esc_html__( 'Header Style Select', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'style',
			[
				'label' => esc_html__( 'Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => esc_html__( 'Style 1', 'eergx-plugin' ),
					'2'  => esc_html__( 'Style 2', 'eergx-plugin' ),
					'3'  => esc_html__( 'Style 3', 'eergx-plugin' ),
					'4'  => esc_html__( 'Style 4', 'eergx-plugin' )
				]
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'header__general',
			[
				'label' => esc_html__( 'Header General Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'topbar_hide',
			[
				'label' => esc_html__( 'Top Bar HIDE/SHOW', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => '1',
				],
			]
		);
		$this->add_control(
			'cart_count',
			[
				'label' => esc_html__( 'Cart Count', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => '2',
				],
			]
		);
		
		$this->add_control(
			'sear_hide_show',
			[
				'label' => esc_html__( 'Search HIDE/SHOW', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'hamburger',
			[
				'label' => esc_html__( 'Hamburger HIDE/SHOW', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => '4',
				],
			]
		);
		
		$this->add_control(
			'search_btn_label', [
				'label' => esc_html__( 'Search Button Label', 'eergx-plugin' ),
				'default' => esc_html__( 'search...', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'condition' => [
					'sear_hide_show' => 'yes',
				],
			]
		);
		$this->add_control(
			'phone_title', [
				'label' => esc_html__( 'Phone Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'condition' => [
					'style' => ['3', '4'],
				],
			]
		);
		$this->add_control(
			'phone_no', [
				'label' => esc_html__( 'Phone No', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'condition' => [
					'style' => ['3', '4'],
				],
			]
		);
		
		$this->add_control(
			'btn_label', [
				'label' => esc_html__( 'Header Button Label', 'eergx-plugin' ),
				'default' => esc_html__( 'request a quote', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link', [
				'label' => esc_html__( 'Header Button Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'icons', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'info_text', [
				'label' => esc_html__( 'Info Text', 'eergx-plugin' ),
				'default' => esc_html__( 'info@eergx.com', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);

        $this->add_control(
			'infos',
			[
				'label' => esc_html__( 'Add Header Contact Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ info_text }}}',
				'condition' => [
					'style' => ['1'],
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'icons', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);

        $this->add_control(
			'header_socials',
			[
				'label' => esc_html__( 'Add Social Icon Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'condition' => [
					'style' => ['1'],
				],
			]
		);
		$this->end_controls_section();
		
        $this->start_controls_section(
			'logoop',
			[
				'label' => esc_html__( 'Logo Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'rzlogo', [
				'label' => esc_html__( 'Logo', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
				'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
			]
		);
		
		$this->add_responsive_control(
			'logo_max_width',
			[
				'label' => esc_html__( 'Max Width', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5000,
					]
				],

				'selectors' => [
					'{{WRAPPER}} .logo_site-size' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'rzmlogo', [
				'label' => esc_html__( 'Mobile Logo', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
				'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
			]
		);
		
		$this->add_responsive_control(
			'm_logo_max_width',
			[
				'label' => esc_html__( 'Max Width', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5000,
					]
				],

				'selectors' => [
					'{{WRAPPER}} .logo_site-size' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
		$this->end_controls_section();

        $this->start_controls_section(
			'menu_select',
			[
				'label' => esc_html__( 'Menu Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'choose-menu',
			[
				'label' => esc_html__( 'Choose menu', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => eergx_menu_selector(),
				'multiple' => false
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'search_menu_options',
			[
				'label' => esc_html__( 'Search Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'sear_hide_show' => 'yes',
				],
			]
		);
		$this->add_control(
			'search_title', [
				'label' => esc_html__( 'Search Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Search', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$this->add_control(
			'search_link_title', [
				'label' => esc_html__( 'Search Link Title', 'eergx-plugin' ),
				'default' => esc_html__( 'People also search for:', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);

        $this->add_control(
			'search_link',
			[
				'label' => esc_html__( 'Add Search Link Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'offcanvas_menu_options',
			[
				'label' => esc_html__( 'Offcanvas Menu', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'hamburger' => 'yes',
				],
			]
		);
		$this->add_control(
			'service_title', [
				'label' => esc_html__( 'Service Title', 'eergx-plugin' ),
				'default' => esc_html__( 'our services:', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);

        $this->add_control(
			'services',
			[
				'label' => esc_html__( 'Add Service Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'social_title', [
				'label' => esc_html__( 'Social Title', 'eergx-plugin' ),
				'default' => esc_html__( 'were on social media:', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
        $this->add_control(
			'f_socials',
			[
				'label' => esc_html__( 'Add Social Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'default' => [
					[
						'icons' => [
							'value'   => 'fab fa-facebook-f',
                    		'library' => 'solid',
						],
						'name' => esc_html__( 'Facebook', 'eergx-plugin' ),
						'link' => esc_html__( 'https://facebook.com', 'eergx-plugin' ),
					],
					[
						'icons' => [
							'value'   => 'fab fa-instagram',
                    		'library' => 'solid',
						],
						'name' => esc_html__( 'Instagram', 'eergx-plugin' ),
						'link' => esc_html__( 'https://instagram.com', 'eergx-plugin' ),
					],
					[
						'icons' => [
							'value'   => 'fab fa-youtube',
                    		'library' => 'solid',
						],
						'name' => esc_html__( 'Youtube', 'eergx-plugin' ),
						'link' => esc_html__( 'https://youtube.com', 'eergx-plugin' ),
					],
					[
						'icons' => [
							'value'   => 'fab fa-linkedin',
                    		'library' => 'solid',
						],
						'name' => esc_html__( 'Linkedin', 'eergx-plugin' ),
						'link' => esc_html__( 'https://linkedin.com', 'eergx-plugin' ),
					]
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'contact_title', [
				'label' => esc_html__( 'Contact Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'f_info_title', [
				'label' => esc_html__( 'Offcanvas Contact Info Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
        $this->add_control(
			'f_infos',
			[
				'label' => esc_html__( 'Add Info Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ f_info_title }}}',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'header-3__style',
			[
				'label' => esc_html__( 'Header Backgroud  Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => ['3', '4', '5'],
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'header_bg_upload',
				'types' => [ 'classic' ],
				'exclude' => [ 'color' ],
				'selector' => '
					{{WRAPPER}} .fx-header-3-main,
					{{WRAPPER}} .fx-header-4-main::after,
					{{WRAPPER}} .fx-header-5-wrap::after
				',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Header BG Shape Upload', 'goyto-plugin' ),
                        'description' => esc_html__( 'Choose background type and style.', 'goyto-plugin' ),
                        'separator' => 'before',
                    ]
				],
				
			]
		);
		$this->add_control(
			'header_bg_color',
			[
				'label' => esc_html__( 'Header BG Color', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-header-3-main' => 'background: {{VALUE}}',
					'{{WRAPPER}} .fx-header-4-main::after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .fx-header-5-wrap::after' => 'background: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'top_menu__style',
			[
				'label' => esc_html__( 'Menu Top Bar  Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tp_bar_bg',
			[
				'label' => esc_html__( 'Top Bar BG Option', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'top_bar_bg',
			[
				'label' => esc_html__( 'Top Bar Menu BG Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-header-1-top' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'tp_bar_text',
			[
				'label' => esc_html__( 'Top Info Option', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'top-info-hover',
			[
				'label' => esc_html__( 'Top Info Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-contact-list li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fx-header-5-wrap .fx-contact-list li i' => 'color: {{VALUE}}'
				],
			]
		);
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'top_info_fb_typography',
				'selector' => '
					{{WRAPPER}} .fx-contact-list li
				',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'hamburg_menu_style',
			[
				'label' => esc_html__( 'Hamburg Menu Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hamburg-bg-color',
			[
				'label' => esc_html__( 'Background Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-menu-btn-1' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'hamburg-bg-hover-color',
			[
				'label' => esc_html__( 'Background Hover Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-menu-btn-1:hover' => 'background: {{VALUE}}'
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'menu_bar_style',
			[
				'label' => esc_html__( 'Menu  Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'--menu--style-info',
			[
				'label' => esc_html__( 'Menu Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_control(
			'menu_color',
			[
				'label' => esc_html__( 'Menu Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-navigation .navbar-nav li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .main-navigation .navbar-nav li:is(.dropdown) > a::before' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_control(
			'menu_color-hover',
			[
				'label' => esc_html__( 'Menu Hover Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-navigation .navbar-nav li:hover > a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .main-navigation .navbar-nav li a::after' => 'background-color: {{VALUE}}'
				],
			]
		);
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_fb_typography',
				'selector' => '
					{{WRAPPER}} .main-navigation .navbar-nav li a
				',
			]
		);
		$this->add_control(
			'menu_dropdown_style',
			[
				'label' => esc_html__( 'Menu Dropdown Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_control(
			'mdb_color',
			[
				'label' => esc_html__( 'Dropdown Box BG Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-navigation .navbar-nav li .dropdown-menu' => 'background: {{VALUE}}'
				],
			]
		);
        $this->add_control(
			'mdb_menu_color',
			[
				'label' => esc_html__( 'Dropdown Box Border Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-navigation .navbar-nav li .dropdown-menu' => 'border-color: {{VALUE}}'
				],
			]
		);

        $this->end_controls_section();
		 // feature style
		 $this->start_controls_section(
			'--button_one',
			[
				'label' => esc_html__( 'Button Style', 'goyto-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'm_b_typography',
				'selector' => '{{WRAPPER}} .fx-pr-btn-1',
			]
		);
        $this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-pr-btn-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'b_round',
			[
				'label' => esc_html__( 'Border Radius', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-pr-btn-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'goyto-plugin' ),
			]
		);
        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Text Color', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-pr-btn-1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fx-pr-btn-1:is(.has-hover-white) .text::before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fx-header-5-action-link .fx-pr-btn-1 .text::before' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_control(
			'btn_br_text',
			[
				'label' => esc_html__( 'Border Color', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-pr-btn-1' => 'border-color: {{VALUE}}'
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'types' => [ 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .fx-pr-btn-1',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Button BG Color ', 'goyto-plugin' ),
                        'description' => esc_html__( 'Choose background type and style.', 'goyto-plugin' ),
                        'separator' => 'before',
                    ]
                ]
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'goyto-plugin' ),
			]
		);
        $this->add_control(
			'btn_h_text',
			[
				'label' => esc_html__( 'Text Hovwe Color', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-pr-btn-1:hover' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'types' => [ 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .fx-pr-btn-1:hover',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Button Hover BG Color ', 'goyto-plugin' ),
                        'description' => esc_html__( 'Choose background type and style.', 'goyto-plugin' ),
                        'separator' => 'before',
                    ]
                ]
			]
		);
        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();



	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );
		if ( ! empty( $settings['btn_link']['url'] ) ) {
			$this->add_link_attributes( 'btn_link', $settings['btn_link'] );
		}
		require __DIR__ . '/header-template/header-' . $settings['style'] . '.php';
    }

	/**
	 * Search Body Display
	 *
	 * @return void
	 */
	protected function ___search_body(){
		$settings = $this->get_settings_for_display();
		?>
		<div class="txa-search-box search_box_active ">

		<div class="txa-search-container">
			<div class="txa-search-wrap text-center mb-55">
				<?php if(!empty($settings['search_btn_label'])):?>
					<h5 class="txa-search-title fx-heading-1 fx-font-500"><?php echo eergx_wp_kses($settings['search_title'])?></h5>
				<?php endif;?>
				<form action="<?php echo esc_url(home_url( '/' ));?>" class="txa-search-form">
					<input class="txa-search-form-input" type="text" name="s" value="<?php echo get_search_query();?>"  placeholder="<?php esc_attr_e( 'What are you looking for?...', 'eergx-plugin' );?>">
				</form>

			</div>

			<div class="txa-search-tag-wrap text-center">
				<?php if(!empty($settings['search_link_title'])):?>
					<h6 class="txa-search-tag-title fx-font-400 fx-heading-1"><?php echo eergx_wp_kses($settings['search_link_title']);?></h6>
				<?php endif;?>
				<div class="txa-search-tag d-inline-flex flex-wrap">
					<?php foreach($settings['search_link'] as $item):?>
						<a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" aria-label="name" class="txa-search-tag-item fx-heading-1 fx-font-500" ><?php echo eergx_wp_kses($item['title']);?></a>
					<?php endforeach;?>
				</div>
			</div>
		</div>

		<button aria-label="search-close" type="button" class="txa-search-box-close search_box_close">
			<i class="fa-solid fa-xmark"></i>
		</button>

		</div>
		<!-- search-popup -->

		<div class="overlay"></div>

<?php 
}

protected function mobile_menu(){ 
	$settings = $this->get_settings_for_display();	
?>
<div class="mobile-menu lenis lenis-smooth">
	<div class="mobile-menu-wrap">
		<div class="mobile-menu-logo-wrap mb-40">
		<a href="<?php echo esc_url(home_url());?>" aria-label="name" class="mobile-menu-logo d-block tx-logo">
			<img class="logo_site-size" src="<?php echo esc_url($settings['rzlogo']['url']);?>" alt="<?php if(!empty($settings['rzlogo']['alt'])){ echo esc_attr($settings['rzlogo']['alt']);}?>">
		</a>		
		<div class="mobile-menu-close open_menu" id="menuToggle2">
			<i class="fa-solid fa-xmark">
			</i>
		</div>
		</div>
		<!-- search-form -->
		<div class="mobile-menu-search-bar">
		<form method="get" action="#" class="mobile-menu-search-form-1 mb-50">
			<input type="search" name="s" aria-label="search" placeholder="Search..."
			value="">
			<button class="form-btn" type="submit" aria-label="name">
			<i class="fa-solid fa-magnifying-glass"></i>
			</button>
		</form>
		</div>
		<!-- mobile-menu-list -->
		<div class="mobile-menu-navigation">
		<nav class="mobile-main-navigation clearfix ul-li">
			<div class="menu-main-menu-container">
				<?php
					echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'], wp_nav_menu( array(
						'echo'           => false,
						'menu' => !empty($settings['choose-menu']) ? $settings['choose-menu'] : 'menu-1',
						'menu_id'        =>'main-nav',
						'menu_class'        =>'nav navbar-nav clearfix list-unstyled',
						'container'=>false,
						'fallback_cb'    => 'Navwalker_Class::fallback',
						'walker'         => class_exists( 'Rs_Mega_Menu_Walker' ) ? new \Rs_Mega_Menu_Walker : '',
					)) );
				?>
			</div>
		</nav>
		</div>
		
	</div>
	<div class="mobile_menu_overlay open_menu">
	</div>
</div>
<?php 
}

protected function eergx_offcanvas_menu(){
		$settings = $this->get_settings_for_display();
	?>
	<div class="txa-offcanvas-box lenis lenis-smooth offcanvas_box_active">
	<button class="txa-offcanvas-box-close offcanvas_box_close" aria-label="name" >
		<i class="fa-solid fa-xmark"></i>
	</button>
	<div class="txa-offcanvas-box-container">

		<!-- services -->
		<div class="txa-offcanvas-services-wrap d-lg-block d-none">
			<?php if(!empty($settings['service_title'])):?>
				<h5 class="txa-offcanvas-services-title fx-heading-1 fx-font-400"><?php echo eergx_wp_kses($settings['service_title']);?></h5>
			<?php endif;?>
			<?php if(!empty($settings['services'])):?>
			<ul class="txa-offcanvas-services">
				<?php foreach($settings['services'] as $item):?>
					<li>
						<span class="offcanvas-slideup">
							<a class="txa-offcanvas-services-item fx-heading-1 fx-font-400 " target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" aria-label="name">
								<i class="fa-solid fa-arrow-right"></i>
								<?php echo eergx_wp_kses($item['title']);?>
							</a>
						</span>
					</li>
				<?php endforeach;?>

			</ul>
			<?php endif;?>
		</div>

		<div class="txa-offcanvas-search d-lg-none d-block">
			<form action="<?php echo esc_url(home_url( '/' ));?>" class="txa-offcanvas-search-form">
				<input class="txa-offcanvas-search-form-input" type="text" name="s" aria-label="name" placeholder="<?php esc_attr_e( 'Search', 'eergx-plugin' );?>" value="<?php echo get_search_query();?>">
				<button class="txa-offcanvas-search-form-btn" type="button" aria-label="name">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</form>
		</div>

		<!-- mobile-menu-list -->
		<div class="mobile-menu-navigation d-lg-none d-block">
			<nav class="mobile-main-navigation  clearfix ul-li">
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

		<div class="txa-offcanvas-content">

			<!-- contact -->
			<div class="txa-offcanvas-content-box">
				<?php if(!empty($settings['contact_title'])):?>
					<h5 class="txa-offcanvas-content-box-title fx-heading-1 fx-font-400"><?php echo eergx_wp_kses($settings['contact_title']);?></h5>
				<?php endif;?>
				<?php if(!empty($settings['f_infos'])):?>
					<ul class="txa-offcanvas-contact">
						<?php foreach($settings['f_infos'] as $item):?>
							<li class="fx-heading-1 fix" >
								<span class="offcanvas-slideup">
									<?php if(!empty($item['link']['url'])):?>
										<a  target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>"  aria-label="name">
									<?php endif;?>
										<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php echo eergx_wp_kses($item['f_info_title'])?>

									<?php if(!empty($item['link']['url'])):?>
                                    </a>
									<?php endif;?>
								</span>
							</li>
						<?php endforeach;?>
						
					</ul>
				<?php endif;?>
			</div>

			<!-- socail -->
			<div class="txa-offcanvas-content-box">
				<?php if(!empty($settings['social_title'])):?>
					<h6 class="txa-offcanvas-content-box-title fx-heading-1 fx-font-400"><?php echo eergx_wp_kses($settings['social_title']);?></h6>
				<?php endif;?>

				<ul class="txa-offcanvas-social">

					<?php foreach($settings['f_socials'] as $item):?>
						<li>
							<span class="offcanvas-slideup">
								<a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['link']['url'] ? esc_url($item['link']['url']) : ''; ?>" class="txa-offcanvas-social-item fx-heading-1 fx-font-500 " aria-label="name">
									<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
									<?php echo eergx_wp_kses($item['title'])?>
								</a>
							</span>

						</li>
					<?php endforeach;?>
					

				</ul>
			</div>

		</div>
	</div>
</div>
<?php
}




}


Plugin::instance()->widgets_manager->register( new eergx_Header_One() );