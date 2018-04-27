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

		<div class="menu_buttons">
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">MENU</button>
			<div class="the-basket">
				<a class="" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your basket', 'woothemes'); ?>">
					<i class="fas fa-shopping-basket"></i>
				</a>
			</div>
		</div>

		<div class="menu-wrapper">

			<div class="menu-items">

				<section class="heading">
					<h2>MENU</h2>
					<div class="basket">
						<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">Basket: <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
					</div>
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
					<h3><a href="<?php echo home_url( '/contact-us' ); ?>" title="">CONTACT US</a></h3>
					<p>Avoncroft Museum of Historic Buildings, Stoke Heath, Bromsgrove, Worcestershire, B60 4JR</p>
					<p>Tel: 01527 831363 / 831886</p>
				</section>

				<?php $location = get_field('location', 'options'); ?>
				<section class="map2">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</section>

				<section class="signup">
					<h3>RECEIVE OUR NEWSLETTER</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
				</section>
				
			</div>

	</nav>

	<div id="content" class="site-content">
