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

<article id="post-<?php the_ID(); ?>" class="content subcontent">

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="subcontent-image"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<header class="subcontent-header">
		<h2 class="subcontent-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="subcontent-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<div class="background-block full-width-block" style="background-color: #fff;"></div>

</article><!-- #post-<?php the_ID(); ?> -->
