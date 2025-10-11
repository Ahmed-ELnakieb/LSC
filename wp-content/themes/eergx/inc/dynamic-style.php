<?php

// File Security Check
if (!defined('ABSPATH')) {
    exit;
}

function eergx_theme_options_style()
{

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style('eergx-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
    $css_output = '';
    $primery_color = cs_get_option('theme-color-1');
    $secondary_color = cs_get_option('theme-color-2');
    $gradiend_one = cs_get_option('gradient_mp');
    $gradiend_two = cs_get_option('gradient_sp');

    

    /**
     * Theme Primery Global Color
     */
    if (!empty($primery_color)) {
        $css_output .= '       
        :root {
            --egx-pr-1: ' . esc_attr($primery_color) . ';
        }            
        ';
    }


    /**
     * Theme Heading Global Color
     */
    if (!empty($secondary_color)) {
        $css_output .= '       
        :root {
            --egx-pr-2: ' . esc_attr($secondary_color) . ';
        }            
        ';
    }

    if(!empty($gradiend_one['color-1']) && !empty($gradiend_one['color-2']) && !empty($gradiend_one['color-3'])){
        $css_output .= '
        :root {
            --egx-gd-1: -webkit-linear-gradient(-180deg, '.esc_attr($gradiend_one['color-1']).' 0%, '.esc_attr($gradiend_one['color-2']).' 30%, '.esc_attr($gradiend_one['color-3']).' 100%);
        }

        ';
    }
    if(!empty($gradiend_two['color-1']) && !empty($gradiend_two['color-2'])){
        $css_output .= '
        :root {
            --egx-gd-2: -webkit-linear-gradient(0deg, '.esc_attr($gradiend_two['color-1']).' 0%, '.esc_attr($gradiend_two['color-2']).' 100%);
        }

        ';
    }



    wp_add_inline_style('eergx-theme-custom-style', $css_output);

}
add_action('wp_enqueue_scripts', 'eergx_theme_options_style');
