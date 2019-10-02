<?php
function my_theme_enqueue_styles() {

    $parent_style = 'themebergerbasic-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'themebergerbasic-chobz',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/**/

function my_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'UI Bottom Left', 'themeberger-basic' ),
			'id'            => 'ui-bl',
			'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'UI Search Overlay', 'themeberger-basic' ),
			'id'            => 'ui-search',
			'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'my_widgets_init' );

/**/

function get_avatar_img_url( $user_email ) {
	$url = 'https://gravatar.com/avatar/' . md5( $user_email );
	$url = add_query_arg(
		array(
			's' => 200,
			'd' => 'mm',
		),
		$url
	);
	return esc_url_raw( $url );
}

/**/

function my_theme_footer_info() {

	?>

	<div class="footer-infobox">
		<div class="wrapper">
			<div class="footer-infobox-left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<svg id="logo-footer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1546 309" style="enable-background:new 0 0 1546 309;" xml:space="preserve">
						<path class="logo-footer-crest" d="M81.7,79.5V49.1H51.3V18.6h91.3v30.4h-30.4v30.4H203V49.1h-30.4V18.6h91.3v30.4h-30.4v151.6h30.4  v-29.9h30.4v29.6l-30.7,30.7H127.7v-30.4H203v-30.5h-90.9v91.3h30.4v30.4H51.3v-30.4h30.4v-30.4H51.5l-30.7-30.6v-90.3l30.7-30.7  H81.7z M51.3,125.4v75.4h30.4v-75.3h30.4v14.4H203V110H51.3V125.4z M203,246.7h30.4v15h30.4v30.4h-91.3v-30.5H203V246.7z M263.8,110  h-14.9V79.5h14.7l30.7,30.7v29.6h-30.4L263.8,110L263.8,110z"></path>
						<g class="logo-footer-hockenberger">
							<path d="M431.5,49h17.1v90.9h-17.1V49z M439.4,86.6h52.9v16.5h-52.9V86.6z M481.2,49h17.1v90.9h-17.1V49z"></path>
							<path d="M544,136.6c-5-2.8-8.9-6.7-11.7-11.8s-4.1-10.9-4.1-17.6V81.6c0-6.7,1.4-12.5,4.1-17.6s6.6-9,11.7-11.8   c5-2.8,10.8-4.2,17.4-4.2c6.6,0,12.4,1.4,17.4,4.2c5,2.8,8.9,6.7,11.7,11.8s4.1,10.9,4.1,17.6v25.8c0,6.7-1.4,12.5-4.1,17.6   s-6.6,9-11.7,11.8c-5,2.8-10.8,4.2-17.4,4.2C554.8,140.8,549,139.4,544,136.6z M569.5,121.7c2.3-1.3,4.1-3.2,5.4-5.6   c1.3-2.4,1.9-5.2,1.9-8.4V81.1c0-3.2-0.6-6-1.9-8.4c-1.3-2.4-3.1-4.3-5.4-5.6c-2.3-1.3-5-2-8.1-2c-3.1,0-5.8,0.7-8.1,2   c-2.3,1.3-4.1,3.2-5.4,5.6c-1.3,2.4-1.9,5.2-1.9,8.4v26.6c0,3.2,0.6,6,1.9,8.4c1.3,2.4,3.1,4.3,5.4,5.6c2.3,1.3,5,2,8.1,2   C564.5,123.7,567.2,123,569.5,121.7z"></path>
							<path d="M645.1,140.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V82   c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7c4.5,2.5,8.2,6,11.2,10.7   s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2   s-4,3.2-5.2,5.8c-1.2,2.5-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7   c2-1.1,3.7-2.7,5.1-4.8s2.4-4.7,3-7.8h17.8c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7   C648.6,140.8,645.1,140.8,645.1,140.8z"></path>
							<path d="M715.5,49h17.1v90.9h-17.1V49z M725.8,104.4L762.2,49h21.6L728,126.6L725.8,104.4z M740.9,93.9l14.8-9.3   l31.9,55.3h-20.3L740.9,93.9z"></path>
							<path d="M809.4,49h17.1v90.9h-17.1V49z M815.6,49h54.7v16.5h-54.7V49z M815.6,86.5h47.8V103h-47.8V86.5z M815.6,123.4   h54.7v16.5h-54.7V123.4z"></path>
							<path d="M897.7,49h20.9l33.8,69.6l-1.5,1.6V49h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V49z"></path>
							<path d="M999.1,49h17.1v90.9h-17.1V49z M1006.6,123.4h29c3.9,0,6.9-0.9,9.1-2.8c2.1-1.9,3.2-4.6,3.2-8v-0.2   c0-2.3-0.5-4.3-1.4-5.9c-1-1.6-2.4-2.9-4.2-3.7c-1.9-0.9-4.1-1.3-6.7-1.3h-29V85h29c3.5,0,6.3-0.9,8.2-2.7c1.9-1.8,2.9-4.3,2.9-7.6   c0-2.9-1-5.2-2.9-6.8s-4.7-2.4-8.2-2.4h-29V49h29.6c5.9,0,10.9,1,15.1,2.9c4.2,1.9,7.3,4.8,9.5,8.4c2.2,3.7,3.3,8.1,3.3,13.3   c0,3.5-0.7,6.7-2.1,9.4c-1.4,2.7-3.4,5-6.1,6.7c-2.7,1.8-5.9,2.9-9.6,3.6c4,0.5,7.4,1.8,10.3,3.7c2.9,1.9,5,4.4,6.5,7.4   c1.5,3,2.2,6.6,2.2,10.6v0.2c0,5.2-1.1,9.7-3.3,13.4c-2.2,3.7-5.4,6.5-9.6,8.5s-9.2,2.9-15.1,2.9h-30.6V123.4z"></path>
							<path d="M1093.5,49h17.1v90.9h-17.1V49z M1099.6,49h54.7v16.5h-54.7V49z M1099.6,86.5h47.8V103h-47.8V86.5z    M1099.6,123.4h54.7v16.5h-54.7V123.4z"></path>
							<path d="M1184.3,48.9h17.1v90.9h-17.1V48.9z M1191.1,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3h-31.6V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1210.2,100.5l18.3-2.9l24.5,42.3h-20.8L1210.2,100.5z"></path>
							<path d="M1339,89.1v17.8c0,6.8-1.4,12.7-4.1,17.8c-2.7,5.1-6.6,9.1-11.6,11.9s-10.8,4.2-17.4,4.2   c-6.6,0-12.5-1.3-17.5-4c-5.1-2.6-9-6.4-11.8-11.2c-2.8-4.8-4.2-10.4-4.2-16.8V82c0-6.8,1.4-12.7,4.1-17.8   c2.7-5.1,6.6-9.1,11.6-11.9s10.8-4.2,17.4-4.2c5.4,0,10.4,1.1,15,3.3c4.6,2.2,8.4,5.4,11.5,9.5c3.1,4.1,5.1,8.8,6.2,14.2h-18.5   c-0.6-1.9-1.7-3.6-3.1-5c-1.4-1.4-3.1-2.5-5.1-3.2c-1.9-0.7-3.9-1.1-6-1.1c-3,0-5.7,0.7-8,2c-2.3,1.3-4.1,3.2-5.4,5.7   c-1.3,2.5-1.9,5.3-1.9,8.5v26.8c0,2.8,0.6,5.3,1.9,7.5c1.3,2.2,3.1,3.8,5.5,5c2.4,1.2,5.1,1.8,8.3,1.8c3.1,0,5.8-0.6,8.1-1.9   c2.3-1.3,4.1-3.1,5.3-5.5c1.3-2.4,1.9-5.3,1.9-8.6v-1.5h-13.8V89.1H1339z"></path>
							<path d="M1368.9,49h17.1v90.9h-17.1V49z M1375.1,49h54.7v16.5h-54.7V49z M1375.1,86.5h47.8V103h-47.8V86.5z    M1375.1,123.4h54.7v16.5h-54.7V123.4z"></path>
							<path d="M1457.2,48.9h17.1v90.9h-17.1V48.9z M1464,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H1464V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1483.1,100.5l18.3-2.9l24.5,42.3h-20.8L1483.1,100.5z"></path>
						</g>
						<g class="logo-footer-christian">
							<path d="M450.1,262.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V204    c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7s8.2,6,11.2,10.7    s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2    s-4,3.2-5.2,5.8s-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7s3.7-2.7,5.1-4.8    s2.4-4.7,3-7.8H493c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7C453.5,262.8,450.1,262.8,450.1,262.8z    "></path>
							<path d="M517,171h17.1v90.9H517V171z M524.9,208.5h52.9V225h-52.9V208.5z M566.7,171h17.1v90.9h-17.1V171z"></path>
							<path d="M612.2,170.9h17.1v90.9h-17.1V170.9z M619,208.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8    c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H619v-16.5h33    c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3s-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5    s-8.2,3.4-13.2,3.4h-33V208.8z M638.1,222.5l18.3-2.9l24.5,42.3h-20.8L638.1,222.5z"></path>
							<path d="M720.4,261.9h-17.8V171h17.8V261.9z"></path>
							<path d="M769.6,262.8c0,0-2.1-0.4-6.2-1.3c-4.1-0.9-8-2.2-11.7-3.8c-3.6-1.7-6.9-3.7-9.8-6.1l7.9-14.1    c3.5,2.9,7.5,5.1,12.1,6.7c4.6,1.6,9.3,2.3,14.1,2.3c5.6,0,9.9-0.9,13-2.8c3.1-1.9,4.6-4.6,4.6-8v-0.1c0-2.4-0.7-4.3-2.1-5.8    s-3.2-2.5-5.4-3.1c-2.2-0.7-5-1.3-8.5-1.8c-0.1,0-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.3-0.1l-1.4-0.2c-6.1-1-11.1-2.2-15.1-3.6    s-7.4-4-10.2-7.6c-2.8-3.6-4.2-8.7-4.2-15.3v-0.1c0-5.9,1.3-10.9,3.9-15.1s6.4-7.3,11.4-9.5s11-3.3,18.1-3.3c3.3,0,6.6,0.4,10,1.1    c3.4,0.8,6.7,1.8,10,3.3s6.3,3.1,9.3,5.1l-7.3,14.5c-3.5-2.4-7.2-4.3-11-5.6s-7.5-2-11-2c-5.3,0-9.3,0.9-12.2,2.6    s-4.3,4.2-4.3,7.3v0.1c0,2.6,0.8,4.7,2.3,6.2s3.4,2.6,5.6,3.3c2.2,0.7,5.3,1.5,9.3,2.3c0.2,0,0.3,0.1,0.5,0.1    c0.2,0,0.3,0.1,0.5,0.1c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.5,0.1,0.7,0.2c5.8,1.1,10.6,2.5,14.4,4.1c3.9,1.6,7.1,4.2,9.7,7.8    c2.6,3.6,3.9,8.4,3.9,14.6v0.1c0,5.8-1.4,10.8-4.1,14.9c-2.7,4.1-6.7,7.3-11.8,9.4s-11.4,3.3-18.7,3.3    C771.7,262.8,769.6,262.8,769.6,262.8z"></path>
							<path d="M822.1,171h66.6v16.5h-66.6V171z M846.9,178.4H864v83.4h-17.1V178.4z"></path>
							<path d="M923.6,261.9h-17.8V171h17.8V261.9z"></path>
							<path d="M976.7,171h10.9l34.8,90.9h-18.4l-21.8-62.1l-21.8,62.1h-18.4L976.7,171z M958.6,230.8h47.8v16.5h-47.8V230.8    z"></path>
							<path d="M1041.9,171h20.9l33.8,69.6l-1.5,1.6V171h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V171z"></path>
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
							<li class="twitter"><a href="https://twitter.com/chrisbergr" title="@chrisbergr on Twitter" rel="me">Twitter</a></li>
							<li class="instagram"><a href="https://instagram.com/chrisbergr" title="chrisbergr on Instagram" rel="me">Instagram</a></li>
							<li class="facebook"><a href="https://facebook.com/chrisbergr" title="chrisbergr on Facebook" rel="me">Facebook</a></li>
							<li class="pinterest"><a href="https://pinterest.com/chrisbergr" title="chrisbergr on Pinterest" rel="me">Pinterest</a></li>
							<li class="dribbble"><a href="https://dribbble.com/chrisbergr" title="chrisbergr on Dribbble" rel="me">Dribbble</a></li>
							<li class="behance"><a href="https://behance.net/chrisbergr" title="chrisbergr on Behance" rel="me">Behance</a></li>
							<li class="linkedin"><a href="https://www.linkedin.com/in/christian-hockenberger/" title="Christian Hockenberger on LinkedIn" rel="me">LinkedIn</a></li>
							<li class="github"><a href="https://github.com/chrisbergr" title="chrisbergr on GitHub" rel="me">GitHub</a></li>
							<li class="youtube"><a href="https://youtube.me/princeofdune" title="Christian Hockenberger on YouTube" rel="me">YouTube</a></li>
							<li class="flickr"><a href="https://flickr.com/chrisbergr" title="chrisbergr on Flickr" rel="me">Flickr</a></li>
							<li class="foursquare"><a href="https://foursquare.com/chrisbergr" title="chrisbergr on Foursquare" rel="me">Foursquare</a></li>
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

function chobz_logo() {
	?>
	<div class="site-logo">
		<a href="<?php echo get_home_url(); ?>" class="custom-logo-link" rel="home">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="LOGO" x="0px" y="0px" viewBox="0 0 1546 309" style="enable-background:new 0 0 1546 309;" xml:space="preserve" class="custom-logo">
				<path id="Monogram" class="st0" d="M81.7,79.5V49.1H51.3V18.6h91.3v30.4h-30.4v30.4H203V49.1h-30.4V18.6h91.3v30.4h-30.4v151.6h30.4  v-29.9h30.4v29.6l-30.7,30.7H127.7v-30.4H203v-30.5h-90.9v91.3h30.4v30.4H51.3v-30.4h30.4v-30.4H51.5l-30.7-30.6v-90.3l30.7-30.7  H81.7z M51.3,125.4v75.4h30.4v-75.3h30.4v14.4H203V110H51.3V125.4z M203,246.7h30.4v15h30.4v30.4h-91.3v-30.5H203V246.7z M263.8,110  h-14.9V79.5h14.7l30.7,30.7v29.6h-30.4L263.8,110L263.8,110z"></path>
				<g id="Hockenberger">
					<path class="st1" d="M431.5,49h17.1v90.9h-17.1V49z M439.4,86.6h52.9v16.5h-52.9V86.6z M481.2,49h17.1v90.9h-17.1V49z"></path>
					<path class="st1" d="M544,136.6c-5-2.8-8.9-6.7-11.7-11.8s-4.1-10.9-4.1-17.6V81.6c0-6.7,1.4-12.5,4.1-17.6s6.6-9,11.7-11.8   c5-2.8,10.8-4.2,17.4-4.2c6.6,0,12.4,1.4,17.4,4.2c5,2.8,8.9,6.7,11.7,11.8s4.1,10.9,4.1,17.6v25.8c0,6.7-1.4,12.5-4.1,17.6   s-6.6,9-11.7,11.8c-5,2.8-10.8,4.2-17.4,4.2C554.8,140.8,549,139.4,544,136.6z M569.5,121.7c2.3-1.3,4.1-3.2,5.4-5.6   c1.3-2.4,1.9-5.2,1.9-8.4V81.1c0-3.2-0.6-6-1.9-8.4c-1.3-2.4-3.1-4.3-5.4-5.6c-2.3-1.3-5-2-8.1-2c-3.1,0-5.8,0.7-8.1,2   c-2.3,1.3-4.1,3.2-5.4,5.6c-1.3,2.4-1.9,5.2-1.9,8.4v26.6c0,3.2,0.6,6,1.9,8.4c1.3,2.4,3.1,4.3,5.4,5.6c2.3,1.3,5,2,8.1,2   C564.5,123.7,567.2,123,569.5,121.7z"></path>
					<path class="st1" d="M645.1,140.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V82   c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7c4.5,2.5,8.2,6,11.2,10.7   s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2   s-4,3.2-5.2,5.8c-1.2,2.5-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7   c2-1.1,3.7-2.7,5.1-4.8s2.4-4.7,3-7.8h17.8c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7   C648.6,140.8,645.1,140.8,645.1,140.8z"></path>
					<path class="st1" d="M715.5,49h17.1v90.9h-17.1V49z M725.8,104.4L762.2,49h21.6L728,126.6L725.8,104.4z M740.9,93.9l14.8-9.3   l31.9,55.3h-20.3L740.9,93.9z"></path>
					<path class="st1" d="M809.4,49h17.1v90.9h-17.1V49z M815.6,49h54.7v16.5h-54.7V49z M815.6,86.5h47.8V103h-47.8V86.5z M815.6,123.4   h54.7v16.5h-54.7V123.4z"></path>
					<path class="st1" d="M897.7,49h20.9l33.8,69.6l-1.5,1.6V49h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V49z"></path>
					<path class="st1" d="M999.1,49h17.1v90.9h-17.1V49z M1006.6,123.4h29c3.9,0,6.9-0.9,9.1-2.8c2.1-1.9,3.2-4.6,3.2-8v-0.2   c0-2.3-0.5-4.3-1.4-5.9c-1-1.6-2.4-2.9-4.2-3.7c-1.9-0.9-4.1-1.3-6.7-1.3h-29V85h29c3.5,0,6.3-0.9,8.2-2.7c1.9-1.8,2.9-4.3,2.9-7.6   c0-2.9-1-5.2-2.9-6.8s-4.7-2.4-8.2-2.4h-29V49h29.6c5.9,0,10.9,1,15.1,2.9c4.2,1.9,7.3,4.8,9.5,8.4c2.2,3.7,3.3,8.1,3.3,13.3   c0,3.5-0.7,6.7-2.1,9.4c-1.4,2.7-3.4,5-6.1,6.7c-2.7,1.8-5.9,2.9-9.6,3.6c4,0.5,7.4,1.8,10.3,3.7c2.9,1.9,5,4.4,6.5,7.4   c1.5,3,2.2,6.6,2.2,10.6v0.2c0,5.2-1.1,9.7-3.3,13.4c-2.2,3.7-5.4,6.5-9.6,8.5s-9.2,2.9-15.1,2.9h-30.6V123.4z"></path>
					<path class="st1" d="M1093.5,49h17.1v90.9h-17.1V49z M1099.6,49h54.7v16.5h-54.7V49z M1099.6,86.5h47.8V103h-47.8V86.5z    M1099.6,123.4h54.7v16.5h-54.7V123.4z"></path>
					<path class="st1" d="M1184.3,48.9h17.1v90.9h-17.1V48.9z M1191.1,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3h-31.6V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1210.2,100.5l18.3-2.9l24.5,42.3h-20.8L1210.2,100.5z"></path>
					<path class="st1" d="M1339,89.1v17.8c0,6.8-1.4,12.7-4.1,17.8c-2.7,5.1-6.6,9.1-11.6,11.9s-10.8,4.2-17.4,4.2   c-6.6,0-12.5-1.3-17.5-4c-5.1-2.6-9-6.4-11.8-11.2c-2.8-4.8-4.2-10.4-4.2-16.8V82c0-6.8,1.4-12.7,4.1-17.8   c2.7-5.1,6.6-9.1,11.6-11.9s10.8-4.2,17.4-4.2c5.4,0,10.4,1.1,15,3.3c4.6,2.2,8.4,5.4,11.5,9.5c3.1,4.1,5.1,8.8,6.2,14.2h-18.5   c-0.6-1.9-1.7-3.6-3.1-5c-1.4-1.4-3.1-2.5-5.1-3.2c-1.9-0.7-3.9-1.1-6-1.1c-3,0-5.7,0.7-8,2c-2.3,1.3-4.1,3.2-5.4,5.7   c-1.3,2.5-1.9,5.3-1.9,8.5v26.8c0,2.8,0.6,5.3,1.9,7.5c1.3,2.2,3.1,3.8,5.5,5c2.4,1.2,5.1,1.8,8.3,1.8c3.1,0,5.8-0.6,8.1-1.9   c2.3-1.3,4.1-3.1,5.3-5.5c1.3-2.4,1.9-5.3,1.9-8.6v-1.5h-13.8V89.1H1339z"></path>
					<path class="st1" d="M1368.9,49h17.1v90.9h-17.1V49z M1375.1,49h54.7v16.5h-54.7V49z M1375.1,86.5h47.8V103h-47.8V86.5z    M1375.1,123.4h54.7v16.5h-54.7V123.4z"></path>
					<path class="st1" d="M1457.2,48.9h17.1v90.9h-17.1V48.9z M1464,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H1464V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1483.1,100.5l18.3-2.9l24.5,42.3h-20.8L1483.1,100.5z"></path>
				</g>
				<g id="Christian">
					<path class="st2" d="M450.1,262.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V204    c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7s8.2,6,11.2,10.7    s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2    s-4,3.2-5.2,5.8s-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7s3.7-2.7,5.1-4.8    s2.4-4.7,3-7.8H493c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7C453.5,262.8,450.1,262.8,450.1,262.8z    "></path>
					<path class="st2" d="M517,171h17.1v90.9H517V171z M524.9,208.5h52.9V225h-52.9V208.5z M566.7,171h17.1v90.9h-17.1V171z"></path>
					<path class="st2" d="M612.2,170.9h17.1v90.9h-17.1V170.9z M619,208.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8    c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H619v-16.5h33    c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3s-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5    s-8.2,3.4-13.2,3.4h-33V208.8z M638.1,222.5l18.3-2.9l24.5,42.3h-20.8L638.1,222.5z"></path>
					<path class="st2" d="M720.4,261.9h-17.8V171h17.8V261.9z"></path>
					<path class="st2" d="M769.6,262.8c0,0-2.1-0.4-6.2-1.3c-4.1-0.9-8-2.2-11.7-3.8c-3.6-1.7-6.9-3.7-9.8-6.1l7.9-14.1    c3.5,2.9,7.5,5.1,12.1,6.7c4.6,1.6,9.3,2.3,14.1,2.3c5.6,0,9.9-0.9,13-2.8c3.1-1.9,4.6-4.6,4.6-8v-0.1c0-2.4-0.7-4.3-2.1-5.8    s-3.2-2.5-5.4-3.1c-2.2-0.7-5-1.3-8.5-1.8c-0.1,0-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.3-0.1l-1.4-0.2c-6.1-1-11.1-2.2-15.1-3.6    s-7.4-4-10.2-7.6c-2.8-3.6-4.2-8.7-4.2-15.3v-0.1c0-5.9,1.3-10.9,3.9-15.1s6.4-7.3,11.4-9.5s11-3.3,18.1-3.3c3.3,0,6.6,0.4,10,1.1    c3.4,0.8,6.7,1.8,10,3.3s6.3,3.1,9.3,5.1l-7.3,14.5c-3.5-2.4-7.2-4.3-11-5.6s-7.5-2-11-2c-5.3,0-9.3,0.9-12.2,2.6    s-4.3,4.2-4.3,7.3v0.1c0,2.6,0.8,4.7,2.3,6.2s3.4,2.6,5.6,3.3c2.2,0.7,5.3,1.5,9.3,2.3c0.2,0,0.3,0.1,0.5,0.1    c0.2,0,0.3,0.1,0.5,0.1c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.5,0.1,0.7,0.2c5.8,1.1,10.6,2.5,14.4,4.1c3.9,1.6,7.1,4.2,9.7,7.8    c2.6,3.6,3.9,8.4,3.9,14.6v0.1c0,5.8-1.4,10.8-4.1,14.9c-2.7,4.1-6.7,7.3-11.8,9.4s-11.4,3.3-18.7,3.3    C771.7,262.8,769.6,262.8,769.6,262.8z"></path>
					<path class="st2" d="M822.1,171h66.6v16.5h-66.6V171z M846.9,178.4H864v83.4h-17.1V178.4z"></path>
					<path class="st2" d="M923.6,261.9h-17.8V171h17.8V261.9z"></path>
					<path class="st2" d="M976.7,171h10.9l34.8,90.9h-18.4l-21.8-62.1l-21.8,62.1h-18.4L976.7,171z M958.6,230.8h47.8v16.5h-47.8V230.8    z"></path>
					<path class="st2" d="M1041.9,171h20.9l33.8,69.6l-1.5,1.6V171h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V171z"></path>
				</g>
			</svg>
		</a>
	</div>
	<?php
}
add_action( 'themeberger_site_branding', 'chobz_logo', 10 );

/**/

function my_default_post_title( $old_title ){
	if ( ! $old_title ) {
		/*
		if ( is_single() ){
			return single_post_title( '', false );
		}
		*/
		return __( 'A post by Christian Hockenberger', 'themeberger-basic' );
	}
	return $old_title;
}
add_filter( 'the_title', 'my_default_post_title' );

function my_default_title( $old_title ){
	if ( ! $old_title || ! $old_title['title'] ) {
		//$old_title['title'] = __( 'A post by Christian Hockenberger', 'themeberger-basic' );
		$old_title['title'] = single_post_title( '', false );
	}
	return $old_title;
}
add_filter( 'document_title_parts', 'my_default_title' );

function my_default_seo_title( $old_title ){
	$title_parts = explode( '-', $old_title );
	if ( '' === $title_parts[0] ) {
		//$title_parts[0] = __( 'A post by Christian Hockenberger', 'themeberger-basic' );
		$title_parts[0] = single_post_title( '', false );
		$old_title = implode( ' -', $title_parts );
	}
	return $old_title;
}
add_filter( 'wpseo_title', 'my_default_seo_title', 10, 1 );

/**/

function exclude_category( $query ) {
    if ( $query->is_feed ) {
        $query->set('cat', '-206, -208, -214');
    }
	return $query;
}
add_filter( 'pre_get_posts', 'exclude_category' );

/**/

if ( function_exists( 'yoast_breadcrumb' ) ) {
    function chobz_use_yoast_breadcrumb() {
        if ( ! is_front_page() ) :
            yoast_breadcrumb( '<section class="page-breadcrumb"><p class="breadcrumb">', '</p></section>' );
        endif;
    }
    add_action( 'chobz_breadcrumb', 'chobz_use_yoast_breadcrumb', 95 );
}


/**/

function chobz_ui() {
	?>

	<header class="chobz-ui">
		<section class="chobz-ui--left">
			<div class="chobz-ui--top">
				<div class="chobz-ui--hamburger">TL</div>
			</div>
			<div class="chobz-ui--middle">
				<div class="chobz-ui--logo">

					<a href="<?php echo get_home_url(); ?>" rel="home">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="LOGO" x="0px" y="0px" viewBox="0 0 1546 309" style="enable-background:new 0 0 1546 309;" xml:space="preserve" class="logo">
							<path class="logo-monogram" d="M81.7,79.5V49.1H51.3V18.6h91.3v30.4h-30.4v30.4H203V49.1h-30.4V18.6h91.3v30.4h-30.4v151.6h30.4  v-29.9h30.4v29.6l-30.7,30.7H127.7v-30.4H203v-30.5h-90.9v91.3h30.4v30.4H51.3v-30.4h30.4v-30.4H51.5l-30.7-30.6v-90.3l30.7-30.7  H81.7z M51.3,125.4v75.4h30.4v-75.3h30.4v14.4H203V110H51.3V125.4z M203,246.7h30.4v15h30.4v30.4h-91.3v-30.5H203V246.7z M263.8,110  h-14.9V79.5h14.7l30.7,30.7v29.6h-30.4L263.8,110L263.8,110z"></path>
							<g class="logo-hockenberger">
								<path d="M431.5,49h17.1v90.9h-17.1V49z M439.4,86.6h52.9v16.5h-52.9V86.6z M481.2,49h17.1v90.9h-17.1V49z"></path>
								<path d="M544,136.6c-5-2.8-8.9-6.7-11.7-11.8s-4.1-10.9-4.1-17.6V81.6c0-6.7,1.4-12.5,4.1-17.6s6.6-9,11.7-11.8   c5-2.8,10.8-4.2,17.4-4.2c6.6,0,12.4,1.4,17.4,4.2c5,2.8,8.9,6.7,11.7,11.8s4.1,10.9,4.1,17.6v25.8c0,6.7-1.4,12.5-4.1,17.6   s-6.6,9-11.7,11.8c-5,2.8-10.8,4.2-17.4,4.2C554.8,140.8,549,139.4,544,136.6z M569.5,121.7c2.3-1.3,4.1-3.2,5.4-5.6   c1.3-2.4,1.9-5.2,1.9-8.4V81.1c0-3.2-0.6-6-1.9-8.4c-1.3-2.4-3.1-4.3-5.4-5.6c-2.3-1.3-5-2-8.1-2c-3.1,0-5.8,0.7-8.1,2   c-2.3,1.3-4.1,3.2-5.4,5.6c-1.3,2.4-1.9,5.2-1.9,8.4v26.6c0,3.2,0.6,6,1.9,8.4c1.3,2.4,3.1,4.3,5.4,5.6c2.3,1.3,5,2,8.1,2   C564.5,123.7,567.2,123,569.5,121.7z"></path>
								<path d="M645.1,140.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V82   c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7c4.5,2.5,8.2,6,11.2,10.7   s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2   s-4,3.2-5.2,5.8c-1.2,2.5-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7   c2-1.1,3.7-2.7,5.1-4.8s2.4-4.7,3-7.8h17.8c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7   C648.6,140.8,645.1,140.8,645.1,140.8z"></path>
								<path d="M715.5,49h17.1v90.9h-17.1V49z M725.8,104.4L762.2,49h21.6L728,126.6L725.8,104.4z M740.9,93.9l14.8-9.3   l31.9,55.3h-20.3L740.9,93.9z"></path>
								<path d="M809.4,49h17.1v90.9h-17.1V49z M815.6,49h54.7v16.5h-54.7V49z M815.6,86.5h47.8V103h-47.8V86.5z M815.6,123.4   h54.7v16.5h-54.7V123.4z"></path>
								<path d="M897.7,49h20.9l33.8,69.6l-1.5,1.6V49h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V49z"></path>
								<path d="M999.1,49h17.1v90.9h-17.1V49z M1006.6,123.4h29c3.9,0,6.9-0.9,9.1-2.8c2.1-1.9,3.2-4.6,3.2-8v-0.2   c0-2.3-0.5-4.3-1.4-5.9c-1-1.6-2.4-2.9-4.2-3.7c-1.9-0.9-4.1-1.3-6.7-1.3h-29V85h29c3.5,0,6.3-0.9,8.2-2.7c1.9-1.8,2.9-4.3,2.9-7.6   c0-2.9-1-5.2-2.9-6.8s-4.7-2.4-8.2-2.4h-29V49h29.6c5.9,0,10.9,1,15.1,2.9c4.2,1.9,7.3,4.8,9.5,8.4c2.2,3.7,3.3,8.1,3.3,13.3   c0,3.5-0.7,6.7-2.1,9.4c-1.4,2.7-3.4,5-6.1,6.7c-2.7,1.8-5.9,2.9-9.6,3.6c4,0.5,7.4,1.8,10.3,3.7c2.9,1.9,5,4.4,6.5,7.4   c1.5,3,2.2,6.6,2.2,10.6v0.2c0,5.2-1.1,9.7-3.3,13.4c-2.2,3.7-5.4,6.5-9.6,8.5s-9.2,2.9-15.1,2.9h-30.6V123.4z"></path>
								<path d="M1093.5,49h17.1v90.9h-17.1V49z M1099.6,49h54.7v16.5h-54.7V49z M1099.6,86.5h47.8V103h-47.8V86.5z    M1099.6,123.4h54.7v16.5h-54.7V123.4z"></path>
								<path d="M1184.3,48.9h17.1v90.9h-17.1V48.9z M1191.1,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3h-31.6V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1210.2,100.5l18.3-2.9l24.5,42.3h-20.8L1210.2,100.5z"></path>
								<path d="M1339,89.1v17.8c0,6.8-1.4,12.7-4.1,17.8c-2.7,5.1-6.6,9.1-11.6,11.9s-10.8,4.2-17.4,4.2   c-6.6,0-12.5-1.3-17.5-4c-5.1-2.6-9-6.4-11.8-11.2c-2.8-4.8-4.2-10.4-4.2-16.8V82c0-6.8,1.4-12.7,4.1-17.8   c2.7-5.1,6.6-9.1,11.6-11.9s10.8-4.2,17.4-4.2c5.4,0,10.4,1.1,15,3.3c4.6,2.2,8.4,5.4,11.5,9.5c3.1,4.1,5.1,8.8,6.2,14.2h-18.5   c-0.6-1.9-1.7-3.6-3.1-5c-1.4-1.4-3.1-2.5-5.1-3.2c-1.9-0.7-3.9-1.1-6-1.1c-3,0-5.7,0.7-8,2c-2.3,1.3-4.1,3.2-5.4,5.7   c-1.3,2.5-1.9,5.3-1.9,8.5v26.8c0,2.8,0.6,5.3,1.9,7.5c1.3,2.2,3.1,3.8,5.5,5c2.4,1.2,5.1,1.8,8.3,1.8c3.1,0,5.8-0.6,8.1-1.9   c2.3-1.3,4.1-3.1,5.3-5.5c1.3-2.4,1.9-5.3,1.9-8.6v-1.5h-13.8V89.1H1339z"></path>
								<path d="M1368.9,49h17.1v90.9h-17.1V49z M1375.1,49h54.7v16.5h-54.7V49z M1375.1,86.5h47.8V103h-47.8V86.5z    M1375.1,123.4h54.7v16.5h-54.7V123.4z"></path>
								<path d="M1457.2,48.9h17.1v90.9h-17.1V48.9z M1464,86.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8   c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H1464V48.9h33   c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3c0,5.4-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5   s-8.2,3.4-13.2,3.4h-33V86.8z M1483.1,100.5l18.3-2.9l24.5,42.3h-20.8L1483.1,100.5z"></path>
							</g>
							<g class="logo-christian">
								<path d="M450.1,262.8c0,0-2.5-1.3-7.4-4c-4.9-2.6-8.7-6.5-11.3-11.6c-2.6-5.1-3.9-11.2-3.9-18.3V204    c0-7.2,1.3-13.3,3.9-18.3c2.6-5.1,6.3-8.9,11.3-11.6c4.9-2.7,10.8-4,17.8-4c5.7,0,10.8,1.2,15.3,3.7s8.2,6,11.2,10.7    s5,10.3,6.1,17h-17.8c-0.7-3-1.7-5.6-3.1-7.7c-1.4-2.1-3.1-3.8-5.1-4.9c-2-1.1-4.2-1.7-6.7-1.7c-3.2,0-5.9,0.7-8.2,2    s-4,3.2-5.2,5.8s-1.8,5.6-1.8,9.1v24.9c0,3.5,0.6,6.6,1.8,9.1s2.9,4.4,5.2,5.7s5,2,8.2,2c2.5,0,4.8-0.6,6.8-1.7s3.7-2.7,5.1-4.8    s2.4-4.7,3-7.8H493c-1.2,6.6-3.2,12.3-6.2,17s-6.6,8.3-11.1,10.7c-4.5,2.5-9.6,3.7-15.3,3.7C453.5,262.8,450.1,262.8,450.1,262.8z    "></path>
								<path d="M517,171h17.1v90.9H517V171z M524.9,208.5h52.9V225h-52.9V208.5z M566.7,171h17.1v90.9h-17.1V171z"></path>
								<path d="M612.2,170.9h17.1v90.9h-17.1V170.9z M619,208.8h31.6c1.8,0,3.3-0.4,4.6-1.3c1.3-0.9,2.4-2.1,3.1-3.8    c0.7-1.6,1.1-3.5,1.2-5.6c0-2.1-0.4-4-1.1-5.6c-0.7-1.6-1.8-2.9-3.1-3.8c-1.3-0.9-2.9-1.3-4.7-1.3H619v-16.5h33    c5,0,9.4,1.1,13.2,3.4c3.8,2.3,6.7,5.4,8.8,9.5c2.1,4.1,3.1,8.9,3.1,14.3s-1,10.2-3.1,14.3c-2.1,4.1-5,7.3-8.8,9.5    s-8.2,3.4-13.2,3.4h-33V208.8z M638.1,222.5l18.3-2.9l24.5,42.3h-20.8L638.1,222.5z"></path>
								<path d="M720.4,261.9h-17.8V171h17.8V261.9z"></path>
								<path d="M769.6,262.8c0,0-2.1-0.4-6.2-1.3c-4.1-0.9-8-2.2-11.7-3.8c-3.6-1.7-6.9-3.7-9.8-6.1l7.9-14.1    c3.5,2.9,7.5,5.1,12.1,6.7c4.6,1.6,9.3,2.3,14.1,2.3c5.6,0,9.9-0.9,13-2.8c3.1-1.9,4.6-4.6,4.6-8v-0.1c0-2.4-0.7-4.3-2.1-5.8    s-3.2-2.5-5.4-3.1c-2.2-0.7-5-1.3-8.5-1.8c-0.1,0-0.2-0.1-0.3-0.1c-0.1,0-0.2,0-0.3-0.1l-1.4-0.2c-6.1-1-11.1-2.2-15.1-3.6    s-7.4-4-10.2-7.6c-2.8-3.6-4.2-8.7-4.2-15.3v-0.1c0-5.9,1.3-10.9,3.9-15.1s6.4-7.3,11.4-9.5s11-3.3,18.1-3.3c3.3,0,6.6,0.4,10,1.1    c3.4,0.8,6.7,1.8,10,3.3s6.3,3.1,9.3,5.1l-7.3,14.5c-3.5-2.4-7.2-4.3-11-5.6s-7.5-2-11-2c-5.3,0-9.3,0.9-12.2,2.6    s-4.3,4.2-4.3,7.3v0.1c0,2.6,0.8,4.7,2.3,6.2s3.4,2.6,5.6,3.3c2.2,0.7,5.3,1.5,9.3,2.3c0.2,0,0.3,0.1,0.5,0.1    c0.2,0,0.3,0.1,0.5,0.1c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.5,0.1,0.7,0.2c5.8,1.1,10.6,2.5,14.4,4.1c3.9,1.6,7.1,4.2,9.7,7.8    c2.6,3.6,3.9,8.4,3.9,14.6v0.1c0,5.8-1.4,10.8-4.1,14.9c-2.7,4.1-6.7,7.3-11.8,9.4s-11.4,3.3-18.7,3.3    C771.7,262.8,769.6,262.8,769.6,262.8z"></path>
								<path d="M822.1,171h66.6v16.5h-66.6V171z M846.9,178.4H864v83.4h-17.1V178.4z"></path>
								<path d="M923.6,261.9h-17.8V171h17.8V261.9z"></path>
								<path d="M976.7,171h10.9l34.8,90.9h-18.4l-21.8-62.1l-21.8,62.1h-18.4L976.7,171z M958.6,230.8h47.8v16.5h-47.8V230.8    z"></path>
								<path d="M1041.9,171h20.9l33.8,69.6l-1.5,1.6V171h16.4v90.8h-21.1l-33.7-68.6l1.5-1.6v70.2h-16.4V171z"></path>
							</g>
						</svg>
					</a>

				</div>
			</div>
			<div class="chobz-ui--bottom">
				<div class="chobz-ui--lang">
					<?php dynamic_sidebar( 'ui-bl' ); ?>
				</div>
			</div>
		</section><!-- .chobz-ui-left -->
		<section class="chobz-ui--right">
			<div class="chobz-ui--top">
				<div class="chobz-ui--search">
					<a href="#" onclick="javascript:jQuery('body').toggleClass('display-search')">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="search-icon">
							<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
						</svg>
						<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="search-close">
							<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" class=""></path>
						</svg>
					</a>
				</div>
			</div>
			<div class="chobz-ui--middle">
				<div class="chobz-ui--shortmenu">

					<?php if ( function_exists( 'wp_nav_menu' ) && has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="shortmenu" role="navigation">
						<?php
						wp_nav_menu(
							array(
								'menu_class'     => 'ui-primary-menu',
								'theme_location' => 'primary',
								'menu_id'        => 'primary',
								'container'      => false,
								'fallback_cb'    => false,
							)
						);
						?>
					</nav>
					<?php endif; ?>

				</div>
			</div>
			<div class="chobz-ui--bottom">
				<div class="chobz-ui--social">BR</div>
			</div>
		</section><!-- .chobz-ui-right -->
		<aside class="chobz-ui--searchoverlay">
			<div class="chobz-ui-searchoverlay--inner">
				<?php dynamic_sidebar( 'ui-search' ); ?>
			</div>
		</aside><!-- .chobz-ui-searchoverlay -->
	</header>

	<?php
}
add_action( 'themeberger_before_header', 'chobz_ui', 10 );

/**/


if ( class_exists( 'PLL_Switcher' ) ) {

	add_action( 'widgets_init', function(){
		register_widget( 'PLL_Widget_Languages__Explorer' );
	});
	/**
	 * The language switcher widget
	 *
	 * @since 0.1
	 */
	class PLL_Widget_Languages__Explorer extends WP_Widget {

		/**
		 * Constructor
		 *
		 * @since 0.1
		 */
		public function __construct() {
			parent::__construct(
				'polylangexplorer',
				__( 'Language Switcher Explorer', 'polylangexplorer' ),
				array(
					'description'                 => __( 'Displays a language switcher', 'polylangexplorer' ),
					'customize_selective_refresh' => true,
				)
			);
		}

		/**
		 * Displays the widget
		 *
		 * @since 0.1
		 *
		 * @param array $args     Display arguments including before_title, after_title, before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget
		 */
		public function widget( $args, $instance ) {
			// Sets a unique id for dropdown
			$instance['dropdown'] = empty( $instance['dropdown'] ) ? 0 : $args['widget_id'];

			if ( $list = pll_the_languages( array_merge( $instance, array( 'echo' => 0, 'display_names_as' => 'slug', 'raw' => 1 ) ) ) ) {
				$title = empty( $instance['title'] ) ? '' : $instance['title'];
				/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
				$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

				echo $args['before_widget'];
				if ( $title ) {
					echo $args['before_title'] . $title . $args['after_title'];
				}
				if ( $instance['dropdown'] ) {
					echo '<label class="screen-reader-text" for="' . esc_attr( 'lang_choice_' . $instance['dropdown'] ) . '">' . esc_html__( 'Choose a language', 'polylangexplorer' ) . '</label>';
					echo $list;
				} else {
					//$list = preg_replace( '/\s+/', '', $list );
					/*
					$list = explode( '</li>',  $list );
					foreach ( $list as &$item ) {
						$item = trim( $item );
					}
					$list = array_filter( $list, function($value) { return $value !== ''; } );*/
					//print_r('CHRIS');
					//print_r($list);

					foreach ( $list as &$item ) {
						echo '<a href="' . $item['url'] . '">' . strtoupper( $item['slug'] ) . '</a>';
					}

					//die();
					//echo "<ul>\n" . $list . "</ul>\n";
				}
				echo $args['after_widget'];
			}
		}

		/**
		 * Updates the widget options
		 *
		 * @since 0.4
		 *
		 * @param array $new_instance New settings for this instance as input by the user via form()
		 * @param array $old_instance Old settings for this instance
		 * @return array Settings to save or bool false to cancel saving
		 */
		public function update( $new_instance, $old_instance ) {
			$instance['title'] = strip_tags( $new_instance['title'] );
			foreach ( array_keys( PLL_Switcher::get_switcher_options( 'widget' ) ) as $key ) {
				$instance[ $key ] = ! empty( $new_instance[ $key ] ) ? 1 : 0;
			}

			return $instance;
		}

		/**
		 * Displays the widget form
		 *
		 * @since 0.4
		 *
		 * @param array $instance Current settings
		 */
		public function form( $instance ) {
			// Default values
			$instance = wp_parse_args( (array) $instance, array_merge( array( 'title' => '' ), PLL_Switcher::get_switcher_options( 'widget', 'default' ) ) );

			// Title
			printf(
				'<p><label for="%1$s">%2$s</label><input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
				$this->get_field_id( 'title' ),
				esc_html__( 'Title:', 'polylangexplorer' ),
				$this->get_field_name( 'title' ),
				esc_attr( $instance['title'] )
			);

			$fields = '';
			foreach ( PLL_Switcher::get_switcher_options( 'widget' ) as $key => $str ) {
				$fields .= sprintf(
					'<div%5$s%6$s><input type="checkbox" class="checkbox %7$s" id="%1$s" name="%2$s"%3$s /><label for="%1$s">%4$s</label></div>',
					$this->get_field_id( $key ),
					$this->get_field_name( $key ),
					$instance[ $key ] ? ' checked="checked"' : '',
					esc_html( $str ),
					in_array( $key, array( 'show_names', 'show_flags', 'hide_current' ) ) ? ' class="no-dropdown-' . $this->id . '"' : '',
					! empty( $instance['dropdown'] ) && in_array( $key, array( 'show_names', 'show_flags', 'hide_current' ) ) ? ' style="display:none;"' : '',
					'pll-' . $key
				);
			}

			echo $fields;

			// FIXME echoing script in form is not very clean
			// but it does not work if enqueued properly :
			// clicking save on a widget makes this code unreachable for the just saved widget ( ?! )
			$this->admin_print_script();
		}

		/**
		 * Add javascript to control the language switcher options
		 *
		 * @since 1.3
		 */
		public function admin_print_script() {
			static $done = false;

			if ( $done ) {
				return;
			}

			$done = true;
			?>
			<script type='text/javascript'>
				//<![CDATA[
				jQuery( document ).ready( function( $ ) {
					function pll_toggle( a, test ) {
						test ? a.show() : a.hide();
					}

					// Remove all options if dropdown is checked
					$( '.widgets-sortables,.control-section-sidebar' ).on( 'change', '.pll-dropdown', function() {
						var this_id = $( this ).parent().parent().parent().children( '.widget-id' ).attr( 'value' );
						pll_toggle( $( '.no-dropdown-' + this_id ), 'checked' != $( this ).attr( 'checked' ) );
					} );

					// Disallow unchecking both show names and show flags
					var options = ['-show_flags', '-show_names'];
					$.each( options, function( i, v ) {
						$( '.widgets-sortables,.control-section-sidebar' ).on( 'change', '.pll' + v, function() {
							var this_id = $( this ).parent().parent().parent().children( '.widget-id' ).attr( 'value' );
							if ( 'checked' != $( this ).attr( 'checked' ) ) {
								$( '#widget-' + this_id + options[ 1-i ] ).prop( 'checked', true );
							}
						} );
					} );
				} );
				//]]>
			</script>
			<?php
		}
	}

}
