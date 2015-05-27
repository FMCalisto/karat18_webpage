<?php
/**
 * The template for displaying the home page panel. Requires SiteOrigin page builder plugin.
 *
 * Template Name: Page Builder Home
 *
 * @package ultra
 * @see https://siteorigin.com/page-builder/
 */

get_header();
?>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<div class="entry-content">
					<?php
					if ( is_page() ) {
						the_post();
						the_content();
					}
					else if( function_exists('siteorigin_panels_render') ) echo siteorigin_panels_render('home');
					else echo siteorigin_panels_lite_home_render();
					?>
				</div>
			</main><!-- #main .site-main -->
		</div><!-- #primary .content-area -->

	</div><!-- .container -->

<?php get_footer(); ?>