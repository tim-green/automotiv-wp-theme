  <div id="accordion">
        
            <?php
                if( have_rows('question_answer_block') ):
                    while( have_rows('question_answer_block') ) : the_row();

                        $question = get_sub_field('sub_field');
                        $answer = get_sub_field('sub_field');
                    endwhile;
                else : endif;
            ?>


        <div class="card">
            <div class="card-header" id="">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                </button>
                <?php echo $question; ?>
            </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            <?php echo $answer; ?>
            </div>
            </div>
        </div>

        </div>