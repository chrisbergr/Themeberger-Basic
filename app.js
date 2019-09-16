/**
 * themebergertest app scripts
 *
 * @package themebergertest
 */

console.log( ':)' );

/*

const COLOR_LIST = ['#7f00ff', '#ff00ff', '#0000ff', '#007fff', '#00ffff'];
let $targetList;

const init = () => {

  $targetList = document.querySelectorAll('.entry-content p');

  setup();

  window.addEventListener('scroll', onScroll, false);
  window.dispatchEvent(new Event('scroll'));

};

const getArrayRandomValue = array => array[Math.floor(Math.random() * array.length)];

const setup = () => {

  for (const $target of $targetList) {

    const content = $target.innerHTML;
    const color = 'revealColor' in $target.dataset ? $target.dataset.revealColor : getArrayRandomValue(COLOR_LIST);
    $target.innerHTML = `<span data-reveal="content"><div data-reveal="cover" style="background-color:${color}"></div><span data-reveal="text">${content}</span></span>`;

  }

};

const onScroll = () => {

  const windowH = window.innerHeight;
  const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  const isMostScroll = document.body.clientHeight <= scrollTop + windowH;

  for (const $target of $targetList) {

    if ($target.classList.contains('loaded')) continue;

    const rect = $target.getBoundingClientRect();
    const top = rect.top + scrollTop;
    if (isMostScroll || top <= scrollTop + windowH * .8) $target.classList.add('loaded');

  }

};

document.addEventListener('DOMContentLoaded', init, false);

*/


( function() {

	document.addEventListener( 'DOMContentLoaded', function() {
		var articleContent = document.querySelectorAll( '.full-width-block' );

		if ( ! articleContent ) {
			return;
		}

		var siteMain         = document.querySelector( '.content-card' );
		var htmlDirValue     = document.documentElement.getAttribute( 'dir' );
		var updateDimensions = function() {
			if ( updateDimensions._tick ) {
				cancelAnimationFrame( updateDimensions._tick );
			}

			updateDimensions._tick = requestAnimationFrame( function() {
				updateDimensions._tick = null;
				console.log(articleContent);
				for (index = 0; index < articleContent.length; ++index) {
					articleContent[index].style.width = window.innerWidth + 'px';
					articleContent[index].style.width = '100vw';
					//articleContent[index].querySelector( 'img' ).style.width = window.innerWidth + 'px';


					if ( htmlDirValue !== 'rtl' ) {
						articleContent[index].style.marginLeft = -siteMain.getBoundingClientRect().left + 'px';
					} else {
						articleContent[index].style.marginRight = -siteMain.getBoundingClientRect().left + 'px';
					}
				}
			} );
		};

		// On window resize, set hero content dimensions / layout.
		window.addEventListener( 'resize', updateDimensions );
		updateDimensions();
	} );

} )();
