<?php

/**
 * Content of Dashboard-Widget
 */
function wp_presenter_dashboard() {
	_e( '<h3>THEMES</h3>
	<p>reveal.js comes with a few themes built in:</p>
	<p>Black (default) - White - League - Sky - Beige - Simple
		Serif - Blood - Night - Moon - Solarized</p>
	<p><em>You can change the theme and many other settings in the Customizer.</em></p>
	<button style="background: #3DCB96;border:none;padding:10px 20px;text-transform:uppercase;letter-spacing: .5px; "><a href="' . get_site_url() . '/wp-admin/customize.php?return=%2Fwp-admin%2F" style="color: #fff;"> Customize Your Slideshow </a></button>
	<p><small><em>Appearance > Customizer</em></small></p>
	<hr />
	<h3>SLIDE OVERVIEW</h3>
	<p>Press ESC to enter the slide overview.</p>
	<p>Hold down alt and click on any element to zoom in on it using zoom.js. Alt + click anywhere to zoom back out.</p>
	<hr />

	<h3>PRETTY CODE</h3>
	<p>Code syntax highlighting courtesy of highlight.js.</p>' );
}

/**
 * add Dashboard Widget via function wp_add_dashboard_widget()
 */
function wp_presenter_dashboard_setup() {
	wp_add_dashboard_widget( 'my_wp_dashboard_test', __( 'Welcome to WP Presenter!' ), 'wp_presenter_dashboard' );
}

/**
 * use hook, to integrate new widget
 */
add_action('wp_dashboard_setup', 'wp_presenter_dashboard_setup');

function wp_presenter_dashboard_widget_first() {?>
	<h3>SPEAKER VIEW</h3>
	<p><b>There's a speaker view.</b><p>
	<p>It includes a timer, preview of the upcoming slide as well as your speaker. </p>
	<p><em>Press the S key to try it out.</em></p>
	<hr />
	<h3>TAKE A MOMENT</h3>
	<p>Press B or . on your keyboard to pause the presentation.</p>
	<p>This is helpful when you're on stage and want to take distracting slides off the screen.</p>
<?php
}

function wp_presenter_add_first_dashboard_widget() {
	wp_add_dashboard_widget('wp_presenter_dashboard_widget', __( 'Based on Reveal.js' ), 'wp_presenter_dashboard_widget_first');
}
add_action('wp_dashboard_setup', 'wp_presenter_add_first_dashboard_widget');