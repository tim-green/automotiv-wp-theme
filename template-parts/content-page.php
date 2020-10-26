<?php
/**
 * Template part for displaying page content within page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <?php
    the_content();
    get_template_part('partials/acf-flexible-loop');
    wp_link_pages(
        array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'automotiv'),
        'after'  => '</div>',
        ) 
    );
    ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->