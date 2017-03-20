<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="entry-main-content">
      <?php if ( is_search() || !is_single()) : ?>
      <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
          <div class="entry-thumbnail-outer">
			 <div class="entry-thumbnail">
		    <?php 
               the_post_thumbnail('tm-blog-posts-list');
               $postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
               ?>
            <?php if(!empty($postImage)): ?>
            	<div class="block_hover">
               <div class="links">
                  <a href="<?php echo esc_url($postImage); ?>" title="<?php esc_html_e( 'Click to view Full Image', 'bigshopper' );?>" data-lightbox="example-set" class="icon mustang-gallery"><i class="fa fa-plus"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_html_e( 'Click to view Read More', 'bigshopper' );?>" class="icon readmore"><i class="fa fa-link"></i></a> 
               </div>
            </div>
		
            <?php endif; ?>
        </div>
		   </div>
      <?php endif; ?>
	  <?php endif; ?>
	  <?php if ( is_search() || !is_single()) : ?>
	   	<div class="post-content">
           <div class="post-inner-left">
            <div class="entry-content-date">
               <div class="blog-icon"></div>
               <?php tm_post_entry_date(); ?>
            </div>
         </div>
		   <div class="post-inner-right">
            <div class="entry-content-other">
                <div class="entry-main-header">
				   <?php 
					  if( $post->post_title == '' ) : 
					  $entry_meta_class = "empty-entry-header";
					  else :
					  $entry_meta_class = "";
					  endif; ?>
				   <header class="entry-header <?php echo esc_attr($entry_meta_class); ?>">
					  <h3 class="entry-title"> <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a><?php tm_sticky_post(); ?></h3>
				   </header>
				   <!-- entry-header -->
				</div>
			     <div class="entry-summary">
                  <div class="excerpt"> <?php echo tm_posts_short_description(); ?> </div>
               
			  </div>
			 </div>
               <!-- entry-summary -->
         </div>
		   <div class="entry-content-inner">
            <div class="entry-meta-inner">
               <div class="entry-meta">
                  <?php tm_author_link(); ?>
                  <?php tm_categories_links(); ?>
                  <?php tm_tags_links(); ?>											
                  <?php tm_comments_link(); ?>											
               </div>
               <!-- entry-meta -->
            </div>
            <!-- entry-meta-inner -->
         </div>
		 </div>
      <?php else: ?>
         <div class="entry-content-other BLOG">
              <div class="entry-main-header">
                  <?php 
                     if( $post->post_title == '' ) : 
                     $entry_meta_class = "empty-entry-header";
                     else :
                     $entry_meta_class = "";
                     endif; ?>
                  <header class="entry-header <?php echo esc_attr($entry_meta_class); ?>">
                     <h3 class="entry-title"> 
                        <?php the_title(); ?>
                        <?php tm_sticky_post(); ?> 
                     </h3>
                  </header>
                  <!-- .entry-header single blog-->
                  <div class="entry-content-inner">
                     <div class="entry-meta-inner">
                        <div class="entry-meta">
                           <?php tm_author_link(); ?>
                           <?php tm_entry_date(); ?>
                           <?php tm_comments_link(); ?>             																
                           <?php tm_tags_links(); ?>											
                           <?php tm_categories_links(); ?>
                           <?php edit_post_link( esc_html__( 'Edit', 'bigshopper' ),'<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>	
                        </div>
                        <!-- .entry-meta -->
                     </div>
                     <!-- .entry-meta-inner -->
                  </div>
                  <!-- .entry-content-inner -->
               </div>
               <!-- .entry-main-header -->
               <div class="entry-content">
                  <?php 
                     the_post_thumbnail('tm-blog-posts-list');
                     $postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                     ?>
                  <?php the_content( wp_kses( __('Continue reading <span class="meta-nav">&rarr;</span>', 'bigshopper' ),tm_allowed_html())); ?>
                  <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bigshopper' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
               </div>
               <!-- .entry-content -->
            </div>
      <?php endif; ?>
   </div>
</article>
<!-- #post -->