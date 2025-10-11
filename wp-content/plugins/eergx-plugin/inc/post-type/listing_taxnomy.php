<?php 

if ( !function_exists( 'eergx_tour_type_tax' ) ) {
    function eergx_tour_type_tax() {
        $labels = [
            'name'          => esc_html__( 'Tour Type', 'eergx-plugin' ),
            'menu_name'     => esc_html__( 'Tour Type', 'eergx-plugin' ),
            'singular_name' => esc_html__( 'Tour Type', 'eergx-plugin' ),
            'search_items'  => esc_html__( 'Search Type', 'eergx-plugin' ),
            'all_items'     => esc_html__( 'All Type', 'eergx-plugin' ),
            'new_item_name' => esc_html__( 'New Type', 'eergx-plugin' ),
            'add_new_item'  => esc_html__( 'Add New Type', 'eergx-plugin' ),
            'edit_item'     => esc_html__( 'Edit New Type', 'eergx-plugin' ),
            'update_item'   => esc_html__( 'Update New Type', 'eergx-plugin' ),
        ];
        $args = array(
            'labels'                => $labels,
            'hierarchical'          => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'update_count_callback' => '_update_post_term_count',
        );
        register_taxonomy('tour_type', 'at_biz_dir', $args);
    }
    add_action( 'init', 'eergx_tour_type_tax' );
}