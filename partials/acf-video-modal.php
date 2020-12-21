
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-keyboard="true" data-target="#vmod-<?php echo get_row_index(); ?>">View Theater Mode</button>

<!-- Modal -->
<div class="modal fade" id="vmod-<?php echo get_row_index(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $title; ?>" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-12">
        <div class="modal-header">
            <h5 class="modal-title">
            <?php the_sub_field('video_title'); ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body embed-container" id="vmod-<?php echo get_row_index(); ?>">
            <?php the_sub_field('video_link'); ?>
        </div>
        </div>
    </div>
    </div>