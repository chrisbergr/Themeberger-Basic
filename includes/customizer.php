<?php
/**
 * Customizer Functions and definitions
 *
 * @package themebergertest
 */

function themeberger_customizer_settings( $wp_customize ) {

	$wp_customize->add_section( 'themeberger_settings' , array(
		'title'      => 'Themeberger Settings',
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'tbsetting_primary_color' , array(
		'default'     => 168,
		'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Colorrange( $wp_customize, 'tbsetting_primary_color', array(
		'label'   => 'Primary Color',
		'min'     => 0,
		'max'     => 360,
		'step'    => 1,
		'section'    => 'themeberger_settings',
		'settings'   => 'tbsetting_primary_color',
		'default'     => 168,
	) ) );

	$wp_customize->add_setting( 'tbsetting_secondary_color' , array(
		'default'     => 330,
		'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Colorrange( $wp_customize, 'tbsetting_secondary_color', array(
		'label'   => 'Secondary Color',
		'min'     => 0,
		'max'     => 360,
		'step'    => 1,
		'section'    => 'themeberger_settings',
		'settings'   => 'tbsetting_secondary_color',
		'default'     => 330,
	) ) );

	$wp_customize->add_setting( 'tbsetting_special_color' , array(
		'default'     => 275,
		'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Colorrange( $wp_customize, 'tbsetting_special_color', array(
		'label'   => 'Special Color',
		'min'     => 0,
		'max'     => 360,
		'step'    => 1,
		'section'    => 'themeberger_settings',
		'settings'   => 'tbsetting_special_color',
		'default'     => 275,
	) ) );

	$wp_customize->add_setting( 'tbsetting_theme' , array(
		'default'     => 'bright',
		'transport'   => 'postMessage',
	) );

	$wp_customize->add_control( 'tbsetting_theme', array(
		'label' => 'Theme',
		'type' => 'radio',
		'choices' => array(
			'bright' => 'Bright Theme',
			'dark' => 'Dark Theme',
			'debug' => 'Debug Theme',
		),
		'section'    => 'themeberger_settings',
		'settings'   => 'tbsetting_theme',
	) );

}

add_action( 'customize_register', 'themeberger_customizer_settings' );

function themeberger_customizer_script() {
	wp_enqueue_script(
		'themeberger_customizer',
		get_template_directory_uri() . '/javascripts/customizer.js',
		array( 'jquery','customize-preview' ),
		'',
		true
	);
}

add_action( 'customize_preview_init', 'themeberger_customizer_script' );

function themeberger_customizer_css() {
?>

<style type="text/css">
	:root {
		--color-primary: <?php echo get_theme_mod( 'tbsetting_primary_color', '168' ); ?>;
		--color-secondary: <?php echo get_theme_mod( 'tbsetting_secondary_color', '330' ); ?>;
		--color-special: <?php echo get_theme_mod( 'tbsetting_special_color', '275' ); ?>;
	}
</style>

<?php
}

add_action( 'wp_head', 'themeberger_customizer_css' );
