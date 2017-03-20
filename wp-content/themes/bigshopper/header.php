<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
<?php tm_header(); ?>
 <?php wp_head();?> 
</head>
<body <?php body_class(); ?>>
<?php if ( get_option('tm_control_panel') == 'yes' ) do_action('tm_show_panel'); ?>
<div id="page" class="hfeed site">
<?php if ( get_header_image() ) : ?>
<div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_html_e('Siteheader','bigshopper'); ?>"> </a> </div>
<?php endif; ?>
<!-- Header -->
<?php tm_header_before(); ?>
<header id="masthead" class="site-header  site-header-fix <?php echo "header".esc_attr(get_option('tm_header_layout'));  ?> <?php echo esc_attr(tm_sidebar_position()); ?>">
 <div class="site-header-main">
	<div class="header-main">
		<div class="header-top  navigation-fix">
			<div class="theme-container">				
			<!-- Start header_left -->	
				<div class="header-left">
				<!-- Header LOGO-->
				<div class="header-logo">
				<?php if (get_option('tm_logo_image') != '') : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php tm_get_logo(); ?>
					</a>
				<?php else: ?>
					<h3 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
						</a>
					</h3>
				<?php endif; ?>
				<?php if(get_option('tm_showsite_description') == 'yes') : ?>
					<h2 class="site-description">
						<?php bloginfo( 'description' ); ?>
					</h2>
				<?php endif; // End tm_showsite_description ?>
				</div>
				<!-- Header Mob LOGO-->
				<div class="header-mob-logo">
				<?php if (get_option('tm_mob_logo_image') != '') : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php tm_get_mob_logo(); ?>
					</a>
				<?php else: ?>
					<h3 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
						</a>
					</h3>
				<?php endif; ?>
				<?php if(get_option('tm_showsite_description') == 'yes') : ?>
					<h2 class="site-description">
						<?php bloginfo( 'description' ); ?>
					</h2>
				<?php endif; // End tm_showsite_description ?>
				</div>
			</div>
			<?php tm_header_inside(); ?>
				<nav class="navigation-bar main-navigation">																			
					<h3 class="menu-toggle"><?php esc_html_e( 'Menu', 'bigshopper' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_html_e( 'Skip to content', 'bigshopper' ); ?>"><?php esc_html_e( 'Skip to content', 'bigshopper' ); ?></a>	
						<div class="mobile-menu">	
						<span class="close-menu"></span>	
							<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mobile-menu-inner') ); ?>
						</div>	
				</nav>
			<!-- Start header_right -->	
				<div class="header-right">
					<!--Cart -->				
					<div class="header-cart">
								<?php 
									// Woo commerce Header Cart
									if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_active_sidebar('header-widget') ) : ?>
									<div class="cart togg">
									<?php global $woocommerce;
									ob_start();?>						
									<div id="shopping_cart" class="shopping_cart tog" title="<?php esc_html_e('View your shopping cart', 'bigshopper'); ?>">
<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'bigshopper'); ?>"><div class="cart-qty"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'bigshopper'), $woocommerce->cart->cart_contents_count);?></div><div class="cart-price"><span class="label"><?php esc_html_e('Shopping Cart', 'bigshopper'); ?></span><?php echo translate($woocommerce->cart->get_cart_total()); ?></div></a>
									</div>	
									<?php global $woocommerce; ?>
									<?php tm_get_widget('header-widget'); ?>		
								</div>							
							<?php endif; ?>	
							</div>
					<!-- Topbar link -->
						<?php if ( has_nav_menu('header-menu') ) { ?> 
					<div class="topbar-link">
								<span class="topbar-link-toggle"></span>
							 <div class="topbar-link-wrapper">
								<div class="header-menu-links">	
								<?php 
										// Woo commerce Header Cart
										$tm_header_menu =array(
										'menu' => esc_html__('TM Header Navigation','bigshopper'),
										'depth'=> 1,
										'echo' => false,
										'menu_class'      => 'header-menu', 
										'container'       => '', 
										'container_class' => '', 
										'theme_location' => 'header-menu'
										);
										echo wp_nav_menu($tm_header_menu);				    
								?>
								<?php
									$logout_url = '';
									if ( is_user_logged_in() ) {
										$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); 
										if ( $myaccount_page_id ) { 
										$logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) ); 
										if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
										if (is_ssl()) {
										$logout_url = str_replace( 'http:', 'https:', $logout_url );
										}
										} ?>
										<li class="logout"><a href="<?php echo esc_url($logout_url); ?>" ><?php echo esc_html_e('Logout','fashiro'); ?></a></li>
										<?php }
										else { ?>
										<li class="login" ><a href="<?php echo  get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html_e('User Login','fashiro'); ?></a></li>
									<?php } ?>   					
										
								</div>			
								</div>
							</div>
					 	<?php } ?> 	
				</div>	
			</div>
		</div>
		<div class="header-bottom">
			<div class="theme-container">
				<div class="header-bottom-outer">
				<!-- category block -->
				<?php if (is_active_sidebar('header-category')) : ?>
					<div class="header-category widget_product_categories">
						<div class="box-category-heading">
							<div class="box-category">
								<span class="heading-img"></span><?php echo get_option( 'tm_navbar_category_title' ); ?>
							</div>
						</div>
						<?php tm_get_widget('header-category');  ?>	
					</div>
				<?php endif; ?>	
				<!-- #site-navigation -->
				<nav id="site-navigation" class="navigation-bar main-navigation">																			
					<h3 class="menu-toggle"><?php esc_html_e( 'Menu', 'bigshopper' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_html_e( 'Skip to content', 'bigshopper' ); ?>"><?php esc_html_e( 'Skip to content', 'bigshopper' ); ?></a>	
						<div class="mega-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mega' ) ); ?>			
						</div>	
						<div class="mobile-menu">	
						<span class="close-menu"></span>	
							<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mobile-menu-inner') ); ?>
						</div>	
				</nav>
			</div>
			<div class="header-bottom-inner">
				<!-- Service Banner -->
				<?php if (get_option('tm_service_block') == 'yes') : ?>
						<?php tm_get_topbar_banner(); ?>
				<?php endif; ?>
				<!-- Search -->
				<div class="quick-access search">
					<?php if (is_active_sidebar('header-search')) : ?>
							<div class="header-search">
								<?php tm_get_widget('header-search');  ?>	
							</div>
						<?php endif; ?>	
					</div>
				<!-- Contact -->
				<?php if (get_option('tm_show_topbar_contact') == 'yes') : ?>
			 	<div class="header-contact">
					<?php tm_get_topbar_contact(); ?>
				</div>
			<?php endif; ?>		
			</div>
		</div>
	  </div>
	</div>				    
  <!-- End header-main -->	
	</div>	
</header>
<?php tm_header_after(); ?>
<?php tm_main_before(); ?>
	<?php 
		$tm_page_layout = tm_page_layout(); 
		if( isset( $tm_page_layout) && !empty( $tm_page_layout ) ):
		$tm_page_layout = $tm_page_layout; 
		else:
		$tm_page_layout = '';
		endif;
	?>
<?php 
$shop = '0';
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	if(is_shop())
		$tm_page_layout = 'wide-page';
		$shop = '1';
	endif;
?>
<div id="main" class="site-main <?php if (get_option('tm_show_topbar') == 'yes') echo "extra"; ?>">
<div class="main_inner">
<?php if ( !is_page_template('page-templates/home.php')) : ?>
	<div class="page-title header">
  <div class="page-title-inner">
     <h3 class="entry-title-main">
<?php	    
	  if($shop == '1') {
	       		if(is_shop()) :
		    		echo '';
				elseif(tm_is_blog()):
				        esc_html_e( 'Blog', 'bigshopper' );
				elseif(is_search()) :
					printf( esc_html__( 'Search Results for: "%s"', 'bigshopper' ), get_search_query() ); 
				elseif( is_front_page() && is_home()):
				    esc_html_e( 'Blog', 'bigshopper' );	    
				elseif(is_singular('post')):
					esc_html_e( 'Single Blog', 'bigshopper' );	    
				else :
				    the_title();
	        	endif; 	
	   }else {		   		
			 if(tm_is_blog()):
				esc_html_e( 'Blog', 'bigshopper' );		
			elseif(is_search()) :
				printf( esc_html__( 'Search Results for: "%s"', 'bigshopper' ), get_search_query() ); 		
			elseif(is_singular('post') ) :
				esc_html_e( 'Single Blog', 'bigshopper' );				
			else :
				    the_title();
			endif; 	
		}  
	  ?>
    </h3>
    <?php tm_breadcrumbs(); ?>
  </div>
</div>
<?php endif; ?>
<?php 
	$tm_page_layout = tm_page_layout(); 
	if( isset( $tm_page_layout) && !empty( $tm_page_layout ) ):
	$tm_page_layout = $tm_page_layout; 
	else:
	$tm_page_layout = '';
	endif;
if ( $tm_page_layout == 'wide-page' ) : ?>
	<div class="main-content-inner-full">
<?php else: 		
if(is_archive() || is_tag() || is_404()) : ?>
	<div class="main-content">
<?php else : ?>
	<div class="main-content-inner  <?php echo esc_attr(tm_sidebar_position()); ?>">
<?php endif; ?>
<?php endif; ?>
<?php tm_content_before(); ?>