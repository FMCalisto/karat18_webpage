<?php
/**
 * ares functions and definitions
 *
 * @package ares
 */

if (!function_exists('ares_setup')) :
    function ares_setup() {
        if (!isset($content_width)) {
            global $content_width;
            $content_width = 1060;
        }

        define('ARES_VERSION', '1.52');
        load_theme_textdomain('ares', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_editor_style('');
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'ares'),
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ares_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Enable support for HTML5 markup.
        add_theme_support('html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
            'caption',
        ));
        add_filter('widget_text', 'do_shortcode');
    }
endif; 

add_action('after_setup_theme', 'ares_setup');
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';
require_once dirname(__FILE__) . '/inc/engine/tgm.php';
require_once dirname(__FILE__) . '/inc/engine/avenue.php';

