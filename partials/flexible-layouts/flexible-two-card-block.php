<?php
/*
  ACF Flexible Content - Two Cards Block
  
  Field Example
  <?php the_sub_field('text'); ?>
*/
?>

<!-- the repeater -->
<?php if( have_rows('two_card_blocks') ): ?>

<?php while( have_rows('two_card_blocks') ): the_row(); 

// vars
$bgImage = get_sub_field('background_image');
$header = get_sub_field('header');
$content = get_sub_field('content');
$link = get_sub_field('link');
$textLink = get_sub_field('link_text');
?>

<div class="col-12 col-lg-6 mb-5 mb-lg-0">
    <div class="card card-resource py-5" style="background: url(<?php echo $bgImage; ?>); background-size: cover;">
    

    <div class="card-body position-relative">
    <h4 class="text-white text-center h2">
    <?php echo $header; ?>
    </h4>

    
    <p class="text-white text-center">
        <?php echo $content; ?>
    </p>

        <a href="<?php echo $link; ?>" class="text-center d-block mt-5">
            <?php echo $textLink; ?>
        </a>
    </div>
    <div class="hero-overlay"></div>

    </div>
</div>

    <?php endwhile; ?>
<?php endif; ?>