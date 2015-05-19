<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Example of all available fields

	$meta_boxes[] = array(
		'title' => 'Slide Layout',
		'pages' => 'slide',
        'fields' => array(
	        array(
		        'id' => 'layout',
		        'name' => 'Select field',
		        'type' => 'select',
		        'options' => array(
			        '0' => 'Slide Layout',
			        'blank' => 'Blank',
			        'title-only' => 'Title Only',
			        'title-subtitle' => 'Title/Subtitle',
			        'title-bullets' => 'Title/Bullets',
			        'two-columms' => 'Two Columns',
			        'impact' => 'Impact',
			        'title-image' => 'Title/Image',
		        ),
		        'multiple' => false
	        ),
        )
	);
    $fields = array(
        array( 'id' => 'field-3', 'name' => 'text input', 'type' => 'text' ),

    );

	$meta_boxes[] = array(
		'title' => 'Title',
		'pages' => 'slide',
		'fields' => array(
			array(
				'id' => 'gp',
				'name' => '',
				'type' => 'text'
			)
		)
	);

	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
