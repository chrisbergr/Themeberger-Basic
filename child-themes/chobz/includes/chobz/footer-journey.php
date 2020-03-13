<?php

function chobz_footer_journey() {

	?>

	<svg version="1.1" id="monogram-flag" class="footer-batches" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 907.2 455.2" style="enable-background:new 0 0 907.2 455.2;" xml:space="preserve">
		<path id="monogram-flag-white" d="M907,455H1V0h906V455z"/>
		<polygon id="monogram-flag-red" points="906.8,50.8 906.8,0.3 454.3,0.3 454.3,0.3 454.3,455 454.3,455 906.8,455 906.8,404.5
			454.3,404.5 454.3,353.7 906.8,353.7 906.8,303.2 454.3,303.2 454.3,252.4 906.8,252.4 906.8,201.9 454.3,201.9 454.3,151.4
			906.8,151.4 906.8,100.9 454.3,100.9 454.3,50.8 "/>
		<path id="monogram-flag-blue" d="M-0.4,0.3V455h454.7V0.3H-0.4z M363.8,403.7H246v-39.3h39.3v-19.3h39.3v19.3h39.3V403.7z
			M403.1,285.4L363.5,325H188.1v-39.3h97.2v-39.3H168.1v117.9h39.3v39.3H89.5v-39.3h39.3V325H89.9l-39.6-39.5V169l39.6-39.6h38.9
			V90.1H89.5V50.8h117.8v39.3h-39.3v39.3h117.2V90.1H246V50.8h117.8v39.3h-39.3v195.6h39.3v-38.5h39.3V285.4z M403.1,207.2h-39.3
			v-38.6l0,0h-19.3v-39.3h19l39.6,39.6V207.2z M89.5,168.7h195.8v38.6H168.1v-18.6h-39.3v97.2H89.5v-97.2V168.7z"/>
	</svg>

	<?php

}
add_action( 'themeberger_footer_infobox', 'chobz_footer_journey', 91 );
