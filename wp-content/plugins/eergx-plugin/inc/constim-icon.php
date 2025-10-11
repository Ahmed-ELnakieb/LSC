<?php 

if(!function_exists('eergx_register_custom_icon_library')){
    add_filter('elementor/icons_manager/additional_tabs', 'eergx_register_custom_icon_library');
    function eergx_register_custom_icon_library($tabs){
        $custom_tabs = [
            'extra_icon2' => [
                'name' => 'eergx-flat-icon',
                'label' => esc_html__( 'Flaticon', 'eergx' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon_fd-icon.css',
                'enqueue' => [ get_template_directory_uri() . '/assets/css/flaticon_fd-icon.css' ],
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'family-insurance',
                'ver' => EERGX_VERSION,
                'fetchJson' => get_template_directory_uri() . '/assets/js/flaticon.js?v='.EERGX_VERSION,
                'native' => true,
            ]
           

        ];

        $tabs = array_merge($custom_tabs, $tabs);

        return $tabs;
    }
}