<?php

/**
 * Template Name: About Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

get_header();
?>
<div class="container">
    <h1 class="py-3 mb-3 title-border"><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-12 col-lg-12">
            <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
        </div>
    </div>
</div>




<?php
get_footer(); ?>