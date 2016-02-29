<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => '<i class="fa fa-cogs"><!-- --></i>General'
      ),
      array(
        'id'          => 'color',
        'title'       => '<i class="fa fa-magic"><!-- --></i>Colors'
      ),
      array(
        'id'          => 'fonts',
        'title'       => '<i class="fa fa-font"><!-- --></i>Fonts'
      ),
	  array(
        'id'          => 'nav',
        'title'       => '<i class="fa fa-bars"><!-- --></i>Navigation'
      ),
      array(
        'id'          => 'single_post',
        'title'       => '<i class="fa fa-file-text-o"><!-- --></i>Single Post'
      ),
      array(
        'id'          => 'single_page',
        'title'       => '<i class="fa fa-file"><!-- --></i>Single Page'
      ),
      array(
        'id'          => 'archive',
        'title'       => '<i class="fa fa-pencil-square"><!-- --></i>Archives'
      ),
      array(
        'id'          => '404',
        'title'       => '<i class="fa fa-exclamation-triangle"><!-- --></i>404'
      ),
	  array(
        'id'          => 'woocommerce',
        'title'       => '<i class="fa fa-shopping-cart "><!-- --></i>WooCommerce'
      ),
      array(
        'id'          => 'social_account',
        'title'       => '<i class="fa fa-twitter-square"><!-- --></i>Social Accounts'
      ),
      array(
        'id'          => 'social_share',
        'title'       => '<i class="fa fa-share-square"><!-- --></i>Social Sharing'
      ),
      array(
        'id'          => 'theme_update',
        'title'       => '<i class="fa fa-cloud-download"><!-- --></i>Theme Update'
      )
    ),
    'settings'        => array( 
	   array(
        'id'          => 'enable_search',
        'label'       => 'Enable Search',
        'desc'        => 'Enable or disable default search form in every pages',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'echo_meta_tags',
        'label'       => 'SEO - Echo Meta Tags',
        'desc'        => 'By default, University generates its own SEO meta tags (for example: Facebook Meta Tags). If you are using another SEO plugin like YOAST or a Facebook plugin, you can turn off this option',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),  
	  array(
        'id'          => 'copyright',
        'label'       => 'Copyright Text',
        'desc'        => 'Appear in footer',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_to_left',
        'label'       => 'RTL mode',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Enable RTL',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Enter custom CSS. Ex: <i>.class{ font-size: 13px; }</i>',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'google_analytics_code',
        'label'       => 'Custom Code',
        'desc'        => 'Enter custom code or JS code here. For example, enter Google Analytics',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload favicon (.ico)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo_image',
        'label'       => 'Logo Image',
        'desc'        => 'Upload your logo image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'retina_logo',
        'label'       => 'Retina Logo (optional)',
        'desc'        => 'Retina logo should be two time bigger than the custom logo. Retina Logo is optional, use this setting if you want to strictly support retina devices.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'login_logo',
        'label'       => 'Login Logo Image',
        'desc'        => 'Upload your Admin Login logo image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
	  array(
        'id'          => 'off_gototop',
        'label'       => 'Scroll Top button',
        'desc'        => 'Enable Scroll Top button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),  
	  array(
        'id'          => 'pre-loading',
        'label'       => 'Pre-loading Effect',
        'desc'        => 'Enable Pre-loading Effect',
        'std'         => '2',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
		'choices'     => array( 
          array(
            'value'       => '-1',
            'label'       => 'Disable',
            'src'         => ''
          ),
		  array(
            'value'       => '1',
            'label'       => 'Enable',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => 'Enable for Homepage Only',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'loading_bg',
        'label'       => 'Pre-Loading Background Color',
        'desc'        => 'Default is Black',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
      ),
      array(
        'id'          => 'loading_spin_color',
        'label'       => 'Pre-Loading Spinners Color',
        'desc'        => 'Default is White',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
      ),
	  
	  array(
        'id'          => 'shortcode_datetime_format',
        'label'       => 'DateTime format for shortcode',
        'desc'        => 'DateTime format for items in shortcodes',
        'std'         => '2',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
		'choices'     => array( 
          array(
            'value'       => 'MM/DD',
            'label'       => 'MM/DD',
            'src'         => ''
          ),
		  array(
            'value'       => 'DD/MM',
            'label'       => 'DD/MM',
            'src'         => ''
          ),
		  array(
            'value'       => 'YYYY/MM/DD',
            'label'       => 'YYYY/MM/DD',
            'src'         => ''
          ),
		  array(
            'value'       => 'YYYY/DD/MM',
            'label'       => 'YYYY/DD/MM',
            'src'         => ''
          ),
		  array(
            'value'       => 'MM/DD/YYYY',
            'label'       => 'MM/DD/YYYY',
            'src'         => ''
          ),
		  array(
            'value'       => 'DD/MM/YYYY',
            'label'       => 'DD/MM/YYYY',
            'src'         => ''
          ),
        ),
      ),
	  
	  //color
      array(
        'id'          => 'main_color_1',
        'label'       => 'Main color 1',
        'desc'        => 'Choose Main color 1 (Default is light blue #46a5e5)',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'main_color_2',
        'label'       => 'Main color 2',
        'desc'        => 'Choose Main color 2 (Default is dark blue #17376e)',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_bg',
        'label'       => 'Footer Background Color',
        'desc'        => 'Choose Footer background color (Default is Main color 2)',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  //font
      array(
        'id'          => 'main_font',
        'label'       => 'Main Font Family',
        'desc'        => 'Enter font-family name here. <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a> are supported. For example, if you choose "Source Code Pro" Google Font with font-weight 400,500,600, enter <i>Source Code Pro:400,500,600</i>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'heading_font',
        'label'       => 'Heading Font Family',
        'desc'        => 'Enter font-family name here. <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a> are supported. For example, if you choose "Source Code Pro" Google Font with font-weight 400,500,600, enter <i>Source Code Pro:400,500,600</i> (Only few heading texts are affected)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'main_size',
        'label'       => 'Main Font Size',
        'desc'        => 'Select base font size (px)',
        'std'         => '13',
        'type'        => 'numeric-slider',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '10,18,1',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_font_1',
        'label'       => 'Upload Custom Font 1',
        'desc'        => 'Upload your own font and enter name "custom-font-1" in "Main Font Family" or "Heading Font Family" setting above',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'custom_font_2',
        'label'       => 'Upload Custom Font 2',
        'desc'        => 'Upload your own font and enter name "custom-font-2" in "Main Font Family" or "Heading Font Family" setting above',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
		'id'          => 'letter_spacing',
        'label'       => 'Content Letter Spacing',
        'desc'        => 'Ex: 2px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
		'id'          => 'letter_spacing_heading',
        'label'       => 'Heading Letter Spacing',
        'desc'        => 'Ex: 2px',
        'std'         => '0',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'nav_style',
        'label'       => 'Style',
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'nav',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Style 1 (Default)',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => 'Style 2',
            'src'         => ''
          ),
		  array(
            'value'       => '3',
            'label'       => 'Style 3',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'nav_callout_text',
        'label'       => 'Callout Text',
        'desc'        => 'Display on Main Navigation, used with Style 3',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'nav',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'nav_sticky',
        'label'       => 'Sticky Menu',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'nav',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => 'No',
            'src'         => ''
          ),
          array(
            'value'       => '1',
            'label'       => 'Dark',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => 'Light',
            'src'         => ''
          ),
        ),
      ),
	  
	  array(
        'id'          => 'nav_logo_sticky',
        'label'       => 'Sticky Menu Layout ',
        'desc'        => 'Select: Use Logo | Only Menu',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'nav',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Only Menu',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => 'Use Logo',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'logo_image_sticky',
        'label'       => __('Logo Image For Sticky Menu','cactusthemes'),
        'desc'        => __('Upload your logo image for sticky menu','cactusthemes'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'nav',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'nav_logo_sticky:is(2)',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'post_layout',
        'label'       => 'Sidebar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Sidebar Right',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Sidebar Left',
            'src'         => ''
          ),
		  array(
            'value'       => 'full',
            'label'       => 'Hidden',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'enable_author',
        'label'       => 'Author',
        'desc'        => 'Enable Author info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'enable_author_info',
        'label'       => 'About Author',
        'desc'        => 'Enable About Author info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'single_published_date',
        'label'       => 'Published Date',
        'desc'        => 'Enable Published Date info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	
	  array(
        'id'          => 'single_categories',
        'label'       => 'Categories',
        'desc'        => 'Enable Categories info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	
	  array(
        'id'          => 'single_tags',
        'label'       => 'Tags',
        'desc'        => 'Enable Categories info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'single_cm_count',
        'label'       => 'Comment Count',
        'desc'        => 'Enable Comment Count Info',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  array(
        'id'          => 'single_navi',
        'label'       => 'Post Navigation',
        'desc'        => 'Enable Post Navigation',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	  

      array(
        'id'          => 'page_layout',
        'label'       => 'Sidebar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'single_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'full',
            'label'       => 'Hidden',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'archive_sidebar',
        'label'       => 'Sidebar',
        'desc'        => 'Select Sidebar position for Archive pages',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'archive',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Right',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left',
            'src'         => ''
          ),
          array(
            'value'       => 'full',
            'label'       => 'Hidden',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'page404_title',
        'label'       => 'Page Title',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '404',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'page404_content',
        'label'       => 'Page Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => '404',
        'rows'        => '8',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'page404_search',
        'label'       => 'Search Form',
        'desc'        => 'Enable Search Form in 404 page',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => '404',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	     array(
        'id'          => 'woocommerce_layout',
        'label'       => 'Product Page Layout',
        'desc'        => 'Select default layout of single product pages',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'full',
            'label'       => 'No Sidebar',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'woo_per_page',
        'label'       => 'Posts per page',
        'desc'        => 'Enter number',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'woocommerce',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
      array(
        'id'          => 'acc_facebook',
        'label'       => 'Facebook',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_twitter',
        'label'       => 'Twitter',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_linkedin',
        'label'       => 'LinkedIn',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_tumblr',
        'label'       => 'Tumblr',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_google-plus',
        'label'       => 'Google Plus',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_pinterest',
        'label'       => 'Pinterest',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_youtube',
        'label'       => 'Youtube',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'acc_flickr',
        'label'       => 'Flickr',
        'desc'        => 'Enter full link to your account (including http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
			'label'       => 'Custom Social Account',
			'id'          => 'custom_acc',
			'type'        => 'list-item',
			'class'       => '',
			'section'     => 'social_account',
			'desc'        => 'Add Social Account',
			'choices'     => array(),
			'settings'    => array(
				 array(
					'label'       => 'Icon Font Awesome',
					'id'          => 'icon',
					'type'        => 'text',
					'desc'        => 'Enter Font Awesome class (Ex: fa-facebook)',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => ''
				 ),
				 array(
					'label'       => 'URL',
					'id'          => 'link',
					'type'        => 'text',
					'desc'        => 'Enter full link to your account (including http://)',
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => ''
				 ),
			)
	  ),
	  array(
        'id'          => 'social_link_open',
        'label'       => 'Open Social link in new tab?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_account',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_facebook',
        'label'       => 'Facebook Share',
        'desc'        => 'Enable Facebook Share button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_twitter',
        'label'       => 'Twitter Share',
        'desc'        => 'Enable Twitter Tweet button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_linkedin',
        'label'       => 'LinkedIn Share',
        'desc'        => 'Enable LinkedIn Share button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_tumblr',
        'label'       => 'Tumblr Share',
        'desc'        => 'Enable Tumblr Share button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_google_plus',
        'label'       => 'Google+ Share',
        'desc'        => 'Enable Google+ Share button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_pinterest',
        'label'       => 'Pinterest Share',
        'desc'        => 'Enable Pinterest Pin button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'share_email',
        'label'       => 'Email Share',
        'desc'        => 'Enable Email button',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
	  //scroll
	  array(
        'id'          => 'nice-scroll',
        'label'       => 'Enable Smooth Scroll Effect',
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'general',
        'min_max_step'=> '',
      ),
	  //update
      array(
        'id'          => 'envato_username',
        'label'       => 'Envato Username',
        'desc'        => 'Enter your Envato username',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'theme_update',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'envato_api',
        'label'       => 'Envato API',
        'desc'        => 'Enter your Envato API. You can find your API under in Profile page &gt; My Settings &gt; API Keys',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'theme_update',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'envato_auto_update',
        'label'       => 'Allow Auto Update',
        'desc'        => 'Allow Auto Update or Not. If not, you can go to Appearance &gt; Themes and click on Update link',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'theme_update',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),  
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}