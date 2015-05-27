<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Blog
 *
 * The template for Blog
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 2.4.1
 */
 
get_header(); 

		if ( function_exists( 'simplecatch_display_div' ) ) {
			$themeoption_layout = simplecatch_display_div();
		} 
		global $wp_query, $paged;
						
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		}
		elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		}
		else {
			$paged = 1;
		}
                    
		$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
		$temp_query = $wp_query;
		$wp_query = null;
		$wp_query = $blog_query;
    
    	if ( $blog_query->have_posts() ) :
        while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
            <div <?php post_class(); ?> >
                    
                <?php //If category has thumbnail it displays thumbnail and excerpt of content else excerpt only 
                if ( has_post_thumbnail() ) : ?>
                    <div class="col3 post-img">
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'simplecatch' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail( 'featured' ); ?></a>
                    </div> <!-- .col3 -->  
                    <?php if( $themeoption_layout == 'no-sidebar-full-width' ) {
                        echo '<div class="col9">'; 
                    }
                    else {
                        echo '<div class="col5">';
                    }
                else :
                    if( $themeoption_layout == 'no-sidebar-full-width' ) {
                        echo '<div class="col12">'; 
                    }
                    else {
                        echo '<div class="col8">';
                    }
                endif; ?> 
                    
                    <h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'simplecatch' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" ><?php the_title(); ?></a></h2>
                
                    <ul class="post-by">
                        <li class="no-padding-left"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo esc_attr(get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'By', 'simplecatch' ); ?>&nbsp;<?php the_author_meta( 'display_name' );?></a></li>
                        <li><?php $simplecatch_date_format = get_option( 'date_format' ); the_time( $simplecatch_date_format ); ?></li>
                        <li class="last"><?php comments_popup_link( __( 'No Comments', 'simplecatch' ), __( '1 Comment', 'simplecatch' ), __( '% Comments', 'simplecatch' ) ); ?></li>
                    </ul>
                        
                    <?php the_excerpt(); ?>
                     
                </div>   
            
                <div class="row-end"></div>
                    
            </div><!-- .post -->
        
            <hr />
                        
        <?php endwhile;
                        
        // Checking WP Page Numbers plugin exist
        if ( function_exists('wp_pagenavi' ) ) : 
            wp_pagenavi();
        
        // Checking WP-PageNaviplugin exist
        elseif ( function_exists('wp_page_numbers' ) ) : 
            wp_page_numbers();
               
        else: 
            global $wp_query;
            if ( $wp_query->max_num_pages > 1 ) : 
        ?>
                <ul class="default-wp-page">
                    <li class="previous"><?php next_posts_link( __( 'Previous', 'simplecatch' ) ); ?></li>
                    <li class="next"><?php previous_posts_link( __( 'Next', 'simplecatch' ) ); ?></li>
                </ul>
            <?php endif;
        endif; 
        ?>
                 			
		<?php else : ?>
        
            <div class="post">
                <h2><?php _e( 'Not found', 'simplecatch' ); ?></h2>
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'simplecatch' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .post -->

		<?php endif; 
        $wp_query = $temp_query;
        wp_reset_postdata();
        ?>    
    </div><!-- #content -->
            
	<?php 
    if( $themeoption_layout == 'right-sidebar' ) {
        get_sidebar(); 
    }?>

</div><!-- #main --> 
        
<?php get_footer(); ?>