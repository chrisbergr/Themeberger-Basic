<?php

function chobz_footer_info() {

	?>

	<div class="footer-infobox">
		<div class="wrapper">
			<div class="footer-infobox-left">
				<?php do_action( 'themeberger_footer_infobox' ); ?>
			</div>
			<div class="footer-infobox-center">

				<div class="profilegrid vcard hcard h-card" itemscope itemtype="http://schema.org/Person">
					<div class="profilegrid-left">
						<p class="hcardname name p-name fn n"><span class="given-name p-given-name" itemprop="givenName">Christian</span> <span class="family-name p-family-name" itemprop="familyName">Hockenberger</span></p>
						<p class="note p-note">
							<strong class="highlight">Father</strong>,
							<strong class="highlight">Husband</strong>,
							<span class="job-title p-job-title" itemprop="jobTitle">Art Director</span>
							&amp; Soldier<br>
							<span class="p-pronouns"><span class="p-pronoun-nominative">he</span>/<span class="p-pronoun-oblique">him</span>/<span class="p-pronoun-possessive">his</span></span>
						</p>
						<div class="profilegrid-inner">
							<p class="adr h-adr" itemprop="address" itemscope="itemscope" itemtype="http://schema.org/PostalAddress">
								<span class="street-address p-street-address" itemprop="streetAddress">Robert-Koch-Straße 19</span><br>
								<span class="country-name p-country-name" itemprop="addressCountry">DE</span>-<span class="postal-code p-postal-code" itemprop="postalCode">67240</span> <span class="locality p-locality" itemprop="addressLocality"><span class="removed">Bobenheim-</span>Roxheim</span>
							</p>
						</div>
						<div class="profilegrid-inner">
							<p><a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#99;&#104;&#114;&#105;&#115;&#116;&#105;&#97;&#110;&#64;&#104;&#111;&#99;&#107;&#101;&#110;&#98;&#101;&#114;&#103;&#101;&#114;&#46;&#117;&#115;" class="email u-email" itemprop="email" rel="me">&#99;&#104;&#114;&#105;&#115;&#116;&#105;&#97;&#110;&#64;&#104;&#111;&#99;&#107;&#101;&#110;&#98;&#101;&#114;&#103;&#101;&#114;&#46;&#117;&#115;</a><br><a href="https://christian.hockenberger.us" class="url u-url u-uid" itemprop="url">christian.hockenberger.us</a></p>
						</div>
					</div>
					<div class="profilegrid-right">
						<p class="txtrght">
							<img class="profilephoto photo u-photo avatar" src="https://christian.hockenberger.us/wp-content/uploads/sites/3/2019/09/chris-300x300.jpg" title="Christian Hockenberger" alt="Christian Hockenberger Portrait">
						</p>
					</div>
					<div class="profilegrid-bottom">
						<ul class="external_links">
							<li class="twitter"><a href="https://twitter.com/chrisbergr" title="@chrisbergr on Twitter" rel="me" class="url u-url">Twitter</a></li>
							<li class="instagram"><a href="https://instagram.com/chrisbergr" title="chrisbergr on Instagram" rel="me" class="url u-url">Instagram</a></li>
							<li class="facebook"><a href="https://facebook.com/chrisbergr" title="chrisbergr on Facebook" rel="me" class="url u-url">Facebook</a></li>
							<li class="pinterest"><a href="https://pinterest.com/chrisbergr" title="chrisbergr on Pinterest" rel="me" class="url u-url">Pinterest</a></li>
							<li class="dribbble"><a href="https://dribbble.com/chrisbergr" title="chrisbergr on Dribbble" rel="me" class="url u-url">Dribbble</a></li>
							<li class="behance"><a href="https://behance.net/chrisbergr" title="chrisbergr on Behance" rel="me" class="url u-url">Behance</a></li>
							<li class="linkedin"><a href="https://www.linkedin.com/in/christian-hockenberger/" title="Christian Hockenberger on LinkedIn" rel="me" class="url u-url">LinkedIn</a></li>
							<li class="github"><a href="https://github.com/chrisbergr" title="chrisbergr on GitHub" rel="me" class="url u-url">GitHub</a></li>
							<li class="youtube"><a href="https://youtube.me/princeofdune" title="Christian Hockenberger on YouTube" rel="me" class="url u-url">YouTube</a></li>
							<li class="flickr"><a href="https://flickr.com/chrisbergr" title="chrisbergr on Flickr" rel="me" class="url u-url">Flickr</a></li>
							<li class="foursquare"><a href="https://foursquare.com/chrisbergr" title="chrisbergr on Foursquare" rel="me" class="url u-url">Foursquare</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php

}
add_action( 'themeberger_after_footer', 'chobz_footer_info', 20 );
