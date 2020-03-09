<?php

// TEST: https://cho.bz/b/GU

define( 'CHOBZ_FUNCTIONS', get_stylesheet_directory() . '/includes' );
define( 'CHOBZ_SETUP', CHOBZ_FUNCTIONS . '/setup' );
define( 'CHOBZ_INCLUDES', CHOBZ_FUNCTIONS . '/chobz' );
define( 'CHOBZ_THIRD_PARTY', CHOBZ_FUNCTIONS . '/third-party' );

require_once CHOBZ_SETUP . '/setup.php';
require_once CHOBZ_SETUP . '/setup-scripts.php';
require_once CHOBZ_SETUP . '/setup-widgets.php';

require_once CHOBZ_INCLUDES . '/chobz-ui.php';
require_once CHOBZ_INCLUDES . '/footer-navigation.php';
require_once CHOBZ_INCLUDES . '/footer-info.php';
require_once CHOBZ_INCLUDES . '/footer-backlink.php';
require_once CHOBZ_INCLUDES . '/footer-solidaritaet.php';
require_once CHOBZ_INCLUDES . '/footer-journey.php';
require_once CHOBZ_INCLUDES . '/banner-dailybooth.php';
require_once CHOBZ_INCLUDES . '/card-now.php';

require_once CHOBZ_THIRD_PARTY . '/themeberger-breadcrumbs.php';
require_once CHOBZ_THIRD_PARTY . '/polylang.php';
require_once CHOBZ_THIRD_PARTY . '/remove-assets.php';

/**/

function default_post_title( $old_title ){
	if ( ! $old_title ) {
		/*
		if ( is_single() ){
			return single_post_title( '', false );
		}
		*/
		return __( 'A post by Christian Hockenberger', 'themeberger-basic' );
	}
	return $old_title;
}
add_filter( 'the_title', 'default_post_title' );

function default_title( $old_title ){
	if ( ! $old_title || ! $old_title['title'] ) {
		//$old_title['title'] = __( 'A post by Christian Hockenberger', 'themeberger-basic' );
		$old_title['title'] = single_post_title( '', false );
	}
	return $old_title;
}
add_filter( 'document_title_parts', 'default_title' );

function default_seo_title( $old_title ){
	$title_parts = explode( '-', $old_title );
	if ( '' === $title_parts[0] ) {
		//$title_parts[0] = __( 'A post by Christian Hockenberger', 'themeberger-basic' );
		$title_parts[0] = single_post_title( '', false );
		$old_title = implode( ' -', $title_parts );
	}
	return $old_title;
}
add_filter( 'wpseo_title', 'default_seo_title', 10, 1 );

/**/

function exclude_activity_from_feed( $query ) {
    if ( $query->is_feed ) {
        $query->set( 'cat', '-206, -208, -214' );
    }
	return $query;
}
add_filter( 'pre_get_posts', 'exclude_activity_from_feed' );

/**/

function photo_posts_per_page( $query ) {
	if( $query->is_main_query() && ( is_category( 'foto' ) || is_category( 'photo' ) ) && ! is_admin() ) {
		$query->set( 'posts_per_page', '50' );
	}
}
add_action( 'pre_get_posts', 'photo_posts_per_page' );

/**/
