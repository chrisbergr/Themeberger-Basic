<?php
/**
 * Template part for displaying posts (Article)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
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

$post_type_slug = 'article';

?>
<?php if ( is_single() ) : ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-' . $post_type_slug ); ?> itemscope itemtype="http://schema.org/BlogPosting">
					<?php the_content_meta(); ?>

					<div class="content-card type-<?php echo esc_attr( $post_type_slug ); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-image more-width-block"><?php the_post_thumbnail(); ?></div>
					<?php endif; ?>

						<header class="entry-header" style="display:none;">
							<?php the_author_vcard(); ?><?php if ( ! is_single() ) : ?>
								<?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
							<?php endif; ?>
							<?php if ( is_singular() ) : ?>
								<?php the_title( '<h1 class="entry-title p-name">', '</h1>' ); ?>
							<?php else : ?>
								<?php the_title( '<h2 class="entry-title p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
							<?php endif; ?>
							<?php if ( has_excerpt() ) : ?>
								<h4 class="entry-intro"><?php the_excerpt( '' ); ?></h4>
							<?php endif; ?>
							<div class="background-block full-width-block"></div>
						</header><!-- .entry-header -->

						<div class="entry-content e-content" itemprop="articleBody">
							<?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'themeberger-basic' ),
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
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themeberger-basic' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->
					<?php do_action( 'themeberger_after_entry_content' ); ?>
					<?php $summary = get_post_meta( $post->ID, 'themeberger-post-summary', true ); ?>
					<?php if ( is_single() && $summary ) : ?>

					<footer class="entry-footer">
						<p><strong class="meta-title"><?php esc_html_e( 'Summary', 'themeberger-basic' ); ?></strong></p>
						<p><?php echo wp_kses( $summary, THEMEBERGER_HTML ); ?></p>
						<div class="background-block full-width-block"></div>
					</footer>
					<?php endif; ?>
					<?php $credits = get_post_meta( $post->ID, 'themeberger-post-credit', false ); ?>
					<?php if ( is_single() && count( $credits ) !== 0 ) : ?>

					<footer class="entry-footer">
						<p><strong class="meta-title"><?php esc_html_e( 'Credits', 'themeberger-basic' ); ?></strong></p>
						<?php foreach ( $credits as $credit ) { ?>
						<p><?php echo wp_kses( $credit, THEMEBERGER_HTML ); ?></p>
						<?php } ?>
						<div class="background-block full-width-block"></div>
					</footer>
					<?php endif; ?>

					<footer class="entry-footer">
						<?php get_template_part( 'template-parts/partial-entry-footer-single', $post_type_slug ); ?>
						<?php get_template_part( 'template-parts/partial-interactions', $post_type_slug ); ?>

						<div class="background-block full-width-block"></div>
					</footer><!-- .entry-footer -->

					<div class="background-block full-width-block"></div>

				</div><!-- .content-card -->

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>

				</article><!-- #post-<?php the_ID(); ?> -->

<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-' . $post_type_slug ); ?> itemprop="hasPart" itemscope itemtype="http://schema.org/BlogPosting">

	<?php the_content_meta(); ?>

	<div class="content-supercard type-<?php echo esc_attr( $post_type_slug ); ?>">

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
		<?php endif; ?>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php if ( ! is_single() ) : ?>
				<?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
			<?php endif; ?>
			<?php the_kicker( '<h6 class="entry-kicker">', '</h6>' ); ?>
			<?php if ( is_singular() ) : ?>
				<?php the_title( '<h1 class="entry-title p-name">', '</h1>' ); ?>
			<?php else : ?>
				<?php the_title( '<h2 class="entry-title p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php endif; ?>
			<?php the_subtitle( '<h4 class="entry-subtitle">', '</h4>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content e-content" itemprop="articleBody">
			<?php if ( has_excerpt() ) : ?>
				<p><?php the_excerpt( '' ); ?></p>
			<?php else : ?>
				<?php
				the_content( '' );
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themeberger-basic' ),
						'after'  => '</div>',
					)
				);
				?>
			<?php endif; ?>
		</div><!-- .entry-content -->

		<?php do_action( 'themeberger_after_entry_content' ); ?>

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read article', 'themeberger-basic' ); ?></a>
			<div class="category-date"><?php the_permalink_date( '', ' | ', false ); ?><?php the_category( ', ' ); ?></div>
		</footer><!-- .entry-footer -->

	</div><!-- .content-supercard -->


</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>
