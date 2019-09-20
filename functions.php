<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themebergerbasic
 */

define( 'THEME_NAME', 'Themeberger Basic' );
define( 'THEME_URL', 'https://github.com/chrisbergr/Themeberger-Basic' );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_INCLUDES', get_template_directory() . '/includes' );
define( 'THEMEBERGER_DIR', get_template_directory() . '/themeberger' );
define( 'THEME_VERSION', '1.1.5' );

if ( ! isset( $content_width ) ) {
	$content_width = 1920;
}

/**
 * See http://www.paulund.co.uk/remove-jquery-migrate-file-wordpress.
 *
 * @param object $scripts WordPress Default Scripts.
 */
function remove_jquery_migrate( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

if ( ! function_exists( 'themebergerbasic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themebergerbasic_setup() {

		load_theme_textdomain( 'themeberger-basic', get_template_directory() . '/languages' );

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


if ( ! function_exists( 'themebergerbasic_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function themebergerbasic_scripts() {
		wp_enqueue_style( 'themebergerbasic-style', get_stylesheet_uri(), null, THEME_VERSION );
		wp_enqueue_script( 'themebergerbasic-app', get_template_directory_uri() . '/app.js', array( 'jquery' ), THEME_VERSION, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'themebergerbasic_scripts' );

if ( ! function_exists( 'themebergerbasic_admin_scripts' ) ) {
	/**
	 * Enqueue scripts and styles for backend.
	 */
	function themebergerbasic_admin_scripts() {
		$current_screen = get_current_screen();
		if ( 'customize' === $current_screen->id || 'widgets' === $current_screen->id ) {
			wp_enqueue_style( 'themebergerbasic-customizer-style', THEME_URI . '/admin.css', null, THEME_VERSION, 'all' );
		} else {
			add_editor_style( THEME_URI . '/admin.css' );
		}

	}
}
add_action( 'admin_enqueue_scripts', 'themebergerbasic_admin_scripts' );


if ( ! function_exists( 'themebergerbasic_widgets_init' ) ) {
	/**
	 * Register widget area.
	 */
	function themebergerbasic_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'themeberger-basic' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Site Info', 'themeberger-basic' ),
				'id'            => 'site-info',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Left', 'themeberger-basic' ),
				'id'            => 'footer-left',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Right', 'themeberger-basic' ),
				'id'            => 'footer-right',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}
}
add_action( 'widgets_init', 'themebergerbasic_widgets_init' );

/**
 * Displays Subpages of front page (homepage).
 */
function homepage_content() {
	global $post;

	$child_pages = get_pages(
		array(
			'child_of'    => get_option( 'page_on_front' ),
			'sort_column' => 'menu_order',
		)
	);
	?>
	<div class="homepage-content-container">
	<?php
	foreach ( $child_pages as $page ) {
		setup_postdata( $page );
		$prefix = '';
		get_template_part( 'template-parts/homepage-content' . $prefix, $page->post_name );
	}
	?>
	</div>
	<?php
	wp_reset_postdata();
}
add_action( 'themeberger_homepage', 'homepage_content' );



/**
 * Themeberger Post Functions Class.
 */
require THEMEBERGER_DIR . '/class-themeberger-post-functions.php';

/**
 * Themeberger Post Functions.
 */
require THEMEBERGER_DIR . '/themeberger-public-post-functions.php';

/**
 * Themeberger Comment Walker.
 */
require THEMEBERGER_DIR . '/class-themeberger-comment-walker.php';

/**
 * 3rd Party Support.
 */
require THEME_INCLUDES . '/third-party-support.php';


/**
 * Customizer Functions.
 */
require THEME_INCLUDES . '/class-wp-customize-colorrange.php';
require THEME_INCLUDES . '/class-wp-customize-range.php';
require THEME_INCLUDES . '/customizer.php';
require THEME_INCLUDES . '/customizer-data.php';

//TODO: Exclude this into child theme
require THEME_INCLUDES . '/chrisbergr.php';
