<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ultra
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ultra_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of content-none if there are no posts.
	if ( ! have_posts() ) {
		$classes[] = 'content-none';
	}
	
	// Add widget-dependent classes.
	if ( ! is_active_sidebar( 'sidebar-1') ) {
		$classes[] = 'one-column';
	}
	
	// Add a class if the sidebar is use.
	if ( is_active_sidebar( 'sidebar-1') ) {
		 $classes[] = 'sidebar';
	}

	// Add a class if viewed on mobile.
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}	

	if ( siteorigin_setting( 'header_tagline' ) ) {
		$classes[] = 'tagline';
	}

	// Add a class if the page slider overlap is true.
	if ( get_post_meta(get_the_ID(), 'ultra_metaslider_slider_overlap', true) == true ) {
		$classes[] = 'overlap';
	}

	return $classes;
}
add_filter( 'body_class', 'ultra_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function ultra_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'ultra' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'ultra_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function ultra_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'ultra_render_title' );
endif;
