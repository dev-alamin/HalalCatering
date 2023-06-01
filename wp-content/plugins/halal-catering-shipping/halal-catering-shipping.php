<?php
/*
Plugin Name: HalalCatering Addon
Description: Custom shipping method for Halal Catering based on zip code conditions.
Version: 1.0.0
Author: Al Amin
Author URI: https://almn.me
*/
defined('ABSPATH') || die('Are you kidding?');

function halalCateringAddonInit()
{
    // Check if WooCommerce plugin is activated
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        // Add custom shipping method
        add_filter('woocommerce_shipping_methods', 'add_halal_catering_shipping_method');
        function add_halal_catering_shipping_method($methods)
        {
            $methods['halal_catering_shipping_method'] = 'HalalCateringShippingMethod';
            return $methods;
        }

        if (!class_exists('WC_Shipping_Method')) {
            return;
        }

        // Custom shipping method class
        class HalalCateringShippingMethod extends WC_Shipping_Method
        {
            /**
             * Constructor for the shipping method.
             */
            public function __construct()
            {
                $this->id                 = 'halal_catering_shipping_method';
                $this->method_title       = __('HalalCatering levering');
                $this->method_description = __('Custom shipping method for Halal Catering based on zip code conditions.');
                $this->enabled            = 'yes';
                $this->title              = __('HalalCatering levering');
                $this->init();
            }

            /**
             * Initialize the shipping method.
             */
            public function init()
            {
                $this->init_form_fields();
                $this->init_settings();

                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }

            /**
             * Initialize the form fields for the shipping method settings.
             */
            public function init_form_fields()
            {
                $this->form_fields = array(
                    'enabled' => array(
                        'title'   => __('Enable/Disable'),
                        'type'    => 'checkbox',
                        'label'   => __('Enable this shipping method'),
                        'default' => 'yes',
                    ),
                );
            }

            /**
             * Calculate shipping cost.
             */
            public function calculate_shipping($package = array())
            {
                $zipCode = $package['destination']['postcode'];
                // $data = wc_add_notice( $package['destination'] );
                $cost    = 0;
                $minItemsRequired = '';
                $deliveryPrice    = '';

                // Validate zip code
                if( $zipCode ) {

                    if (!preg_match('/^(?!0)\d{4}$/', $zipCode) && ( $zipCode >= 1000 || $zipCode <= 9999 ) ) {
                        $message = "Ugyldigt postnummer. Indtast venligst et 4-cifret nummer mellem 1000 og 9999.";
                        wc_add_notice($message, 'error');
                    }
                    else{
                        // Calculate the shipping cost based on zip code
                        // ... Your existing code to calculate the shipping cost based on zip code
                        if ($zipCode >= 1000 && $zipCode <= 2800) {
                            $minItemsRequired = 10;
                            $deliveryPrice    = 249;
                            $cost             = $deliveryPrice;
                        } elseif ($zipCode >= 2801 && $zipCode <= 4999) {
                            $minItemsRequired = 10;
                            $deliveryPrice    = 299;
                            $cost             = $deliveryPrice;
                        } elseif ($zipCode >= 5000 && $zipCode <= 5999) {
                            $minItemsRequired = 50;
                            $deliveryPrice    = 1199;
                            $cost             = $deliveryPrice;
                        } elseif ($zipCode >= 6000 && $zipCode <= 7999) {
                            $minItemsRequired = 50;
                            $deliveryPrice    = 1299;
                            $cost             = $deliveryPrice;
                        } elseif( $zipCode >= 8000 && $zipCode <= 9999) {
                            $minItemsRequired = 100;
                            $deliveryPrice    = 1799;
                            $cost             = $deliveryPrice;
                        }
                    }
                }

                // Check cart quantity
                $cart = WC()->cart;
                $cartQuantity = $cart->get_cart_contents_count();
                if ($cartQuantity < $minItemsRequired) {
                    $message = "Minimum {$minItemsRequired} varer er påkrævet for levering.";
                    wc_add_notice($message, 'error');
                }

                $rate = array(
                    'id'       => $this->id,
                    'label'    => $this->title,
                    'cost'     => $cost,
                    'calc_tax' => 'per_order',
                );

                $this->add_rate($rate);
            }
        }
    }
}

add_action('woocommerce_shipping_init', 'halalCateringAddonInit');
