<?php

function chobz_setup() {

	register_nav_menus(
		array(
			'fullmenu' => __( 'Full Menu', 'themeberger-basic' ),
		)
	);

	add_theme_support( 'themeberger-breadcrumbs' );

}
add_action( 'after_setup_theme', 'chobz_setup' );
