 <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (get_field( 'additional_image' )): ?>
	<div class="additionalimage">
		<?php $additional_image = get_field( 'additional_image' ); ?>
		<img src="<?php echo $additional_image['url'] ?>" alt="">
		<p class="cap"><?php echo $additional_image['caption'] ?></p>
	</div>
<?php endif; ?>

	<div class="entry-content">
		<h4><?php echo the_terms( get_the_ID(), 'event_category', '', ' / ', '' ); ?></h4>
		<?php the_content( ); ?>
	</div>

	<?php if (get_field( 'quote' )): ?>
	<div class="entrey-quote">
		<h3><?php the_field( 'quote' ); ?></h3>
	</div>
	<?php endif ?>

	<div class="additionalimagetwo">
		<?php $additional_image_two = get_field( 'additional_image_two' ); ?>
		<img src="<?php echo $additional_image_two['url'] ?>" alt="">
		<div class="eventcats">
			<h3>OTHER ACTIVITIES</h3>
			<?php 
			$cat_args = array(
				'orderby'       => 'term_id', 
				'order'         => 'ASC',
				'hide_empty'    => true, 
			);

			$terms = get_terms('event_category', $cat_args);

			foreach($terms as $taxonomy){
				//print_r($taxonomy);
				$term_slug = $taxonomy->slug;
				$term_id = $taxonomy->term_id;
				$name = $taxonomy->name;
				?>
				<a href="<?php echo get_category_link( $term_id ); ?>" title=""><?php echo $name ?></a>
				<?php
			}

			?>
		</div>
	</div>

	<div class="entrey-tickets">
		<?php echo do_shortcode( '[tc_wb_event]' ); ?>		
	</div>

</article>
