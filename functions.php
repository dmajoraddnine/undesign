<?php
/**
 * functions.php
 *
 * contains assorted functions used to modify the theme
 *
 * undesign theme by Matt Yetter (http://www.matt-yetter.com)
 * many thanks to the wordpress folks for their great documentation and examples
*/

// hook in the javascript for undesign and for twitter bootstrap (printed into the footer for speed reasons)
function add_undesign_js()
{
	if( !is_admin() ) //only add scripts on non-admin pages
	{
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array( 'jquery' ), false, true);
		wp_enqueue_script('undesign', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'bootstrap' ), false, true);
		wp_enqueue_script('analytics', get_template_directory_uri() . '/js/google-analytics.js', array(), false, false);
	}
}
add_action('init', 'add_undesign_js');

// hook in CSS for undesign and for twitter bootstrap
function theme_styles()
{
	if( !is_admin() ) //only add css on non-admin pages
	{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), false, 'all');
		wp_register_style('bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap/bootstrap-responsive.min.css', array(), false, 'all');
		wp_register_style('undesign', get_template_directory_uri() . '/css/style.css', array(), false, 'all');

    wp_enqueue_style('bootstrap');
		wp_enqueue_style('bootstrap-responsive');
		wp_enqueue_style('undesign');
	}
}
add_action('wp_enqueue_scripts', 'theme_styles');