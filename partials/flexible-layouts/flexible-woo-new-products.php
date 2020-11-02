<?php
/*
  ACF Flexible Content - Woo New Products
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>

<div class="col-12 pb-5">
<?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            ),
        );
    $loop = new WP_Query( $args );
    
    if ( $loop->have_posts() ) {
        echo '<div class="store-featured mb-5">';
        echo '<h3>';
            the_sub_field('header'); 
        echo '<h3>';
        echo '<p class="pb-3 mb-3 title-border">Here are some products hand picked by our staff</p>';
        echo '<div class="row products">';
        while ( $loop->have_posts() ) : $loop->the_post();
            wc_get_template_part( 'content', 'product-homepage' );
        endwhile;
        echo '</div></div>';
    }
    wp_reset_postdata();
    ?>
    </div>