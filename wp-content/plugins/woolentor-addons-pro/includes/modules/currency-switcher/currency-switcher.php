<?php
namespace WoolentorPro\Modules\CurrencySwitcher;
use WooLentorPro\Traits\Singleton;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Currency_Switcher{
    use Singleton;

    /**
     * Module Setting Fields
     */
    public function Fields(){
        $wc_currency = get_woocommerce_currency();
        $fields = array(
            array(
                'id'     => 'woolentor_currency_switcher',
                'name'    => esc_html__( 'Currency Switcher', 'woolentor' ),
                'type'     => 'module',
                'default'  => 'off',
                'section'  => 'woolentor_currency_switcher',
                'option_id'=> 'enable',
                'require_settings'  => true,
                'documentation' => esc_url('https://woolentor.com/doc/currency-switcher-for-woocommerce/'),
                'setting_fields' => array(
                    
                    array(
                        'id'  => 'enable',
                        'name' => esc_html__( 'Enable / Disable', 'woolentor-pro' ),
                        'desc'  => esc_html__( 'You can enable / disable currency switcher from here.', 'woolentor-pro' ),
                        'type'  => 'checkbox',
                        'default' => 'off',
                        'class'   =>'enable woolentor-action-field-left',
                    ),

                    array(
                        'id'        => 'woolentor_currency_list',
                        'name'       => esc_html__( 'Currency Switcher', 'woolentor-pro' ),
                        'type'        => 'repeater',
                        'title_field' => 'currency',
                        'condition'   => [ 'key'=>'enable', 'operator'=>'==', 'value'=>'on' ],
                        'options' => [
                            'button_label' => esc_html__( 'Add Currency', 'woolentor' ),
                        ],
                        'action_button' => [
                            'label'    => esc_html__('Update Exchange Rates', 'woolentor'),
                            'callback' => 'woolentor_currency_exchange_rate', // Callback function name
                            'data'     => [
                                'action' => 'update_currency_exchange_rate_test' // We can pass any data to callback function if needed
                            ],
                            'option_id' => 'default_currency',
                            'update_key' => 'currency', // Field Update base on this field value.
                            'update_fields' => ['currency_excrate'], // Update these fields.
                            'message' => esc_html__( 'Currency exchange rate updated successfully.', 'woolentor' ),
                            'auto_save' => true,
                        ],
                        // Specify which fields should be updated based on repeater items
                        'update_fields' => [
                            [
                                'field_id' => 'default_currency', // ID of the field to update
                                'type' => 'select',
                                'value_key' => 'currency', // Repeater item field to use as option value
                                'label_key' => 'currency' // Repeater item field to use as option label
                            ]
                        ],
                        'fields'  => [

                            array(
                                'id'    => 'currency',
                                'name'   => esc_html__( 'Currency', 'woolentor-pro' ),
                                'type'    => 'select',
                                'default' => $wc_currency,
                                'options' => woolentor_wc_currency_list(),
                                'class'   => 'woolentor-action-field-left wlcs-currency-selection wlcs-currency-selection-field',
                            ),

                            array(
                                'id'        => 'currency_decimal',
                                'name'       => esc_html__( 'Decimal', 'woolentor-pro' ),
                                'type'        => 'number',
                                'default'     => 2,
                                'class'       => 'woolentor-action-field-left',
                            ),

                            array(
                                'id'    => 'currency_position',
                                'name'   => esc_html__( 'Currency Symbol Position', 'woolentor-pro' ),
                                'type'    => 'select',
                                'class'   => 'woolentor-action-field-left',
                                'default' => get_option( 'woocommerce_currency_pos' ),
                                'options' => array(
                                    'left'  => esc_html__('Left','woolentor-pro'),
                                    'right' => esc_html__('Right','woolentor-pro'),
                                    'left_space' => esc_html__('Left Space','woolentor-pro'),
                                    'right_space' => esc_html__('Right Space','woolentor-pro'),
                                ),
                            ),

                            array(
                                'id'        => 'currency_excrate',
                                'name'       => esc_html__( 'Exchange Rate', 'woolentor-pro' ),
                                'type'        => 'number',
                                'default'     => 1,
                                'class'       => 'woolentor-action-field-left wlcs-currency-dynamic-exchange-rate',
                            ),

                            array(
                                'id'        => 'currency_excfee',
                                'name'       => esc_html__( 'Exchange Fee', 'woolentor-pro' ),
                                'type'        => 'number',
                                'default'     => 0,
                                'class'       => 'woolentor-action-field-left',
                            ),

                            array(
                                'id'    => 'disallowed_payment_method',
                                'name'   => esc_html__( 'Payment Method Disables', 'woolentor-pro' ),
                                'type'    => 'multiselect',
                                'options' => function_exists('woolentor_get_payment_method') ? woolentor_get_payment_method() : ['notfound'=>esc_html__('Not Found','woolentor-pro')],
                                'class' => 'woolentor-action-field-left'
                            ),

                            array(
                                'id'        => 'custom_currency_symbol',
                                'name'       => esc_html__( 'Custom Currency Symbol', 'woolentor-pro' ),
                                'type'        => 'text',
                                'class'       => 'woolentor-action-field-left'
                            ),

                            array(
                                'id'    => 'custom_flag',
                                'name'   => esc_html__( 'Custom Flag', 'woolentor-pro' ),
                                'desc'    => esc_html__( 'You can upload your flag for currency switcher from here.', 'woolentor-pro' ),
                                'type'    => 'image_upload',
                                'options' => [
                                    'button_label'        => esc_html__( 'Upload', 'woolentor-pro' ),
                                    'button_remove_label' => esc_html__( 'Remove', 'woolentor-pro' ),
                                ],
                                'class' => 'woolentor-action-field-left'
                            ),

                        ],

                        'default' => array (
                            [
                                'currency'         => $wc_currency,
                                'currency_decimal' => 2,
                                'currency_position'=> get_option( 'woocommerce_currency_pos' ),
                                'currency_excrate' => 1,
                                'currency_excfee'  => 0
                            ],
                        ),

                    ),

                    array(
                        'id'    => 'default_currency',
                        'name'   => esc_html__( 'Default Currency', 'woolentor' ),
                        'type'    => 'select',
                        'options' => woolentor_added_currency_list(),
                        'default' => $wc_currency,
                        'condition'=> [ 'key'=>'enable', 'operator'=>'==', 'value'=>'on' ],
                        'class'   => 'woolentor-action-field-left wlcs-default-selection'
                    ),

                )
            )
        );

        return $fields;
    }

}