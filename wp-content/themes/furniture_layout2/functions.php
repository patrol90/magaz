<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */

function tm_set_default_options_child()
{ 
	add_option("tm_logo_image", get_stylesheet_directory_uri()."/images/megnor/logo.png");// set logo image	
	add_option("tm_mob_logo_image", get_stylesheet_directory_uri()."/images/megnor/mob-logo.png"); // set logo image		
	add_option("tm_button_hover_color","c2a773"); // button hover color
	add_option("tm_revslider_alias","tm_homeslider_furniture_layout2"); // Revolution Slider Alias
	add_option("tm_bottom_header_bg_color","000000"); // Top Header background color
	add_option("tm_top_nav_bg_color","000000"); // Top menu background color
	add_option("tm_top_menu_texthover_color","c2a773"); // Top menu background color
	add_option("tm_hoverlink_color","c2a773"); // link hover color
	add_option("tm_footerhoverlink_color","c2a773"); // footer link hover text color	
}	
add_action('init', 'tm_set_default_options_child');
function tm_child_scripts() {
    wp_enqueue_style( 'bigshopper-child-style', get_template_directory_uri(). '/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'tm_child_scripts' );
function tm_load_scripts_child() {	
wp_enqueue_script( 'tm_custom', get_stylesheet_directory_uri() . '/js/megnor/custom.js', array(), '', true);	  	
 }
add_action( 'wp_enqueue_scripts', 'tm_load_scripts_child' );
function tm_unregister_sidebars() {
	unregister_sidebar('home-sidebar-cms');
}
add_action( 'init', 'tm_unregister_sidebars' );
?>