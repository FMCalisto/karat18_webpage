<?php
/**
 * AccessPress Staple functions and definitions
 *
 * @package AccessPress Staple
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_staple_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_staple_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Staple, use a find and replace
	 * to change 'accesspress_staple' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-staple', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('portfolio-thumbnail', 420, 300,  true);

	add_image_size('featured-thumbnail', 190, 133, true);

	add_image_size('team-image', 238, 238, true);

	add_image_size('feature-image', 279, 203, true);

	add_image_size('port-image', 550, 400, true);

	add_image_size('archive-image', 860, 300, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-staple' ),
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

	// Set up the WordPress core custom background feature.
}
endif; // accesspress_staple_setup
add_action( 'after_setup_theme', 'accesspress_staple_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_staple_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'accesspress-staple' ),
		'id'            => 'left-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'accesspress-staple' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 1', 'accesspress-staple' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 2', 'accesspress-staple' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 3', 'accesspress-staple' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer 4', 'accesspress-staple' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
}
add_action( 'widgets_init', 'accesspress_staple_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_staple_scripts() {
	wp_enqueue_style( 'step3css', get_template_directory_uri() . '/css/step3.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'accesspress_staple-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style( 'font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300,100,200');
    wp_enqueue_style( 'font-roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100');
    
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js');

    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'accesspress_staple-bx_slider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'accesspress_staple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
    wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'jquery-waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', false);
    wp_enqueue_script( 'main-menu', get_template_directory_uri() . '/js/main-menu.js', array(), '2.6.2', false);
        
    //wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '20120206', true );

	wp_enqueue_script( 'accesspress_staple-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    
    
	
}
add_action( 'wp_enqueue_scripts', 'accesspress_staple_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Options Framework.
 */
require get_template_directory() . '/inc/options-framework/options-framework.php';

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );

/**
 * Load Options .
 */
require get_template_directory() . '/inc/accesspress-options.php';


/**
 * Load Options Custom function.
 */
require get_template_directory() . '/inc/accesspress-function.php';

/**
 * Load Options Custom metabox.
 */
require get_template_directory() . '/inc/accesspress-custom-metabox.php';

/**
 * Load accesspress-class-tgm-plugin-activation
 */
require get_template_directory() . '/inc/accesspress-class-tgm-plugin-activation.php';