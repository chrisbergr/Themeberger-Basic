<?php
/**
 * Template part for displaying posts (Image)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

?>
<!-- content post-219 post type-post status-publish format-image hentry category-uncategorized post_format-post-format-image -->
<!-- h-entry post-entry post type-photo type-photo-single wrapper -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-image' ); ?>>
	<div class="content-card type-image">

		<div class="entry-image"><?php the_first_image_of_post(); ?></div>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content p-name e-content">
			<?php the_content_without_first_image(); ?>
			<?php
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
			<p><?php the_title( '<strong class="meta-title">', '</strong> | ' ); ?><?php the_category( ', ' ); ?><?php the_permalink_date( ' | ', '', false ); ?></p>
			<p>Shortlink: <?php the_shorturl(); ?></p>
			<?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
			<?php endif; ?>
			<?php if ( function_exists( 'get_linkbacks_number' ) ) : ?>
				<?php if ( $approved_comments > 0 ) : ?>
				<ul class="entry-interactions">
					<li class="interaction"><strong><?php echo esc_attr( $approved_comments ); ?> Interactions</strong></li>
					<?php if ( esc_attr( $approved_comments ) - get_linkbacks_number() > 0 ) : ?>
					<li class="interaction"><span class="interaction-key key-comment">Comments</span><strong class="interaction-value value-comment"><?php echo ( esc_attr( $approved_comments ) - get_linkbacks_number() ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'reply' ) ) : ?>
					<li class="interaction"><span class="interaction-key key-reply">Replies</span><strong class="interaction-value value-reply"><?php echo get_linkbacks_number( 'reply' ); ?></strong></li>
					<?php endif; ?>
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
