<?php

if ( function_exists( 'themeberger_breadcrumbs' ) ) {

	function breadcrumbs_settings( $settings ){
		$settings['prefix'] = '';
		$settings['seperator'] = '';
		$settings['html_container'] = '<nav class="themeberger-breadcrumbs page-breadcrumb" aria-label="Breadcrumb"><ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">%s</ol></nav>';
		$settings['html_item'] = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" /></li>';
		$settings['html_current_item'] = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%1$s" aria-current="page"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" /></li>';
		return $settings;
	}
	add_filter( 'themeberger_breadcrumbs_settings', 'breadcrumbs_settings' );

	function breadcrumb() {

		themeberger_breadcrumbs();

	}
	add_action( 'chobz_breadcrumb', 'breadcrumb', 95 );

}
