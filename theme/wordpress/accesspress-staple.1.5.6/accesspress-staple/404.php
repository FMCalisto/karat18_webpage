<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package AccessPress Staple
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

            	<header class="entry-header">
        		<h1 class="entry-title ak-container"><?php _e( 'Oops! That page can&rsquo;t be found.', 'accesspress-staple' ); ?></h1>
        		</header><!-- .entry-header -->
        
        	<div class="ak-container">
    			<div class="page-content">
    				<p><?php _e( 'It looks like nothing was found at this location.', 'accesspress-staple' ); ?></p>
    			</div><!-- .page-content -->
                    
                <div class="number404">
                    <?php _e('404', 'accesspress-staple');?> 
                <span><?php _e('error', 'accesspress-staple');?></span>   
                </div>
	       </div>
</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>