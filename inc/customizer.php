<?php
/**
 *
 *
 */
function ds_customizer_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

}
add_action( 'customize_register', 'ds_customizer_register' );

/**
 * Create our panels and sections.
 */
function ds_panels_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	/*
 * Global Setting Section
 */
	$wp_customize->add_section( 'theme', array(
		'title'       => __( 'Theme', 'ds' ),
		'priority'    => 20,
	) );

	$wp_customize->add_section( 'fonts', array(
		'title'       => __( 'Fonts', 'ds' ),
		'priority'    => 25,
	) );

	$wp_customize->add_section( 'settings', array (
		'title'       => __( 'Global Settings', 'ds' ),
		'priority'    => 30,
	) );

	$wp_customize->add_section( 'size', array (
		'title'       => __( 'Size', 'ds' ),
		'priority'    => 35,
		'description' => 'The "normal" size of the presentation, aspect ratio will be preserved when the presentation is scaled to fit different resolutions. Can be specified using percentage units.'
	) );

	$wp_customize->add_section( 'visual_settings', array (
		'title'      => __( 'Visual Settings', 'ds' ),
		'priority'   => 40,
	) );

	$wp_customize->add_section( 'navigation', array(
		'title'      => __( 'Navigation', 'ds' ),
		'priority'   => 50,
	) );

	$wp_customize->add_section( 'transitions', array(
		'title'       => __( 'Transitions', 'ds' ),
		'priority'    => 60,
	) );

	$wp_customize->add_section( 'mobile', array (
		'title'       => __( 'Mobile', 'ds' ),
		'priority'    => 80,
	) );

}
add_action( 'customize_register', 'ds_panels_sections' );


/**
 * Add our controls.
 */
function ds_fields( $fields ) {

	// Global Settings

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'loop_presentation',
		'label'       => __( 'Loop Presentation', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Make the first slide loop back to the first.', 'ds' ),
		'section'     => 'settings',
		'default'     => 0,
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'right_to_left',
		'label'       => __( 'Right-to-left', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Make content flow right to left.', 'ds' ),
		'section'     => 'settings',
		'default'     => 0,
		'priority'    => 20,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'history',
		'label'       => __( 'Push History', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Push each slide change to the browser history.', 'ds' ),
		'section'     => 'settings',
		'default'     => 0,
		'priority'    => 30,
	);

	// Size

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'width',
		'label'       => __( 'Width', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( '', 'ds' ),
		'section'     => 'size',
		'default'     => 960,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'height',
		'label'       => __( 'Height', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( '', 'ds' ),
		'section'     => 'size',
		'default'     => 700,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'margin',
		'label'       => __( 'Margin', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Factor of the display size that should remain empty around the content', 'ds' ),
		'section'     => 'size',
		'default'     => 0.1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'minscale',
		'label'       => __( 'MinScale', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Bounds for smallest possible scale to apply to content', 'ds' ),
		'section'     => 'size',
		'default'     => 0.2,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'maxscale',
		'label'       => __( 'MaxScale', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Bounds for largest possible scale to apply to content', 'ds' ),
		'section'     => 'size',
		'default'     => 1.5,
		'priority'    => 30,
	);

	// Style

	$fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'select_theme',
		'label'       => __( 'Theme', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'The colors for the theme of your slideshow.', 'ds' ),
		'section'     => 'theme',
		'default'     => 'sky',
		'priority'    => 10,
		'choices'     => array(
				'wc-miami'        => trailingslashit( KIRKI_URL ) . 'assets/images/themes/wc-miami.png',
				'sky'             => trailingslashit( KIRKI_URL ) . 'assets/images/themes/sky.png',
				'beige'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/beige.png',
				'black'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/black.png',
				'blood'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/blood.png',
				'league'          => trailingslashit( KIRKI_URL ) . 'assets/images/themes/league.png',
				'moon'            => trailingslashit( KIRKI_URL ) . 'assets/images/themes/moon.png',
				'night'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/night.png',
				'serif'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/serif.png',
				'simple'          => trailingslashit( KIRKI_URL ) . 'assets/images/themes/simple.png',
				'solarized'       => trailingslashit( KIRKI_URL ) . 'assets/images/themes/solarized.png',
				'white'           => trailingslashit( KIRKI_URL ) . 'assets/images/themes/white.png',
			),
	);

	$fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'header_typography',
		'label'       => __( 'Header Typography', 'ds' ),
		'description' => __( 'Select the font to use for the Headings in your slideshow.', 'ds' ),
		'help'        => __( 'All fonts have been embedded using @font-face so that you don\'t have to worry about connection issues.', 'ds' ),
		'section'     => 'fonts',
		'default'     => 'quicksand',
		'priority'    => 20,
		'choices'     => array(
			'bubblegum'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/bubblegum.png',
			'dosis'             => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dosis.png',
			'encode'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/encode.png',
			'lato'              => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/lato.png',
			'league'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/league-gothic.png',
			'libre-baskerville' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/libre-baskerville.png',
			'merriweather'      => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/merriweather.png',
			'montserrat'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/montserrat.png',
			'news-cycle'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/news-cycle.png',
			'open-sans'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/open-sans.png',
			'quicksand'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/quicksand.png',
			'source-sans-pro'   => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/source-sans-pro.png',
			'ubuntu'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/ubuntu.png',
			'sinkin-sans'       => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/sinkin-sans.png',
		),
	);

	$fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'other_typography',
		'label'       => __( 'All Other Typography', 'ds' ),
		'description' => __( 'Select the font to use in all other areas of your slideshow.', 'ds' ),
		'help'        => __( 'All fonts have been embedded using @font-face so that you don\'t have to worry about connection issues.', 'ds' ),
		'section'     => 'fonts',
		'default'     => 'lato',
		'priority'    => 30,
		'choices'     => array(
			'bubblegum'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/bubblegum.png',
			'dosis'             => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dosis.png',
			'encode'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/encode.png',
			'lato'              => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/lato.png',
			'league'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/league-gothic.png',
			'libre-baskerville' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/libre-baskerville.png',
			'merriweather'      => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/merriweather.png',
			'montserrat'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/montserrat.png',
			'news-cycle'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/news-cycle.png',
			'open-sans'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/open-sans.png',
			'quicksand'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/quicksand.png',
			'source-sans-pro'   => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/source-sans-pro.png',
			'ubuntu'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/ubuntu.png',
			'sinkin-sans'       => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/sinkin-sans.png',
		),
	);

	// Global Visual Settings

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'progress',
		'label'       => __( 'Progress Bar', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Display a presentation progress bar', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'slide_number',
		'label'       => __( 'Slide Number', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Display the page number of the current slide.', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 0,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'overview',
		'label'       => __( 'Slideshow Overview', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Enable the slide overview mode', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'center',
		'label'       => __( 'Center Slides Vertically', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Vertical centering of slides.', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'fragments',
		'label'       => __( 'Fragments', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Turns fragments on and off globally.', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 40,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'embedded',
		'label'       => __( 'Embedded Mode', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Flags if the presentation is running in an embedded mode, i.e. contained within a limited portion of the screen', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 0,
		'priority'    => 50,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'help',
		'label'       => __( 'Help', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Flags if we should show a help overlay when the questionmark key is pressed', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 60,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'preview_links',
		'label'       => __( 'Preview Links', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Opens links in an iframe preview overlay.', 'ds' ),
		'section'     => 'visual_settings',
		'default'     => 1,
		'priority'    => 60,
	);

	// Navigation Section

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'controls_right_corner',
		'label'       => __( 'Display Controls?', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Display controls in the bottom right corner', 'ds' ),
		'section'     => 'navigation',
		'default'     => 1,
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'keyboard_shortcuts',
		'label'       => __( 'Keyboard Shortcuts', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Enable keyboard shortcuts for navigation', 'ds' ),
		'section'     => 'navigation',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'mousewheel_navigation',
		'label'       => __( 'Mouse Wheel Navigation', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Enable slide navigation via mouse wheel.', 'ds' ),
		'section'     => 'navigation',
		'default'     => 0,
		'priority'    => 30,
	);

	// Transitions

	$fields[] = array(
		'type'     => 'radio-image',
		'settings' => 'transitions',
		'label'    => __( 'Transition Style', 'ds' ),
		'help'     => __( '1: none, &nbsp;2: fade, &nbsp;3: slide, &nbsp;4: convex, &nbsp;5: concave, &nbsp;6: zoom' ),
		'section'  => 'transitions',
		'default'  => 'slide',
		'priority' => 10,
		'choices'  => array(
			'none'      => trailingslashit( KIRKI_URL ) . 'assets/images/none.png',
			'fade'      => trailingslashit( KIRKI_URL ) . 'assets/images/fade.png',
			'slide'     => trailingslashit( KIRKI_URL ) . 'assets/images/slide.png',
			'convex'    => trailingslashit( KIRKI_URL ) . 'assets/images/convex.png',
			'concave'   => trailingslashit( KIRKI_URL ) . 'assets/images/concave.png',
			'zoom'      => trailingslashit( KIRKI_URL ) . 'assets/images/zoom.png',
		),
	);

	$fields[] = array(
		'type'        => 'select',
		'setting'     => 'transition_speed',
		'label'       => __( 'Transition Speed', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( '', 'ds' ),
		'section'     => 'transitions',
		'default'     => 'slow',
		'priority'    => 10,
		'choices'     => array(
			'fast' => __( 'Fast', 'ds' ),
			'slow' => __( 'Slow', 'ds' ),
		),
	);

	$fields[] = array(
		'type'     => 'radio-image',
		'settings' => 'background_transitions',
		'label'    => __( 'Background Transition', 'ds' ),
		'help'     => __( 'Background transitions apply when navigating to or from a slide that has a background image or color.' ),
		'section'  => 'transitions',
		'default'  => 'slide',
		'priority' => 10,
		'choices'  => array(
			'none'      => trailingslashit( KIRKI_URL ) . 'assets/images/none.png',
			'fade'      => trailingslashit( KIRKI_URL ) . 'assets/images/fade.png',
			'slide'     => trailingslashit( KIRKI_URL ) . 'assets/images/slide.png',
			'convex'    => trailingslashit( KIRKI_URL ) . 'assets/images/convex.png',
			'concave'   => trailingslashit( KIRKI_URL ) . 'assets/images/concave.png',
			'zoom'      => trailingslashit( KIRKI_URL ) . 'assets/images/zoom.png',
		),
	);

	$fields[] = array(
		'type'        => 'select',
		'setting'     => 'view_distance',
		'label'       => __( 'View Distance', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Number of slides away from the current slide that are visible.', 'ds' ),
		'section'     => 'transitions',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => array(
			'1' => __( '1', 'ds' ),
			'2' => __( '2', 'ds' ),
			'3' => __( '3', 'ds' ),
			'4' => __( '4', 'ds' ),
			'5' => __( '5', 'ds' ),

		),
	);

	// Mobile

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'touch',
		'label'       => __( 'Enable Touch Navigation', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Enables touch navigation on devices with touch input.', 'ds' ),
		'section'     => 'mobile',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'hide_address_bar',
		'label'       => __( 'Hide Address Bar', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Hides the address bar on mobile devices.', 'ds' ),
		'section'     => 'mobile',
		'default'     => 1,
		'priority'    => 30,
	);
	return $fields;
}
add_filter( 'kirki/fields', 'ds_fields' );

/**
 * Configuration sample for the Kirki Customizer
 */
function ds_configuration() {

	$args = array(
		'logo_image'    => '',
		'description'   => __( '', 'ds' ),
		'color_accent'  => '#378ECF',
		'color_back'    => '#222222',
	);

	return $args;

}
add_filter( 'kirki/config', 'ds_configuration' );

/**
 * Custom CSS
 */
function ds_custom_css() {

	// Early exit if Kirki is not installed
	if ( ! function_exists( 'kirki_get_option' ) ) {
		return;
	}

	// Add custom CSS for layouts
	$css = '';
	if ( 'full' == kirki_get_option( 'layout' ) ) {
		$css .= '#primary{width:100%;}';
	} elseif ( 'left-sidebar' == kirki_get_option( 'layout' ) ) {
		$css .= '#primary{float:right;}#secondary{float:left;}';
	}

	wp_add_inline_style( 'ds-style', $css );

}
add_action( 'wp_enqueue_scripts', 'ds_custom_css' );