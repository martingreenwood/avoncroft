<?php
/**
 * The buildings template file
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

<?php
get_footer();
