<?php
/**
 * Template part for displaying posts (Aside)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

$current           = $post->post_name;
$content           = $post->post_content;
$content           = str_replace( '<p>', '', $content );
$content           = str_replace( '</p>', '', $content );
$content           = str_replace( '<!-- wp:paragraph -->', '', $content );
$content           = str_replace( '<!-- /wp:paragraph -->', '', $content );
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

$post_type_slug = 'aside';

$collection = 'itemprop="hasPart" ';
if ( is_single() ) {
	$collection = '';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-' . $post_type_slug ); ?> <?php echo $collection; ?>itemscope itemtype="http://schema.org/BlogPosting">

	<?php the_content_meta(); ?>

	<?php if ( is_single() ) : ?>
	<div class="content-card type-<?php echo $post_type_slug; ?>">
		<header class="entry-header">
			<?php the_author_vcard(); ?>
		</header><!-- .entry-header -->
	<?php else : ?>
	<div class="content-card card-hidden type-<?php echo $post_type_slug; ?>">
		<header class="entry-header-hidden">
			<?php the_author_vcard(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

		<div class="entry-content p-name e-content" itemprop="articleBody">
			<p><?php the_permalink_date( '<span class="themeberger-datex">', '</span>: ', true ); ?><?php echo esc_html( $content ); ?></p>
		</div><!-- .entry-content -->

		<?php if ( is_single() || $approved_comments > 0 ) : ?>
		<footer class="entry-footer">
			<?php if ( is_single() ) : ?>
				<?php get_template_part( 'template-parts/partial-entry-footer-single', $post_type_slug ); ?>
				<?php get_template_part( 'template-parts/partial-interactions', $post_type_slug ); ?>
			<?php endif; ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
