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

// add status to list
function automotiv_wc_add_order_statuses( $order_statuses ) {
    $order_statuses['wc-ready-shipping'] = _x( 'Ready for shipping', 'WooCommerce Order status', 'text_domain' );
    return $order_statuses;
    }
add_filter( 'wc_order_statuses', 'automotiv_wc_add_order_statuses' );
// add custom colour for status
add_action('admin_head', 'styling_admin_order_list' );
function styling_admin_order_list() {
    global $pagenow, $post;

    if( $pagenow != 'edit.php') return; // Exit
    //if( get_post_type($post->ID) != 'shop_order' ) return; // Exit

    // HERE we set your custom status
    $order_status = 'ready-shipping';
    ?>
<style>
.order-status.status-<?php echo sanitize_title($order_status);

?> {
    background: #d7f8a7;
    color: #0c942b;
}
</style>
<?php
}

 // Update the count on cart item, found on Header 
 add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

 function woocommerce_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    echo '<div id="cart-dropdown" class="dropdown w-100">';
    echo '<a class="btn-primary dropdown-toggle p-2 rounded" role="button" id="dropdown-mini-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">';
    echo 'Cart <span id="cart-customlocation" class="badge badge-light animated swing">' . WC()->cart->get_cart_contents_count() . '</span></a>';

    echo '<div id="custom-mini-cart" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-mini-cart">';
    woocommerce_mini_cart(); 
    echo '</div>';
    echo '</div>';
    
    $fragments['div#cart-dropdown'] = ob_get_clean();
    
    return $fragments;

 }

// loop - remove breadcrumbs from shop page
add_action('template_redirect', 'remove_shop_breadcrumbs' );

function remove_shop_breadcrumbs(){
 
    if (!is_product())
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
 
}
// product - remove additional information tab
add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 9999 );
// cart - remove suggestions from cart collateral
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
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