<?php
/**
 * Plugin Name: WP Slidein Popup
 * Plugin URI: https://github.com/actuallymentor/wp-slidein-popup
 * Description: A pretty slidein effect for signups
 * Version: 1.0.0
 * Author: Mentor Palokaj
 * Author URI: https://www.skillcollector.com
 * License: GPLv2
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
	wp_enqueue_script( 'cookie-js', plugins_url('/includes/js.cookie.js', __FILE__), array(), '2.0.3', true );
}
add_action( 'wp_enqueue_scripts', 'wpsp_cookieJs' );


////////////////
//// Functionality
////////////////
include( __DIR__ . '/functions/popper.php');
?>