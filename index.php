<?php
/**
 * The main template that aggregates all the slides.
 *
 */
get_header(); ?>
<?php $slides = get_posts('post_type=slide&order_by=date&order=ASC');
foreach($slides as $slide) :?>
	<section>
		<h1><?php echo $slide->post_title;?></h1>
		<?php
		$field_data = get_post_meta( $slide->ID, 'main_content', false );?>
		<div class="content">
			<?php
			if( $field_data[1] ) {
				echo '<div class="column half">';
			} else {
				echo '<div class="column">';

			}?>
				<?php if( $field_data[0] ) : echo wpautop( $field_data[0] ); endif;?>
			</div>
			<?php
			if( $field_data[1] ) {
				echo '<div class="column half">';
			} else {
				echo '<div class="column">';

			}?>
				<?php if( $field_data[1] ) : echo wpautop( $field_data[1] ); endif;?>
			</div>
			</div>
	</section>
<?php endforeach;?>
<?php get_footer(); ?>
