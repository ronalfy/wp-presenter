<?php
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
				'message' => 'Select a slide layout from the choices below. For the slide title use the title field above. If you need a "title only" slide use the title field only.',
			),
			array (
				'key' => 'field_555da5a232a39',
				'label' => 'Slide Layout',
				'name' => 'slide_layout',
				'type' => 'select',
				'choices' => array (
					'blank' => 'Blank (No Content)',
					'title' => 'Title',
					'title-subtitle' => 'Title/Subtitle',
					'title-content' => 'Title/Content',
					'two-columns' => 'Two Columns',
					'content-image-right' => 'Content/Image Right',
					'title-image' => 'Title/Image',
					'code' => 'Code',
					'iframe' => 'Iframe',
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
				'type' => 'textarea',
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
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_556110fc268ee',
				'label' => 'Iframe',
				'name' => 'iframe',
				'type' => 'website',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555da5a232a39',
							'operator' => '==',
							'value' => 'iframe',
						),
					),
					'allorany' => 'all',
				),
				'website_title' => 0,
				'internal_link' => 0,
				'output_format' => 0,
				'default_value' => '',
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
				'key' => 'field_555db1300eb40',
				'label' => 'Video',
				'name' => 'video',
				'type' => 'file',
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
				'save_format' => 'url',
				'library' => 'all',
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