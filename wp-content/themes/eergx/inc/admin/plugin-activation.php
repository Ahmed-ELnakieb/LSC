<?php

add_action('tgmpa_register', 'eergx_register_required_plugins');

function eergx_register_required_plugins(){

    $plugins = array(
        array(
            'name' => esc_html__('Eergx Plugin', 'eergx'),
            'slug' => 'eergx-plugin',
            'source' => ('https://themexriver.com/wp/eergx/plugin/eergx-plugin.zip'),
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => 'Elementor Website Builder',
            'slug' => 'elementor',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Envato Market', 'eergx'),
            'slug' => 'envato-market',
            'source' => esc_url('https://goo.gl/pkJS33'),
            'external_url' => esc_url('https://goo.gl/pkJS33'),
            'required' => false,
        ),
        
        array(
            'name' => esc_html__('Contact Form 7', 'eergx'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),

        array(
            'name' => esc_html__('MC4WP: Mailchimp for WordPress', 'eergx'),
            'slug' => 'mailchimp-for-wp',
            'required' => false,
        ),

        array(
            'name' => esc_html__('One Click Demo Import', 'eergx'),
            'slug' => 'one-click-demo-import',
            'required' => true,
        ),
        array(
            'name' => esc_html__('WooCommerce', 'eergx'),
            'slug' => 'woocommerce',
            'required' => false,
        )

    );

    $config = array(
        'id' => 'eergx',
        'parent_slug' => 'eergx',
        'menu' => 'tgmpa-install-plugins',
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'default_path' => '',
    );

    tgmpa($plugins, $config);
}
