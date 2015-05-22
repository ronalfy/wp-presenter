<?php
/**
 * WP Presenter functions and definitions
 *
 * @package WP Presenter
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;/* pixels */
}

if (!function_exists('wp_presenter_setup')):

function wp_presenter_setup() {
	load_theme_textdomain( 'wp-presenter', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
endif;// ts_setup
add_action( 'after_setup_theme', 'wp_presenter_setup' );


function wp_presenter_scripts() {

	if ( ! is_admin() ) :
	wp_enqueue_script( 'wp-presenter-head-js', get_template_directory_uri() . '/assets/reveal/lib/js/head.min.js', array(), '', true );
	wp_enqueue_script( 'wp-presenter-core-js', get_template_directory_uri(). '/assets/reveal/js/reveal.js', array(), '', true );
	wp_enqueue_script( 'html5shiv', '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.js', array(), '3.7.2', false );

		$theme = esc_html( get_theme_mod( 'select_theme') );

		wp_enqueue_style( 'wp-presenter-style', get_stylesheet_uri() );
		wp_enqueue_style( 'wp-presenter-core', get_template_directory_uri() . '/assets/reveal/css/reveal.css' );

		if( $theme ) :
			wp_enqueue_style( 'wp-presenter-theme', get_template_directory_uri() . '/assets/reveal/css/theme/' . $theme . '.css' );
		endif;

		wp_enqueue_style( 'wp-presenter-zenburn', get_template_directory_uri() . '/assets/reveal/lib/css/monokai.css' );

	endif;
}
	add_action( 'wp_enqueue_scripts', 'wp_presenter_scripts' );

add_filter( 'script_loader_tag', function( $tag, $handle ) {
	if ( $handle === 'html5shiv' ) {
		$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
	}
	return $tag;
}, 10, 2 );

function wp_presenter_load_custom_wp_admin_style() {
	wp_enqueue_style( 'customize-preview-style', get_template_directory_uri().'/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'wp_presenter_load_custom_wp_admin_style' );


add_filter('acf/settings/path', 'my_acf_settings_path');

function acf_settings_path( $path ) {

	// update path
	$path = get_template_directory() . '/inc/acf/';

	// return
	return $path;

}
add_filter('acf/settings/dir', 'acf_settings_dir');

function my_acf_settings_dir( $dir ) {

	// update path
	$dir = get_template_directory_uri() . '/inc/acf/';

	// return
	return $dir;

}


// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_template_directory() . '/acf/acf.php' );


require get_template_directory().'/inc/custom-controls/kirki.php';
require get_template_directory().'/inc/template-tags.php';
require get_template_directory().'/inc/customizer.php';
require get_template_directory().'/inc/reveal-settings.php';
require get_template_directory().'/inc/post-type.php';
require get_template_directory().'/inc/meta-functions.php';
require get_template_directory().'/inc/add-dashboard-widgets.php';
require get_template_directory().'/inc/acf/acf.php';
require get_template_directory().'/inc/acf-image-select/acf-image-select.php';
require get_template_directory().'/inc/acf-code/acf-code_area.php';