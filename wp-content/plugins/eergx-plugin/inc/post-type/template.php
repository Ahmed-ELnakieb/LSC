<?php
if(!function_exists('eergx_page_template_type')  ){
    function eergx_page_template_type(){
		register_post_type( 'eergx_template',
		array(
			  'labels' => array(
				'name' => __( 'Template','eergx-plugin' ),
				'singular_name' => __( 'Template','eergx-plugin' )
			  ),
			'public' => true,
			'publicly_queryable' => true,
			'show_in_menu'      => false,
			'show_in_nav_menus'   => false,
			'supports' => ['title', 'elementor']
		)
		);
	}
	add_action( 'init','eergx_page_template_type',2 );
}
