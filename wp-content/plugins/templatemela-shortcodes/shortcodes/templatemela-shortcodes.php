<?php
/***************** accordion ****************/
function shortcode_accordion($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div class="accordion style'.$style.'">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_accordion', 'shortcode_accordion');
function shortcode_single_accordion($atts, $content = null)
{
	extract(shortcode_atts(array(
			'title' => 'Click here to hide/show Div'
		), $atts));
		$output = '';
		$output .= '<div class="single_accordion">';
		$output .= '<a class="tog" href="#"><div class="accordion-title"><span class="icon"></span>'.$title.'</div></a>';
		$output .= '<div class="tab_content">'.do_shortcode($content).'</div>';
		$output .=	'</div>';
		return $output;
	}
add_shortcode('accordion', 'shortcode_single_accordion');
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_accordion extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_accordion extends WPBakeryShortCode {
    }
}

/***************** Blog Posts ****************/
function shortcode_blog_posts_container($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'grid',
		'items_per_column' => 5,
		'number_of_posts' => 10,
		'category' => '',
		'width' => '245',
		'height' => '200',
		'linkurl' => '',
		'linktext' => '',
		'style' => '1',
	), $atts));
	
	$linktextvariable = "";
	
	if(!empty($linkurl) || !empty($linkurl)):
		$linktextvariable .= '<div class="blog-more-link"><a href='.$linkurl.'>'.$linktext.'</a></div>';
	endif;
	
	$i = 1;
	wp_reset_postdata();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'post_status' => 'publish',
		'category' => $category,
		'orderby' => 'date'		
	);		
	
	$output = '';
	$blog_array = new WP_Query( $args );	
	$count = $blog_array->post_count;
	$output = '';
	if ( $blog_array->have_posts() ):
	$output .= '<div id="blog-posts-products" class="blog-posts-content posts-content '.$type.'">';	
	if($type == "slider") { 
		if($count > $items_per_column)
			$output .= '<div id="'.$items_per_column.'_blog_carousel" class="slider blog-carousel">';
		else
			$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	} else {
		$output .= '<div id="blog_grid" class="blog-grid grid cols-'.$items_per_column.'">';
	}
	
	while ( $blog_array->have_posts() ) : $blog_array->the_post();
			
		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		$post_day = get_the_date('d');
		$post_month = get_the_date('F');
		$post_year = get_the_date('Y');
		$post_author = get_the_author();
		$args = array(
			   'status' => 'approved',
			   'number' => '5',
			   'post_id' => get_the_ID()
		    );
		 $comments = wp_count_comments(get_the_ID()); 				   
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $post_thumbnail_id );			
		else:
			$image = get_template_directory_uri()."/images/placeholders/placeholder.jpg";					
		endif;
		$src = tm_mr_image_resize($image, $width, $height, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = tm_mr_image_resize($src, $width, $height, true, 't', false);			
		endif;
		if($style == '1'):
				$output .= '<div class="item container '.$class.'  style-'.$style.'">';
					$output .= '<div class="container-inner">';
			
					$output .= '<div class="post-image">';
						$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
						$output .= '<div class="block_hover">';
						$output .= '<div class="links">';				
						$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';				
						$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
						$output .= '</div>';
						$output .= '</div>';															
					$output .= '</div>';
					
					$output .= '<div class="post-content-inner">';
					$shorttitle = substr(get_the_title('','',FALSE),0,50);
					$output .= '<div class="post-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$shorttitle.'</a></div>';
					$output .= '<div class="post-detail"><div class="post_author"><a href="'.get_permalink().'" >'.__("by") .'&nbsp'.$post_author.'</a></div><i class="fa fa-circle"></i>&nbsp;<div class="post-date"><a href="'.get_permalink().'" ><div class="day">'.$post_day.'&nbsp;</div><div class="month">'.$post_month.'</div></a></div>';								
					$output .= '</div>';
					$output .= '</div>';
			$output .= '</div></div>';
		endif;
		if($style == '2'):	
					$output .= '<div class="item container '.$class.'  style-'.$style.'">';
					$output .= '<div class="container-inner">';
			
					$output .= '<div class="post-image">';
						$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
						$output .= '<div class="block_hover">';
						$output .= '<div class="links">';				
						$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';				
						$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
						$output .= '</div>';
						$output .= '</div>';															
					$output .= '</div>';
					
					$output .= '<div class="post-content-inner">';
					
					$output .= '<div class="post-detail"><div class="post-date"><a href="'.get_permalink().'" ><div class="month">'.$post_month.', </div> <div class="day">'.$post_day.', </div> <div class="year">'.$post_year.'</div></a></div>';
					$shorttitle = substr(get_the_title('','',FALSE),0,50);
					$output .= '<div class="post-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$shorttitle.'</a></div>';
					
					
					$output .= '<div class="post-description">'.tm_blog_post_excerpt(60).'</div>';
					$output .= '<div class="read-more"><a href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('read more...', 'bigshopper').'</a></div>';									
					$output .= '</div>';
					$output .= '</div>';
			$output .= '</div></div>';
		endif;
		$i++;
	endwhile;
	$output .= $linktextvariable;
	wp_reset_postdata();
	$output .=	'</div></div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'bigshopper').'</div>';
	endif;
	return $output;
}
add_shortcode('blog_posts', 'shortcode_blog_posts_container');

/*****************  Brand  ****************/
function shortcode_brand($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',
		'items_per_column' => 5,		
		'image_width' => 120,
		'image_height' => 120
	), $atts));
	
	$output = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$terms = array();
	$args = array(
		'paged' => $paged,
		'post_type' => 'product',
		'post_status' => 'publish',
		'taxonomy' => 'product_brand',
	);
	$terms = get_terms($args);
	query_posts($args);
if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  && in_array( 'TemplatemelaCustomPost/TemplatemelaCustomPost.php' , apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
$output .= '<div class="brand-container">';		
$output .= '<div id="'.$items_per_column.'_brand_carousel" class="brand-carousel brand-carousel tm-logo-content">';

$num_layout =  substr($items_per_column, 0, 1);	
$i = 1;
global $term;
$terms = get_terms('product_brand');
	$terms_slug = array();
	if (is_array($terms)) {
		foreach($terms as $term) {
	if($i % $items_per_column == 1)
			$class = " first-item";	
		elseif($i % $items_per_column == 0)
			$class = " last-item";
		else
			$class = "inner";
			$term_ids = get_term( $term, 'product_brand' );
	$output .= '<div class="item brand_main">';
				$output .= '<div class="product-block style-'.$style.'">';
					$output .= '<div class="single-brand">';							
						$thumbnail_id = get_woocommerce_term_meta( $term_ids->term_id, 'thumbnail_id', true );
						$image = wp_get_attachment_url( $thumbnail_id );
						if(!empty($image)) :
						  $output .= '<div class="entry-thumbnail">';	
							  $output .= '<a href="'.get_term_link( $term ).'" target="_Blank"><img src="'.tm_mr_image_resize($image, $image_width, $image_height, true, 'left', false).'" title="'.esc_attr($term->name).'" alt="'.esc_attr($term->name).'" /></a>';
						  $output .= '</div>';
						else:
						   $output .= '<i style="width:'.$image_width.';height:'.$image_height.';" class="fa fa-user"></i>';
						endif;			
							if($style == '2'):				
									$output .= '<div class="brand-content">';
									 if(!empty($term->name)) :
										 $output .= '<h3 class="entry-title">'.esc_attr($term->name).'</h3>';
									 endif;		
									$output .= '</div>';
							endif;					
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$i++;
		}
	}
$output .= '</div>';
$output .= '</div>';	  
}
	wp_reset_query();
	return $output;
}
add_shortcode('tm_brand', 'shortcode_brand');

/*************** Brand List ***************/
function shortcode_brand_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'column' => '',
		'number_of_posts' => '12',
		'image_width' => 120,
		'image_height' => 120
	), $atts));
	
	$output = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$terms = array();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'paged' => $paged,
		'post_type' => 'product',
		'post_status' => 'publish',
		'taxonomy' => 'product_brand',
	);
	$terms = get_terms($args);
	query_posts($args);
	if($column == 1){$column = 1;}
	else if($column == 2){$column = 2;}
	else if($column == 3){$column = 3;}
	else if($column == 4){$column = 4;}
	else if($column == 5){$column = 5;}
	else {$column = 4;}  
if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  && in_array( 'TemplatemelaCustomPost/TemplatemelaCustomPost.php' , apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
$output = '<div class="brands list">';
$output .= '<ul class="columns-'.$column.' da-thumbs">';

$num_layout =  substr($column, 0, 1);	
$i = 1;
	if($i % $num_layout == 0)
		$li_class = "last";
	else if($i % $num_layout == 1)
		$li_class = "first";
	else
		$li_class = "inner";
	$terms = get_terms('product_brand');
	if (is_array($terms)) {
		foreach($terms as $term) {	
			$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
	$output .= '<li class="'.$li_class.'">';
	$output .= '<div class="main brand-inner">';
	$output .= '<a href="'.get_term_link( $term ).'" target="_Blank">';
		if(!empty($image)) :
					  $output .= '<div class="image-block">';	
						  $output .= '<img src="'.tm_mr_image_resize($image, $image_width, $image_height, true, 'left', false).'" title="'.esc_attr($term->name).'" alt="'.esc_attr($term->name).'" />';
					  $output .= '</div>';
					else:
					   $output .= '<i class="fa fa-user"></i>';
		endif;		
	if(!empty($term->name)) :
	$output .= '<h3 class="title">'.esc_attr($term->name).'&nbsp;<mark class="count">(' . $term->count . ')</mark></h3>';
		endif;	
	$output .= '</a>';
	$output .= '</div>';
	$output .= '</li>';
	$i++;
}
}
$output .= '</ul>';
$output .= '</div>';	
}  
wp_reset_query();
return $output;
}
add_shortcode('tm_brand_list', 'shortcode_brand_list');

/***************** Button *****************/
function shortcode_button($atts, $content = null) {
   extract(shortcode_atts(array(
   	'type' => '',
	'background_color' => '',
	'link_url' => '',
	'icon' => '',
	'icon_align' => 'left',
	'target' => ''
	), $atts)); 
	wp_reset_query();
	$style_css = '';
	if(!empty($background_color)):
	$style_css .= 'background-color: #'.$background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	$output = '';
	$output .= '<div class="button_content_inner">';
	if(!empty($icon)){
		if($icon_align == 'left')
			$output .= '<a href="'.$link_url.'" target="'.$target.'" class="button button_'.$type.' '.$icon_align.'" style="'.$style_css.'"><i class="fa '.$icon.'"></i>'.do_shortcode($content).'</a>';
		if($icon_align == 'right')
			$output .= '<a href="'.$link_url.'" target="'.$target.'" class="button button_'.$type.' '.$icon_align.'" style="'.$style_css.'">'.do_shortcode($content).'<i class="fa '.$icon.'"></i></a>';
	}else{
		$output .= '<a href="'.$link_url.'" target="'.$target.'" class="button button_'.$type.'" style="'.$style_css.'">'.do_shortcode($content).'</a>';
	}	
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_button', 'shortcode_button');

/***** Product Category Tabs List******/
function shortcode_category_tabs($atts, $content = null){
	extract(shortcode_atts(array(
		'tab1_text' => '',
		'tab2_text' => '',
		'tab3_text' => '',
		'tab4_text' => '',
	), $atts));
	
	$output = '';
	
	$output .= '<div id="horizontalTab">';
		$output .= '<ul class="resp-tabs-list">';
			if(!empty($tab1_text)):
				$output .= '<li ><div class="tab-title">'.$tab1_text.'</div></li>';
			endif;
			if(!empty($tab2_text)):
				$output .= '<li ><div class="tab-title">'.$tab2_text.'</div></li>';
			endif;
			if(!empty($tab3_text)):
				$output .= '<li ><div class="tab-title">'.$tab3_text.'</div></li>';
			endif;
	
		$output .= '</ul>';
		$output .= '<div class="resp-tabs-container">';
		$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('tm_category_tabs', 'shortcode_category_tabs');
function shortcode_woo_category_slider($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'category_ids' => '',
		'items_per_column' => '4',
		'items_per_page' => '20',
		'type' => 'slider'
	), $atts));	
	
	$category_ids_array = explode(",",$category_ids);
	
	$output = '';
	if (class_exists( 'WooCommerce' )) {
	$output .= '<div id="categorytab">';
		$category_ids = '';
		$term_category_id = '';
		$term_category_name = '';
		$term_categroy_slug = '';
		$term_thumbnai_id = '';
		$term_image = '';			
		$output .= '<ul class="resp-tabs-list">';
			foreach($category_ids_array as $key){
				$category_ids = get_term( $key, 'product_cat' );
				if($category_ids){
					$term_category_id = $category_ids->term_id;
					$term_category_name = $category_ids->name;
					$term_category_slug = $category_ids->slug;
					$term_thumbnail_id =  get_woocommerce_term_meta( $term_category_id , 'thumbnail_id', true );		
					$term_image = wp_get_attachment_url( $term_thumbnail_id );  // get the image URL
					$output .= '<li><div class="tab-title">'.$term_category_name.'</div></li>';
				}
			}
		$output .= '</ul>';
		$output .= '<div class="resp-tabs-container '.$type.'">';
			foreach($category_ids_array as $key){

				    $term_array = get_term( $key, 'product_cat' );
				   	$term_category_id = isset($term_array->term_id) ? $term_array->term_id : '';
					$term_category_slug = isset($term_array->slug) ? $term_array->slug : '';
					$output .= do_shortcode('[woo_products type="'.$type.'" items_per_column="'.$items_per_column.'"][product_category  per_page="'.$items_per_page.'" category="'.$term_category_slug.'"][/woo_products]');
			}
		$output .= '</div>';
	$output .= '</div>';
	}
	return $output;
}
add_shortcode('woo_categories', 'shortcode_woo_category_slider');
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_category_tabs extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_woo_categories extends WPBakeryShortCode {
    }
}
/************** Contact Address **************/
function shortcode_address($atts, $content = null){
	extract(shortcode_atts(array(
			'title' => '',	
			'description' => '',
			'address_label' => 'Address:',
			'phone_label' => 'Phone numbers:',
			'phone' => '',
			'email_label' => 'Email:',
			'email' => '',
			'email_link' => '',
			'other_label' => 'We are open:',
			'other' => '',
									 
		), $atts));
		$output = '';
		$output .= '<div class="address-container hb-animate-element right-to-left">';
		if(!empty($title))
			$output .= '<h1 class="address-title simple-title"><span>'.$title.'</span></h1>';
		if(!empty($description))
			$output .= '<div class="address-description description">'.$description.'</div>';
			

		$output .= '<div class="address-text first"><div class="address-text-inner"><div class="icon"><i class="fa fa-map-marker"></i></div> <div class="content"><div class="address-label">'.$address_label.'</div>'.do_shortcode($content).'</div> </div></div>';
		
		if(!empty($phone)):
			$output .= '<div class="address-text second"><div class="address-text-inner"><div class="icon"><i class="fa fa-phone"></i></div> <div class="content"><div class="address-label">'.$phone_label.'</div>'.$phone.'</div> </div></div>';
		endif;
		
		if(!empty($email)):
			if(!empty($email_link)):
				$output .= '<div class="address-text third"><div class="address-text-inner"><div class="icon"><i class="fa fa-envelope "></i></div> <div class="content"><div class="address-label">'.$email_label.'</div><a href="'.$email_link.'">'.$email.'</a><p>'.$other.'</p></div></div></div>';	
			else:
				$output .= '<div class="address-text><div class="address-text-inner"><div class="icon"><i class="fa fa-envelope "></i></div>  <div class="content"><div class="address-label">'.$email_label.'</div>'.$email.'></div></div></div>';	
			endif;
		endif;	
		if(!empty($other)):
			/*$output .= '<div class="address-label">'.$other_label.'</div>';*/
			// $output .= '<div class="address-text"><i class="fa fa-info"></i>'.$other.'</div>';
		endif;
		$output .= '</div>';
		return $output;
	
}
add_shortcode('tm_address', 'shortcode_address');

/***************  Counter  *****************/
function shortcode_counter($atts, $content = null){
	extract(shortcode_atts(array(
			'id' => '',
			'start' => 0,
			'end' => '154',
			'decimal' => '0',
			'duration' => '20',
			'title' => '',
			'separator'=> ','
		), $atts));
		$output = '';
		$i=
		$output .="<div class='counter'>";
		$output .="<div class='counter_number'><h3 class='jumbo' id='".$id."'>0</h3></div>";
		$output .="<div class='counter_title'>".$title."</div>";
		$output .="</div>";
		
		$output .= "<script type='text/javascript'>\n";
		$output .= "\t var options = {\n";
		$output .= "\t useEasing : true,\n";
		$output .= "\t useGrouping : true,\n";
		$output .= "\t separator : ',', \n";
		$output .= "\t decimal : '.', \n";
		$output .= "\t }\n";
		$output .= "\t  jQuery.noConflict(); jQuery(document).ready(function() { \n";
		$output .= 	"\t var demo = new CountUp(".$id.", ".$start.", ".$end.", ".$decimal.", ".$duration.", options); \n";
		$output .="\t demo.start(); \n";
		$output .="\t }); \n";
		$output .= "</script>\n\n";

	return $output;
}
add_shortcode('tm_counter', 'shortcode_counter');

/*****************  Faqs  *****************/
function shortcode_faqs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',
		'category' => ''
	), $atts));
	$output = '';
	$output .= '<div class="faqs-container">';
    $output .= '<div class="faqs-content style-'.$style.'">';
	
	if(!empty($category)):	
		$term_id = $category;	
		$args = array(
		'post_type' => 'faq',
		'post_status' => 'publish',
		'posts_per_page' => '50',
		'tax_query' => array(
			array(
				'taxonomy' => 'faq_categories',
				'field' => 'id',
				'terms' => $term_id
			)
		)
		);
		query_posts($args);	
		$term = get_term( $term_id, 'faq_categories' );		
		if(!empty($term)):	
		 	$output .= '<h3 class="small-title">'.$term->name.'</h3>';
		endif;	
		 $output .= '<div class="faqs-category-container">';
		 while (have_posts()) : the_post(); 
			if($style == '1'):
			$output .= '<div class="single-faq toogle_div">';
			$output .= '<a class="tog" href="#"><span class="faq_title">'. get_the_title() .' </span></a>';
			$output .= '<div class="tab_content">'.get_the_content().'</div>';
			$output .= '</div>';
			endif;
			if($style == '2'):
			$output .= '<div class="single-faq">';
			$output .= '<div class="title">'.get_the_title().'</div>';
			$output .= '<div class="content">'.get_the_content().'</div>';
			$output .= '</div>';
			endif;
		endwhile; 
		$output .= '</div>';
	else:
		$categories = get_categories('hide_empty=0&orderby=name&taxonomy=faq_categories');		
		foreach ($categories as $category_item ) {
			$args = array(
				'post_type' => 'faq',
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'faq_categories',
						'field' => 'id',
						'terms' => $category_item->term_id
					)
				)
			);
		 query_posts($args);	
		 $output .= '<h3 class="small-title">'.$category_item->name.'</h3>';
		 $output .= '<div class="faqs-category-container">';
		 while (have_posts()) : the_post(); 
		 	if($style == '1'):
			$output .= '<div class="single-faq toogle_div">';
			$output .= '<a class="tog" href="#"><span class="faq_title">'. get_the_title() .' </span></a>';
			 $output .= '<div class="tab_content">'.get_the_content().'</div>';
			 $output .= '</div>';
			 endif;
			 if($style == '2'):
			 $output .= '<div class="single-faq">';
			$output .= '<div class="title">'.get_the_title().'</div>';
			 $output .= '<div class="content">'.get_the_content().'</div>';
			 $output .= '</div>';
			 endif;
		endwhile; 
		$output .= '</div>';
		}
       	endif; 
		$output .= '</div>';
		$output .= '</div>';
		wp_reset_query();
		return $output;
}
add_shortcode('faqs', 'shortcode_faqs');

/****************  Features Content  ************/
function shortcode_about($atts, $content = null){
	extract(shortcode_atts(array(					
			'title' => '',
			'link_text' => 'read more',
			'link_url' => '#',	
			'image' => '',
			'image_align' => 'right',	
			'title_margin' => '0 0 24px',
			'target' => '',					 
		), $atts));
		
		$output = '';
		$image=tm_vc_image($image);
		$output .='<div class="tm_about">';
		$output .='<div class="tm_about_inner image-'.$image_align.'">';
			if(!empty($image)):		
				$output .='<div class="about_image">';
				$output .='<img src="'.$image.'" alt="" />';
				$output .='</div>';
			endif;
			if(!empty($image))
				$output .='<div class="about_content">';
			else
				$output .='<div class="about_content">';
				$output .='<h3 class="title" style="margin:'.$title_margin.'">'.$title.'</h3>';
				$output .='<div class="description">'.do_shortcode($content).'</div>';
				$output .='<div class="readmore"><a href="'.$link_url.'" title="'.$link_text.'" target="'.$target.'">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';
			$output .='</div>';
		$output .='</div></div>';
		return $output;
	}
add_shortcode('tm_about', 'shortcode_about');

/********************* Hot products Grid/slider ***************/ 
function shortcode_hot_products($atts, $content = null, $code)
{
	extract(shortcode_atts(array(
		'height' => '272',
		'width' => '196',
		'items_per_column' => 5,
		'product' => 'shop',
		'classname' => '',
		'type' => 'grid'		
	), $atts));
$output = '';
global $post;
$params = array('posts_per_page' => -1, 'post_type' => array('product', 'product_variation'));
$wc_query = new WP_Query($params);
if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
$output .= '<div class="woocommerce hot-porduct">';

if($type == "slider") 
	{ 
		$output .= '<div id="'.$items_per_column.'_woo_carousel" class="woo-carousel">';
	} else {
		$output .= '<div id="woo_grid" class="woo-grid">';
	}
$output .= '<div class="products columns-'.$items_per_column.'">';
      if ($wc_query->have_posts()) :
          while ($wc_query->have_posts()) :
                $wc_query->the_post(); 
    $today = date('Y-m-d');
	$sale_price_dates_from = ( $date = get_post_meta( $post->ID, '_sale_price_dates_from', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';	
 	$sale_price_dates_to    = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
	if ($today >= $sale_price_dates_from  && $today <= $sale_price_dates_to){
	if ($sale_price_dates_to != "")
	{	
		global $product;
		$attachment_ids = $product->get_gallery_attachment_ids();
$output .= '<div class="product">';
	 $output .= '<div class="container-inner">';
		$output .= '<div class="product-block-inner">';	
			$output .= '<div class="image-block">';	
						 if($product->is_on_sale() ) :
		   						$output.='<span class="onsale">'. __( 'Sale', 'woocommerce' ).'</span>';
		   				endif;	
							  if ( has_post_thumbnail() ) {
		  
					$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
					$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
					$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title'	=> get_the_title( get_post_thumbnail_id() )
					) ); 
					$output .= '<img alt="'.get_the_title().'" src="'.$image_link.'" height="'.$height.'"  width="'.$width.'"/>';
				   }  	
			$output .= '</div>';
								
			 $output .='<div class="product-detail-wrapper">';	
					 $output .='<h3 class="product-name">';		
							$output .='<a href="'.get_permalink().'">'.$product->get_title().'</a>';
					$output .='</h3>';
					$output .='<div class="product-price price">'.$product->get_price_html().'</div>';	
					$output .= $product->get_rating_html();
					$output .='<div class="count-down">';	
								$output .='<div class="countbox hastime" data-time="'.$sale_price_dates_to.'"></div>';	
					 $output .= '</div>';	
						 				 
	if ( ! $product->is_in_stock() ) : 
    	$output .= '<a href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="button">'.apply_filters( 'out_of_stock_add_to_cart_text', __( 'Read More', 'woocommerce' ) ).'</a>';
 	
	endif;	
	 $output .='</div>';
		$output .= '</div>';
		  $output .= '</div>';
	  $output .='</div>';
	} 
}
      endwhile; 
      wp_reset_postdata();
 endif;
$output .='</div>';
$output .= '</div>';
$output .= '</div>';
}
return $output;

}
add_shortcode('tm_hot_products', 'shortcode_hot_products');

/***************** List Style ****************/
function shortcode_tm_list($atts, $content = null){
	extract(shortcode_atts(array(				 
		), $atts));
		$output = '';
		$output .= '<ul class="list">';
		$output .= do_shortcode($content);
		$output .=	'</ul>';
		return $output;
	}
add_shortcode('tm_list', 'shortcode_tm_list');
function shortcode_list($atts, $content = null){
	extract(shortcode_atts(array(
			'icon' =>  'fa-circle-o',
			'color' => '000000',
			'target' => '',
			'link_url' => '',
		), $atts));
		$output = '';
		$output .= '<li><a href="'.$link_url.'" target="'.$target.'"><i style="color:'.$color.'" class="fa '.$icon.'"></i>'.do_shortcode($content).'</a></li>';
		return $output;
	}
add_shortcode('list_item', 'shortcode_list');
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_list extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_list_item extends WPBakeryShortCode {
    }
}

/***************** Static links ****************/
function shortcode_tm_links($atts, $content = null){
	extract(shortcode_atts(array(				 
		), $atts));
		$output = '';
		$output .= '<ul class="links">';
		$output .= do_shortcode($content);
		$output .=	'</ul>';
		return $output;
	}
add_shortcode('tm_links', 'shortcode_tm_links');
function shortcode_link($atts, $content = null){
	extract(shortcode_atts(array(
			'link_url' =>  '',
			'target' => '',								 
		), $atts));
		$output = '';
		if(!empty($link_url))
		$output .= '<li><a href="'.$link_url.'" target="'.$target.'">'.do_shortcode($content).'</a></li>';
		else
		$output .= '<li>'.do_shortcode($content).'</li>';
		return $output;
	}
add_shortcode('link', 'shortcode_link');
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_links extends WPBakeryShortCodesContainer {
    }
}

/************* Static Text Newsletter *************/
function shortcode_tm_newsletter($atts, $content = null){
	extract(shortcode_atts(array(	
	'title' => 'signup and get a voucher worth $250',
	'text'  => '*Voucher is velid only on new Registration',
	), $atts));
	
	$output = '';
	$output .= '<div class="tm-newsletter-container">';
	$output .= '<div class="tm-newsletter-inner">';
	$output .= '<div class="tm-newsletter-title">'.$title.'</div>';
	$output .= '<div class="tm-newsletter-text">'.$text.'</div>';
	$output .= '</div>';
	$output .= '<div class="tm-newsletter-form">'.do_shortcode($content).'</div>';
	$output .= '</div>';	
	return $output;
}
add_shortcode('tm_newsletter', 'shortcode_tm_newsletter');

/***************** Portfolio Filter ****************/
function shortcode_portfolio_filter_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'items_per_column' => 4,
		'align' => ''
		
	), $atts));
	if($items_per_column == '1'):
		$width = 1400;
		$height =600; 
		$desc_limit = 350;
	elseif($items_per_column == '2'):
		$width = 700;
		$height = 550; 
		$desc_limit = 300;
	elseif($items_per_column == '3'):
		$width = 550;
		$height = 550; 
		$desc_limit = 250;
	elseif($items_per_column == '4'):
		$width = 500;
		$height = 500; 
		$desc_limit = 200;
	elseif($items_per_column == '5'):
		$width = 450;
		$height = 450; 
		$desc_limit = 100;
	elseif($items_per_column == '6'):
		$width = 400;
		$height = 400; 
		$desc_limit = 50;
	else:
		$width = 600;
		$height = 600;
		$desc_limit = 80; 
	endif;								
	$categories = get_categories('hide_empty=0&orderby=name&taxonomy=portfolio_categories');	
	$output = '';
	$output .= '<div class="clearfix portfolio-filter-container filter-container">';
	$output .= '<section id="portfolio_filter_options" class="options category-container">';
	$output .= '<ul id="filters" class="option-set"  data-option-key="filter">';
	$output .= '<li><a href="#show-all" data-option-value="*" class="selected">Show All</a></li>';
	foreach ($categories as $category_item ) {
		$output .= '<li><a href="#'.$category_item->slug.'" data-option-value=".'.$category_item->slug.'">'.$category_item->cat_name.'</a></li>';
	}
	$output .= '</ul></section>'; 
	$output .= '<div class="portfolio-filter-outer portfolios">';					 
	$output .= '<div id="portfolio_filter" class="portfolio-container portfolio-filter clearfix da-thumbs portfolio-cols-'.$items_per_column.'">';
	foreach ($categories as $category_item ):
	$paged = ( isset( $my_query_array['paged'] ) && !empty( $my_query_array['paged'] ) ) ? $my_query_array['paged'] : 1;
    $args = array(
      'post_type' => 'portfolio',
      'post_status' => 'publish',
	  'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'portfolio_categories',
          'field' => 'id',
          'terms' => $category_item->term_id,
          'paged' => $paged
        )
      )
    );
    query_posts($args);  
		 while (have_posts()) : the_post();
		$image = tm_get_first_post_images(get_the_ID());
		$src = tm_mr_image_resize($image, $width, $height, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = tm_mr_image_resize($src, $width, $height, true, $align, false);
		endif;
			$output .= '<div class="'.$category_item->slug.' main item single-portfolio">';
				$output .= '<div class="image image-block">';
					$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
					$output .= '<div class="block_hover"><div class="block_hover_inner">';
						$output .= '<h3 class="entry-title">'.get_the_title().'</h3>';
						$output .= '<div class="links">';
							$output .= '<a href="'.$image.'" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
							$output .= '<a href="'.get_permalink().'" class="icon"><i class="fa fa-link"></i></a>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div></div>';		
			$output .= '</div>';
		endwhile; 
	endforeach;
	wp_reset_query();
	$output .= '</div></div></div>'; 
	return $output;
}
add_shortcode('tm_portfolio_filter', 'shortcode_portfolio_filter_container');

/***************** Portfolio Slider ****************/
function shortcode_portfolio_slider_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'category' => '',
		'items_per_column' => 3,
		'number_of_posts' => 10,
		'layout' => 'dark'
	), $atts));
	
	if(!empty($category)):
		$term_id = $category;	
		$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => $number_of_posts,
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_categories',
				'field' => 'id',
				'terms' => $term_id
			)
		)
		);		
	else:
		$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => "'".$number_of_posts."'"
		);		
	endif;			
		$array_posts = query_posts($args);
		$count = count($array_posts);
		$output = '';
		if($count > 0):
		 $output .= '<div class="portfolio-container">';
			$output .= '<div id="'.$items_per_column.'_portfolio_carousel" class="portfolio-carousel  cols-'.$items_per_column.'">';
			$i = 1;
			while (have_posts()) : the_post();
				if($i % $items_per_column == 1 )
					$class = "first";
				elseif($i % $items_per_column == 0 )
					$class = "last";
				else
					$class = "";
				if($items_per_column == '1'):
					$width = 1400;
					$height = 600; 
				elseif($items_per_column == '2'):
					$width = 700;
					$height = 550; 
				elseif($items_per_column == '3'):
					$width = 550;
					$height = 550; 
				elseif($items_per_column == '4'):
					$width = 500;
					$height = 500; 
				elseif($items_per_column == '5'):
					$width = 450;
					$height = 450; 
				elseif($items_per_column == '6'):
					$width = 400;
					$height = 400; 
				else:
					$width = 600;
					$height = 600; 
				endif;
			
				$image = tm_get_first_post_images(get_the_ID());
				$image_src = tm_mr_image_resize($image, $width, $height, true, 't', false);
				if(empty($image_src))
					$image_src = get_template_directory_uri()."/images/megnor/placeholder.png";
				$output .= '<div class="item portfolio-main">';
				$output .= '<div class="product-block single-portfolio '.$class.' '.$layout.'">';
					$output .= '<div class="portfolio-image">';
							$output .= '<img src="'.$image_src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
							$output .= '<div class="block_hover">';
								$output .= '<div class="links">';
								$output .= '<a href="'.$image.'" title="Click to view Full Image" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
								$output .= '<a href="'.get_permalink().'" title="'.esc_html__('Click to view read more', 'bigshopper').'" class="icon"><i class="fa fa-link"></i></a>';							
								$output .= '</div>';
							$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="portfolio-title"><a href="'.get_permalink().'">'.get_the_title().'</div></a>';
					$output .= '<div class="portfolio-description">'.tm_portfolio_excerpt(60).'</div>';	
					$output .= '<div class="read-more"><a href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('read more...', 'bigshopper').'</a></div>';				
				$output .= '</div>';
				$output .= '</div>';
				$i++;
			endwhile;
		$output .= '</div>';
		wp_reset_query();
	$output .= '</div>';
	else:
	$output .= '<div class="no-result">'.esc_html__(''.esc_html__('No results found...', 'bigshopper').'', 'bigshopper').'</div>';
	endif;
	return $output;
}
add_shortcode('tm_portfolio_slider', 'shortcode_portfolio_slider_container');

/***************** Portfolio Grid  ****************/
function shortcode_portfolio($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'column' => 4,
		'cat' => '',
		'max' => '12'
	), $atts));
	
	$output = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$terms = array();
		if ($cat != '') {
		$cat = preg_replace('/\s*,\s*/', ',', $cat);
			foreach(explode(',', $cat) as $term_name) {
				$terms[] = get_term_by('name', $term_name, 'portfolio_categories');
			}		
			foreach($terms as $term) {	
				$term_ids[] = $term->term_id;
			}		
			$args = array(
				'posts_per_page' => $max,
				'paged' => $paged,
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_categories',
						'field' => 'id',
						'terms' => $term_ids
					)
				)
			);			
		} else {
			$args = array(
				'posts_per_page' => $max,
				'paged' => $paged,
				'post_type' => 'portfolio',
				'post_status' => 'publish'
			);
		}
		query_posts($args);
		if($column == 1){
			 $width = 1400;
			$excerpt_length = 180;
      		$column = 1;
   		}else if($column == 2){
     		$width = 700;
			$excerpt_length = 180;
      		$column = 2;
    	}else if($column == 3){
      		$width = 550;
			$excerpt_length = 120;
      		$column = 3;
    	}else if($column == 4){
     		$width = 500;
			$excerpt_length =80;
      		$column = 4;
    	}else {
      		$width = 500;
      		$column = 4;
			$excerpt_length =100;
    	}  
 
	$output = '<div class="portfolios">';
	$output .= '<ul class="portfolio_'.$column.'column da-thumbs">';
	$num_layout =  substr($column, 0, 1);	
	$i = 1;
	while(have_posts()) {
		the_post();
		$terms = get_the_terms(get_the_ID(), 'portfolio_categories');
		if ( strlen( $img = get_the_post_thumbnail( get_the_ID()) ) ): 
		$image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );								
		else:
		$image = tm_get_first_post_images(get_the_ID());
		endif;
		$src = tm_mr_image_resize($image, $width, $width, true, 'left', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$image = $src;
			$src = tm_mr_image_resize($src, $width, $width, true, 'left', false);			
		endif;
		 ?>
<?php $terms_slug = array();
		if (is_array($terms)) {
			foreach($terms as $term) {
				$terms_slug[] = $term->slug;
			}
		}
		if($i % $num_layout == 0)
			$li_class = "last";
		else if($i % $num_layout == 1)
			$li_class = "first";
		else
			$li_class = "inner";
		$output .= '<li class="'.$li_class.'">';
		$more = get_post_meta(get_the_ID(), '_more', true);
		$output .= '<div class="main"><div class="image-block">';
		if(get_option('portfolio','display_image') || $column == 1):			
			$output .= '<a href= "'.$image.'" class="mustang-gallery">';
			$output .= '<img class="image1" src="'.$src.'"/ >';
			$output .= '</a>';
		endif;
		$output .= '<div class="block_hover">';
	$output .= '<div class="links">';
	$output .= '<a href="'.$image.'" title="Click to view Full Image" class="icon mustang-gallery"><i class="fa fa-plus"></i></a>';
	$output .= '<a href="'.get_permalink().'"  title="'.esc_html__('Click to view read more', 'bigshopper').'" class="icon"><i class="fa fa-link"></i></a>';							
$output .= '</div></div>';
		$output .= '</div>';
		$output .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
		$output .=  tm_portfolio_excerpt($excerpt_length);
		$output .= '</li>';
		$i++;
	}
	$output .= '</ul>';
	$output .= tm_shortcode_paging_nav();  
	$output .= '</div>';	  
	wp_reset_query();
	return $output;
}
add_shortcode('tm_portfolio', 'shortcode_portfolio');

/***************** Pricing Table ****************/
function shortcode_pricingtable($atts, $content = null) {
   extract(shortcode_atts(array(
      "heading" => '',
      "button_text" => '',
      "button_link" => '',
	  "price" => '',
	  "price_per" => '',
	  "selected" => 'no',
	  "target" => '',
   ), $atts));
   
	if($selected == 'yes') 
	{
	 $selected = 'selected';
	}
	$output = '';
	$output .='<div class="pricing_wrapper">';
	$output .='<div class="pricing_wrapper_inner '.$selected.'">';
		if($heading != '' && $price_per != '' && $price != '') { 
			$output .='<div class="pricing_heading">'.$heading.'</div>';
			$output .='<div class="pricing_top">';
			$output .='<div class="pricing_per">'.$price_per.'</div>';
			$output .='<div class="pricing_price">'.$price.'</div></div>';
		} 	
		else{
			$output .='<div class="nopricing_heading"></div>';
			$output .='<div class="nopricing_top"><div class="pricing_per"></div><div class="pricing_price"></div></div>';
		}
	
	
	$output .='<div class="pricing_bottom">';
	$output .='<ul>';
	$output .= do_shortcode($content);
	$output .='</ul>';
	$output .='<div class="pricing_button">';
	if($button_text != '') { 
		$output .='<a href="'.$button_link.'" target="'.$target.'" class="button" id="pricing-btn">'.$button_text .'</a>';
	} 
	$output .='</div></div>';
	$output .='</div></div>';
	return $output; 
}
add_shortcode("tm_pricingtable", "shortcode_pricingtable");
function shortcode_pricingtable_row($atts, $content = null){
	extract(shortcode_atts(array(	
	 	"symbol" => '',						 
		), $atts));
		$output = '';
		if(!empty($symbol))		
		$output .= '<li><i class="fa '.$symbol.'"></i>'.do_shortcode($content).'</li>';
		else
		$output .= '<li>'.do_shortcode($content).'</li>';
		return $output;
}
add_shortcode('price_row', 'shortcode_pricingtable_row');

/***************** Products ****************/
function shortcode_woo_products_container($atts, $content = null, $code) {
	global $logotype;
	extract(shortcode_atts(array(
		'type' => 'slider',
		'items_per_column' => 5,
		'product' => 'shop',
		'classname' => '',
		'no_more'  => 'No more Products to diaplay'	
	), $atts));
	$logotype = $type;	
	static  $cnt = 1;
	$output = '';	
		
	
	$output .= '<div id="woo-products" class="woo-content products_block '.$product.' '.$classname.'">';
	
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_woo_carousel" class="woo-carousel cols-'.$items_per_column.'">';
	} else {
		$output .= '<div id="woo_grid" class="woo-grid cols-'.$items_per_column.'">';
	}
	 $output .= do_shortcode($content).'</div>';
	if($type == "grid") {  
		$output .=	'<div class="tm-message"><i class="fa fa-frown-o"></i>'.$no_more.'</div>';
		$output .=	'<div class="loadgridlist-wrapper"><button class="woocount loadgridlist">'.esc_html__('View More', 'bigshopper').'</button></div>';		
	}
	
	$output .='</div>';
	$cnt++;
	return $output;
}
add_shortcode('woo_products', 'shortcode_woo_products_container');

/************** Products Tabs **************/
function shortcode_product_tabs($atts, $content = null)
{
	extract(shortcode_atts(array(
		'tab1_text' => '',
		'tab2_text' => '',
		'tab3_text' => '',
		'tab4_text' => '',
	), $atts));
	
	$output = '';
	
	$output .= '<div id="horizontalTab">';
		$output .= '<ul class="resp-tabs-list">';
			if(!empty($tab1_text)):
				$output .= '<li ><div class="tab-title">'.$tab1_text.'</div></li>';
			endif;
			if(!empty($tab2_text)):
				$output .= '<li ><div class="tab-title">'.$tab2_text.'</div></li>';
			endif;
			if(!empty($tab3_text)):
				$output .= '<li ><div class="tab-title">'.$tab3_text.'</div></li>';
			endif;
			if(!empty($tab4_text)):
				$output .= '<li ><div class="tab-title">'.$tab4_text.'</div></li>';
			endif;
		$output .= '</ul>';
		$output .= '<div class="resp-tabs-container">';
		$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('tm_product_tabs', 'shortcode_product_tabs');
function shortcode_product_tab($atts, $content = null){
	extract(shortcode_atts(array(							 
		), $atts));
		$output = '';
		$output .= do_shortcode($content);
		return $output;
	}
add_shortcode('tm_tab_home', 'shortcode_product_tab');

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_product_tabs extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_tm_tab_home extends WPBakeryShortCode {
    }
}

/***************** Services ****************/
function shortcode_services($atts, $content = null) {	
   extract(shortcode_atts(array(
	 "color" => '2196f3',
	 "icon_background_color" => '',
   	 "icon" => 'fa-arrows-alt',
     "title" => '',
     "link_text" => '',
	 "link_url" => '',
	 "target" => '',
	 "style" => '1'	
	 ), $atts));
	 
	$style_css = 'color:'.$color.';';
	if(!empty($icon_background_color)):
	$style_css .= 'background-color:'.$icon_background_color.';';
	$icon_class = '';
	else:
	$icon_class = ' no-background';
	endif;
	
	$output = '';		
	$output .= '<div class="service hb-animate-element bottom-to-top style-'.$style.'">';
	$output .= '<div class="service-content style-'.$style.'">';
	
	if($style == '1' || $style == '2'):	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';	
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';	
	endif;	
	
	if($style == '3'):		
		$output .= '<div class="service-top">';		
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';
		$output .= '</div>';
		$output .= '<div class="service-desc">';
	endif;
	
	if($style == '4'):
		if(!empty($title))
			$output .= '<div class="title service-text">'.$title.'</div>';	
		if(!empty($icon))
			$output .= '<div class="icon"><i class="service-icon fa '.$icon.$icon_class.'" style="'.$style_css.'"></i></div>';
		$output .= '<div class="service-desc">';
	endif;			
	$output .= '<div class="description other-font">'.do_shortcode($content).'</div>';
	
	if(!empty($link_text)):
		if(!empty($link_url)):
			$output .= '<div class="service-read-more other-font"><a href="'.$link_url.'" class="other-read-more" target="'.$target.'">'.$link_text.'<i class="fa fa-arrow-right"></i></a></div>';	
		else:
			$output .= '<div class="service-read-more other-font">'.$link_text.'></div>';	
		endif;
	endif;	
	
	$output .= '</div>';			
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("service", "shortcode_services");

/***************** Static Text ****************/
function shortcode_tm_statictext($atts, $content = null){
	extract(shortcode_atts(array(
		'text' => '',
		'style' => '',
		'color' => '',
		'align' => '',
		'width' => '',
		'weight' => '',		
		'margin' => ''
	), $atts));
	$variables='';
		if(!empty($color)):
			$variables .= 'margin:'.$color.'; ';			
		endif;
		if(!empty($align)):		
			$variables .= 'text-align:'.$align.'; ';
		endif;
		if(!empty($margin)):
			$variables .= 'margin:'.$margin.'; ';			
		endif;
		if(!empty($width)):		
			$variables .= 'text-align:'.$width.'; ';
		endif;
		if(!empty($weight)):
			$variables .= 'margin:'.$weight.'; ';			
		endif;
	
	$output = '';
	
	$output .= '<div class="custom-text-container" style="'.$variables.'">';
		$output .= '<div class="text" style="'.$variables.'">'.$text.'</div>';				
	$output .= '</div>';
	return $output;
}
add_shortcode('tm_statictext', 'shortcode_tm_statictext');

/******  Tabs ( Horizontal + vertical ) ******/
$maintab_div = '';
function tabs_group($atts, $content = null ) {
    global $maintab_div;
	 extract(shortcode_atts(array(  
        'tab_type' => 'horizontal', 
		'style'	=> '1'	
    ), $atts));  
	
	switch ($tab_type) {
        case 'vertical' :
            $element_class = 'vertical_tab';
            break;
        default :
            $element_class = 'horizontal_tab';
            break;
        break;
    }
	
	
    $maintab_div = '';
    $output = '<div id="'.$element_class.'" class="'.$element_class.' style'.$style.'"><div id="tab" class="tab"><ul class="tabs">';
    $output.= do_shortcode($content).'</ul>';
    $output.= '<div class="tab_groupcontent">'.$maintab_div.'</div></div></div>';
    return $output;  
}  
add_shortcode('tm_tabs', 'tabs_group');
function tab($atts, $content = null) {  
    global $maintab_div;
	
	static $oddeven_class=0;
	$oddeven_class++;
	$newclass = '';
	$output = ''; 
    if($oddeven_class % 2 == 0) { $newclass .= "even"; } else  { $newclass .= "odd"; }
	
	extract(shortcode_atts(array(  
        'title' => '', 
    ), $atts));  
	$dummy_title = "'. __( 'Tab', 'templatemela' ) .'";
	
	if($title != NULL) { 
			$output .= '<li class="'.$newclass.'"><a href="#">'.$title.'<span class="leftarrow"></span></a></li>';			
	} else {
			$output .= '<li class="'.$newclass.'"><a href="#">'.$dummy_title.'<span class="leftarrow"></span></a></li>';			
	}
    $maintab_div.= '<div class="tabs_tab">'.$content.'</div>';
    return $output;
}
add_shortcode('tm_tab', 'tab');
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_tabs extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_tm_tab extends WPBakeryShortCode {
    }
}

/***************   Title  ****************/
function shortcode_title($atts, $content = null) {
		
   extract(shortcode_atts(array(
   'size' => 'small',
   'type' => 'simple',
   'color' => '',
   'align' => '',
   'subtitle' =>''
   ), $atts));
      
	$output = '';	
	$output .= '<div class="shortcode-title '.$align.'">';
	$output .= '<div class="title-type '.$type.'-type">';	
	if(!empty($color))	
		$output .= '<h3 class="'.$size.'-title" style="color:#'.$color.';">'.do_shortcode($content).'</h3>';	
	else
		$output .= '<h3 class="'.$size.'-title">'.do_shortcode($content).'</h3>';
	if(!empty($subtitle))	
	$output .= '<h3 class="sub-title">'.$subtitle.'</h3>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("title", "shortcode_title");
function shortcode_our_features($atts, $content = null) {	
   extract(shortcode_atts(array(
   	 "icon" => '',
     "title" => '', 
     "read_more_text" => 'read more',
	 "read_more_link" => '',	
   ), $atts));
   
	$output = '';		
	$output .= '<div class="feature-container">';
    $output .= '<div class="feature-content">';
	if(!empty($icon))
	$output .= '<div class="icon"><i class="'.$icon.'"></i></div>';
	if(!empty($title))
	$output .= '<div class="title">'.$title.'</div>';
	$output .= '<div class="description">'.do_shortcode($content).'</div>';
	if(!empty($read_more_link))
	$output .= '<a href="'.$read_more_link.'" class="other-read-more">'.$read_more_text.'</a>';	
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode("feature", "shortcode_our_features");

/***************** Our Team ****************/
function shortcode_ourteam($atts, $content = null) {
   extract(shortcode_atts(array(
		'type' => 'slider',
		'items_per_column' => 4,
		'number_of_posts' => -1
	), $atts));
	
	global $post;	
	$i = 1;
	$output = '';
	wp_reset_postdata();
	$args = array(
		'posts_per_page' => $number_of_posts,
		'post_status' => 'publish',
		'post_type' => 'staff',
		'orderby' => 'date'
	);		
	
	$output = '';
	$team_array = new WP_Query( $args );
				
	if ( $team_array->have_posts() ):
	$output .= '<div id="team-posts-products" class="team-posts-content staff-page posts-content">';	
	if($type == "slider") { 
		$output .= '<div id="'.$items_per_column.'_team_carousel" class="team-carousel">';
	} else {
		$output .= '<div id="team_grid" class="team-grid grid cols-'.$items_per_column.'">';
	}
	
	while ( $team_array->have_posts() ) : $team_array->the_post();
		get_post_meta(get_the_ID(), 'staff_position', TRUE) ? $staff_position = get_post_meta(get_the_ID(), 'staff_position', TRUE) : $staff_position = '';
		get_post_meta(get_the_ID(), 'staff_link', TRUE) ? $staff_link = get_post_meta(get_the_ID(), 'staff_link', TRUE) : $staff_link = '';
		get_post_meta(get_the_ID(), 'staff_phone', TRUE) ? $staff_phone = get_post_meta(get_the_ID(), 'staff_phone', TRUE) : $staff_phone = '';
		get_post_meta(get_the_ID(), 'staff_email', TRUE) ? $staff_email = get_post_meta(get_the_ID(), 'staff_email', TRUE) : $staff_email = '';
		get_post_meta(get_the_ID(), 'staff_twitter', TRUE) ? $staff_twitter = get_post_meta(get_the_ID(), 'staff_twitter', TRUE) : $staff_twitter = '';
		get_post_meta(get_the_ID(), 'staff_facebook', TRUE) ? $staff_facebook = get_post_meta(get_the_ID(), 'staff_facebook', TRUE) : $staff_facebook = '';
		get_post_meta(get_the_ID(), 'staff_google_plus', TRUE) ? $staff_google_plus = get_post_meta(get_the_ID(), 'staff_google_plus', TRUE) : $staff_google_plus = '';
		get_post_meta(get_the_ID(), 'staff_linkedin', TRUE) ? $staff_linkedin = get_post_meta(get_the_ID(), 'staff_linkedin', TRUE) : $staff_linkedin = '';
		get_post_meta(get_the_ID(), 'staff_youtube', TRUE) ? $staff_youtube = get_post_meta(get_the_ID(), 'staff_youtube', TRUE) : $staff_youtube = '';
		get_post_meta(get_the_ID(), 'staff_rss', TRUE) ? $staff_rss = get_post_meta(get_the_ID(), 'staff_rss', TRUE) : $staff_rss = '';
		get_post_meta(get_the_ID(), 'staff_pinterest', TRUE) ? $staff_pinterest = get_post_meta(get_the_ID(), 'staff_pinterest', TRUE) : $staff_pinterest = '';
		get_post_meta(get_the_ID(), 'staff_skype', TRUE) ? $staff_skype = get_post_meta(get_the_ID(), 'staff_skype', TRUE) : $staff_skype = ''; 
		
		$s = 0; 
		if(!empty($staff_link)) $s++;
		if(!empty($staff_email)) $s++; 
		if(!empty($staff_twitter)) $s++; 
		if(!empty($staff_facebook)) $s++; 
		if(!empty($staff_google_plus)) $s++; 
		if(!empty($staff_linkedin)) $s++; 
		if(!empty($staff_youtube)) $s++; 
		if(!empty($staff_rss)) $s++; 
		if(!empty($staff_pinterest)) $s++; 
		if(!empty($staff_skype)) $s++;	
		if($i % $items_per_column == 1 )
			$class = " first";
		elseif($i % $items_per_column == 0 )
			$class = " last";
		else
			$class = "";
		if ( has_post_thumbnail() && ! post_password_required() ) :	
			$post_thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $post_thumbnail_id );
		else:
			$image = get_template_directory_uri()."/images/placeholders/placeholder.jpg";
		endif;
		$src = tm_mr_image_resize($image, 600, 600, true, 't', false);
		if( empty ( $src ) || $src == 'image_not_specified' ):
			$src = get_template_directory_uri()."/images/megnor/placeholder.png";
			$src = tm_mr_image_resize($src, 600, 600, true, 't', false);
		endif;
			$output .= '<article class="item container'.$class.'">';
			$output .= '<div class="single-team container-inner">';
			$output .= '<div class="staff-image">';
			$output .= '<img src="'.$src.'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
			$output .= '<div class="staff-image-hover"></div>';
			$output .= '</div>';	
			$output .= '<div class="staff-content">';	
			$shorttitle = substr(the_title('','',FALSE),0,150);
			$output .= '<div class="team-content-box">';
			if(!empty($staff_position) && $staff_position != '')
			$output .= '<div class="staff-position"><span>'.$staff_position.'</span></div>';
			if(!empty($shorttitle) && $shorttitle != '')
			$output .= '<div class="staff-name"><a title="'.get_the_title().'" href="'.get_permalink().'" >'.$shorttitle.'</a></div>';
			$output .= '<div class="staff-social icon-'.$s.'">';			
				if(!empty($staff_link) && $staff_link != '')
				$output .= '<a href="'.$staff_link.'" title="Website" class="website icon"><i class="fa fa-link"></i></a>';
				if(!empty($staff_email) && $staff_email != '')
				$output .= '<a href="mailto:'.$staff_email.'" title="Email" class="email icon"><i class="fa fa-envelope-o"></i></a>';
				if(!empty($staff_twitter) && $staff_twitter != '')
				$output .= '<a href="'.$staff_twitter.'" title="Twitter" class="twitter icon"><i class="fa fa-twitter"></i></a>';
				if(!empty($staff_facebook) && $staff_facebook != '')
				$output .= '<a href="'.$staff_facebook.'" title="Facebook" class="facebook icon"><i class="fa fa-facebook"></i></a>';
				if(!empty($staff_google_plus) && $staff_google_plus != '')
				$output .= '<a href="'.$staff_google_plus.'" title="Google Plus" class="google-plus icon"><i class="fa fa-google-plus"></i></a>';
				if(!empty($staff_linkedin) && $staff_linkedin != '')
				$output .= '<a href="'.$staff_linkedin.'" title="Linkedin" class="linkedin icon"><i class="fa fa-linkedin"></i></a>';
				if(!empty($staff_youtube) && $staff_youtube != '')
				$output .= '<a href="'.$staff_youtube.'" title="Youtube" class="youtube icon"><i class="fa fa-youtube"></i></a>';
				if(!empty($staff_rss) && $staff_rss != '')
				$output .= '<a href="'.$staff_rss.'" title="RSS" class="rss icon"><i class="fa fa-rss"></i></a>';
				if(!empty($staff_pinterest) && $staff_pinterest != '')
				$output .= '<a href="'.$staff_pinterest.'" title="Pinterest" class="pinterest icon"><i class="fa fa-pinterest"></i></a>';
				if(!empty($staff_skype) && $staff_skype != '')
				$output .= '<a href="'.$staff_skype.'" title="Skype" class="skype icon"><i class="fa fa-skype"></i></a>';
		  	$output .= '</div>';			
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div></article>';
		$i++;
	endwhile;
	wp_reset_postdata();
	$output .=	'</div></div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'bigshopper').'</div>';
	endif;
	return $output;
}
add_shortcode("tm_ourteam", "shortcode_ourteam");

/***************** Custom Testimonial ****************/
function shortcode_custom_testimonials($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => '1',
		'type' => 'slider',
		'items_per_column' => 3,
		'number_of_posts' => 5,		
		'image_width' => 50,
		'image_height' => 50
	), $atts));
	
	global $post;	
	$i = 1;
	$args = array(
			'posts_per_page' => $number_of_posts,
			'post_status' => 'publish',
			'post_type' => 'testimonial',
		);					
	$testimonial_array = get_posts($args);
	$testimonial_count = count($testimonial_array);
	$output = '';
	if($testimonial_count > 0 ):
	$output .= '<div class="custom-testimonial">';		
	if($type == "slider") { 
		if($testimonial_count > $items_per_column)
			$output .= '<div id="'.$items_per_column.'_testimonial_carousel" class="testimonial-carousel">';
		else
			$output .= '<div id="testimonial_grid" class="testimonial-grid testimonial-cols-'.$items_per_column.'">';
	} else if($type == "grid") {
		$output .= '<div id="testimonial_grid" class="testimonial-grid testimonial-cols-'.$items_per_column.'">';
	} else if($type == "list") {
		$output .= '<div id="testimonial_list" class="testimonial-list">';
	}
	$i = 1;
	$temp2 = 0;
	foreach($testimonial_array as $post) : setup_postdata($post);	
		get_post_meta($post->ID, 'testimonial_position', TRUE) ? $testimonial_position = get_post_meta($post->ID, 'testimonial_position', TRUE) : $testimonial_position = '';
		get_post_meta($post->ID, 'testimonial_link', TRUE) ? $testimonial_link = get_post_meta($post->ID, 'testimonial_link', TRUE) : $testimonial_link = '';		
		$contents = strip_tags(tm_strip_images($post->post_content));
		if($i % $items_per_column == 1)
			$class = " first-item";	
		elseif($i % $items_per_column == 0)
			$class = " last-item";
		else
			$class = "";
			
	    		
		$output .= '<div class="item'.$class.' style-'.$style.'">';					
		$output .= '<div class="product-block">';
			$output .= '<div class="custom-testimonial-inner">';											
					$output .= '<div class="testmonial-image">';
					if ( has_post_thumbnail() && ! post_password_required() ) :	
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
						$output .= '<img src="'.tm_mr_image_resize($post_thumbnail_url, $image_width, $image_height, true, 'left', false).'" title="'.get_the_title().'" alt="'.get_the_title().'" />';
					else:
						$output .= '<i style="width:'.$image_width.';height:'.$image_height.';" class="fa fa-user"></i>';
					endif;			
					$output .= '</div>';						
				
				
				$output .= '<div class="testimonial-wrapper">';
				
				$output .= '<div class="testmonial-text">';			
					$output .= '<div class="testimonial-title"><a title="'.get_the_title().'" href="'.get_permalink().'" >'.get_the_title().'</a></div>';
					if(!empty($testimonial_position)):
						if(!empty($testimonial_link)):
							$output .= '<div class="testimonial-designation">'.$testimonial_position.'</div>';	
						else:
							$output .= '<div class="testimonial-email">'.$testimonial_position.'</div>';
						endif;
					endif;
				$output .= '</div>';	
				$output .=  '<div class="testimonial-content">';
				if($style == '1'):	
					$output .= '<div class="testimonial-top"><blockquote><q>'.substr($contents, 0, 144).'</q></blockquote></div>';
				endif;		
				if($style == '2'):	
					$output .= '<div class="testimonial-top"><blockquote><q>'.substr($contents, 0, 200).'</q></blockquote></div>';	
				endif;	
				$output .= '<div class="read-more"><a title="'.get_the_title().'" href="'.get_permalink().'" >'.esc_html__('read more', 'bigshopper').'</a></div>';
				$output .= '</div></div>';
					 
			$output .= '</div>';
		$output .= '</div>';
			
		$output .= '</div>';		
		
		$i++;
	endforeach;
	$output .= '</div>';
	$output .= '</div>';
	else:
	$output .= '<div class="no-result">'.esc_html__('No results found...', 'bigshopper').'</div>';
	endif;
	wp_reset_query();
	return $output;
}
add_shortcode('tm_custom_testimonials', 'shortcode_custom_testimonials');

/***************** Toggle ****************/
function shortcode_toggle($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'style'	=> '1'	
	), $atts));
	
	$output = '';
	$output .= '<div class="toggle style'.$style.'">';
	$output .=	do_shortcode($content);
	$output .=	'</div>';
	return $output;
}
add_shortcode('tm_toggle', 'shortcode_toggle');
function shortcode_single_toggle($atts, $content = null)
{
	extract(shortcode_atts(array(
			'title' => 'Click here to hide/show Div'
		), $atts));
		$output = '';
		$output .= '<div class="single_toggle toogle_div">';
		$output .= '<a class="tog" href="#"><div class="toggle-title"><span class="icon"></span>'.$title.'</div></a>';
		$output .= '<div class="tab_content">'.do_shortcode($content).'</div>';
		$output .=	'</div>';
		return $output;
	}
add_shortcode('toggle', 'shortcode_single_toggle');

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_tm_toggle extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_toggle extends WPBakeryShortCode {
    }
}

/******************** Single static Category  Link ***************/
function shortcode_tm_single_category($atts, $content = null) {	
   extract(shortcode_atts(array(
   		'category_name' => '',	
	), $atts));
	$category_ids_array = explode(",",$category_name);
	$category_ids_array[] = $category_ids_array;	
	$output = '';
	$output .= '<div id="category_link">';	
	$output .= '<ul class="category_link_inner">' ;
	$terms = explode(",",$category_name);
	foreach($terms as $term) {
		if($category_name){		
					$output .= '<li><a href="'.get_category_link(esc_attr($term)).'" target="_blank">'.get_cat_name($term).'</a></li>';
				}
	}	
	$output .= '</ul>';
	$output .= '</div>';
	return $output;
}
add_shortcode("tm_single_category", "shortcode_tm_single_category");

/********************* Single  Hot / Counter  products Slider ***************/
function shortcode_single_hot_product_slider($atts, $content = null, $code)
{
	extract(shortcode_atts(array(
		'height' => '272',
		'width' => '196',
		'link_text' => 'see all',
		'link_url' => '#'
	), $atts));
	$output = '';
	 global $post;
	 $params = array('posts_per_page' => -1, 'post_type' => array('product', 'product_variation'));
		$wc_query = new WP_Query($params);
 if ( in_array( 'woocommerce/woocommerce.php' ,apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
$output .= '<div id="counter-products-carousel" class="counter-products-carousel owl-carousel woocommerce single-product">';
     
	  if ($wc_query->have_posts()) :
          while ($wc_query->have_posts()) :
                $wc_query->the_post(); 
	$today = date('Y-m-d');			
	$sale_price_dates_from = ( $date = get_post_meta( $post->ID, '_sale_price_dates_from', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';		 
	$sale_price_dates_to    = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
		 if ($today >= $sale_price_dates_from  && $today <= $sale_price_dates_to){
	if ($sale_price_dates_to != "")
	{	
	
					global $product;
		$attachment_ids = $product->get_gallery_attachment_ids();
				
$output .= '<div class="product">';
	 $output .= '<div class="container-inner">';
		$output .= '<div class="product-block-inner">';	
			   			
		  $output .= '<div class="image-block">';	
						 if($product->is_on_sale() ) :
		   						$output.='<span class="onsale">'. __( 'Sale', 'woocommerce' ).'</span>';
		   				endif;	
							  if ( has_post_thumbnail() ) {
		  
					$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
					$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
					$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title'	=> get_the_title( get_post_thumbnail_id() )
					) ); 
					$output .= '<img alt="'.get_the_title().'" src="'.$image_link.'" height="'.$height.'"  width="'.$width.'"/>';
				   }  	
			$output .= '</div>';
			
		 $output .='<div class="product-detail-wrapper">';	
					 $output .='<h3 class="product-name">';		
							$output .='<a href="'.get_permalink().'">'.$product->get_title().'</a>';
					$output .='</h3>';
					$output .='<div class="product-price price">'.$product->get_price_html().'</div>';	
					$output .= $product->get_rating_html();
				
		
	if ( ! $product->is_in_stock() ) : 
    	$output .= '<a href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="button">'.apply_filters( 'out_of_stock_add_to_cart_text', __( 'Read More', 'woocommerce' ) ).'</a>';
	endif;	
	$output .='<div class="count-down">';	
								$output .='<div class="countbox hastime" data-time="'.$sale_price_dates_to.'"></div>';	
					 $output .= '</div>';	
			if(!empty($link_text)):
					if(!empty($link_url)):
						$output .= '<div class="see-all"><a href="'.$link_url.'">'.$link_text.'</a></div>';	
					else:
						$output .= '<div class="see-all">'.$link_text.'></div>';	
					endif;
				endif; 
						 		 
		  
					 $output .= '</div>';
		  $output .= '</div>';
	  $output .='</div>';
	  $output .='</div>';
}
}
      endwhile; 
      wp_reset_postdata();
 endif;
$output .='</div>';
 }
return $output;

}
add_shortcode('tm_single_hot_product_slider', 'shortcode_single_hot_product_slider');

/***************** Banner slider ****************/
function shortcode_single_slide($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	$output = '';
	$output .= '<div class="banner-slider-container">';
	$output .= '<div class="slider-container-inner">';	
	$output .= '<div class="title">'.$title.'</div>';
	$output .= '<ul class="slides">';
	$output .=	do_shortcode($content);
	$output .= '</ul>';
	$output .= '</div></div>';
	return $output;
}
add_shortcode('slider', 'shortcode_single_slide');
function shortcode_single_slider($atts, $content = null)
{
	extract(shortcode_atts(array(
			'image' => '',	
			'link' => '',
			'height' => '',
			'width' => '',							 
		), $atts));
		$output = ''; 
		$output .= '<li><div class="banner-image">';
		if(!empty($link)):
			$output .= '<a target="_Blank" href="'.$link.'"><img src="'.$image.'" alt="" height="'.$height.'" width="'.$width.'" class="vv" /></a>';
		else:
			$output .= '<img src="'.$image.'" alt="" class="vv" />';
		endif;
		$output .= '</li></div">';
		return $output;
	}
add_shortcode('slide', 'shortcode_single_slider');

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
 
//activate own function
add_shortcode('gallery', 'msdva_gallery_shortcode');
function msdva_gallery_shortcode($attr) {
$post = get_post();
 
static $instance = 0;
$instance++;
 
if ( ! empty( $attr['ids'] ) ) {
// 'ids' is explicitly ordered, unless you specify otherwise.
if ( empty( $attr['orderby'] ) )
$attr['orderby'] = 'post__in';
$attr['include'] = $attr['ids'];
}
 
// Allow plugins/themes to override the default gallery template.
$output = apply_filters('post_gallery', '', $attr);
if ( $output != '' )
return $output;
 
// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $attr['orderby'] ) ) {
$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
if ( !$attr['orderby'] )
unset( $attr['orderby'] );
}
 
extract(shortcode_atts(array(
'order' => 'ASC',
'orderby' => 'menu_order ID',
'id' => $post ? $post->ID : 0,
'itemtag' => 'dl',
'icontag' => 'dt',
'captiontag' => 'dd',
'divtag' => 'div',
'columns' => 3,
'size' => 'full',
'include' => '',
'exclude' => '',
'link' => 'file' // CHANGE #1
), $attr, 'gallery'));
 
$id = intval($id);
if ( 'RAND' == $order )
$orderby = 'none';
 
if ( !empty($include) ) {
$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
$attachments = array();
foreach ( $_attachments as $key => $val ) {
$attachments[$val->ID] = $_attachments[$key];
}
} elseif ( !empty($exclude) ) {
$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
} else {
$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}
 
if ( empty($attachments) )
return '';
 
if ( is_feed() ) {
$output = "\n";
foreach ( $attachments as $att_id => $attachment )
$output .= tm_wp_get_attachment_link($att_id, $size, true) . "\n";
return $output;
}
 
$itemtag = tag_escape($itemtag);
$captiontag = tag_escape($captiontag);
$icontag = tag_escape($icontag);
$valid_tags = wp_kses_allowed_html( 'post' );
if ( ! isset( $valid_tags[ $itemtag ] ) )
$itemtag = 'dl';
if ( ! isset( $valid_tags[ $captiontag ] ) )
$captiontag = 'dd';
if ( ! isset( $valid_tags[ $icontag ] ) )
$icontag = 'dt';
 
$columns = intval($columns);
$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
$float = is_rtl() ? 'right' : 'left';
$selector = "gallery-{$instance}";
 
$gallery_style = $gallery_div = '';
if ( apply_filters( 'use_default_gallery_style', true ) )
$gallery_style = "
<style type='text/css'>
#{$selector} {
margin: auto;
}
#{$selector} .gallery-item {
float: {$float};
margin-top: 10px;
text-align: center;
width: {$itemwidth}%;
}
#{$selector} img {
border: 2px solid #cfcfcf;
}
#{$selector} .gallery-caption {
margin-left: 0;
}
/* see gallery_shortcode() in wp-includes/media.php */
</style>";
$size_class = sanitize_html_class( $size );
$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
 
$i = 0;
foreach ( $attachments as $id => $attachment ) {
$image_url = $attachment->guid;
$image_output = tm_wp_get_attachment_link( $id, $size, true, false );
$image_meta = wp_get_attachment_metadata( $id );
 
$orientation = '';
if ( isset( $image_meta['height'], $image_meta['width'] ) )
$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
$output .= "<{$itemtag} class='gallery-item'>";
$output .= "
<{$icontag} class='gallery-icon {$orientation}'>
$image_output
</{$icontag}>";
$output .= "
<{$captiontag} class='wp-caption-text gallery-caption'>
<{$divtag} class='gallery-caption-inner'>";
	$output .= " <{$divtag} class='wp-caption-text gallery-title'>
	" . wptexturize($attachment->post_title) . "
	</{$divtag}>";
	
if ( $captiontag && trim($attachment->post_excerpt) ) {		
	$output .= "<{$divtag} class='wp-caption-text gallery-excerpt'>";
	if($columns == 1):		
		$excerpt_length = 100;
	elseif($columns == 2):
		$excerpt_length = 300;
	elseif($columns == 3):
		$excerpt_length = 200;
	elseif($columns == 4):
		$excerpt_length = 50;
	elseif($columns == 5):
		$excerpt_length = 10;
	endif;
	$output .= substr($attachment->post_excerpt,0,$excerpt_length);		
	$output .= "</{$divtag}>";
	
$output .= "<{$divtag} class='wp-caption-text gallery-zoom'>
		<a href=" . $image_url . " title='Click to view Full Image' class='icon mustang-gallery'><i class='fa fa-plus'></i></a>
	</{$divtag}>";
	
$output .= "<{$divtag} class='wp-caption-text gallery-redirect'>
	 <a href=" . get_attachment_link( $attachment->ID ) . " title='Click to view read more' class='icon readmore'><i class='fa fa-link'></i></a>
	</{$divtag}>"; 
}else{
$output .= "<{$divtag} class='wp-caption-text gallery-zoom no-text'>
	 <a href=" . $image_url . " title='Click to view Full Image' class='icon mustang-gallery'><i class='fa fa-plus'></i></a>
	</{$divtag}>";		
$output .= "<{$divtag} class='wp-caption-text gallery-redirect'>
	 <a href=" . get_attachment_link( $attachment->ID ) . " title='Click to view read more' class='icon readmore'><i class='fa fa-link'></i></a>
	</{$divtag}>";
}
$output .= "</{$divtag}>";	
$output .= "</{$captiontag}>";
$output .= "</{$itemtag}>";
}
 
$output .= "
</div>\n";
 
return $output;
}
 
 
function tm_wp_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = true, $icon = false, $text = false ) {
$id = intval( $id );
$_post = get_post( $id );
if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
return __( 'Missing Attachment', 'bigshopper' );
 
if ( $permalink )
// $url = get_attachment_link( $_post->ID ); // we want the "large" version!!
// FIX!! ask for large URL
$image_attributes = wp_get_attachment_image_src( $_post->ID, 'large' );
$url = $image_attributes[0];
// $url = wp_get_attachment_image( $_post->ID, 'large' );
 
$post_title = esc_attr( $_post->post_title );
 
if ( $text )
$link_text = $text;
elseif ( $size && 'none' != $size )
$link_text = wp_get_attachment_image( $id, $size, $icon );
else
$link_text = '';
 
if ( trim( $link_text ) == '' )
$link_text = $_post->post_title; 
return apply_filters( 'wp_get_attachment_link', "<a rel='gallery-nr'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}
?>