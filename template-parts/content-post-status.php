<?php
/**
 * Template part for displaying posts (Status)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

if ( ! function_exists( 'strip_single_tag' ) ) :
	/**
	 * Sprips one single HTML tag
	 *
	 * @param  string $str String with mixed content.
	 * @param  string $tag HTML tag which should be stripped.
	 *
	 * @return string Stripped string.
	 */
	function strip_single_tag( $str, $tag ) {
		$str1 = preg_replace( '/<\/' . $tag . '>/i', '', $str );
		if ( $str1 !== $str ) {
			$str = preg_replace( '/<' . $tag . '[^>]*>/i', '', $str1 );
		}
		return $str;
	}
endif;

if ( ! function_exists( 'themebergerautop' ) ) :
	/**
	 * WordPress filter used in 'the_excerpt' to strip paragraph tag.
	 *
	 * @param  string $content The content of 'the_excerpt'.
	 * @return string Modified content for 'the_excerpt'.
	 */
	function themebergerautop( $content ) {
		$tag     = 'p';
		$content = strip_single_tag( $content, $tag );
		return $content;
	}
endif;
add_filter( 'the_excerpt', 'themebergerautop', 88 );


if ( has_post_thumbnail() && ! is_archive() ) {
	$curr_id       = is_home() ? get_queried_object_id() : $post->ID;
	$content_image = get_the_post_thumbnail_url( $curr_id, 'post-thumbnail' );
} else {
	$content_image = false;
}

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<div class="content-card">
		<?php if ( $content_image ) : ?>
		<div class="entry-image" style="background-image: url(<?php echo esc_url( $content_image ); ?>);"></div>
		<?php endif; ?>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'themeberger-test' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themeberger-test' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( is_single() || $approved_comments > 0 ) : ?>
		<footer class="entry-footer">
			<?php if ( is_single() ) : ?>
			<p><?php the_title( '<strong>', '</strong> - ' ); ?><?php the_permalink_date( 'Published: ', '', false ); ?></p>
			<p>Short URL: <?php the_shorturl(); ?></p>
			<p>Categories: <?php the_category( ', ' ); ?></p>
			<?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
			<?php endif; ?>
			<?php if ( function_exists( 'get_linkbacks_number' ) ) : ?>
				<?php if ( $approved_comments > 0 ) : ?>
				<ul class="entry-interactions">
					<li class="interaction"><strong><?php echo esc_attr( $approved_comments ); ?> Interactions</strong></li>
				<!-- get_linkbacks_number( 'mention' ) doesn't work! -->
				<?php if ( ( esc_attr( $approved_comments ) - get_linkbacks_number() + get_linkbacks_number( 'reply' ) ) > 0 ) : ?>
					<li class="interaction"><span class="interaction-key key-comment">Comments</span><strong class="interaction-value value-comment"><abbr title="Mentions: <?php echo ( esc_attr( $approved_comments ) - get_linkbacks_number() ); ?>, Replies: <?php echo get_linkbacks_number( 'reply' ); ?>"><?php echo ( esc_attr( $approved_comments ) - get_linkbacks_number() + get_linkbacks_number( 'reply' ) ); ?></abbr></strong></li>
				<?php endif; ?>
				<!--<li class="interaction"><span class="interaction-key key-mention">Mentions</span><strong class="interaction-value value-mention"><?php echo ( esc_attr( $approved_comments ) - get_linkbacks_number() ); ?></strong></li>-->
				<!--<li class="interaction"><span class="interaction-key key-reply">Replies</span><strong class="interaction-value value-reply"><?php echo get_linkbacks_number( 'reply' ); ?></strong></li>-->
				<?php if ( get_linkbacks_number( 'repost' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-repost">Reposts</span><strong class="interaction-value value-repost"><?php echo get_linkbacks_number( 'repost' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'like' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-like">Likes</span><strong class="interaction-value value-like"><?php echo get_linkbacks_number( 'like' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'favorite' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-favorite">Favorites</span><strong class="interaction-value value-favorite"><?php echo get_linkbacks_number( 'favorite' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'bookmark' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-bookmark">Bookmarks</span><strong class="interaction-value value-bookmark"><?php echo get_linkbacks_number( 'bookmark' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'rsvp' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-rsvp">RSVP</span><strong class="interaction-value value-rsvp"><?php echo get_linkbacks_number( 'rsvp' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'rsvp:yes' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-rsvp-yes">RSVP Yes</span><strong class="interaction-value value-rsvp-yes"><?php echo get_linkbacks_number( 'rsvp:yes' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'rsvp:no' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-rsvp-no">RSVP No</span><strong class="interaction-value value-rsvp-no"><?php echo get_linkbacks_number( 'rsvp:no' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'rsvp:maybe' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-rsvp-maybe">RSVP Maybe</span><strong class="interaction-value value-rsvp-maybe"><?php echo get_linkbacks_number( 'rsvp:maybe' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'rsvp:interested' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-rsvp-interested">RSVP Interested</span><strong class="interaction-value value-rsvp-interested"><?php echo get_linkbacks_number( 'rsvp:interested' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'invited' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-invited">Invited</span><strong class="interaction-value value-invited"><?php echo get_linkbacks_number( 'invited' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'listen' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-listen">Listen</span><strong class="interaction-value value-listen"><?php echo get_linkbacks_number( 'listen' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'watch' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-watch">Watch</span><strong class="interaction-value value-watch"><?php echo get_linkbacks_number( 'watch' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'read' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-read">Read</span><strong class="interaction-value value-read"><?php echo get_linkbacks_number( 'read' ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_linkbacks_number( 'follow' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-follow">Follow</span><strong class="interaction-value value-follow"><?php echo get_linkbacks_number( 'follow' ); ?></strong></li>
				<?php endif; ?>
				</ul>
				<?php endif; ?>
			<?php else: ?>
				<?php if ( $approved_comments > 0 ) : ?>
				<p>Comments: <?php echo esc_attr( $approved_comments ); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
