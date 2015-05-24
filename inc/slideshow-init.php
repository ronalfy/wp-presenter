<?php
// Add a Sample Slide on theme activation

if (isset($_GET['activated']) && is_admin()){

	$new_page_title = 'Sample Slide';
	$new_page_content = '';
	$new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

	//don't change the code bellow, unless you know what you're doing

	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'slide',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

}