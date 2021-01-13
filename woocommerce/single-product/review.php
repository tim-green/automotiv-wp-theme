<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

<div class="card mb-3" <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <div class="row no-gutters">
    <div class="col-md-1 p-2">
	<?php /*gravtar*/ 
	do_action( 'woocommerce_review_before', $comment ); 
	?>
    </div>
	
	<div class="col-md-11">
      <div class="card-body">
        <h5 class="card-title">
		<?php
		// reviewer name & review date
		do_action( 'woocommerce_review_meta', $comment ); 
		?>
		</h5>
		<?php
			//rating stars
			do_action( 'woocommerce_review_before_comment_meta', $comment );
		?>
		
			<?php 
			//review text
			do_action( 'woocommerce_review_comment_text', $comment );

			do_action( 'woocommerce_review_after_comment_text', $comment );
			?>
      </div>
    </div>