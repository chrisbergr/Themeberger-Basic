<?php
/**
 * @package themebergerbasic
 */
/*
function my_theme_enqueue_styles() {

 $parent_style = 'montreal-style';
 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

*/

function get_avatar_img_url( $user_email ) {
  $url = 'http://gravatar.com/avatar/' . md5( $user_email );
  $url = add_query_arg( array(
    's' => 200,
    'd' => 'mm',
  ), $url );
  return esc_url_raw( $url );
}

function my_theme_footer_info() {

	?>

	<div class="footer-infobox">
		<div class="wrapper">
			<div class="footer-infobox-left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<svg version="1.1" id="logo-footer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1340.6 281" style="enable-background:new 0 0 1340.6 281;" xml:space="preserve">
						<g class="logo-footer-hockenberger">
							<path d="M417.3,69.3h-19.5V46.2h-17.5v61.4h17.5v-23h19.5v23h17.5V46.2h-17.5V69.3z M501.4,45.1
								c-20.3,0-33.2,14-33.2,31.8c0,18,12.9,31.9,33.2,31.9c20.3,0,33.2-14,33.2-31.9C534.6,59.1,521.7,45.1,501.4,45.1z M501.4,92.8
								c-9,0-14.9-6.8-14.9-16c0-9,6-15.8,14.9-15.8c9,0,14.9,6.8,14.9,15.8C516.3,86.1,510.4,92.8,501.4,92.8z M598.8,61.1
								c5.8,0,10,2.2,12.9,4.6l4.8-15.3c-4.5-3.1-11.2-5.3-18.6-5.3C578,45.1,565,59.2,565,76.9c0,17.8,13,31.9,32.9,31.9
								c7.4,0,14.1-2.2,18.6-5.3l-4.8-15.3c-2.9,2.4-7.1,4.6-12.9,4.6c-9.3,0-15.5-6.8-15.5-16C583.2,67.9,589.5,61.1,598.8,61.1z
								 M703,46.2h-19.4l-16,24.6V46.2h-17.5v61.4h17.5V82.6l16.2,25.1h19.9l-21.2-32L703,46.2z M753,84.2h14.3V69H753v-7.5H770V46.2
								h-34.4v61.4h35.1V92.4H753V84.2z M843.2,81.1l-19.8-34.8h-17.8v61.4h17.1V73.3l20.3,34.3h17.4V46.2h-17.2V81.1z M934.9,75.5
								c4.3-2.9,6.6-6.9,6.6-12.6c0-10.7-7.9-16.7-20.8-16.7h-23.8v61.4h24.2c12.3,0,22.3-5.7,22.3-18.6
								C943.4,83.1,940.8,78.1,934.9,75.5z M914.3,60.8h4.9c3,0,4.5,1.8,4.5,4.2c0,2.5-1.5,4.5-4.3,4.5h-5.1V60.8z M920.5,93h-6.2v-9.9
								h6.5c3.1,0,4.7,2.5,4.7,4.9C925.5,90.4,923.7,93,920.5,93z M994.3,84.2h14.3V69h-14.3v-7.5h16.9V46.2h-34.4v61.4h35.1V92.4h-17.6
								V84.2z M1091.1,65.6c0-12-7.3-19.4-22.6-19.4h-21.7v61.4h17.5V86h3.2l10.4,21.7h19.2l-14-25.8
								C1088.3,78.5,1091.1,72.2,1091.1,65.6z M1067.2,71.8h-2.9V60.9h2.9c4,0,6.1,1.9,6.1,5.4C1073.3,69.4,1071.2,71.8,1067.2,71.8z
								 M1159.2,86.5h9.9v3.4c-1.3,1.1-4.9,2.9-11.8,2.9c-9.7,0-16.2-6.8-16.2-16c0-9,6.2-15.8,15.5-15.8c7.6,0,11.5,3.8,13.8,6.4
								l11.1-11.2c-3.3-4-11.4-11.1-25.7-11.1c-19.9,0-32.9,14.1-32.9,31.8c0,17.8,13,31.9,32.9,31.9c15,0,22.6-5,29.2-9.6v-27h-25.9
								V86.5z M1237.2,84.2h14.3V69h-14.3v-7.5h16.9V46.2h-34.4v61.4h35.1V92.4h-17.6V84.2z M1325.9,81.9c5.3-3.3,8.1-9.7,8.1-16.2
								c0-12-7.3-19.4-22.6-19.4h-21.7v61.4h17.5V86h3.2l10.4,21.7h19.2L1325.9,81.9z M1310.1,71.8h-2.9V60.9h2.9c4,0,6.1,1.9,6.1,5.4
								C1316.2,69.4,1314.1,71.8,1310.1,71.8z"></path>
						</g>
						<g class="logo-footer-christian">
							<path d="M446.5,235.4c-4.3,3.4-16.9,11.2-33.5,11.2c-25.5,0-42-18.3-42-43.1c0-32.6,27.9-58.5,58.8-58.5
								c14.7,0,24.1,6,28.6,10.2l-5.3,10.1c-3.2-3.1-11.8-9.7-24.8-9.7c-24.4,0-45.4,20.7-45.4,46.6c0,19.3,12.2,33.7,32.2,33.7
								c14.8,0,25.8-8.1,29.5-10.9L446.5,235.4z"></path>
							<path d="M535.9,199.3l-7.6,45.5h-11.1l7.7-45.9c2-11.6-4.3-18.6-14.1-18.6c-11.2,0-20.4,8.3-22.4,20.3l-7.4,44.2H470
								l16.9-101.2H498l-6.6,38.9c4.6-6.6,13.7-12.3,23.7-12.3C532,170.1,538.7,182.7,535.9,199.3z"></path>
							<path d="M600.5,181.2c-15.4,0-23.4,11.5-26.3,28.7l-5.9,34.9h-11.1l12.2-72.8h10.9l-2.1,12.2c3.8-7.3,13-14,24.1-14
								L600.5,181.2z"></path>
							<path d="M624.8,172h11.1l-12.2,72.8h-11.1L624.8,172z M634.6,145.6c3.9,0,6.6,2.8,6.6,6.6c0,4.8-4.3,8.7-9.1,8.7
								c-3.8,0-6.3-2.8-6.3-6.6C625.8,149.6,630,145.6,634.6,145.6z"></path>
							<path d="M658.3,226.3c2.4,5.6,6.7,10.9,16.7,10.9c8,0,15.5-4.9,15.5-13c0-14.3-31.1-12.7-31.1-33c0-13,11.8-21,26.3-21
								c13.6,0,19.6,8.7,20.9,14l-8.8,4.6c-1.4-3.9-4.2-9.4-13.6-9.4c-7.4,0-13.9,4.1-13.9,11.2c0,13.9,31.2,13.6,31.2,33.5
								c0,13.9-10.9,22.5-27.9,22.5c-14.7,0-21-8.8-23.7-15.5L658.3,226.3z"></path>
							<path d="M738.1,156.7h10.8l-2.7,15.3h16l-1.5,9.4h-16l-6.3,37.5c-2.2,13.6,1.3,16.8,10.1,16.8c1.4,0,3.6-0.3,3.6-0.3
								l-1.7,9.9c0,0-2.9,0.4-6.7,0.4c-13.3,0-19.2-8.1-16.5-24.5l6.4-39.9h-8.5l1.5-9.4h8.8L738.1,156.7z"></path>
							<path d="M786.1,172h11.1L785,244.8h-11.1L786.1,172z M795.9,145.6c3.9,0,6.6,2.8,6.6,6.6c0,4.8-4.3,8.7-9.1,8.7
								c-3.8,0-6.3-2.8-6.3-6.6C787.1,149.6,791.3,145.6,795.9,145.6z"></path>
							<path d="M845.5,198.4c9.2,0,15.7,3.5,18.1,6.6l1.5-9c1.7-10.2-4.2-16.1-15-16.1c-8.5,0-16.7,3.5-22.3,6.4l-3.2-8.4
								c5.3-3.1,15.3-7.8,27.6-7.8c18.8,0,26.5,11.1,23.8,26.6l-8,48h-9.5l-0.3-6.2c-4.5,4.3-11.2,8-21,8c-14.4,0-24.1-8.7-24.1-20.9
								C813.1,210.2,827.4,198.4,845.5,198.4z M840.6,237.3c11.8,0,20.9-7.3,20.9-17.2c0-7.8-6.2-12.9-16-12.9c-12.2,0-20.9,7.6-20.9,16.9
								C824.6,231.6,830.5,237.3,840.6,237.3z"></path>
							<path d="M962.2,199.3l-7.6,45.5h-11.1l7.7-45.9c2-11.6-4.2-18.6-14.1-18.6c-11.2,0-20.3,8.3-22.3,20.3l-7.4,44.2h-11.1
								l12.2-72.8h10.9l-1.8,10.5c4.6-6.6,13.7-12.3,23.8-12.3C958.5,170.1,965,182.7,962.2,199.3z"></path>
						</g>
						<g class="logo-footer-crest">
							<circle cx="140.6" cy="140" r="140"></circle>
							<path d="M140.6,266.3c-69.7,0-126.3-56.6-126.3-126.3c0-69.8,56.5-126.3,126.3-126.3c69.7,0,126.3,56.6,126.3,126.3
								C266.9,209.7,210.4,266.3,140.6,266.3z M255.8,149.5l-49.3,85.4C234.1,215.7,252.9,184.9,255.8,149.5z M248.9,139.9l-18-31.3
								l0,62.6L248.9,139.9z M140.4,47.9l-79.7,46l0,92l79.7,46l79.7-46l0-92L140.4,47.9z M212.7,77.1l-18.1-31.3h-36.1L212.7,77.1z
								 M122.2,45.8H86L67.9,77.2L122.2,45.8z M68,202.7L86,234h36.1L68,202.7z M158.4,234h36.2l18.1-31.4L158.4,234z M189.4,244.8H91.7
								c14.8,6.9,31.4,10.8,48.8,10.8S174.6,251.7,189.4,244.8z M73.8,234.3l-48.4-83.8C28.6,185.1,46.9,215.3,73.8,234.3z M49.8,108.6
								l-18.1,31.3l18.1,31.3L49.8,108.6z M25.4,129.3l48.3-83.7C46.9,64.7,28.6,94.8,25.4,129.3z M140.6,24.3c-17.4,0-33.9,3.9-48.7,10.7
								h97.4C174.5,28.2,158,24.3,140.6,24.3z M206.6,45l49.2,85.3C252.9,95,234.1,64.2,206.6,45z M151.9,181.1c6.6-1,9.9-3.3,9.9-6.9
								v-28.6h-40.7v28.6c0,3.6,3.3,5.9,9.9,6.9v8.5h-41v-8.5c6.6-1,9.9-3.3,9.9-6.9v-66.5c0-3.6-3.3-5.9-9.9-6.9v-8.5h41v8.5
								c-6.6,1-9.9,3.3-9.9,6.9v27.5h40.7v-27.5c0-3.6-3.3-5.9-9.9-6.9v-8.5h41v8.5c-6.6,1-9.9,3.3-9.9,6.9v66.5c0,3.6,3.3,5.9,9.9,6.9
								v8.5h-41V181.1z"></path>
						</g>
					</svg>
				</a>
			</div>
			<div class="footer-infobox-center">

				<div class="profilegrid vcard hcard h-card" itemscope itemtype="http://schema.org/Person">
					<div class="profilegrid-left">
						<p class="hcardname name p-name fn n"><span class="given-name p-given-name" itemprop="givenName">Christian</span> <span class="family-name p-family-name" itemprop="familyName">Hockenberger</span></p>
						<p class="note p-note"><strong class="highlight">Father</strong>, <strong class="highlight">Husband</strong>, <span class="job-title p-job-title" itemprop="jobTitle">Brand Identity Designer</span> &amp; Soldier</p>
						<div class="profilegrid-inner">
							<p class="adr h-adr" itemprop="address" itemscope="itemscope" itemtype="http://schema.org/PostalAddress"><span class="street-address p-street-address" itemprop="streetAddress">Robert-Koch-Straße 19</span><br><span class="country-name p-country-name" itemprop="addressCountry">DE</span>-<span class="postal-code p-postal-code" itemprop="postalCode">67240</span> <span class="locality p-locality" itemprop="addressLocality">Roxheim</span></p>
						</div>
						<div class="profilegrid-inner">
							<p><a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#99;&#104;&#114;&#105;&#115;&#116;&#105;&#97;&#110;&#64;&#104;&#111;&#99;&#107;&#101;&#110;&#98;&#101;&#114;&#103;&#101;&#114;&#46;&#117;&#115;" class="email u-email" itemprop="email">&#99;&#104;&#114;&#105;&#115;&#116;&#105;&#97;&#110;&#64;&#104;&#111;&#99;&#107;&#101;&#110;&#98;&#101;&#114;&#103;&#101;&#114;&#46;&#117;&#115;</a><br><a href="https://christian.hockenberger.us" class="url u-url" itemprop="url">christian.hockenberger.us</a></p>
						</div>
					</div>
					<div class="profilegrid-right">
						<p class="txtrght">
							<img src="<?php echo get_avatar_img_url('christian@hockenberger.us'); ?>" title="Christian Hockenberger" alt="Christian Hockenberger Portrait" class="photo u-photo avatar">
						</p>
					</div>
					<div class="profilegrid-bottom">
						<ul class="external_links">
							<li class="twitter"><a href="//twitter.com/chrisbergr" title="@chrisbergr on Twitter" rel="me">Twitter</a></li>
							<li class="facebook"><a href="//facebook.com/chrisbergr" title="chrisbergr on Facebook" rel="me">Facebook</a></li>
							<li class="behance"><a href="//behance.net/chrisbergr" title="chrisbergr on Behance" rel="me">Behance</a></li>
							<li class="github"><a href="//github.com/chrisbergr" title="chrisbergr on GitHub" rel="me">GitHub</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php

}
add_action( 'themeberger_after_footer', 'my_theme_footer_info', 20 );



function my_theme_footer_backlink() {

	?>

	<div class="footer-backlink">
		<nav class="backlink-nav">
			<div class="left">
				<p>
					<a href="https://hockenberger.us">
						<i class="iconberger iconberger-left"></i> Back to <strong>hockenberger.us</strong>
					</a>
				</p>
			</div>
			<div class="gototop">
				<p>
					<a href="#Top" class="scrolltopFunc">
						<i class="iconberger iconberger-up"></i> Top
					</a>
				</p>
			</div>
		</nav>
	</div>

	<?php

}
add_action( 'themeberger_after_footer', 'my_theme_footer_backlink', 30 );



function my_theme_footer_navigation() {

	?>
	<!--
	<div class="footer-navigation-container">
		<nav class="footer-navigation">
			<ul>
				<li class="menu-item menu-item-note"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Notes</a></li>
				<li class="menu-item menu-item-article"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Articles</a></li>
				<li class="menu-item menu-item-photo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Photos</a></li>
				<li class="menu-item menu-item-reply"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Replies</a></li>
				<li class="menu-item menu-item-like"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Likes</a></li>
				<li class="menu-item menu-item-bookmark"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Bookmarks</a></li>
			</ul>
		</nav>
	</div>
	-->

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<div class="footer-navigation-container">
		<nav class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_id' => 'footer-menu',
				'fallback_cb' => false
			) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	<?php endif; ?>

	<?php

}
add_action( 'themeberger_after_footer', 'my_theme_footer_navigation', 10 );


function dailybooth_notice() {
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
add_action( 'themeberger_after_entry_content', 'dailybooth_notice', 100 );
