<?php

function themebergerbasic_scripts() {

	/*
	$parent_style = 'themebergerbasic-style';
	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/themeberger-basic.css'
	);
	wp_enqueue_style(
		'themebergerbasic-chobz',
		get_stylesheet_directory_uri() . '/assets/chobz.min.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
	$parent_script = 'themebergerbasic-app';
	wp_enqueue_script(
		$parent_script,
		get_template_directory_uri() . '/themeberger-basic.min.js',
		array( 'jquery' ),
		wp_get_theme()->get('Version'),
		true
	);
	wp_enqueue_script(
		'themebergerbasic-chobz',
		get_stylesheet_directory_uri() . '/assets/chobz.min.js',
		array( 'jquery', $parent_script ),
		wp_get_theme()->get('Version'),
		true
	);
	/**/

	wp_enqueue_style(
		'themebergerbasic-chobz',
		get_stylesheet_directory_uri() . '/assets/chobz.min.css',
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'themebergerbasic-chobz',
		get_stylesheet_directory_uri() . '/assets/chobz.min.js',
		array( 'jquery' ),
		wp_get_theme()->get('Version'),
		true
	);

}
add_action( 'wp_enqueue_scripts', 'themebergerbasic_scripts' );
