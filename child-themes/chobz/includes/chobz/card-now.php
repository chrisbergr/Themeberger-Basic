<?php

function chobz_card_now() {

	if ( is_front_page() && is_home() ) :
	//if ( ! is_home() && is_front_page() ) :

		//$curl = curl_init( 'http://explorer.localhost/api/current-location/' );
		$curl = curl_init( 'https://location.cho.bz/api/current-location/' );
		curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		$result_location = curl_exec( $curl );
		curl_close( $curl );
		$result_location = json_decode( $result_location );
		$current_place = $result_location->current_place;
		$location = preg_replace( '#(\s*<br\s*/?>)*\s*$#i', '', nl2br( $result_location->current_place_f ) );
		//print_r($result_location);
		?>

		<div class="now-card">
			<h2>cho.bz/now</h2>
			<div class="content-card">

				<div class="content-card-section section-left">

					<?php if ( $current_place->has_image ) : ?>
					<img src="<?=$current_place->image?>" class="map-static" alt="Current location map">
					<img src="<?=$current_place->image_wide?>" class="map-wide-static" alt="Current location wide map">
					<?php endif; ?>

				</div>
				<div class="content-card-section section-center">

					<p class="smaller">CURRENT LOCATION:</p>
					<p class="address-formated"><?php if ( $current_place->name ) : ?><strong><?php echo $current_place->name; ?></strong><br><?php endif; ?><?php echo $location; ?></p>
					<p class="smaller">
						<a class="address--link" href="https://www.google.com/maps/search/<?=$current_place->coordinates?>" target="_blank" title="View on Google Maps" rel="noreferrer"><?=$current_place->coordinates?></a><br>
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
//add_action( 'themeberger_homepage', 'chobz_card_now' );
