<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'BizSphere';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$magpro_slider_start = array("false" => __("No", 'BizSphere' ),"true" => __("Yes", 'BizSphere' ));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:', 'BizSphere' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'BizSphere' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'BizSphere' ),
										"desc" => __("If you are not using child theme, selecting child theme will be same as using BizSphere skin. If you are using child theme, then lite.css from the child theme will be used.", 'BizSphere' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "verve",
										"options" => array(
											'verve' => $imagepath . 'verve.png',
											'radi' => $imagepath . 'radi.png',
											'orange' => $imagepath . 'orange.png',
											'yellow' => $imagepath . 'yellow.png',
											'blue' => $imagepath . 'blue.png',
											'aqua' => $imagepath . 'aqua.png',
											'grunge' => $imagepath . 'grunge.png',
											'child' => $imagepath . 'child.png')
										);						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Single Post Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Featured Image?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show featured image.", 'BizSphere' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'BizSphere' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'BizSphere' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'BizSphere' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'BizSphere' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
																																							
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'BizSphere' ),
										"desc" => __("Enter your twitter id", 'BizSphere' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'BizSphere' ),
										"desc" => __("Enter your reddit url", 'BizSphere' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'BizSphere' ),
										"desc" => __("Enter your facebook url", 'BizSphere' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'BizSphere' ),
										"desc" => __("Enter your stumbleupon url", 'BizSphere' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'BizSphere' ),
										"desc" => __("Enter your flickr url", 'BizSphere' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'BizSphere' ),
										"desc" => __("Enter your linkedin url", 'BizSphere' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'BizSphere' ),
										"desc" => __("Enter your google url", 'BizSphere' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");

	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Logo Section Settings", 'BizSphere' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Logo Upload", 'BizSphere' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizSphere' ),
										"desc" => __("Upload your logo here.", 'BizSphere' ),
										"id" => "logo_layout_style",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");							
		
		$options[] = array( "name" => __("Logo Section Layout", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					
				$options[] = array( "name" => __("Select a layout", 'BizSphere' ),
										"desc" => __("Images for logo section.", 'BizSphere' ),
										"id" => "logo_layout_style",
										"type" => "images",
										"std" => "sbys",
										"options" => array(
											'sbys' => $imagepath . 'logo1.png',
											'onebone' => $imagepath . 'logo2.png')
										);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	
		
		$options[] = array( "name" => __("Header On/Off Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					
					$options[] = array( "name" => __("Show Header on homepage", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Header on homepage.", 'BizSphere' ),
										"id" => "show_BizSphere_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show Header on Single post page", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Header on Single post page.", 'BizSphere' ),
										"id" => "show_BizSphere_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Pages", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Header on Pages.", 'BizSphere' ),
										"id" => "show_BizSphere_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Category Pages", 'BizSphere' ),
										"desc" => __("Select yes if you want to show Header on Category Pages.", 'BizSphere' ),
										"id" => "show_BizSphere_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Header's/Slider's Available in PRO Version", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following header's/slider's are available in PRO version", 'BizSphere' ),
										"desc" => __("Upgrade to PRO version for above header's/Slider's", 'BizSphere' ),
										"id" => "header_slider",
										"std" => "one",
										"type" => "proimages",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'slider1.png',
											'videoone' => $imagepath . 'video.png',
											'oneplus' => $imagepath . 'oneplus.png',
											'slidertwo' => $imagepath . 'slidertwo.png',
											'slit' => $imagepath . 'slit.png',
											'fraction' => $imagepath . 'fraction.png',
											'hero' => $imagepath . 'hero.png')
										);					

		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'BizSphere' ),
										"desc" => __("Images for layout.", 'BizSphere' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "images",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'bfive' => $imagepath . 'bfive.png',
											'spage' => $imagepath . 'layout2.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizSphere' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizSphere' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "proimages",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'btwo' => $imagepath . 'layout3.png',
											'boneplus' => $imagepath . 'boneplus.png',
											'bthree' => $imagepath . 'bthree.png',
											'bfour' => $imagepath . 'bfour.png',
											'bfive' => $imagepath . 'bfive.png',
											'bsix' => $imagepath . 'bsix.png',
											'bseven' => $imagepath . 'bseven.png',
											'beight' => $imagepath . 'beight.png',
											'bnine' => $imagepath . 'bnine.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Quote Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Quote?", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Quote 1", 'BizSphere' ),
										"desc" => __("Enter the quote text", 'BizSphere' ),
										"id" => "show_quote1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 1", 'BizSphere' ),
										"desc" => __("Enter the customer name", 'BizSphere' ),
										"id" => "show_quote1_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 2", 'BizSphere' ),
										"desc" => __("Enter the quote text", 'BizSphere' ),
										"id" => "show_quote2",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 2", 'BizSphere' ),
										"desc" => __("Enter the customer name", 'BizSphere' ),
										"id" => "show_quote2_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 3", 'BizSphere' ),
										"desc" => __("Enter the quote text", 'BizSphere' ),
										"id" => "show_quote3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 3", 'BizSphere' ),
										"desc" => __("Enter the customer name", 'BizSphere' ),
										"id" => "show_quote3_cust",
										"type" => "proupgrade");																				
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Client Logos", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Client Logo Section?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show client logos.", 'BizSphere' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Client Logo # 1", 'BizSphere' ),
										"desc" => __("upload the logo", 'BizSphere' ),
										"id" => "client_logo1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 2", 'BizSphere' ),
										"desc" => __("upload the logo", 'BizSphere' ),
										"id" => "client_logo2",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Client Logo # 3", 'BizSphere' ),
										"desc" => __("upload the logo", 'BizSphere' ),
										"id" => "client_logo3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 4", 'BizSphere' ),
										"desc" => __("upload the logo", 'BizSphere' ),
										"id" => "client_logo4",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");							
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz One Settings", 'BizSphere' ),
							"type" => "tabheading");
																							
						
		$options[] = array( "name" => __("Welcome Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "welcome_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "welcome_text",
										"type" => "textarea");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Left Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizSphere' ),
										"desc" => __("Upload your image here.", 'BizSphere' ),
										"id" => "left_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "left_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "left_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "left_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Center Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizSphere' ),
										"desc" => __("Upload your image here.", 'BizSphere' ),
										"id" => "center_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "center_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Link", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "center_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'BizSphere' ),
										"desc" => __("Upload your image here.", 'BizSphere' ),
										"id" => "right_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "right_section_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "right_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "right_section_link",
										"type" => "text");																								

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'BizSphere' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show quote.", 'BizSphere' ),
										"id" => "show_BizSphere_quote_bizone",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);								
					
					$options[] = array( "name" => __("Quote", 'BizSphere' ),
										"desc" => __("Enter the Quote Text", 'BizSphere' ),
										"id" => "quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'BizSphere' ),
										"desc" => __("Enter the customer name", 'BizSphere' ),
										"id" => "quote_section_name",
										"type" => "text");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'BizSphere' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizSphere' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizSphere' ),
										"id" => "show_bizone_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");														
						
	$options[] = array( "type" => "innertabclose");
	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz Five Settings", 'BizSphere' ),
							"type" => "tabheading");						
						
		$options[] = array( "name" => __("Welcome Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_welcome_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_welcome_text",
										"type" => "textarea");													

		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Left Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_left_welcome_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_left_welcome_text",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Image 1", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_left_image1",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 1", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_left_headline1",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 1", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_left_desc1",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 1", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_left_link1",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Image 2", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_left_image2",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 2", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_left_headline2",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 2", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_left_desc2",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 2", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_left_link2",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image 3", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_left_image3",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 3", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_left_headline3",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 3", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_left_desc3",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 3", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_left_link3",
										"type" => "text");																																									

		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_right_welcome_headline",
										"type" => "text");		
										
					$options[] = array( "name" => __("Welcome text", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_right_welcome_text",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Image 1", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_right_image1",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 1", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_right_headline1",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 1", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_right_desc1",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 1", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_right_link1",
										"type" => "text");	
										
					$options[] = array( "name" => __("Upload Image 2", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_right_image2",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 2", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_right_headline2",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 2", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_right_desc2",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 2", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_right_link2",
										"type" => "text");
										
					$options[] = array( "name" => __("Upload Image 3", 'BizSphere' ),
										"desc" => __("Upload your 56x56 image here.", 'BizSphere' ),
										"id" => "bfive_right_image3",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Title 3", 'BizSphere' ),
										"desc" => __("Enter the headline", 'BizSphere' ),
										"id" => "bfive_right_headline3",
										"type" => "text");		
										
					$options[] = array( "name" => __("Desc 3", 'BizSphere' ),
										"desc" => __("Enter the welcome text", 'BizSphere' ),
										"id" => "bfive_right_desc3",
										"type" => "text");
										
					$options[] = array( "name" => __("Link 3", 'BizSphere' ),
										"desc" => __("Enter the link to product or service", 'BizSphere' ),
										"id" => "bfive_right_link3",
										"type" => "text");																						

		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("News/Blog Section", 'BizSphere' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Heading", 'BizSphere' ),
										"desc" => __("Enter the heading for news/blog section.", 'BizSphere' ),
										"id" => "bfive_news_section_name",
										"type" => "text");
										
					$options[] = array( "name" => __("Select Category", 'BizSphere' ),
										"desc" => __("Posts from this category will be shown in the news/blog section.", 'BizSphere' ),
										"id" => "bfive_news_section_cat",
										"std" => "true",
										"type" => "select",
										"options" => $options_categories);																	
							
		$options[] = array( "type" => "groupcontainerclose");												
		
		$options[] = array( "name" => __("Quote Section", 'BizSphere' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show quote.", 'BizSphere' ),
										"id" => "show_BizSphere_quote_bfive",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);									
					
					$options[] = array( "name" => __("Quote", 'BizSphere' ),
										"desc" => __("Enter the Quote Text", 'BizSphere' ),
										"id" => "bfive_quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'BizSphere' ),
										"desc" => __("Enter the Customer Name", 'BizSphere' ),
										"id" => "bfive_quote_section_name",
										"type" => "text");														

		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Recent Posts", 'BizSphere' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'BizSphere' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'BizSphere' ),
										"id" => "show_bfive_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");																					
						
	$options[] = array( "type" => "innertabclose");			
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Page Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Comments?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show comments", 'BizSphere' ),
										"id" => "show_comments_spage",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	

	$options[] = array( "name" => "country19",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layouts available in PRO Version", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Portfolio layout's are available in PRO version", 'BizSphere' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizSphere' ),
										"id" => "portfolio_layout",
										"std" => "pone",
										"type" => "proimages",
										"options" => array(
											'pone' => $imagepath . 'pone.png',
											'ptwo' => $imagepath . 'ptwo.png',
											'pthree' => $imagepath . 'pthree.png',
											'pfour' => $imagepath . 'pfour.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");
								
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'BizSphere' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Social Section", 'BizSphere' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show social Section?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show social section.", 'BizSphere' ),
										"id" => "show_social_section",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Footer Logo Upload", 'BizSphere' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'BizSphere' ),
										"desc" => __("Upload your logo here.", 'BizSphere' ),
										"id" => "footer_logo_upload",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Address Settings", 'BizSphere' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show Search?", 'BizSphere' ),
										"desc" => __("Select yes if you want to show search.", 'BizSphere' ),
										"id" => "show_foote_search",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Address", 'BizSphere' ),
										"desc" => __("Enter Address", 'BizSphere' ),
										"id" => "footer_address",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Email", 'BizSphere' ),
										"desc" => __("Enter Email Address", 'BizSphere' ),
										"id" => "footer_email_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Phone Number", 'BizSphere' ),
										"desc" => __("Enter Phone Number", 'BizSphere' ),
										"id" => "footer_phone",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Skype", 'BizSphere' ),
										"desc" => __("Enter Skype Address", 'BizSphere' ),
										"id" => "footer_skype_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Google Map", 'BizSphere' ),
										"desc" => __("Enter google map", 'BizSphere' ),
										"id" => "footer_map_address",
										"type" => "proupgrade",
										);																																																														
										
		$options[] = array( "type" => "groupcontainerclose");											
										
		$options[] = array( "name" => __("Footer Layouts", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a footer layout", 'BizSphere' ),
										"desc" => __("Images for layout.", 'BizSphere' ),
										"id" => "footer_layout",
										"std" => "one",
										"type" => "images",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'footer1.png',
											'two' => $imagepath . 'footer2.png')
										);	
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Layouts available in PRO Version", 'BizSphere' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'BizSphere' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'BizSphere' ),
										"id" => "homepage_layout",
										"std" => "fone",
										"type" => "proimages",
										"options" => array(
											'fthree' => $imagepath . 'fthree.png',
											'ffour' => $imagepath . 'ffour.png',
											'ffive' => $imagepath . 'ffive.png',
											'fsix' => $imagepath . 'fsix.png')
										);					
										
		$options[] = array( "type" => "groupcontainerclose");																							
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}