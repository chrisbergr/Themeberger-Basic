<?php
/**
 * Template partial for subcontent of front page
 *
 * @package themebergerbasic
 */

?>

<article id="post-<?php the_ID(); ?>" class="content subcontent demo-1 cda-alignright cda-naked cda-noimg">

	<div class="subcontent-content">
		<?php the_content(); ?>
	</div><!-- .subcontent-content -->

	<div class="background-block full-width-block"></div>

</article><!-- #post-<?php the_ID(); ?> -->
