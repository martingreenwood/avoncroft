 <?php
/**
 * The whats on template file 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

get_header(); ?>

	<?php get_template_part( "partial/banner", "section" ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if (has_post_thumbnail( )): ?>padd-right<?php endif; ?>">
			
			<?php if (have_posts()): ?>
			<div class="container maincopy">

				<?php if (has_post_thumbnail( )): ?>
					<div class="feat-img columns four">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
				<?php endif ?>

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

			</div>
			<?php endif ?>

		</main>
	</div>

	<section id="eventlist">

		<?php echo do_shortcode( '[all_events]' ); ?>
		
	</section>

<?php
get_footer();
