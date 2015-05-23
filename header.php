<?php
/**
 * The template for displaying the header.
 *
 * @package WP Presenter
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php wp_title( '', true, 'right' ) ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	$header_font    = get_theme_mod( 'header_typography' );
	$body_font      = get_theme_mod( 'other_typography' );

	if ( $header_font ) : ?>
	<style>
		@import url(<?php echo get_template_directory_uri() . '/assets/reveal/lib/font/' . $header_font . '/' . $header_font . '.css';?>);
		@import url(<?php echo get_template_directory_uri() . '/assets/reveal/lib/font/' . $body_font . '/' . $body_font . '.css';?>);
		.reveal h1,
		.reveal h2,
		.reveal h3,
		.reveal h4,
		.reveal h5,
		.reveal h6 {
			font-family: <?php echo '"' . $header_font . '"';?> !important;
		}

	<?php endif;?>
	<?php
	if ( $body_font ) : ?>
		.reveal {
			font-family: <?php echo '"' . $body_font . '"';?> !important;
		}
	</style>
	<?php endif;?>


    <?php wp_head(); ?>

</head>
<body>
	<div class="reveal">
		<div class="slides">