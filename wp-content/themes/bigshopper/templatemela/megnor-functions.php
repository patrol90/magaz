<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
add_image_size('tm_gallery_thumbnail', 145, 145, true);
if ( ! isset( $content_width ) )
	$content_width = 1150;
/**  Set Default options : Theme Settings  */
function tm_set_default_options()
{
/*  General Settings  */
	add_option("tm_logo_image", get_stylesheet_directory_uri()."/images/megnor/logo.png");// set logo image	
	add_option("tm_logo_image_alt",'Bigshopper'); // set logo image alt
	add_option("tm_mob_logo_image", get_stylesheet_directory_uri()."/images/megnor/mob-logo.png"); // set logo image	
	add_option("tm_mob_logo_image_alt",'Bigshopper'); // set logo image alt
	add_option("tm_showsite_description",'no'); // yes/no, control panel		
	add_option("tm_contact_email",'support@templatemela.com'); // yes/no, control panel
	add_option("tm_control_panel",'no'); // yes/no, control panel		
	add_option("tm_background_upload",""); // Default, texture specified image
	add_option("tm_texture",'body-bg.png'); // Default, extra texture image
	add_option("tm_back_repeat","repeat"); // background repeate
	add_option("tm_back_position","top+left"); // background position
	add_option("tm_back_attachment","scroll"); // background attachment
	add_option("tm_bkg_color","EDEDED"); // background color
	add_option("tm_bodyfont_color","808080"); // body font color
	add_option("tm_bodyfont",'Open Sans'); // Open Sans	
	add_option("tm_bodyfont_other",'Arial'); // Arial	
	add_option("tm_button_color","000000"); // button color
	add_option("tm_button_opacity","1"); // button opacity 
	add_option("tm_button_text_color","FFFFFF"); // button Text color
	add_option("tm_button_hover_color","2196f3"); // button hover color
	add_option("tm_button_hover_opacity","1"); // button opacity 
	add_option("tm_button_hover_text_color","FFFFFF"); // button hover Text color
	add_option("tm_revslider_alias",'tm_homeslider');
	
	
	/*  Header Settings  */	
	add_option("tm_header_background_upload", ''); // header background image
	add_option("tm_header_back_repeat","no-repeat"); // header background repeate
	add_option("tm_header_back_position","top+center"); // header background position
	add_option("tm_header_back_attachment","scroll"); // header background attachment	
	add_option("tm_header_bkg_color","EDEDED"); // header background color	
	add_option("tm_header_bkg_opacity","1"); // header background opacity	
	
	 /*  Top Header Settings  */	
    add_option("tm_top_header_bg_color","FFFFFF"); // Top Header background color
	add_option("tm_top_header_opacity","1");  // Top menu background opacity
	/*  Bottom Header Settings  */	
    add_option("tm_bottom_header_bg_color","2196f3"); // Top Header background color
	add_option("tm_bottom_header_opacity","1");  // Top Header background opacity
   
    /*  Navigation Menu Setting  */
	add_option("tm_top_nav_bg_color","2196f3"); // Top menu background color
	add_option("tm_top_nav_bar_opacity","0.0"); // Top menu background opacity
	add_option("tm_navbar_category_title","categories"); // Sidebar Category name
	add_option("tm_top_menu_text_color","FFFFFF"); // Top menu text color
	add_option("tm_top_menu_texthover_color","000000"); // Top menu text hover color
	
	/*  Contact Setting  */
	add_option("tm_show_topbar_contact","yes"); // show contact informatio
	add_option("tm_topbar_phone_text","call us now"); // set contact text
	add_option("tm_topbar_phone","0123-456-789"); // set contact number
	
	/* Content Service Block  */
	add_option("tm_service_block","yes"); // Show Custom Banner
	add_option("tm_custom_title1","Free Collection"); // Custom title 1
	add_option("tm_custom_desc1"," From 400+stores"); // Custom Description 1
	add_option("tm_custom_title2","Free Delivery"); // Custom title 2	
	add_option("tm_custom_desc2","When you spend $50"); // Custom Description 2
	add_option("tm_custom_title3","Free Returns"); // Custom title 3
	add_option("tm_custom_desc3","on all uk orders"); // Custom Description 3
		
	/*  Content Settings  */
	add_option("tm_h1font",'Open Sans'); // h1 family google font
	add_option("tm_h1font_other",'Arial'); // h1 family specified font
	add_option("tm_h1color",'000000'); // h1 family font color	 
	add_option("tm_h2font",'Open Sans'); // h2 family google font
	add_option("tm_h2font_other",'Arial'); // h2 family specified font
	add_option("tm_h2color",'000000'); // h2 family font color	
	add_option("tm_h3font",'Open Sans'); // h3 family google font
	add_option("tm_h3font_other",'Arial'); // h3 family specified font
	add_option("tm_h3color",'000000'); // h3 family font color	
	add_option("tm_h4font",'Open Sans'); // h4 family google font
	add_option("tm_h4font_other",'Arial'); // h4 family specified font
	add_option("tm_h4color",'000000'); // h4 family font color	
	add_option("tm_h5font",'Open Sans'); // h5 family google font
	add_option("tm_h5font_other",'Arial'); // h5 family specified font 
	add_option("tm_h5color",'000000'); // h5 family font color	
	add_option("tm_h6font",'Open Sans'); // h6 family google font
	add_option("tm_h6font_other",'Arial'); // h6 family specified font 
	add_option("tm_h6color",'000000'); // h6 family font color	
	add_option("tm_link_color","333333"); // link color
	add_option("tm_hoverlink_color","2196f3"); // link hover color
	
	/*  Sidebar setting for other pages  */
	add_option("tm_page_sidebar","yes");
	
	/*  Footer Settings  */	
	add_option("tm_footerbkg_color","FFFFFF"); // footer background color
	add_option("tm_footerlink_color","808080"); // footer link text color
	add_option("tm_footerhoverlink_color","2196f3"); // footer link hover text color
	add_option("tm_footerfont",'Open Sans'); // footer google font
	add_option("tm_footerfont_other",'Arial'); // footer specified font
	add_option("tm_footer_slog",'Templatemela'); // copyright statement : Theme By templatemela
	add_option("tm_footer_link",'https://www.google.co.in'); // copyright statement : Theme By templatemela
	
	/* Shop page settings */	
	add_option("tm_secondaryimage","yes");
	add_option("tm_shop_items","15"); 
	
	/* Product setting */
	add_option("tm_shop_items_per_row","5"); 
	add_option("tm_related_items","12"); 
	add_option("tm_upsells_items","12"); 
	add_option("tm_crosssell_items","12");
	
	/* Sidebar setting for Single product page  */
	add_option("tm_shop_sidebar","no");
}

add_action('init', 'tm_set_default_options');
function tm_get_logo() {
	if (trim(get_option('tm_logo_image_alt')) != '') $logo_alt = get_option('tm_logo_image_alt') ; else $logo_alt = esc_attr(get_bloginfo('name', 'display' ));
	if (trim(get_option('tm_logo_image')) != ''){ echo '<img alt="'.get_option('tm_logo_image_alt').'" src="'.get_option('tm_logo_image').'" />';}
	           else{echo '<img alt="'.get_option('tm_logo_image_alt').'" src=" '.get_template_directory_uri(). '/images/megnor/logo.png">';}
}
function tm_get_mob_logo() {
	if (trim(get_option('tm_mob_logo_image_alt')) != '') $logo_alt = get_option('tm_mob_logo_image_alt') ; else $logo_alt = esc_attr(get_bloginfo('name', 'display' ));
	if (trim(get_option('tm_mob_logo_image')) != ''){ echo '<img alt="'.get_option('tm_mob_logo_image_alt').'" src="'.get_option('tm_mob_logo_image').'" />';}
	           else{echo '<img alt="'.get_option('tm_mob_logo_image_alt').'" src=" '.get_template_directory_uri(). '/images/megnor/mob-logo.png">';}
}
function tm_get_top_cms_banner() {
	if (trim(get_option('tm_top_cms_banner_image_alt')) != '') $logo_alt = get_option('tm_top_cms_banner_image_alt') ; else $logo_alt = esc_attr(get_bloginfo('name', 'display' ));
	if (trim(get_option('tm_top_cms_banner_image')) != ''){ 
					echo '<img alt="'.get_option('tm_top_cms_banner_image_alt').'" src="'.get_option('tm_top_cms_banner_image').'" />';}
	           else{echo '<img alt="'.get_option('tm_top_cms_banner_image_alt').'" src="'.get_template_directory_uri().'/images/megnor/top-banner.png">';}
}
function tm_get_sort_column() {
	$sort_column=''; 
	if(trim(get_option('tm_navigation_type'))=='categories'){
		if( trim(get_option('tm_navigation_sort_column')) =='id' || trim(get_option('tm_navigation_sort_column'))=='menu_order')
			$sort_column = 'ID';
		elseif(trim(get_option('tm_navigation_sort_column'))=='name' || trim(get_option('tm_navigation_sort_column'))=='post_title')
			$sort_column = 'name';
		elseif(trim(get_option('tm_navigation_sort_column'))=='count')
			$sort_column = 'count';
	}
	elseif(trim(get_option('tm_navigation_type'))=='pages'){
		if(trim(get_option('tm_navigation_sort_column'))=='id')
			$sort_column = 'ID';
		elseif(trim(get_option('tm_navigation_sort_column'))=='menu_order')
			$sort_column = 'menu_order';
		elseif(trim(get_option('tm_navigation_sort_column'))=='post_title' || trim(get_option('tm_navigation_sort_column'))=='name')
			$sort_column = 'post_title';
	}
	return $sort_column;
}
function tm_get_sort_order() {
	$sort_order='';
	if(trim(get_option('tm_navigation_sort_order'))=='asc')
		return 'asc';
	if(trim(get_option('tm_navigation_sort_order'))=='desc')
		return 'desc';
	return $sort_order;
}
function tm_get_all_categories() {
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	$categories = wp_get_post_categories( $postid );
	$cats = ', ';
	foreach($categories as $c){
		$cat = get_category( $c );	
		$cats .= $cat->name. ',';
	}
	$cats=strtolower(rtrim($cats, " ,"));
	return $cats;
}
function tm_get_all_tags() {
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	$alltags = wp_get_post_tags( $postid );
	$tags = ', ';
	foreach($alltags as $tag){
		$tags .= $tag->name. ',';
	}
	$tags=strtolower(rtrim($tags, " ,"));
	return $tags;
}
function tm_extra_head(){
	$themeinfo = wp_get_theme(get_template_directory() . '/style.css');	
	echo '<meta name="generator" content="'.$themeinfo['Name'].' - '.$themeinfo['Version'].'" />';
}
add_action('wp_head','tm_extra_head');
add_action( "admin_enqueue_scripts", 'tm_admin_scripts');
add_action( "admin_enqueue_scripts", 'tm_admin_styles');
add_action( "admin_enqueue_scripts", 'tm_admin_metabox_script');
add_action( "admin_enqueue_scripts", 'tm_admin_metabox_styles');
function tm_admin_scripts() {
	//Scripts	
	wp_enqueue_script( 'tm_pscript_admin', get_template_directory_uri() . '/js/megnor/admin/pscript_admin.js');
	wp_enqueue_script( 'jscolor', get_template_directory_uri() . '/js/megnor/admin/jscolor/jscolor.js');
	wp_enqueue_script( 'easytabs_min', get_template_directory_uri() . '/js/megnor/admin/jquery.easytabs.min.js');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('tm-my-upload', get_template_directory_uri() . '/js/megnor/admin/custom.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('tm-my-upload');	
}
function tm_admin_styles() { 
	//Styles
	wp_enqueue_style('tm_admin', get_template_directory_uri() . '/css/megnor/admin/tm_admin.css');
	wp_enqueue_style('tm_tab', get_template_directory_uri() . '/css/megnor/admin/tab.css');
	wp_enqueue_style('thickbox');
}
function tm_admin_metabox_script() { 
	//Scripts
	wp_enqueue_script( 'tm_metabox_script', get_template_directory_uri() . '/js/megnor/admin/tm_metabox_script.js' );
}
function tm_admin_metabox_styles() { 
	//Styles
	wp_enqueue_style('tm_metabox_style', get_template_directory_uri() . '/css/megnor/admin/tm_metabox_style.css');
}
function tm_add_admin_menu_separator($position) {
  global $menu;
  $index = 0;
  foreach($menu as $offset => $section) {
    if (substr($section[2],0,9)=='separator')
      $index++;
    if ($offset>=$position) {
      $menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
      break;
    }
  }
  ksort($menu);
}
if ( ! function_exists( 'tm_admin_header_style' ) ) :
	function tm_admin_header_style() {}
endif;
/**
 * Sets the post excerpt length to 40 characters.
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 * @return int
 */
function tm_excerpt_length( $length ) {
	return 200;
}
remove_filter( 'excerpt_length', 'tm_excerpt_length' ); 
add_filter( 'excerpt_length', 'tm_excerpt_length' );
function tm_string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
/**
 * Returns a "Continue Reading" link for excerpts
 * @return string "Continue Reading" link
 */
function tm_continue_reading_link() {
	return ' <a class="read-more-link" href="'.esc_url(get_permalink()) . '">' . esc_html__( 'Читать далее', 'bigshopper' ) . '</a>';
}
add_filter( 'excerpt_length', 'tm_excerpt_length' );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and tm_continue_reading_link().
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 * @return string An ellipsis
 */
function tm_auto_excerpt_more( $more ) {
	return  '&hellip;' .tm_continue_reading_link();
}
add_filter( 'excerpt_more', 'tm_auto_excerpt_more' );
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function tm_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output = '&hellip;'. tm_continue_reading_link();
	}
	return $output;
}
/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 * @deprecated Deprecated in TemplateMela for WordPress 3.1
 * @return string The gallery style filter, with the styles themselves removed.
 */
function tm_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.3.2', '<' ) )
	add_filter( 'gallery_style', 'tm_remove_gallery_css' );
/**
 * Return the URL for the first link found in the post content.
 *
 * @since Twenty Eleven 1.0
 * @return string|bool URL or false when no link is present.
 */
function tm_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;
	return esc_url_raw( $matches[1] );
}
function tm_get_widget($location = '') {
	if ( is_active_sidebar($location) ) { 
		dynamic_sidebar($location); 
	}
}
if (version_compare( $GLOBALS['wp_version'], '3.3', '>=' )) 	
	get_template_part('templatemela/widgets');		
/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using TemplateMela in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default TemplateMela styling.
 *
 */
function tm_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'tm_remove_recent_comments_style' );
function tm_get_pagination($range = 4){  
	// $paged - number of the current page  
	global $paged, $wp_query, $max_page;  
	// How much pages do we have?  
	if ( !$max_page ) {  
		$max_page = $wp_query->max_num_pages;  
	}  
	// We need the pagination only if there are more than 1 page  
	if($max_page > 1){  
		if(!$paged){  
			$paged = 1;  
		}  
		// On the first page, don't put the First page link  
		if($paged != 1){  
			echo '<a class="first" href=" '. get_pagenum_link(1) .' "> << </a>';  
		}
		// To the previous page  
		previous_posts_link(' < ');
		// We need the sliding effect only if there are more pages than is the sliding range  
		if($max_page > $range){  
		 // When closer to the beginning  
			 if($paged < $range){  
			   for($i = 1; $i <= ($range + 1); $i++){  
			   	 if($i==$paged){$class = "current number"; }else { $class = "number"; } 
				 echo "<a class='".$class."' href='" . get_pagenum_link($i). "'>$i</a>";  
			   }  
			 }  
			 // When closer to the end  
			 elseif($paged >= ($max_page - ceil(($range/2)))){  
			   for($i = $max_page - $range; $i <= $max_page; $i++){  
				  if($i==$paged){$class = "current number"; }else { $class = "number"; } 
				 echo "<a class='".$class."' href='" . get_pagenum_link($i). "'>$i</a>";   
			   }  
			 }  
			 // Somewhere in the middle  
			 elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){  
			   for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){  
				  if($i==$paged){$class = "current number"; }else { $class = "number"; } 
				 echo "<a class='".$class."' href='" . get_pagenum_link($i). "'>$i</a>";  
			   }  
			 }  
		}  
		// Less pages than the range, no sliding effect needed  
		else{  
		 for($i = 1; $i <= $max_page; $i++){  
		  if($i==$paged){$class = "current number"; }else { $class = "number"; } 
		   echo "<a class='".$class."' href='" . get_pagenum_link($i). "'>$i</a>";  
		 }  
		}  
		// Next page  
		next_posts_link(' > ');  
		// On the last page, don't put the Last page link  
		if($paged != $max_page){  
		 echo '<a class="last" href=" '. get_pagenum_link($max_page) .' "> >> </a>';  
		}  
	}  
}  	
function tm_posts_next_link_attributes($html){
	$html = str_replace('<a','<a class="next-post"',$html);
	return $html;
	}
	function tm_posts_previous_link_attributes($html){
	$html = str_replace('<a','<a class="prev-post"',$html);
	return $html;
	}
add_filter('next_post_link','tm_posts_next_link_attributes',10,1);
add_filter('previous_post_link','tm_posts_previous_link_attributes',10,1);
function tm_get_first_post_images($post_ID){
	global $post, $posts;
	$first_img_src = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if (isset($matches[1][0]))
	$first_img_src = $matches[1][0];
	if(empty($first_img_src)){ 
		return 0;
	}
	return $first_img_src;

}
function tm_print_images_thumb($src,$alttext, $width=200,$height=200,$align='left')
{	
	$src = tm_mr_image_resize($src, $width, $height, true, $align, false);
	if( empty ( $src ) || $src == 'image_not_specified' ):
		$src = get_template_directory_uri()."/images/megnor/placeholder.png";
		$src = tm_mr_image_resize($src, $width, $height, true, $align, false);
	endif;
	$return = '';
	$return .= '<img src="'.$src.'"';
	$return .= " title='$alttext' alt='$alttext' width='$width' height='$height' />";	
	echo balanceTags($return);
}
function tm_excerpt($limit) 
{
      $excerpt = explode(' ', tm_strip_images(strip_tags(get_the_excerpt())), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'&nbsp;.<div class="read-more"><a class="read-more-link" href="'.esc_url(get_permalink()).'">'.esc_html__( 'Читать далее' , 'bigshopper' ).'&nbsp;<i class="fa fa-angle-right"></i></a></div>';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}

function tm_blog_post_excerpt( $limit ) {
$excerpt = get_the_excerpt();
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $limit);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
return $excerpt;
}

function tm_portfolio_excerpt($limit) 
{
    $contents = substr(tm_strip_images(strip_tags(get_the_excerpt())),0,$limit);	
	$excerpt = $contents; if (strlen($contents) >= $limit){ $excerpt .= '&hellip;'; }
  	return $excerpt;
}
if ( ! function_exists( 'tm_go_top' ) ) :
function tm_go_top(){ ?>
<div class="backtotop"><a style="display: none;" id="to_top" href="#"></a></div>
<?php } 
endif;
/* Favi Icon fucntion */
if ( ! function_exists( 'tm_site_icon' ) ) {
	function tm_site_icon() {
		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri() .'/templatemela/favicon.ico" />';
		}
	}
}
add_action('wp_head','tm_site_icon');
add_action('admin_head','tm_site_icon');
add_action('wp_head','tm_custom_css',15);

if ( ! function_exists( 'tm_strip_images' ) ) :
function tm_strip_images($content){	
   $content = preg_replace('/<img[^>]+./','',$content);
   return preg_replace('/<\/?a[^>]*>/','',$content);
}
endif;
/**
 * Remove inline styles printed when the gallery shortcode is used.
 * Galleries are styled by the theme in TemplateMela's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 */
add_filter( 'use_default_gallery_style', '__return_false' );


/**
 * Enqueue Templatemela Fonts
 */
function tm_load_fonts() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
   
	$OpenSans = _x( 'on', 'Open Sans font: on or off', 'bigshopper' );     

 
    if (  'off' !== $OpenSans ) {
			$font_families = array(); 
			 if ( 'off' !== $OpenSans ) {
				$font_families[] = 'Open Sans:300,400,600,700,800';		
			}              		
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
	 
			$fonts_url = esc_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ));
		} 
    return esc_url_raw( $fonts_url );
}
/*
Enqueue scripts and styles.
*/
function tm_google_fonts() {
    wp_enqueue_style( 'google_fonts', tm_load_fonts(), array(), '1.0.0' );
}
add_action( 'get_header', 'tm_google_fonts' );

//Load responsive.css file in the header
function tm_responsive()
{
wp_enqueue_style('tm_responsive', get_stylesheet_directory_uri() . '/responsive.css');
}
add_action('wp_footer','tm_responsive');

/**
 * Enqueue Templatemela Styles
 */
if ( ! function_exists( 'tm_load_styles' ) ) :
function tm_load_styles() {
	wp_enqueue_style('tm_isotope', get_template_directory_uri() . '/css/isotop-port.css');
	wp_enqueue_style('tm_custom', get_template_directory_uri() . '/css/megnor/custom.css');
	wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/css/megnor/owl.carousel.css');
	wp_enqueue_style('owl.transitions', get_template_directory_uri() . '/css/megnor/owl.transitions.css');		
	wp_enqueue_style('shadowbox', get_template_directory_uri() . '/css/megnor/shadowbox.css');
	wp_enqueue_style('tm_shortcode_style', get_template_directory_uri() . '/css/megnor/shortcode_style.css');
	wp_enqueue_style('animate_min', get_template_directory_uri() . '/css/megnor/animate.min.css');	
	//Adds front end control panel css
	if(get_option('tm_control_panel') == 'yes'):
		wp_enqueue_style('tm_tm-style', get_template_directory_uri() . '/css/megnor/tm-style.css');
	endif; 
	//Adds wocommerce style
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
		wp_enqueue_style('tm_woocommerce_css', get_template_directory_uri() . '/css/megnor/woocommerce.css');
	endif;
}
endif;
add_action('get_header', 'tm_load_styles');
/**
 * Enqueue Templatemela Scripts
 */
if ( ! function_exists( 'tm_load_scripts' ) ) :
function tm_load_scripts() {	
		wp_enqueue_script( 'jqtransform', get_template_directory_uri() . '/js/megnor/jquery.jqtransform.js', array(), '', false);
		wp_enqueue_script( 'jqtransform_script', get_template_directory_uri() . '/js/megnor/jquery.jqtransform.script.js', array(), '', false);
		wp_enqueue_script( 'tm_custom_script', get_template_directory_uri() . '/js/megnor/jquery.custom.min.js', array(), '', false);
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '', false);
		wp_enqueue_script( 'tm_megnor', get_template_directory_uri() . '/js/megnor/megnor.min.js', array(), '', false);
		wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/megnor/carousel.min.js', array(), '', false);
		wp_enqueue_script( 'easypiechart', get_template_directory_uri() . '/js/megnor/jquery.easypiechart.min.js', array(), '', false);
		wp_enqueue_script( 'tm_custom', get_template_directory_uri() . '/js/megnor/custom.js', array(), '', false);
		wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/megnor/owl.carousel.min.js', array(), '', false);
		wp_enqueue_script( 'formalize', get_template_directory_uri() . '/js/megnor/jquery.formalize.min.js', array(), '', false);
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/megnor/respond.min.js', array(), '', false);
		wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/megnor/jquery.validate.js', array(), '', false);
		wp_enqueue_script( 'shadowbox', get_template_directory_uri() . '/js/megnor/shadowbox.js', array(), '', false);		
		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/megnor/waypoints.min.js', array(), '', false);
		wp_enqueue_script( 'megamenu', get_template_directory_uri() . '/js/megnor/jquery.megamenu.js', array(), '', false);	
		wp_enqueue_script( 'easyResponsiveTabs', get_template_directory_uri() . '/js/megnor/easyResponsiveTabs.js', array(), '', false);
		wp_enqueue_script( 'jtree_min', get_template_directory_uri() . '/js/megnor/jquery.treeview.js', array(), '', false);	
		wp_enqueue_script( 'scroll-min', get_template_directory_uri() . '/js/megnor/jquery.jscroll.min.js', array(), '', false);
		wp_enqueue_script( 'parallex', get_template_directory_uri() . '/js/megnor/parallex.js', array(), '', false);
		wp_enqueue_script( 'countUp', get_template_directory_uri() . '/js/megnor/countUp.js', array(), '', false);
		wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/megnor/jquery.bxslider.js', array(), '', false);	
		wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/js/megnor/doubletaptogo.js', array(), '', false);
		wp_enqueue_script( 'countdown_min', get_template_directory_uri() . '/js/megnor/jquery.countdown.min.js', array(), '', false);
?>
<!--[if lt IE 9]>
	<?php wp_enqueue_script( 'tm_html5', get_template_directory_uri() . '/js/html5.js', array(), '', false); ?>
	<![endif]-->
<?php }
endif;
add_action( 'wp_enqueue_scripts', 'tm_load_scripts' );
/**
 * Enqueue Templatemela Control Panel Scripts
 */
if ( ! function_exists( 'tm_load_controlpanel_script' ) ) :
function tm_load_controlpanel_script() {
	if(get_option('tm_control_panel') == 'yes') : ?>
	<script type="text/javascript">
		var tm_theme_path = "<?php echo get_template_directory_uri() ?>";			
	</script> 
<?php
        wp_enqueue_script( 'jquery_colorpicker', get_template_directory_uri() . '/js/megnor/colorpicker/colorpicker.js', array(), '', false);
		wp_enqueue_script( 'jquery_cookie', get_template_directory_uri() . '/js/megnor/colorpicker/jquery.cookie.js', array(), '', false);
		wp_enqueue_script( 'jquery_pscript', get_template_directory_uri() . '/js/megnor/colorpicker/pscript.js', array(), '', false);	
	endif;	
}
endif;
add_action( 'wp_enqueue_scripts', 'tm_load_controlpanel_script' );


if ( ! function_exists( 'tm_breadcrumbs' ) ) :
function tm_breadcrumbs() { ?>
<div class="breadcrumbs">
  <?php if ( function_exists('yoast_breadcrumb') ) { ?>
  <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
  <?php } ?>
</div>
<?php }
endif;
function tm_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'bigshopper' ) . '</label>
    <input class="search-field" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input class="search-submit" type="submit" id="searchsubmit" value="'. esc_html__( 'Go', 'bigshopper' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'tm_search_form' );
if ( ! function_exists( 'tm_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own tm_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function tm_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php esc_html_e( 'Pingback:', 'bigshopper' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( esc_html__( '(Edit)', 'bigshopper' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
</li>
<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <div id="comment-<?php comment_ID(); ?>" class="comment-body">
    <div class="alignleft"> <?php echo get_avatar( $comment, 48 ); ?> </div>
    <div class="author-content">
      <h6><?php echo balanceTags($comment->comment_author); ?></h6>
      <?php edit_comment_link( esc_html__( 'Edit', 'bigshopper' ), ' ' ); ?>
      <div class="clearfix"></div>
      <abbr class="published" title=""><?php printf( esc_html__( '%1$s at %2$s', 'bigshopper' ), get_comment_date(),  get_comment_time() ); ?></abbr> </div>
    <div class="comment-content">
      <?php comment_text(); ?>
      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation">
    <?php esc_html_e( 'Your comment is awaiting moderation.', 'bigshopper' ); ?>
    </em> <br />
    <?php endif; ?>
  </div>
  <!-- #comment-##  -->
</li>
<?php
		break;
	endswitch; // end comment_type check
}
endif;
if ( ! function_exists( 'tm_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own tm_entry_meta() to override in a child theme.
 *
 * @since Templatemela 1.0
 *
 * @return void
 */
function tm_entry_meta() {
}
endif;

if ( ! function_exists( 'tm_get_topbar_banner' ) ) :
function tm_get_topbar_banner() {	
	$tm_custom_title1 = get_option('tm_custom_title1');
	$tm_custom_title2 = get_option('tm_custom_title2');
	$tm_custom_title3 = get_option('tm_custom_title3');
	$tm_custom_desc1 = get_option('tm_custom_desc1');
	$tm_custom_desc2 = get_option('tm_custom_desc2');
	$tm_custom_desc3 = get_option('tm_custom_desc3');
	$output = '';
	$output .= '<div class="service-cms">';		
		if (!empty($tm_custom_title1)):
			$output .= '<div class="serviceblock1 serviceblock"><div class="service-content"><div class="title">'.$tm_custom_title1.'</div>&nbsp;<div class="desc">'.$tm_custom_desc1.'</div></div></div>';	
		endif;
		if (!empty($tm_custom_title2)):
			$output .= '<div class="serviceblock2 serviceblock"><div class="service-content"><div class="title">'.$tm_custom_title2.'</div>&nbsp;<div class="desc">'.$tm_custom_desc2.'</div></div></div>';	
		endif;
		if (!empty($tm_custom_title3)):
			$output .= '<div class="serviceblock3 serviceblock"><div class="service-content"><div class="title">'.$tm_custom_title3.'</div>&nbsp;<div class="desc">'.$tm_custom_desc3.'</div></div></div>';				
		endif;	
		$output .= '</div>';				
					
	echo balanceTags($output);
}
endif;


if ( ! function_exists( 'tm_get_topbar_social' ) ) :
function tm_get_topbar_social() {
	$tm_topbar_twitter = get_option('tm_topbar_twitter');
	$tm_topbar_facebook = get_option('tm_topbar_facebook');
	$tm_topbar_google_plus = get_option('tm_topbar_google_plus');
	$tm_topbar_linkedin = get_option('tm_topbar_linkedin');
	$tm_topbar_youtube = get_option('tm_topbar_youtube');
	$tm_topbar_rss = get_option('tm_topbar_rss');
	$tm_topbar_pinterest = get_option('tm_topbar_pinterest');
	$tm_topbar_skype = get_option('tm_topbar_skype');
	$output = '';
	$output .= '<div class="topbar-social">';
		if (!empty($tm_topbar_twitter))
		$output .= '<div class="social-twitter content"><a href="'.esc_url($tm_topbar_twitter).'" target="_Blank"><i class="fa fa-twitter"></i></a></div>';
		if (!empty($tm_topbar_facebook))
		$output .= '<div class="social-facebook content"><a href="'.esc_url($tm_topbar_facebook).'" target="_Blank"><i class="fa fa-facebook"></i></a></div>';
		if (!empty($tm_topbar_google_plus))
		$output .= '<div class="social-google-plus content"><a href="'.esc_url($tm_topbar_google_plus).'" target="_Blank"><i class="fa fa-google-plus"></i></a></div>';
		if (!empty($tm_topbar_linkedin))
		$output .= '<div class="social-linkedin content"><a href="'.esc_url($tm_topbar_linkedin).'" target="_Blank"><i class="fa fa-linkedin"></i></a></div>';
		if (!empty($tm_topbar_youtube))
		$output .= '<div class="social-youtube content"><a href="'.esc_url($tm_topbar_youtube).'" target="_Blank"><i class="fa fa-youtube"></i></a></div>';
		if (!empty($tm_topbar_rss))
		$output .= '<div class="social-rss content"><a href="'.esc_url($tm_topbar_rss).'" target="_Blank"><i class="fa fa-rss"></i></a></div>';
		if (!empty($tm_topbar_pinterest))
		$output .= '<div class="social-pinterest content"><a href="'.esc_url($tm_topbar_pinterest).'" target="_Blank"><i class="fa fa-pinterest"></i></a></div>';
		if (!empty($tm_topbar_skype))
		$output .= '<div class="social-skype content"><a href="'.esc_url($tm_topbar_skype).'" target="_Blank"><i class="fa fa-skype"></i></a></div>';
	$output .= '</div>';
	echo balanceTags($output);
}
endif;
if ( ! function_exists( 'tm_sticky_post' ) ) :
function tm_sticky_post() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<div class="meta-inner"><span class="sticky-post">' . esc_html__( 'Sticky', 'bigshopper' ) . '</span></div>';
}
endif;
if ( ! function_exists( 'tm_categories_links' ) ) :
function tm_categories_links() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( esc_html__( ', ', 'bigshopper' ) );
	if ( $categories_list ) {
		echo '<div class="meta-inner"><span class="categories-links"><i class="fa fa-folder-o"></i>' . $categories_list . '</span></div>';
	}
}
endif;
if ( ! function_exists( 'tm_tags_links' ) ) :
function tm_tags_links() {
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', esc_html__( ', ', 'bigshopper' ) );
	if ( $tag_list ) {
		echo '<div class="meta-inner"><span class="tags-links"><i class="fa fa-tags"></i>' . $tag_list . '</span></div>';		
	}
}
endif;
if ( ! function_exists( 'tm_author_link' ) ) :
function tm_author_link() {
	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<div class="meta-inner"><span class="author vcard"><i class="fa fa-pencil-square-o"></i><a class="url fn n" href="%1$s" title="%2$s" rel="author">'.esc_html__("by ",'bigshopper').'%3$s</a></span></div>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'bigshopper' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;
if ( ! function_exists( 'tm_comments_link' ) ) :
function tm_comments_link() {
	//comments open
	if ( comments_open() && ! is_single() ) :
	echo '<div class="meta-inner"><span class="comments-link"> <i class="fa fa-comment-o"></i>';
	comments_popup_link( esc_html__( 'Оставить комментарий', 'bigshopper' ), esc_html__( '1 комментарий', 'bigshopper' ), esc_html__( '% комментариев', 'bigshopper' ) );
	echo '</span></div>';
	endif; 
}
endif;
if ( ! function_exists( 'tm_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own tm_entry_date() to override in a child theme.
 *
 * @since Templatemela 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function tm_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'bigshopper' );
	else
		$format_prefix = '%2$s';
	$date = sprintf( '<div class="meta-inner"><span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o" aria-hidden="true"></i>
<time class="entry-date" datetime="%3$s">%4$s</time></a></span></div>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( esc_html__( 'Permalink to %s', 'bigshopper' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	if ( $echo )
		echo balanceTags($date);
	return $date;
}
endif;
if ( ! function_exists( 'tm_post_entry_date' ) ) :
function tm_post_entry_date( ) {
	$date = get_the_date();	
	$day = get_the_date('d'); 
	$month = get_the_date('M');
	$year = get_the_date('Y'); 
	$date = '<div class="entry-date"><a href="'.esc_url(get_permalink()).'"><div class="month">'.$month.'</div><div class="day">'.$day.'</div></a></div>';
	echo balanceTags($date);
	return $date;
}
endif;


if ( ! function_exists( 'tm_posts_short_description' ) ) :
function tm_posts_short_description() {
	$tm_posts_short_description = get_post_meta(get_the_ID(), 'tm_posts_short_description', true);
	if(empty($tm_posts_short_description))
		$tm_posts_short_description = tm_excerpt(70);
	return $tm_posts_short_description;
}
endif;
if ( ! function_exists( 'tm_posts_show_thumbnail' ) ) :
function tm_posts_show_thumbnail() {
	$tm_posts_show_thumbnail = get_post_meta(get_the_ID(), 'tm_posts_show_thumbnail', true);
	if(empty($tm_posts_show_thumbnail))
		$tm_posts_show_thumbnail = '';
	return $tm_posts_show_thumbnail;
}
endif;
if ( ! function_exists( 'tm_page_layout' ) ) :
function tm_page_layout() {
	$page_layout_class = '';
	global $wp_query;	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if(is_shop()):
		$page_id = woocommerce_get_page_id('shop');
	else:
		$page_id = $wp_query->get_queried_object_id();
	endif;
	}else{
		$page_id = $wp_query->get_queried_object_id();
	}
	$tm_page_layout = get_post_meta($page_id, 'tm_page_layout', true);
	if(empty($tm_page_layout))
		$tm_page_layout = '';
		
	if($tm_page_layout == "box"):
		$page_layout_class = "box-page";
	elseif($tm_page_layout == "wide"):
		$page_layout_class = "wide-page";
	endif;
	return $page_layout_class;
}
endif;

if ( ! function_exists( 'tm_sidebar_position' ) ) :
function tm_sidebar_position() {
  $sidebar_class = '';
  global $wp_query;  
  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  if(is_shop() || is_archive()):
    $page_id = woocommerce_get_page_id('shop');
  else:
    $page_id = $wp_query->get_queried_object_id();
  endif;
  }else{
    $page_id = $wp_query->get_queried_object_id();
  }
  $tm_sidebar_position = get_post_meta($page_id, 'tm_sidebar_position', true);
  if(empty($tm_sidebar_position))
    $tm_sidebar_position = '';
    
  if($tm_sidebar_position == "left"):
    $sidebar_class = "left-sidebar";
  elseif($tm_sidebar_position == "right"):
    $sidebar_class = "right-sidebar";
  elseif($tm_sidebar_position == "disabled"):
    $sidebar_class = "full-width";
  endif;
  return $sidebar_class;
}
endif;

if ( ! function_exists( 'tm_blog_box_display' ) ) :
function tm_blog_box_display() {
	$main_container = '';
	$tm_blog_box_display = get_post_meta(get_the_ID(), 'tm_blog_box_display', true);
	if(empty($tm_blog_box_display))
		$tm_blog_box_display = '';
	if($tm_blog_box_display == 'masonry'):
		$main_container = 'masonry';
	elseif($tm_blog_box_display == 'grid'):
		$main_container = 'grid';
	endif;
	return $main_container;
}
endif;
if ( ! function_exists( 'tm_blog_box_columns_class' ) ) :
function tm_blog_box_columns_class() {
	$columns_class = '';
	$tm_blog_box_columns = get_post_meta(get_the_ID(), 'tm_blog_box_columns', true);
	if(empty($tm_blog_box_columns))
		$tm_blog_box_columns = '';
	if($tm_blog_box_columns == 'two'):
		$columns_class = 'two-col';
	elseif($tm_blog_box_columns == 'three'):
		$columns_class = 'three-col';
	elseif($tm_blog_box_columns == 'four'):
		$columns_class = 'four-col';
	endif;
	return $columns_class;
}
endif;
if ( ! function_exists( 'tm_blog_box_columns_number' ) ) :
function tm_blog_box_columns_number() {
	$columns_number = '';
	$tm_blog_box_columns = get_post_meta(get_the_ID(), 'tm_blog_box_columns', true);
	if(empty($tm_blog_box_columns))
		$tm_blog_box_columns = '';
	if($tm_blog_box_columns == 'two'):
		$columns_number = '2';
	elseif($tm_blog_box_columns == 'three'):
		$columns_number = '3';
	elseif($tm_blog_box_columns == 'four'):
		$columns_number = '4';
	endif;
	return $columns_number;
}
endif;
if ( ! function_exists( 'tm_blog_box_posts_per_page' ) ) :
function tm_blog_box_posts_per_page() {
	$tm_blog_box_posts_per_page = get_post_meta(get_the_ID(), 'tm_blog_box_posts_per_page', true);
	if(empty($tm_blog_box_posts_per_page))
		$tm_blog_box_posts_per_page = '';
	return $tm_blog_box_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_blog_list_posts_per_page' ) ) :
function tm_blog_list_posts_per_page() {
	$tm_blog_list_posts_per_page = get_post_meta(get_the_ID(), 'tm_blog_list_posts_per_page', true);
	if(empty($tm_blog_list_posts_per_page))
		$tm_blog_list_posts_per_page = '';
	return $tm_blog_list_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_blog_filter_columns_class' ) ) :
function tm_blog_filter_columns_class() {
	$columns_class = '';
	$tm_blog_filter_columns = get_post_meta(get_the_ID(), 'tm_blog_filter_columns', true);
	if(empty($tm_blog_filter_columns))
		$tm_blog_filter_columns = '';
	if($tm_blog_filter_columns == 'two'):
		$columns_class = 'two-col';
	elseif($tm_blog_filter_columns == 'three'):
		$columns_class = 'three-col';
	elseif($tm_blog_filter_columns == 'four'):
		$columns_class = 'four-col';
	endif;
	return $columns_class;
}
endif;
if ( ! function_exists( 'tm_blog_filter_columns_number' ) ) :
function tm_blog_filter_columns_number() {
	$columns_number = '';
	$tm_blog_filter_columns = get_post_meta(get_the_ID(), 'tm_blog_filter_columns', true);
	if(empty($tm_blog_filter_columns))
		$tm_blog_filter_columns = '';
	if($tm_blog_filter_columns == 'two'):
		$columns_number = '2';
	elseif($tm_blog_filter_columns == 'three'):
		$columns_number = '3';
	elseif($tm_blog_filter_columns == 'four'):
		$columns_number = '4';
	endif;
	return $columns_number;
}
endif;
if ( ! function_exists( 'tm_testimonial_box_posts_per_page' ) ) :
function tm_testimonial_box_posts_per_page() {
	$tm_testimonial_box_posts_per_page = get_post_meta(get_the_ID(), 'tm_testimonial_box_posts_per_page', true);
	if(empty($tm_testimonial_box_posts_per_page))
		$tm_testimonial_box_posts_per_page = '';
	return $tm_testimonial_box_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_testimonial_list_posts_per_page' ) ) :
function tm_testimonial_list_posts_per_page() {
	$tm_testimonial_list_posts_per_page = get_post_meta(get_the_ID(), 'tm_testimonial_list_posts_per_page', true);
	if(empty($tm_testimonial_list_posts_per_page))
		$tm_testimonial_list_posts_per_page = '';
	return $tm_testimonial_list_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_testimonial_box_columns_class' ) ) :
function tm_testimonial_box_columns_class() {
	$columns_class = '';
	$tm_testimonial_box_columns = get_post_meta(get_the_ID(), 'tm_testimonial_box_columns', true);
	if(empty($tm_testimonial_box_columns))
		$tm_testimonial_box_columns = '';
	if($tm_testimonial_box_columns == 'two'):
		$columns_class = 'two-col';
	elseif($tm_testimonial_box_columns == 'three'):
		$columns_class = 'three-col';
	elseif($tm_testimonial_box_columns == 'four'):
		$columns_class = 'four-col';
	endif;
	return $columns_class;
}
endif;
if ( ! function_exists( 'tm_testimonial_box_columns_number' ) ) :
function tm_testimonial_box_columns_number() {
	$columns_number = '';
	$tm_testimonial_box_columns = get_post_meta(get_the_ID(), 'tm_testimonial_box_columns', true);
	if(empty($tm_testimonial_box_columns))
		$tm_testimonial_box_columns = '';
	if($tm_testimonial_box_columns == 'two'):
		$columns_number = '2';
	elseif($tm_testimonial_box_columns == 'three'):
		$columns_number = '3';
	elseif($tm_testimonial_box_columns == 'four'):
		$columns_number = '4';
	endif;
	return $columns_number;
}
endif;
if ( ! function_exists( 'tm_staff_box_posts_per_page' ) ) :
function tm_staff_box_posts_per_page() {
	$tm_staff_box_posts_per_page = get_post_meta(get_the_ID(), 'tm_staff_box_posts_per_page', true);
	if(empty($tm_staff_box_posts_per_page))
		$tm_staff_box_posts_per_page = '';
	return $tm_staff_box_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_staff_list_posts_per_page' ) ) :
function tm_staff_list_posts_per_page() {
	$tm_staff_list_posts_per_page = get_post_meta(get_the_ID(), 'tm_staff_list_posts_per_page', true);
	if(empty($tm_staff_list_posts_per_page))
		$tm_staff_list_posts_per_page = '';
	return $tm_staff_list_posts_per_page;
}
endif;
if ( ! function_exists( 'tm_staff_box_columns_class' ) ) :
function tm_staff_box_columns_class() {
	$columns_class = '';
	$tm_staff_box_columns = get_post_meta(get_the_ID(), 'tm_staff_box_columns', true);
	if(empty($tm_staff_box_columns))
		$tm_staff_box_columns = '';
	if($tm_staff_box_columns == 'two'):
		$columns_class = 'two-col';
	elseif($tm_staff_box_columns == 'three'):
		$columns_class = 'three-col';
	elseif($tm_staff_box_columns == 'four'):
		$columns_class = 'four-col';
	endif;
	$columns_class;
	return $columns_class;
}
endif;
if ( ! function_exists( 'tm_staff_box_columns_number' ) ) :
function tm_staff_box_columns_number() {
	$columns_number = '';
	$tm_staff_box_columns = get_post_meta(get_the_ID(), 'tm_staff_box_columns', true);
	if(empty($tm_staff_box_columns))
		$tm_staff_box_columns = '';
	if($tm_staff_box_columns == 'two'):
		$columns_number = '2';
	elseif($tm_staff_box_columns == 'three'):
		$columns_number = '3';
	elseif($tm_staff_box_columns == 'four'):
		$columns_number = '4';
	endif;
	return $columns_number;
}
endif;
if ( ! function_exists( 'tm_content_position' ) ) :
function tm_content_position() {
	$tm_content_position = get_post_meta(get_the_ID(), 'tm_content_position', true);
	if(empty($tm_content_position))
		$tm_content_position = '';
	return $tm_content_position;
}
endif;
if ( ! function_exists( 'tm_is_related_posts' ) ) :
function tm_is_related_posts() {
	$tm_is_related_posts = get_post_meta(get_the_ID(), 'tm_posts_show_related_posts', true);
	if(empty($tm_is_related_posts))
		$tm_is_related_posts = '';
	return $tm_is_related_posts;
}
endif;
if ( ! function_exists( 'tm_is_author_info' ) ) :
function tm_is_author_info() {
	$tm_is_author_info = get_post_meta(get_the_ID(), 'tm_posts_show_author_info', true);
	if(empty($tm_is_author_info))
		$tm_is_author_info = '';
	return $tm_is_author_info;
}
endif;
if ( ! function_exists( 'tm_shortcode_paging_nav' ) ) :
function tm_shortcode_paging_nav() {
	$output ='';
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' =>  wp_kses( __( '<i class="fa fa-angle-left"></i>', 'bigshopper' ),tm_allowed_html()),
		'next_text' =>  wp_kses( __( '<i class="fa fa-angle-right"></i>', 'bigshopper' ),tm_allowed_html()),
	) );
	if ( $links ) :
	$output .= '<nav class="navigation paging-navigation" role="navigation">';
		$output .= '<div class="pagination loop-pagination">';
		$output .= $links;
		$output .= '</div>';
	$output .= '</nav>';
	endif; 
	}
	return $output;
}
endif;


// Adds custom image height X width for small thumbnails
add_image_size( 'tm-blog-posts-list', 1400, 550, true );
add_image_size( 'tm-small-thumb', 50, 50, true );
//Create HTML list of nav menu items and allow HTML tags.
class Description_Walker extends Walker_Nav_Menu { 
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = empty ( $item->classes ) ? array () : (array) $item->classes;	 
		$class_names = join(' ', apply_filters(	'nav_menu_css_class', array_filter( $classes ), $item ) );	 
		! empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
		// Build default menu items
		$output .= "<li id='menu-item-$item->ID' $class_names>";
		$attributes = '';	 
		! empty( $item->attr_title )
		and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		! empty( $item->target )
		and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
		! empty( $item->xfn )
		and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
		! empty( $item->url )
		and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		// Build the description (you may need to change the depth to 0, 1, or 2)
		$description = ( ! empty ( $item->description ) and 1 == $depth ) ? '<span class="nav_desc">'. $item->description . '</span>' : '';		 
		$title = apply_filters( 'the_title', $item->title, $item->ID );		 
		$item_output = $args->before . "<a $attributes>" . $args->link_before . $title . '</a> ' . $args->link_after . $description . $args->after;
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id  );
	}
} 
// Allow HTML descriptions in WordPress Menu
remove_filter( 'nav_menu_description', 'strip_tags' );
if ( ! function_exists( 'tm_shop_body_classes' ) ) :
function tm_shop_body_classes( $classes ) {
		if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'left'){
			$classes[] = 'shop-left-sidebar '; 
			}elseif(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'right'){
			$classes[] = 'shop-right-sidebar '; 
			}elseif(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'full'){
			$classes[] = 'shop-full-width ';	
			}else{
			$classes[] = 'shop-left-sidebar' ;
}
return $classes;
}
endif;

add_filter( 'body_class', 'tm_shop_body_classes' );
function tm_is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) ||  (is_home()) ||  (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}
/* Related Product settings */
function tm_related_products_args( $args ) {
  	$no = get_option("tm_related_items");	
	$args['posts_per_page'] = $no; 
	$args['columns'] = get_option('tm_shop_items_per_row');
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'tm_related_products_args' );

/* Upsell Product settings */
function tm_output_upsells() {
		$no1 = get_option("tm_upsells_items");	
	    woocommerce_upsell_display( $no1, get_option('tm_shop_items_per_row')); 
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'tm_output_upsells', 15 );

/* crosssell Product settings */
function tm_output_crosssell() {
		$no1 = get_option("tm_crosssell_items");	
	   woocommerce_cross_sell_display( $no1, get_option('tm_shop_items_per_row'));
}
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'tm_output_crosssell', 10 );

/* To display Wishlist in product block */
if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
if( ! function_exists( 'tm_add_to_wishlist_in_product' ) ){
    function tm_add_to_wishlist_in_product(){
        echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'tm_add_to_wishlist_in_product', 11 );
endif;
/* compare product block */
if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
if( ! function_exists( 'tm_add_to_compare_in_product' ) ){
    function tm_add_to_compare_in_product(){
        echo do_shortcode( "[yith_compare_button]" );
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'tm_add_to_compare_in_product', 11 );
endif;
/* Move the Star div */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 12 );


function tm_product_navigation()
{		
		global $post , $previous ,$next;
		$current_url = get_permalink( $post->ID );
		$next_text = '';
		$previous_text = '';		
		
		// Get the previous and next product links
		$previous_link = get_permalink(get_adjacent_post(false,'',false)); 
		$next_link = get_permalink(get_adjacent_post(false,'',true));
		
		// Create the two links provided the product exists
		if ( $next_link != $current_url ) {
				$next = "<a href='" . esc_url($next_link) . "'>" . $next_text . "</a>";
			}
			if ( $previous_link != $current_url ) {
				$previous = "<a href='" .esc_url($previous_link) . "'>" . $previous_text . "</a>";
		}
		
		// Create the two links provided the product exists
			if ( $next_link != $current_url ) {
				$next_text = get_adjacent_post(false,'',true)->post_title;
				$next = "<a href='" .esc_url( $next_link ). "'>" . $next_text . "</a>";
			} 
			if ( $previous_link != $current_url ) {
				$previous_text = get_adjacent_post(false,'',false)->post_title;
				$previous = "<a href='" . esc_url($previous_link) . "'>" . $previous_text . "</a>";
			}
			
		// Create HTML Output
		$output  = '<div class="tm_product_nav_buttons">'; 
		if ( $previous != '' )
			$output .= '<span class="previous"> ' . $previous . '</span>';
		if ( $next != '' )
			$output .= '<span class="next">' . $next .'</span>';
		$output .= '</div>';
		
		// Display the final output
		echo balanceTags($output);
}
add_action( 'woocommerce_single_product_summary', 'tm_product_navigation', 5 );
/*	This function is used to convert hex color into rgb or rgba */
function tm_hex_to_rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 		//Return default if no color provided
		if(empty($color))
          return $default; 
 		//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        } 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        } 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        } 
        //Return rgb(a) color string
        return $output;
}

// Display the additional product images
function tm_second_product_thumbnail() {
	global $product, $woocommerce,$id;
	$attachment_ids = $product->get_gallery_attachment_ids();
	$id =	get_post_thumbnail_id( $product->id );
	if(get_option( 'tm_secondaryimage' ) == "yes"){
		if ( count($attachment_ids) > 0 ) {
			$secondary_image_id = $attachment_ids['0'];		
			echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
		}
		else{				
			echo wp_get_attachment_image( $id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );		
		}
	}
	else{				
		echo wp_get_attachment_image( $id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );		
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'tm_second_product_thumbnail');

/* for escaping i.e wp_kses( __()); the html element update to WP 4.3.1 */
function tm_allowed_html() {
	 $tm_allowed_html = array(
	'span' => array(
	 'class' => array(),
	 'style' => array(),
	),
	'div' => array(
	 'class' => array(),
	 'style' => array(),
	),
	'a' => array(
	 'href' => array(),
	),
	'i' => array(
	 'class' => array(),
	),
	);
return  $tm_allowed_html;
}
/* Transfer the php data to custom js */
function tm_load_more(){
	// Register the script
	wp_enqueue_script( 'phpvariable', get_template_directory_uri() . '/js/megnor/megnorloadmore.js', array(), '', false);	
	// Localize the script with new data
	$translation_array = array(
		'tm_loadmore' => get_option( 'tm_loadmore' ),
		'tm_pagination' => get_option( 'tm_pagination' ),
		'tm_nomore' =>  get_option( 'tm_nomore' )
	);
	wp_localize_script( 'phpvariable', 'php_var', $translation_array );
	// Enqueued script with localized data.
	wp_enqueue_script( 'phpvariable' );
}
add_action( 'wp_enqueue_scripts', 'tm_load_more' );
/* Function to show cart header cart dropdown in all pages */
function tm_always_show_cart() {
    return false;
}
add_filter( 'woocommerce_widget_cart_is_hidden', 'tm_always_show_cart', 40, 0 );

 /*  topbar-contact  */
if ( ! function_exists( 'tm_get_topbar_contact' ) ) :
function tm_get_topbar_contact() {
	
	$tm_topbar_phone = get_option('tm_topbar_phone');
	$tm_topbar_phone_text = get_option('tm_topbar_phone_text');
	$output = '';
		if (!empty($tm_topbar_phone)) :
		$output .= '<div class="text-contact">'.$tm_topbar_phone_text.'&nbsp;:</div>&nbsp;<div class="contact-no">'.$tm_topbar_phone.'</div>';							
		endif;
	echo balanceTags($output);
}
endif;
/* advanced search */
if ( ! function_exists( 'tm_advanced_search_query' ) ) :
function tm_advanced_search_query($query) {
    if($query->is_search()) {
        	if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
					$query->set('tax_query', array(array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => array($_GET['product_cat']) )
				));
			}   
		}
        return $query;
   }
  endif;
add_action('pre_get_posts', 'tm_advanced_search_query', 1000);
/*  Out of Stock */
if ( ! function_exists( 'tm_out_of_stock' ) ) :
function tm_out_of_stock() {
 global $product;
 	if ( !$product->is_in_stock() ) {
        echo '<div class="soldout_wrapper"><span class="soldout">'.esc_html__('SOLD OUT','bigshopper').'</span></div>';
    }
}
endif;
add_action('woocommerce_before_shop_loop_item_title', 'tm_out_of_stock');

/* Show an archive description on taxonomy archives. */
if ( ! function_exists( 'woocommerce_brand_description' ) ) {
	function woocommerce_brand_description() {
		if ( is_tax( array( 'product_brand' ) ) ) { 
			$description = wc_format_content( term_description() );
			if ( $description ) {
				echo '<div class="term-description">' . $description . '</div>';
			}
		}
	}
}
add_action( 'woocommerce_archive_description', 'woocommerce_brand_description');

// Display brand taxonomies file
add_action( 'woocommerce_archive_description', 'woocommerce_brand_description');
if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  && in_array( 'TemplatemelaCustomPost/TemplatemelaCustomPost.php' , apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
  			get_template_part('templatemela/brand_taxonomies');
}

// Display brand attribute in product page

if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  && in_array( 'TemplatemelaCustomPost/TemplatemelaCustomPost.php' , apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
add_action( 'woocommerce_share', 'tm_brand' );
	function tm_brand() {
			global $product;
			$terms = wc_get_product_terms( $product->id, 'product_brand');
			$term_list = get_the_term_list($product->id, 'product_brand','',', ');
			if(!empty($term_list) ):?>
				<div class="brand">
					<?php  echo wc_attribute_label(  __('Brand','bigshopper') ).':'; ?>
						<span>	<?php foreach ($terms as $term) {}?> 
						<a href="<?php echo esc_url(get_term_link( $term )); ?>"><?php echo translate($term_list); ?></a>
					</span>	
				</div>
			<?php endif; 
		}	
}

//dequeue css from plugins
add_action('wp_print_styles', 'tm_dequeue_css_from_plugins', 100);
function tm_dequeue_css_from_plugins()  {
wp_dequeue_style('newsletter-subscription');
}	

/* Show an Counter in Single product page. */
if ( ! function_exists( 'tm_sale_counter' ) ) {
	function tm_sale_counter() {
		  global $post,$product , $today;
		 $ids = $product->ID;
		$today = date('Y-m-d');
		$sale_price_dates_from = ( $date = get_post_meta( $post->ID, '_sale_price_dates_from', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
		$sale_price_dates_to = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
			if ($today >= $sale_price_dates_from  && $today <= $sale_price_dates_to){
			 if($product->is_type( 'simple' ) && $sale_price_dates_to != "" )
			 {	echo '<div class="count-down"><div class="countbox hastime" data-time="'.$sale_price_dates_to.'"></div></div>';	}
			}
	}
}
add_action( 'woocommerce_single_product_summary', 'tm_sale_counter');
?>