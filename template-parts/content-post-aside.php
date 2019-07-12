<?php
/**
 * Template part for displaying posts (Status)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergertest
 */

$current            = $post->post_name;
$content            = $post->post_content;
$content            = str_replace( '<p>', '', $content );
$content            = str_replace( '</p>', '', $content );
$comments_count     = wp_count_comments( get_the_ID() );
$approved_comments  = $comments_count->approved;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry type-post-aside' ); ?>>
		
	<?php if ( is_single() ) : ?>
	<div class="content-card type-aside">
		<header class="entry-header">
			<?php the_author_vcard(); ?>
		</header><!-- .entry-header -->
	<?php else : ?>
	<div class="content-card card-hidden type-aside">
	<?php endif; ?>
		
		<div data-js="reveal" class="entry-content p-name e-content">
			<p><?php the_permalink_date( '<span class="themeberger-datex">', '</span>: ', true ); ?><?php echo $content; ?></p>
		</div><!-- .entry-content -->

		<?php if ( is_single() || $approved_comments > 0 ) : ?>
		<footer class="entry-footer">
			<?php if ( is_single() ) : ?>
			<p><?php the_title( '<strong class="meta-title">', '</strong> | ' ); ?><?php the_category( ', ' ); ?><?php the_permalink_date( ' | ', '', false ); ?></p>
			<p>Shortlink: <?php the_shorturl(); ?></p>
			<?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
			<?php get_template_part( 'template-parts/partial-interactions', 'status' ); ?>
			<?php endif; ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
