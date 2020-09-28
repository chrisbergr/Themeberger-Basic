
			<?php if ( is_front_page() && is_home() ) : // LATEST POSTS FRONTPAGE ?>
				<?php $description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $description || is_customize_preview() ) : ?>
					<p class="site-description">
						<?php echo esc_html( $description ); ?>
					</p>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( ! is_front_page() && is_home() ) : // BLOG INDEX ?>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php endif; ?>

			<?php if ( is_front_page() && ! is_home() ) : // HOME PAGE ?>
				<?php $description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $description || is_customize_preview() ) : ?>
					<h1 class="page-title">
						<?php echo esc_html( $description ); ?>
					</h1>
				<?php endif; ?>
			<?php endif; ?>
