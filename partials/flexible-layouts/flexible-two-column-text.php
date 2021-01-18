<?php
/*
  ACF Flexible Content - Two Column Text
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
<div class="row">
   <div class="col-lg-6 col-xs-12">
            <?php the_sub_field('content_left'); ?>
    </div>

    <div class="col-lg-6 col-xs-12">
            <?php the_sub_field('content_right'); ?>
    </div>

</div>