<?php


if( function_exists( 'marlon_framework' ) && marlon_framework()->has_module( 'site_breadcrumbs' ) ) {

	function breadcrumbs_settings( $settings ) {
		$settings['prefix']            = '';
		$settings['seperator']         = '';
		//$settings['html_container']    = '<nav class="marlon-breadcrumbs site-breadcrumb" aria-label="Breadcrumb"><ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">%s</ol></nav>';
		//$settings['html_item']         = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" /></li>';
		//$settings['html_current_item'] = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s" aria-current="page"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" /></li>';
		return $settings;
	}
	add_filter( 'marlon_breadcrumbs_settings', 'breadcrumbs_settings' );

}
