<?php
/**
 * The main page for displaying the slideshow.
 *
 * @package WP Presenter
 */
get_header();?>

	<?php $slides = get_posts( 'post_type=slide&post_status=publish&posts_per_page=-1&orderby=date&order=ASC' );?>

	<?php foreach ( $slides as $slide ) : ?>
	<?php $vslides = get_post_meta( $slide->ID, 'add_a_vertical_slide', true );
	$vslide_title = get_post_meta( $slide->ID, 'vertical_slide_title', true );
	$vslide_content = get_post_meta( $slide->ID, 'vertical_slide_content', true );?>

		<?php if( $vslides[0] == 'vertical_slide_yes' ) : ?>
			<section><!-- This OPENING tag will only exist if there are vertical slides that need to be nested with the main slide -->
		<?php endif;?>

				<section><!-- slide start -->

					<!-- title -->
					<h2><?php echo $slide->post_title; ?></h2>

					<!-- subtitle -->
					<?php $subtitle = get_post_meta( $slide->ID, 'subtitle', true );if( $subtitle ) :?>
						<h3><?php echo $subtitle;?></h3>
					<?php endif ?>

					<!-- content -->
					<?php $content_title_content = get_post_meta( $slide->ID, 'slide_content_title_content', true );if( $content_title_content ) :?>
					<div class="content"><?php echo $content_title_content;?></div>
					<?php endif ?>

					<!-- content left column -->
					<?php $content_left = get_post_meta( $slide->ID, 'content_left_column_two_columns', true );if( $content_left ) :?>
						<div class="content" style="width:48%;float:left;margin-top:40px;margin-right:2%;"><?php echo $content_left;?></div>
					<?php endif ?>

					<!-- content right column -->
					<?php $content_right = get_post_meta( $slide->ID, 'content_right_column_two_columns', true );if( $content_right ) :?>
						<div class="content" style="width:48%;float:right;margin-top:40px;"><?php echo $content_right;?></div>
					<?php endif ?>

					<!-- content - content left image right -->
					<?php $content_left_image_right = get_post_meta( $slide->ID, 'content_content_image_right', true );if( $content_left_image_right ) :?>
						<div class="content" style="width:48%;float:left;margin-top:40px;"><?php echo $content_left_image_right;?></div>
					<?php endif ?>

					<!-- image - content left image right -->
					<?php $image_right = get_post_meta( $slide->ID, 'image_content_image_right', true );if( $image_right ) :
						$image_url = wp_get_attachment_image_src( $image_right, 'full' );?>
						<img src="<?php echo $image_url[0]; ?>" style="width:48%;float:right;margin-top:40px;background-size:cover;">
					<?php endif ?>

					<!-- image - title/image -->
					<?php $image = get_post_meta( $slide->ID, 'image_title_image', true );if( $image ) :
						$image_url = wp_get_attachment_image_src( $image, 'full' );?>
						<img src="<?php echo $image_url[0]; ?>">
					<?php endif ?>

					<!-- code -->
					<?php $code = get_post_meta( $slide->ID, 'code', true );if( $code ) : ?>
						<pre>
							<code>
								<?php echo $code;?>
							</code>
						</pre>
					<?php endif ?>

						<?php $speaker_notes = get_post_meta( get_the_ID(), 'speaker_notes', true ); if( $speaker_notes ) : ?>
						<aside class="notes">
							<?php echo $speaker_notes; ?>
						</aside>
						<?php endif ?>

				</section><!-- slide end -->

				<!-- vertical slides start here -->
					<section class="<?php echo $vslide->ID;?>">
					        <h2><?php echo $vslide_title;?></h2>
						<div class="vertical-slide-content"><?php echo $vslide_content;?></div>
					</section>
			  <!-- vertical slide ends here -->

	<?php if( $vslides[0] == 'vertical_slide_yes' ) : ?>
		</section><!-- This CLOSING tag will only exist if there are vertical slides that need to be nested with the main slide -->
		<?php endif ?>
	<?php endforeach ;?>

<?php get_footer(); ?>