<article id="divcomment-<?php comment_ID(); ?>" class="comment-body u-comment h-cite"  itemprop="comment" itemscope itemtype="http://schema.org/Comment">
	<div class="comment-meta" role="complementary">
		<?php
		$postet_timestamp = get_comment_date( 'c' );
		$posted_ago       = human_time_diff( get_comment_date( 'U' ), current_time( 'timestamp' ) );
		$time_out         = sprintf(
			/* translators: 1: comment date (human time diff), 2: comment timestamp */
			_x(
				'<time class="comment-date published" datetime="%2$s" itemprop="datePublished">%1$s ago</time>',
				'%1$s = human-readable time difference',
				'themeberger-test'
			),
			$posted_ago,
			$postet_timestamp
		);
		$time_link  = '<a href="#comment-' . get_comment_ID() . '" title="' . get_comment_date() . '" itemprop="url">' . $time_out . '</a>';
		$author_url = get_comment_author_url();
		if ( $author_url ) {
			$author = '<span class="comment-author themeberger-comment-author vcard h-card u-author" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url u-url" itemprop="url" href="' . esc_url( $author_url ) . '"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name p-name fn" itemprop="name">' . esc_html( get_comment_author() ) . '</span></a></span>';
		} else {
			$author = '<span class="comment-author themeberger-comment-author vcard h-card u-author" itemprop="author" itemscope itemtype="http://schema.org/Person"><img class="photo avatar" itemprop="image" src="' . get_avatar_url( $comment, array( 'size' => 50 ) ) . '" alt="' . esc_html( get_comment_author() ) . '"><span class="name p-name fn" itemprop="name">' . esc_html( get_comment_author() ) . '</span></span>';
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
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<small class="reply-comment">',
					'after'     => '</small>',
				)
			)
		);
		?>
		<span class="themeberger-comment-date">mention.php</span>
	</div><!-- .comment-meta -->
	<div class="comment-content e-content p-name">
		<?php if ( '0' === $comment->comment_approved ) : ?>
		<?php // phpcs:ignore WordPress.WP.I18n.TextDomainMismatch ?>
		<p class="comment-meta-item"><em class="comment-awaiting-moderation"><?php esc_html_e( 'Your response is awaiting moderation.', 'semantic-linkbacks' ); ?></em></p>
		<?php endif; ?>
		<?php comment_text(); ?>
	</div><!-- .comment-content -->
	<?php
	if ( $coins ) {
		echo '<p>';
		printf(
			esc_html(
				// translators: Number of Swarm Coins
				_n(
					'+%d coin',
					'+%d coins',
					number_format_i18n( $coins ),
					// phpcs:ignore WordPress.WP.I18n.TextDomainMismatch
					'semantic-linkbacks'
				)
			),
			esc_attr( number_format_i18n( $coins ) )
		);
		echo '</p>';
	}
	?>
	<?php do_action( 'themeberger_comment_footer' ); ?>
</article><!-- .comment-body -->
