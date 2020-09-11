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
