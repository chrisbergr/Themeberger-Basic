<?php
/**
 * themebergertest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themebergertest
 */

define( 'theme_name', "Themeberger Test" );
define( 'theme_url', "https://github.com/chrisbergr/Themeberger-Test" );
define( 'theme_uri', get_template_directory_uri() );
define( 'theme_dir', get_template_directory() );
define( 'theme_includes', get_template_directory() . '/includes' );
define( 'theme_version', "1.0.1" );

if ( ! isset( $content_width ) ) {
	$content_width = 1920;
}

// http://www.paulund.co.uk/remove-jquery-migrate-file-wordpress
function remove_jquery_migrate( &$scripts) {
    if ( !is_admin() ) {
        $scripts->remove( 'jquery' );
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


if ( ! function_exists( 'themebergertest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themebergertest_setup() {

		load_theme_textdomain( 'themebergertest', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1920 * 2, 720 * 2, true );

		register_nav_menus( array(
            'primary-left' => __( 'Primary Menu Left', 'themebergertest' ),
            'secondary' => __( 'Secondary Menu', 'themebergertest' ),
            'footer' => __( 'Footer Menu', 'themebergertest' ),
            'shopmenu' => __( 'Shop Menu', 'themebergertest' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 75,
			'width'       => 313,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_post_type_support( 'page', 'excerpt' );

	}
endif;
add_action( 'after_setup_theme', 'themebergertest_setup' );


if ( ! function_exists( 'themebergertest_scripts' ) ) :
	function themebergertest_scripts() {
		wp_enqueue_style( 'themebergertest-style', get_stylesheet_uri() );
		wp_enqueue_script( 'themebergertest-app', get_template_directory_uri() . '/app.js', array( 'jquery' ), theme_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'themebergertest_scripts' );


function homepage_content() {
    global $post;

    $child_pages = get_pages( array(
        'child_of' => get_option( 'page_on_front' ),
        'sort_column' => 'menu_order',
    ) );
	?>
	<div class="homepage-content-container">
	<?php
    foreach ( $child_pages as $post ) {
        setup_postdata( $post );
		$prefix = '';
		//if ( explode( '-', $post->post_name )[ 0 ] === 'teaser' ) {
		//	$prefix = '-teaser';
		//}
        get_template_part( 'template-parts/homepage-content' . $prefix, $post->post_name );
		//echo '<p>' . $post->post_name . '</p>';
    }
    ?>
	</div>
	<?php
    wp_reset_postdata();
}
add_action( 'themeberger_homepage', 'homepage_content' );