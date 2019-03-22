<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themebergertest
 */

?>

		<aside class="helper">
			<div class="helper--xs">XS</div>
			<div class="helper--sm">SM</div>
			<div class="helper--md">MD</div>
			<div class="helper--lg">LG</div>
			<div class="helper--xl">XL</div>
		</aside>

		<?php wp_footer(); ?>

		<script>
			jQuery( 'h1, h2, h3, h4, .menu-item a' ).each( function() {
				if ( jQuery( this ).css( 'text-transform' ) === 'uppercase' ) {
					jQuery( this ).html( jQuery( this ).html().replace( /ß/g, 'ẞ' ) );
				}
			} );
		</script>
		<script>
			jQuery( '.opening-button' ).click( function() {
				jQuery( 'body' ).toggleClass( 'opening-open' );
			} );
		</script>
		<script>
			jQuery( '<div class="quantity-nav"><div class="quantity-button quantity-down">-</div><div class="quantity-button quantity-up">+</div></div>' ).insertAfter( '.shopcontent .input-text.qty' );
			jQuery( '.shopcontent .quantity' ).each( function() {
				var spinner = jQuery( this ),
					input = spinner.find( '.input-text.qty' ),
					btnUp = spinner.find( '.quantity-up' ),
					btnDown = spinner.find( '.quantity-down' ),
					min = input.attr('min'),
					max = input.attr('max');
				if( !max || max < 1 ) {
					max = 9999;
				}
				btnUp.click( function() {
					var oldValue = parseFloat(input.val());
					if (oldValue >= max) {
					var newVal = oldValue;
					} else {
					var newVal = oldValue + 1;
					}
					input.val(newVal);
					input.trigger("change");
				} );
				btnDown.click( function() {
					var oldValue = parseFloat(input.val());
					if (oldValue <= min) {
					var newVal = oldValue;
					} else {
					var newVal = oldValue - 1;
					}
					input.val(newVal);
					input.trigger("change");
				} );
			} );
		</script>


	</body>
</html>
