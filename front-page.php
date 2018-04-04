<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

					<img src="//placehold.it/899x615" alt="" class="offsetleft">

					<div class="link">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="events columns four">

					<div class="wrapall">

						<h2>What's on</h2>

						<div class="event-list">
							<?php echo do_shortcode( '[tribe_events_list limit="4" ]' ); ?>
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

					<img src="//placehold.it/613x710" alt="" class="offsetleft">

					<div class="link">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>

				<div class="featurepage two columns seven">

					<img src="//placehold.it/899x615" alt="" class="">

					<div class="link offsetright">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="quote three columns seven">

					<p>An Avoncroft membership not only gives you access to the museum all year round but also gives you reduced fees for our Blacksmithing courses and other special offers.</p>

					<a href="<?php echo home_url( '/memberships' ); ?>">Get a Membership</a>
					
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
								<a href="#" title="">
									<h3>Title Goes Here</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
								</a>
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

					<img src="//placehold.it/899x750" alt="" class="">

					<div class="link offsetright">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>
					
				</div>

				<div class="featurepage pagetwo columns four">

					<img src="//placehold.it/613x710" alt="" class="offsetleft">

					<div class="link">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>

				<div class="quote columns seven">

					<p>An Avoncroft membership not only gives you access to the museum all year round but also gives you reduced fees for our Blacksmithing courses and other special offers.</p>

					<a href="<?php echo home_url( '/memberships' ); ?>">Get a Membership</a>
					
				</div>

				<div class="featurepage pagethree columns four">

					<img src="//placehold.it/613x710" alt="" class="offsetleft">

					<div class="link">
						<a href="#">
							<h3>Title Goes Here</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/chevron-right.svg" class="after" alt="">
						</a>
					</div>

				</div>
				
			</div>
			
		</div>
		
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			<div class="row">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

			</div>
		</main>
	</div>

<?php
get_footer();
