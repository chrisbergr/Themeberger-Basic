<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themebergertest
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<script>(function(){document.documentElement.className='js'})();</script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<script>/*Detect css variables support*/(function(){var detect = 'no-css-variables';var tempStyle = document.createElement('style');tempStyle.innerHTML = ":root{--temp: rgb(1, 2, 3);}.css-variable-test{display:none;background-color:var(--temp);}";document.head.appendChild(tempStyle);var tempElm = document.createElement('div');tempElm.className = 'css-variable-test';document.body.appendChild(tempElm);var computedStyle = getComputedStyle(document.getElementsByClassName('css-variable-test')[0],null);if(computedStyle.backgroundColor == "rgb(1, 2, 3)"){console.log('css variables support');var detect = 'css-variables';}tempStyle.parentNode.removeChild(tempStyle);tempElm.parentNode.removeChild(tempElm);var classes = document.body.className.split(" ");if(classes.indexOf(detect) == -1){document.body.className += " " + detect;}})();</script>
	<script>/*Detect flexbox support*/(function(pNames){var detect = 'no-flexbox';const element = document.createElement('a');let index = pNames.length;try{while(index--){const name = pNames[index];element.style.display = name;if(element.style.display === name){detect = 'flexbox';console.log('flexbox support');break;}}}catch(pError){}var classes = document.body.className.split(" ");if(classes.indexOf(detect) == -1){document.body.className += " " + detect;}})(['-webkit-flex','-moz-flex', '-ms-flexbox', '-ms-flex', 'flex']);</script>
	<script>/*Detect css grid support*/(function(){var detect = 'no-css-grid';var tempElm = document.createElement('div');if(typeof tempElm.style.grid === 'string'){detect = "css-grid";console.log('css grid support');}var classes = document.body.className.split(" ");if(classes.indexOf(detect) == -1){document.body.className += " " + detect;}})();</script>
	