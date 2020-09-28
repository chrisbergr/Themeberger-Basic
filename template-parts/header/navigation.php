
			<?php if ( function_exists( 'wp_nav_menu' ) && has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="primary-navigation" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'menu_class'     => 'primary-menu',
						'theme_location' => 'primary',
						'menu_id'        => 'primary',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
			<?php endif; ?>
