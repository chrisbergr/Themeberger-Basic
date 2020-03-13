<?php
/**
 * Template part for displaying posts (Video)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

$post_type_slug = 'video';

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

		<div class="entry-video"><?php the_first_video_of_post(); ?></div>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php if ( ! is_single() ) : ?>
				<?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content e-content p-summary" itemprop="articleBody">
			<?php the_content_without_first_video(); ?>
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
