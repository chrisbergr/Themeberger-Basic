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

		<div class="site-header--inner">

			<?php marlon_get_template_part( 'template-parts/header/navigation' ); ?>

			<div class="site-branding">

				<?php do_action( 'themeberger_site_branding' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/branding' ); ?>

			</div><!-- .site-branding -->

			<div class="site-info">

				<?php do_action( 'themeberger_site_info' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/index' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/archive' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/search' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/404' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/page' ); ?>
				<?php marlon_get_template_part( 'template-parts/header/singular' ); ?>

			</div><!-- .site-info -->

		</div><!-- .site-header-inner -->

		<div class="site-header--background"></div>

	</header><!-- .site-header -->

	<?php do_action( 'themeberger_after_header' ); ?>
