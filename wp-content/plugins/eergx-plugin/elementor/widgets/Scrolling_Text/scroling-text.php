<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class eergx_Moving_Text extends Widget_Base {

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
		return 'go-moving-text';
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
		return esc_html__( 'Moving Text', 'eergx-plugin' );
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
			'icon_img', [
				'label' => esc_html__( 'Image', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Civil Engineering Contractors', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);

        $this->add_control(
			'movings',
			[
				'label' => esc_html__( 'Add Moving Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
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
					'{{WRAPPER}} .fx-marquee-text-1-item .item-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-marquee-text-1-item .item-text' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-marquee-text-1-item .item-text:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-marquee-text-1-item svg *' => 'fill: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-marquee-text-1-item svg *:hover' => 'fill: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_s_typography',
				'selector' => '{{WRAPPER}} .fx-marquee-text-1-item .item-text',
			]
		);


		$this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/scroling-template/text-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new eergx_Moving_Text() );