<?php
/**
 * Template part for displaying posts (Gallery)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

$current           = $post->post_name;
$comments_count    = wp_count_comments( get_the_ID() );
$approved_comments = $comments_count->approved;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-gallery' ); ?>>
	<div class="content-card type-gallery">

		<div class="entry-gallery"><?php the_first_gallery_of_post(); ?></div>

		<header class="entry-header">
			<?php the_author_vcard(); ?><?php the_permalink_date( '<span class="themeberger-date">', '</span>', true ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content p-name e-content">
			<?php the_content_without_first_gallery(); ?>
			<?php
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
			<?php get_template_part( 'template-parts/partial-interactions', 'image' ); ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
