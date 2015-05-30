<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ultra
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ultra' ); ?></a>

	<?php get_template_part( 'parts/top-bar' ); ?>

	<header id="masthead" class="site-header<?php if( siteorigin_setting( 'header_scale' ) ) { echo ' scale'; } if( siteorigin_setting( 'navigation_responsive_menu' ) ) { echo ' responsive-menu'; } ?>" role="banner">
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

			<nav id="site-navigation" class="main-navigation" role="navigation">
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
	$after_header = apply_filters('ultra_after_header', '');

	if( siteorigin_setting('header_sticky') ) {
		ultra_site_header_sentinel();
		echo $after_header;
	}
	else {
		echo $after_header;
	}
	?>	

	<?php ultra_render_slider() ?>

	<div id="content" class="site-content">