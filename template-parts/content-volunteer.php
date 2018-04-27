 <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

if (get_field( 'downloadable' )):
	$extrapadd = "extra-padd-btm";
else:
	$extrapadd = "";
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($extrapadd); ?>>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

</article>
