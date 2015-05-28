<?php


class acf_field_image_select_plugin {
	/*
	*  Construct
	*
	*  @description:
	*  @since: 3.6
	*  @created: 04/02/2014
	*/

	function __construct() {
		// set text domain
		/*
		$domain = 'acf-image_select';
		$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
		load_textdomain( $domain, $mofile );
		*/


		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));
	}

	/*
	*  register_fields
	*
	*  @description:
	*  @since: 3.6
	*  @created: 04/02/2014
	*/

	function register_fields() {
		include_once('image-select-v4.php');
	}

}
new acf_field_image_select_plugin();