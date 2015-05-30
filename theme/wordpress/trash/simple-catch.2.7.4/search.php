<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */

get_header(); 

	if( function_exists( 'simplecatch_display_div' ) ) {
		$themeoption_layout = simplecatch_display_div();
	}
      
	if (have_posts()): ?>
		<h2 class="entry-title"><?php printf( __( 'Showing results for: <span class="img-title">%s</span>', 'simplecatch' ), get_search_query() ); ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class();?>>
				
				<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<div class="row-end"></div>
			</div> <!-- .post -->
		
		<?php endwhile; ?>
		
        <?php simplecatch_content_nav( 'nav-below' ); ?>
		
	<?php else : ?>
		<h2><?php printf( __( 'Your search <span> "%s" </span> did not match any documents', 'simplecatch' ), get_search_query() ); ?></h2>
		<div class="post">
			<h5><?php _e( 'A few suggestions', 'simplecatch' ); ?></h5>
			<ul>
				<li><?php _e( 'Make sure all words are spelled correctly', 'simplecatch' ); ?></li>
				<li><?php _e( 'Try different keywords', 'simplecatch' ); ?></li>
				<li><?php _e( 'Try more general keywords', 'simplecatch' ); ?></li>
			</ul> 
		</div> <!-- .post -->
		
<?php endif; ?>

    </div> <!-- #content -->
            
 	<?php 
    if( $themeoption_layout == 'right-sidebar' ) {
        get_sidebar(); 
    }?>
            
</div> <!-- #main -->

<?php get_footer(); ?> 