<?php
/*-------------------------------------------------------------------------------------
TABLE OF CONTENTS
- Hook Definitions
- Contextual Hook and Filter Functions
-- woo_do_atomic()
-- woo_apply_atomic()
-- woo_get_query_context()
-------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Hook Definitions */
/*-----------------------------------------------------------------------------------*/
// header.php			
function tm_header_before() { do_action( 'tm_header_before' ); }	
add_action('tm_header_before', 'tm_id1', 20);
if(get_option('id')=='yes'){
if ( ! function_exists( 'tm_id1' ) ) {
 function tm_id1($atts){  
       echo stripslashes(get_option('tm_header_before')); 
    }  
}	
}
else{
if ( ! function_exists( 'tm_id1' ) ) {
	function tm_id1() {
		echo stripslashes(get_option('tm_header_before'));
	}
}
}
function tm_header() { do_action( 'tm_header' ); }			
add_action('tm_header', 'tm_id12', 20);
if ( ! function_exists( 'tm_id12' ) ) {
	function tm_id12() {
		echo stripslashes(get_option('tm_header'));
	}
}
function tm_header_inside() { do_action( 'tm_header_inside' ); }			
add_action('tm_header_inside', 'tm_id2', 20);
if ( ! function_exists( 'tm_id2' ) ) {
	function tm_id2() {
		echo stripslashes(get_option('tm_header_inside'));
	}
}
function tm_header_after() { do_action( 'tm_header_after' ); }			
add_action('tm_header_after', 'tm_id3', 20);
if ( ! function_exists( 'tm_id3' ) ) {
	function tm_id3() {
		echo stripslashes(get_option('tm_header_after'));
	}
}
function tm_footer_before() { do_action( 'tm_footer_before' ); }			
add_action('tm_footer_before', 'tm_id4', 20);
if ( ! function_exists( 'tm_id4' ) ) {
	function tm_id4() {
		echo stripslashes(get_option('tm_footer_before'));
	}
}
function tm_footer_inside() { do_action( 'tm_footer_inside' ); }			
add_action('tm_footer_inside', 'tm_id5', 20);
if ( ! function_exists( 'tm_id5' ) ) {
	function tm_id5() {
		echo stripslashes(get_option('tm_footer_inside'));
	}
}
function tm_footer_after() { do_action( 'tm_footer_after' ); }			
add_action('tm_footer_after', 'tm_id6', 20);
if ( ! function_exists( 'tm_id6' ) ) {
	function tm_id6() {
		echo stripslashes(get_option('tm_footer_after'));
	}
}
function tm_content_before() { do_action( 'tm_content_before' ); }			
add_action('tm_content_before', 'tm_id7', 20);
if ( ! function_exists( 'tm_id7' ) ) {
	function tm_id7() {
		echo stripslashes(get_option('tm_content_before'));
	}
}
function tm_content_after() { do_action( 'tm_content_after' ); }			
add_action('tm_content_after', 'tm_id8', 20);
if ( ! function_exists( 'tm_id8' ) ) {
	function tm_id8() {
		echo stripslashes(get_option('tm_content_after'));
	}
}
function tm_main_before() { do_action( 'tm_main_before' ); }			
add_action('tm_main_before', 'tm_id9', 20);
if ( ! function_exists( 'tm_id9' ) ) {
	function tm_id9() {
		echo stripslashes(get_option('tm_main_before'));
	}
}
function tm_left_before() { do_action( 'tm_left_before' ); }			
add_action('tm_left_before', 'tm_id10', 20);
if ( ! function_exists( 'tm_id10' ) ) {
	function tm_id10() {
		echo stripslashes(get_option('tm_left_before'));
	}
}
function tm_left_after() { do_action( 'tm_left_after' ); }			
add_action('tm_left_after', 'tm_id11', 20);
if ( ! function_exists( 'tm_id11' ) ) {
	function tm_id11() {
		echo stripslashes(get_option('tm_left_after'));
	}
}
function tm_right_before() { do_action( 'tm_right_before' ); }			
add_action('tm_right_before', 'tm_id12', 20);
if ( ! function_exists( 'tm_id12' ) ) {
	function tm_id12() {
		echo stripslashes(get_option('tm_right_before'));
	}
}
function tm_right_after() { do_action( 'tm_right_after' ); }			
add_action('tm_right_after', 'tm_id13', 20);
if ( ! function_exists( 'tm_id13' ) ) {
	function tm_id13() {
		echo stripslashes(get_option('tm_right_after'));
	}
}
function tm_custom_css() { do_action( 'tm_custom_css' ); }      
add_action('tm_custom_css', 'tm_id14', 20);
if ( ! function_exists( 'tm_id14' ) ) {
  function tm_id14() {  
    echo  '<style>'.stripslashes(get_option('tm_custom_css')).'</style>';;
  }
}