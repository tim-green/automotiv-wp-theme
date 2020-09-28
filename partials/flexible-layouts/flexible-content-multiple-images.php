<?php
/*
  ACF Flexible Content - Content with Multiple Images
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
<div class="row">
   <div class="col-8 col-lg-8">
            <?php the_sub_field('content'); ?>
    </div>

    <div class="col-12 col-lg-4">
        <?php
            if( have_rows('images') ):
            while ( have_rows('images') ) : the_row();
        ?>

        <img class="img-fluid pb-4" src="<?php the_sub_field('image'); ?>">   
        <?php
            endwhile;
            else : endif;
        ?> 
      
    </div>
</div>