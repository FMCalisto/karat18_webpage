<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
 
get_header(); 
	
	if ( function_exists( 'simplecatch_display_div' ) ) {
		$themeoption_layout = simplecatch_display_div();
	}
    get_template_part( 'content' ); ?>
        
	</div><!-- #content -->
            
	<?php 
    if ( $themeoption_layout == 'right-sidebar' ) {
        get_sidebar(); 
    }?>
            
	</div><!-- #main --> 
        
<?php get_footer(); ?>