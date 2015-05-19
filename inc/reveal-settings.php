<?php

function    reveal_default_settings() {
	return apply_filters( 'reveal_default_settings', array(
		'theme'                          => 'default',
		'controls'                       => true,
		'progress'                       => true,
		'slideNumber'                    => false,
		'history'                        => false,
		'keyboard'                       => true,
		'overview'                       => true,
		'center'                         => true,
		'touch'                          => true,
		'loop'                           => false,
		'rtl'                            => false,
		'fragments'                      => true,
		'embedded'                       => false,
		'autoSlide'                      => 0,
		'autoSlideStoppable'             => true,
		'mouseWheel'                     => false,
		'hideAddressBar'                 => true,
		'previewLinks'                   => false,
		'transition'                     => 'default',
		'transitionSpeed'                => 'default',
		'backgroundTransition'           => 'default',
		'viewDistance'                   => 3,
		'parallaxBackgroundImage'        => '',
		'parallaxBackgroundSize'         => '',
		'width'                          => 960,
		'height'                         => 700,
		'margin'                         => 0.1,
		'minScale'                       => 0.2,
		'maxScale'                       => 1.0,
		'rollingLinks'                   => false,
		'focusBodyOnPageVisiblityChange' => true,
	) );
}

function reveal_get_settings() {
	static $reveal_settings;
	if ( ! empty( $reveal_settings ) ) {
		return $reveal_settings;
	}

	$reveal_settings = get_theme_mods( 'wp-preso', array() );

	$non_boolean_keys = array( 'theme',
		'autoSlide',
		'transition',
		'transitionSpeed',
		'backgroundTransition',
		'viewDistance',
		'parallaxBackgroundImage',
		'parallaxBackgroundSize',
		'width',
		'height',
		'margin',
		'minScale',
		'maxScale',
	);

	// Sanitize boolean values coming from the db
	foreach ( $reveal_settings as $key => $value ) {
		if ( ! in_array( $key, $non_boolean_keys ) && $value !== 'true' && $value !== 'false' ) {
			unset( $reveal_settings[ $key ] );
		}
	}

	// Fill all settings
	$reveal_settings = wp_parse_args( $reveal_settings, reveal_default_settings() );

	// Convert boolean values to string
	foreach ( $reveal_settings as $key => $value ) {
		if ( ! in_array( $key, $non_boolean_keys ) ) {
			if ( true === $value || 'true' === $value ) {
				$reveal_settings[ $key ] = 'true';
			} else {
				$reveal_settings[ $key ] = 'false';
			}
		}
	}

	// Sanitize numeric values
	if ( isset( $reveal_settings['autoSlide'] ) ) {
		$reveal_settings['autoSlide'] = absint( $reveal_settings['autoSlide'] );
	}
	if ( isset( $reveal_settings['viewDistance'] ) ) {
		$reveal_settings['viewDistance'] = absint( $reveal_settings['viewDistance'] );
	}
	if ( isset( $reveal_settings['width'] ) ) {
		$reveal_settings['width'] = absint( $reveal_settings['width'] );
	}
	if ( isset( $reveal_settings['height'] ) ) {
		$reveal_settings['height'] = absint( $reveal_settings['height'] );
	}
	if ( isset( $reveal_settings['margin'] ) ) {
		$reveal_settings['margin'] = floatval( $reveal_settings['margin'] );
	}
	if ( isset( $reveal_settings['minScale'] ) ) {
		$reveal_settings['minScale'] = floatval( $reveal_settings['minScale'] );
	}
	if ( isset( $reveal_settings['maxScale'] ) ) {
		$reveal_settings['maxScale'] = floatval( $reveal_settings['maxScale'] );
	}

	// Convert attachment id to attachment url
	if ( ! empty( $reveal_settings['parallaxBackgroundImage'] ) ) {
		$reveal_settings['parallaxBackgroundImage'] = esc_url( wp_get_attachment_url( $reveal_settings['parallaxBackgroundImage'] ) );
	}

	// Sanitize dropdown values
	if ( isset( $reveal_settings['transition'] ) && ! in_array( $reveal_settings['transition'], array( 'default', 'cube', 'page', 'concave', 'zoom', 'linear', 'fade', 'none' ) ) ) {
		$reveal_settings['transition'] = 'default';
	}
	if ( isset( $reveal_settings['transitionSpeed'] ) && ! in_array( $reveal_settings['transitionSpeed'], array( 'default', 'fast', 'slow' ) ) ) {
		$reveal_settings['transitionSpeed'] = 'default';
	}
	if ( isset( $reveal_settings['backgroundTransition'] ) && ! in_array( $reveal_settings['backgroundTransition'], array( 'default', 'none', 'slide', 'concave', 'convex', 'zoom' ) ) ) {
		$reveal_settings['backgroundTransition'] = 'default';
	}

	return $reveal_settings;
}
function reveal_initialize_script() {
	$transition         = get_theme_mod( 'transition' );
	$transition_speed   = get_theme_mod( 'transition_speed' );
	$bkg_transition     = get_theme_mod( 'bkg_transition' );
	$view_distance      = get_theme_mod( 'view_distance' );
	?>

	<script>
		// Full list of configuration options available here:
		// https://github.com/hakimel/reveal.js#configuration
		Reveal.initialize({
			controls:               <?php if( '' == esc_attr( get_theme_mod( 'controls_right_corner' ) ) ) { echo 'false'; } else { echo 'true'; } ?>,
			progress:               <?php if( '' == get_theme_mod( 'progress' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			slideNumber:            <?php if( '' == get_theme_mod( 'number' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			keyboard:               <?php if( '' == get_theme_mod( 'keyboard_shortcuts' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			overview:               <?php if( '' == get_theme_mod( 'overview' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			center:                 <?php if( '' == get_theme_mod( 'center' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			touch:                  <?php if( '' == get_theme_mod( 'touch' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			loop:                   <?php if( '' == get_theme_mod( 'loop_presentation' ) ) { echo 'false'; } else { echo 'true'; }?>,
			rtl:                    <?php if( '' == get_theme_mod( 'rtl' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			autoSlide:              <?php if( '' == get_theme_mod( 'autoslide' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			autoSlideStoppable:     <?php if( '' == get_theme_mod( 'stop_autoslide' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			mouseWheel:             <?php if( '' == get_theme_mod( 'mousewheel_navigation' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			transition:             <?php if( '' == get_theme_mod( 'transition' ) ) { echo '"default"'; } else { echo '"' . $transition . '"'; } ?>,
			transitionSpeed:        <?php if( '' == get_theme_mod( 'transition_speed' ) ) { echo '"slow"'; } else { echo '"' . $transition_speed . '"'; } ?>,
			backgroundTransition:   <?php if( '' == get_theme_mod( 'bkg_transitions' ) ) { echo '"default"'; } else { echo '"' . $bkg_transition . '"'; } ?>,
			viewDistance:           <?php if( '' == get_theme_mod( 'view_distance' ) ) { echo '3'; } else { echo $view_distance; } ?>,

			// Optional libraries used to extend on reveal.js
			dependencies: [
				<?php
				echo implode( ",\n", apply_filters( 'reveal_default_dependencies', array(
					'classList' => "{ src: '" . get_template_directory_uri() . "/assets/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } }",
					'highlight' => "{ src: '" . get_template_directory_uri() . "/assets/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } }",
					'zoom'      => "{ src: '" . get_template_directory_uri() . "/assets/reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } }",
					'notes'     => "{ src: '" . get_template_directory_uri() . "/assets/reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }",
				) ) );
				?>
			]
		});
	</script>
<?php
}