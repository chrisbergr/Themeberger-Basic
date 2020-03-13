<?php

function chobz_banner_dailybooth() {
	if ( is_single() && has_tag( 'dailybooth' ) ) :
		?>
		<div class="reclaimed-notice">
			<p>
			<?php
				echo wp_kses(
					sprintf(
						/* translators: %1$s = Dailybooth URL; %2$s = IndieWeb Site-Deaths URL */
						__( 'I reclaimed this post from <a href="%1$s">Dailybooth</a>. Unfortunately this platform, <a href="%2$s">like so many others</a>, no longer exists.', 'themeberger-basic' ),
						'https://en.wikipedia.org/wiki/DailyBooth',
						'https://indieweb.org/site-deaths'
					),
					THEMEBERGER_HTML
				);
			?>
			</p>

		</div>
		<?php
	endif;
}
add_action( 'themeberger_after_entry_content', 'chobz_banner_dailybooth', 100 );
