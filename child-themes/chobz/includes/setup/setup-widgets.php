<?php

function chobz_widgets() {

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
add_action( 'widgets_init', 'chobz_widgets' );
