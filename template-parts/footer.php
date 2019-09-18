<?php
/**
 * Template Part
 *
 * @package themebergerbasic
 */

?>

			<?php do_action( 'themeberger_before_footer' ); ?>
			<footer id="colophon" class="site-footer">
				<div class="site-footer--inner">
					<div class="site-info">
						<?php dynamic_sidebar( 'site-info' ); ?>
					</div><!-- .site-info -->
					<div class="site-footer--left">
						<?php dynamic_sidebar( 'footer-left' ); ?>
					</div>
					<div class="site-footer--right">
						<?php dynamic_sidebar( 'footer-right' ); ?>
					</div>
				</div>
			</footer><!-- #colophon -->
			<?php do_action( 'themeberger_after_footer' ); ?>
