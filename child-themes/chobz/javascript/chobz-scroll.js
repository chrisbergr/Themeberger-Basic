var chobz_scroll = chobz_scroll_off,
	class_moved = chobz_class_moved,
	scroll_offset = chobz_scroll_offset;

function chobz_scroll_on() {
	if ( $window.scrollTop() < scroll_offset ) {
		$body.removeClass( class_moved );
		chobz_scroll = chobz_scroll_off;
	}
}

function chobz_scroll_off() {
	if ( $window.scrollTop() > scroll_offset ) {
		$body.addClass( class_moved );
		chobz_scroll = chobz_scroll_on;
	}
}

if ( $body.hasClass( chobz_class_home ) ) {
	$window.scroll( function() {
		chobz_scroll();
	} );
	chobz_scroll();
}
