<?php
/**
 * Template part displaying interaction indicators in post footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

$debug_interactions = false;
?>
			<?php if ( function_exists( 'get_linkbacks_number' ) ) : ?>
				<?php if ( $approved_comments > 0 || $debug_interactions ) : ?>
				<ul class="entry-interactions">
					<li class="interaction"><strong><?php echo esc_attr( $approved_comments ); ?> Interactions</strong></li>
					<?php if ( esc_attr( $approved_comments ) - get_linkbacks_number() > 0 || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-comment">&#x1F4E2;</span><span class="interaction-key key-comment">Comments</span><strong class="interaction-value value-comment"><?php echo ( esc_attr( $approved_comments ) - get_linkbacks_number() ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'reply' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-reply">&#x1F30E;</span><span class="interaction-key key-reply">Replies</span><strong class="interaction-value value-reply"><?php echo esc_attr( get_linkbacks_number( 'reply' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'repost' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-repost">&#x1F517;</span><span class="interaction-key key-repost">Reposts</span><strong class="interaction-value value-repost"><?php echo esc_attr( get_linkbacks_number( 'repost' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'like' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-like">&#x1F493;</span><span class="interaction-key key-like">Likes</span><strong class="interaction-value value-like"><?php echo esc_attr( get_linkbacks_number( 'like' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'favorite' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-favorite">&#x2B50;</span><span class="interaction-key key-favorite">Favorites</span><strong class="interaction-value value-favorite"><?php echo esc_attr( get_linkbacks_number( 'favorite' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'bookmark' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-bookmark">&#x1F4CC;</span><span class="interaction-key key-bookmark">Bookmarks</span><strong class="interaction-value value-bookmark"><?php echo esc_attr( get_linkbacks_number( 'bookmark' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'rsvp' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-rsvp">&#x1F3AB;</span><span class="interaction-key key-rsvp">RSVP</span><strong class="interaction-value value-rsvp"><?php echo esc_attr( get_linkbacks_number( 'rsvp' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'rsvp:yes' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-rsvp-yes">&#x1F3AB;</span><span class="interaction-key key-rsvp-yes">RSVP Yes</span><strong class="interaction-value value-rsvp-yes"><?php echo esc_attr( get_linkbacks_number( 'rsvp:yes' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'rsvp:no' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-rsvp-no">&#x1F3AB;</span><span class="interaction-key key-rsvp-no">RSVP No</span><strong class="interaction-value value-rsvp-no"><?php echo esc_attr( get_linkbacks_number( 'rsvp:no' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'rsvp:maybe' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-rsvp-maybe">&#x1F3AB;</span><span class="interaction-key key-rsvp-maybe">RSVP Maybe</span><strong class="interaction-value value-rsvp-maybe"><?php echo esc_attr( get_linkbacks_number( 'rsvp:maybe' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'rsvp:interested' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-rsvp-interested">&#x1F3AB;</span><span class="interaction-key key-rsvp-interested">RSVP Interested</span><strong class="interaction-value value-rsvp-interested"><?php echo esc_attr( get_linkbacks_number( 'rsvp:interested' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'invited' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-invited">&#x1F4EC;</span><span class="interaction-key key-invited">Invited</span><strong class="interaction-value value-invited"><?php echo esc_attr( get_linkbacks_number( 'invited' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'listen' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-listen">&#x1F3A7;</span><span class="interaction-key key-listen">Listen</span><strong class="interaction-value value-listen"><?php echo esc_attr( get_linkbacks_number( 'listen' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'watch' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-watch">&#x1F4FA;</span><span class="interaction-key key-watch">Watch</span><strong class="interaction-value value-watch"><?php echo esc_attr( get_linkbacks_number( 'watch' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'read' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-read">&#x1F453;</span><span class="interaction-key key-read">Read</span><strong class="interaction-value value-read"><?php echo esc_attr( get_linkbacks_number( 'read' ) ); ?></strong></li>
					<?php endif; ?>
					<?php if ( get_linkbacks_number( 'follow' ) || $debug_interactions ) : ?>
					<li class="interaction"><span class="interaction-symbol interaction-symbol-follow">&#x1F680;</span><span class="interaction-key key-follow">Follow</span><strong class="interaction-value value-follow"><?php echo esc_attr( get_linkbacks_number( 'follow' ) ); ?></strong></li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
			<?php else : ?>
				<?php if ( $approved_comments > 0 ) : ?>
				<p>Comments: <strong><?php echo esc_attr( $approved_comments ); ?></strong></p>
				<?php endif; ?>
			<?php endif; ?>
