<?php
/*
Plugin Name: Advanced Custom Fields: Code Area
Plugin URI: https://github.com/taylormsj/acf-code_area-field
Description: Adds a 'Code Area' textarea editor to the Advanced Custom Fields WordPress plugin.
Version: 1.0.0
Author: Taylor Mitchell-St.Joseph
Author URI: https://github.com/taylormsj/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class acf_field_code_area_plugin
{
	/*
	*  Construct
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function __construct()
	{
		
		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));	

		
		// version 3-
		add_action( 'init', array( $this, 'init' ), 5);
	}
	
	
	/*
	*  Init
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function init()
	{
		if(function_exists('register_field'))
		{ 
			register_field('acf_field_code_area', dirname(__File__) . '/acf_code_area-v3.php');
		}
	}
	
	/*
	*  register_fields
	*
	*  @description: 
	*  @since: 3.6
	*  @created: 1/04/13
	*/
	
	function register_fields()
	{
		include_once('acf_code_area-v4.php');
	}
	
}

new acf_field_code_area_plugin();
		
?>
