<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a Simple Catch theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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