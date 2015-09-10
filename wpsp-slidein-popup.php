<?php
/**
 * Plugin Name: WP Slidein Popup
 * Plugin URI: https://github.com/actuallymentor/wp-slidein-popup
 * Description: A pretty slidein effect for signups
 * Version: 0.0.1
 * Author: Mentor Palokaj
 * Author URI: https://www.skillcollector.com
 * License: Tweet me for thanks at @ActuallyMentor
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$wpsp_config = include( __DIR__ . '/wpsp_vars.php');

if ( is_admin() ){
	/////////////////////////
	//// options page
	/////////////////////////
	include( __DIR__ . '/functions/admin.php');
}

////////////////
//// Admin and print css
////////////////
include( __DIR__ . '/functions/css.php');

////////////////
//// Cookie js
////////////////
function wpsp_cookieJs() {
	wp_enqueue_script( 'cookie-js', __DIR__ . '/includes/js.cookie.js', array(), '2.0.3', true );
}
add_action( 'wp_enqueue_scripts', 'wpsp_cookieJs' );


////////////////
//// Functionality
////////////////
include( __DIR__ . '/functions/popper.php');
?>