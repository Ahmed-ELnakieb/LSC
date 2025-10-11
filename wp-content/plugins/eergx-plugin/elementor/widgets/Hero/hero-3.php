<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Hero_Three extends Widget_Base {

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
		return 'eergx-hero-3';
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
		return esc_html__( 'Eergx Hero 3', 'eergx-plugin' );
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
			'--hero-img-option--',
			[
				'label' => esc_html__( 'Hero Image Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'img_1',
			[
				'label' => esc_html__( 'Image 1', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
			'img_2',
			[
				'label' => esc_html__( 'Image 2', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        
		$this->end_controls_section();

        $this->start_controls_section(
			'--hero-option--',
			[
				'label' => esc_html__( 'Hero Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'sub_title', [
				'label' => esc_html__( 'Sub Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);

        $this->add_control(
			'sub_title_icon', [
				'label' => esc_html__( 'Sub Title Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);

        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		$this->add_control(
            'title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'eergx-plugin' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __( 'H1', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __( 'H2', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __( 'H3', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __( 'H4', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __( 'H5', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __( 'H6', 'eergx-plugin' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h1',
                'toggle'  => false,
            ]
        );
        $this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'default' => esc_html__( 'Section description', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		
        $this->add_control(
			'button--control--',
			[
				'label' => esc_html__( 'Button Area', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
        
        $this->add_control(
			'btn_label', [
				'label' => esc_html__( 'Button Label', 'eergx-plugin' ),
				'default' => esc_html__( 'competitive', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'btn_link', [
				'label' => esc_html__( 'Button Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'type',
            [
                'label'          => __( 'Icon Type', 'gesto-core' ),
                'type'           => Controls_Manager::CHOOSE,
                'label_block'    => false,
                'options'        => [
                    'icon'  => [
                        'title' => __( 'Icon', 'gesto-core' ),
                        'icon'  => 'far fa-smile',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'gesto-core' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
                'default'        => 'icon',
                'toggle'         => false,
                'style_transfer' => true,
                
            ]
        );
        
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'gesto-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'condition'      => [
                    'type' => 'icon',
                ],
			]
		);
        $repeater->add_control(
			'icon_img', [
				'label' => esc_html__( 'Icon Image', 'gesto-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition'      => [
                    'type' => 'image',
                ],
			]
		);
		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'features',
			[
				'label' => esc_html__( 'Add Feature Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();

		// title style
		$this->start_controls_section(
			'sub_title_style',
			[
				'label' => esc_html__( 'Sub Title Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'sub_title_margin',
			[
				'label' => esc_html__( 'Sub Title Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-gt-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .sub-elementor-gt-heading',
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sub-elementor-gt-heading' => 'background: {{VALUE}}; -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;',
				],
			]
		);
		$this->end_controls_section();

		// title style
		$this->start_controls_section(
			'slider_title_style',
			[
				'label' => esc_html__( 'Title Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Sub Title Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-gt-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_t_typography',
				'selector' => '{{WRAPPER}} .elementor-gt-heading',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-gt-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		// description style
		$this->start_controls_section(
			'slider_description_style',
			[
				'label' => esc_html__( 'Desc Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Video Title Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-para-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'm_d_typography',
				'selector' => '{{WRAPPER}} .elementor-para-text',
			]
		);

		// description color
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-para-text' => 'color: {{VALUE}}',
				],
			]
		);

		// end
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
					'{{WRAPPER}} .fx-pr-btn-1:is(.has-hover-white) .text::before' => 'color: {{VALUE}}'
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
					'{{WRAPPER}} .fx-pr-btn-1:is(.has-hover-white):hover' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'types' => [ 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .fx-pr-btn-1:is(.has-hover-white):hover',
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
		require __DIR__ . '/hero-template/hero-3.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Hero_Three() );