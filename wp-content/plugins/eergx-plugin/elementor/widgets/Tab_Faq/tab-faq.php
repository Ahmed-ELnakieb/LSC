<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Tab_Faq extends Widget_Base {

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
		return 'go-tab-faq';
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
		return esc_html__( 'Tab FAQ', 'eergx-plugin' );
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
			'--service-option',
			[
				'label' => esc_html__( 'Service Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'faq_bg', [
				'label' => esc_html__( 'Background Image', 'gtbus-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'gtbus-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        $this->add_control(
			'count', [
				'label' => esc_html__( 'Count', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'prefix', [
				'label' => esc_html__( 'Prefix', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'count_title', [
				'label' => esc_html__( 'Count Title', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'tab_title', [
				'label' => esc_html__( 'Tab Title', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
            'accordions',
            [
                'label' => __('Accordions', 'eergx-plugin'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    // social link
                    [
                        'name' => 'count',
                        'label' => __('Count', 'eergx-plugin'),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Title', 'eergx-plugin'),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'description',
                        'label' => __('Description', 'eergx-plugin'),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                ],
            ],
        );
        $this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Add Tab Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_title }}}',
			]
		);
		$this->end_controls_section();
        
		$this->start_controls_section(
			'service__box-style',
			[
				'label' => esc_html__( 'Service Box Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'ttl_padding',
			[
				'label' => esc_html__( 'Box Padding', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'box--bg-color',
			[
				'label' => esc_html__( 'Box BG Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'box-border-color',
			[
				'label' => esc_html__( 'Box Border Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card:not(:last-child)' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .fx-services-2-wrap' => 'border-color: {{VALUE}}'
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'service--title-stle',
			[
				'label' => esc_html__( 'Title Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'ttl_margin',
			[
				'label' => esc_html__( 'Title Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card .card-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card .card-title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card .card-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_s_typography',
				'selector' => '{{WRAPPER}} .fx-services-2-card .card-title',
			]
		);


		$this->end_controls_section();
		$this->start_controls_section(
			'service--desc-stle',
			[
				'label' => esc_html__( 'Desc Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'ttl_desc_margin',
			[
				'label' => esc_html__( 'Desc Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card .card-disc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Desc Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-services-2-card .card-disc' => 'color: {{VALUE}}',
				],
			]
		);
       
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .fx-services-2-card .card-disc',
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
        require __DIR__ . '/tab-template/tab-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Tab_Faq() );