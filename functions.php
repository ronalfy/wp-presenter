<?php
/**
 * WP Presenter functions and definitions
 *
 * @package WP Presenter
 */

if ( !isset( $content_width ) ) {
	$content_width = 1400;/* pixels */
}

if (!function_exists('wp_presenter_setup')):

function wp_presenter_setup() {
	load_theme_textdomain( 'wp-presenter', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
endif;
add_action( 'after_setup_theme', 'wp_presenter_setup' );


function wp_presenter_scripts() {

	wp_enqueue_script( 'wp-presenter-head-js', get_template_directory_uri() . '/assets/reveal/lib/js/head.min.js', array(), '', true );
	wp_enqueue_script( 'wp-presenter-core-js', get_template_directory_uri(). '/assets/reveal/js/reveal.js', array(), '', true );
	wp_enqueue_script( 'wp-presenter-print-pdf', get_template_directory_uri(). '/assets/reveal/plugin/print-pdf/print-pdf.js', array(1.0), '', false );
	wp_enqueue_script( 'html5shiv', '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.js', array(), '3.7.2', false );
	wp_enqueue_style( 'wp-presenter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wp-presenter-core', get_template_directory_uri() . '/assets/reveal/css/reveal.css' );
	wp_enqueue_style( 'wp-presenter-monokai', get_template_directory_uri() . '/assets/reveal/lib/css/monokai.css' );
	wp_enqueue_style( 'wp-presenter-pdf-styles', get_template_directory_uri() . '/assets/reveal/css/print/pdf.css' );
	//wp_enqueue_style( 'wp-presenter-print-styles', get_template_directory_uri() . '/assets/reveal/css/print/print.css' );

	$theme = get_theme_mod( 'select_theme' );
	if ( $theme ) :
		wp_enqueue_style( 'wp-presenter-display-theme', get_template_directory_uri() . '/assets/reveal/css/theme/' . $theme . '.css' );
	else :
		wp_enqueue_style( 'wp-presenter-default-theme', get_template_directory_uri() . '/assets/reveal/css/theme/sky.css' );
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

define( 'ACF_LITE', true );

require get_template_directory() . '/inc/custom-controls/kirki.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/reveal-settings.php';
require get_template_directory() . '/inc/post-type.php';
require get_template_directory() . '/inc/meta-functions.php';
require get_template_directory() . '/inc/dashboard-widgets.php';
require get_template_directory() . '/inc/acf/acf.php';
require get_template_directory() . '/inc/acf-image-select/acf-image-select.php';
require get_template_directory() . '/inc/acf-url-field/acf-website_field.php';
require get_template_directory() . '/inc/acf-fields.php';