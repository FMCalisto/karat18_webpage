<?php
/**
 * ultra functions and definitions
 *
 * @package ultra
 */

define( 'SITEORIGIN_THEME_VERSION' , '0.9.4' );

if( file_exists( get_template_directory() . '/premium/functions.php' ) ){
	include get_template_directory() . '/premium/functions.php';
}

// Include all the SiteOrigin extras
include get_template_directory() . '/extras/webfonts/webfonts.php';
include get_template_directory() . '/extras/settings/settings.php';

// Include theme specific files
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
include get_template_directory() . '/inc/settings.php';
require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/jetpack.php';
include get_template_directory() . '/inc/panels.php';
include get_template_directory() . '/inc/panels-missing-widgets.php';
include get_template_directory() . '/inc/metaslider.php';

// Include Breadcrumb Trail
if ( ! function_exists( 'breadcrumb_trail' ) )
	require_once( 'breadcrumbs/breadcrumbs.php' );

if ( ! function_exists( 'ultra_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ultra_setup() { 

	/**
	 * Set the content width based on the theme's design and page template in use.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 857; /* pixels */
	}			 
	function ultra_adjust_content_width() {	 
		global $content_width;

	    if ( is_page_template( 'page-templates/full-width.php' ) || is_page_template( 'page-templates/full-width-no-title.php' ) || is_page_template( 'home-panels.php' ) ) {
	        $content_width = 1200; /* pixels */
	    }
	}
	add_action( 'template_redirect', 'ultra_adjust_content_width' );  	

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ultra, use a find and replace
	 * to change 'ultra' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ultra', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'secondary' => __( 'Top Bar Menu', 'ultra' ),
		'top-bar-social' => __( 'Top Bar Social Menu', 'ultra' ),
		'primary' => __( 'Primary Menu', 'ultra' ),
		'footer' => __( 'Footer Social Menu', 'ultra' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	/**
	 * Add theme support for Site Logo.
	 * See: http://jetpack.me/support/site-logo/
	 */
	add_theme_support( 'site-logo', array(
		'size' => 'full',
	) );

	/**
	 * Support SiteOrigin Page Builder plugin.
	 */
	add_theme_support( 'siteorigin-panels', array(
		'margin-sides' => 35,
		'margin-bottom' => 35,		
		'home-page' => true,
		'home-page-default' => 'default-home',
		'home-demo-template' => 'home-panels.php',
	) );

	if( !function_exists('siteorigin_panels_render') ) {
		// Lite version of Page Builder for basic rendering.
		include get_template_directory() . '/inc/panels-lite/panels-lite.php';
	}

	/**
	 * Add the default webfonts.
	 */
	siteorigin_webfonts_add_font('Muli', array(300) );
	siteorigin_webfonts_add_font('Lato', array(300,400,700) );
}
endif; // ultra_setup
add_action( 'after_setup_theme', 'ultra_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ultra_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ultra' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'ultra' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
}
add_action( 'widgets_init', 'ultra_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ultra_scripts() {
	$js_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'ultra-style', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION );

	wp_enqueue_style( 'ultra-icons', get_template_directory_uri().'/icons/style.css', array(), SITEORIGIN_THEME_VERSION );

	wp_enqueue_script( 'ultra-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), SITEORIGIN_THEME_VERSION, true );

	wp_enqueue_script( 'ultra-flexslider' , get_template_directory_uri() . '/js/jquery.flexslider' . $js_suffix . '.js', array('jquery'), '2.2.2', true );

	wp_enqueue_script( 'ultra-theme', get_template_directory_uri() . '/js/jquery.theme' . $js_suffix . '.js', array('jquery'), SITEORIGIN_THEME_VERSION, true );

	if( siteorigin_setting( 'navigation_responsive_menu' ) ) {
		wp_enqueue_script( 'ultra-responsive-menu', get_template_directory_uri() . '/js/responsive-menu' . $js_suffix . '.js', array('jquery'), SITEORIGIN_THEME_VERSION, true );
	}			

	if( siteorigin_setting( 'layout_fitvids' ) ) {
		wp_enqueue_script( 'ultra-fitvids' , get_template_directory_uri().'/js/jquery.fitvids' . $js_suffix . '.js', array('jquery'), '1.1', true );
	}	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ultra_scripts' );

if( ! function_exists( 'ultra_breadcrumb' ) ):
/**
 * Render the breadcrumb.
 */
function ultra_breadcrumb() {
	$breadcrumbs = ''; 

	// Breadcrumbs
	if ( function_exists( 'breadcrumb_trail' ) && siteorigin_setting( 'navigation_breadcrumb_trail' ) ) {
		$breadcrumbs = breadcrumb_trail(
			array( 
				'container'     => 'nav', 
				'separator'     => '/', 
				'show_browse'   => false,
				'show_on_front' => false,
			) 
		);
	}	

	// WordPress SEO
	elseif ( function_exists( 'yoast_breadcrumb' ) ) { 
		$breadcrumbs = yoast_breadcrumb("","",false); 
	} 	

	// Breadcrumb NavXT
	elseif ( function_exists( 'bcn_display' ) ) { 
		$breadcrumbs = bcn_display( true );
	} 

	if( ! empty( $breadcrumbs ) ) { 
		echo '<div class="breadcrumbs">'. $breadcrumbs .'</div>'; 

	} 
}
endif;

/**
 * Remove comment form allowed tags if theme setting is de-activated. 
 */
function ultra_comment_form_defaults( $defaults ){
	if( ! siteorigin_setting('comments_allowed_tags') ) {
		$defaults['comment_notes_after'] = null;
	}
	
	return $defaults;
}
add_filter( 'comment_form_defaults', 'ultra_comment_form_defaults', 5 );


/**
 * Filter the excerpt length.
 */
function ultra_custom_excerpt_length( $length ) {
	return absint( siteorigin_setting( 'blog_excerpt_length' ) );
}
add_filter( 'excerpt_length', 'ultra_custom_excerpt_length', 999 );

/**
 * Count the footer widgets and add the count to the widget class.
 */
function ultra_footer_widgets_params($params){
    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'sidebar-2' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="', 'class="widget-count-' . floor($sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter( 'dynamic_sidebar_params','ultra_footer_widgets_params' );

/**
 * Filter the header opacity setting.
 */
function ultra_filter_header_opacity(){
	return siteorigin_setting('header_opacity');
}
add_filter('ultra_sticky_header_opacity', 'ultra_filter_header_opacity');

/**
 * Add the header opacity CSS.
 */
function ultra_set_header_opacity(){
	if( siteorigin_setting('header_opacity') == 1 ) return;

	$header_sticky_opacity = apply_filters('ultra_sticky_header_opacity', 1);
	?>
	<style type="text/css" id="ultra-sticky-header-css"> 
		.site-header.fixed {
			background: rgba(255, 255, 255, <?php echo floatval($header_sticky_opacity) ?>);
		}	
	</style>
	<?php
}
add_action('wp_head', 'ultra_set_header_opacity');

/**
 * Render Meta Slider.
 */
function ultra_render_slider(){
	if( is_front_page() && siteorigin_setting( 'home_slider' ) != 'none' ) {
		$settings_slider = siteorigin_setting( 'home_slider' );
		$slider_stretch = siteorigin_setting( 'home_slider_stretch' );
		$slider_overlap = siteorigin_setting( 'home_header_overlaps' );

		if(!empty($settings_slider)) {
			$slider = $settings_slider;
		}
	}

	if( is_page() && get_post_meta(get_the_ID(), 'ultra_metaslider_slider', true) != 'none' ) {
		$page_slider = get_post_meta(get_the_ID(), 'ultra_metaslider_slider', true);
		if( !empty($page_slider) ) {
			$slider = $page_slider;
		}
		$slider_stretch = get_post_meta(get_the_ID(), 'ultra_metaslider_slider_stretch', true) == "1";
		$slider_overlap = get_post_meta(get_the_ID(), 'ultra_metaslider_slider_overlap', true) == "1";			
	}

	if( empty($slider) ) return;

	global $ultra_is_main_slider;
	$ultra_is_main_slider = true;

	?><div id="main-slider" <?php if( $slider_stretch ) echo 'data-stretch="true"'; if( $slider_overlap ) echo 'class="overlap"'; ?>><?php


	if($slider == 'demo') get_template_part('slider/demo');
	elseif( substr($slider, 0, 5) == 'meta:' ) {
		list($null, $slider_id) = explode(':', $slider);
		$slider_id = intval($slider_id);

		echo do_shortcode("[metaslider id=" . $slider_id . "]");
	}

	?></div><?php
	$ultra_is_main_slider = false;
}

/**
 * Add the meta viewport tag.
 */
function ultra_responsive_header(){
	if( siteorigin_setting('layout_responsive') ) {
		?><meta name="viewport" content="width=device-width, initial-scale=1" /><?php
	}
	else {
		?><meta name="viewport" content="width=1280" /><?php
	}
}
add_action( 'wp_head', 'ultra_responsive_header' );

/**
 * Filter the read more link.
 */
function ultra_read_more_link() {
	return '<span class="more-wrapper"><a class="more-link" href="' . get_permalink() . '">' . esc_html( siteorigin_setting('blog_read_more') ) .'</a></span';
}
add_filter( 'the_content_more_link', 'ultra_read_more_link' );

/**
 * Add the responsive menu button.
 */
function ultra_responsive_menu(){
	if( siteorigin_setting('navigation_responsive_menu') ) {
		echo '<button class="menu-toggle"></button>';
	}
}
add_action('ultra_before_nav', 'ultra_responsive_menu');

/**
 * Filter the responsive menu collapse.
 */
function ultra_filter_responsive_menu_collapse($collpase){
	return siteorigin_setting('navigation_responsive_menu_collapse');
}
add_filter('ultra_responsive_menu_resolution', 'ultra_filter_responsive_menu_collapse');

/**
 * Output the responsive menu collpase point.
 */
function ultra_responsive_menu_css(){
	$mobile_resolution = apply_filters('ultra_responsive_menu_resolution', 1024);
	
	?>
	<style type="text/css" id="ultra-menu-css"> 
		@media screen and (max-width: <?php echo intval($mobile_resolution) ?>px) { 
			.responsive-menu .main-navigation ul { display: none; } 
			.responsive-menu .menu-toggle { display: block; }
			.responsive-menu .menu-search { display: none; }
			.site-header .site-branding-container { max-width: 90%; }
			.main-navigation { max-width: 10%; }
		}
	</style>
	<?php
}
add_action('wp_head', 'ultra_responsive_menu_css');

/**
 * Display the scroll to top link.
 */
function ultra_back_to_top() {
	if( ! siteorigin_setting( 'navigation_scroll_top' ) ) return;
	?><a href="#" id="scroll-to-top" title="<?php esc_attr_e('Back To Top', 'ultra') ?>"><span class="up-arrow"></span></a><?php
}
add_action('wp_footer', 'ultra_back_to_top');

/**
* Handles the site title, copyright symbol and year string replace for the Footer Copyright theme option.
*/
function ultra_footer_copyright_text_sub($copyright){
	$site_title = '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';
	return str_replace(
		array('{site-title}', '{copyright}', '{year}'),
		array($site_title, '&copy;', date('Y')),
		$copyright
	);
}
add_filter( 'ultra_copyright_text', 'ultra_footer_copyright_text_sub' );

if( ! function_exists( 'ultra_top_bar_text_area' ) ):
/**
 * Display the top bar text.
 */
function ultra_top_bar_text_area(){
	$phone = wp_kses_post( siteorigin_setting('text_phone') );
	$email = wp_kses_post( siteorigin_setting('text_email') );
	
	if ( siteorigin_setting('text_phone') ) {
		echo '<span class="phone"><a href="tel:' . $phone . '">' . $phone . '</a></span>';
	}
	if ( siteorigin_setting('text_email') ) {
		echo '<span class="email"><a href="mailto:' . $email . '">' . $email . '</a></span>';
	}	
}
add_action('ultra_top_bar_text', 'ultra_top_bar_text_area');
endif;