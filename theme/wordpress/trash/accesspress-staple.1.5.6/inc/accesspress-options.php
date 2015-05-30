<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {

	// Change this to use your theme slug
	return 'accesspress-staple';
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
    // Webpage Type
	$webpage_layout = array(
		'fullwidth' => __('FullWidth', 'accesspress-staple'),
		'boxed' => __('Boxed', 'accesspress-staple')
	);
    
	$archive_layout = array(
		'grid' => __('Grid', 'accesspress-staple'),
		'list' => __('List', 'accesspress-staple')
	);
    
    $logo_alignment = array(
		'left' => __('Left', 'accesspress-staple'),
		'right' => __('Right', 'accesspress-staple'),
        'center' => __('Center', 'accesspress-staple')
	);
    
    $slider_show = array(
        'single_post_slider'=> __('Single Post as Slider', 'accesspress-staple'),
        'category_post_slider'=>__('Category Posts as slider', 'accesspress-staple'));
        
    $header_type = array(
        'transparent'=>__('Transparent', 'accesspress-staple'),
        'classic'=>__('Classic', 'accesspress-staple'));
    
    $options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = 'Select a Category:';
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
    
   $options_pages = array();
	$options_pages_obj = get_posts('posts_per_page=-1');
	$options_pages[''] = 'Select a Post:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

    $options_page = array();
    $options_page_obj = get_pages('posts_per_page=-1');
    $options_page[''] = 'Select a Page:';
    foreach ($options_page_obj as $page) {
        $options_page[$page->ID] = $page->post_title;
    }

    $show_pager = array(
        'yes'=> __('Yes', 'accesspress-staple'),
        'no'=>__('No', 'accesspress-staple'));
    
    $show_controls = array(
        'yes'=> __('Yes', 'accesspress-staple'),
        'no'=>__('No', 'accesspress-staple'));
    
    $slider_transition = array(
		'fade' => __('Fade', 'accesspress-staple'),
		'horizontal' => __('Slide Horizontal', 'accesspress-staple'),
		'vertical' => __('Slide Vertical', 'accesspress-staple'));
        
    $slider_auto_transition = array(
        'yes'=>__('Yes', 'accesspress-staple'),
        'no'=>__('No', 'accesspress-staple')
        );
    $show_caption = array(
        'show'=>__('Show', 'accesspress-staple'),
        'hide'=>__('Hide', 'accesspress-staple'));
        
    $client_slider = array(
        'static'=>__('Static', 'accesspress-staple'),
        'scroll'=>__('Scroll', 'accesspress-staple'));
        
    
   $theme = wp_get_theme();

	$about_content = '<div class="about-accesspress">
          <img src="'.esc_url($theme->get_screenshot()).'" /><br/>'
          .$theme->get('Description').
          '<br/><br/>
          <a class="button" target="_blank" href="'.esc_url('https://accesspressthemes.com/accesspress-staple-documentation/').'">'. __('View Documentaion','accesspress-staple').'</a>
          <a class="button" target="_blank" href="'.esc_url('https://accesspressthemes.com/accesspress-staple').'">'.__('View Demo','accesspress-staple').'</a>
        </div>';
    $for_support =  '<div class="has-padding">'. __("Forum:","accesspress-staple").' <a target="_blank" href="'. esc_url("http://accesspressthemes.com/support").'">accesspressthemes.com/support</a><br/></div>';
	$for_customization = '<div class="has-padding">'. __('We offer WordPress Themes/Plugins development, customization, design integration, WordPress setup, fixes etc.','accesspress-staple').'<br/>'
        .__('Email:','accesspress-staple').' <a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a></div>';
    $about_accesspress_themes = '<div class="about-access">AccessPress Themes is an online WordPress themes store, that provides beautiful and useful themes. All of our themes are crafted with our years of experience. Our theme don&#146;t lack the basics and don&#146;t have a lot of non-sense features which you might never use. AccessPress Themes has beautiful and elegant, fully responsive, multipurpose themes to meet your need for free and premium basis. Our themes have bunch of easily customizable options and features, someone with no programming knowledge can use our easy theme options panel and configure/setup the theme as needed.</div>';        
    $from_accesspress_thems = '<div class="accesspressthemes-products"><div class="ap-themes">
        <a target="_blank" href="https://accesspressthemes.com/themes/">
        <div class="ap-themes-img">
        <img src="'.get_template_directory_uri().'/inc/options-framework/images/wordpress-themes.png">
        <span>'.__('View all Themes','accesspress-staple').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Themes','accesspress-staple'). 
        '</a>
        </div>';

    $from_accesspress_thems .= '<div class="ap-plugins">
        <a target="_blank" href="https://accesspressthemes.com/plugins/">
        <div class="ap-themes-img">
        <img src="'.get_template_directory_uri().'/inc/options-framework/images/wordpress-plugins.png">
        <span>'. __('View all Plugins','accesspress-staple').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Plugins','accesspress-staple').  
        '</a>
        </div>';

    $from_accesspress_thems .= '<div class="ap-customization">
        <a target="_blank" href="https://accesspressthemes.com/request-customization/">
        <div class="ap-themes-img">
        <img src="'. get_template_directory_uri().'/inc/options-framework/images/wordpress-customization.png">
        <span>'. __('Request Customization','accesspress-staple').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Customization','accesspress-staple').  
        '</a>
        </div></div>';
    
    
    
	
    
/** ************************************************ Basic Setting Section ********************************************************/
    $options[] = array(
        'name'=> __('Basic Setting', 'accesspress-staple'),
        'type'=> 'heading');
    
    $options[] = array(
        'name'=> __('Web Page Layout', 'accesspress-staple'),
        'id'=> 'webpage_layout',
        'std'=>'fullwidth',
        'type'=>'radio',
        'options'=> $webpage_layout);
    
    $options[] = array(
        'name'=> __('Upload Favicon', 'accesspress-staple'),
        'id'=>'favicon',
        'std'=>'',
        'class'=>'sub-option',
        'type'=>'upload');        
    
    $options[] = array(
        'name'=>'Upload Logo', 'accesspress-staple',
        'id'=>'logo',
        'std'=>'',
        'class'=>'sub-option',
        'type'=>'upload');
        
     $options[] = array(
        'name'=>__('Copyright Footer Text', 'accesspress-staple'),
        'id'=>'copyright',
        'std'=>'AccessPress Staple',
        'type'=>'text');
    
        
 /** -----------------------------------------------------------Basic Seccting Section Ends here-----------------------------------------------**/
 
 /** -----------------------------------------------------------Header Seccting Section Start here-----------------------------------------------**/
 
     $options[] = array(
        'name'=>__('Header Setting', 'accesspress-staple'),
        'type'=>'heading');
        
     $options[] = array(
        'name'=>__('Header Type', 'accesspress-staple'),
        'id'=>'header_type',
        'std'=>'transparent',
        'type'=>'radio',
        'options'=>$header_type);
        
      $options[] = array(
        'name'=> __('Show Search in Header', 'accesspress-staple'),
        'desc'=> __('Click here to Show or Hide Search in Header',  'accesspress-staple'),
        'id'=>'show_search',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Show',
        'off'=>'Hide');
        
     $options[] = array(
        'name'=>__('Search PlaceHolder Text', 'accesspress-staple'),
        'id'=>'search_placeholder',
        'std'=>'Search...',
        'type'=>'text');
 
    $options[] = array(
        'name'=>__('Search Button Text', 'accesspress-staple'),
        'id'=>'search_button',
        'std'=>'Search',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('Logo Alignment', 'accesspress-staple'),
        'id'=>'logo_alignment',
        'std'=>'left',
        'type'=>'select',
        'options'=>$logo_alignment);
        
    
 
 /** -----------------------------------------------------Header Setting Section End Here --------------------------------------------**/
 
 /** -----------------------------------------------------Home Setting Section Start Here --------------------------------------------**/
    $options[] = array(
        'name'=>__('Home Page Setting', 'accesspress-staple'),
        'type'=>'heading');
        
    $options[] = array(
        'name'=>__('About Section', 'accesspress-staple'),
        'type'=>'header');
    
    $options[] = array(
        'name'=>__('Enable About Section', 'accesspress-staple'),
        'id'=>'enable_about',
        'desc'=>'Click here to enable',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
    $options[] = array(
        'name'=>__('Select the Post to show About Section', 'accesspress-staple'),
        'id'=>'about_section',
        'type'=>'select',
        'std'=>'',
        'options'=>$options_pages);
        
    $options[] = array(
        'name'=>__('About View More Text', 'accesspress-staple'),
        'id'=>'about_view_more',
        'std'=>'Details',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('Feature Section', 'accesspress-staple'),
        'type'=>'header');
    
      $options[] = array(
        'name'=>__('Enable Feature Section', 'accesspress-staple'),
        'id'=>'enable_feature',
        'desc'=>'Click here to Enable or Disable Feature Section',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable'); 
        
     $options[] = array(
        'name'=>__('Feature Section Title', 'accesspress-staple'),
        'id'=>'feature_title',
        'std'=>'Our Services',
        'type'=>'text');
     
     $options[] = array(
        'name'=>__('Feature Section Description', 'accesspress-staple'),
        'id'=>'feature_desc',
        'std'=>'',
        'type'=>'editor');
     
     $options[] = array(
        'name'=>__('Select the Category to show Feature Section', 'accesspress-staple'),
        'id'=>'feature_section',
        'type'=>'select',
        'std'=>'',
        'options'=>$options_categories);
        
     $options[] = array(
        'name'=>__('Display Button for Category Page', 'accesspress-staple'),
        'id'=>'feature_more',
        'desc'=>'Click here to enable',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Button Text', 'accesspress-staple'),
        'id'=>'feature_more_text',
        'std'=>'View More',
        'type'=>'text'); 
        
     $options[] = array(
        'name'=>__('Awesome Features Section', 'accesspress-staple'),
        'type'=>'header');
               
     $options[] = array(
        'name'=>__('Enable Awesome Feature Section', 'accesspress-staple'),
        'id'=>'enable_awesome_feature',
        'desc'=>'Click here to enable',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable'); 
        
     $options[] = array(
        'name'=>__('Feature Section Title', 'accesspress-staple'),
        'id'=>'feature_awesome_title',
        'std'=>'Awesome Feature',
        'type'=>'text');
     
     $options[] = array(
        'name'=>__('Feature Section Description', 'accesspress-staple'),
        'id'=>'feature_awesome_desc',
        'std'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, aliquet nec, vulputate eget, arcu. In enim justo.',
        'type'=>'editor');
     
     $options[] = array(
        'name'=>__('Select the Category to show Awesome Feature Section', 'accesspress-staple'),
        'id'=>'feature_awesome_section',
        'type'=>'select',
        'std'=>'',
        'options'=>$options_categories);
        
     $options[] = array(
        'name'=>__('Display Button for Category Page', 'accesspress-staple'),
        'id'=>'awesome_feature_more',
        'desc'=>'Click here to enable',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Button Text', 'accesspress-staple'),
        'id'=>'awesome_feature_more_text',
        'std'=>'View More',
        'type'=>'text');
        
     
        
     $options[] = array(
        'name'=>__('Portfolio Section', 'accesspress-staple'),
        'type'=>'header');
        
     $options[] = array(
        'name'=>__('Enable Portfolio Section', 'accesspress-staple'),
        'id'=>'enable_portfolio',
        'desc'=>'Click here to enable',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable'); 
        
     $options[] = array(
        'name'=>__('Portfolio Section Title', 'accesspress-staple'),
        'id'=>'portfolio_title',
        'std'=>'Awesome Feature',
        'type'=>'text');
     
     $options[] = array(
        'name'=>__('Portfolio Section Description', 'accesspress-staple'),
        'id'=>'portfolio_desc',
        'std'=>'',
        'type'=>'editor');
     
     $options[] = array(
        'name'=>__('Select the Category to show Portfolio Section', 'accesspress-staple'),
        'id'=>'portfolio_section',
        'type'=>'select',
        'std'=>'',
        'options'=>$options_categories);
        
     $options[] = array(
        'name'=>__('Client Logo Section', 'accesspress-staple'),
        'type'=>'header');
     
     $options[] = array(
        'name'=>__('Enable Client Logo Section', 'accesspress-staple'),
        'id'=>'enable_client',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
     
     $options[] = array(
        'name'=>__('View Type', 'accesspress-staple'),
        'id'=>'view_type_clients',
        'std'=>'static',
        'type'=>'radio',
        'options'=>$client_slider);
     
     $options[] = array(
        'name'=>__('Clients Title', 'accesspress-staple'),
        'id'=>'client_title',
        'std'=>'Our Clients',
        'type'=>'text');
     
     $options[] = array(
        'name'=>__('Clients Desription', 'accesspress-staple'),
        'id'=>'client_desc',
        'std'=>'Our Clients',
        'type'=>'editor');
     
     
        
     $options[] = array(
        'name'=> __('Call To Action', 'accesspress-staple'),
        'type'=>'header');
        
     $options[] = array(
        'name'=>__('Enable Call To Action', 'accesspress-staple'),
        'id'=>'enable_call_to_action',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Call To Action Title', 'accesspress-staple'),
        'id'=>'call_to_action_title',
        'std'=>'About Access Press Agency',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Call To Action Description','accesspress-staple'),
        'id'=>'call_to_action_desc',
        'std'=>'',
        'type'=>'editor');
        
     $options[] = array(
        'name'=>__('Read More Text', 'accesspress-staple'),
        'id'=>'call_to_action_more_text',
        'std'=>'Start Trial',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Read More Link', 'accesspress-staple'),
        'id'=>'call_to_action_more_link',
        'std'=>'',
        'type'=>'url');
     
     $options[] = array(
        'name'=>__('Background Image for Call to Action', 'accesspress-staple'),
        'id'=>'call_to_action_bg',
        'type'=>'upload',
        'class'=>'sub-option');
        
     $options[] = array(
        'name'=>__('Team Member Section', 'accesspress-staple'),
        'type'=>'header');
    
    $options[] = array(
        'name'=>__('Enable Team Member Section', 'accesspress-staple'),
        'id'=>'enable_team_member',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
    $options[] = array(
        'name'=>__('Team Member Title'),
        'id'=>'team_member_title',
        'std'=>'',
        'type'=>'text');
    
    $options[] = array(
        'name'=>__('Category For Team Member', 'accesspress-staple'),
        'id'=>'team_member_category',
        'type'=>'select',
        'options'=>$options_categories);
        
    $options[] = array(
        'name'=>__('Stat Counter','accesspress-staple'),
        'type'=>'header');
        
     $options[] = array(
        'name'=>__('Enable Stat Counter', 'accesspress-staple'),
        'id'=>'enable_stat_counter',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Stat Counter Title', 'accesspress-staple'),
        'id'=>'stat_counter_title',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Stat Counter Description', 'accesspress-staple'),
        'id'=>'stat_counter_desc',
        'std'=>'',
        'type'=>'editor');
       
     $options[] = array(
        'name'=>__('Counter 1', 'accesspress-staple'),
        'type'=>'info',
        );
        
     $options[] = array(
        'name'=>__('Enable Stat Counter 1'),
        'id'=>'enable_stat_counter1',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Title', 'accesspress-staple'),
        'id'=>'counter1_text',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Number','accesspress-staple'),
        'id'=>'counter1_numeric',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Font Awesome text','accesspress-staple'),
        'id'=>'counter1_font_awesome',
        'std'=>'',
        'desc'=>'Please put Font Aawesome Code like fa-bell, Please go to <a href="">Font Awesome Website</a>',
        'type'=>'text');
     
     $options[] = array(
        'name'=>__('Counter 2', 'accesspress-staple'),
        'type'=>'info',
        );
        
     $options[] = array(
        'name'=>__('Enable Stat Counter 2'),
        'id'=>'enable_stat_counter2',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Title', 'accesspress-staple'),
        'id'=>'counter2_text',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Number','accesspress-staple'),
        'id'=>'counter2_numeric',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Font Awesome text','accesspress-staple'),
        'id'=>'counter2_font_awesome',
        'std'=>'',
        'desc'=>'Please put Font Aawesome Code like fa-bell',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('Counter 3', 'accesspress-staple'),
        'type'=>'info',
        );
        
     $options[] = array(
        'name'=>__('Enable Stat Counter 3'),
        'id'=>'enable_stat_counter3',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Title', 'accesspress-staple'),
        'id'=>'counter3_text',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Number','accesspress-staple'),
        'id'=>'counter3_numeric',
        'std'=>'',
        'type'=>'text'); 
     
     $options[] = array(
        'name'=>__('Font Awesome text','accesspress-staple'),
        'id'=>'counter3_font_awesome',
        'std'=>'',
        'desc'=>'Please put Font Aawesome Code like fa-bell',
        'type'=>'text');
        
      $options[] = array(
        'name'=>__('Counter 4', 'accesspress-staple'),
        'type'=>'info',
        );
        
     $options[] = array(
        'name'=>__('Enable Stat Counter 4'),
        'id'=>'enable_stat_counter4',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Title', 'accesspress-staple'),
        'id'=>'counter4_text',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Number','accesspress-staple'),
        'id'=>'counter4_numeric',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Font Awesome text','accesspress-staple'),
        'id'=>'counter4_font_awesome',
        'std'=>'',
        'desc'=>'Please put Font Aawesome Code like fa-bell',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Blog Section','accesspress-staple'),
        'type'=>'header');
        
     $options[] = array(
        'name'=>__('Enable Blog Section', 'accesspress-staple'),
        'id'=>'enable_blog',
        'std'=>'1',
        'desc'=>'Click here to enable',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
     $options[] = array(
        'name'=>__('Blog Title', 'accesspress-staple'),
        'id'=>'blog_title',
        'std'=>'',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Blog Description', 'accesspress-staple'),
        'id'=>'blog_desc',
        'std'=>'',
        'type'=>'editor');
      
     $options[] = array(
        'name'=>__('Read More Text for Single Page', 'accesspress-staple'),
        'id'=>'blog_more_text_single',
        'std'=>'Details',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Select Category to show Blog Section', 'accesspress-staple'),
        'id'=>'blog',
        'type'=>'select',
        'std'=>'',
        'options'=>$options_categories);
           
      $options[] = array(
        'name'=>__('Display Button for Category Page', 'accesspress-staple'),
        'id'=>'enable_blog_more',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
      
       $options[] = array(
        'name'=>__('Button Text', 'accesspress-staple'),
        'id'=>'blog_more_text',
        'std'=>'Details',
        'type'=>'text');
    
    $options[] = array(
        'name'=>__('Testimonails Section', 'accesspress-staple'),
        'type'=>'header');
    
    $options[] = array(
        'name'=>__('Enable Testimonial Section', 'accesspress-staple'),
        'id'=>'enable_testomonial',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
    $options[] = array(
        'name'=>__('Testimonial Title'),
        'id'=>'testomonial_title',
        'std'=>'',
        'type'=>'text');
    
    $options[] = array(
        'name'=>__('Category For Testimonial', 'accesspress-staple'),
        'id'=>'testomonial_category',
        'type'=>'select',
        'options'=>$options_categories);
        
    $options[] = array(
        'name'=>__('Latest Post', 'accesspress-staple'),
        'type'=>'header');
    
    $options[] = array(
        'name'=>__('Enable Latest Post Section', 'accesspress-staple'),
        'id'=>'enable_posts',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
        
    $options[] = array(
        'name'=>__('ReadMore text for Latest Post', 'accesspress-staple'),
        'type'=>'text',
        'id'    =>'rm_lp',
        'std'=>__('Read More', 'accesspress-staple'),  );
        
    $options[] = array(
        'type'=>'div',
        'id'=>'div1');
    $options[] = array(
        'type'=>'div',
        'id'=>'div2');    
    
     
     
     
/** ------------------------------------------------------Home Setting Section Ends Here --------------------------------------- **/

 /** ------------------------------------------------------Pricing Table Section Starts Here --------------------------------- *
*/
    $options[] = array(
        'name'=>__('Pricing Table Settings', 'accesspress-staple'),
        'type'=>'heading');
    
    $options[] = array(
        'name'=>__('Enable Pricing Table in Home Page', 'accesspress-staple'),
        'id'=>'enable_pricing',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
       
    $options[] = array(
        'name'=>__('Pricing Table Title', 'accesspress-staple'),
        'id'=>'pricing_table_title',
        'std'=>'Pricing Table',
        'type'=>'text');
      
    $options[] = array(
        'name'=>__('Pricing Table Description', 'accesspress-staple'),
        'id'=>'pricing_table_desc',
        'std'=>'Lorem Ipsum about Pricing Table is shown below',
        'type'=>'editor');
         
    $options[] = array(
        'name'=>__('Table 1', 'accesspress-staple'),
        'type'=>'info');
        
     $options[] = array(
        'name'=>__('Table Content and Title', 'accesspress-staple'),
        'id'=>'table1_desc',
        'std'=>'',
        'type'=>'select',
        'options'=>$options_page);

    $options[] = array(
        'name'=>'Currency Unit', 'accesspress-staple',
        'id'=>'table1_price_unit',
        'std'=>'$',
        'type'=>'text');
        
    $options[] = array(
        'name'=>'Price', 'accesspress-staple',
        'id'=>'table1_price',
        'std'=>'100',
        'type'=>'text');
  
    $options[] = array(
        'name'=>__('More Link Text', 'accesspress-staple'),
        'id'=>'table1_more_text',
        'std'=>'Start Trail',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('More Link(URL)', 'accesspress-staple'),
        'id'=>'table1_more_link',
        'std'=>'',
        'type'=>'url');

    $options[] = array(
        'name'=>__('Table 2', 'accesspress-staple'),
        'type'=>'info');
        
    $options[] = array(
        'name'=>__('Table Content and Title', 'accesspress-staple'),
        'id'=>'table2_desc',
        'std'=>'',
        'type'=>'select',
        'options'=>$options_page);
        
    $options[] = array(
        'name'=>'Currency Unit', 'accesspress-staple',
        'id'=>'table2_price_unit',
        'std'=>'$',
        'type'=>'text');
        
    $options[] = array(
        'name'=>'Price', 'accesspress-staple',
        'id'=>'table2_price',
        'std'=>'100',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('More Link Text', 'accesspress-staple'),
        'id'=>'table2_more_text',
        'std'=>'Start Trail',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('More Link(URL)', 'accesspress-staple'),
        'id'=>'table2_more_link',
        'std'=>'',
        'type'=>'url');

 
     $options[] = array(
        'name'=>__('Table 3', 'accesspress-staple'),
        'type'=>'info');
   
    $options[] = array(
        'name'=>__('Table Content and Title', 'accesspress-staple'),
        'id'=>'table3_desc',
        'std'=>'',
        'type'=>'select',
        'options'=>$options_page);
        
    $options[] = array(
        'name'=>'Currency Unit', 'accesspress-staple',
        'id'=>'table3_price_unit',
        'std'=>'$',
        'type'=>'text');
        
    $options[] = array(
        'name'=>'Price', 'accesspress-staple',
        'id'=>'table3_price',
        'std'=>'100',
        'type'=>'text');
        
       
    $options[] = array(
        'name'=>__('More Link Text', 'accesspress-staple'),
        'id'=>'table3_more_text',
        'std'=>'Start Trail',
        'type'=>'text');
        
    $options[] = array(
        'name'=>__('More Link(URL)', 'accesspress-staple'),
        'id'=>'table3_more_link',
        'std'=>'',
        'type'=>'url');
    
 /** -------------------------------------------------------Pricing Table Section Ends here-------------------------------------------**/
 
 /** --------------------------------------------------------------------Slider Section-----------------------------------------------**/
    
    $options[] = array(
        'name'=>__('Slider Setting', 'accesspress-staple'),
        'type'=>'heading');
    
    $options[] = array(
        'name'=>__('Enable Slider', 'accesspress-staple'),
        'id'=>'enable_slider',
        'desc'=>'Click here to Enable Slider',
        'std'=>'1',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
 
    if($options_categories){
    $options[] = array(
        'name'=> __('Choose the category to show in Slider', 'accesspress-staple'),
        'id'=>'cagegory_as_slider',
        'type'=>'select',
        'options'=>$options_categories);   
   }
   
   $options[] = array(
        'name'=>__('Slider Button Text', 'accesspress-staple'),
        'id'=>'slider_button_text',
        'std'=>'Details',
        'type'=>'text');
   
   $options[] = array(
        'name'=>__('Show Pager (Navigation Dot)', 'accesspress-staple'),
        'id'=>'show_pager',
        'std'=>'yes',
        'type'=>'radio',
        'options'=>$show_pager);
        
   $options[] = array(
        'name'=>__('Show Controls', 'accesspress-staple'),
        'id'=>'show_controls',
        'std'=>'yes',
        'type'=>'radio',
        'options'=>$show_controls);
    
    $options[] = array(
        'name'=> __('Slider Transition (Fade/Slide)', 'accesspress-staple'),
        'id'=>'slider_transition',
        'std'=>'fade',
        'type'=>'select',
        'options'=>$slider_transition);
    
    $options[] = array(
        'name'=> __('Slider auto Transactions', 'accesspress-staple'),
        'id'=>'slider_auto_transaction',
        'std'=>'yes',
        'type'=>'radio',
        'options'=>$slider_auto_transition);
        
    $options[] = array(
        'name'=>__('Slider Speed', 'accesspress-staple'),
        'id'=>'slider_speed',
        'std'=>'5000',
        'type'=>'text');
        
     $options[] = array(
        'name'=>__('Slider Pause', 'accesspress-staple'),
        'id'=>'slider_pause',
        'std'=>'5000',
        'type'=>'text');                
        
    $options[] = array(
        'name'=>__('Show Slider Caption','accesspress-staple'),
        'id'=>'show_slider_caption',
        'std'=>'show',
        'type'=>'radio',
        'options'=>$show_caption);
    
/** -----------------------------------------------------Slider Section End Here ------------------------------------------------- **/


/** ------------------------------------------------------Social Links Start Here --------------------------------------- **/
    $options[] = array(
        'name'=>__('Social Setting', 'accesspress-staple'),
        'type'=>'heading');
    
    $options[] = array(
        'name'=>__('Disable Social Icon in header', 'accesspress-staple'),
        'id'=>'social_footer_header',
        'std'=>'1',
        'desc'=>'Click here to disable',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
    
    $options[] = array(
        'name'=>__('Disable Social Icon in footer', 'accesspress-staple'),
        'id'=>'social_footer',
        'desc'=>'Click here to disable',
        'std'=>'0',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
    
    $options[] = array(
        'name'=>__('Facebook', 'accesspress-staple'),
        'id'=>'facebook',
        'type'=>'url');
    
    $options[] = array(
        'name'=>__('Twitter', 'accesspress-staple'),
        'id'=>'twitter',
        'type'=>'url');
    
    $options[] = array(
        'name'=>__('Google Plus', 'accesspress-staple'),
        'id'=>'google_plus',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Youtube', 'accesspress-staple'),
        'id'=>'youtube',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Pinterest', 'accesspress-staple'),
        'id'=>'pinterest',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Linkedin', 'accesspress-staple'),
        'id'=>'linkedin',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Flicker', 'accesspress-staple'),
        'id'=>'flicker',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Vimeo', 'accesspress-staple'),
        'id'=>'vimeo',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Stumbleupon', 'accesspress-staple'),
        'id'=>'stumbleupon',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Instagram', 'accesspress-staple'),
        'id'=>'instagram',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Sound Cloud', 'accesspress-staple'),
        'id'=>'sound_cloud',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('GitHub', 'accesspress-staple'),
        'id'=>'github',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Skype', 'accesspress-staple'),
        'id'=>'skype',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Tumbler', 'accesspress-staple'),
        'id'=>'tumbler',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('RSS', 'accesspress-staple'),
        'id'=>'rss',
        'type'=>'url');

/** -------------------------------------------- Social Setting ends here ------------------------------------------------- */

/** -------------------------------------------- Blog Setting Starts here -------------------------------------------------------- */
    $options[] = array(
        'name'=>__('Archive Page Setting', 'accesspress-staple'),
        'type'=>'heading');
    $options[] = array(
        'name'=>__('Portfolio', 'accesspress-staple'),
        'type'=>'info');
    
    $options[] = array(
        'name'=>__('Portfolio Layout', 'accesspress-staple'),
        'id'=>'portfolio_layout',
        'std'=>'grid',
        'type'=>'radio',
        'options'=>$archive_layout);
        
    $options[] = array(
        'name'=>__('Read More Text for Poprtfolio list'),
        'id'=>'read_more_portfolio',
        'std'=>'Read More',
        'type'=>'text');
        
        
    $options[] = array(
        'name'=>__('Archive', 'accesspress-staple'),
        'type'=>'info');
    
    $options[] = array(
        'name'=>__('Read More Text for Archive', 'accesspress-staple'),
        'id'=>'read_more_archive',
        'std'=>'Read More',
        'type'=>'text');
        
        $options[] = array(
        'name'=>__('Team Member', 'accesspress-staple'),
        'type'=>'info');
    
    $options[] = array(
        'name'=>__('Team Member Layout', 'accesspress-staple'),
        'id'=>'team_member_layout',
        'std'=>'grid',
        'type'=>'radio',
        'options'=>$archive_layout);
        
    $options[] = array(
        'name'=>__('Read More Text for Team Member list'),
        'id'=>'read_more_team',
        'std'=>'Read More',
        'type'=>'text');
        
        
        
    


/** -------------------------------------------- Blog Setting ends here ------------------------------------------------- */



/** -------------------------------------------- Tools Starts here -------------------------------------------------------- */

    $options[] = array(
        'name'=>__('Custom CSS', 'accesspress-staple'),
        'type'=>'heading');
   
    $options[] = array(
        'name'=>__('Custom CSS', 'accesspress-staple'),
        'id'=>'custom_code_css',
        'desc'=>'Put the CSS code here',
        'type'=>'textarea');

/** -------------------------------------------- Tools Ends here -------------------------------------------------------- */

/** -------------------------------------------- Clients Logo Upload -------------------------------------------------------- */
    
    $options[] = array(
        'name'=>__('Upload Client Logo'),
        'type'=>'heading');
    
   $options[] = array(
        'name' => __('Associate Logo', 'accesspress-staple'),
        'id' => 'partner_logo',
        'type' => 'parter_logo',
        'placeholder' => 'http://'
        );
    
/** -------------------------------------------- Clients Logo Upload Ends here ------------------------------------------------ */

/** -------------------------------------------- About AccessPress Staple -------------------------------------------------------- */
    
	$options[] = array(
		'name' => __('About AccessPress Staple', 'accesspress-staple'),
		'icon' => 'fa fa-globe',
		'type' => 'heading');

	$options[] = array(
		//'name' => __('About AccessPress Staple', 'accesspress-staple'),
		'desc' => $about_content,
		'type' => 'info');

	$options[] = array(
		'name' => __('For Support', 'accesspress-staple'),
		'desc' => $for_support,
		'type' => 'info');

	$options[] = array(
		'name' => __('For Customization', 'accesspress-staple'),
		'desc' => $for_customization,
		'type' => 'info');


/* --------------------------ABOUT SECTION-------------------------- */

	$options[] = array(
		'name' => __('About AccessPress Themes', 'accesspress-staple'),
		'type' => 'heading');

	$options[] = array(
		//'name' => __('About AccessPress Themes', 'accesspress-staple'),
		'desc' => $about_accesspress_themes,
		'type' => 'info');

	$options[] = array(
		'name' => __('More from AccessPress Themes', 'accesspress-staple'),
		'desc' => $from_accesspress_thems,
		'type' => 'info');
  return $options;
}