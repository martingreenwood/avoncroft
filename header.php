<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avoncroft
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class($pagename); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">

				<div class="site-branding">
					<div class="logo desktop">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>
					</div>
				</div>

				<nav id="site-navigation" class="main-navigation">
					<button class="hamburger menu-toggle hamburger--spin" type="button" aria-controls="primary-menu" aria-expanded="false">
						<span class="hamburger-box ">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav>
			
			</div>
		</div>
	</header>

	<?php $bannerimage = get_field( 'banner_image' ); if (!$bannerimage): $bannerimage = get_template_directory_uri() . '/assets/img/inner-img.png'; else: $bannerimage = $bannerimage['url']; endif; ?>
	<section id="banner" class="parallax-window" data-parallax="scroll" data-bleed="50" data-image-src="<?php echo $bannerimage; ?>">
		<div class="blurb">

			<div class="table">
				<div class="cell middle">

				<?php if (is_page(get_option( 'page_for_posts' ))): ?>
					

					<?php if (get_field( 'banner_text', get_option( 'page_for_posts' ) )): ?>
					<h2><?php the_field( 'banner_text', get_option( 'page_for_posts' ) ); ?></h2>
					<?php endif; ?>
					<?php if (get_field( 'banner_link', get_option( 'page_for_posts' ) )): ?>
					<a href="<?php the_field( 'banner_link', get_option( 'page_for_posts' ) ); ?>" title="Find out more">Find out more</a>
					<?php endif; ?>

				<?php elseif ( is_404() ): ?>

					<h1>404</h1>
					<h2>Page Not Found</h2>

				<?php else: ?>

					<?php if (get_field( 'banner_text' )): ?>
					<h2><?php the_field( 'banner_text' ); ?></h2>
					<?php endif; ?>
					<?php if (get_field( 'banner_link' )): ?>
					<a href="<?php the_field( 'banner_link' ); ?>" title="Find out more">Find out more</a>
					<?php endif; ?>

				<?php endif ?>
					
				</div>
			</div>

		</div>
	</section>

	<div id="content" class="site-content">
