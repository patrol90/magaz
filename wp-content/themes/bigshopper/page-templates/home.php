<?php
/* Template Name: Home */ 
?>
<?php 
get_header();
?>
<?php
if(is_active_sidebar('home-sidebar-cms')) : 
$sidebar = "home-sidebar-cms";
endif; ?> 
<div id="main-content" class="main-content home-page <?php echo esc_attr(tm_sidebar_position()); ?> <?php echo esc_attr(tm_page_layout()); ?> <?php echo esc_attr($sidebar); ?>">
  <?php
	if ( is_front_page() && tm_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
<?php if (is_active_sidebar('home-sidebar-cms')) : ?>
<div id="secondary" class="right-col">
   <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php tm_get_widget('home-sidebar-cms');  ?>	
	</div>
</div>
<?php endif; ?>	
<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<div id="primary" class="content-area">
<?php else : ?>
<div id="primary" class="main-content-inner-full">
<?php endif; ?> 
    <div id="content" class="site-content" role="main">
      <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					// Include the page content template.
					get_template_part( 'content', 'page' ); ?>
      <?php endwhile;
			?>
    </div><!-- #content -->
</div><!-- #primary -->
   <?php 
if (get_option('tm_page_sidebar') == 'yes') : 
	get_sidebar( 'content' );
	get_sidebar();
endif;  ?><!-- #main-content -->
<?php get_footer(); ?>