/**
 * themebergertest customizer scripts
 *
 * @package themebergertest
 */

( function( $ ) {

	wp.customize( 'tbsetting_primary_color', function( value ) {
		value.bind( function( newval ) {
			$( 'html' ).get(0).style.setProperty( '--color-primary', newval );
		} );
	} );

	wp.customize( 'tbsetting_secondary_color', function( value ) {
		value.bind( function( newval ) {
			$( 'html' ).get(0).style.setProperty( '--color-secondary', newval );
		} );
	} );

	wp.customize( 'tbsetting_special_color', function( value ) {
		value.bind( function( newval ) {
			$( 'html' ).get(0).style.setProperty( '--color-special', newval );
		} );
	} );

	wp.customize( 'tbsetting_theme', function( value ) {
		value.bind( function( newval ) {
			$( 'html' ).attr( 'theme', newval );
		} );
	} );

} )( jQuery );
