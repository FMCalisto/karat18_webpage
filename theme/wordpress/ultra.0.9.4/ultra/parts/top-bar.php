<?php
/**
 * Part Name: Top Bar
 */
?>

<?php if( siteorigin_setting('header_top_bar') ) : ?>
	<div id="top-bar">
		<div class="container">
			<div class="top-bar-text">
				<?php do_action('ultra_top_bar_text'); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'top-bar-social', 'container_class' => 'social-links-menu', 'depth' => 1, 'fallback_cb' => '' ) ); ?>
			</div>
			<nav class="top-bar-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>			
			</nav><!-- .top-bar-navigation -->  
		</div><!-- .container -->
	</div><!-- #top-bar -->
<?php endif; ?>