<?php




class acf_website_field_plugin
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

		// version 4
		add_action('acf/register_fields', array($this, 'register_field_website_v4'));

		// version 5
		add_action('acf/include_field_types', array($this, 'register_field_website_v5'));

		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_styles' ) );
	}


	/*
	*  register_fields
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function register_field_website_v4()
	{
		include_once('website_url_v4.php');
	}

	function register_field_website_v5()
	{
		include_once('website_url_v5.php');
	}

	/**
 	 * Registers and enqueues admin-specific styles.
 	 */
 	public function register_admin_styles() {
 		wp_enqueue_style( 'acf-website-field', get_template_directory_uri() . '/inc/acf-url-field/acf-website-field.css' );
 	} // end register_admin_styles


}

new acf_website_field_plugin();