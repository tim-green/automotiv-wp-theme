<?php

/**
 * Template Name: FAQ Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

get_header();
?>
<div class="container">
    <h1 class="py-3 mb-3 title-border"><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-12">
        <?php
            get_template_part('partials/acf-faq');            
        ?>
            <?php the_content();?>

        
        </div>
    </div>
</div>




<?php
get_footer(); ?>