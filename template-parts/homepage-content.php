<?php
/**
 * Template partial for subcontent of front page
 *
 * @package themebergertest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content sub-content' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<p class="txtctr">lorem ipsum</p>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
