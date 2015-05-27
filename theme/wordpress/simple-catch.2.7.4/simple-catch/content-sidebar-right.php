<?php
/**
 * This is the template that displays page/post with right sidebar
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.3.2
 */
?>

		<div id="main" class="layout-978">
        
        	<div id="content" class="col8 no-margin-left">

				<?php while ( have_posts() ):the_post();
					if( function_exists( 'simplecatch_loop') ) simplecatch_loop(); 
				?>
					<div class="row-end"></div>
					
					<?php comments_template(); ?> 
				
				<?php endwhile; ?>
                
        	</div><!-- #content -->
            
      	 	<?php get_sidebar(); ?>
            
		</div><!-- #main --> 