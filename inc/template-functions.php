<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package avoncroft
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function avoncroft_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'avoncroft_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function avoncroft_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'avoncroft_pingback_header' );

// Snippet from PHP Share: http://www.phpshare.org

function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function custom_menu_page_removing() {
	global $current_user;
	wp_get_current_user();

	$email = (string) $current_user->user_email;
	$emailDomain = explode('@', $email);
	$emailDomain = $emailDomain[1];

	if ($emailDomain !== 'wearebeard.com') {
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );                  //Tools
		remove_menu_page( 'edit.php?post_type=acf-field-group' );                  //Tools
		remove_menu_page( 'users.php' );                  //Tools
	}
}
add_action( 'admin_menu', 'custom_menu_page_removing' );



function is_it_open() {

	$month = date('n'); // 1-12x
	$day = date('N'); // 1-7
	$closedtimes = "";
	$opentimes = "";
	$noopen = 'The museum is currently closed. View <a href="'.home_url( '/opening-times' ).'">our opening times</a>.';

	switch ($month) {
		case '1': // sat & sun
			$opentimes = get_field( 'fan_feb_open', 'options' );
			$closedtimes = get_field( 'fan_feb_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  $noopen;
					} 
					case '3': {
						return  $noopen;
					} 
					case '4': {
						return  $noopen;
					} 
					case '5': {
						return  $noopen;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
				}
			break;

		case '2':
			$opentimes = get_field( 'fan_feb_open', 'options' );
			$closedtimes = get_field( 'fan_feb_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  $noopen;
					} 
					case '3': {
						return  $noopen;
					} 
					case '4': {
						return  $noopen;
					} 
					case '5': {
						return  $noopen;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
				}
			break;

		case '3':
			$opentimes = get_field( 'mar_jun_open', 'options' );
			$closedtimes = get_field( 'mar_jun_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '4':
			$opentimes = get_field( 'mar_jun_open', 'options' );
			$closedtimes = get_field( 'mar_jun_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '5':
			$opentimes = get_field( 'mar_jun_open', 'options' );
			$closedtimes = get_field( 'mar_jun_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '6':
			$opentimes = get_field( 'mar_jun_open', 'options' );
			$closedtimes = get_field( 'mar_jun_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '7':
			$opentimes = get_field( 'jul_aug_open', 'options' );
			$closedtimes = get_field( 'jul_aug_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
				}
			break;

		case '8':
			$opentimes = get_field( 'jul_aug_open', 'options' );
			$closedtimes = get_field( 'jul_aug_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
				}
			break;

		case '9':
			$opentimes = get_field( 'sep_oct_open', 'options' );
			$closedtimes = get_field( 'sep_oct_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '10':
			$opentimes = get_field( 'sep_oct_open', 'options' );
			$closedtimes = get_field( 'sep_oct_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '11':
			$opentimes = get_field( 'nov_dec_open', 'options' );
			$closedtimes = get_field( 'nov_dec_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;

		case '12':
			$opentimes = get_field( 'nov_dec_open', 'options' );
			$closedtimes = get_field( 'nov_dec_close', 'options' );
				switch ($day) { 
					case '1': { // monday
						return  $noopen;
					} 
					case '2': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '3': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '4': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '5': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '6': {
						return  "The museum is open today from ".$opentimes." to " .$closedtimes;
					} 
					case '7': { 
						return  $noopen;
					} 
				}
			break;
	}
}

function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

remove_filter('the_content', 'modify_the_content');