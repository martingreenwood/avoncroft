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

	<div class="box-top"></div>

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
			
			</div>
		</div>
	</header>

	<nav id="site-navigation" class="main-navigation">

		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">MENU</button>
		<div class="menu-wrapper">

			<div class="menu-items">

				<section class="heading">
					<h2>MENU</h2>
				</section>

				<section class="signup-links">
					<ul>
						<li><a href="<?php echo home_url( '/tickets' ); ?>" title="">Tickets</a></li>
						<li><a href="<?php echo home_url( '/memberships' ); ?>" title="">Memberships</a></li>
					</ul>
				</section>

				<section class="nav-links">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
				</section>

				<section class="contact-info">
					<h3>Contact Us</h3>
					<p>Avoncroft Museum of Historic Buildings, Stoke Heath, Bromsgrove, Worcestershire, B60 4JR</p>
					<p>Tel: 01527 831363 / 831886</p>
				</section>

				<section class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9756.435488078714!2d-2.0707798!3d52.3140269!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf86dc8232d01dc00!2sAvoncroft+Museum+of+Historic+Buildings!5e0!3m2!1sen!2suk!4v1522322963954" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
				</section>

				<section class="signup">
					<h3>RECEIVE OUR NEWSLETTER</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
				</section>
				
			</div>

	</nav>

	<div id="content" class="site-content">
