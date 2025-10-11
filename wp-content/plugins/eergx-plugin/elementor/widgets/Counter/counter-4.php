<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Counter_Group_Three extends Widget_Base {

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
		return 'go-ct-group-three';
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
		return esc_html__( 'Counter Group Three', 'eergx-plugin' );
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
			'image', [
				'label' => esc_html__( 'Image', 'gtbus-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'gtbus-plugin' ),
				'default' => esc_html__( 'Goals', 'gtbus-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
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
        
		$this->end_controls_section();



	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/counter-template/counter-4.php';
    }


}


Plugin::instance()->widgets_manager->register( new Counter_Group_Three() );