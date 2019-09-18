<?php
/**
 * Template part for single post footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */
?>

	<p><?php the_title( '<strong class="meta-title">', '</strong> | ' ); ?><span itemprop="articleSection"><?php the_category( ', ' ); ?></span><?php the_permalink_date( ' | ', '', false ); ?></p>
	<p>Shortlink: <?php the_shorturl(); ?></p>
	<?php the_tags( '<p>Tags: <span itemprop="keywords">', ', ', '</span></p>' ); ?>
