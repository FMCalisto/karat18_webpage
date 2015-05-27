<?php
/**
 * Part Name: Top Bar
 */
?>

<div class="bottom-bar">
	<div class="container">
		<?php $copyright_text = apply_filters('ultra_copyright_text', siteorigin_setting('footer_copyright_text') ); ?>
		<div class="site-info">
			<?php echo wp_kses_post($copyright_text); ?> 
			<?php printf( __( ' - Theme by %1$s', 'ultra' ), '<a href="http://purothemes.com/">Puro</a>' ); ?>
		</div><!-- .site-info --><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'social-links-menu', 'depth' => 1, 'fallback_cb' => '' ) ); ?>
	</div><!-- .container -->

</div><!-- .bottom-bar -->