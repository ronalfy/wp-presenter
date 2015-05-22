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
include_once( get_template_directory() . '/inc/acf/acf.php' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slide-layout-and-content',
		'title' => 'Slide Layout and Content',
		'fields' => array (
			array (
				'key' => 'field_555e5943f7126',
				'label' => 'Select a Layout',
				'name' => '',
				'type' => 'message',
				'message' => 'Select a slide layout from the choices below.
	For the slide title use the title field above.
	If you need a "title only" slide use the title field only.',
			),
			array (
				'key' => 'field_555da5a232a39',
				'label' => 'Slide Layout',
				'name' => 'slide_layout',
				'type' => 'select',
				'choices' => array (
					'title' => 'Title',
					'title-subtitle' => 'Title/Subtitle',
					'title-content' => 'Title/Content',
					'two-columns' => 'Two Columns',
					'content-image-right' => 'Content/Image Right',
					'title-image' => 'Title/Image',
					'code' => 'Code',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_555dacc5f7e6e',
				'label' => 'Subtitle',
				'name' => 'subtitle',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'title-subtitle',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_555da9b147076',
				'label' => 'Slide Content',
				'name' => 'slide_content_title_content',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'title-content',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_555da6d101849',
				'label' => 'Content - Left Column',
				'name' => 'content_left_column_two_columns',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'two-columns',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_555da7090184a',
				'label' => 'Content - Right Column',
				'name' => 'content_right_column_two_columns',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'two-columns',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_555da7d6d76b9',
				'label' => 'Image',
				'name' => 'image_title_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'title-image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_555da861d76bb',
				'label' => 'Content',
				'name' => 'content_content_image_right',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'content-image-right',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_555da884d76bc',
				'label' => 'Image',
				'name' => 'image_content_image_right',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'content-image-right',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_555daf944d148',
				'label' => 'Code',
				'name' => 'code',
				'type' => 'code_area',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'code',
						),
					),
					'allorany' => 'all',
				),
				'language' => 'htmlmixed',
				'theme' => 'monokai',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_vertical-slides',
		'title' => 'Vertical Slides',
		'fields' => array (
			array (
				'key' => 'field_555dae89fc8c5',
				'label' => 'Add a Vertical Slide',
				'name' => 'add_a_vertical_slide',
				'type' => 'checkbox',
				'choices' => array (
					'vertical_slide_yes' => 'Yes',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_555daedcfc8c6',
				'label' => 'Slide Title',
				'name' => 'vertical_slide_title',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555dae89fc8c5',
							'operator' => '==',
							'value' => 'vertical_slide_yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_555daefafc8c7',
				'label' => 'Slide Content',
				'name' => 'vertical_slide_content',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555dae89fc8c5',
							'operator' => '==',
							'value' => 'vertical_slide_yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_slide-background',
		'title' => 'Slide Background',
		'fields' => array (
			array (
				'key' => 'field_555db03c0eb3c',
				'label' => 'Change Slide Background',
				'name' => 'change_slide_background',
				'type' => 'select',
				'choices' => array (
					'Select One' => 'Select One',
					'Color' => 'Color',
					'Image' => 'Image',
					'Tiled Image' => 'Tiled Image',
					'Video' => 'Video',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_555db0cb0eb3d',
				'label' => 'Background Color',
				'name' => 'background_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555db03c0eb3c',
							'operator' => '==',
							'value' => 'Color',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),
			array (
				'key' => 'field_555db0ee0eb3e',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555db03c0eb3c',
							'operator' => '==',
							'value' => 'Image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_555db10a0eb3f',
				'label' => 'Tiled Image',
				'name' => 'tiled_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555db03c0eb3c',
							'operator' => '==',
							'value' => 'Tiled Image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_555db1300eb40',
				'label' => 'Video',
				'name' => 'video',
				'type' => 'oembed',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555db03c0eb3c',
							'operator' => '==',
							'value' => 'Video',
						),
					),
					'allorany' => 'all',
				),
				'preview_size' => 'medium',
				'returned_size' => 'full',
				'returned_format' => 'url',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_speaker-notes',
		'title' => 'Speaker Notes',
		'fields' => array (
			array (
				'key' => 'field_555db2aae3dac',
				'label' => 'Add Speaker Notes',
				'name' => 'add_speaker_notes',
				'type' => 'checkbox',
				'choices' => array (
					'speaker_notes_yes' => 'Yes',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_555db36a3c1c1',
				'label' => 'Note',
				'name' => '',
				'type' => 'message',
				'message' => 'Speaker view includes a timer, preview of the upcoming slide as well as your speaker notes.

	Press the `S` key during the slideshow to activate Speaker View',
			),
			array (
				'key' => 'field_555db2e6e3dad',
				'label' => 'Speaker Notes',
				'name' => 'speaker_notes',
				'type' => 'textarea',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555db2aae3dac',
							'operator' => '==',
							'value' => 'speaker_notes_yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 4,
	));
}




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