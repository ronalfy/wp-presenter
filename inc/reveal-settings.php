<?php

// Reveal Settings are defined in customizer.php

function wp_presenter_initialize_script() {
	$width              = get_theme_mod( 'width' );
	$height             = get_theme_mod( 'height' );
	$margin             = get_theme_mod( 'margin' );
	$min_scale          = get_theme_mod( 'minscale' );
	$max_scale          = get_theme_mod( 'maxscale' );
	$transition         = get_theme_mod( 'transitions' );
	$transition_speed   = get_theme_mod( 'transition_speed' );
	$bkg_transition     = get_theme_mod( 'bkg_transition' );
	$view_distance      = get_theme_mod( 'view_distance' );
	$fragments          = get_theme_mod( 'fragments' );
	$hide_address_bar   = get_theme_mod( 'hide_address_bar' );
	$progress           = get_theme_mod( 'progress' );

	?>

	<script>
		// Full list of configuration options available here:
		// https://github.com/hakimel/reveal.js#configuration
		Reveal.initialize({
			width:                  <?php if( '' == get_theme_mod( 'width' ) ) { echo 960; } else { echo $width; } ?>,
			height:                 <?php if( '' == get_theme_mod( 'height' ) ) { echo 700; } else { echo $height; } ?>,
			margin:                 <?php if( '' == get_theme_mod( 'margin' ) ) { echo 0.1; } else { echo $margin; } ?>,
			minScale:               <?php if( '' == get_theme_mod( 'minscale' ) ) { echo 0.2; } else { echo $min_scale; } ?>,
			maxScale:               <?php if( '' == get_theme_mod( 'maxscale' ) ) { echo 1.5; } else { echo $max_scale; } ?>,
			controls:               <?php if( '' == get_theme_mod( 'controls_right_corner' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			progress:               <?php if( '' == get_theme_mod( 'progress' ) ) { echo 'true'; } else { echo $progress; } ?>,
			slideNumber:            <?php if( '' == get_theme_mod( 'number' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			history:                <?php if( '' == get_theme_mod( 'history' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			keyboard:               <?php if( '' == get_theme_mod( 'keyboard_shortcuts' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			overview:               <?php if( '' == get_theme_mod( 'overview' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			center:                 <?php if( '' == get_theme_mod( 'center' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			touch:                  <?php if( '' == get_theme_mod( 'touch' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			loop:                   <?php if( '' == get_theme_mod( 'loop_presentation' ) ) { echo 'false'; } else { echo 'true'; }?>,
			rtl:                    <?php if( '' == get_theme_mod( 'rtl' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			fragments:              <?php if( '' == get_theme_mod( 'fragments' ) ) { echo 'true'; } else { echo $fragments; } ?>,
			embedded:               <?php if( '' == get_theme_mod( 'embedded' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			help:                   <?php if( '' == get_theme_mod( 'help' ) ) { echo 'true'; } else { echo 'false'; } ?>,
			mouseWheel:             <?php if( '' == get_theme_mod( 'mousewheel_navigation' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			hideAddressBar:         <?php if( '' == get_theme_mod( 'hide_address_bar' ) ) { echo 'true'; } else {  echo $hide_address_bar; } ?>,
			previewLinks:           <?php if( '' == get_theme_mod( 'preview_links' ) ) { echo 'false'; } else { echo 'true'; } ?>,
			transition:             <?php if( '' == get_theme_mod( 'transitions' ) ) { echo '"default"'; } else { echo '"' . $transition . '"'; } ?>,
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