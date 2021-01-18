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




<div class="card mb-3 mt-4">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php the_post_thumbnail_url('small'); ?>" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body pb-0">
        <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'automotiv'),
                    array(
                    'span' => array( 'class' => array(),),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
      </div>
    </div>
  </div>
</div>

    <?php
    wp_link_pages(
        array(
        'before' => '<div class="page-links mb-2">' . esc_html__('Pages:', 'automotiv'),
        'after'  => '</div>',
        ) 
    );
    ?>
      
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->