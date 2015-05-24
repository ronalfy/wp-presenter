<?php

/**
 * Template Tags
 */
function reveal_get_slides() {
	$slides = get_post_meta( get_the_ID(), 'add_a_vertical_slide', true );
	if ( empty( $slides ) ) {
		return array();
	}
	return (array) $slides;
}

function reveal_homepage_slides( &$query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$query->set( 'post_type', 'slide' );
		$query->set( 'posts_per_page', -1 );
		$query->set( 'paged', 1 );
		$query->set( 'orderby', 'menu_order date' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'reveal_homepage_slides' );