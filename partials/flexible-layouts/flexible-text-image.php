<?php
/*
  ACF Flexible Content - Image and Text
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
<div class="row align-items-center no-gutters py-5">
    <div class="col-12 col-lg-6 order-2 order-lg-1 mb-5 mb-lg-5">
        <div class="pl-3 pr-5">
            <h2 class="pb-3 mb-3 title-border"><?php the_sub_field('header'); ?>
            </h2>
            <?php the_sub_field('content'); ?>

            <?php 
            if( get_field('add_button') ) {
                // Do something.
            }
            ?>
            <a href="<?php the_sub_field('button'); ?>" class="btn btn-primary">Browse parts for your vehicle</a>
        </div>

    </div>

    <div class=" col-12 col-lg-6 order-1 order-lg-2">
        <img class="img-fluid" src="<?php the_sub_field('image'); ?>">

    </div>

        </div>