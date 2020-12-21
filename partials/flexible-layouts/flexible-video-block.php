<?php
/*
  ACF Flexible Content - Video Block
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
<div class="row">
    <?php if( have_rows('video') ): ?>

    <?php while( have_rows('video') ): the_row(); 

    // vars
    $title = get_sub_field('video_title');
    $video = get_sub_field('video_link');
    
    ?>

<div class="col-12 col-md-6 col-lg-6 mb-6">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
        <?php if( get_sub_field('video_title') ): ?>
            <?php echo $title; ?>
        <?php endif; ?>
        </div>
        <div class="card-body embed-container" id="video-<?php echo get_row_index(); ?>">
        <?php if( get_sub_field('video_link') ): ?>
                <?php echo $video; ?>
            <?php endif; ?>
        </div>
        
    </div>

</div>


    <?php endwhile; ?>
<?php endif; ?>
</div>