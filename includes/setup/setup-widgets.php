<?php

if ( ! function_exists( 'themebergerbasic_widgets' ) ) :

	function themebergerbasic_widgets() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'themeberger-basic' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => "\n\r			" . '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => "\n\r			" . '</section><!-- /widget -->' . "\n\r",
				'before_title'  => "\n\r				" . '<h5 class="widget-title">',
				'after_title'   => '</h5>' . "\n\r",
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Site Info', 'themeberger-basic' ),
				'id'            => 'site-info',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">' . "\n\r",
				'after_widget'  => '		</section><!-- /widget -->' . "\n\r",
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Left', 'themeberger-basic' ),
				'id'            => 'footer-left',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">' . "\n\r",
				'after_widget'  => '		</section><!-- /widget -->' . "\n\r",
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Right', 'themeberger-basic' ),
				'id'            => 'footer-right',
				'description'   => esc_html__( 'Add widgets here.', 'themeberger-basic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">' . "\n\r",
				'after_widget'  => '		</section><!-- /widget -->' . "\n\r",
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);

	}

endif;
add_action( 'widgets_init', 'themebergerbasic_widgets' );
