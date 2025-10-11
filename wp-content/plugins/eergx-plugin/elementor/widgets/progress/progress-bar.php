<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Progress extends Widget_Base {

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
		return 'eergx-progress';
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
		return esc_html__( 'Eergx Progress', 'eergx-plugin' );
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
			'int_widget_style',
			[
				'label' => esc_html__( 'Style Select', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'style_choose',
			[
				'label' => esc_html__( 'Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => esc_html__( 'Style 1', 'eergx-plugin' ),
					'2'  => esc_html__( 'Style 2', 'eergx-plugin' )
				]
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'int_widget_opt',
			[
				'label' => esc_html__( 'Progress Style', 'eergx-plugin' ),
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
					'1'  => esc_html__( 'Style 1', 'eergx-plugin' )
				]
			]
		);
        $this->end_controls_section();
        
        $this->start_controls_section(
			'--Progress-option',
			[
				'label' => esc_html__( 'Progresss Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Progress Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		
        $this->add_control(
			'count', [
				'label' => esc_html__( 'Count', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
       
		$this->end_controls_section();
		
		// Sub title style
		$this->start_controls_section(
			'Progress_title_style',
			[
				'label' => esc_html__( 'Progress Title Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Title Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .art-Progress-item .item-text h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .art-Progress-item .item-text h3' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_title_typography',
				'selector' => '{{WRAPPER}} .art-Progress-item .item-text h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_desc_style',
			[
				'label' => esc_html__( 'Team Description Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'Progress_desc',
			[
				'label' => esc_html__( 'Progress Desc', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .art-Progress-item .item-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dsc_color',
			[
				'label' => esc_html__( 'Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .art-Progress-item .item-text p' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_desc_typography',
				'selector' => '{{WRAPPER}} .art-Progress-item .item-text p',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'list__item_style',
			[
				'label' => esc_html__( 'List Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'list_title_color',
			[
				'label' => esc_html__( 'List Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .art-Progress-item .item-text li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_list_typography',
				'selector' => '{{WRAPPER}} .art-Progress-item .item-text li',
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
				'selector' => '{{WRAPPER}} .art-btn-1 a',
			]
		);
        $this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .art-btn-1 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .art-btn-1 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .art-btn-1 a' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'types' => [ 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .art-btn-1 a',
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
			'btn_text_hover',
			[
				'label' => esc_html__( 'Button Text Hover Color', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .art-btn-1 a:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'types' => [ 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .art-btn-1 a:hover',
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
		require __DIR__ . '/progress-template/progress-' . $settings['style_choose'] . '.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Progress() );