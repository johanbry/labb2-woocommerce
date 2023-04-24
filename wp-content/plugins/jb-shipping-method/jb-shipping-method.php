<?php
/*

Plugin Name: JB Shipping Method

Description: JB shipping method plugin

Version: 1.0.0

Author: Johan Brynielsson

Author URI: https://github.com/johanbry

*/

/**
 * Check if WooCommerce is active
 */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    function jb_shipping_method_init()
    {
        if (!class_exists('WC_JB_Shipping_Method')) {
            class WC_JB_Shipping_Method extends WC_Shipping_Method

            {
                public $min_amount = 0;
                public $title_free;

                /**
                 * Constructor for your shipping class
                 *
                 * @access public
                 * @return void
                 */
                public function __construct($instance_id = 0)
                {
                    $this->id                 = 'jb_shipping_method'; // Id for your shipping method. Should be uunique.
                    $this->instance_id        = absint($instance_id);
                    $this->method_title       = __('Flat rate with free shipping over amount');  // Title shown in admin
                    $this->method_description = __('Flat rate shipping cost with free shipping over specified aminimum amount.'); // Description shown in admin
                    $this->tax_status         = 'taxable';
                    $this->supports           = array(
                        'shipping-zones',
                        'instance-settings',
                        'instance-settings-modal'
                    );
                    $this->init();
                }

                /**
                 * Init your settings
                 *
                 * @access public
                 * @return void
                 */
                function init()
                {
                    // Load the settings API
                    $this->init_instance_form_fields();
                    $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

                    $this->enabled            = $this->get_option('enabled');
                    $this->title              = $this->get_option('title');
                    $this->title_free         = $this->get_option('title_free');
                    $this->cost               = $this->get_option('cost', 0);
                    $this->min_amount         = $this->get_option('min_amount', 0);


                    // Save settings in admin if you have any defined
                    add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
                }

                /**
                 * Initialise Gateway Settings Instance Form Fields
                 */
                function init_instance_form_fields()
                {
                    $this->instance_form_fields = array(
                        'title' => array(
                            'title' => __('Title', 'woocommerce'),
                            'type' => 'text',
                            'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
                            'default' => __('Flat rate (or free)', 'woocommerce')
                        ),
                        'title_free' => array(
                            'title' => __('Title', 'woocommerce'),
                            'type' => 'text',
                            'description' => __('The title which the user sees when free shipping amount is reached.', 'woocommerce'),
                            'default' => __('Free shipping', 'woocommerce')
                        ),
                        'description' => array(
                            'title' => __('Description', 'woocommerce'),
                            'type' => 'textarea',
                            'description' => __('This controls the description which the user sees during checkout.', 'woocommerce'),
                            'default' => __("Flat rate with specified cost, but free shipping over specified amount.", 'woocommerce')
                        ),
                        'cost' => array(
                            'title' => __('Cost', 'woocommerce'),
                            'type' => 'number',
                            'description' => __('This controls the cost of the shipping.', 'woocommerce'),
                            'default' => '0'
                        ),
                        'min_amount' => array(
                            'title' => __('Minimum amount free shipping', 'woocommerce'),
                            'type' => 'number',
                            'description' => __('This controls the minimum amount for free shipping', 'woocommerce'),
                            'default' => '0'
                        )
                    );
                } // End instance_init_form_fields()

                /**
                 * calculate_shipping function.
                 *
                 * @access public
                 * @param array $package
                 * @return void
                 */
                public function calculate_shipping($package = array())
                {
                    $total = WC()->cart->get_displayed_subtotal();
                    $cost = $total > $this->min_amount ? 0 : $this->get_option('cost');
                    $label = $cost === 0 ? __($this->title_free, "Woocommerce") : __($this->title, "Woocommerce");

                    $rate = array(
                        'label' => $label,
                        'cost' => $cost,
                        'package' => $package,
                    );

                    // Register the rate
                    $this->add_rate($rate);
                }
            }
        }
    }

    add_action('woocommerce_shipping_init', 'jb_shipping_method_init');

    function add_jb_shipping_method($methods)
    {
        $methods['jb_shipping_method'] = 'WC_JB_Shipping_Method';
        return $methods;
    }

    add_filter('woocommerce_shipping_methods', 'add_jb_shipping_method');
}
