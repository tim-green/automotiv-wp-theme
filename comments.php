<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package automotiv
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$automotiv_comment_count = get_comments_number();
			if ( '1' === $automotiv_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'automotiv' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $automotiv_comment_count, 'comments title', 'automotiv' ) ),
					number_format_i18n( $automotiv_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		<?php the_comments_navigation(); ?>
</div><!-- #comments -->