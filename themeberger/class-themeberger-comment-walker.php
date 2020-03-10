<?php
/**
 * Misc Walker to override core functionality
 *
 * @package themeberger
 */


class Themeberger_Comment_Walker extends Walker_Comment {

	private $walker_style = 'ul';

	public function __construct( $style = 'ul' ) {
		$this->walker_style = $style;
		switch ( $this->walker_style ) {
			case 'div':
				?>
				<div class="comments-list">
				<?php
				break;
			case 'ol':
				?>
				<ol class="comments-list">
				<?php
				break;
			case 'ul':
			default:
				?>
				<ul class="comments-list">
				<?php
				break;
		}
	}
	public function __destruct() {
		switch ( $this->walker_style ) {
			case 'div':
				?>
				</div><!-- .comments-list -->
				<?php
				break;
			case 'ol':
				?>
				</ol><!-- .comments-list -->
				<?php
				break;
			case 'ul':
			default:
				?>
				</ul><!-- .comments-list -->
				<?php
				break;
		}
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag       = ( 'div' === $args['style'] ) ? 'div' : 'li';
		$add_below = 'comment';
		$commenter = wp_get_current_commenter();
		if ( $commenter['comment_author_email'] ) {
			$moderation_note = __( 'Your comment is awaiting moderation.', 'themeberger' );
		} else {
			$moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.', 'themeberger' );
		}
		?>
		<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'u-comment h-cite parent' : 'u-comment h-cite', $comment ); ?> itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			<div class="comment-meta" role="complementary">
				<?php
				$posted_ago = human_time_diff( get_comment_date( 'U' ), current_time( 'timestamp' ) );
				$posted_ago = sprintf(
					/* translators: %s = human-readable time difference */
					esc_html__( '%s ago', 'themeberger' ),
					$posted_ago
				);
				$date_string = '<time class="comment-date published" itemprop="datePublished" datetime="%1$s">%2$s</time>';
				$time_out = sprintf(
					$date_string,
					esc_attr( get_comment_date( 'c' ) ),
					$posted_ago
				);

				$time_link = '<a href="#comment-' . get_comment_ID() . '" title="' . get_comment_date() . '" itemprop="url">' . $time_out . '</a>';

				$author_url = get_comment_author_url();

				if ( $author_url ) {
					$author = '<span class="comment-author themeberger-comment-author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url u-url" itemprop="url" href="' . esc_url( $author_url ) . '"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name p-name fn" itemprop="name">' . esc_html( get_comment_author() ) . '</span></a></span>';
				} else {
					$author = '<span class="comment-author themeberger-comment-author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name p-name fn" itemprop="name">' . esc_html( get_comment_author() ) . '</span></span>';
				}

				$author_date_html = array(
					'a'    => array(
						'href'     => array(),
						'title'    => array(),
						'itemprop' => array(),
						'class'    => array(),
					),
					'span' => array(
						'class' => array(),
						'itemprop' => array(),
						'itemscope' => array(),
						'itemtype' => array(),
					),
					'img'  => array(
						'class'    => array(),
						'src'      => array(),
						'alt'      => array(),
						'title'    => array(),
						'itemprop' => array(),
					),
					'time' => array(
						'class'    => array(),
						'datetime' => array(),
						'itemprop' => array(),
					),
				);
				?>

				<?php echo wp_kses( $author, $author_date_html ); ?><span class="themeberger-comment-date"><?php echo wp_kses( $time_link, $author_date_html ); ?></span>

				<?php edit_comment_link( 'edit', '<small class="edit-comment">', '</small>' ); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<small class="reply-comment">',
							'after'     => '</small>',
						)
					)
				);
				?>
			</div>
			<div class="comment-content" itemprop="text">
				<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="comment-meta-item"><em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
			<?php do_action( 'themeberger_comment_footer' ); ?>
			<?php
	}

}
