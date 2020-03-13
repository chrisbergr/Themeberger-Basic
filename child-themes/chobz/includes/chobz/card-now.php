<?php

function chobz_card_now() {

	if ( is_front_page() && is_home() ) :

		$url  = 'https://location.cho.bz/api/current-location/';
		$args = array(
			'headers' => array(
				'Content-Type' => 'application/json',
				'X-Api-Key'    => 'apikey12345',
			),
		);

		$response = wp_remote_get( $url, $args );

		if ( ! is_array( $response ) || is_wp_error( $response ) ) {
			return;
		}

		$result_location = $response['body']; // use the content

		$result_location = json_decode( $result_location );
		$current_place   = $result_location->current_place;
		$location        = preg_replace( '#(\s*<br\s*/?>)*\s*$#i', '', nl2br( $result_location->current_place_f ) );
		?>

		<div class="now-card">
			<h2>cho.bz/now</h2>
			<div class="content-card">

				<div class="content-card-section section-left">

					<?php if ( $current_place->has_image ) : ?>
					<img src="<?php echo esc_url( $current_place->image ); ?>" class="map-static" alt="Current location map">
					<img src="<?php echo esc_url( $current_place->image_wide ); ?>" class="map-wide-static" alt="Current location wide map">
					<?php endif; ?>

				</div>
				<div class="content-card-section section-center">

					<p class="smaller">CURRENT LOCATION:</p>
					<p class="address-formated">
						<?php if ( $current_place->name ) : ?>
							<strong><?php echo esc_html( $current_place->name ); ?></strong><br>
						<?php endif; ?>
						<?php echo wp_kses( $location, THEMEBERGER_HTML ); ?></p>
					<p class="smaller">
						<a class="address--link" href="https://www.google.com/maps/search/<?php echo esc_url( $current_place->coordinates ); ?>" target="_blank" title="View on Google Maps" rel="noreferrer"><?php echo esc_html( $current_place->coordinates ); ?></a><br>
					</p>

				</div>
				<div class="content-card-section section-right">

					I am working on displaying the current weather at my location in this column. This will also be a teaser of my Now-Page.

				</div>

			</div>
		</div>

		<?php

	endif;

}
add_action( 'themeberger_after_header', 'chobz_card_now' );
