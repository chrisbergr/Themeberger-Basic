<?php
/**
 * Template Part
 *
 * @package themebergerbasic
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
			<header id="masthead" class="site-header<?php echo is_singular() ? ' header-single' : ''; ?>" style="<?php header_style(); ?>">

				<?php do_action( 'chobz_breadcrumb' ); ?>

				<div class="site-header--inner">

					<div class="site-branding">

						<?php if ( is_front_page() && is_home() ) : ?>
							<?php $description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $description || is_customize_preview() ) : ?>
								<p class="site-description">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( is_category() || is_archive() ) : ?>
							<?php the_archive_title( '<h1 class="site-description">', '</h1>' ); ?>
						<?php endif; ?>

						<?php if ( is_search() ) : ?>
							<?php
							$searchtitle = sprintf(
								/* translators: %s: Search term visible in the title */
								esc_html__( 'Search Results for &#8220;%s&#8221;', 'themeberger-basic' ),
								get_search_query()
							);
							?>
							<h1 class="site-description"><?php echo esc_html( $searchtitle ); ?></h1>
						<?php endif; ?>

						<?php if ( is_404() ) : ?>
							<h1 class="site-description"><?php _e( '404 - Not found', 'themeberger-basic' ); ?></h1>
						<?php endif; ?>

						<?php if ( is_page() ) : ?>
							<h1 class="page-title"><?php single_post_title(); ?></h1>
						<?php endif; ?>

					</div><!-- .site-branding -->
				</div><!-- .site-header--inner -->

				<div class="site-header--background"></div>

			</header><!-- .site-header -->
			<?php do_action( 'themeberger_after_header' ); ?>
