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
    <div class="copyright bg-primary">
        <div class="container">
            <p class="text-white m-0 p-2 text-center">&copy; <?php wp_title(); ?> <?php echo date("Y"); ?></p>

        </div>

    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('footer_embed', 'option'); ?>
</body>

</html>