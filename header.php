<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <?php the_field('header_embed', 'option'); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php 
    if (is_single() && !is_product()) {
        article_structured_data($post->ID);
    }
    ?>
    <?php wp_head(); 
    global $woocommerce;
    
    $logo = get_field('logo', 'option');
    ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="header">
            <!-- top bar -->
            <div class="top-bar border-bottom">
                <div class="container">
                    <div class="row align-items-center py-2">
                        <div class="col-lg-6 d-none d-lg-block">
                        <?php if( have_rows('header_info','option') ): ?>
                        <?php while( have_rows('header_info','option') ): the_row(); 
                            $orders = get_sub_field('orders_over_text');
                            $shipping = get_sub_field('shipping_text');
                            ?>
                                <span class="border-right mr-2 pr-2"><?php the_sub_field('orders_over_text','option'); ?> </span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if( have_rows('header_info','option') ): ?>
                        <?php while( have_rows('header_info','option') ): the_row(); 
                            $orders = get_sub_field('orders_over_text');
                            $shipping = get_sub_field('shipping_text');
                            ?>
                                <span><strong><?php the_sub_field('shipping_text','option'); ?></strong></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                        </div>
    <div class="nav-wrapper bg-primary d-none d-lg-block border-top">
        <div class="container">
        <?php wp_nav_menu(
            array(
                'container' => 'ul',
                'menu_class' => 'nav nav-fill justify-content-between',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ));
        ?>
        </div>
    </div>
