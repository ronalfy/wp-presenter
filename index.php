<?php
/**
 * The main page for displaying the slideshow.
 *
 * @package WP Presenter
 */
get_header();?>

	<?php $slides = get_posts( 'post_type=slide&post_status=publish&posts_per_page=-1&orderby=menu_order&order=ASC' );?>

	<?php foreach ( $slides as $slide ) : ?>
	<?php
			$vslides = get_post_meta( $slide->ID, 'add_a_vertical_slide', true );
			$vslide_title = get_post_meta( $slide->ID, 'vertical_slide_title', true );
			$vslide_content = get_post_meta( $slide->ID, 'vertical_slide_content', true );
			// Video Background
			$video_bkg = get_post_meta( $slide->ID, 'video', true );
			$video_src = get_attached_media( $video_bkg );
			$video_url = wp_get_attachment_url( $video_bkg );
			// Full Size Image Background
			$bkg_img = get_post_meta( $slide->ID, 'image', true );
			$bkg_img_url = wp_get_attachment_image_src( $bkg_img, 'full' );
			// Iframe
			$iframe = get_post_meta( $slide->ID, 'iframe', true );
			// Color
			$bkg_color = get_post_meta( $slide->ID, 'background_color', true );
	?>

	<?php if( $vslides[0] == 'vertical_slide_yes' ) : ?>
		<section><?php // This OPENING tag will only exist if there are vertical slides that need to be nested with the main slide ?>
	<?php endif;?>

		<?php // If a slide has a background video chosen ?>
		<?php if ( get_post_meta ( $slide->ID, 'change_slide_background', true )  == 'Video' ) : ?>
			<?php // display the video as a data-attribute ?>
			<section id="video-background" class="stretch" data-background-video="<?php echo $video_url; ?>">
			<?php endif;?>

			<?php // if a slide has a background color chosen ?>
		<?php if ( '' != get_post_meta ( $slide->ID, 'background_color', true ) ) : ?>
			<?php // display the background color as a data-attribute ?>
			<section id="background-color" data-background="<?php echo $bkg_color; ?>">
		<?php endif;?>

			<?php // if a slide has a background image chosen ?>
		<?php if ( $bkg_img ) : ?>
			<?php // display the image url as a data-attribute ?>
			<section id="background-image" data-background="<?php echo $bkg_img_url[0]; ?>">
		<?php endif;?>

			<?php // if a slide has an iframe chosen ?>
		<?php if ( $iframe ) :?>
			<?php // display the image url as a data-attribute ?>
			<section id="iframe" data-background-iframe="<?php echo $iframe['url'];?>">
		<?php endif;?>

		<?php // if a slide has no alternate background chosen ?>
		<?php if ( 'Select One' == get_post_meta( $slide->ID, 'change_slide_background', true ) ) :?>
	<section>
		<?php endif;?>

					<?php // title ?>
					<h2 class="title"><?php echo $slide->post_title; ?></h2>

					<?php // subtitle ?>
					<?php $subtitle = get_post_meta( $slide->ID, 'subtitle', true );if( $subtitle ) :?>
						<h3 class="title"><?php echo $subtitle;?></h3>
					<?php endif ?>

					<?php // content ?>
					<?php $content_title_content = get_post_meta( $slide->ID, 'slide_content_title_content', true ); if( $content_title_content ) :?>
					<div class="content"><?php echo $content_title_content;?></div>
					<?php endif ?>

					<?php // content left column ?>
					<?php $content_left = get_post_meta( $slide->ID, 'content_left_column_two_columns', true );if( $content_left ) :?>
						<div class="content-left"><?php echo $content_left;?></div>
					<?php endif ?>

					<?php // content right column ?>
					<?php $content_right = get_post_meta( $slide->ID, 'content_right_column_two_columns', true );if( $content_right ) :?>
						<div class="content-right"><?php echo $content_right;?></div>
					<?php endif ?>

					<?php // content - content left image right ?>
					<?php $content_left_image_right = get_post_meta( $slide->ID, 'content_content_image_right', true );if( $content_left_image_right ) :?>
						<div class="content-left"><?php echo $content_left_image_right;?></div>
					<?php endif ?>

					<?php // image - content left image right ?>
					<?php $image_right = get_post_meta( $slide->ID, 'image_content_image_right', true );if( $image_right ) :
						$image_url = wp_get_attachment_image_src( $image_right, 'full' );?>
						<div class="content-right"><img src="<?php echo $image_url[0]; ?>"></div>
					<?php endif ?>

					<?php // image - title/image ?>
					<?php $image = get_post_meta( $slide->ID, 'image_title_image', true );if( $image ) :
						$image_url = wp_get_attachment_image_src( $image, 'full' );?>
						<img src="<?php echo $image_url[0]; ?>">
					<?php endif ?>

					<?php // code ?>
					<?php $code = get_post_meta( $slide->ID, 'code', true );if( $code ) : ?>
						<pre>
							<code data-trim>
								<?php echo $code;?>
							</code>
						</pre>
					<?php endif ?>

								<?php $speaker_notes = get_post_meta( get_the_ID(), 'speaker_notes', true ); if( $speaker_notes ) : ?>
								<aside class="notes">
									<?php echo $speaker_notes; ?>
								</aside>
								<?php endif ?>
	</section><?php // slide end ?>

				<?php // vertical slides start here ?>
				<?php if( $vslides[0] == 'vertical_slide_yes' ) : ?>
					<section>
					        <h2 class="title"><?php echo $vslide_title;?></h2>
						<?php echo $vslide_content;?>
					</section>
					<?php endif;?>
			    <?php // vertical slide ends here ?>

	<?php if( $vslides[0] == 'vertical_slide_yes' ) : ?>
		</section><?php // This CLOSING tag will only exist if there are vertical slides that need to be nested with the main slide ?>
		<?php endif ?>
	<?php endforeach ;?>

<?php get_footer(); ?>