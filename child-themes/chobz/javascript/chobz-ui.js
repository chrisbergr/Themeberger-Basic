	/* VALUES */



	/* MENU */

	function hamburger_close() {
		$ui_fullmenu.removeClass( class_scrollable );
		$page.removeClass( class_display_fullmenu );
		$masthead.css( property_margin_top, 0 );
		native_scrollto( 0, scrolltop );
		is_menu_open = false;
	}
	function hamburger_open() {
		if ( is_search_open ) {
			lens_close();
		}
		scrolltop = document.documentElement.scrollTop;
		$masthead.css( property_margin_top, -(scrolltop) + unit_px );
		$page.addClass( class_display_fullmenu );
		$ui_fullmenu.removeClass( class_scrollable ).delay( 250 ).queue( function() {
			chobz( this ).addClass( class_scrollable ).dequeue();
		} );
		is_menu_open = true;
	}
	function hamburger( e ) {
		e.preventDefault();
		if ( is_menu_open ) {
			return hamburger_close();
		}
		return hamburger_open();
	}
	$chobz_burger.click( hamburger );


	/* SEARCH */

	function lens_close() {
		$page.removeClass( class_display_search );
		$masthead.css( property_margin_top, 0 );
		native_scrollto( 0, scrolltop );
		is_search_open = false;
	}
	function lens_open() {
		if ( is_menu_open ) {
			hamburger_close();
		}
		scrolltop = document.documentElement.scrollTop;
		$masthead.css( property_margin_top, -(scrolltop) + unit_px );
		$page.addClass( class_display_search );
		is_search_open = true;
	}
	function lens( e ) {
		e.preventDefault();
		if ( is_search_open ) {
			return lens_close();
		}
		return lens_open();
	}
	$chobz_lens.click( lens );
