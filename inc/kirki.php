<?php
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
	$wp_customize->add_section( 'settings', array (
			'title'             => __( 'Global Settings', 'ds' ),
			'priority'          => 10,
		) );

	$wp_customize->add_section( 'visual_settings', array (
		'title'             => __( 'Visual Settings', 'ds' ),
		'priority'          => 20,
	) );

	$wp_customize->add_section( 'navigation', array(
		'title'       => __( 'Navigation', 'ds' ),
		'priority'    => 30,
	) );

	$wp_customize->add_section( 'transitions', array(
		'title'       => __( 'Transitions', 'ds' ),
		'priority'    => 40,
	) );

	$wp_customize->add_section( 'autoslide', array (
		'title'             => __( 'Auto Play', 'ds' ),
		'description'       => '',
		'priority'          => 50,
	) );

	$wp_customize->add_section( 'style', array(
		'title'       => __( 'Style', 'ds' ),
		'priority'    => 60,
	) );

	$wp_customize->add_section( 'style', array (
			'title'          => __( 'Style', 'ds' ),
			'priority'       => 70,
		) );

	$wp_customize->add_section( 'parallax', array(
		'title'             => __( 'Parallax', 'ds' ),
		'priority'          => 80,
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
		'priority'    => 20,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'right_to_left',
		'label'       => __( 'Right-to-left', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Make content flow right to left.', 'ds' ),
		'section'     => 'settings',
		'default'     => 0,
		'priority'    => 30,
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
		'setting'     => 'touch',
		'label'       => __( 'Enable Touch Navigation', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Enables touch navigation on devices with touch input.', 'ds' ),
		'section'     => 'navigation',
		'default'     => 1,
		'priority'    => 30,
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
		'default'     => 1,
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

	// Auto Slide

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'autoslide',
		'label'       => __( 'Auto-Slide', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Automatically proceed to the next slide.', 'ds' ),
		'section'     => 'autoslide',
		'default'     => 0,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'setting'     => 'stop_autoslide',
		'label'       => __( 'Auto-Slide Stoppable', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Stop auto-sliding after user input.', 'ds' ),
		'section'     => 'autoslide',
		'default'     => 1,
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'autoslide_milliseconds',
		'label'       => __( 'Auto-slide Delay', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'Number of milliseconds between automatically proceeding to the next slide.', 'ds' ),
		'section'     => 'autoslide',
		'default'     => 500,
		'priority'    => 30,
	);

	// Style

	$fields[] = array(
		'type'        => 'palette',
		'setting'     => 'select_theme',
		'label'       => __( 'Color', 'ds' ),
		'description' => __( '', 'ds' ),
		'help'        => __( 'The colors for the theme of your slideshow.', 'ds' ),
		'section'     => 'style',
		'default'     => 'sky',
		'priority'    => 10,
		'choices'     => array(
			'beige' => array(
				'#f7f2d3',
				'#fcfaf3',
				'#8b743d',
				'#c0a76e',
			),
			'black' => array(
				'#222222',
				'#42affa',
				'#8dcffc',
			),
			'blood' => array(
				'#222',
				'#626262',
				'#a23',
				'#dd5567',
			),
			'league' => array(
				'#1c1e20',
				'#555a5f',
				'#13DAEC',
				'#71ebf4',
			),
			'moon' => array(
				'#002b36',
				'#268bd2',
				'#78bae6',
			),
			'night' => array(
				'#111',
				'#e7ad52',
				'#f3d7ac',
			),
			'serif' => array(
				'#F0F1EB',
				'#51483D',
				'#8b7b69',
			),
			'simple' => array(
				'#fff',
				'#00008b',
				'#0000f1',
			),
			'sky' => array(
				'#add9e4',
				'#f7fbfc',
				'#3b759e',
				'#74a8cb',
			),
			'solarized' => array(
				'#fdf6e3',
				'#268bd2',
				'#78bae6',
			),
			'white' => array(
				'#fff',
				'#2a76dd',
				'#6ca2e8',
			),
		),
	);

	$fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'header_typography',
		'label'       => __( 'Header Typography', 'ds' ),
		'description' => __( 'Select the font to use for the Headings in your slideshow.', 'ds' ),
		'help'        => __( 'All fonts have been embedded using @font-face so that you don\'t have to worry about connection issues.', 'ds' ),
		'section'     => 'style',
		'default'     => 'league-gothic',
		'priority'    => 20,
		'choices'  => array(
			'bubblegum'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/bubblegum.png',
			'dancing-script'    => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dancing-script.png',
			'dosis'             => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dosis.png',
			'encode'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/encode.png',
			'lato'              => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/lato.png',
			'league-gothic'     => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/league-gothic.png',
			'libre-baskerville' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/libre-baskerville.png',
			'merriweather'      => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/merriweather.png',
			'montserrat'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/montserrat.png',
			'news-cycle'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/news-cycle.png',
			'open-sans'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/open-sans.png',
			'palatino-linotype' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/palatino-linotype.png',
			'quicksand'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/quicksand.png',
			'source-sans-pro'   => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/source-sans-pro.png',
			'ubuntu'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/ubuntu.png',
		),
	);

	$fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'other_typography',
		'label'       => __( 'All Other Typography', 'ds' ),
		'description' => __( 'Select the font to use in all other areas of your slideshow.', 'ds' ),
		'help'        => __( 'All fonts have been embedded using @font-face so that you don\'t have to worry about connection issues.', 'ds' ),
		'section'     => 'style',
		'default'     => 'lato',
		'priority'    => 30,
		'choices'  => array(
			'bubblegum'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/bubblegum.png',
			'dancing-script'    => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dancing-script.png',
			'dosis'             => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/dosis.png',
			'encode'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/encode.png',
			'lato'              => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/lato.png',
			'league-gothic'     => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/league-gothic.png',
			'libre-baskerville' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/libre-baskerville.png',
			'merriweather'      => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/merriweather.png',
			'montserrat'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/montserrat.png',
			'news-cycle'        => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/news-cycle.png',
			'open-sans'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/open-sans.png',
			'palatino-linotype' => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/palatino-linotype.png',
			'quicksand'         => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/quicksand.png',
			'source-sans-pro'   => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/source-sans-pro.png',
			'ubuntu'            => trailingslashit( KIRKI_URL ) . 'assets/images/fonts/ubuntu.png',
		),
	);

	// Parallax

	$fields[] = array(
		'type'        => 'image',
		'setting'     => 'parallax_bkg',
		'label'       => __( 'Parallax background image', 'ds' ),
		'section'     => 'parallax',
		'default'     => '',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'parallax_background_size',
		'label'       => __( 'Parallax Background Size', 'ds' ),
		'description' => __( 'CSS syntax, e.g. "2100px 900px."', 'ds' ),
		'section'     => 'parallax',
		'default'     => '',
		'priority'    => 20,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'parallax_background_change_horizontal',
		'label'       => __( 'Horizontal Change', 'ds' ),
		'description' => __( 'Horizontal amount to move parallax background on slide change', 'ds' ),
		'help'        => __( ' Number, e.g. 100', 'ds' ),
		'section'     => 'parallax',
		'default'     => '',
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'text',
		'setting'     => 'parallax_background_change_vertical',
		'label'       => __( 'Vertical Change', 'ds' ),
		'description' => __( 'Vertical amount to move parallax background on slide change', 'ds' ),
		'help'        => __( ' Number, e.g. 100', 'ds' ),
		'section'     => 'parallax',
		'default'     => '',
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