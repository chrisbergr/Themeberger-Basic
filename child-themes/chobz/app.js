( function( $ ) {

	var is_menu_open = false;
	var is_search_open = false;
	var scrolltop = 0;

	$( '#chobz_burger' ).click( hamburger );
	$( '#chobz_lens' ).click( lens );

	console.log('chobz');

	function hamburger( e ) {
		e.preventDefault();
		if ( is_menu_open ) {
			return hamburger_close();
		} else {
			return hamburger_open();
		}
	}
	function hamburger_close() {
		$('.chobz-ui--fullmenu').removeClass('scrollable');
		$( '#page' ).removeClass( 'display-fullmenu' );
		$( '#masthead' ).css( 'margin-top', 0 );
		window.scrollTo( 0, scrolltop );
		is_menu_open = false;
	}
	function hamburger_open() {
		if ( is_search_open ) {
			lens_close();
		}
		scrolltop = document.documentElement.scrollTop;
		$( '#masthead' ).css( 'margin-top', -(scrolltop) + 'px' );
		$( '#page' ).addClass( 'display-fullmenu' );
		$('.chobz-ui--fullmenu').removeClass('scrollable').delay(250).queue(function(){
			$(this).addClass('scrollable').dequeue();
		});
		is_menu_open = true;
	}

	function lens( e ) {
		e.preventDefault();
		if ( is_search_open ) {
			return lens_close();
		} else {
			return lens_open();
		}
	}
	function lens_close() {
		$( '#page' ).removeClass( 'display-search' );
		$( '#masthead' ).css( 'margin-top', 0 );
		window.scrollTo( 0, scrolltop );
		is_search_open = false;
	}
	function lens_open() {
		if ( is_menu_open ) {
			hamburger_close();
		}
		scrolltop = document.documentElement.scrollTop;
		$( '#masthead' ).css( 'margin-top', -(scrolltop) + 'px' );
		$( '#page' ).addClass( 'display-search' );
		is_search_open = true;
	}

} )( jQuery );
