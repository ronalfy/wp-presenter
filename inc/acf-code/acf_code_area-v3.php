<?php

class acf_field_code_area extends acf_Field
{
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*	- This function is called when the field class is initalized on each page.
	*	- Here you can add filters / actions and setup any other functionality for your field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
		// do not delete!
    	parent::__construct($parent);
    	
    	// set name / title
    	$this->name = 'code_area';
		$this->title = __('Code Area');
		$this->defaults = array(
			// add default here to merge into your field. 
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
		);
		
		
		// settings
		// settings
		$this->settings = array(
			'path' => $this->helpers_get_path( __FILE__ ),
			'dir' => $this->helpers_get_dir( __FILE__ ),
			'version' => '1.0.0'
		);
		
   	}
   	
   	
   	/*
    *  helpers_get_path
    *
    *  @description: calculates the path (works for plugin / theme folders)
    *  @since: 3.6
    *  @created: 30/01/13
    */
    
    function helpers_get_path( $file )
    {
        return trailingslashit(dirname($file));
    }
    
    
    
    /*
    *  helpers_get_dir
    *
    *  @description: calculates the directory (works for plugin / theme folders)
    *  @since: 3.6
    *  @created: 30/01/13
    */
    
    function helpers_get_dir( $file )
    {
        $dir = trailingslashit(dirname($file));
        $count = 0;
        
        
        // sanitize for Win32 installs
        $dir = str_replace('\\' ,'/', $dir); 
        
        
        // if file is in plugins folder
        $wp_plugin_dir = str_replace('\\' ,'/', WP_PLUGIN_DIR); 
        $dir = str_replace($wp_plugin_dir, WP_PLUGIN_URL, $dir, $count);
        
        
        if( $count < 1 )
        {
	        // if file is in wp-content folder
	        $wp_content_dir = str_replace('\\' ,'/', WP_CONTENT_DIR); 
	        $dir = str_replace($wp_content_dir, WP_CONTENT_URL, $dir, $count);
        }
        
        
        if( $count < 1 )
        {
	        // if file is in ??? folder
	        $wp_dir = str_replace('\\' ,'/', ABSPATH); 
	        $dir = str_replace($wp_dir, site_url('/'), $dir);
        }
        

        return $dir;
    }

	
	/*--------------------------------------------------------------------------------------
	*
	*	create_options
	*	- this function is called from core/field_meta_box.php to create extra options
	*	for your field
	*
	*	@params
	*	- $key (int) - the $_POST obejct key required to save the options to the field
	*	- $field (array) - the field object
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		
		// Create Field Options HTML
		?>

		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Language",'acf'); ?></label>
				<p class="description"><?php _e("",'acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'radio',
					'name'	=>	'fields['.$key.'][language]',
					'value'	=>	$field['language'],
					'choices' => array(
						'css'	=>	__("CSS",'acf'),
						'javascript'	=>	__("Javascript",'acf'),
						'htmlmixed'	=>	__("HTML",'acf'),
						'php'	=>	__("PHP",'acf'),
					)
				));
				?>
			</td>
		</tr>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Theme",'acf'); ?></label>
				<p class="description"><?php _e("Set a theme for the editor (<a href=\"http://codemirror.net/demo/theme.html\" target=\"_blank\">Preview Here</a>) ",'acf'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'select',
					'name'	=>	'fields['.$key.'][theme]',
					'value'	=>	$field['theme'],
					'choices' => array(
						'default'	=>	__("Default",'acf'),
						'ambiance'	=>	__("Ambiance",'acf'),
						'blackboard'	=>	__("Blackboard",'acf'),
						'cobalt'	=>	__("Cobalt",'acf'),
						'eclipse'	=>	__("Eclipse",'acf'),
						'elegant'	=>	__("Elegant",'acf'),
						'erlang-dark'	=>	__("Erlang Dark",'acf'),
						'lesser-dark'	=>	__("Lesser Dark",'acf'),
						'midnight'	=>	__("Midnight",'acf'),
						'monokai'	=>	__("Monokai",'acf'),
						'neat'	=>	__("Neat",'acf'),
						'night'	=>	__("Night",'acf'),
						'rubyblue'	=>	__("Rubyblue",'acf'),
						'solarized'	=>	__("Solarized",'acf'),
						'twilight'	=>	__("Twilight",'acf'),
						'vibrant-ink'	=>	__("Vibrant Ink",'acf'),
						'xq-dark'	=>	__("XQ Dark",'acf'),
						'xq-light'	=>	__("XQ Light",'acf'),
					)
				));
				?>
			</td>
		</tr>

		<?php
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	pre_save_field
	*	- this function is called when saving your acf object. Here you can manipulate the
	*	field object and it's options before it gets saved to the database.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function pre_save_field($field)
	{
		// Note: This function can be removed if not used
		
		// do stuff with field (mostly format options data)
		
		return parent::pre_save_field($field);
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	create_field
	*	- this function is called on edit screens to produce the html for this field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field( $field )
	{
		$field['value'] = esc_textarea($field['value']);

		$language = '';
		switch($field["language"]){
			case 'css':
				$language = 'CSS';
				break;
			case 'javascript':
				$language = 'Javascript';
				break;
			case 'htmlmixed':
				$language = 'HTML';
				break;
			case 'php':
				$language = 'PHP';
				break;
		}

		echo '<textarea id="' . $field['id'] . '" rows="4" class="' . $field['class'] . '" name="' . $field['name'] . '" >' . $field['value'] . '</textarea>';
		echo '<p style="margin-bottom:0;"><small>You are writing '.$language.' code.</small></p>';
  		?>

		<link rel="stylesheet" href="<?php echo $this->settings['dir'];?>/css/theme/<?= $field["theme"];?>.css">
		<script>
	  		jQuery(document).ready(function($){
				var editor_<?= str_replace('-', '_', $field['id']);?> = CodeMirror.fromTextArea(document.getElementById('<?= $field['id'];?>'), {
			        lineNumbers: true,
			        tabmode: 'indent',
			        mode: '<?= $field["language"];?>',
			        theme: '<?= $field["theme"];?>'
			    });
			});
	  	</script>

		<?php
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	admin_head
	*	- this function is called in the admin_head of the edit screen where your field
	*	is created. Use this function to create css and javascript to assist your 
	*	create_field() function.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_head()
	{
		// Note: This function can be removed if not used
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	admin_print_scripts / admin_print_styles
	*	- this function is called in the admin_print_scripts / admin_print_styles where 
	*	your field is created. Use this function to register css and javascript to assist 
	*	your create_field() function.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_print_scripts()
	{
		

		// register acf scripts
		wp_enqueue_script( 'acf-input-code_area-code_mirror_js', $this->settings['dir'] . 'js/codemirror.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_js', $this->settings['dir'] . 'js/mode/javascript.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_css', $this->settings['dir'] . 'js/mode/css.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_html', $this->settings['dir'] . 'js/mode/htmlmixed.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_xml', $this->settings['dir'] . 'js/mode/xml.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_php', $this->settings['dir'] . 'js/mode/php.js' );
		wp_enqueue_script( 'acf-input-code_area-code_mirror_mode_clike', $this->settings['dir'] . 'js/mode/clike.js' );

		
	}
	
	function admin_print_styles()
	{
		
		wp_register_style( 'acf-input-code_area-code_mirror_css', $this->settings['dir'] . 'css/codemirror.css', array('acf-input'), $this->settings['version'] ); 

		// styles
		wp_enqueue_style(array(
			'acf-input-code_area-code_mirror_css',	
		));

	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	update_value
	*	- this function is called when saving a post object that your field is assigned to.
	*	the function will pass through the 3 parameters for you to use.
	*
	*	@params
	*	- $post_id (int) - usefull if you need to save extra data or manipulate the current
	*	post object
	*	- $field (array) - usefull if you need to manipulate the $value based on a field option
	*	- $value (mixed) - the new value of your field.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function update_value($post_id, $field, $value)
	{
		// Note: This function can be removed if not used
		
		// do stuff with value
		
		// save value
		parent::update_value($post_id, $field, $value);
	}
	
	
	
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value
	*	- called from the edit page to get the value of your field. This function is useful
	*	if your field needs to collect extra data for your create_field() function.
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value($post_id, $field)
	{
		// Note: This function can be removed if not used
		
		// get value
		$value = parent::get_value($post_id, $field);
		
		// format value
		
		// return value
		return $value;		
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*	- called from your template file when using the API functions (get_field, etc). 
	*	This function is useful if your field needs to format the returned value
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		// Note: This function can be removed if not used
		
		// get value
		$value = $this->get_value($post_id, $field);
		
		switch($field["language"]){
			case 'css':
				return '<style>'.$value.'</style>';
				break;
			case 'javascript':
				return '<script>'.$value.'</script>';
				break;
			case 'htmlmixed':
				return nl2br($value);
				break;
			case 'php':
				return eval($value);
				break;
			default:
				return $value;
		}

		return $value;

	}
	
}

?>