<?php

function wp_presenter_dashboard_widget_first() { ?>
	<h3>SLIDE OVERVIEW</h3>
	<p>Press ESC to enter the slide overview.</p>
	<p>Hold down alt and click on any element to zoom in on it using zoom.js. Alt + click anywhere to zoom back out.</p>
	<hr />
	<h3>THEMES</h3>
	<p>reveal.js comes with a few themes built in:</p>
	<p>Black (default) - White - League - Sky - Beige - Simple
		Serif - Blood - Night - Moon - Solarized</p>
	<p><em>You can change the theme and many other settings in the Customizer. ( Appearance > Customizer )</em></p>
	<hr />
	<h3>SPEAKER VIEW</h3>
	<p><b>There's a speaker view.</b><p>
	<p>It includes a timer, preview of the upcoming slide as well as your speaker. </p>
	<p><em>Press the S key to try it out.</em></p>
	<hr />
	<h3>TAKE A MOMENT</h3>
	<p>Press B or . on your keyboard to pause the presentation.</p>
	<p>This is helpful when you're on stage and want to take distracting slides off the screen.</p>
	<hr />
	<h3>PRETTY CODE</h3>
	<p>Code syntax highlighting courtesy of highlight.js.</p>
	<hr />
<?php
}

function wp_presenter_dashboard_widget_second() { ?>
	<h3>SPEAKER VIEW</h3>
	<p><b>There's a speaker view.</b><p>
	<p>It includes a timer, preview of the upcoming slide as well as your speaker. </p>
	<p><em>Press the S key to try it out.</em></p>
	<hr />
	<h3>TAKE A MOMENT</h3>
	<p>Press B or . on your keyboard to pause the presentation.</p>
	<p>This is helpful when you're on stage and want to take distracting slides off the screen.</p>
	<hr />
	<h3>PRETTY CODE</h3>
	<p>Code syntax highlighting courtesy of highlight.js.</p>
	<hr />
<?php
}
function wp_presenter_add_first_dashboard_widget() {
	wp_add_dashboard_widget('wp_presenter_dashboard_widget', 'Reveal.js', 'wp_presenter_dashboard_widget_first');
}
add_action('wp_dashboard_setup', 'wp_presenter_add_first_dashboard_widget');

function wp_presenter_add_second_dashboard_widget() {
	wp_add_dashboard_widget('wp_presenter_dashboard_widget', 'Reveal.js', 'wp_presenter_dashboard_widget_second');
}
add_action('wp_dashboard_setup', 'wp_presenter_add_second_dashboard_widget');