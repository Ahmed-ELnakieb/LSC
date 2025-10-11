<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Brand extends Widget_Base {

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
		return 'go-brand-c';
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
		return esc_html__( 'Brand Carousel', 'eergx-plugin' );
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
			'__brand__style__',
			[
				'label' => esc_html__( 'Brand Select', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'style',
			[
				'label' => esc_html__( 'Brand Style', 'eergx-plugin' ),
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
			'--brand-option',
			[
				'label' => esc_html__( 'Brand Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'gesto-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'condition' => [
					'style' => '3',
				],
			]
		);
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'brand_img', [
				'label' => esc_html__( 'Brand Image', 'gesto-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
       
        $this->add_control(
			'brands',
			[
				'label' => esc_html__( 'Add Brand Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();



	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		require __DIR__ . '/brand-template/brand-' . $settings['style'] . '.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Brand() );