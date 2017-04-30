<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<?php tm_content_after(); ?>
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
<?php tm_footer_before(); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'footer-top-area' ) ) : ?>
			<div class="footer-top-outer">
				<div class="footer-top-inner">
					<?php dynamic_sidebar('footer-top-area'); ?>
				</div>
			</div>
	<?php endif; ?>
	  <div class="theme-container">
		<div class="footer_top">
			<?php tm_footer_inside(); ?>
			<?php get_sidebar('footer'); ?>
		</div>	
	   </div> 
		<div class="footer-bottom-container">	
			<div class="theme-container">
				<?php if ( has_nav_menu('footer-menu') ) { ?>    
				<div class="footer-menu-links">
				<?php
							$tm_footer_menu=array(
							'menu' => esc_html__('TM Footer Navigation','bigshopper'),
							'depth'=> 1,
							'echo' => false,
							'menu_class'      => 'footer-menu', 
							'container'       => '', 
							'container_class' => '', 
							'theme_location' => 'footer-menu'
							);
							echo wp_nav_menu($tm_footer_menu);				    
							?>
				</div><!-- #footer-menu-links -->	
				<?php } ?> 
			   <div class="site-info">  <?php esc_html__( 'Copyright', 'bigshopper' ); ?> &copy; <?php echo esc_attr(date('Y')); ?> <a href="<?php echo esc_url(get_option('tm_footer_link')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr(get_option('tm_footer_slog'));?>
						</a>
						<?php do_action( 'tm_credits' ); ?>
					  </div>
		<?php if (is_active_sidebar('sixth-footer-widget-area')) : ?>
				<div class="footer_right">	
					<?php dynamic_sidebar('sixth-footer-widget-area'); ?>
				</div>
		<?php endif; ?>
	   </div>
    </div>
</div>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'Z19TF2mYq4';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</footer>
<!-- #colophon -->
<?php tm_footer_after(); ?>
</div>
<!-- #page -->
<?php tm_go_top(); ?>
<?php tm_get_widget('before-end-body-widget'); ?>
<?php wp_footer(); ?>
</body>
</html>