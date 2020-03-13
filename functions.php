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

/**
 * Themeberger Post Functions Class.
 */
require_once THEMEBERGER_DIR . '/class-themeberger-post-functions.php';

/**
 * Themeberger Post Functions.
 */
require_once THEMEBERGER_DIR . '/themeberger-public-post-functions.php';

/**
 * Themeberger Comment Walker.
 */
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
}
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

/**/
