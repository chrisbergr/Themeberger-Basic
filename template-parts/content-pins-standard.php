<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

$current = $post->post_name;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry post-entry' ); ?> itemscope itemtype="http://schema.org/BlogPosting">

	<div class="content-card">

		<header class="entry-header">
			<?php if ( is_singular() ) : ?>
				<?php the_title( '<h1 class="entry-title p-name">', '</h1>' ); ?>
			<?php else : ?>
				<?php the_title( '<h2 class="entry-title p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content e-content p-summary" itemprop="articleBody">

			<?php

			$image       = get_post_meta( get_the_id(), 'pins-media', true );
			$bookmark    = get_post_meta( get_the_id(), 'pins-bookmark', true );
			$description = get_post_meta( get_the_id(), 'pins-description', true );

			$out = '';
			$out .= '<div class="marlon-post-type-pin">';

			$out .= '<p><a href="' . $bookmark . '" target="_blank"><img src="' . $image . '"></a></p>';
			$out .= '<p>' . $description . '</p>';

			$out .= '</div>';

			echo $out;

			?>

			<p><a href="<?php echo get_post_type_archive_link( 'pins' ); ?>">Back</a></p>

			<?php
			$terms = get_the_terms( $post->ID, 'pins-tags' );
			foreach( $terms as $term ) {
				echo $term->name;
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .content-card -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
