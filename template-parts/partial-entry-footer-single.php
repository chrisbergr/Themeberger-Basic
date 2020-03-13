<?php
/**
 * Template part for single post footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themebergerbasic
 */
//TODO: Add class 'p-category' to category and tag links
?>

	<p><?php the_title( '<strong class="meta-title p-name">', '</strong> | ' ); ?><span itemprop="articleSection"><?php the_category( ', ' ); ?></span><?php the_permalink_date( ' | ', '', false ); ?></p>
	<?php do_action( 'themeberger_entry_footer' ); ?>
	<p><?php esc_html_e( 'Shortlink:', 'themeberger-basic' ); ?> <?php the_shorturl(); ?></p>
	<?php the_tags( '<p>' . __( 'Tags:', 'themeberger-basic' ) . ' <span itemprop="keywords">', ', ', '</span></p>' ); ?>
