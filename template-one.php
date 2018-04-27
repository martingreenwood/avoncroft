<?php
/**
 * Template Name: Template One
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

			<div class="top-left-image-extra columns six">
				<?php if (get_field( 'top_left_image' )): ?>
				<div class="img">
					<?php $top_left_image = get_field( 'top_left_image' ); ?>
					<img src="<?php echo $top_left_image['url']; ?>" alt="">
					<?php if ($top_left_image['caption']): ?>
						<p class="caption"><?php echo $top_left_image['caption']; ?></p>
					<?php endif; ?>
				</div>
				<?php endif ?>

				<div class="blurb">
					<p><?php the_field( 'blurb' ); ?></p>
				</div>

				<div class="blurb-coloured">
					<p><?php the_field( 'blurb_coloured' ); ?></p>
				</div>

				<div class="link">
					<a href="<?php the_field( 'bottom_link' ); ?>" title=""><?php the_field( 'bottom_link_text' ); ?></a>
				</div>
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'template-one' );

			endwhile; // End of the loop.
			?>

				<?php if (get_field( 'bottom_right_image' )): ?>
				<div class="bottom-right-image">
					<?php $bottom_right_image = get_field( 'bottom_right_image' ); ?>
					<img src="<?php echo $bottom_right_image['url']; ?>" alt="">
					<?php if ($bottom_right_image['caption']): ?>
						<p class="caption"><?php echo $bottom_right_image['caption']; ?></p>
					<?php endif; ?>
				</div>
				<?php endif ?>
			</div>
			<?php endif ?>

		</main>
	</div>

<?php
get_footer();
