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

	<footer id="colophon" class="site-footer">
		
		<div class="container">
			<div class="row">

				<div class="copyright five columns">
					<p><?php echo date("Y"); ?> <?php echo bloginfo( 'name' ); ?></p>
				</div>

				<div class="footer-nav seven columns">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'footer-menu',
						) );
					?>
				</div>
				
			</div>
		</div>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>