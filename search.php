<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package automotiv
 */

get_header();
?>


	<div id="primary" class="content-area article-single">
    <main id="main" class="site-main">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url(<?php the_post_thumbnail_url('full'); ?>); background-position: center center; background-size: cover; position: relative">

            <div class="container">
                <h1 class="display-4 text-white font-weight-bold">
				<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'automotiv' ), '<span>' . get_search_query() . '</span>' );
					?>		
			</h1>
            </div>
            <div class="hero-overlay"></div>
        </div>

        <div class="container">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

			else :

			get_template_part( 'template-parts/content', 'none' );

			endif;
			?>


        </div>



    </main><!-- #main -->
</div><!-- #primary -->




<?php
get_footer(); ?>