<?php
/**
 * The CSS/JS ENQUEUE functions for OPTIMIZER
 *
 * Stores all the ENQUEUE Functions of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
 
/****************** LOAD THEME CSS & JS (FRONT-END) ******************/
function optimizer_css_js() { 
	if ( !is_admin() ) {
		//**********LOAD THEME CSS**********
		wp_enqueue_style( 'optimizer-style', get_stylesheet_uri());
		wp_enqueue_style( 'optimizer-style-core', get_template_directory_uri().'/style_core.css', 'style_core');
		wp_enqueue_style('optimizer-icons',get_template_directory_uri().'/assets/fonts/font-awesome.css', 'font_awesome' );
		wp_enqueue_style('optimizer-animated_css',get_template_directory_uri().'/assets/css/animate.min.css', 'animated_css' );
		if ( is_rtl() ) { 
			wp_enqueue_style('optimizer-rtl_css',get_template_directory_uri().'/assets/css/rtl.css', 'rtl_css' ); 
		}
		//**********LOAD THEME JS**********
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('optimizer_js',get_template_directory_uri().'/assets/js/optimizer.js', array('jquery'), true);
		wp_enqueue_script('optimizer_otherjs',get_template_directory_uri().'/assets/js/other.js', array('jquery'), true);
		global $optimizer; if ( ! empty ( $optimizer['post_lightbox_id'] ) ) {wp_enqueue_script('optimizer_lightbox',get_template_directory_uri().'/assets/js/magnific-popup.js', array('jquery'), true);}
		
		//Load Coment Reply Javascript
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
		if ( is_page() || is_single() ) {
			//Load Gallery Javascript
			global $optimizer; global $post; $content = $post->post_content; 
			if (!empty( $optimizer['post_gallery_id'] ) && has_shortcode( $content, 'gallery' ) ) {
				wp_enqueue_script('optimizer_gallery',get_template_directory_uri().'/assets/js/gallery.js', array('jquery'), true);
			}
		}
		
	}
}	
add_action('wp_enqueue_scripts', 'optimizer_css_js');


/****************** DYNAMIC CSS & JS ******************/
//Include Dynamic Stylesheet 
if ( !is_admin() ) {
	require(get_template_directory() . '/template_parts/custom-style.php');
}

//Load RAW Java Scripts 
add_action('wp_footer', 'optimizer_load_js');
function optimizer_load_js() {
if ( !is_admin() ) {
	require(get_template_directory() . '/template_parts/custom-javascript.php');
}
}

/****************** ADMIN CSS & JS ******************/

//Enqueue REDUX CUSTOM Admin CSS & JS
function optimizer_admin() { 
	wp_enqueue_style('optimizer-adminFontAwesome',get_template_directory_uri().'/assets/fonts/font-awesome.css');
	wp_enqueue_style('optimizer-redux-custom-css', get_template_directory_uri() . '/assets/css/admin.css', array( 'redux-admin-css' ),  time(), 'all');  
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'optimizer-admin-js', get_template_directory_uri() . '/assets/js/admin.js', false, '1.0', true );
}
add_action('redux/page/optimizer/enqueue', 'optimizer_admin');

?>