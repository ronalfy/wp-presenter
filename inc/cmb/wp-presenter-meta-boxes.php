<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

function wp_presenter_metaboxes( array $meta_boxes ) {

	// Toggle Content Area

//	$meta_boxes[] = array(
//		'title' => 'Slide Layout',
//		'pages' => 'slide',
//		'fields' => array(
//			array(
//				'id'      => 'slide_layout',
//				'name'    => 'Select Slide Layout',
//				'type'    => 'select',
//				'options' => array(
//					'select_layout' => 'Select a Layout',
//					'single-column-content' => 'One Column',
//					'two-column-content' => 'Two Columns',
//				)
//			),
//		)
//	);

	// Content Area
	$meta_boxes[] = array(
		'title' => 'Single Column Content',
		'pages' => 'slide',
		'fields' => array(
			array(
				'id' => 'content',
				'name' => '',
				'type' => 'wysiwyg',
				'options' => array(
					'editor_height' => '100'
				)
			),
		)
	);

	$meta_boxes[] = array(
		'title' => 'Two Column Content',
		'pages' => 'slide',
		'type' => 'group',
		'fields' => array(
			array(
				'id' => 'first_column_content',
				'name' => 'Content - First Column',
				'type' => 'wysiwyg',
				'cols' => 6
			),
			array(
				'id' => 'second_column_content',
				'name' => 'Content - Second Column',
				'type' => 'wysiwyg',
				'cols' => 6
			),

		),
	);

	// Toggle Vertical Slides

//	$meta_boxes[] = array(
//		'title' => 'Vertical Slides',
//		'pages' => 'slide',
//		'fields' => array(
//			array(
//				'id'   => 'vertical_slide',
//				'name' => 'Add a Vertical Slide',
//				'type' => 'checkbox',
//			),
//		)
//	);


	// Vertical Slides
	$vertical_slides_group = array(

		array(
			'id' => 'vertical_slide_content',
			'name' => 'Vertical Slides',
			'type' => 'group',
			'repeatable' => true,
			'sortable' => true,
			'fields' => array(
				array(
					'id' => 'title',
					'name' => 'Title',
					'type' => 'text',
				),
				array(
					'id' => 'content',
					'name' => 'Content',
					'type' => 'wysiwyg',
				),
			)
		),
	);

	$meta_boxes[] = array(
		'title' => 'Vertical Slide Content',
		'pages' => 'slide',
		'fields' => $vertical_slides_group
	);

	// Toggle Data Attributes

//	$meta_boxes[] = array(
//		'title' => 'Add Data Attributes',
//		'pages' => 'slide',
//		'fields' => array(
//			array(
//				'id'   => 'data_attributes_toggle',
//				'name' => 'Add Data Attributes',
//				'type' => 'checkbox',
//			),
//		)
//	);

	// Data Attributes

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

	// Toggle Speaker Notes

//	$meta_boxes[] = array(
//		'title' => 'Add Speaker Notes',
//		'pages' => 'slide',
//		'fields' => array(
//			array(
//				'id'   => 'speaker_notes_toggle',
//				'name' => 'Add Speaker Notes',
//				'type' => 'checkbox',
//			),
//		)
//	);

	// Speaker Notes

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
