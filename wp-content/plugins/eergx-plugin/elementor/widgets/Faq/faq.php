<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Faq extends Widget_Base {

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
		return 'eergx-faq';
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
		return esc_html__( 'Eergx FAQ', 'eergx-plugin' );
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
			'--faq-option',
			[
				'label' => esc_html__( 'FAQ Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'count', [
				'label' => esc_html__( 'Count', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'gtbus-plugin' ),
				'default' => esc_html__( 'market trends analysis', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        
        $this->add_control(
			'faqs',
			[
				'label' => esc_html__( 'Add Faq Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
			]
		);
		
		$this->add_control(
			'max-width',
			[
				'label' => esc_html__( 'Width', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .egx-faq-2-wrap .content .accordion' => 'max-width: {{SIZE}}{{UNIT}};',
				],
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
			'sub_title_show',
			[
				'label' => esc_html__( 'Show Sub Title', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'title_show',
			[
				'label' => esc_html__( 'Title SHow', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'eergx-plugin' ),
				'label_off' => esc_html__( 'Hide', 'eergx-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
       
		$this->end_controls_section();

		// Sub title style
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'sub_margin',
			[
				'label' => esc_html__( 'List Icon Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ftc-campaign-2-feature .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ftc-campaign-2-feature .icon' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon-size',
			[
				'label' => esc_html__( 'Icon Size', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ftc-campaign-2-feature .icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .ftc-campaign-2-feature' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ftc-campaign-2-feature' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_s_typography',
				'selector' => '{{WRAPPER}} .ftc-campaign-2-feature',
			]
		);


		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/faq-template/faq-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Faq() );