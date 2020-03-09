<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1920;
}

if ( ! function_exists( 'themebergerbasic_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themebergerbasic_setup() {

		load_theme_textdomain( 'themeberger', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-header',
			array(
				'flex-width'    => true,
				'flex-height'    => true,
			)
		);

		add_theme_support( 'custom-background' );

		set_post_thumbnail_size( 980, 600, true );

		register_nav_menus(
			array(
				'primary'   => __( 'Primary Menu', 'themeberger-basic' ),
				'secondary' => __( 'Secondary Menu', 'themeberger-basic' ),
				'footer'    => __( 'Footer Menu', 'themeberger-basic' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 75,
				'width'       => 313,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support(
			'post-formats',
			array(
				'aside',
				'gallery',
				'image',
				'video',
				'audio',
				'quote',
				'status',
			)
		);

		add_post_type_support( 'page', 'excerpt' );

	}

endif;
add_action( 'after_setup_theme', 'themebergerbasic_setup' );
