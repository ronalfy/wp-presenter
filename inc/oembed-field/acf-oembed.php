<?php
/*
Plugin Name: Advanced Custom Fields: oEmbed Field
Plugin URI: https://github.com/dmsqd/acf-oembed-field
Description: Adds a oEmbed field type to Advanced Custom Fields
Version: 1.0.3
Author: DMSQD
Author URI: http://dmsqd.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class acf_field_oembed_plugin
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
		// set text domain
		/*
		$domain = 'acf-oembed';
		$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
		load_textdomain( $domain, $mofile );
		*/


		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));


		// version 3-
		add_action('init', array( $this, 'init' ), 5);

		//register ajax handler
		require_once(dirname(__FILE__) . '/oembed-ajax.php' );
		add_action( 'wp_ajax_acf_oembed_handler', array( 'acf_oembed_ajax', 'oembed_handler' ) );

	}


	/*
	*  Init
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	// TODO: support v3 later

	function init()
	{
		if(function_exists('register_field'))
		{
			// register_field('acf_field_oembed', dirname(__File__) . '/oembed-v3.php');
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
		include_once(dirname(__FILE__) . '/oembed-v4.php');
	}

}

new acf_field_oembed_plugin();

?>
