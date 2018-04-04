<?php 
$bannerimage = get_field( 'image' ); 
if (!$bannerimage): 
	$bannerimage = get_template_directory_uri() . '/assets/img/inner-img.png'; 
else: 
	$bannerimage = $bannerimage['url']; 
endif; 
?>
<section id="banner" class="parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $bannerimage; ?>">
	<div class="blurb">

		<div class="table">
			<div class="cell middle">
				<div class="container">

					<?php if (get_field( 'intro' )): ?>
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
					<?php endif; ?>

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