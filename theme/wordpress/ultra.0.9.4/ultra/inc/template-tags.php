<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ultra
 */

if ( ! function_exists( 'ultra_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time, author, comment count and categories.
 */

function ultra_posted_on() {

	echo '<div class="entry-meta-inner">';

	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'ultra' ) . '</span>';
	}

	if ( is_home() && siteorigin_setting('blog_post_date') || is_archive() && siteorigin_setting('blog_post_date') || is_search() && siteorigin_setting('blog_post_date') ) {
		echo '<span class="entry-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date( 'j F Y' ) ) . '</time><time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time></span></a>';
	}

	if ( is_single() && siteorigin_setting('blog_post_date') ) {
		echo '<span class="entry-date"><time class="published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date( 'j F Y' ) ) . '</time><time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time></span>';
	}

	if ( siteorigin_setting('blog_post_author') ) {
		echo '<span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a></span></span>';
	}

	if ( comments_open() && siteorigin_setting('blog_post_comment_count') ) { 
		echo '<span class="comments-link">';
  		comments_popup_link( __( 'Leave a comment', 'ultra' ), __( '1 Comment', 'ultra' ), __( '% Comments', 'ultra' ) );
  		echo '</span>';
	}

	echo '</div>';

	if ( is_single() && siteorigin_setting( 'navigation_post_nav' ) ) {
		the_post_navigation( $args = array( 'prev_text' => '', 'next_text' => '', ) );
	}
}
endif;

if ( ! function_exists( 'ultra_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ultra_entry_footer() {

	if ( is_single() && has_category() && siteorigin_setting('blog_post_cats') ) {
		echo '<span class="cat-links">' . get_the_category_list( __( ', ', 'ultra' ) ) . '</span>';
	}

	if ( is_single() && has_tag() && siteorigin_setting('blog_post_tags') ) {
		echo '<span class="tags-links">' . get_the_tag_list( '', __( ', ', 'ultra' ) ) . '</span>';
	}

	if ( siteorigin_setting( 'blog_edit_link' ) ) { 
		edit_post_link( __( 'Edit', 'ultra' ), '<span class="edit-link">', '</span>' ); 
	}	
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'ultra' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'ultra' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'ultra' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'ultra' ), get_the_date( _x( 'Y', 'yearly archives date format', 'ultra' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'ultra' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'ultra' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'ultra' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'ultra' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'ultra' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'ultra' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'ultra' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'ultra' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'ultra' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

if(!function_exists('ultra_display_logo')):
/**
 * Display the logo.
 */
function ultra_display_logo(){
	$logo = siteorigin_setting( 'header_logo' );
	$logo = apply_filters('ultra_logo_image_id', $logo);

	if( empty($logo) ) {
		if ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) {
			// We'll let Jetpack handle things
			jetpack_the_site_logo();
			return;
		}

		// Just display the site title
		$logo_html = '<h1 class="site-title">'.get_bloginfo( 'name' ).'</h1>';
		$logo_html = apply_filters('ultra_logo_text', $logo_html);
	}
	else {
		// Load the logo image
		if(is_array($logo)) {
			list ($src, $height, $width) = $logo;
		}
		else {
			$image = wp_get_attachment_image_src($logo, 'full');
			$src = $image[0];
			$height = $image[2];
			$width = $image[1];
		}

		// Add all the logo attributes
		$logo_attributes = apply_filters('ultra_logo_image_attributes', array(
			'src' => $src,
			'width' => round($width),
			'height' => round($height),
			'alt' => sprintf( __('%s Logo', 'ultra'), get_bloginfo('name') ),
		) );

		if( siteorigin_setting('header_sticky') && siteorigin_setting('header_scale') ) $logo_attributes['data-scale'] = '1';

		$logo_attributes_str = array();
		if( !empty( $logo_attributes ) ) {
			foreach($logo_attributes as $name => $val) {
				if( empty($val) ) continue;
				$logo_attributes_str[] = $name.'="'.esc_attr($val).'" ';
			}
		}

		$logo_html = apply_filters('ultra_logo_image', '<img '.implode( ' ', $logo_attributes_str ).' />');
	}

	// Echo the image
	echo apply_filters('ultra_logo_html', $logo_html);
}
endif;


if(!function_exists('ultra_site_header_sentinel')):
/**
 * Display the sticky header sentinel.
 */
function ultra_site_header_sentinel(){
	?>
	<header class="site-header site-header-sentinel<?php if( siteorigin_setting( 'header_scale' ) ) { echo ' scale'; } if( siteorigin_setting( 'navigation_responsive_menu' ) ) { echo ' responsive-menu'; } ?>" role="banner">
		<div class="container">
			<div class="site-branding-container">
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php ultra_display_logo(); ?>
					</a>
					<?php if( get_bloginfo('description') && siteorigin_setting('header_tagline') ) : ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div><!-- .site-branding-container -->

			<nav class="main-navigation" role="navigation">
				<?php do_action('ultra_before_nav') ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				<?php if( siteorigin_setting('navigation_menu_search') ) : ?>
					<div class="menu-search">
						<div class="search-icon"></div>
						<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
						</form>	
					</div><!-- .menu-search -->
				<?php endif; ?>				
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</header><!-- #masthead -->
	<?php
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ultra_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ultra_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ultra_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ultra_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ultra_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ultra_categorized_blog.
 */
function ultra_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ultra_categories' );
}
add_action( 'edit_category', 'ultra_category_transient_flusher' );
add_action( 'save_post',     'ultra_category_transient_flusher' );