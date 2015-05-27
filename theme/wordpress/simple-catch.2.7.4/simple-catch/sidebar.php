<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
 
	global $post;
	if( $post )
		$layout = get_post_meta( $post->ID,'simplecatch-sidebarlayout', true ); 
		
	if( empty( $layout ) || ( !is_page() && !is_single() ) )
		$layout='default';
		
	global $simplecatch_options_settings;
    $options = $simplecatch_options_settings;
	
	$themeoption_layout = $options['sidebar_layout'];
	
	if( $layout=='left-sidebar' ||( $layout=='default' && $themeoption_layout == 'left-sidebar') ) {
		echo '<div id="sidebar" class="col4 no-margin-left">';
	} else {
		echo '<div id="sidebar" class="col4">';
	} 

	if ( function_exists( 'dynamic_sidebar' ) ) {
		//displays 'sidebar' for all pages
		dynamic_sidebar( 'sidebar' ); 
	}
	?>
	</div><!-- #sidebar -->
	
	<?php 
	if(!( $layout=='left-sidebar' ||( $layout=='default' && $themeoption_layout == 'left-sidebar') ) ) {
		echo '<div class="row-end"></div>';
	}