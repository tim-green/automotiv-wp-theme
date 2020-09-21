<?php
/*
  ACF Flexible Content - Three Card Blocks
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>


<?php if( have_rows('3_card_blocks') ): ?>

<?php while( have_rows('3_card_blocks') ): the_row(); 

// vars
$icon = get_sub_field('icon');
$header = get_sub_field('header');
$content = get_sub_field('content');

?>


<div class="col-12 col-lg-4 text-center">
    <?php echo $icon; ?>
    <h5 class="my-2 font-weight-bold"><?php echo $header; ?></h5>
    <p><?php echo $content; ?></p>
</div>


            <?php endwhile; ?>
<?php endif; ?>