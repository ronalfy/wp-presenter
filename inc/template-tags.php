<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package trishasalas
 */

function reveal_get_slides() {
	$slides = get_post_meta( get_the_ID(), 'slides', true );
	if ( empty( $slides ) ) {
		return array();
	}
	return (array) $slides;
}

function reveal_section_attr( $slide ) {
	if ( empty( $slide ) ) {
		return '';
	}

	if ( ! empty( $slide['background'] ) && $url = wp_get_attachment_url( $slide['background'] ) ) {
		$slide['attr'][] = array( 'key' => 'data-background', 'value' => $url );
	}
	if ( ! empty( $slide['attr'] ) ) {
		$return = array( '' );
		foreach ( $slide['attr'] as $attr ) {
			$return[] = sprintf( '%s="%s"', sanitize_key( $attr['key'] ), esc_attr( $attr['value'] ) );
		}
		return implode( ' ', $return );
	}
	return '';
}

function ds_reveal_homepage_slides( &$query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$query->set( 'post_type', 'slide' );
		$query->set( 'posts_per_page', -1 );
		$query->set( 'paged', 1 );
		$query->set( 'orderby', 'menu_order date' );
		$query->set( 'order', 'ASC' );
	}
}

/**
 * Process a block of content as the_content() does.
 *
 * @param  string $content Content.
 * @return string
 */
function reveal_process_html_field( $content ) {
	$content = apply_filters( 'the_content', $content );
	return str_replace( ']]>', ']]&gt;', $content );
}