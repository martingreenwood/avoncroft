<?php
/**
 * The template for displaying all single volunteer_opp
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<div class="feat-img ">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>
				<?php endif ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'volunteer' );

			endwhile; // End of the loop.
			?>

			</div>
			<?php endif ?>

		</main>
	</div>

<?php
get_footer();
