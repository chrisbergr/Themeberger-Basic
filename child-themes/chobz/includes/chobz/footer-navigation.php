<?php

function chobz_footer_navigation() {

	?>

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<div class="footer-navigation-container">
		<nav class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_id' => 'footer-menu',
				'fallback_cb' => false
			) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	<?php endif; ?>

	<?php

}
add_action( 'themeberger_after_footer', 'chobz_footer_navigation', 10 );
