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
                        <div class="col-12 col-lg-6 text-center text-lg-right">
                            
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'top-menu',
                                'depth' => 2,
                                'container' => 'a',
                                'menu_class' => 'mr-0',
                                'add_li_class' => 'border-right pr-2 mr-2'
                            ));
                        ?>
        <div class="container">
        <?php wp_nav_menu(
            array(
                'container' => 'ul',
                'theme_location' => 'main-menu',
                'depth' => 2,
                'menu_class' => 'nav nav-fill justify-content-between',
                'walker'          => new WP_Bootstrap_Navwalker(),
                        <a class="d-block mb-2" href="<?php echo site_url(); ?>">
                            <?php if ($logo) : ?>
                            <img src="<?php echo $logo['url'] ?>" class="img-fluid"
                                alt="<?php echo $logo['alt'] ?>"></a>
                        <?php endif; ?>
                                <div id="custom-mini-cart" class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="dropdown-mini-cart">
                                    <?php woocommerce_mini_cart(); ?>
                                </div>
                
            ));
        ?>
    <!-- Nav -->
    <div class="nav-wrapper bg-primary  d-lg-block border-top">
        <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#auto-menu" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="auto-menu">
            <?php wp_nav_menu(
                array(
                    'container' => 'ul',
                    'theme_location' => 'main-menu',
                    'depth' => 2,
                    'menu_class' => 'nav nav-fill justify-content-between',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                    
                ));
            ?>
    </div>
        </div>
    </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">