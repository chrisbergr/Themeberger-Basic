<?php
/**
 * Customizer Functions and definitions
 *
 * @package themebergerbasic
 */

/*
function themeberger_customizer_settings( $wp_customize ) {

	$wp_customize->add_section(
		'themeberger_helpers',
		array(
			'title'    => 'Themeberger Helpers',
			'priority' => 31,
		)
	);

	$wp_customize->add_setting( 'tbsetting_helper_defaultcover' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tbsetting_helper_defaultcover',
			array(
				'label'    => 'Default Cover',
				'section'  => 'themeberger_helpers',
				'settings' => 'tbsetting_helper_defaultcover',
			)
		)
	);

	$wp_customize->add_section(
		'themeberger_settings',
		array(
			'title'    => 'Themeberger Settings',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'tbsetting_primary_color',
		array(
			'default'   => 168,
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Colorrange(
			$wp_customize,
			'tbsetting_primary_color',
			array(
				'label'    => 'Primary Color',
				'min'      => 0,
				'max'      => 360,
				'step'     => 1,
				'section'  => 'themeberger_settings',
				'settings' => 'tbsetting_primary_color',
				'default'  => 168,
			)
		)
	);

	$wp_customize->add_setting(
		'tbsetting_secondary_color',
		array(
			'default'   => 330,
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Colorrange(
			$wp_customize,
			'tbsetting_secondary_color',
			array(
				'label'    => 'Secondary Color',
				'min'      => 0,
				'max'      => 360,
				'step'     => 1,
				'section'  => 'themeberger_settings',
				'settings' => 'tbsetting_secondary_color',
				'default'  => 330,
			)
		)
	);

	$wp_customize->add_setting(
		'tbsetting_special_color',
		array(
			'default'   => 275,
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Colorrange(
			$wp_customize,
			'tbsetting_special_color',
			array(
				'label'    => 'Special Color',
				'min'      => 0,
				'max'      => 360,
				'step'     => 1,
				'section'  => 'themeberger_settings',
				'settings' => 'tbsetting_special_color',
				'default'  => 275,
			)
		)
	);

	$wp_customize->add_setting(
		'tbsetting_theme',
		array(
			'default'   => 'bright',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'tbsetting_theme',
		array(
			'label'    => 'Theme',
			'type'     => 'radio',
			'choices'  => array(
				'bright' => 'Bright Theme',
				'dark'   => 'Dark Theme',
				'debug'  => 'Debug Theme',
			),
			'section'  => 'themeberger_settings',
			'settings' => 'tbsetting_theme',
		)
	);

}

add_action( 'customize_register', 'themeberger_customizer_settings' );

function themeberger_customizer_script() {
	wp_enqueue_script(
		'themeberger_customizer',
		get_template_directory_uri() . '/javascripts/customizer.js',
		array( 'jquery', 'customize-preview' ),
		THEME_VERSION,
		true
	);
}

add_action( 'customize_preview_init', 'themeberger_customizer_script' );

function themeberger_customizer_css() {
	?>

	<style type="text/css">
		:root {
			--color-primary: <?php echo esc_attr( get_theme_mod( 'tbsetting_primary_color', '168' ) ); ?>;
			--color-secondary: <?php echo esc_attr( get_theme_mod( 'tbsetting_secondary_color', '330' ) ); ?>;
			--color-special: <?php echo esc_attr( get_theme_mod( 'tbsetting_special_color', '275' ) ); ?>;
		}
	</style>

	<?php
}

add_action( 'wp_head', 'themeberger_customizer_css' );

/**/
