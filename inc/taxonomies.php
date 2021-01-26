<?php

/**
 * Registers the `YMM` taxonomy, for use with 'product'.
 */
function ymm_init()
{
    register_taxonomy(
        'ymm', array( 'product' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(
        'manage_terms'  => 'edit_posts',
        'edit_terms'    => 'edit_posts',
        'delete_terms'  => 'edit_posts',
        'assign_terms'  => 'edit_posts',
        ),
        'labels'            => array(
        'name'                       => __('Year / Make / Model', 'automotiv'),
        'singular_name'              => _x('Year / Make / Model', 'taxonomy general name', 'automotiv'),
        'search_items'               => __('Search YMM', 'automotiv'),
        'popular_items'              => __('Popular YMM', 'automotiv'),
        'all_items'                  => __('All', 'automotiv'),
        'parent_item'                => __('Parent', 'automotiv'),
        'parent_item_colon'          => __('Parent:', 'automotiv'),
        'edit_item'                  => __('Edit YMM', 'automotiv'),
        'update_item'                => __('Update YMM', 'automotiv'),
        'view_item'                  => __('View YMM', 'automotiv'),
        'add_new_item'               => __('Add New', 'automotiv'),
        'new_item_name'              => __('New YMM', 'automotiv'),
        'separate_items_with_commas' => __('Separate ymms with commas', 'automotiv'),
        'add_or_remove_items'        => __('Add or remove ymms', 'automotiv'),
        'choose_from_most_used'      => __('Choose from the most used ymms', 'automotiv'),
        'not_found'                  => __('No ymms found.', 'automotiv'),
        'no_terms'                   => __('No ymms', 'automotiv'),
        'menu_name'                  => __('Year / Make / Model', 'automotiv'),
        'items_list_navigation'      => __('Ymms list navigation', 'automotiv'),
        'items_list'                 => __('Ymms list', 'automotiv'),
        'most_used'                  => _x('Most Used', 'ymm', 'automotiv'),
        'back_to_items'              => __('&larr; Back to Ymms', 'automotiv'),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'ymm',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        ) 
    );

}
add_action('init', 'ymm_init');

/**
 * Sets the post updated messages for the `ymm` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `ymm` taxonomy.
 */
function ymm_updated_messages( $messages )
{

    $messages['ymm'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => __('Ymm added.', 'automotiv'),
    2 => __('Ymm deleted.', 'automotiv'),
    3 => __('Ymm updated.', 'automotiv'),
    4 => __('Ymm not added.', 'automotiv'),
    5 => __('Ymm not updated.', 'automotiv'),
    6 => __('Ymms deleted.', 'automotiv'),
    );

    return $messages;
}
add_filter('term_updated_messages', 'ymm_updated_messages');


/**
 * Registers the `vendor` taxonomy,
 * for use with 'product'.
 */
function vendor_init()
{
    register_taxonomy(
        'vendor', array( 'product', 'shop_order' ), array(
        'hierarchical'      => false,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(
        'manage_terms'  => 'edit_posts',
        'edit_terms'    => 'edit_posts',
        'delete_terms'  => 'edit_posts',
        'assign_terms'  => 'edit_posts',
        ),
        'labels'            => array(
        'name'                       => __('Vendor', 'automotiv'),
        'singular_name'              => _x('Vendor', 'taxonomy general name', 'automotiv'),
        'search_items'               => __('Search Vendors', 'automotiv'),
        'popular_items'              => __('Popular Vendors', 'automotiv'),
        'all_items'                  => __('All', 'automotiv'),
        'parent_item'                => __('Parent', 'automotiv'),
        'parent_item_colon'          => __('Parent:', 'automotiv'),
        'edit_item'                  => __('Edit Vendor', 'automotiv'),
        'update_item'                => __('Update Vendor', 'automotiv'),
        'view_item'                  => __('View Vendor', 'automotiv'),
        'add_new_item'               => __('Add New', 'automotiv'),
        'new_item_name'              => __('New Vendor', 'automotiv'),
        'separate_items_with_commas' => __('Separate Vendors with commas', 'automotiv'),
        'add_or_remove_items'        => __('Add or remove Vendors', 'automotiv'),
        'choose_from_most_used'      => __('Choose from the most used Vendors', 'automotiv'),
        'not_found'                  => __('No Vendors found.', 'automotiv'),
        'no_terms'                   => __('No Vendors', 'automotiv'),
        'menu_name'                  => __('Vendors', 'automotiv'),
        'items_list_navigation'      => __('Vendor list navigation', 'automotiv'),
        'items_list'                 => __('Vendor list', 'automotiv'),
        'most_used'                  => _x('Most Used', 'ymm', 'automotiv'),
        'back_to_items'              => __('&larr; Back to Vendors', 'automotiv'),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'vendor',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        ) 
    );

}
add_action('init', 'vendor_init');

/**
 * Sets the post updated messages for the `ymm` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `ymm` taxonomy.
 */
function vendor_updated_messages( $messages )
{

    $messages['ymm'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => __('Vendor added.', 'automotiv'),
    2 => __('Vendor deleted.', 'automotiv'),
    3 => __('Vendor updated.', 'automotiv'),
    4 => __('Vendor not added.', 'automotiv'),
    5 => __('Vendor not updated.', 'automotiv'),
    6 => __('Vendors deleted.', 'automotiv'),
    );

    return $messages;
}
add_filter('term_updated_messages', 'vendor_updated_messages');