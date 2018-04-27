<?php
/**
 * Template Name: Template Three
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

			<?php
			// rows
			if( have_rows('page_builder_theree') ):
			?>
			<div class="sections">
				<div class="container">
				<?php
				while ( have_rows('page_builder_theree') ) : the_row();
				?>
					<div class="row">
					<?php
						// items
						if( have_rows('element') ):
							while ( have_rows('element') ) : the_row();

								if( have_rows('item') ):
									while ( have_rows('item') ) : the_row();

										if( get_row_layout() == 'image' ):

											$file = get_sub_field('image');

											?>
											<div class="image element columns six">
												<img src="<?php echo $file['url'] ?>" alt="">
											</div>
											<?php

										elseif( get_row_layout() == 'complex_text' ): 

											?>
											<div class="text complex element columns six">
												<div class="table">
													<div class="cell middle">
														<?php the_sub_field('complex_text'); ?>	
													</div>
												</div>
											</div>
											<?php
										
										elseif( get_row_layout() == 'plain_text' ): 

											?>
											<div class="text element columns six">
												<div class="table">
													<div class="cell middle">
														<p><?php the_sub_field('plain_text'); ?></p>
													</div>
												</div>
											</div>
											<?php

										endif;

									// end whote for items
									endwhile;
								endif;

							// end while for elements
							endwhile;
						endif;

					?>
					</div>
					<?php
					// end while for rows
					endwhile;
				?>
				</div>
			</div>
			<?php
			endif;
			?>

		</main>
	</div>

<?php
get_footer();
