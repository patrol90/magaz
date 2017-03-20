<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */

function bigshopper_set_default_options_child()
{ 
	add_option("tm_button_hover_color","c2a773"); // button hover color
	add_option("tm_revslider_alias","tm_homeslider_furniture_layout2"); // Revolution Slider Alias
	add_option("tm_bottom_header_bg_color","000000"); // Top Header background color
	add_option("tm_top_nav_bg_color","000000"); // Top menu background color
	add_option("tm_top_menu_texthover_color","c2a773"); // Top menu background color
	add_option("tm_hoverlink_color","c2a773"); // link hover color
	add_option("tm_footerhoverlink_color","c2a773"); // footer link hover text color	
}	
add_action('init', 'bigshopper_set_default_options_child');
function bigshopper_child_scripts() {
    wp_enqueue_style( 'bigshopper-child-style', get_template_directory_uri(). '/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'bigshopper_child_scripts' );
function bigshopper_load_scripts_child() {	
wp_enqueue_script( 'bigshopper_custom', get_stylesheet_directory_uri() . '/js/megnor/custom.js', array(), '', true);	  	
 }
add_action( 'wp_enqueue_scripts', 'bigshopper_load_scripts_child' );
function bigshopper_unregister_sidebars() {
	unregister_sidebar('home-sidebar-cms');
}
add_action( 'init', 'bigshopper_unregister_sidebars' );

add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +
  
function woo_custom_product_add_to_cart_text() {
  
    return __( 'Купить', 'woocommerce' );
  
}

add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
     $currencies['BYN'] = __( 'Бел.рубль', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'BYN': $currency_symbol = 'р.'; break;
     }
     return $currency_symbol;
}
?>