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

						<h2>Bulletins</h2>

						<div class="bulletins-list">
							<?php //echo do_shortcode( '[mini_events limit="3"]' ); ?>
							<?php
							$args = array( 'post_type' => 'bulletins', 'posts_per_page' => 3 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
								?>
								<div class="bulletin">

									<?php the_post_thumbnail( 'thumbnail' ); ?>

									<div class="info">
										<h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
										<a class="more" href="<?php the_permalink(); ?>" title="">Read more</a>
									</div>

									<div class="clear"></div>
        						</div>
								<?php
							endwhile; // end CPT Loop
							wp_reset_postdata();
							wp_reset_query();
							?>
						</div>

						<div class="events-link">
							<a href="<?php echo home_url( '/bulletins' ); ?>" title="">View All Bulletins</a>
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

					<a href="<?php the_field( 'feature_four_link' ); ?>"><?php the_field( 'feature_four_link_text' ); ?></a>
					
				</div>
				
			</div>
			
		</div>
		
	</section>

	<section id="news">
		<div class="imgs">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news1.png" alt=""><!--
			--><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/news2.png" alt="">
		</div>
		<div class="news-story">
			<div class="table">
				<div class="cell middle">
					<div class="container">
						<div class="row">
							<div class="column two-thirds offset-by-two">
							<?php
							$sticky = get_option( 'sticky_posts' );
							$args = array(
								'posts_per_page'      => 2, // Number of sticky posts to get
								'post__in'            => $sticky,
								'ignore_sticky_posts' => 1
							);
							if ( !empty($sticky) ):
								// has sticky posts
								query_posts($args);
								$stickyPosts = new WP_query();
								$stickyPosts->query($args);
								if ( $stickyPosts->have_posts() ):
									while ( $stickyPosts->have_posts() ) : $stickyPosts->the_post();
									?>
									<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>">
										<h3><?php the_title(); ?></h3>
										<?php the_excerpt(); ?>
										<button type="button">Read More</button>
									</a>
									<?php
									endwhile; //end loop for sticky posts
								endif; //have_posts()
								// RESET THE QUERY
								wp_reset_query();
							endif; //has sticky posts
							//END Custom Query for Sticky Posts only
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

				<div class="events columns four">

					<div class="wrapall">

						<h2>Events &amp; Workshops</h2>

						<div class="event-list">
							<?php echo do_shortcode( '[mini_events limit="3"]' ); ?>
						</div>

						<div class="events-link">
							<a href="<?php echo home_url( '/whats-on' ); ?>" title="">View All Events</a>
						</div>

					</div>

				</div>

				<div class="featurepage pageone columns eight">
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

				<div class="featurepage pagetwo columns eight">
					<?php $feature_six_image = get_field( 'feature_six_image' ); ?>
					<img src="<?php echo $feature_six_image['url'] ?>" alt="" class="">

					<div class="link">
						<a href="<?php the_field( 'feature_six_link' ); ?>">
							<h3><?php the_field( 'feature_six_title' ); ?></h3>
							<p><?php the_field( 'feature_six_text' ); ?></p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>
				
			</div>
			
		</div>
		
	</section>

	<section id="quotes">
		<div class="imgs">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quotes2.png" alt=""><!--
		--><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quotes1.png" alt="">
		</div>
		<div class="news-story">
			<div class="table">
				<div class="cell middle">
					<div class="container">
						<div class="row">
							<div class="column two-thirds offset-by-two">
								<div class="testimonials">
									<?php
									if( have_rows('testimonials', 'options') ):
									while ( have_rows('testimonials', 'options') ) : the_row();
									?>
									<div>
										<?php if (get_sub_field( 'type') === 'at' ): ?>
											<i class="fas fa-<?php the_sub_field( 'type' ); ?>"></i>
										<?php else: ?>
											<i class="fab fa-<?php the_sub_field( 'type' ); ?>"></i>
										<?php endif; ?>
										<p>
											<?php the_sub_field( 'text' ); ?>
										</p>
										<p class="reviewer">
											<?php the_sub_field( 'reviewer' ); ?>
										</p>
									</div>
									<?php
									endwhile;
									endif;
									?>
								</div>
							</div>
						</div>
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
