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

?>

<article id="post-<?php the_ID(); ?>" class="content homepage">

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="homepage-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<section class="homepage-content-container">
		<header class="homepage-header">
			<h2 class="homepage-title"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->
		<div class="homepage-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</section>

	<div class="background-block full-width-block"></div>

</article><!-- #post-<?php the_ID(); ?> -->
