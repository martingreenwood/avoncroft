<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package avoncroft
 */

get_header(); ?>

	<?php get_template_part( "partial/banner", "section" ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container maincopy">

				<div class="row">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'event' );

					endwhile; // End of the loop.
					?>
				</div>

			</div>
			
		</main>
	</div>

<?php
get_footer();
