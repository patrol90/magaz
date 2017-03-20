<?php
/***********************************************************/
// Staff Template options
/***********************************************************/
$prefix = 'tm_staff_list_';
$TM_META_BOXES[] = array(
	'id'		=> 'tm_staff_list_columns',
	'title' 	=> esc_html__('TM - List Options', 'bigshopper'),
	'pages' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'local_images' => true,
	'fields' 	=> array(	
		// Show number of posts per page
		array(
			'name'			=> esc_html__('Number of posts per page:', 'bigshopper'),
			'id'    		=> "{$prefix}posts_per_page",
			'type'  		=> 'text',
			'std'   		=> '5',
		),
	),
	'display_on'	=> array( 'template' => array(
		'page-templates/staff-list.php',
	) ),
);
$prefix = 'tm_staff_box_';
$TM_META_BOXES[] = array(
	'id'		=> 'tm_staff_box_columns',
	'title' 	=> esc_html__('TM - Box Options', 'bigshopper'),
	'pages' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'local_images' => true,
	'fields' 	=> array(	
		// Show posts per column
		array(
			'name'    		=> esc_html__('Columns Options:', 'bigshopper'),
			'id'      		=> "{$prefix}columns",
			'type'    		=> 'radio',
			'std'			=> 'two',
			'options'		=> array(
				'two'		=> 'Two',
				'three'		=> 'Three',
				'four'		=> 'Four', 
			)
		),
		// Show number of posts per page
		array(
			'name'			=> esc_html__('Number of posts per page:', 'bigshopper'),
			'id'    		=> "{$prefix}posts_per_page",
			'type'  		=> 'text',
			'std'   		=> '5',
		),
	),
	'display_on'	=> array( 'template' => array(
		'page-templates/staff-box.php'
	) ),
);
?>