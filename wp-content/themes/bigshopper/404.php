<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
get_header(); ?>
<div class="main-content-inner">	
<?php if (get_option('tm_page_sidebar') == 'yes') : ?>
<div id="primary" class="content-area">
<?php else : ?>
<div id="primary" class="main-content-inner-full">
<?php endif; ?>
  <div id="content" class="site-content" role="main">
    <div class="page-content">
      <p>
        <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bigshopper' ); ?>
      </p>
      <?php get_search_form(); ?>
    </div><!-- .page-content -->
  </div><!-- #content -->
</div><!-- #primary -->
<?php
if (get_option('tm_page_sidebar') == 'yes') : 
	get_sidebar( 'content' );
	get_sidebar();
endif;  ?>
</div><!--main-content-inner -->
<?php get_footer(); ?>