<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Testimonial_Three extends Widget_Base {

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
		return 'go-testimonial-three';
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
		return esc_html__( 'Testimonial Three', 'eergx-plugin' );
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
			'--timeline-option',
			[
				'label' => esc_html__( 'timeline Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $repeater = new \Elementor\Repeater();
        
        
        $repeater->add_control(
			'authore', [
				'label' => esc_html__( 'Authore Image', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'feedback', [
				'label' => esc_html__( 'Feedback', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
       
        $repeater->add_control(
			'name', [
				'label' => esc_html__( 'Name', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'designation', [
				'label' => esc_html__( 'Designation', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $this->add_control(
			'testimonials',
			[
				'label' => esc_html__( 'Add Testimonial Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();
		


	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/testimonial-template/testimonial-3.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Testimonial_Three() );