<?php

if ( ! function_exists( 'themebergerbasic_scripts' ) ) :

	function themebergerbasic_scripts() {

		wp_enqueue_style(
			'themebergerbasic-style',
			THEME_URI . '/assets/themeberger-basic.min.css',
			array(),
			THEME_VERSION
		);
		wp_enqueue_script(
			'themebergerbasic-scripts',
			THEME_URI . '/assets/themeberger-basic.min.js',
			array( 'jquery' ),
			THEME_VERSION,
			true
		);
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

endif;
add_action( 'wp_enqueue_scripts', 'themebergerbasic_scripts' );

if ( ! function_exists( 'themebergerbasic_admin_scripts' ) ) :

	function themebergerbasic_admin_scripts() {

		$current_screen = get_current_screen();
		if ( 'customize' === $current_screen->id || 'widgets' === $current_screen->id ) {
			wp_enqueue_style(
				'themebergerbasic-customizer-style',
				THEME_URI . '/admin.css',
				array(),
				THEME_VERSION,
				'all'
			);
		} else {
			add_editor_style( THEME_URI . '/admin.css' );
		}

	}

endif;
add_action( 'admin_enqueue_scripts', 'themebergerbasic_admin_scripts' );
