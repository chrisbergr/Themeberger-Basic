<?php

// TEST: https://cho.bz/b/GU

define( 'CHOBZ_FUNCTIONS', get_stylesheet_directory() . '/includes' );
define( 'CHOBZ_SETUP', CHOBZ_FUNCTIONS . '/setup' );
define( 'CHOBZ_INCLUDES', CHOBZ_FUNCTIONS . '/chobz' );
define( 'CHOBZ_THIRD_PARTY', CHOBZ_FUNCTIONS . '/third-party' );

require_once CHOBZ_SETUP . '/setup.php';
require_once CHOBZ_SETUP . '/setup-scripts.php';
require_once CHOBZ_SETUP . '/setup-widgets.php';

require_once CHOBZ_INCLUDES . '/chobz-ui.php';
require_once CHOBZ_INCLUDES . '/footer-navigation.php';
require_once CHOBZ_INCLUDES . '/footer-info.php';
require_once CHOBZ_INCLUDES . '/footer-backlink.php';
require_once CHOBZ_INCLUDES . '/footer-logo.php';
require_once CHOBZ_INCLUDES . '/footer-solidaritaet.php';
require_once CHOBZ_INCLUDES . '/footer-journey.php';
require_once CHOBZ_INCLUDES . '/footer-blm.php';
require_once CHOBZ_INCLUDES . '/catcher-blm.php';
require_once CHOBZ_INCLUDES . '/banner-dailybooth.php';
require_once CHOBZ_INCLUDES . '/card-now.php';

require_once CHOBZ_THIRD_PARTY . '/marlon-breadcrumbs.php';
require_once CHOBZ_THIRD_PARTY . '/polylang.php';
require_once CHOBZ_THIRD_PARTY . '/remove-assets.php';

/**/

function default_post_title( $old_title ) {
	if ( ! $old_title ) {
		return __( 'A post by Christian Hockenberger', 'themeberger-basic' );
	}
	return $old_title;
}
add_filter( 'the_title', 'default_post_title' );

function default_title( $old_title ) {
	if ( ! $old_title || ! $old_title['title'] ) {
		$old_title['title'] = single_post_title( '', false );
	}
	return $old_title;
}
add_filter( 'document_title_parts', 'default_title' );

function default_seo_title( $old_title ) {
	$title_parts = explode( '-', $old_title );
	if ( '' === $title_parts[0] ) {
		$title_parts[0] = single_post_title( '', false );
		$old_title      = implode( ' -', $title_parts );
	}
	return $old_title;
}
add_filter( 'wpseo_title', 'default_seo_title', 10, 1 );

/**/

function exclude_activity_from_feed( $query ) {
	if ( $query->is_feed ) {
		$query->set( 'cat', '-206, -208, -214' );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'exclude_activity_from_feed' );

/**/

function photo_posts_per_page( $query ) {
	if ( $query->is_main_query() && ( is_category( 'foto' ) || is_category( 'photo' ) ) && ! is_admin() ) {
		$query->set( 'posts_per_page', '50' );
	}
}
add_action( 'pre_get_posts', 'photo_posts_per_page' );

/**/

function list_hooks( $hook = '' ) {

	global $wp_filter;

	if ( isset( $wp_filter[$hook]->callbacks ) ) {
		array_walk(
			$wp_filter[$hook]->callbacks,
			function( $callbacks, $priority ) use ( &$hooks ) {
				foreach ( $callbacks as $id => $callback ) {
					$hooks[] = array_merge( [ 'id' => $id, 'priority' => $priority ], $callback );
				}
			}
		);
	} else {
		return [];
	}

	foreach( $hooks as &$item ) {
		if ( !is_callable( $item['function'] ) ) {
			continue;
		}
		if ( is_string( $item['function'] ) ) {
			$ref = strpos( $item['function'], '::' ) ? new ReflectionClass( strstr( $item['function'], '::', true ) ) : new ReflectionFunction( $item['function'] );
			$item['file'] = $ref->getFileName();
			$item['line'] = get_class( $ref ) == 'ReflectionFunction'
			? $ref->getStartLine()
			: $ref->getMethod( substr( $item['function'], strpos( $item['function'], '::' ) + 2 ) )->getStartLine();
		} elseif ( is_array( $item['function'] ) ) {
			$ref = new ReflectionClass( $item['function'][0] );
			$item['function'] = array(
				is_object( $item['function'][0] ) ? get_class( $item['function'][0] ) : $item['function'][0],
				$item['function'][1]
			);
			$item['file'] = $ref->getFileName();
			$item['line'] = strpos( $item['function'][1], '::' )
			? $ref->getParentClass()->getMethod( substr( $item['function'][1], strpos( $item['function'][1], '::' ) + 2 ) )->getStartLine()
			: $ref->getMethod( $item['function'][1] )->getStartLine();
		} elseif ( is_callable( $item['function'] ) ) {
			$ref = new ReflectionFunction( $item['function'] );
			$item['function'] = get_class( $item['function'] );
			$item['file'] = $ref->getFileName();
			$item['line'] = $ref->getStartLine();
		}
	}

	return $hooks;

}

/**/

function list_scripts_styles( $info = 'src' ) {

	$result = [];
	$result['scripts'] = [];
	$result['styles'] = [];

	global $wp_scripts;

	foreach( $wp_scripts->queue as $script ) :
		if ( $info === 'src' ) {
			$result['scripts'][] =  $wp_scripts->registered[$script]->src;
		}
		if ( $info === 'handle' ) {
			$result['scripts'][] =  $wp_scripts->registered[$script]->handle;
		}
	endforeach;

	global $wp_styles;
	foreach( $wp_styles->queue as $style ) :
		if ( $info === 'src' ) {
			$result['styles'][] =  $wp_styles->registered[$style]->src;
		}
		if ( $info === 'handle' ) {
			$result['styles'][] =  $wp_styles->registered[$style]->handle;
		}
	endforeach;

	return $result;

}

/**/


function add_barba_script() {
	?>
	<script src="https://unpkg.com/@barba/core"></script>
	<script>

		// basic default transition (with no rules and minimal hooks)
		barba.init({
		  transitions: [{
		    leave({ current, next, trigger }) {
		      // do something with `current.container` for your leave transition
		      // then return a promise or use `this.async()`
		    },
		    enter({ current, next, trigger }) {
		      // do something with `next.container` for your enter transition
		      // then return a promise or use `this.async()`
		    }
		  }]
		});

		// dummy example to illustrate rules and hooks
		barba.init({
		  transitions: [{
		    name: 'dummy-transition',

		    // apply only when leaving `[data-barba-namespace="home"]`
		    from: 'home',

		    // apply only when transitioning to `[data-barba-namespace="products | contact"]`
		    to: {
		      namespace: [
		        'products',
		        'contact'
		      ]
		    },
/*
		    // apply only if clicked link contains `.cta`
		    custom: ({ current, next, trigger })
		      => trigger.classList && trigger.classList.contains('cta'),
*/
		    // do leave and enter concurrently
		    sync: true,

		    // available hooks…
		    beforeOnce() {},
		    once() {},
		    afterOnce() {},
		    beforeLeave() {},
		    leave() {},
		    afterLeave() {},
		    beforeEnter() {},
		    enter() {},
		    afterEnter() {}
		  }]
		});

		barba.hooks.afterLeave((data) => {
			// Set <body> classes for "next" page
			var nextHtml = data.next.html;
			var response = nextHtml.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nextHtml)
			var bodyClasses = jQuery(response).filter('notbody').attr('class')
			jQuery("body").attr("class", bodyClasses);
			jQuery(document).scrollTop( 0 );
			window.chobz_init();
		});

	</script>
	<?php
}
//add_action( 'themeberger_after_page', 'add_barba_script', 100 );

function debug_scripts() {

	print_r("\n\r".'<!--'."\n\r");
	//print_r( list_hooks( 'wp_print_footer_scripts' ) );
	print_r( list_scripts_styles( 'handle' ) );
	print_r("\n\r".'-->'."\n\r");

}
