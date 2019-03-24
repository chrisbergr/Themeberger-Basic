<?php
/**
 * Template Part
 *
 * @package themebergertest
 */

if ( ! function_exists( 'header_style' ) ) {
	/**
	 * Prints the header image if is set
	 */
	function header_style() {
		$header_style  = '';
		$custom_header = get_custom_header();
		if ( ! empty( $custom_header->attachment_id ) ) {
			$image        = wp_get_attachment_image_url( $custom_header->attachment_id, 'post-thumbnail' );
			$header_style = ' background-image:url(' . $image . ');';
		}
		echo esc_attr( $header_style );
	}
}

?>

			<?php do_action( 'themeberger_before_header' ); ?>
			<header id="masthead" class="site-header" style="<?php header_style(); ?>">

				<div class="site-header--inner">
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
					<div class="site-branding">

						<?php if ( has_custom_logo() ) : ?>
							<div class="site-logo"><?php the_custom_logo(); ?></div>
						<?php endif; ?>
						<?php if ( display_header_text() ) : ?>
							<?php $blog_info = get_bloginfo( 'name' ); ?>
							<?php if ( ! empty( $blog_info ) ) : ?>
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( is_front_page() && is_home() ) : ?>
							<?php $description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $description || is_customize_preview() ) : ?>
								<p class="site-description">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif; ?>
						<?php endif; ?>

					</div><!-- .site-branding -->
				</div><!-- .site-header--inner -->

				<div class="site-header--background"></div>

			</header><!-- .site-header -->
			<?php do_action( 'themeberger_after_header' ); ?>
