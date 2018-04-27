<?php
/**
 * Template name: Volunteering
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

				<?php $file = get_field( 'downloadable' ); ?>

				<?php if ($file): ?>
				<div class="downloads columns four">
					<ul>
						<li>
							<a href="<?php echo $file['url'] ?>" title="">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/file-pdf.svg" alt=""> Download <?php echo $file['title'] ?>
							</a>
						</li>
					</ul>
				</div>
				<?php endif ?>

			</div>
			<?php endif ?>

		</main>
	</div>

	<div class="the-volunteers">
		<div class="container">
		<?php
		$args = array( 'post_type' => 'volunteer_opp', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			$opp = new WI_Volunteer_Management_Opportunity( $post->ID ); //Get volunteer opportunity information
			?>
			<div class="row">
		
				<div class="image element columns six">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>

				<div class="text complex element columns six">
					<div class="table">
						<div class="cell middle">
							<h3><?php the_title(); ?></h3>
							<h4><?php $opp->display_meta( ( $opp->opp_meta['one_time_opp'] == 1 ) ? $opp->format_opp_times() : $opp->opp_meta['flexible_frequency'], __( 'When:', 'wired-impact-volunteer-management' ) ); ?></h4>
							<?php the_content(); ?>	
							<a class="more" href="<?php the_permalink(); ?>" title="">More Info</a>
						</div>
					</div>
				</div>

			</div>
			<?php
		endwhile; // end CPT Loop
		?>
		</div>
	</div>

<?php
get_footer();