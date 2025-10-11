<?php

/**
 * Elementor Single Widget
 * @package eergx Tools
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Eergx_Blog_Two extends Widget_Base {



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
		return 'eergx-blog-2';
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
		return esc_html__( 'Eergx Blog Two', 'eergx-plugin' );
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
			'post_sec_h_option',
			[
				'label' => esc_html__( 'Blog Option', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'eergx-plugin' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'ASC',
				'options'   => [
					'ASC'  => esc_html__( 'Ascending', 'eergx-plugin' ),
					'DESC' => esc_html__( 'Descending', 'eergx-plugin' ),
				],
			]
		);
		
		$this->add_control(
			'post_per_page',
			[
				'label'   => __( 'Posts Per Page', 'eergx-plugin' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 1,
				'default' => 5,
			]
		);
        $this->add_control(
			'post_categories',
			[
				'type'        => Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Select Categories', 'eergx-plugin' ),
				'options'     => eergx_blog_category(),
				'label_block' => true,
				'multiple'    => true,
			]
		);
		$this->add_control(
			'title_length',
			[
				'label'     => __( 'Title Length', 'eergx-tools' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 20,
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'label'     => __( 'Excerpt Length', 'eergx-tools' ),
				'type'      => Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 20,
			]
		);
        
        $this->add_control(
			'desc', [
				'label' => esc_html__( 'Desc', 'eergx-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);
		

		$this->end_controls_section();
        $this->start_controls_section(
			'blog_boxc_style',
			[
				'label' => esc_html__( 'Blog Box Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Box BG Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_responsive_control(
			'box_paddint',
			[
				'label' => esc_html__( 'Box Padding', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'blog_style',
			[
				'label' => esc_html__( 'Blog Style', 'eergx-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'post_title',
			[
				'label' => esc_html__( 'Post Title Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'post_list_title_color',
			[
				'label' => esc_html__( 'Post Title Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single .item-title' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_control(
			'post_hover_title_color',
			[
				'label' => esc_html__( 'Post Title Hover Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single .item-title:hover' => 'color: {{VALUE}}'
				],
			]
		);
       
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_title_typography',
				'selector' => '
					{{WRAPPER}} .fx-blog-1-item-single .item-title
				',
			]
		);
        
        $this->add_control(
			'post_date_title',
			[
				'label' => esc_html__( 'Post Date Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'post_date_bg_color',
			[
				'label' => esc_html__( 'Post Date BG Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single .item-date' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'post_date_color',
			[
				'label' => esc_html__( 'Post Date Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single .item-date' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_date_typography',
				'selector' => '
					{{WRAPPER}} .fx-blog-1-item-single .item-date
				',
			]
		);
		
        $this->add_control(
			'post_cate_title',
			[
				'label' => esc_html__( 'Post Category Style', 'eergx-plugin' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'categor_color',
			[
				'label' => esc_html__( 'Post Category Color', 'eergx-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fx-blog-1-item-single .item-subtitle' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fx-blog-1-item-single .item-subtitle' => 'border-color: {{VALUE}}'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'post_cate_typography',
				'selector' => '
				{{WRAPPER}} .fx-blog-1-item-single .item-subtitle
				',
			]
		);
		
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();	

        $args = array(
			'post_type'           => 'post',
			'posts_per_page'      => !empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 1,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'order'               => $settings['post_order'],
		);
		if( ! empty($settings['post_categories'] ) ){
			$args['category_name'] = implode(',', $settings['post_categories']);
		}
		
		$query = new \WP_Query( $args );
        require __DIR__ . '/blog-template/blog-2.php';
    }
    protected function eergx_category_name(){
        $catgorys = get_the_category();
    
        // Shuffle the array of categories
        shuffle($catgorys);
    
        // Select a random category
        $random_category = array_rand($catgorys, 1);
        $category = $catgorys[$random_category];
    
        $meta = get_term_meta($category->term_id, 'barfii_cate_meta', true);
        $catemeta = !empty( $meta['cate-color'] )? $meta['cate-color'] : '#3b60fe';
        ?>
        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
            <span><?php echo esc_html($category->cat_name); ?></span> 
        </a>
    <?php
    }
		
	
}


Plugin::instance()->widgets_manager->register( new Eergx_Blog_Two() );