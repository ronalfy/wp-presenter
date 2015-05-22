<?php

class acf_field_oembed extends acf_field
{
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options


	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/

	function __construct()
	{
		// vars
		$this->name = 'oembed';
		$this->label = __('oEmbed');
		$this->category = __("Content",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field.
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			'preview_size' => 0, //aka default, let the oembed provider choose
			'returned_size' => 0,
			'returned_format' => 'html'
		);


		// do not delete!
    parent::__construct();


    // settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.2'
		);

	}


	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/

	function create_options($field)
	{
		// defaults?
		$field = array_merge($this->defaults, $field);

		// key is needed in the field names to correctly save the data
		$key = $field['name'];


		// Create Field Options HTML
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Preview Size",'acf'); ?></label>
				<p><?php _e("Shown when entering data",'acf') ?></p>
			</td>
			<td>
				<?php
				do_action('acf/create_field', array(
					'type'		=>	'radio',
					'name'		=>	'fields['.$key.'][preview_size]',
					'value'		=>	$field['preview_size'],
					'layout'	=>	'horizontal',
					'choices' 	=>	apply_filters('acf/get_image_sizes', array('Default'))
				));
				?>
			</td>
		</tr>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Returned Size",'acf'); ?></label>
				<p><?php _e("Size of embed returned to front end. Only applies to HTML and WP_oEmbed object return types. Default uses the max height and width defined in Media Settings.",'acf') ?></p>
			</td>
			<td>
				<?php
				do_action('acf/create_field', array(
					'type'		=>	'radio',
					'name'		=>	'fields['.$key.'][returned_size]',
					'value'		=>	$field['returned_size'],
					'layout'	=>	'horizontal',
					'choices' 	=>	apply_filters('acf/get_image_sizes', array('Default'))
				));
				?>
			</td>
		</tr>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Returned Format",'acf'); ?></label>
				<p><?php _e("Specify the returned format on front end",'acf') ?></p>
			</td>
			<td>
				<?php
				do_action('acf/create_field', array(
					'type'		=>	'radio',
					'name'		=>	'fields['.$key.'][returned_format]',
					'value'		=>	$field['returned_format'],
					'layout'	=>	'horizontal',
					'choices'	=> array(
						'html'		=>	__("Generated HTML",'acf'),
						'url'		=>	__("Original URL",'acf'),
						'object'	=>	__("Data Object",'acf'),
					)
				));
				?>
			</td>
		</tr>
		<?php

	}


	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function create_field( $field )
	{
		// defaults?
		$field = array_merge($this->defaults, $field);

		$dimensions = $this->get_image_size_dimensions($field['preview_size']);

		if ( $dimensions ) {
			$preview = wp_oembed_get($field['value'], $dimensions);
		} else {
			$preview = wp_oembed_get($field['value']);
		}

		// create Field HTML
		?>
		<div class="acf-oembed-field">
			<div class="embed_wrap" data-preview-width="<?php echo $dimensions['width'] ?>" data-preview-height="<?php echo $dimensions['height'] ?>"><?php echo $preview; ?></div>
			<div class="field-wrap">
				<div class="acf-input-prepend">URL</div>
				<div class="acf-input-wrap">
					<input type="url" id="<?php echo esc_attr($field['id']); ?>" class="<?php echo esc_attr($field['class']); ?>" name="<?php echo esc_attr($field['name']); ?>" value="<?php echo esc_attr($field['value']); ?>">
				</div>
			</div>
		</div>
		<?php
	}


	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add css + javascript to assist your create_field() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used


		// register acf scripts
		wp_register_script('acf-input-oembed', $this->settings['dir'] . 'js/input.min.js', array('acf-input'), $this->settings['version']);
		wp_register_style('acf-input-oembed', $this->settings['dir'] . 'css/input.css', array('acf-input'), $this->settings['version']);

		// scripts
		wp_enqueue_script(array(
			'acf-input-oembed',
		));

		// styles
		wp_enqueue_style(array(
			'acf-input-oembed',
		));

	}

	/*
	*  format_value_for_api()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is passed back to the api functions such as the_field
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/

	function format_value_for_api($value, $post_id, $field)
	{
		// defaults?
		$field = array_merge($this->defaults, $field);

		$dimensions = $this->get_image_size_dimensions($field['returned_size']);

		switch ($field['returned_format']) {
			case 'html':
				return $dimensions ? wp_oembed_get($value, $dimensions ) : wp_oembed_get($value);

			case 'object':
				return $dimensions ? $this->get_oembed_object($value, $dimensions ) : $this->get_oembed_object($value);

			default: // URL
				return $value;
		}

	}

	/**
	 *
	 * get_oembed_object()
	 *
	 * Returns oEmbed data object. Borrowed from WP_oEmbed->get_html.
	 * @param  string $url URL to attempt to retried
	 * @param  array $args eg. dimensions from get_image_size_dimensions
	 * @return object or false
	 */
	function get_oembed_object($url, $args = array()) {
		require_once( ABSPATH . WPINC . '/class-oembed.php' );
		$oembed = _wp_oembed_get_object();
		$provider = false;

		if ( !isset($args['discover']) )
			$args['discover'] = true;

		foreach ( $oembed->providers as $matchmask => $data ) {
			list( $providerurl, $regex ) = $data;

			// Turn the asterisk-type provider URLs into regex
			if ( !$regex ) {
				$matchmask = '#' . str_replace( '___wildcard___', '(.+)', preg_quote( str_replace( '*', '___wildcard___', $matchmask ), '#' ) ) . '#i';
				$matchmask = preg_replace( '|^#http\\\://|', '#https?\://', $matchmask );
			}

			if ( preg_match( $matchmask, $url ) ) {
				$provider = str_replace( '{format}', 'json', $providerurl ); // JSON is easier to deal with than XML
				break;
			}
		}

		if ( !$provider && $args['discover'] )
			$provider = $oembed->discover( $url );

		if ( !$provider || false === $data = $oembed->fetch( $provider, $url, $args ) )
			return false;

		return $data;
	}

	/**
	 *
	 * get_image_size_dimensions()
	 *
	 * Get width and height for a defined image size
	 * @param  string $size A defined image size, eg 'medium'
	 * @return array ['width'] & ['height'] or false
	 */
	function get_image_size_dimensions($size) {
		global $_wp_additional_image_sizes;
		if (isset($_wp_additional_image_sizes[$size])) {
			$width = intval($_wp_additional_image_sizes[$size]['width']);
			$height = intval($_wp_additional_image_sizes[$size]['height']);
		} else {
			$width = get_option($size.'_size_w');
			$height = get_option($size.'_size_h');
		}

		if ( $width && $height ) {
			return array(
				'width' => $width,
				'height' => $height
			);
		} else return false;
	}


}


// create field
new acf_field_oembed();

?>
