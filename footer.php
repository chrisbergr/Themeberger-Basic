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

	</body>
</html>
