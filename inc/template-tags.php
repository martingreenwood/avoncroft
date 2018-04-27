<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package avoncroft
 */

if ( ! function_exists( 'avoncroft_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function avoncroft_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'avoncroft' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'avoncroft' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'avoncroft_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function avoncroft_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'avoncroft' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'avoncroft' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'avoncroft' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'avoncroft' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'avoncroft' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'avoncroft' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'avoncroft_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function avoncroft_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;


/**
 * Twitter style dates
 */
function ShowDate($date) // $date --> time(); value
{
	$stf = 0;
	$cur_time = time();
	$diff = $cur_time - $date;
	$phrase = array('second','minute','hour','day','week','month','year','decade');
	$length = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($i =sizeof($length)-1; ($i>=0) &&(($no = $diff/$length[$i])<=1); $i--);  if($i<0) $i=0; $_time = $cur_time -($diff%$length[$i]);
	$no = floor($no); if($no>1) $phrase[$i] .='s'; $value=sprintf("%d %s ",$no,$phrase[$i]);
	if(($stf == 1) &&($i>= 1) &&(($cur_tm-$_time)>0)) $value .= time_ago($_time);
	return $value.' ago ';
} 

/**
 * Page Tree
 */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
		return true;   // we're at the page or at a sub page
	else 
		return false;  // we're elsewhere
}

/**
 * Options
 */
if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title' 	=> 'Theme Options',
		'menu_slug' 	=> 'Theme-options',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false
	));
 
}

/**
 * Custom Post Typs
 */
function collections_cpt() {
	register_post_type( 'collections',
		array(
			'labels' => array(
				'name' => __( 'Collections' ),
				'singular_name' => __( 'Collection' )
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon'   => 'dashicons-admin-multisite'
		)
	);
	register_post_type( 'bulletins',
		array(
			'labels' => array(
				'name' => __( 'Bulletins' ),
				'singular_name' => __( 'Bulletin' )
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon'   => 'dashicons-format-status'
		)
	);
}
add_action( 'init', 'collections_cpt' );


/**
 * GOOGLE MAPS API for ACF
 */
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDxP3OTTogYZecLv64jOhYRh4ZLHm28wqg');
}

add_action('acf/init', 'my_acf_init');



/**
 * Get first paragraph from a WordPress post. Use inside the Loop.
 *
 * @return string
 */
function get_first_paragraph(){
	global $post;
	
	$str = wpautop( get_the_content() );
	$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	$str = strip_tags($str, '<a><strong><em>');
	return '<p>' . $str . '</p>';
}

/**
* @snippet Display "FREE" if WooCommerce Product Price is Zero or Empty - WooCommerce
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=73147
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.2.2
*/

add_filter( 'woocommerce_get_price_html', 'my_wc_custom_get_price_html', 10, 2 );
function my_wc_custom_get_price_html( $price, $product ) {
	if ( $product->get_price() == 0 ) {
		if ( $product->is_on_sale() && $product->get_regular_price() ) {
			$regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );

			$price = wc_format_price_range( $regular_price, __( 'FREE', 'woocommerce' ) );
		} else {
			$price = '<span class="amount">' . __( 'FREE', 'woocommerce' ) . '</span>';
		}
	}

	return $price;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {

	unset( $tabs['description'] );        			// Remove the description tab
	unset( $tabs['reviews'] );            			// Remove the reviews tab
	unset( $tabs['additional_information'] );      	// Remove the additional information tab

	return $tabs;

}

function woocommerce_template_single_add_to_cart_before() {
	echo "<div class='form-wrapper'>";
}
function woocommerce_template_single_add_to_cart_after() {
	echo "</div>";
}

/* Remove  product shit i dont need */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action( 'woocommerce_before_add_to_cart_form', 'woocommerce_template_single_add_to_cart_before', 29 );
add_action( 'woocommerce_before_add_to_cart_form', 'woocommerce_template_single_price', 40 );
add_action( 'woocommerce_after_add_to_cart_form', 'woocommerce_template_single_add_to_cart_after', 31 );

add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );


/* Remove image zoom */
function custom_single_product_image_html( $html, $post_id ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    return get_the_post_thumbnail( $post_thumbnail_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
}
add_filter('woocommerce_single_product_image_thumbnail_html', 'custom_single_product_image_html', 10, 2);

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/woogists/9a16fd2d0c982e780a5de89c30cbbd25
// Compatible with WooCommerce 3.0+. Thanks to Alex for assisting with an update!

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment', 10, 1 );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">Basket: <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


add_action('tc_load_addons', 'tc_custom_remove_modify_filter_from_better_events');
function tc_custom_remove_modify_filter_from_better_events() {
    global $better_events;
    remove_filter('the_content', array($better_events, 'modify_the_content'));
}


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');