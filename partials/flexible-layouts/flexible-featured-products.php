<?php
/*
  ACF Flexible Content - Feature 4 Products from Store
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
<div class="row">
   <div class="col-12 col-lg-12">
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
        echo '<h3>Featured Products</h3>';
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
</div>