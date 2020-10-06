<?php
/**
 * Template Part
 *
 * @package themebergerbasic
 */

if( ! function_exists( 'marlon_framework' ) || ! $utils = marlon_framework()->get_module( 'post_utilities' ) ) {
	return;
}
if( ! function_exists( 'marlon_framework' ) || ! $kicker = marlon_framework()->get_module( 'post_kicker' ) ) {
	return;
}
if( ! function_exists( 'marlon_framework' ) || ! $subtitle = marlon_framework()->get_module( 'post_subtitle' ) ) {
	return;
}

$layout = get_post_meta( get_the_id(), 'marlon_post_layout', true );
if( empty( $layout ) ) {
	$layout = 'layout-default';
}


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

				<?php do_action( 'marlon_site_breadcrumbs' ); ?>

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

						<?php if ( ! is_front_page() && is_home() ) : //blog index ?>
							<h1 class="page-title"><?php single_post_title(); ?></h1>
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
							<h1 class="site-description"><?php esc_html_e( '404 - Not found', 'themeberger-basic' ); ?></h1>
						<?php endif; ?>

						<?php if ( is_page() ) : ?>
							<h1 class="page-title"><?php single_post_title(); ?></h1>
						<?php endif; ?>

						<?php if ( is_singular() ) : ?>
							<?php
							$this_type   = get_post_type();
							$this_format = get_post_format() ? : 'standard';
							$this_kind   = 'note';
							if ( function_exists( 'has_post_kind' ) && has_post_kind() ) {
								$this_kind = strtolower( get_post_kind() );
							}
							if ( 'standard' === $this_format && 'note' !== $this_kind ) {
								$this_format = $this_kind;
							}
							$template = $this_type . '-' . $this_format;
							?>
							<?php if ( 'post-standard' === $template ) : ?>
								<div class="site-info">
									<div class="site-info--left">
										<?php $kicker->the_kicker( '<h6 class="entry-kicker page-kicker">', '</h6>' ); ?>
										<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
										<?php $subtitle->the_subtitle( '<h4 class="entry-subtitle page-subtitle">', '</h4>' ); ?>
									</div><!-- .site-info-left -->
									<div class="site-info--right">
										<h6 class="entry-category-date page-category-date"><?php $utils->the_permalink_date( '', '<br>', false ); ?><?php the_category( ', ' ); ?></h6>
									</div><!-- .site-info-right -->
								</div><!-- .site-info -->
							<?php endif; ?>
						<?php endif; ?>

					</div><!-- .site-branding -->
				</div><!-- .site-header-inner -->

				<?php if ( has_post_thumbnail() && is_singular() && $layout === 'layout-headercover' ) : ?>
				<div class="site-header--image"><?php the_post_thumbnail(); ?></div>
				<?php endif; ?>

				<div class="site-header--background"></div>

				<div class="elm-divider elm-divider--bottom">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2206 61" style="enable-background:new 0 0 2206 61;" xml:space="preserve">
						<path d="M2206,0H0v43c3.5,0.6,7,1,10.5,1.4c13.1,1.4,26.1,3.2,39.2,3.5c8,0.1,16-2.8,24.1-3.7c19.7-2.1,39.3-3,59.2-0.6
							c10.6,1.3,21.5-0.6,32.3-0.7c6.4,0,13,0.2,19.3,1.2c8.4,1.4,16.5,3.1,25.2,2.2c5.4-0.6,11.2,0.9,16.5,2.6c9.8,3.1,19.2,5.3,29.8,2.8
							c10.8-2.6,22-3.8,33.1-4.4c8.2-0.4,16.6,1.8,24.8,1.6c6.7-0.1,13.4-1.8,20-3.4c7.7-1.9,15.2-5.1,23-6.3c7.2-1.2,14.8-0.8,22.1-0.6
							c6.4,0.2,12.3-0.2,18.2-3.7c4-2.4,9-3.6,13.6-4.3c8.4-1.4,16.8-2.4,25.3-2.8c5.7-0.3,11.6,1.2,17.3,0.8c4.7-0.3,9.3-2.1,14-3.2
							c3.7-0.8,7.4-2.2,11.1-2.3c13.1-0.1,26.3-0.4,39.4,0.5c18.1,1.2,35.8-1.5,53.8-2.2c12.1-0.5,24.8-1.2,36.2,1.9
							c7.8,2.1,13.8-1.1,20.6-0.8c9,0.4,17.9,0.1,26.9,0.2c14.9,0.1,29.4,3.8,44.6,2.3c12.4-1.2,25.2,1.4,37.8,2.3
							c2.8,0.2,5.6,0.5,8.5,0.7c17.1,0.8,34.2,2.4,51.2-2.4c18.4-5.2,36.7,1,55,1.8c5.6,0.2,11.3-0.4,16.9-0.5c2.5,0,5.1-0.2,7.4,0.4
							c6.5,1.8,12.9,3.2,19.6,0.8c1.5-0.5,3.6,0.5,5.4,0.5c2.9,0,5.7-0.5,8.6-0.5c2.7,0,5.3,0.3,8,0.4c0.1,0,0.3,0.3,0.4,0.3
							c14.7,0.3,25.2,13.9,40.2,13.1c12-0.7,24.2,1.9,35.9-3c2.8-1.2,6.6-0.8,9.7-0.1c7.9,1.8,15.6,1.6,23.7,0.3c6.5-1,13.5,0.8,20.2,1.7
							c8.6,1.2,17.1,3,25.6,4.3c3.1,0.4,6.3-0.3,9.4-0.1c11.6,0.5,23.3,1.3,34.9,1.5c10.1,0.2,20.2-0.4,30.2-0.6c0.2,0,0.3-0.1,0.5-0.1
							c15.8-0.9,31.5-1.9,47.3-2.6c2.6-0.1,5.2,0.8,7.8,1.3c8,1.3,15.9,3.3,24,3.9c13.8,1,27.6,1.4,41.4,1.5c22.1,0.2,44.2-0.2,66.3,0
							c8.6,0,17.3,1.3,25.9,1c6.9-0.3,13.7-2.1,20.6-3.2c2.4-0.4,4.9-1,7.3-0.9c10.2,0.5,20.5,1.3,30.7,1.8c6.9,0.3,13.9,0,20.9,0.6
							c20.1,1.6,40.1,3.8,60.1,5.2c5.3,0.4,11-0.8,16.1-2.3c9-2.7,18.1-3.9,27.5-4.1c19.9-0.5,39.9-1.8,59.8-3c10.5-0.6,20.9-2.1,31.3-2.7
							c8.8-0.5,17.6-0.5,26.3-0.3c2.7,0.1,5.3,2.1,8,2.4c12.7,1.3,25.5,3.3,38.3,3.3c9.5,0,19.1-2.2,28.3-4.7c8.7-2.3,16.9-4.4,26.3-3.7
							c22.7,1.5,45.6,1.5,68.4,2.1c8.1,0.2,16.4-0.8,24.3,0.5c22.8,3.6,45.5,1.5,68.3,1.7c9.1,0.1,18.2,1.3,27.4,1.9
							c5.2,0.3,10.3,0.7,15.5,0.4c16.9-0.9,33.9-2.1,50.8-3.1c2.2-0.1,4.3-0.1,6.5-0.2c12.8-0.5,25.6-1.4,38.4-1.3
							c12.6,0,25.3,0.8,37.9,1.7c8.1,0.6,16.1,2.3,24.1-0.9c2.8-1.1,6.2-1,9.4-1.1c11-0.3,22-1.1,32.9-0.4c9.1,0.5,18,2.8,27.1,4.3
							c3.9,0.6,7.7,1.2,11.6,1.8V0z"/>
					</svg>
				</div>

			</header><!-- .site-header -->
			<?php do_action( 'themeberger_after_header' ); ?>
