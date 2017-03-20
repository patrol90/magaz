<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php  // Reference:  http://codex.wordpress.org/Widgets_API

class TmBrandList extends WP_Widget
{
    function TmBrandList(){
		$widget_settings = array('description' => 'Brand List Widget', 'classname' => 'widgets-brand brands');
		parent::__construct(false,$name='TM - Brand Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$column = apply_filters('brand_column', empty($instance['column']) ? '' : $instance['column']);
		$image_width = apply_filters('brand_image_width', empty($instance['image_width']) ? '' : $instance['image_width']);
		$image_height = apply_filters('brand_image_height', empty($instance['image_height']) ? '' : $instance['image_height']);
		$text1 = apply_filters('brand_text1', empty($instance['text1']) ? '' : $instance['text1']);
		$text2 = apply_filters('brand_text2', empty($instance['text2']) ? '' : $instance['text2']);
		$button = empty($instance['button']) ? '' : $instance['button'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
		$window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
			echo balanceTags($before_widget);
			echo balanceTags($before_title);
			if($title)
			echo balanceTags($title);
			echo balanceTags($after_title); 
		$terms = get_terms( 'product_brand'); ?>	
		<ul class="toggle-block  columns-<?php echo esc_attr($column); ?> ">
		
	<?php
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
			?>
			<li class="<?php echo esc_attr($li_class); ?>">
			<div class="main brand-inner">
			<div class="image-block">
			<a href="<?php echo esc_url(get_term_link( $term )); ?>">
			<?php 
			if(!empty($image)) :  ?>
					<img src="<?php  echo tm_mr_image_resize($image, $image_width,$image_height, true, 'left', false); ?> " title="<?php echo esc_attr($term->name); ?>" alt="<?php esc_attr($term->name); ?>" />
				<?php 	else: ?>
				<i class="fa fa-user"></i>
			<?php   endif;	?>
			</a></div>
			<?php //echo esc_attr($term->name);?>
			</div>
			</li>
			<?php 
			
		$i++; }  }?>
		
			<li class="brand-cms-text"> 
					<?php if($text1) : ?><div class="text1"><?php echo esc_attr($text1); ?></div><?php endif; ?>
					<?php if($text2) : ?><div class="text2"><?php echo esc_attr($text2); ?></div><?php endif; ?>
					<?php if($button) : ?><div class="button cmsbutton"><a href="<?php if($linkURL == ""): echo home_url( '/' ); else:?><?php echo esc_url($linkURL); endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>	<?php echo esc_attr($button); ?></a></div><?php endif; ?>
			</li>		
		</ul>
	<?php echo balanceTags($after_widget);
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;			
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['column'] = strip_tags($new_instance['column']);
		$instance['image_width'] = strip_tags($new_instance['image_width']);
		$instance['image_height'] = strip_tags($new_instance['image_height']);
		$instance['text1'] = strip_tags($new_instance['text1']);
		$instance['text2'] = strip_tags($new_instance['text2']);
		$instance['button'] = strip_tags($new_instance['button']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['window_target'] = strip_tags($new_instance['window_target']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
		'title'=>'Brands',
		'column'=>'3',
		'image_width'=>'120',
		'image_height'=>'120',
		'text1'=>'luxury brands',
		'text2'=>'Top fashion designe',
		'button'=>'View More',
		'linkURL'=>'#',
		'window_target' =>''
		) );			
		$title = esc_attr($instance['title']);
		$column = esc_attr($instance['column']);
		$image_width = esc_attr($instance['image_width']);
		$image_height = esc_attr($instance['image_height']);
		$text1 = esc_attr($instance['text1']);
		$text2 = esc_attr($instance['text2']);
		$button = esc_attr($instance['button']);
		$linkURL = esc_attr($instance['linkURL']);
		$window_target = esc_attr($instance['window_target']);
	?>
			<p><label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php esc_html_e('Title:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($title);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('column'));?>"><?php esc_html_e('Number of product per column:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('column'));?>" name="<?php echo esc_attr($this->get_field_name('column'));?>" type="text" value="<?php echo esc_attr($column);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('image_width'));?>"><?php esc_html_e('Image Width:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_width'));?>" name="<?php echo esc_attr($this->get_field_name('image_width'));?>" type="text" value="<?php echo esc_attr($image_width);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('image_height'));?>"><?php esc_html_e('Image Height:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_height'));?>" name="<?php echo esc_attr($this->get_field_name('image_height'));?>" type="text" value="<?php echo esc_attr($image_height);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('text1'));?>"><?php esc_html_e('Text1:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('text1'));?>" name="<?php echo esc_attr($this->get_field_name('text1'));?>" type="text" value="<?php echo esc_attr($text1);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('text2'));?>"><?php esc_html_e('Text2:', 'bigshopper'); ?></label><input class="widefat" id="<?php echo esc_attr($this->get_field_id('text2'));?>" name="<?php echo esc_attr($this->get_field_name('text2'));?>" type="text" value="<?php echo esc_attr($text2);?>" /></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('button'));?>">button:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button'));?>" name="<?php echo esc_attr($this->get_field_name('button'));?>" type="text" value="<?php echo esc_attr($button);?>"></input></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('linkURL'));?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkURL'));?>" name="<?php echo esc_attr($this->get_field_name('linkURL'));?>" type="text" value="<?php echo esc_attr($linkURL);?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target')); ?>">Open Link In New Window</label></p>	
			
	<?php }
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	add_action('widgets_init', create_function('', 'return register_widget("TmBrandList");'));
endif;
?>