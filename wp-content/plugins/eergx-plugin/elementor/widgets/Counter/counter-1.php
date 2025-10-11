<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Counter_Group extends Widget_Base {

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
		return 'go-ct-group';
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
		return esc_html__( 'Counter Group', 'eergx-plugin' );
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
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'gtbus-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'count', [
				'label' => esc_html__( 'Count Number', 'gtbus-plugin' ),
				'default' => esc_html__( '18', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'prefix', [
				'label' => esc_html__( 'Count Number Prefix', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'gtbus-plugin' ),
				'default' => esc_html__( 'Civil Engineering Contractors', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
       

        $this->add_control(
			'counters',
			[
				'label' => esc_html__( 'Add Counter Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'info', [
				'label' => esc_html__( 'Short Info', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'slider_setting',
			[
				'label' => esc_html__( 'Slider Setting Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'pagination_hide',
			[
				'label' => esc_html__( 'Service Nav Arrow Hide', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
       
		$this->end_controls_section();


		
		$this->start_controls_section(
			'slider_sub_title_style',
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
					'{{WRAPPER}} .fx-serve-1-slider-item .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-serve-1-slider-item .item-title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-serve-1-slider-item .item-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_s_typography',
				'selector' => '{{WRAPPER}} .fx-serve-1-slider-item .item-title',
			]
		);


		$this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/counter-template/counter-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new Counter_Group() );