<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Saving_Banner_Three extends Widget_Base {

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
		return 'eergx-saving-banner3';
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
		return esc_html__( 'Eergx Banner 3', 'eergx-plugin' );
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
			'--ino-option--',
			[
				'label' => esc_html__( 'Info Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'subtitle', [
				'label' => esc_html__( 'Sub Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Get To Know Us', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $this->add_control(
			'banner_img', [
				'label' => esc_html__( 'Banner Image', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		
        $this->add_control(
			'btn_label', [
				'label' => esc_html__( 'Button Label', 'eergx-plugin' ),
				'default' => esc_html__( 'eergx Button', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'btn_link', [
				'label' => esc_html__( 'Button Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
        $this->add_control(
			'video_bg', [
				'label' => esc_html__( 'Video BG', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'video_image', [
				'label' => esc_html__( 'Video Image', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
        $this->add_control(
			'video_link', [
				'label' => esc_html__( 'Video Link', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'video_title', [
				'label' => esc_html__( 'Video Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        
        $this->add_control(
			'video_text', [
				'label' => esc_html__( 'Video Text Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
       
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();        
		require __DIR__ . '/saving-banner/banner-3.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Saving_Banner_Three() );