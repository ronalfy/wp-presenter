<?php
/**
 * The main template that aggregates all the slides.
 *
 */
get_header(); ?>
<?php $slides = get_posts('post_type=slide&order_by=date&order=ASC');
foreach($slides as $slide) :?>
	<section>
		<?php echo $slide->post_title;?>
	</section>
<?php endforeach;?>
<?php get_footer(); ?>