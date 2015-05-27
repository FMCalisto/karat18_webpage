<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package AccessPress Staple
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function accesspress_staple_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'accesspress_staple_jetpack_setup' );