<?php
/**
 * Template part for displaying posts (Status)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

$post_type_slug = 'reply';

if ( ! function_exists( 'article_in_collection' ) ) {
	function article_in_collection() {
		if ( ! is_single() ) {
			echo esc_attr( 'hasPart' );
		}
	}
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-' . $post_type_slug ); ?> itemprop="<?php article_in_collection(); ?>" itemscope itemtype="http://schema.org/BlogPosting">

	<?php the_content_meta(); ?>

	<div class="content-card type-<?php echo esc_attr( $post_type_slug ); ?>">

		<div class="entry-response"><div class="response-icon">
			<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
				<path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path>
			</svg>
		</div><?php kind_display(); ?></div>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php if ( ! is_single() ) : ?>
				<?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content e-content p-summary" itemprop="articleBody">
			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themeberger-basic' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php do_action( 'themeberger_after_entry_content' ); ?>

		<?php if ( is_single() || $approved_comments > 0 ) : ?>
		<footer class="entry-footer">
			<?php if ( is_single() ) : ?>
				<?php get_template_part( 'template-parts/partial-entry-footer-single', $post_type_slug ); ?>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/partial-interactions', $post_type_slug ); ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
