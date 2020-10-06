<?php
/**
 * Template partial for subcontent of front page
 *
 * @package themebergerbasic
 */

if ( has_post_thumbnail() ) {
	$curr_id       = $post->ID;
	$content_image = get_the_post_thumbnail_url( $curr_id, 'post-thumbnail' );
} else {
	$content_image = false;
}

$subpage_content = get_the_content();

?>

<article id="post-<?php the_ID(); ?>" class="content subcontent demo-1 cda-alignright cda-naked cda-noimg">

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="subcontent-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<?php /*
	<div class="scrollarea">
		<div class="scrollarea-header">
			<h2 class="scrollarea-title"><?php echo esc_html( get_the_title() ); ?></h2>
			<div class="scrollarea-arrows"><a class="arrow arrow-prev disabled"></a><a class="arrow arrow-next"></a></div>
		</div>
		<ul class="slider">

			<?php $the_query = new WP_Query( array( 'category_name' => 'artikel' ) ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : ?>
					<?php $the_query->the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
					<li class="slide">
						<a href="<?php the_permalink(); ?>" class="slide-image-wrapper"><img class="slide-image" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>"></a>
						<div class="slide-description">
							<?php the_kicker( '<span class="slide-kicker">', '</span>' ); ?>
							<span class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							<span class="slide-subtitle"><?php the_subtitle(); ?></span>
						</div>
						<div class="slide-meta">
							<a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read article', 'themeberger-basic' ); ?></a>
						</div>
						<div class="slide-category-date"><?php the_permalink_date( '', ' | ', false ); ?><?php the_category( ', ' ); ?></div>
					</li>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
			<?php endif; ?>

		</ul>
	</div><!-- .scrollarea -->
	*/ ?>

	<div class="subcontent-content">
		<?php
		// $subpage_content stores data from get_the_content(); (see line :15)
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $subpage_content;
		?>
	</div><!-- .subcontent-content -->

	<div class="background-block full-width-block"></div>

</article><!-- #post-<?php the_ID(); ?> -->
