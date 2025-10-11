<?php
/**
 * All Elementor widget init
 * @package eergx
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( !class_exists('Eergx_Elementor_Widget_Init') ){

	class Eergx_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/editor/after_enqueue_styles',array($this,'editor_style'));
			add_action('elementor/documents/register_controls',array($this,'register_eergx_page_controls'));
			add_action('wp_enqueue_scripts', [$this, 'register_widget_styles']);
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'eergx_widgets',
				[
					'title' => __( 'eergx Addons', 'eergx-plugin' ),
					'icon' => 'fa fa-plug'
				]
			);
		}
		

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			$widgests_lists = glob(plugin_dir_path( __FILE__ ) .'widgets/*/*.php');			
			foreach($widgests_lists as $custom_widget){
				require_once $custom_widget;
			}
		}

		public function register_widget_styles(){
			
		}

		public function editor_style(){
			$cs_icon = plugins_url( 'icons.png', __FILE__ );
			wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .eergx-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
		}

		/**
		 * Elemenotr Page Settings
		 *
		 * @param [type] $document
		 * @return void Elementor Page Settings
		 */
		public function register_eergx_page_controls( $document ) {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

			$document->start_controls_section(
				'body_eergx_style',
				[
					'label' => esc_html__( 'eergx Custom Body Style', 'eergx-plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$document->add_control(
				'body_color',
				[
					'label' => esc_html__( 'Body Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}' => 'color: {{VALUE}}',
					],
				]
			);

			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Page Body Font', 'textdomain' ),
					'name' => 'page_body_font',
					'selector' => '{{WRAPPER}}',
				]
			);
			
			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Page Heading', 'textdomain' ),
					'name' => 'page_heading_font',
					'selector' => '{{WRAPPER}} h1, h2, h3, h4, h5, h6',
				]
			);
			$document->add_control(
				'h_color',
				[
					'label' => esc_html__( 'Heading Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h1, h2, h3, h4, h5, h6' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'body_bg_color',
					'types' => [ 'classic' ],
					'exclude' => [ 'color' ],
					'selector' => '{{WRAPPER}} .body-bg-1',
					'fields_options' => [
						'background' => [
							'label' => esc_html__( 'Body Custom BG Image ', 'eergx-plugin' ),
							'description' => esc_html__( 'Choose background type and style.', 'eergx-plugin' ),
							'separator' => 'before',
						]
					]
				]
			);
			$document->end_controls_section();
		}

		


	}

	if ( class_exists('Eergx_Elementor_Widget_Init') ){
		Eergx_Elementor_Widget_Init::getInstance();
	}

}//end if

