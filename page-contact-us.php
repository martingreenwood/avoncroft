<?php
/**
 * The contact page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

get_header(); ?>

	<?php get_template_part( "partial/banner", "section" ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if (have_posts()): ?>
			<div class="container maincopy">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			</div>
			<?php endif ?>

		</main>
	</div>

	<section class="location">

		<div class="container">

			<div class="row">

				<div class="mappy">
					<?php 
					$location = get_field('location', 'options');
					if( !empty($location) ):
					?>
					<div class="map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>
				
			</div>

			<div class="row directions">

				<div class="direct car columns seven">
					<h3>By Car</h3>
					<p><?php the_field( 'by_car', 'options' ); ?></p>
				</div>
				<div class="direct train columns seven">
					<h3>By Train</h3>
					<p><?php the_field( 'by_train', 'options' ); ?></p>
				</div>
				<div class="direct bus columns seven">
					<h3>By Bus</h3>
					<p><?php the_field( 'by_bus', 'options' ); ?></p>
				</div>
				<div class="direct boat columns seven">
					<h3>By Boat</h3>
					<p><?php the_field( 'by_boat', 'options' ); ?></p>
				</div>

			</div>
			
		</div>
		
	</section>

<?php
get_footer();
