<?php
/*
  ACF Flexible Content - Hero Block
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>

<div class="col-12 pb-5">
                <h1 class="text-center h2 pb-3"><?php the_sub_field('header'); ?></h1>
                <p class="text-center pb-4">
                <?php the_sub_field('content'); ?>
                </p>
            </div>