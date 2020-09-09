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