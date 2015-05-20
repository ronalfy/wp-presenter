<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wp_presenter_metaboxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'title' => 'Main Content Area',
		'pages' => 'slide',
		'fields' => array(
			array(
				'id' => 'main_content',
				'name' => 'Use a single content area for a full screen layout. Add two content areas for a two column layout.',
				'type' => 'wysiwyg',
				'repeatable'     => true,
				'sortable' => true,
				'repeatable_max' => 2,
				'options' => array(
					'editor_height' => '100'
				)
			),
		)
	);

	$groups_and_cols = array(

		array(
			'id' => 'data_attribute_transition',
			'name' => '',
			'type' => 'group',
			'cols' => 6,
			'fields' => array(
				array(
					'id' => 'transition',
					'name' => 'Background Transition',
					'type' => 'text',
				),
			)
		),

		array(
			'id' => 'data_attribute_bkg_color',
			'name' => '',
			'type' => 'group',
			'cols' => 6,
			'fields' => array(
				array(
					'id' => 'data_bkg_color',
					'name' => 'Background Color',
					'type' => 'colorpicker',
				),
			)
		),

		array(
			'id' => 'data_attribute_fullscreen_bkg',
			'name' => '',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'data_bkg_image',
					'name' => 'Fullscreen Background Image',
					'type' => 'image',
				),
			)
		),
		array(
			'id' => 'data_bkg_row_2',
			'name' => '',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'data_bkg_image_tiled',
					'name' => 'Tiled Background Image',
					'type' => 'image',
				),
			)
		),

		array(
			'id' => 'data_bkg_video',
			'name' => '',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'bkg_video',
					'name' => 'Video',
					'type' => 'url',
				),
			)
		),
	);
	$meta_boxes[] = array(
		'title' => 'Data Attributes',
		'pages' => 'slide',
		'fields' => $groups_and_cols
	);

	$meta_boxes[] = array(
		'title' => 'Speaker Notes',
		'pages' => 'slide',
		'fields' => array(
			array(
				'id' => 'speaker_notes',
				'name' => 'Use this area for presentation notes. The notes window also gives you a preview of the next upcoming slide so it may be helpful even if you haven\'t written any notes. Press the \'s\' key on your keyboard to open the notes window.',
				'type' => 'textarea',
			),
		)
	);

	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'wp_presenter_metaboxes' );
