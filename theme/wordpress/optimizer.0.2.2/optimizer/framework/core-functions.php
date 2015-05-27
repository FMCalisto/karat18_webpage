<?php
/**
 * The Core Functions for Optimizer
 *
 * These core functions are the main feature of the Optimizer.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */

//CONTENT WIDTH
function optimizer_content_width() {
	global $content_width;
	$full_width = is_page_template( 'page-fullwidth_template.php' );
	if ( $full_width ) {
		$content_width = 1100;
	}else {
		$content_width = 690;
	}
}
add_action( 'template_redirect', 'optimizer_content_width' );


//UPDATED: GET THE FIRST IMAGE
function optimizer_first_image() {
	if(is_404()){
		return;
	}
	global $wp_query;
	if( $wp_query->post_count <1){
		return;
	}
		global $post, $posts;
		$image_url = '';
		ob_start();
		ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){;
		$image_url = $matches [1] [0];
		}
	return $image_url;
}

//optimizer Site title
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function optimizer_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		$sep ='|';
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'optimizer' ), max( $paged, $page ) );
	
		return $title;
	}
	add_filter( 'wp_title', 'optimizer_wp_title', 10, 2 );
}


//Custom Excerpt Length
function optimizer_excerptlength_teaser($length) {
    return 20;
}
function optimizer_excerptlength_index($length) {
    return 12;
}
function optimizer_excerptmore($more) {
    return '...';
}

function optimizer_excerpt($length_callback='', $more_callback='') {
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

//Get Attachment data
function optimizer_get_attachment( $attachment_id ) {

$attachment = get_post( $attachment_id );
return array(
    'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
    'caption' => $attachment->post_excerpt,
    'description' => $attachment->post_content,
    'href' => get_permalink( $attachment->ID ),
    'src' => $attachment->guid,
    'title' => $attachment->post_title
);
}


//hex to rgb function
function optimizer_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
 
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}