<?php
/**
 * @package themebergerbasic
 */


/* SUPPORT for Plugin POST KINDS */

function remove_kind_view() {
	remove_filter( 'the_content', array( 'Kind_View', 'content_response' ), 9 );
	remove_filter( 'the_excerpt', array( 'Kind_View', 'excerpt_response' ), 9 );
}
add_action( 'wp_loaded', 'remove_kind_view' );

function remove_kind_style() {
	wp_dequeue_style( 'kind' );
}
add_action( 'wp_print_styles', 'remove_kind_style', 100 );

function manipulate_response_display ( $content ) {
	print_r( '<!-- POST KIND -->' . "\n\r\n\r" );
	print_r( $content );
	print_r( "\n\r\n\r" . '<!-- / POST KIND -->' );
}
//add_filter( 'kind_response_display', 'manipulate_response_display' );

/**/

/* SUPPORT for Plugin SYNDICATION LINKS */

function remove_syndication_view() {
	remove_filter( 'the_content', array( 'Syn_Config', 'the_content' ), 30 );
}
add_action( 'wp_loaded', 'remove_syndication_view' );

function add_syndication_view() {
	echo '<div id="syndication-links">' . get_post_syndication_links() . '</div>';
}
add_action( 'themeberger_entry_footer', 'add_syndication_view', 50 );

function remove_syndication_style() {
	wp_dequeue_style( 'syndication-style' );
}
add_action( 'wp_print_styles', 'remove_syndication_style', 100 );

/**/
