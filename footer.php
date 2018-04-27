<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avoncroft
 */

?>

	</div><!-- #content -->

</div><!-- #page -->

<footer id="colophon" class="site-footer">
	
	<div class="container">

		<!-- <div class="row logo">
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>
		</div> -->

		<div class="row info">

			<div class="social four columns">
				<h3>FIND US ONLINE</h3>
				<p>We’re also on social media, so why not follow us on the channels below:</p>
				<ul>
					<li><a href="#" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/facebook-f.svg" alt=""></a></li>
					<li><a href="#" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/twitter.svg" alt=""></a></li>
					<li><a href="#" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/instagram.svg" alt=""></a></li>
				</ul>
			</div>

			<div class="copyright four columns">
				<h3>ABOUT US</h3>
				<p>Avoncroft Museum is home to over 30 different buildings and structures which have been rescued and re-built in rural Worcestershire.</p>
			</div>

			<div class="copyright four columns">
				<h3>CONTACT US</h3>
				<p>Avoncroft Museum of Historic Buildings<br>
				Stoke Heath, Bromsgrove, Worcestershire<br>
				B60 4JR<br>
				Tel: 01527 831363 / 831886</p>
			</div>
		</div>

		<div class="row fnav">

			<div class="footer-nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'footer-menu',
					) );
				?>
			</div>
			
		</div>

		<div class="row cedits">

			<div class="logos">
				
				<ul>
					<li><img src="//placehold.it/122x70" alt=""></li>
					<li><img src="//placehold.it/150x70" alt=""></li>
					<li><img src="//placehold.it/70x70" alt=""></li>
					<li><img src="//placehold.it/122x70" alt=""></li>
				</ul>

			</div>
			
		</div>

		<div class="row copy">

			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>

			<p><?php echo date("Y"); ?> <?php echo bloginfo( 'name' ); ?>. All rights reserved.</p>
			
		</div>
	</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
