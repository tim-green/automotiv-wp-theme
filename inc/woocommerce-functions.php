<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package automotiv
 */

 //change order number in WooCommerce

add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number' );

if (!function_exists('change_woocommerce_order_number')) {
    function change_woocommerce_order_number( $order_id ) {
        $prefix = 'AUTOMO-';
        $new_order_id = $prefix . $order_id;
        return $new_order_id;
    }
}
// Custom Order status
// register the status
function automotiv_wc_register_post_statuses() {
    register_post_status( 'wc-ready-shipping', array(
    'label' => _x( 'Ready for shipping', 'WooCommerce Order status', 'text_domain' ),
    'public' => true,
    'exclude_from_search' => false,
    'show_in_admin_all_list' => true,
    'show_in_admin_status_list' => true,
    'label_count' => _n_noop( 'Ready for shipping (%s)', 'Ready for shipping (%s)', 'text_domain' )
    ) );
    }
add_filter( 'init', 'automotiv_wc_register_post_statuses' );
// cart - remove other shipping options if we have $4.50 shipping
add_filter('woocommerce_package_rates', 'custom_shipping_option', 20, 2 );
/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function woocommerce_related_products_args($args)
{
    $defaults = array(
        'posts_per_page' => 3,
        'columns' => 3,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}
add_filter('woocommerce_output_related_products_args', 'woocommerce_related_products_args');