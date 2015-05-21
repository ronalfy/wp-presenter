<?php get_header() ?>

	<?php $slides = get_posts( 'post_type=slide&post_status=publish&posts_per_page=-1&orderby=date&order=ASC' );?>

	<?php foreach ( $slides as $slide ) : ?>
	<?php $vslides = get_post_meta( $slide->ID, 'add_a_vertical_slide', true );
	$vslide_title = get_post_meta( $slide->ID, 'slide_title_vertical_slide', true );
	$vslide_content = get_post_meta( $slide->ID, 'slide_content_vertical_slide', true );?>

		<?php if( $vslides ) : ?>
			<section><!-- This OPENING tag will only exist if there are vertical slides that need to be nested with the main slide -->
		<?php endif;?>

				<section><!-- slide start -->
					<h2><?php echo $slide->post_title; ?></h2>
					<?php $content = $slide->post_content; if( $content ) :?>
					<div class="content"><?php echo $slide->post_content;?></div>
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

		<?php if( $vslides ) : ?>
		</section><!-- This CLOSING tag will only exist if there are vertical slides that need to be nested with the main slide -->
		<?php endif ?>
	<?php endforeach ;?>
<?php get_footer(); ?>