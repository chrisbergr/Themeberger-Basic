<?php

function chobz_footer_backlink() {

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
				<!--<p>
					<a href="#Top" class="scrolltopFunc">
						<i class="iconberger iconberger-up"></i> Top
					</a>
				</p>-->
				<a href="https://xn--sr8hvo.ws/%E2%9C%92%EF%B8%8F%F0%9F%9A%A4%F0%9F%90%89/previous">←</a>
				An IndieWeb Webring 🕸💍
				<a href="https://xn--sr8hvo.ws/%E2%9C%92%EF%B8%8F%F0%9F%9A%A4%F0%9F%90%89/next">→</a>
			</div>
		</nav>
	</div>

	<?php

}
add_action( 'themeberger_after_footer', 'chobz_footer_backlink', 30 );
