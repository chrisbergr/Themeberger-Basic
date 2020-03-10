	/* VALUES */

	/*
	var close_overlay = close_overlay_default;
	function open_overlay() {
		if ( ! $body.hasClass( class_moved ) ) {
			close_overlay = close_overlay_scrolled;
			$body.addClass( class_moved );
			return;
		}
		close_overlay = close_overlay_default;
		return;
	}
	function close_overlay_scrolled() {
		$body.removeClass( class_moved );
		close_overlay = close_overlay_default;
		return;
	}
	function close_overlay_default() {
		return;
	}
	*/

	/* MENU */

	function hamburger_close() {
		$ui_fullmenu.removeClass( class_scrollable );
		$body.removeClass( class_display_fullmenu );
		$masthead.css( property_margin_top, 0 );
		native_scrollto( 0, scrolltop );
		is_menu_open = false;
		//close_overlay();
	}
	function hamburger_open() {
		if ( is_search_open ) {
			lens_close();
		}
		scrolltop = get_scroll_position();
		$masthead.css( property_margin_top, -(scrolltop) + unit_px );
		$body.addClass( class_display_fullmenu );
		$ui_fullmenu.removeClass( class_scrollable ).delay( 250 ).queue( function() {
			chobz( this ).addClass( class_scrollable ).dequeue();
		} );
		is_menu_open = true;
		//open_overlay();
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
		$body.removeClass( class_display_search );
		$masthead.css( property_margin_top, 0 );
		native_scrollto( 0, scrolltop );
		is_search_open = false;
		//close_overlay();
	}
	function lens_open() {
		if ( is_menu_open ) {
			hamburger_close();
		}
		scrolltop = get_scroll_position();
		$masthead.css( property_margin_top, -(scrolltop) + unit_px );
		$body.addClass( class_display_search );
		is_search_open = true;
		//open_overlay();
	}
	function lens( e ) {
		e.preventDefault();
		if ( is_search_open ) {
			return lens_close();
		}
		return lens_open();
	}
	$chobz_lens.click( lens );
