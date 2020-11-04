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
define( 'THEME_VERSION', '1.2.5' );

/**
 * Marlon Support.
 */
function marlon_get_template_part( $slug, $name = null ) {
	if ( ! function_exists( 'marlon_framework' ) || ! marlon_framework()->has_module( 'post_utilities' ) ) {
		return get_template_part( $slug, $name );
	}
	return marlon_framework()->get_template_part( $slug, $name );
}

function the_content_meta() {
	if ( function_exists( 'marlon_framework' ) && marlon_framework()->has_module( 'post_utilities' ) ) {
		if( $utils = marlon_framework()->get_module( 'post_utilities' ) ) {
			$utils->get_marlon_template( 'entry-meta' );
		}
	}
}

function themeberger_marlon_shortlink_classes( $classes ) {
	$classes[] = 'tb-shortlink';
	return $classes;
}
add_filter( 'marlon_shortlink_classes', 'themeberger_marlon_shortlink_classes' );

function themeberger_marlon_author_vcard_class( $author_class ) {
	return $author_class . ' ' . 'themeberger-author';
}
add_filter( 'marlon_author_vcard_class', 'themeberger_marlon_author_vcard_class' );

function themeberger_marlon_permalink_date( $permalink ) {
	return '<span class="themeberger-date">' . $permalink . '</span>';
}
add_filter( 'marlon_permalink_date', 'themeberger_marlon_permalink_date' );

function themeberger_marlon_first_quote_of_post_class( $quote_class ) {
	return $quote_class . ' ' . 'themeberger-quote';
}
add_filter( 'marlon_first_quote_of_post_class', 'themeberger_marlon_first_quote_of_post_class' );

/**
 * Themeberger Basic Setup.
 */
require_once THEME_INCLUDES . '/setup/setup.php';
require_once THEME_INCLUDES . '/setup/setup-scripts.php';
require_once THEME_INCLUDES . '/setup/setup-widgets.php';
require_once THEME_INCLUDES . '/setup/cleanup.php';

/**
 * 3rd Party Support.
 */
require_once THEME_INCLUDES . '/third-party/third-party-support.php';

/**
 * Customizer Functions.
 */
require_once THEME_INCLUDES . '/customizer/class-wp-customize-colorrange.php';
require_once THEME_INCLUDES . '/customizer/class-wp-customize-range.php';
require_once THEME_INCLUDES . '/customizer/customizer.php';
require_once THEME_INCLUDES . '/customizer/customizer-data.php';

/*
require_once THEMEBERGER_DIR . '/class-themeberger-post-functions.php';
require_once THEMEBERGER_DIR . '/themeberger-public-post-functions.php';
require_once THEMEBERGER_DIR . '/class-themeberger-comment-walker.php';

/**/

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
	ob_start();
	?>
	<div class="homepage-content-container">
	<?php
	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	foreach ( $child_pages as $post ) {
		setup_postdata( $post->ID );
		$prefix = '';
		get_template_part( 'template-parts/homepage-content' . $prefix, $post->post_name );
	}
	wp_reset_postdata();
	?>
	</div>
	<?php
	echo apply_filters( 'themeberger_homepage_content', ob_get_clean() );
}
add_filter( 'themeberger_homepage_content', 'do_shortcode' );
add_action( 'themeberger_homepage', 'homepage_content' );

/**/

function add_atom_feed() {
	?>
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> &raquo; Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php
}
add_action( 'wp_head', 'add_atom_feed', 2 );

/**/

function themeberger_previous_posts_link_attributes( $attr ) {
	return $attr . 'class="prev" rel="prev"';
}
add_filter( 'previous_posts_link_attributes', 'themeberger_previous_posts_link_attributes' );

function themeberger_next_posts_link_attributes( $attr ) {
	return $attr . 'class="next" rel="next"';
}
add_filter( 'next_posts_link_attributes', 'themeberger_next_posts_link_attributes' );

/**/

function add_archive_description() {
	the_archive_description( '<section class="taxonomy-description"><div class="taxonomy-description-inner">', '</div></section>' );
}
add_action( 'themeberger_after_header', 'add_archive_description', 50 );

function add_featured_image_body_class( $classes ) {
	global $post;
    if( isset( $post->ID ) && get_the_post_thumbnail( $post->ID ) ) {
          $classes[] = 'has-featured-image';
	}
    return $classes;
}
add_filter( 'body_class', 'add_featured_image_body_class' );

/**/
