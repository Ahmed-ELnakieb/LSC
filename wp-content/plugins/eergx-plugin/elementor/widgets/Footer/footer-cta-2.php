<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Footer_Cta_Two extends Widget_Base {

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
		return 'go-footer-cta-tw';
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
		return esc_html__( 'Footer CTA Two', 'eergx-plugin' );
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
			'int_heading_opt',
			[
				'label' => esc_html__( 'Icon Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
			'link_text', [
				'label' => esc_html__( 'Link Text', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		$this->add_control(
			'shortcode', [
				'label' => esc_html__( 'Shortcode', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		$this->end_controls_section();
		// title style
		$this->start_controls_section(
			'slider_title_style',
			[
				'label' => esc_html__( 'List Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_t_typography',
				'selector' => '{{WRAPPER}} .list-mainarea .item .item-text',
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'label' => esc_html__( 'List Title Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-mainarea .item .item-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Check Icon Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-mainarea .item .icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Check Icon BG Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-mainarea .item .icon' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
        
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		require __DIR__ . '/footer-template/footer-cta-2.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Footer_Cta_Two() );