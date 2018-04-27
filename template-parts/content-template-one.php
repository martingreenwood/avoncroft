<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<h4><?php the_field( 'content_intro' ); ?></h4>
		<h2><?php the_field( 'content_title' ); ?></h2>
		<?php
			the_content();
		?>
	</div>

</article>
