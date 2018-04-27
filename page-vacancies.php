<?php
/**
 * The vacancies page template file
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
				<div class="downloads columns four">
					<ul>
						<li>
							<a href="<?php the_field( 'application_form_pdf' ); ?>" title="">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/file-pdf.svg" alt=""> Download Application PDF
							</a>
						</li>
						<li>
							<a href="<?php the_field( 'application_form_doc' ); ?>" title="">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/file-pdf.svg" alt=""> Download Application DOC
							</a>
						</li>
					</ul>
				</div>
			</div>
			<?php endif ?>

		</main>
	</div>

<?php
get_footer();
