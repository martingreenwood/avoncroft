<?php 
$bannerimage = get_field( 'image' ); 
if ($bannerimage): 
	$bannerimage = $bannerimage['url']; 
elseif (has_post_thumbnail( )): 
	$featureimgurl = wp_get_attachment_url( get_post_thumbnail_id( $post ) );
	$bannerimage = $featureimgurl;
else: 
	$bannerimage = get_template_directory_uri() . '/assets/img/inner-img.jpg'; 
endif; 
?>
<section id="banner" class="parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $bannerimage; ?>">
	<?php if (get_field( 'video' )): ?>
		<div class="parallax-slider">
			<?php echo do_shortcode( '[video mp4="'.get_field( 'video' ).'" loop="on" autoplay="on" width="1920" width="1080"]' ); ?>
		</div>
	<?php endif ?>
	<div class="blurb">

		<div class="table">
			<div class="cell middle">
				<div class="container">

					<div class="squash">

					<?php 
					/*
					if( tribe_is_month() && !is_tax() ||
						tribe_is_month() && is_tax() ||
						tribe_is_past() || 
						tribe_is_upcoming() && !is_tax() || 
						tribe_is_upcoming() && is_tax() ||
						tribe_is_week() && !is_tax() || 
						tribe_is_week() && is_tax() || 
						tribe_is_day() && !is_tax() || 
						tribe_is_day() && is_tax() || 
						tribe_is_map() && !is_tax() || 
						tribe_is_map() && is_tax() ||
						tribe_is_photo() && !is_tax() || 
						tribe_is_photo() && is_tax() ||
						tribe_is_venue() ||
						get_post_type() == 'tribe_organizer' && is_single()
					) { // Month View Page

						if (get_field( 'event_overview_intro', 'options' )): ?>
							<h3><?php the_field( 'event_overview_intro', 'options' ); ?></h3>
						<?php endif; ?>

						<?php if (get_field( 'event_overview_hero', 'options' )): ?>
							<h1><?php the_field( 'event_overview_hero', 'options' ); ?></h1>
						<?php endif; ?>

						<?php if (get_field( 'event_overview_description', 'options' )): ?>
							<p><?php the_field( 'event_overview_description', 'options' ); ?></p>
						<?php endif;

					} else

					*/

					if( is_singular( 'tc_events' ) ) { // Single Events

				    ?>

						<h3><?php echo the_terms( get_the_ID(), 'event_category', '', ' / ', '' ); ?></h3>

						<h1><?php the_title(); ?></h1>

						<p>
							<span>
							<?php 
							if (get_post_meta(get_the_ID(), 'event_date_time', true)) {
								echo date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true)) ) ;
							}
							if (get_post_meta(get_the_ID(), 'event_end_date_time', true) && date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true))) != date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true))) ) {
								echo " - " . date('l jS F', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true)) ) ;
							}
							?>
							</span>
							<span>
							<?php
							if (get_post_meta(get_the_ID(), 'event_date_time', true)) {
								echo date('g:ia', strtotime(get_post_meta(get_the_ID(), 'event_date_time', true)) ) ;
							}
							if (get_post_meta(get_the_ID(), 'event_end_date_time', true)) {
								echo " to " . date('g:ia', strtotime(get_post_meta(get_the_ID(), 'event_end_date_time', true)) ) ;
							}
							?>
							</span>
						</p>

					<?php

					} elseif( is_singular( 'product' ) ) { // Single Events

				    ?>

						<h3>Buy Tickets</h3>

						<h1><?php the_title(); ?></h1>

						<p><?php the_field( 'event_overview_description', 'options' ); ?></p>

					<?php

					} elseif( is_singular( 'volunteer_opp' ) ) { // Single Events

				    ?>

						<h3>volunteering opportunity</h3>

						<h1><?php the_title(); ?></h1>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

					<?php

					} elseif( is_archive() ) { // Single Events

				    ?>

						<h3><?php the_field( 'event_overview_intro', 'options' ); ?></h3>

						<h1><?php the_archive_title(); ?></h1>

						<p>
							<?php the_field( 'event_overview_description', 'options' ); ?>
						</p>

					<?php

					} else {
						

						if (get_field( 'intro' )): ?>
							<h3><?php the_field( 'intro' ); ?></h3>
						<?php endif; ?>

						<?php if (get_field( 'hero' )): ?>
							<h1><?php the_field( 'hero' ); ?></h1>
						<?php endif; ?>

						<?php if (get_field( 'description' )): ?>
							<p><?php the_field( 'description' ); ?></p>
						<?php endif; ?>
						
						<?php if (get_field( 'page_link' )): ?>
							<a href="<?php the_field( 'page_link' ); ?>" title="Find out more">Find out more</a>
						<?php endif;
					
					}

					?>

					</div><!-- .squash -->

				</div>
			</div>
		</div>

	</div>

	<?php if ( is_home() || is_front_page() ): ?>
	<div class="home-links">
		<div class="container">
			<div class="open-times columns six">
				<div class="heading">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/clock.svg" width="36" height="auto" alt="">
				</div>
				<p>
					<span>OPENING TIMES</span><br>
					<?php echo is_it_open(); ?>
				</p>
			</div>

			<div class="tickets columns four">
				<a href="<?php echo home_url( '/tickets' ); ?>">Book Tickets</a>
			</div>
		</div>
	</div>
	<?php endif ?>

</section>