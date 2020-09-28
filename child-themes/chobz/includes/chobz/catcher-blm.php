<?php

function chobz_catcher_blm() {

	?>

	<div class="chobz-catcher catcher-blm">

		<?php chobz_footer_blm(); ?>

		<div class="site-header--image">
			<?php /*<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clay-banks-ak0F3mwgr0c-unsplash.jpg" alt="#BLM" style="filter: grayscale(1);">*/?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clay-banks-ak0F3mwgr0c-unsplash.jpg" alt="#BLM">
		</div>

		<?php //<div class="background-block full-width-block" style="background-color:var(--header-background-color);"></div>?>
		<?php //<div class="background-block full-width-block" style="background-color:#3f0000;"></div>?>
		<div class="background-block full-width-block" style="background-color:#000;"></div>

	</div>

	<?php

}
//add_action( 'themeberger_footer_infobox', 'chobz_footer_blm', 95 );
add_action( 'themeberger_homepage', 'chobz_catcher_blm', 10 );
