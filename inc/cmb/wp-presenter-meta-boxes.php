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

	$vertical_slides_fields = array(
		array(
			'id'    => 'Slide Title',
			'name'  => 'Slide Title',
			'type'  => 'text'
		),
		array(
			'id' => 'vertical_content_area',
			'name' => 'WYSIWYG field',
			'type' => 'wysiwyg',
			'options' =>
				array(
					'editor_height' => '100'
				),
			'repeatable' => true,
			'sortable' => true
		),
	);

	$vertical_slide_group = $vertical_slides_fields;
	foreach ($vertical_slide_group as &$field ) {
		$field['id'] = str_replace( 'field', 'gfield', $field['id'] );
	}
	$meta_boxes[] = array(
		'title' => 'Vertical Slides',
		'pages' => 'slide',
		'fields' => array(
			array(
				'id' => 'vertical_slides_group',
				'name' => 'Add as many vertical slides as you want.',
				'type' => 'group',
				'repeatable' => true,
				'sortable' => true,
				'fields' =>	$vertical_slide_group,
				'desc' => 'The content area fields work the same way here as they do in the main slide area.'
			)
		)
	);

	$groups_and_cols = array(

		array(
			'id' => 'data_attribute_transition',
			'name' => 'Data Attribute',
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
			'name' => 'Data Attribute',
			'type' => 'group',
			'cols' => 6,
			'fields' => array(
				array(
					'id' => 'gac-2',
					'name' => 'Background Color',
					'type' => 'colorpicker',
				),
			)
		),

		array(
			'id' => 'data_attribute_fullscreen_bkg',
			'name' => 'Data Attribute',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'gac-2',
					'name' => 'Fullscreen Background Image',
					'type' => 'image',
				),
			)
		),
		array(
			'id' => 'gac-4',
			'name' => 'Data Attribute',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'gac-2',
					'name' => 'Tiled Background Image',
					'type' => 'image',
				),
			)
		),

		array(
			'id' => 'gac-5',
			'name' => 'Data Attribute',
			'type' => 'group',
			'cols' => 4,
			'fields' => array(
				array(
					'id' => 'tiled_bkg',
					'name' => 'Video',
					'type' => 'image',
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
				'id' => 'main_content',
				'name' => 'Use this area for presentation notes. The notes window also gives you a preview of the next upcoming slide so it may be helpful even if you haven\'t written any notes. Press the \'s\' key on your keyboard to open the notes window.',
				'type' => 'textarea',
			),
		)
	);

	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'wp_presenter_metaboxes' );
