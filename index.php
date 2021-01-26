<?php
/**
 * The main template file 
 * Resources page
 *
 * This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

get_header();
?>
<div class="bg-light border-bottom">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <header class="page-header">
                    <h1 class="page-title text-center">
						<?php the_title(); ?>
					</h1>
                    <div class="archive-description text-center"></div>
                </header><!-- .page-header -->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
			$args = array(
				'posts_per_page' => 6, // How many items to display
				'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
			);
			$cats = get_terms( array(
				'taxonomy' => 'category',
				'hide_empty' => true,
			) );


<?php
get_footer();?>