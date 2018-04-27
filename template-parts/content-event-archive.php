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

	<div class="tc-single-event">

		<div class="container">

			<div class="image">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>

			<div class="info">

				<h2>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>

				<div class="date">
					<span>
					<?php 
						if (get_post_meta(get_the_ID(), 'event_date_time', true)) {
							echo date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true)) ) ;
						}
						if (get_post_meta(get_the_ID(), 'event_end_date_time', true) && date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true))) != date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true))) ) {
							echo " - " . date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true)) ) ;
						}
					?>
					</span><span>
					<?php
						if (get_post_meta(get_the_ID(), 'event_date_time', true)) {
							echo date('g:ia', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true)) ) ;
						}
						if (get_post_meta(get_the_ID(), 'event_end_date_time', true)) {
							echo " to " . date('g:ia', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true)) ) ;
						}
					?>
					</span>
				</div>

				<div class="excerpt">
					<p><?php echo get_first_paragraph(); ?></p>
				</div>

				<a class="more" href="<?php the_permalink(); ?>">More Info</a>

			</div>

		</div>

	</div>

</article>
