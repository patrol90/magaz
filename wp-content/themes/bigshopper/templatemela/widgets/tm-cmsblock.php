<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?><?php  // Reference:  http://codex.wordpress.org/Widgets_API
class CMSBlockWidget extends WP_Widget
{
    function CMSBlockWidget(){
			$widget_settings = array('description' => 'CMS Block Widget', 'classname' => 'widgets-cms');
		parent::__construct(false,$name='TM - CMS Block Widget',$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$window_target1 = isset($instance['window_target1']) ? $instance['window_target1'] : false;
		$window_target2 = isset($instance['window_target2']) ? $instance['window_target2'] : false;
		$window_target3 = isset($instance['window_target3']) ? $instance['window_target3'] : false;
		$is_template_path = isset($instance['is_template_path']) ? $instance['is_template_path'] : false;
		$cms_class = empty($instance['cms_class']) ? '' : $instance['cms_class'];
		$text1 = empty($instance['text1']) ? '' : $instance['text1']; 
		$text2 = empty($instance['text2']) ? '' : $instance['text2'];
		$text3 = empty($instance['text3']) ? '' : $instance['text3'];
		$text4 = empty($instance['text4']) ? '' : $instance['text4']; 
		$button1 = empty($instance['button1']) ? '' : $instance['button1'];
		$linkURL1 = empty($instance['linkURL1']) ? '' : $instance['linkURL1'];
		$button2 = empty($instance['button2']) ? '' : $instance['button2'];
		$linkURL2 = empty($instance['linkURL2']) ? '' : $instance['linkURL2'];
		$bgcolor = empty($instance['bgcolor']) ? '' : $instance['bgcolor'];
		$imgSrc = empty($instance['imageSrc']) ? '' : $instance['imageSrc'];
		$imgURL = empty($instance['imgURL']) ? '' : $instance['imgURL'];
		$toggle_title = empty($instance['toggle_title']) ? '' : $instance['toggle_title'];
		$toggle = empty($instance['toggle']) ? '' : $instance['toggle'];
		if($is_template_path == 1):
			$imageSrc = get_stylesheet_directory_uri() . '/images/megnor/banners/' . $imgSrc; 
		endif;
		
		echo balanceTags($before_widget); 
		 ?>
		 <div class="side_banner <?php echo esc_attr($cms_class); ?> toggle-content" style="background-color:<?php echo "#".esc_attr($bgcolor); ?>;">
		 
		 <?php if(( $toggle == 'on') && (!empty($toggle_title))) :	
		 $classname = ' toggle-content ';	  ?>
		<h3 class="widget-title"><?php echo esc_attr($toggle_title); ?></h3>	
		<div class="toggle-block <?php echo esc_attr($classname);?>"> 
		<?php endif; ?>
	
		 	<?php if(!empty($imgSrc)) : ?>
				<div class="image"><a href="<?php if($imgURL == ""): echo home_url( '/' ); else:?><?php echo esc_url($imgURL); endif;?>" <?php if($window_target3 == true) echo 'target="_blank"';?>>
					<img src="<?php echo esc_url($imageSrc); ?>" alt="" class="vv" /></a>
				</div>
			<?php endif; ?>
				<div class="details"> 
					<div class="details-inner"> 
					<?php if($text1) : ?><div class="text1"><?php echo esc_attr($text1); ?></div><?php endif; ?>
					<?php if($text2) : ?><div class="text2"><?php echo esc_attr($text2); ?></div><?php endif; ?>
					<?php if($text3) : ?><div class="text3"><?php echo esc_attr($text3); ?></div><?php endif; ?>
					<?php if($text4) : ?><div class="text4"><?php echo esc_attr($text4); ?></div><?php endif; ?>
					<?php if($button1) : ?><div class="button1 cmsbutton"><a href="<?php if($linkURL1 == ""): echo home_url( '/' ); else:?><?php echo esc_url($linkURL1); endif;?>" <?php if($window_target1 == true) echo 'target="_blank"'; ?>>						<?php echo esc_attr($button1); ?></a></div>
					<?php endif; ?>
					<?php if($button2) : ?><div class="button2 cmsbutton"><a href="<?php if($linkURL2 == ""): echo home_url( '/' ); else:?><?php echo esc_url($linkURL2); endif;?>" <?php if($window_target2 == true) echo 'target="_blank"'; ?>>						<?php echo esc_attr($button2); ?></a></div>
					<?php endif; ?>
					</div>
				</div>
		 </div>
		 </div>
		<?php
		echo balanceTags($after_widget); 				
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['window_target1'] = false;
		$instance['is_template_path'] = false;
		$instance['window_target2'] = false;
		$instance['window_target3'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		$instance['text1'] = strip_tags($new_instance['text1']);
		$instance['text2'] = strip_tags($new_instance['text2']);
		$instance['text3'] = strip_tags($new_instance['text3']);
		$instance['text4'] = strip_tags($new_instance['text4']);
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		if (isset($new_instance['window_target3'])) $instance['window_target3'] = true;
		$instance['cms_class'] = strip_tags($new_instance['cms_class']);
		$instance['imageSrc'] = strip_tags($new_instance['imageSrc']);
		$instance['button1'] = strip_tags($new_instance['button1']);
		$instance['linkURL1'] = strip_tags($new_instance['linkURL1']);
		$instance['button2'] = strip_tags($new_instance['button2']);
		$instance['linkURL2'] = strip_tags($new_instance['linkURL2']);
		$instance['bgcolor'] = strip_tags($new_instance['bgcolor']);
		$instance['imgURL'] = strip_tags($new_instance['imgURL']);
		$instance['toggle_title'] = strip_tags($new_instance['toggle_title']);
		$instance['toggle'] = strip_tags($new_instance['toggle']);
		if($is_template_path == 1):
			$imageSrc = get_template_directory_uri() . '/images/megnor/banners/' . $imageSrc; 
		endif;
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
			'cms_class' => 'sidebar-banner',
			'text1'=>'Sale', 
			'text2'=>'Save up to',
			'text3'=>'35% off', 
			'text4'=>'On all Collection', 
			'imageSrc'=>'left-banner.jpg',
			'imgURL' => '#',
			'button1'=>'shop now',
			'linkURL1'=>'#',
			'button2'=>'purchse',
			'linkURL2'=>'#',
			'bgcolor'=>'2196f3',
			'window_target1'=>true,
			'is_template_path'=>true,
			'window_target2'=>true,
			'window_target3'=>true,
			'toggle_title' => 'Offers Banners',
			'toggle' => 'on'
		) );
		$cms_class = esc_attr($instance['cms_class']);
		$text1 = esc_attr($instance['text1']);
		$text2 = esc_attr($instance['text2']);
		$text3 = esc_attr($instance['text3']);
		$text4 = esc_attr($instance['text4']);
		$button1 = esc_attr($instance['button1']);
		$linkURL1 = esc_attr($instance['linkURL1']);
		$button2 = esc_attr($instance['button2']);
		$linkURL2 = esc_attr($instance['linkURL2']);
		$bgcolor = esc_attr($instance['bgcolor']);
		$imageSrc = esc_attr($instance['imageSrc']);
		$imgURL = esc_attr($instance['imgURL']);
		$window_target1 =  esc_attr($instance['window_target1']);
		$is_template_path =  esc_attr($instance['is_template_path']);
		$window_target2 =  esc_attr($instance['window_target2']);
		$window_target3 =  esc_attr($instance['window_target3']); 
		$toggle =  esc_attr($instance['toggle']);
		$toggle_title =  esc_attr($instance['toggle_title']); 
		
	?>	
		<p><label for="<?php echo esc_attr($this->get_field_id('cms_class'));?>">Class Name:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('cms_class'));?>" name="<?php echo esc_attr($this->get_field_name('cms_class'));?>" type="text" value="<?php echo esc_attr($cms_class);?>"></input>
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('text1'));?>">Text1:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text1'));?>" name="<?php echo esc_attr($this->get_field_name('text1'));?>" type="text" value="<?php echo esc_attr($text1);?>"></input>
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('text2'));?>">Text2:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text2'));?>" name="<?php echo esc_attr($this->get_field_name('text2'));?>" type="text" value="<?php echo esc_attr($text2);?>"></input>
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('text3'));?>">Text3:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text3'));?>" name="<?php echo esc_attr($this->get_field_name('text3'));?>" type="text" value="<?php echo esc_attr($text3);?>"></input>
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('text4'));?>">Text4:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text4'));?>" name="<?php echo esc_attr($this->get_field_name('text4'));?>" type="text" value="<?php echo esc_attr($text4);?>"></input>
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('button1'));?>">button1:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button1'));?>" name="<?php echo esc_attr($this->get_field_name('button1'));?>" type="text" value="<?php echo esc_attr($button1);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('linkURL1'));?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkURL1'));?>" name="<?php echo esc_attr($this->get_field_name('linkURL1'));?>" type="text" value="<?php echo esc_attr($linkURL1);?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target1'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target1')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target1')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target1')); ?>">Open Link In New Window</label></p>	
			
		<p><label for="<?php echo esc_attr($this->get_field_id('button2'));?>">button2:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button2'));?>" name="<?php echo esc_attr($this->get_field_name('button2'));?>" type="text" value="<?php echo esc_attr($button2);?>"></input>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('linkURL2'));?>">Link URL:<br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkURL2'));?>" name="<?php echo esc_attr($this->get_field_name('linkURL2'));?>" type="text" value="<?php echo esc_attr($linkURL2);?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target2'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target2')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target2')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target2')); ?>">Open Link In New Window</label></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('bgcolor'));?>">Backgound Color:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bgcolor'));?>" name="<?php echo esc_attr($this->get_field_name('bgcolor'));?>" type="text" value="<?php echo esc_attr($bgcolor);?>"></input>
		</p>
				
		<p><label for="<?php echo esc_attr($this->get_field_id('imageSrc'));?>">Image URL:<br /></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('imageSrc'));?>" name="<?php echo esc_attr($this->get_field_name('imageSrc'));?>" type="text" value="<?php echo esc_attr($imageSrc);?>" /><br />
			<label>(e.g. right-banner1.jpg)</label><br />
			<input class="checkbox" type="checkbox" <?php checked($instance['is_template_path'], true) ?> id="<?php echo esc_attr($this->get_field_id('is_template_path')); ?>" name="<?php echo esc_attr($this->get_field_name('is_template_path')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('is_template_path')); ?>">Use Template Path for Image</label>
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id('imgURL'));?>">Image Link URL:<br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('imgURL'));?>" name="<?php echo esc_attr($this->get_field_name('imgURL'));?>" type="text" value="<?php echo esc_attr($imgURL);?>" />
		<label>(e.g. http://www.Google.com/...)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target3'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target3')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target3')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target3')); ?>">Open Link In New Window</label></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('toggle'));?>">Toggle:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('toggle'));?>" name="<?php echo esc_attr($this->get_field_name('toggle'));?>" type="text" value="<?php echo esc_attr($toggle);?>"></input>
		<label>(e.g. on / off )</label><br />
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id('toggle_title'));?>">Toggle Title:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('toggle_title'));?>" name="<?php echo esc_attr($this->get_field_name('toggle_title'));?>" type="text" value="<?php echo esc_attr($toggle_title);?>"></input>
		</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("CMSBlockWidget");'));
// end CMSBlockWidget
?>
