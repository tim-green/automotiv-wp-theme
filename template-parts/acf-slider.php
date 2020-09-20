<?php
/**
 * Template part which is for ACF slider, which is display on the home page
 *
 *
 * @package automotiv
 */

?>


<div class="slider">
    <div class="home-slider">
    <?php if( have_rows('slider_images','option') ): ?>

    <?php while( have_rows('slider_images','option') ): the_row(); 

    // vars
    $image = get_sub_field('image','option');
    $text = get_sub_field('text','option');
    $button_text = get_sub_field('button_text','option');
    $button_link = get_sub_field('button_link','option');

    ?>
     <div class="slide" style="background-image: url(<?php echo $image['url']; ?>);">
            <div class="slide-content d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="slide-text text-center text-lg-left">
                                <?php echo $text; ?>
                                <a class="btn btn-primary"
                                    href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>
   
</div>

