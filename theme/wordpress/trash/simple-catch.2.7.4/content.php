<?php
/**
 * This is the template that displays content for index and archive page
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.3.2
 */
?>

<?php if ( have_posts() ) : 
	while( have_posts() ):the_post(); 
		global $simplecatch_options_settings;
		$options = $simplecatch_options_settings;
		$themeoption_layout = $options[ 'sidebar_layout' ];
?>	
            
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
                    
	<?php endwhile; ?>
	
	<?php simplecatch_content_nav( 'nav-below' ); ?>
                 			
<?php else : ?>

    <div class="post">
        <h2><?php _e( 'Not found', 'simplecatch' ); ?></h2>
        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'simplecatch' ); ?></p>
        <?php get_search_form(); ?>
    </div><!-- .post -->

<?php endif; ?>