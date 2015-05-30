<?php
/**
 * The MAIN FUNCTIONS FILE for OPTIMIZER
 *
 * Stores all the Function of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */

//**************optimizer SETUP******************//
function optimizer_setup() {
	add_theme_support( 'title-tag' );			//WP 4.1 Site Title
	add_theme_support( 'woocommerce' );			//Woocommerce Support
	add_theme_support('automatic-feed-links');	//RSS FEED LINK
	add_theme_support( 'post-thumbnails' );		//Post Thumbnail
	//Custom Background	
	add_theme_support( 'custom-background', array( 'default-color' => 'f7f7f7') );	
	//Make theme available for translation
	load_theme_textdomain('optimizer', get_template_directory() . '/languages/');  
	
	//Custom Thumbnail Size	
		add_image_size( 'optimizer_thumb', 400, 270, true ); /*(cropped)*/
   
	//Register Menus
	register_nav_menus( array(
			'primary' => __( 'Header Navigation', 'optimizer' ),
		) );
	}
add_action( 'after_setup_theme', 'optimizer_setup' );

//**************optimizer FUNCTIONS******************//
require(get_template_directory() . '/framework/core-functions.php');			//Include Optimizer Framework Core Functions 
require(get_template_directory() . '/lib/functions/core.php');					//Include Core Functions
require(get_template_directory() . '/lib/functions/enqueue.php');					//Include Enqueue CSS/JS Scripts
require(get_template_directory() . '/lib/functions/admin.php');				//Include Admin Functions (admin)
require(get_template_directory() . '/lib/functions/woocommerce.php');			//Include Woocommerce Functions
require(get_template_directory() . '/lib/functions/defaults.php');

//Include REDUX Framework
require_once(get_template_directory() . '/lib/redux/framework.php');
require_once(get_template_directory() . '/theme-options.php');


?>