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
$image = get_sub_field('image');
$header = get_sub_field('header');
$content = get_sub_field('content');

?>


<div class="col-12 col-lg-4 text-center">
   
    <?php if( get_sub_field('icon') ): ?>
      <?php echo $icon; ?>
    <?php endif; ?>

    <?php if( get_sub_field('image') ): ?>
      <img src="<?php echo $image; ?>" />
    <?php endif; ?>

    <h5 class="my-2 font-weight-bold"><?php echo $header; ?></h5>
    <p><?php echo $content; ?></p>
</div>


            <?php endwhile; ?>
<?php endif; ?>