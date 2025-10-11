<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Video_Popup extends Widget_Base {

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
		return 'go-v-popup';
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
		return esc_html__( 'Video Popup', 'eergx-plugin' );
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
			'image',
			[
				'label' => esc_html__( 'Image', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
			'upload_video',
			[
				'label' => esc_html__( 'Upload Video BG', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
			'video_link', [
				'label' => esc_html__( 'Video Link', 'gtbus-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
        
		$this->end_controls_section();
        $this->start_controls_section(
			's__video-',
			[
				'label' => esc_html__( 'Video Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'video_margin',
			[
				'label' => esc_html__( 'Video Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-play-btn-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'video_color',
			[
				'label' => esc_html__( 'Video Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-play-btn-1' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_v_typography',
				'selector' => '{{WRAPPER}} .fx-play-btn-1',
			]
		);


		$this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/popup-template/popup-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Video_Popup() );