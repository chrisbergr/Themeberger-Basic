<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */

?>

<article id="post-none" <?php post_class( 'content' ); ?>>
	<div class="content-card empty-card">

		<header class="entry-header">
			<h2 class="entry-title"><?php esc_html_e( 'No Contents', 'themeberger-basic' ); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php esc_html_e( 'Unfortunately, there is no content available.', 'themeberger-basic' ); ?></p>
		</div><!-- .entry-content -->

	</div><!-- .content-card -->
</article><!-- #post-none -->
