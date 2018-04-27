<?php
/**
 * Template Name: Landing Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

get_header(); ?>

	<?php get_template_part( "partial/banner", "section" ); ?>

	<section id="rowone">
		
		<div class="container">

			<div class="row">

				<div class="featurepage columns eight">
					<?php $feature_one_img = get_field( 'feature_one_image' ); ?>
					<img src="<?php echo $feature_one_img['url'] ?>" alt="" class="offsetleft">

					<div class="link">
						<a href="<?php the_field( 'feature_one_link' ); ?>">
							<h3><?php the_field( 'feature_one_title' ); ?></h3>
							<p><?php the_field( 'feature_one_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="events columns four">

					<div class="wrapall">

						<h2>What's on</h2>

						<div class="event-list">
							<?php echo do_shortcode( '[mini_events limit="3"]' ); ?>
						</div>

						<div class="events-link">
							<a href="<?php echo home_url( '/whats-on' ); ?>" title="">View All Events</a>
						</div>

					</div>

				</div>
				
			</div>
			
		</div>

	</section>

	<section id="rowtwo">

		<div class="container">

			<div class="row">

				<div class="featurepage columns five">
					<?php $feature_two_image = get_field( 'feature_two_image' ); ?>
					<img src="<?php echo $feature_two_image['url'] ?>" alt="" class="offsetleft">

					<div class="link">
						<a href="<?php the_field( 'feature_two_link' ); ?>">
							<h3><?php the_field( 'feature_two_title' ); ?></h3>
							<p><?php the_field( 'feature_two_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>

				<div class="featurepage featuretwo columns seven">
					<?php $feature_three_image = get_field( 'feature_three_image' ); ?>
					<img src="<?php echo $feature_three_image['url'] ?>" alt="" class="">

					<div class="link offsetright">
						<a href="<?php the_field( 'feature_three_link' ); ?>">
							<h3><?php the_field( 'feature_three_title' ); ?></h3>
							<p><?php the_field( 'feature_three_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="quote three columns seven">

					<p><?php the_field( 'feature_four_text' ); ?></p>

					<a href="<?php the_field( 'feature_four_link' ); ?>">Read More</a>
					
				</div>
				
			</div>
			
		</div>
		
	</section>

	<section id="news">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news.png" alt="">
		<div class="news-story">
			<div class="table">
				<div class="cell middle">
					<div class="container">
						<div class="row">
							<div class="column two-thirds offset-by-two">
							<?php
							$args = array( 'post_type' => 'post', 'posts_per_page' => 1 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
								?>
								<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>">
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
									<button type="button">Read More</button>
								</a>
								<?php
							endwhile; // end CPT Loop
							wp_reset_postdata();
							wp_reset_query();
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="rowfour">

		<div class="container">

			<div class="row">

				<div class="featurepage pageone columns seven">
					<?php $feature_five_image = get_field( 'feature_five_image' ); ?>
					<img src="<?php echo $feature_five_image['url'] ?>" alt="" class="">

					<div class="link offsetright">
						<a href="<?php the_field( 'feature_five_link' ); ?>">
							<h3><?php the_field( 'feature_five_title' ); ?></h3>
							<p><?php the_field( 'feature_five_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="featurepage pagetwo columns four">
					<?php $feature_six_image = get_field( 'feature_six_image' ); ?>
					<img src="<?php echo $feature_six_image['url'] ?>" alt="" class="offsetleft">

					<div class="link">
						<a href="<?php the_field( 'feature_six_link' ); ?>">
							<h3><?php the_field( 'feature_six_title' ); ?></h3>
							<p><?php the_field( 'feature_six_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>

				<div class="quote columns seven">

					<p><?php the_field( 'feature_eight_text' ); ?></p>

					<a href="<?php the_field( 'feature_eight_link' ); ?>">Read more</a>
					
				</div>

				<div class="featurepage pagethree columns four">
					<?php $feature_seven_image = get_field( 'feature_seven_image' ); ?>
					<img src="<?php echo $feature_seven_image['url']; ?>" alt="" class="offsetleft">

					<div class="link">
						<a href="<?php the_field( 'feature_seven_link' ); ?>">
							<h3><?php the_field( 'feature_seven_title' ); ?></h3>
							<p><?php the_field( 'feature_seven_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>
				
			</div>
			
		</div>
		
	</section>

	<?php
	//while ( have_posts() ) : the_post();

		//get_template_part( 'template-parts/content', 'page' );

	//endwhile; // End of the loop.
	?>

<?php
get_footer();
