<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package automotiv
 */

/* <?php

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


// loop - product title
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'loop_product_title', 10);

function loop_product_title()
{
    echo '<a class="mt-2" href="' . get_the_permalink()  . '"><p class="h5 text-dark ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '"><strong>' . get_the_title() . '</strong></p></a>';
}

// loop brand.. get brand name
function get_brand_name($product_id) {
    $brand = wp_get_object_terms( $product_id, 'pwb-brand' );
    if($brand) {
        return $brand[0]->name;
    }
}

// loop - remove link
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);


// product - remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// product - image modification
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
// product - remove additional information tab
add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 9999 );
  
function remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

// cart - remove suggestions from cart collateral
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// cart - remove other shipping options if we have $4.50 shipping
add_filter('woocommerce_package_rates', 'custom_shipping_option', 20, 2 );
// cart - notices 
function added_to_cart_message_html($message, $products)
{
    $count = 0;
    $titles = array();
    foreach ($products as $product_id => $qty) {
        $titles[] = ($qty > 1 ? absint($qty) . ' &times; ' : '') . sprintf(_x('%s', 'Item name in quotes', 'woocommerce'), strip_tags(get_the_title($product_id)));
        $count += $qty;
    }

    $titles     = array_filter($titles);
    $added_text = sprintf(_n(
        '%s is added to your cart.', // Singular
        '%s are added to your cart.', // Plural
        $count, // Number of products added
        'woocommerce' // Textdomain
    ), wc_format_list_of_items($titles));
    $message    = sprintf('<div class="d-flex justify-content-between"><div class="d-flex"><i class="las la-check-circle text-success h4 mb-0 mr-2"></i> <strong>%s</strong></div> <a href="%s" class="btn btn-primary btn-sm">%s</a></div>', esc_html($added_text), esc_url(wc_get_page_permalink('cart')), esc_html__('View cart', 'woocommerce'));


    return $message;
}
add_filter('wc_add_to_cart_message_html', 'added_to_cart_message_html', 10, 2);
// checkout - custom fields
function custom_woocommerce_form_field($key, $args, $value = null)
{
    $defaults = array(
        'type' => 'text',
        'label' => '',
        'description' => '',
        'placeholder' => '',
        'maxlength' => false,
        'required' => false,
        'autocomplete' => false,
        'id' => $key,
        'class' => array(),
        'label_class' => array(),
        'input_class' => array(),
        'return' => false,
        'options' => array(),
        'custom_attributes' => array(),
        'validate' => array(),
        'default' => '',
        'autofocus' => '',
        'priority' => '',
    );

    $args = wp_parse_args($args, $defaults);
    $args = apply_filters('woocommerce_form_field_args', $args, $key, $value);

    if ($args['required']) {
        $args['class'][] = 'validate-required';
        $required = ' <abbr class="required" title="' . esc_attr__('required', 'woocommerce') . '">*</abbr>';
    } else {
        $required = '';
    }

    if (is_string($args['label_class'])) {
        $args['label_class'] = array($args['label_class']);
    }

    if (is_null($value)) {
        $value = $args['default'];
    }

// checkout - add email validation

add_filter( 'woocommerce_checkout_fields' , 'automotiv_add_email_verification_field_checkout' );
   
function automotiv_add_email_verification_field_checkout( $fields ) {
  
$fields['billing']['billing_email']['class'] = array( 'form-row-first' );
  
$fields['billing']['billing_em_ver'] = array(
    'label' => 'Confirm email address',
    'required' => false,
    'class' => array( 'form-row-last' ),
    'clear' => true,
    'priority' => 999,
);
  
return $fields;
}
 
add_action('woocommerce_checkout_process', 'automotiv_matching_email_addresses');
  
function automotiv_matching_email_addresses() { 
    $email1 = $_POST['billing_email'];
    $email2 = $_POST['billing_em_ver'];
    if ( $email2 !== $email1 ) {
        wc_add_notice( 'Your email addresses do not match', 'error' );
    }
}
// checkout - place order button text
add_filter('woocommerce_order_button_text', 'checkout_place_order_button_text');

function checkout_place_order_button_text($order_button_text)
{
    return 'Place Order'; // new text is here
}

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
add_filter('woocommerce_output_related_products_args', 'woocommerce_related_products_args');/**
 * Function that checks if a product is in the cart already
 * and returns the correct button text
 */

function change_button_text( $product_id, $button_text ) {
    foreach( WC()->cart->get_cart() as $item ) {
        if( $product_id === $item['product_id'] ) {
            return __('Already in Cart. Add again?', 'woocommerce');
        }
    }
    return $button_text;
}

/**
 * Archive pages: For simple products (ajax add to cart button)
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'change_ajax_add_to_cart_button_text', 10, 2 );
function change_ajax_add_to_cart_button_text( $button_text, $product ) {
    if ( $product->is_type('simple') ) {
        $button_text = change_button_text( $product->get_id(), $button_text );
    }
    return $button_text;
}

/**
 * Single product pages: Simple and external products
 */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'change_single_add_to_cart_button_text', 10, 2 );
function change_single_add_to_cart_button_text( $button_text, $product ) {
    if (  ! $product->is_type('variable') ) {
        $button_text = change_button_text( $product->get_id(), $button_text );
    }
    return $button_text;
}

/**
 * Single product pages: Variable product and its variations
 */
add_action( 'woocommerce_after_variations_form', 'action_after_variations_form_callback' );
function action_after_variations_form_callback() {
    global $product;

    // Get the produc variation Ids for the variable product
    $children_ids = $product->get_visible_children();

    $ids_in_cart  = [];

    // Loop through cart items
    foreach( WC()->cart->get_cart() as $item ) {
        if( in_array( $item['variation_id'], $children_ids ) ) {
            $ids_in_cart[] = $item['variation_id'];
        }
    }
    ?>
    <script type="text/javascript">
    jQuery(function($){
        var b = 'button.single_add_to_cart_button',
            t = '<?php echo $product->single_add_to_cart_text(); ?>';

        $('form.variations_form').on('show_variation hide_variation found_variation', function(){
            $.each(<?php echo json_encode($ids_in_cart); ?>, function(j, v){
                var i = $('input[name="variation_id"]').val();
                if(v == i && i != 0 ) {
                    $(b).html('<?php _e('Already in Cart. Add again?', 'woocommerce'); ?>');
                    return false;
                } else {
                    $(b).html(t);
                }
            });
        });
    });
    </script>
    <?php


/**
 * Function that shows a message when you've just added a 
 * product to the cart
 */
add_action('wp_footer','add_to_cart_added_woocommerce');
function add_to_cart_added_woocommerce(){
    if ( is_shop() || is_product_category() || is_product_tag() ): // Only for archives pages
        $new_text = __( 'Added. Add again?', 'woocommerce' );
        ?>
            <script type="text/javascript">
                (function($){
                    $('a.add_to_cart_button').click( function(){
                        $this = $(this);
                        $( document.body ).on( 'added_to_cart', function(){
                            $($this).text('<?php echo $new_text; ?>');
                        });
                    });

                })(jQuery); // "jQuery" Working with WP (added the $ alias as argument)
            </script>
        <?php
    endif;
}