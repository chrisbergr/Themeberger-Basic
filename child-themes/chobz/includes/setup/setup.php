<?php

function chobz_setup() {

	register_nav_menus(
		array(
			'fullmenu' => __( 'Full Menu', 'themeberger-basic' ),
		)
	);

	add_theme_support( 'themeberger-breadcrumbs' );
	add_theme_support( 'marlon-breadcrumbs' );

}
add_action( 'after_setup_theme', 'chobz_setup' );

function chobz_columns_filter( $columns ) {

	unset( $columns['page-title'] );
	unset( $columns['author'] );
	unset( $columns['date'] );
	unset( $columns['shortlink'] );

	return $columns;
}

function chobz_columns() {
	add_filter( 'manage_posts_columns', 'chobz_columns_filter' );
	add_filter( 'manage_page_posts_columns', 'chobz_columns_filter' );
}
add_action( 'admin_init', 'chobz_columns' );
