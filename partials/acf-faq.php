<div class="accordion-FAQ">

<?php
    if( have_rows('question_answer_block','option') ):
        while( have_rows('question_answer_block','option') ) : the_row();

        $question = get_sub_field('question','option');
        $answer = get_sub_field('answer','option');
?>

<div class="wrap-<?php echo get_row_index(); ?> ">
    <input type="radio" id="tab-<?php echo get_row_index(); ?> " name="tabs">
    <label class="bg-primary text-white" for="tab-<?php echo get_row_index(); ?> ">
	<div class="FAQ-question"><?php echo $question; ?></div>
	<div class="cross"></div>
	</label>
    <div class="FAQ-content">
<?php echo $answer; ?>
	</div>
  </div>

<?php 
     endwhile;
     else : endif;
?>
</div>