<?php
/*
  ACF Flexible Content - Video Block
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>
    <?php if( have_rows('video') ): ?>

    <?php while( have_rows('video') ): the_row(); 

    // vars
    $title = get_sub_field('video_title');
    $video = get_sub_field('video_link');
    ?>
        <?php if( get_sub_field('video_title') ): ?>
            <?php echo $title; ?>
        <?php endif; ?>
        <?php if( get_sub_field('video_link') ): ?>
                <?php echo $video; ?>
            <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
