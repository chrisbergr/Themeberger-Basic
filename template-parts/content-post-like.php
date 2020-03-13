<?php
/**
 * Template part for displaying posts (Like)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

$post_type_slug = 'like';

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

		<div class="entry-response"><div class="response-icon">
			<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
				<path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
			</svg>
		</div><?php kind_display(); ?></div>

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
