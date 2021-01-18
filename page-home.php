<?php

/**
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

get_header();
?>

<?php
    get_template_part('template-parts/acf-slider');            
?>

<div id="choose-your-vehicle" class="bg-light border-bottom">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="home-ymm">
                    <p class="mb-0 text-center"><a class="btn-lg btn btn-primary"
                            href="<?php echo site_url(); ?>/shop">Choose your Parts</a></p>
                </div>
            </div>
        </div>
        <div class="d-none">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                );
            $loop = new WP_Query( $args );
            
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>



<div class="bg-white py-lg-5">
    <div class="container py-5">
        <div class="row home-benefits">
        <?php the_content();?>
        <?php
            get_template_part('partials/acf-flexible-loop');            
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>