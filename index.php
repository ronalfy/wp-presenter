<?php get_header() ?>

<?php $vslides = get_post_meta( get_the_ID(), 'add_a_vertical_slide', true );?>

	<?php $slides = get_posts( 'post_type=slide&post_status=publish&posts_per_page=-1&orderby=date&order=ASC' );
		  foreach ( $slides as $slide ) : ?>
			  <?php if( $vslides ) : ?>
				  <section><!-- This OPENING tag will only exist if there are vertical slides that need to be nested with the main slide -->
			  <?php endif;?>

			<section>
				<h2><?php echo $slide->post_title; ?></h2>

				<?php $content = $slide->post_content; if( $content ) :?>
				<div class="content"><?php echo $slide->post_content;?></div>
				<?php endif ?>

				<?php $speaker_notes = get_post_meta( get_the_ID(), 'speaker_notes', true ); if( $speaker_notes ) : ?>
					<aside class="notes">
						<?php echo $speaker_notes; ?>
					</aside>
				<?php endif ?>
			</section>
				<!-- vertical slides start here -->
			  <?php if( $vslides ) : ?>
				  <section>
					  <?php $vslide_title = get_post_meta( get_the_ID(), 'slide_title_vertical_slide', true );?>
					  <?php if( $vslide_title ) :?>
					  <h2><?php echo $vslide_title;?></h2>
					  <?php endif ?>

					  <?php $vslide_content = get_post_meta( get_the_ID(), 'slide_content_vertical_slide', true );?>
					  <?php if( $vslide_content ) :?>
						  <div class="vertical-slide-content"><?php echo $vslide_content;?></div>
					  <?php endif ?>

				  </section>
			  <?php endif ?>
			  <!-- vertical slide ends here -->
			  <?php if( $vslides ) : ?>
				  </section><!-- This CLOSING tag will only exist if there are vertical slides that need to be nested with the main slide -->
			  <?php endif ?>

	<?php endforeach ;?>

<?php get_footer(); ?>