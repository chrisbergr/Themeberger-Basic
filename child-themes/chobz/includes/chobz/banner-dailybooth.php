<?php

function chobz_banner_dailybooth() {
	if ( is_single() && has_tag( 'dailybooth' ) ) :
		?>
		<div class="reclaimed-notice">
			<p><?php echo sprintf(
				__( 'I reclaimed this post from <a href="%s">Dailybooth</a>. Unfortunately this platform, <a href="%s">like so many others</a>, no longer exists.', 'themeberger-basic' ),
				'https://en.wikipedia.org/wiki/DailyBooth',
				'https://indieweb.org/site-deaths'
			); ?></p>
		</div>
		<?php
	endif;
}
add_action( 'themeberger_after_entry_content', 'chobz_banner_dailybooth', 100 );
