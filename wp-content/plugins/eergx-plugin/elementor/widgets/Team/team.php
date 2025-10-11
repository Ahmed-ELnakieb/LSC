<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Team_Carousel extends Widget_Base {

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
		return 'go-team-carousel';
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
		return esc_html__( 'Team Carousel', 'eergx-plugin' );
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
			'--team-option',
			[
				'label' => esc_html__( 'Team Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'custom_class', [
				'label' => esc_html__( 'Add Custom Class If you Want', 'gesto-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'team_img', [
				'label' => esc_html__( 'Team Image', 'gesto-plugin' ),
				'type' => Controls_Manager::MEDIA,
                'label_block' => true,
			]
		);
       
        $repeater->add_control(
			'name', [
				'label' => esc_html__( 'Name', 'eergx-plugin' ),
				'default' => esc_html__( 'Marvin McKinney', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
       
        $repeater->add_control(
			'designation', [
				'label' => esc_html__( 'Name', 'eergx-plugin' ),
				'default' => esc_html__( 'Designation', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
			]
		);
        $repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'eergx-plugin' ),
				'type' => Controls_Manager::URL,
                'label_block' => true,
			]
		);
        $repeater->add_control(
            'social_links',
            [
                'label' => __('Social Links', 'eergx-plugin'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    // social icon
                    [
                        'name' => 'social_icon',
                        'label' => __('Social Icon', 'eergx-plugin'),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-facebook-f',
                            'library' => 'fa-solid',
                        ],
                    ],
                    // social link
                    [
                        'name' => 'social_link',
                        'label' => __('Social Link', 'eergx-plugin'),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __('https://your-link.com', 'eergx-plugin'),
                        'default' => [
                            'url' => '#',
                        ],
                    ],
                ],
            ],
        );
        $this->add_control(
			'teams',
			[
				'label' => esc_html__( 'Add Team Item', 'goyto-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'team_sub_title_style',
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
			'team_designation_style',
			[
				'label' => esc_html__( 'Team Designation Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'team_designation',
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

				'name' => 'team_des_typography',
				'selector' => '{{WRAPPER}} .person-disc',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'team_team_slider_style',
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
        require __DIR__ . '/team-template/team-1.php';
    }


}


Plugin::instance()->widgets_manager->register( new Eergx_Team_Carousel() );