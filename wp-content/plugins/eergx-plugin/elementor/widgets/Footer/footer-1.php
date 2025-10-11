<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Footer_One extends Widget_Base {

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
		return 'go-footer-one';
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
		return esc_html__( 'Footer One', 'eergx-plugin' );
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
			'__header__style__',
			[
				'label' => esc_html__( 'Footer Style Select', 'eergx-plugin' ),
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
					'1'  => esc_html__( 'Style 1', 'eergx-plugin' ),
					'2'  => esc_html__( 'Style 2', 'eergx-plugin' ),
					'3'  => esc_html__( 'Style 3', 'eergx-plugin' )
				]
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'int_f_about_opt',
			[
				'label' => esc_html__( 'Footer About Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['2', '3'],
				],
			]
		);
		$this->add_control(
			'logo', [
				'label' => esc_html__( 'Logo', 'eergx-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
		$this->add_control(
			'abouts', [
				'label' => esc_html__( 'Short About', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		$this->add_control(
			'address', [
				'label' => esc_html__( 'Address', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'int_heading_opt',
			[
				'label' => esc_html__( 'Contact Info Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'c_title', [
				'label' => esc_html__( 'Info Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => ['1', '2'],
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'infos',
			[
				'label' => esc_html__( 'Add Infos Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'int_social_opt',
			[
				'label' => esc_html__( 'Footer Social Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => ['2', '3'],
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
		
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
		
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'socials',
			[
				'label' => esc_html__( 'Add Social Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'link_opt',
			[
				'label' => esc_html__( 'Footer Link Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'l_title', [
				'label' => esc_html__( 'Link Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => ['1', '2'],
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
        
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'links',
			[
				'label' => esc_html__( 'Add Link Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->add_control(
			'l2_title', [
				'label' => esc_html__( 'Link Two Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();
        
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'links2',
			[
				'label' => esc_html__( 'Add Link 2 Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$repeater = new \Elementor\Repeater();
        
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
		
		$this->add_control(
			'links3',
			[
				'label' => esc_html__( 'Add Link 3 Item', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'newsletter_opt',
			[
				'label' => esc_html__( 'Newsletter Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'style' => '1',
				],
			]
		);
        
        $this->add_control(
			'n_title', [
				'label' => esc_html__( 'Newsletter Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Section Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => '1',
				],
			]
		);
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Newsletter Text', 'eergx-plugin' ),
				'default' => esc_html__( 'Newsletter Text', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => '1',
				],
			]
		);
        $this->add_control(
			'shortcode', [
				'label' => esc_html__( 'Shortcode', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => '1',
				],
			]
		);
		$this->add_control(
			'info', [
				'label' => esc_html__( 'Newsletter Info', 'eergx-plugin' ),
				'default' => esc_html__( 'Newsletter Info', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'condition' => [
					'style' => '1',
				],
			]
		);
		$this->end_controls_section();
		
        
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		require __DIR__ . '/footer-template/footer-' . $settings['style'] . '.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Footer_One() );