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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-article' ); ?>>
	<div class="content-card type-article">
		<?php /*if ( $content_image ) : ?>
		<div class="entry-image" style="background-image: url(<?php echo esc_url( $content_image ); ?>);"></div>
		*/ ?>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-image"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
			<?php if ( is_singular() ) : ?>
				<?php the_title( '<h1 class="entry-title p-name">', '</h1>' ); ?>
			<?php else : ?>
				<?php the_title( '<h2 class="entry-title p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
			<h4 class="entry-intro"><?php the_excerpt( '' ); ?></h4>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content e-content">
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
			<p><?php the_title( '<strong class="meta-title">', '</strong> | ' ); ?><?php the_category( ', ' ); ?><?php the_permalink_date( ' | ', '', false ); ?></p>
			<p>Shortlink: <?php the_shorturl(); ?></p>
			<?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/partial-interactions', 'article' ); ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
