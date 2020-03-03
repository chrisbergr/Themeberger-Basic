console.log('chobz');

var chobz = jQuery;

var $page     = chobz( '#page' );
var $masthead = chobz( '#masthead' );

var $chobz_burger = chobz( '#chobz_burger' );
var $chobz_lens   = chobz( '#chobz_lens' );

var $ui_fullmenu = chobz( '.chobz-ui--fullmenu' );
var $ui_scrollarea = chobz( '.scrollarea' );

var class_scrollable       = 'scrollable';
var class_display_fullmenu = 'display-fullmenu';
var class_display_search   = 'display-search';
var class_arrows           = 'arrow';
var class_arrowPrev        = 'arrow-prev';
var class_arrowNext        = 'arrow-next';
var class_slider           = '.slider';

var unit_px             = 'px';
var property_margin_top = 'margin-top';
var native_scrollto     = window.scrollTo;

// UI VALUES
var is_menu_open   = false;
var is_search_open = false;
var scrolltop      = 0;

// SLIDER VALUES
var arrows_disabled_class = 'disabled';

/*
jQuery(document).ready(function() {
  //jQuery('body').on('wheel touchstart', (e) => (e.preventDefault()));
  window.delta = 1;
  jQuery('.scrollarea').on('wheel mousewheel', function(e, delta) {
    //console.log(delta);
    //this.scrollLeft -= (delta * 1.5);
	window.delta = window.delta * 1.5;
	//jQuery('scrollcontent').css({'transform':'translate(0,-' + (delta * 1.5) + 'px)'});​
	jQuery('.scrollcontent').css({'transform':'translateX(-' + (window.delta) + 'px)'});​
    e.preventDefault();
  });
});
*/
/*
jQuery('.scrollarea').bind('mousewheel DOMMouseScroll touchstart', function(e){
    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
        // scroll up
		console.log('up');
    }
    else {
        // scroll down
		console.log('down');
    }


    var delta = Math.max(-1, Math.min(1, (e.originalEvent.wheelDelta || -e.originalEvent.detail)));
    jQuery(this).scrollLeft( jQuery(this).scrollLeft() - ( delta * 40 ) );
	console.log(delta * 40);

	e.preventDefault();
});

*/
/*
jQuery(function() {

   jQuery(".scrollarea").mousewheel(function(event, delta) {

      this.scrollLeft -= (delta * 30);

      event.preventDefault();

   });

});
*/
