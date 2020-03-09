<?php

function chobz_remove_third_party_assets() {

	wp_dequeue_style( 'themeberger' );
	wp_dequeue_style( 'semantic-linkbacks-css' );
	wp_dequeue_style( 'branda-admin-bar-logo' );
	wp_dequeue_style( 'wp-block-library' );

	wp_dequeue_script( 'themeberger' );
	wp_dequeue_script( 'media-fragment' );

}
add_action( 'wp_enqueue_scripts', 'chobz_remove_third_party_assets', 100 );
