<?php
/**
 * functions.php
 *
 * contains assorted functions used to modify the theme
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
 */

//add the javascript for undesign and for twitter bootstrap (printed into the footer for speed reasons)
add_action( 'template_redirect', 'add_undesign_js' );
 
function add_undesign_js()
{
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'undesign_js', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'bootstrap' ), false, true );
}

//add CSS for undesign and for twitter bootstrap
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_styles()
{
	wp_register_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
	wp_register_style( 'undesign_css', get_template_directory_uri() . '/style.css', array(), false, 'all' );
	
	wp_enqueue_style( 'bootstrap_css' );
	wp_enqueue_style( 'undesign_css' );
}