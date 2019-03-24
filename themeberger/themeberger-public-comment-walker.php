<?php
/**
 * Misc Walker to override core functionality
 *
 * @package themeberger
 */


class themeberger_comment_walker extends Walker_Comment {
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
    function __construct() {
        ?>
        <ol class="comments-list">
        <?php
    }
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2;
        ?>
        <ol class="child-comments comments-list">
        <?php
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2;
        ?>
        </ol><!-- .child-comments -->
        <?php
    }
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = '';
		//$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

        $add_below = 'comment';

        ?>
        <li <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
            <div class="comment-meta" role="complementary">
            <?php 
			
			$postet_timestamp = get_comment_date( 'c' );
			$posted_ago = human_time_diff( get_comment_date( 'U' ), current_time( 'timestamp' ) );
			$time_out = sprintf(
				_x( 
					'<time class="comment-date published" datetime="%2$s" itemprop="datePublished">%1$s ago</time>',
					'%1$s = human-readable time difference', 'themeberger-test'
				),
				$posted_ago,
				$postet_timestamp
			);
			$time_link = '<a href="#comment-' . get_comment_ID() . '" title="' . get_comment_date() . '" itemprop="url">' . $time_out. '</a>';
			
			$author_url = get_comment_author_url();
		
			if ( $author_url ) {
				$author = sprintf(
					esc_html_x( '%s', 'comment author', 'themeberger-test' ),
					'<span class="comment-author themeberger-comment-author vcard"><a class="url u-url" itemprop="url" href="' . esc_url( $author_url ) . '"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name">' . esc_html( get_comment_author() ) . '</span></a></span>'
				);
			} else {
				$author = sprintf(
					esc_html_x( '%s', 'comment author', 'themeberger-test' ),
					'<span class="comment-author themeberger-comment-author vcard"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name">' . esc_html( get_comment_author() ) . '</span></span>'
				);
			}
		
		
			echo $author . '<span class="themeberger-comment-date">' . $time_link . '</span>';
		
			?>
                <?php edit_comment_link('edit','<small class="edit-comment">','</small>'); ?>
                <?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => $add_below,
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
					'before' => '<small class="reply-comment">',
					'after' => '</small>',
				) ) );
				?>
            </div>
            <div class="comment-content" itemprop="text">
                <?php if ($comment->comment_approved == '0') : ?>
                <p class="comment-meta-item">Your comment is awaiting moderation.</p>
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
            <?php do_action( 'themeberger_comment_footer' ); ?>
            <?php
    }
    function end_el(&$output, $comment, $depth = 0, $args = array() ) {
        ?>
        </li>
        <?php
    }
    function __destruct() {
        ?>
        </ol><!-- .comments-list -->
        <?php
    }
}