 <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package avoncroft
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('columns twelve'); ?>>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

</article>
