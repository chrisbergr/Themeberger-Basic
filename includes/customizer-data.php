<?php
/**
 * Customizer Output Functions
 *
 * @package themebergertest
 */
function get_tb_helper_defaultcover() {

	$default_url = get_template_directory_uri() . '/images/default-cover.jpg';
	$value = esc_attr( get_theme_mod( 'tbsetting_helper_defaultcover', $default_url ) );

	if ( ! $value ) {
		$value = $default_url;
	}

	return $value;

}

function tb_helper_defaultcover( $before = '', $after = '', $echo = true ) {

	$output = $before . get_tb_helper_defaultcover() . $after;

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done by the function get_tb_helper_defaultcover
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_tb_helper_defaultpublisherlogo() {

	$default_url = get_template_directory_uri() . '/images/default-publisher.jpg';
	$value = esc_attr( get_theme_mod( 'tbsetting_helper_defaultpublisherlogo', $default_url ) );

	if ( ! $value ) {
		$value = $default_url;
	}

	return $value;

}

function tb_helper_defaultpublisherlogo( $before = '', $after = '', $echo = true ) {

	$output = $before . get_tb_helper_defaultpublisherlogo() . $after;

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done by the function get_tb_helper_defaultpublisherlogo
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}

function get_tb_helper_defaultpublishername() {

	$default_name = 'Themeberger';
	$value = esc_attr( get_theme_mod( 'tbsetting_helper_defaultpublishername', $default_name ) );

	if ( ! $value ) {
		$value = $default_name;
	}

	return $value;

}

function tb_helper_defaultpublishername( $before = '', $after = '', $echo = true ) {

	$output = $before . get_tb_helper_defaultpublishername() . $after;

	if ( ! $echo ) {
		return $output;
	}

	//All escaping is done by the function get_tb_helper_defaultpublishername
	//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $output;

}
