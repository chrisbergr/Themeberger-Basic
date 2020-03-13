<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themebergerbasic
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
		<?php do_action( 'themeberger_before_secondary' ); ?>

		<aside id="secondary-content" class="widget-area"><?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary-content -->

		<?php do_action( 'themeberger_after_secondary' ); ?>
