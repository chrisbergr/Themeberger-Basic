var chobz_scroll = chobz_scroll_off,
	class_moved = chobz_class_moved,
	scroll_offset = chobz_scroll_offset;

function chobz_scroll_on() {
	if ( get_scroll_position() < scroll_offset ) {
		$body.removeClass( class_moved );
		chobz_scroll = chobz_scroll_off;
	}
}

function chobz_scroll_off() {
	if ( get_scroll_position() > scroll_offset ) {
		$body.addClass( class_moved );
		chobz_scroll = chobz_scroll_on;
	}
}

if ( $body.hasClass( chobz_class_home ) || $body.hasClass( chobz_class_sticky ) ) {
	$window.scroll( function() {
		chobz_scroll();
	} );
	chobz_scroll();
}
