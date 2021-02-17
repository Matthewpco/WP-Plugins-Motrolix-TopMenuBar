<?php
/*
Plugin Name: Motrolix Top Menu Bar
Plugin URI: http://motrolix.com
Description: Plugin to add functionality to top menu bar
Author: John  Tighe
Author URI: http://tgtech.com
Version: 0.1.36
*/

/******************************
* global variables
******************************/

// used to ensure scripts are loaded
$version='0.1.36';

// turn off admin bar on front end ?
	add_filter('show_admin_bar', '__return_false');

/******************************
* includes
******************************/

// general functions
include('inc/functions.php');		// main functions file

if( ! is_admin() ) {
	// Front End only includes
	include('inc/scripts.php');	// loads JS / CSS

} else {
	// Back End only includes
}