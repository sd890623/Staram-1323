<?php

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'ct_post_meta_boxes' );

if ( ! function_exists( 'ct_post_meta_boxes' ) ){
	function ct_post_meta_boxes() {
	  //layout
	  $meta_box = array(
		'id'        => 'page_layout',
		'title'     => 'Layout settings',
		'desc'      => '',
		'pages'     => array( 'post' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
			  'id'          => 'sidebar_layout',
			  'label'       => __('Sidebar','cactusthemes'),
			  'desc'        => __('Select "Default" to use settings in Theme Options','cactusthemes'),
			  'std'         => '',
			  'type'        => 'select',
			  'class'       => '',
			  'choices'     => array(
				  array(
					'value'       => 0,
					'label'       => 'Default',
					'src'         => ''
				  ),
				  array(
					'value'       => 'left',
					'label'       => 'Left',
					'src'         => ''
				  ),
				  array(
					'value'       => 'right',
					'label'       => 'Right',
					'src'         => ''
				  ),
				  array(
					'value'       => 'full',
					'label'       => 'Hidden',
					'src'         => ''
				  )
			   )
			),
			array(
			  'id'          => 'content_padding',
			  'label'       => __('Content Padding','cactusthemes'),
			  'desc'        => __('Enable default top and bottom padding for content (30px)','cactusthemes'),
			  'std'         => 'on',
			  'type'        => 'on-off',
			  'class'       => '',
			  'choices'     => array()
			),
		 )
		);
	  
	  if (function_exists('ot_register_meta_box')) {
		  ot_register_meta_box( $meta_box );
	  }
	}
}
add_action( 'admin_init', 'ct_product_meta_boxes' );

if ( ! function_exists( 'ct_product_meta_boxes' ) ){
	function ct_product_meta_boxes() {
	  //layout
	  $meta_box2 = array(
		'id'        => 'product_layout',
		'title'     => 'Layout settings',
		'desc'      => '',
		'pages'     => array( 'product' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
			  'id'          => 'product-sidebar',
			  'label'       => __('Sidebar','cactusthemes'),
			  'desc'        => __('Select "Default" to use settings in Theme Options','cactusthemes'),
			  'std'         => '',
			  'type'        => 'select',
			  'class'       => '',
			  'choices'     => array(
				  array(
					'value'       => 0,
					'label'       => 'Default',
					'src'         => ''
				  ),
				  array(
					'value'       => 'left',
					'label'       => 'Left',
					'src'         => ''
				  ),
				  array(
					'value'       => 'right',
					'label'       => 'Right',
					'src'         => ''
				  ),
				  array(
					'value'       => 'full',
					'label'       => 'Hidden',
					'src'         => ''
				  )
			   )
			),
			array(
			  'id'          => 'product-ctpadding',
			  'label'       => __('Content Padding','cactusthemes'),
			  'desc'        => __('Enable default top and bottom padding for content (30px)','cactusthemes'),
			  'std'         => 'on',
			  'type'        => 'on-off',
			  'class'       => '',
			  'choices'     => array()
			),
		 )
		);
	  
	  if (function_exists('ot_register_meta_box')) {
		  ot_register_meta_box( $meta_box2 );
	  }
	}
}
?>