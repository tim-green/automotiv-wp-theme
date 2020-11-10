<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package automotiv
 */
//get newsletter field from ACF
$newsletter_form_id = get_field('footer_newsletter_signup_field_id', 'option'); 
?>

</div><!-- #content -->

<footer class="site-footer border-top mt-5">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="d-flex">
                    <div class="col-4">
                        <h6>Shop</h6>
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'container' => 'ul',
                                'menu_class' => 'nav flex-column',
                                'depth' => 1,
                            ));
                        ?>
                    </div>
                    <div class="col-4">
                        <h6>Account</h6>
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu-1',
                                'container' => 'ul',
                                'menu_class' => 'nav flex-column',
                                'depth' => 1,
                            ));
                        ?>
                    </div>
                    <div class="col-4">
                        <h6>Resources</h6>
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu-2',
                                'container' => 'ul',
                                'menu_class' => 'nav flex-column',
                                'depth' => 1,
                            ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <p mb-0><?php the_field('copyright_text','option'); ?></p>
                <div class="mb-3 newsletter">
                    <?php 
                    if ($newsletter_form_id) {
                        echo '<p class="mb-2 font-weight-bold">Get all the latest product updates, specials and coupons!</p>';
                        gravity_form( $newsletter_form_id, false, false, false, '', true, 12 );
                    }
                     ?>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 text-center">
               <!-- credit card info ACF field FA -->
            </div>

        </div>
    </div>
    <div class="copyright bg-primary">
        <div class="container">
            <p class="text-white m-0 p-2 text-center">&copy; <?php echo get_bloginfo('name'); ?> <?php echo date("Y"); ?></p>

        </div>

    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('footer_embed', 'option'); ?>

<script>
  document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
  ':35729/livereload.js?snipver=1"></' + 'script>')
</script> 
</body>

</html>