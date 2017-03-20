<?php
/*
  Plugin Name: Templatemela Shortcode
  Plugin URI: http://www.templatemela.com
  Description: Templatemela Custom Shortcodes for templatemela WordPress themes.
  Version: 1.0
  Author: Templatemela
  Author URI: http://www.templatemela.com
 */
?>
<?php  if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
?>
<?php 
 // Before VC Init
if ( ! defined( 'TM_SHORTCODE_DIR' ) ) {
define( 'TM_SHORTCODE_DIR', plugin_dir_path( __FILE__ ) );  
}
if ( ! defined( 'TM_SHORTCODE_URL' ) ) {
	define( 'TM_SHORTCODE_URL', plugin_dir_url( __FILE__ ) );
}
    //.. Code from other Tutorials ..//
function tm_shortcode_init()
{
    // Require new custom Element
    require_once( TM_SHORTCODE_DIR.'/vc-elements/vc-element.php' ); 
    require_once( TM_SHORTCODE_DIR.'/shortcodes/templatemela-shortcodes.php' ); 
}
add_action('tm_shortcode_init', 'tm_shortcode_init');
function tm_shortcode_install() { 
	do_action( 'tm_shortcode_init' );
}
add_action( 'plugins_loaded', 'tm_shortcode_install', 11 );
function tm_shortcode_wp_admin_style() {
        wp_register_style( 'tmshortcode-style', TM_SHORTCODE_URL.'assets/css/style.css', false, '1.0.0' );
        wp_enqueue_style( 'tmshortcode-style' );
}
add_action( 'admin_enqueue_scripts', 'tm_shortcode_wp_admin_style' );
if( ! function_exists( 'tm_get_categories' ) )
{
/**
 * GET Categories | Categories for posts or specified taxonomy
 *
 * @param string $category Category slug
 * @return array
 */
function tm_get_categories( $category ) {
$categories = get_categories( array( 'taxonomy' => $category ));
$array = array( '' => __( 'All', 'tm-opts' ) );
foreach( $categories as $cat ){
if( is_object($cat) ) $array[$cat->slug] = $cat->name;
}
return $array;
}
}
?>