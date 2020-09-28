<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'themeberger-basic' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'themeberger-basic' ) ),
					esc_html( number_format_i18n( $comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'       => 'ol',
				'avatar_size' => 50,
				'short_ping'  => true,
				//'walker'      => new Themeberger_Comment_Walker( 'ol' ),
			)
		);
		?>
		</ol>

		<?php the_comments_navigation(); ?>

		<?php
		paginate_comments_links(
			array(
				'prev_next' => false,
				'type'      => 'list',
			)
		);
		?>

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'themeberger-basic' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	comment_form();
	?>

</div><!-- #comments -->
