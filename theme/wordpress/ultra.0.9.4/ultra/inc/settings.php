<?php

/**
 * Initialize the settings.
 */
function ultra_settings_init(){

	siteorigin_settings_add_section( 'header', __('Header', 'ultra') );
	siteorigin_settings_add_section( 'navigation', __('Navigation', 'ultra' ) );
	siteorigin_settings_add_section( 'layout', __('Layout', 'ultra' ) );
	siteorigin_settings_add_section( 'home', __('Home', 'ultra' ) );
	siteorigin_settings_add_section( 'pages', __('Pages', 'ultra' ) );
	siteorigin_settings_add_section( 'blog', __('Blog', 'ultra' ) );
	siteorigin_settings_add_section( 'comments', __('Comments', 'ultra' ) );
	siteorigin_settings_add_section( 'footer', __('Footer', 'ultra' ) );
	siteorigin_settings_add_section( 'text', __('Site Text', 'ultra' ) );

	// Header
	siteorigin_settings_add_field('header', 'logo', 'media', __('Logo', 'ultra'), array(
		'description' => __('Your own custom logo.', 'ultra')
	) );

	siteorigin_settings_add_field('header', 'tagline', 'checkbox', __('Tagline', 'ultra'), array(
		'description' => __('Display the website tagline.', 'ultra')
	) );	

	siteorigin_settings_add_field('header', 'top_bar', 'checkbox', __('Top Bar', 'ultra'), array(
		'description' => __('Display the top bar.', 'ultra')
	) );	

	siteorigin_settings_add_field('header', 'sticky', 'checkbox', __('Sticky Header', 'ultra'), array(
		'description' => __('Sticks the header to the top of the screen as the user scrolls down.', 'ultra')
	) );	

	siteorigin_settings_add_field('header', 'opacity', 'text', __('Sticky Header Opacity', 'ultra'), array(
		'description' => __('Set the header background opacity once it turns sticky. 0.1 (lowest) - 1 (highest).', 'ultra')		
	) );		

	siteorigin_settings_add_field('header', 'scale', 'checkbox', __('Sticky Header Scaling', 'ultra'), array(
		'description' => __('Scale the header down as it becomes sticky.', 'ultra')			
	) );		

	// Navigation
	siteorigin_settings_add_field('navigation', 'menu_search', 'checkbox', __('Menu Search', 'ultra'), array(
		'description' => __('Display a search icon in the main menu.', 'ultra')
	) );

	siteorigin_settings_add_field('navigation', 'responsive_menu', 'checkbox', __('Responsive Menu', 'ultra'), array(
		'description' => __('Use a special responsive menu for small screen devices.', 'ultra')
	) );		

	siteorigin_settings_add_field('navigation', 'responsive_menu_collapse', 'number', __('Responsive Menu Collapse', 'ultra'), array(
		'description' => __('The pixel resolution when the primary menu collapses into a responsive menu.', 'ultra')
	) );

	siteorigin_settings_add_field('navigation', 'breadcrumb_trail', 'checkbox', __('Breadcrumb Trail', 'ultra'), array(
		'description' => __('Display a breadcrumb trail below the menu. De-activate this setting if using Yoast Breadcrumbs or Breadcrumb NavXT.', 'ultra')
	) );		

	siteorigin_settings_add_field('navigation', 'post_nav', 'checkbox', __('Post Navigation', 'ultra'), array(
		'description' => __('Display next/previous post navigation.', 'ultra')
	) );		

	siteorigin_settings_add_field('navigation', 'scroll_top', 'checkbox', __('Scroll to Top', 'ultra'), array(
		'description' => __('Display the scroll to top button.', 'ultra')
	) );			

	// Layout
	siteorigin_settings_add_field( 'layout', 'responsive', 'checkbox', __('Responsive Layout', 'ultra'), array(
		'description' => __('Adapt the site layout for mobile devices.', 'ultra')
	) );	

	siteorigin_settings_add_field( 'layout', 'fitvids', 'checkbox', __('Enable FitVids.js', 'ultra'), array(
		'description' => __('Include FitVids.js for fluid width video embeds.', 'ultra')
	));			

	// Home
	siteorigin_settings_add_field('home', 'slider', 'select', __('Home Slider', 'ultra'), array(
		'options' => siteorigin_metaslider_get_options(true),
		'description' => sprintf(
			__('This theme supports <a href="%s" target="_blank">Meta Slider</a>. <a href="%s">Install it</a> for free to easily build beautiful responsive sliders - <a href="%s" target="_blank">read more</a>.', 'ultra'),
			'https://getdpd.com/cart/hoplink/15318?referrer=1ag7po4k2uas40wowgw',
			siteorigin_metaslider_install_link(),
			'http://ultrathemes.com/documentation/'
		)
	));	

	siteorigin_settings_add_field('home', 'slider_stretch', 'checkbox', __('Stretch Slider', 'ultra'), array(
		'label' => __('Stretch Slider', 'ultra'),
		'description' => __('Stretch the home page slider to full screen width.', 'ultra'),
	) );

	siteorigin_settings_add_field( 'home', 'header_overlaps', 'checkbox', __('Header Overlaps Slider', 'ultra'), array(
		'description' => __('Should the header overlap the home page slider?', 'ultra')
	) );	

	// Pages
	siteorigin_settings_add_field( 'pages', 'featured_image', 'checkbox', __('Featured Image', 'ultra'), array(
		'description' => __('Display the featured image on pages.', 'ultra')
	) );

	// Blog
	siteorigin_settings_add_field('blog', 'page_title', 'text', __('Blog Page Title', 'ultra'), array(
		'description' => __('The page title of the blog page.', 'ultra')
	) );

	siteorigin_settings_add_field('blog', 'archive_featured_image', 'checkbox', __('Archive Featured Image', 'ultra'), array(
		'description' => __('Display the featured image on the blog archive pages.', 'ultra')
	) );	

	siteorigin_settings_add_field('blog', 'archive_content', 'select', __('Archive Post Content', 'ultra'), array(
		'options' => array(
			'full' => __('Full Post Content', 'ultra'),
			'excerpt' => __('Post Excerpt', 'ultra'),
		),
		'description' => __('Choose how to display your post content on blog and archive pages. Select Full Post Content if using the "more" quicktag.', 'ultra'),	
	));			

	siteorigin_settings_add_field('blog', 'read_more', 'text', __('Read More Text', 'ultra'), array(
		'description' => __('The link text displayed when posts are split using the "more" quicktag.', 'ultra'),
		'conditional' => array(
			'show' => array(
				'blog_archive_content' => 'full',
			),
			'hide' => 'else'
		)			
	));	

	siteorigin_settings_add_field('blog', 'excerpt_length', 'number', __('Post Excerpt Length', 'ultra'), array(
		'description' => __('If no manual post excerpt is added one will be generated. How many words should it be?', 'ultra'),
		'conditional' => array(
			'show' => array(
				'blog_archive_content' => 'excerpt',
			),
			'hide' => 'else'
		)			
	));		

	siteorigin_settings_add_field('blog', 'post_featured_image', 'checkbox', __('Post Featured Image', 'ultra'), array(
		'description' => __('Display the featured image on the single post page.', 'ultra')
	) );	

	siteorigin_settings_add_field('blog', 'post_date', 'checkbox', __('Post Date', 'ultra'), array(
		'description' => __('Display the post date.', 'ultra')
	));			

	siteorigin_settings_add_field('blog', 'post_author', 'checkbox', __('Post Author', 'ultra'), array(
		'description' => __('Display the post author.', 'ultra')
	));	

	siteorigin_settings_add_field('blog', 'post_comment_count', 'checkbox', __('Post Comment Count', 'ultra'), array(
		'description' => __('Display the post comment count.', 'ultra')
	));		

	siteorigin_settings_add_field('blog', 'post_cats', 'checkbox', __('Post Categories', 'ultra'), array(
		'description' => __('Display the post categories.', 'ultra')
	));		

	siteorigin_settings_add_field('blog', 'post_tags', 'checkbox', __('Post Tags', 'ultra'), array(
		'description' => __('Display the post tags.', 'ultra')
	));

	siteorigin_settings_add_field( 'blog', 'edit_link', 'checkbox', __( 'Edit Link', 'ultra' ), array(
		'description' => __( 'Display an Edit link below post content. Visible if a user is logged in and allowed to edit the content. Also applies to Pages.', 'ultra' )
	) );

	// Comments
	siteorigin_settings_add_field('comments', 'allowed_tags', 'checkbox', __('Comment Form Allowed Tags', 'ultra'), array(
		'description' => __('Display the explanatory text below the comment form that lets users know which HTML tags may be used.', 'ultra')
	) );	

	// Footer
	siteorigin_settings_add_field( 'footer', 'copyright_text', 'text', __( 'Copyright Text', 'ultra' ), array(
		'description' => __( '{site-title}, {copyright} and {year} can be used to display your website title, a copyright symbol and the current year.', 'ultra' )
	) );	

	// Site Text
	siteorigin_settings_add_field( 'text', 'phone', 'text', __( 'Phone Number', 'ultra' ), array(
		'description' => __( 'A phone number displayed in the top bar. Use international dialing format to enable click to call.', 'ultra' )
	) );	

	siteorigin_settings_add_field( 'text', 'email', 'text', __( 'Email Address', 'ultra' ), array(
		'description' => __( 'An email address to be displayed in the top bar', 'ultra' )
	) );				

	siteorigin_settings_add_field( 'text', 'comments_closed', 'text', __( 'Comments Closed', 'ultra' ), array(
		'description' => __( 'The text visitors see at the bottom of posts when comments are closed.', 'ultra' )
	) );

	siteorigin_settings_add_field( 'text', 'no_results_heading', 'text', __( 'No Search Results Heading', 'ultra' ), array(
		'description' => __( 'The search page heading visitors see when no results are found.', 'ultra' )
	) );		

	siteorigin_settings_add_field( 'text', 'no_results_copy', 'text', __( 'No Search Results Text', 'ultra' ), array(
		'description' => __( 'The search page text visitors see when no results are found.', 'ultra' )
	) );	

	siteorigin_settings_add_field( 'text', '404_heading', 'text', __( '404 Error Page Heading', 'ultra' ), array(
		'description' => __( 'The heading visitors see when no page is found.', 'ultra' )
	) );		

	siteorigin_settings_add_field( 'text', '404_copy', 'text', __( '404 Error Page Text', 'ultra' ), array(
		'description' => __( 'The text visitors see no page is found.', 'ultra' )
	) );			
}
add_action('siteorigin_settings_init', 'ultra_settings_init');

/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function ultra_settings_defaults( $defaults ){
	$defaults['header_logo'] = false;
	$defaults['header_tagline'] = false;
	$defaults['header_top_bar'] = true;
	$defaults['header_sticky'] = true;
	$defaults['header_opacity'] = 1;
	$defaults['header_scale'] = true;

	$defaults['navigation_menu_search'] = true;
	$defaults['navigation_responsive_menu'] = true;
	$defaults['navigation_responsive_menu_collapse'] = 1024;
	$defaults['navigation_breadcrumb_trail'] = false;
	$defaults['navigation_post_nav'] = true;
	$defaults['navigation_scroll_top'] = true;

	$defaults['layout_responsive'] = true;
	$defaults['layout_fitvids'] = true;		

	$defaults['home_slider'] = 'demo';
	$defaults['home_slider_stretch'] = true;
	$defaults['home_header_overlaps'] = false;

	$defaults['pages_featured_image'] = true;

	$defaults['blog_page_title'] = __('Blog', 'ultra');
	$defaults['blog_archive_featured_image'] = true;
	$defaults['blog_archive_content'] = 'full';
	$defaults['blog_read_more'] = __('Continue reading', 'ultra');
	$defaults['blog_excerpt_length'] = 55;
	$defaults['blog_post_featured_image'] = true;
	$defaults['blog_post_date'] = true;
	$defaults['blog_post_author'] = true;
	$defaults['blog_post_comment_count'] = true;
	$defaults['blog_post_cats'] = true;
	$defaults['blog_post_tags'] = true;				
	$defaults['blog_edit_link'] = true;	

	$defaults['comments_allowed_tags'] = true;

	$defaults['footer_copyright_text'] = __('{copyright} {year} {site-title}', 'ultra');

	$defaults['text_phone'] = __('1800-345-6789', 'ultra');
	$defaults['text_email'] = __('info@yourdomain.com', 'ultra');
	$defaults['text_comments_closed'] = __('Comments are closed.', 'ultra');
	$defaults['text_no_results_heading'] = __('Nothing Found', 'ultra');
	$defaults['text_no_results_copy'] = __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultra');	
	$defaults['text_404_heading'] = __('Oops! That page can\'t be found.', 'ultra');
	$defaults['text_404_copy'] = __('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ultra');	

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'ultra_settings_defaults');

function ultra_siteorigin_settings_home_slider_update_post_meta( $new_value, $old_value ) {
	//Update home slider post meta.
	$home_id = get_option( 'page_on_front' );
	if ( $home_id != 0 ) {
		if ( $new_value['home_slider'] != $old_value['home_slider'] ) {
			update_post_meta($home_id, 'ultra_metaslider_slider', $new_value['home_slider'] );
		}
		if ( $new_value['home_slider_stretch'] != $old_value['home_slider_stretch'] ) {
			update_post_meta($home_id, 'ultra_metaslider_slider_stretch', $new_value['home_slider_stretch']);
		}
		if ( $new_value['home_header_overlaps'] != $old_value['home_header_overlaps'] ) {
			update_post_meta($home_id, 'ultra_metaslider_slider_overlap', $new_value['home_header_overlaps']);
		}		
	}
	return $new_value;
}
add_filter( 'pre_update_option_ultra_theme_settings', 'ultra_siteorigin_settings_home_slider_update_post_meta', 10, 2 );