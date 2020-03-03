function chobz_slider( key, value ) {

	var arrows = chobz( $ui_scrollarea[key] ).find( '.' + class_arrows ),
		prevArrow = arrows.filter( '.' + class_arrowPrev ),
		nextArrow = arrows.filter( '.' + class_arrowNext ),
		slider = chobz( $ui_scrollarea[key] ).find( class_slider ),
		x = 0,
		mx = 0,
		maxScrollWidth = slider[0].scrollWidth - ( slider[0].clientWidth / 2 ) - ( slider.width() / 2 );

	function arrows_click() {
		if ( chobz( this ).hasClass( class_arrowNext ) ) {
			x = ( (slider.width() / 1.5) ) + slider.scrollLeft() - 10;
			slider.animate( {
				scrollLeft: x,
			} );
		} else {
			x = ( (slider.width() / 1.5) ) - slider.scrollLeft() -10;
			slider.animate( {
				scrollLeft: -x,
			} );
		}
	}

	function toggleArrows() {
		if ( slider.scrollLeft() > maxScrollWidth - 10 ) {
			nextArrow.addClass( arrows_disabled_class );
		} else if ( slider.scrollLeft() < 10 ) {
			prevArrow.addClass( arrows_disabled_class )
		} else {
			nextArrow.removeClass( arrows_disabled_class );
			prevArrow.removeClass( arrows_disabled_class );
		}
	}

	function slider_mousemove( e ) {
		var mx2 = e.pageX - this.offsetLeft;
		if ( mx ) {
			this.scrollLeft = this.sx + mx - mx2;
		}
	}
	function slider_mousedown( e ) {
		this.sx = this.scrollLeft;
		mx = e.pageX - this.offsetLeft;
	}
	function slider_scroll() {
		toggleArrows();
	}
	function mouseup() {
		mx = 0;
	}

	chobz( slider ).on( {
		mousemove: slider_mousemove,
		mousedown: slider_mousedown,
		scroll: slider_scroll
	} );
	chobz( document ).on( 'mouseup', mouseup);
	chobz( arrows ).on( 'click', arrows_click );

}

chobz.each( $ui_scrollarea, chobz_slider);
