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
	$theme = get_theme_mod( 'select_theme');

	wp_enqueue_style( 'wp-presenter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wp-presenter-core', get_template_directory_uri() .'/assets/reveal/css/reveal.css', array(), '', false );
	wp_enqueue_style( 'wp-presenter-theme', get_template_directory_uri() . '/assets/reveal/css/theme/' . $theme . '.css' );
	wp_enqueue_style( 'wp-presenter-zenburn', get_template_directory_uri() . '/assets/reveal/lib/css/zenburn.css', array(), '');
	wp_enqueue_script( 'wp-presenter-head-js', get_template_directory_uri() . '/assets/reveal/lib/js/head.min.js', array(), '', true );
	wp_enqueue_script( 'wp-presenter-core-js', get_template_directory_uri(). '/assets/reveal/js/reveal.js', array(), '', true );
	wp_enqueue_script( 'html5shiv', '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.js', array(), '3.7.2', false );
}
	add_action( 'wp_enqueue_scripts', 'wp_presenter_scripts' );

add_filter( 'script_loader_tag', function( $tag, $handle ) {
	if ( $handle === 'html5shiv' ) {
		$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
	}
	return $tag;
}, 10, 2 );

//function wp_presenter_load_custom_wp_admin_style() {
//	wp_enqueue_style('customize-preview-style', get_template_directory_uri().'/assets/css/admin.css');
//}
//add_action('admin_enqueue_scripts', 'wp_presenter_load_custom_wp_admin_style');

//function my_enqueue($hook) {
//	if ( 'post.php' != $hook ) {
//		return;
//	}
//
//	wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/assets/js/admin.js' );
//}
//add_action( 'admin_enqueue_scripts', 'my_enqueue' );

function reveal_homepage_slides( &$query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$query->set( 'post_type', 'slide' );
		$query->set( 'posts_per_page', -1 );
		$query->set( 'paged', 1 );
		$query->set( 'orderby', 'menu_order date' );
		$query->set( 'order', 'ASC' );
	}
}

add_action( 'pre_get_posts', 'reveal_homepage_slides' );
/**
 * Template Tags
 */
function reveal_get_slides() {
	$slides = get_post_meta( get_the_ID(), 'add_a_vertical_slide', true );
	if ( empty( $slides ) ) {
		return array();
	}
	return (array) $slides;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';
/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';
require get_template_directory().'/inc/reveal-settings.php';
require get_template_directory().'/inc/post-type.php';
require get_template_directory().'/inc/meta-functions.php';
require get_template_directory().'/inc/custom-controls/kirki.php';
require get_template_directory().'/inc/kirki.php';
