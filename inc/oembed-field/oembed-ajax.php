<?php

class acf_oembed_ajax
{
	function oembed_handler() {
		//grab and escape args
		$args = array(
			'width' => intval($_POST['width']),
			'height' => intval($_POST['height'])
		);

		// generate the oEmbed
		$embed = wp_oembed_get($_POST['oembed_url'], $args);

		// generate the response
		if ( $embed ) {
			$response = json_encode( array( 'success' => true, 'embed' => $embed ) );
		} else {
			$response = json_encode( array('success' => false, 'embed' => 'Not a valid oEmbed source') );
		}

		// response output
		header( "Content-Type: application/json" );
		echo $response;

		exit;
	}
}