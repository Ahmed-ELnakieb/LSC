<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Pricing_Two extends Widget_Base {

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
		return 'go-pricing-two';
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
		return esc_html__( 'Eergx Pricing Two', 'eergx-plugin' );
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
			'--pricing-option',
			[
				'label' => esc_html__( 'Pricing Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		
        
        $this->add_control(
			'pricing_img', [
				'label' => esc_html__( 'Pricing Image', 'gesto-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
       
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'eergx-plugin' ),
				'default' => esc_html__( 'Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
			]
		);
       
       
        $this->add_control(
			'price', [
				'label' => esc_html__( 'Price', 'eergx-plugin' ),
				'default' => esc_html__( '$199', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'period', [
				'label' => esc_html__( 'Period', 'eergx-plugin' ),
				'default' => esc_html__( '/monthly', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
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

		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'eergx-plugin' ),
				'type' => Controls_Manager::ICONS,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'List Title', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'custom_class', [
				'label' => esc_html__( 'Custom Class', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $this->add_control(
			'lists',
			[
				'label' => esc_html__( 'Add pricing List Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list_title }}}',
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
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pricing_sub_title_style',
			[
				'label' => esc_html__( 'Title Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'ttl_margin',
			[
				'label' => esc_html__( 'Name Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .person-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Name Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .person-name' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Name Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .person-name:hover' => 'color: {{VALUE}}',
				],
			]
		);
		// typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'm_s_typography',
				'selector' => '{{WRAPPER}} .person-name',
			]
		);


		$this->end_controls_section();
		$this->start_controls_section(
			'pricing_designation_style',
			[
				'label' => esc_html__( 'pricing Designation Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pricing_designation',
			[
				'label' => esc_html__( 'Designation Margin', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .person-disc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'desic_color',
			[
				'label' => esc_html__( 'Designation Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .person-disc' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[

				'name' => 'pricing_des_typography',
				'selector' => '{{WRAPPER}} .person-disc',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'pricing_pricing_slider_style',
			[
				'label' => esc_html__( 'Slider Control Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Arrow Hover Color', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-slider-btn-1-item:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .fx-slider-pagi-1 span:is(.swiper-pagination-bullet-active)' => 'background: {{VALUE}}',
					'{{WRAPPER}} .fx-slider-pagi-1 span::after' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        require __DIR__ . '/pricing-template/pricing-2.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Pricing_Two() );