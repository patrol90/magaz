<?php
/*
  Plugin Name: Templatemela Custom Widgets
  Plugin URI: http://www.templatemela.com
  Description: Templatemela Default Homepage Slide Show for templatemela WordPress themes.
  Version: 1.0
  Author: Templatemela
  Author URI: http://www.templatemela.com
  @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
  @license    http://www.templatemela.com/license/
 */
?>
<?php 
//  Creating Widget 
// Reference : http://codex.wordpress.org/Widgets_API
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override tm_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 
 * @uses register_sidebar
 */
function tm_register_sidebars() {
	register_sidebar( array(
		'name' => esc_html__( 'Home Sidebar CMS Area', 'bigshopper' ),
		'id' => 'home-sidebar-cms',
		'description' => esc_html__( 'The Sidebar CMS area on homepage', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s tab_content">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Header Area', 'bigshopper' ),
		'id' => 'header-widget',
		'description' => esc_html__( 'The Cart on header', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s tab_content">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Header Search Widget Area', 'bigshopper' ),
		'id' => 'header-search',
		'description' => esc_html__( 'The header search widget area', 'bigshopper' ),
		'before_widget' => '',
		'after_widget' => " ",
		'before_title' => ' ',
		'after_title' => ' ',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Header Product Category Widget Area', 'bigshopper' ),
		'id' => 'header-category',
		'description' => esc_html__( 'The product category dropdwon widget area', 'bigshopper' ),
		'before_widget' => '',
		'after_widget' => " ",
		'before_title' => ' ',
		'after_title' => ' ',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'First Footer Widget Area', 'bigshopper' ),
		'id' => 'first-footer-widget-area',
		'description' => esc_html__( 'The first footer widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Second Footer Widget Area', 'bigshopper' ),
		'id' => 'second-footer-widget-area',
		'description' => esc_html__( 'The second footer widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Third Footer Widget Area', 'bigshopper' ),
		'id' => 'third-footer-widget-area',
		'description' => esc_html__( 'The third footer widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Fourth Footer Widget Area', 'bigshopper' ),
		'id' => 'forth-footer-widget-area',
		'description' => esc_html__( 'The forth footer widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Fifth Footer Widget Area', 'bigshopper' ),
		'id' => 'fifth-footer-widget-area',
		'description' => esc_html__( 'The fifth footer widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Product Page Side-bar Area', 'bigshopper' ),
		'id' => 'single-product-side-widget-area',
		'description' => esc_html__( 'The Single Product Side widget area', 'bigshopper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
}
/**
 * Register sidebars by running tm_widgets_init() on the widgets_init hook. 
 */
add_action( 'widgets_init', 'tm_register_sidebars' );
get_template_part('templatemela/widgets/tm-aboutus');
get_template_part('templatemela/widgets/tm-advertise');
get_template_part('templatemela/widgets/tm-flickr');
get_template_part('templatemela/widgets/tm-follow-us');
get_template_part('templatemela/widgets/tm-footer-contactus');
get_template_part('templatemela/widgets/tm-header-contact');
get_template_part('templatemela/widgets/tm-static-links');
get_template_part('templatemela/widgets/tm-static-text');
get_template_part('templatemela/widgets/tm-left-banner');
get_template_part('templatemela/widgets/tm-cmsblock');
get_template_part('templatemela/widgets/tm-footer-aboutus');
get_template_part('templatemela/widgets/tm-advance-search');
get_template_part('templatemela/widgets/tm-brand-list');
?>