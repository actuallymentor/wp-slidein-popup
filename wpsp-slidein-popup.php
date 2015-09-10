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
if($_GET['debug']) {
	echo '<script>console.log("Plugin Working")</script>'; 
}
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
//// Functionality
////////////////
if ($_GET['run']){
include( __DIR__ . '/functions/popper.php');
}
?>