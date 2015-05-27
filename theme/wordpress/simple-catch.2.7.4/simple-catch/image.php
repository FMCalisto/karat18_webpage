<?php
/**
 * The template for displaying image attachments.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
<?php get_header();  

	//Getting Global setting and meta layout Settings
	global $simplecatch_options_settings;
    $options = $simplecatch_options_settings;
	$themeoption_layout = $options['sidebar_layout'];	
	
	$parent = $post->post_parent;
	$layout = get_post_meta( $parent,'simplecatch-sidebarlayout', true );
	
	if( empty( $layout ) ) {
		$layout='default';
	}
?>
	
    <div id="main" class="layout-978">
		<?php 
			if ( $layout == 'no-sidebar' || ( $layout=='default' && $themeoption_layout == 'no-sidebar') ) {
				echo '<div id="content" class="col8">';
			}
			elseif ( $layout == 'left-sidebar' || ( $layout=='default' && $themeoption_layout == 'left-sidebar') ) {
				get_sidebar(); 
				echo '<div id="content" class="col8">';
			}
			else {
				echo '<div id="content" class="col8 no-margin-left">';
			}
		?>

		
		<?php while ( have_posts() ) : the_post(); ?>
				<div <?php post_class(); ?>>
					<h2 class="entry-title"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( 'Return to %s', get_the_title( $post->post_parent ) ) ); ?>"><?php printf( '%s', get_the_title( $post->post_parent ) ); ?></a>: <span class="img-title"><?php the_title(); ?></span></h2>

                    <ul class="post-by">
                        <li class="no-padding-left"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" 
                            title="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'By', 'simplecatch' ); ?>&nbsp;<?php the_author_meta( 'display_name' );?></a></li>
                        <li><?php $simplecatch_date_format = get_option( 'date_format' ); the_time( $simplecatch_date_format ); ?></li>
                        <li><?php comments_popup_link( __( 'No Comments', 'simplecatch' ), __( '1 Comment', 'simplecatch' ), __( '% Comments', 'simplecatch' ) ); ?></li>
                    </ul>
                	<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
<?php
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 */
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
									<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
									$attachment_size = apply_filters( 'simplecatch_attachment_size', 642 );
									echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
									?></a>

									<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div>
									<?php endif; ?>
								</div><!-- .attachment -->

							</div><!-- .entry-attachment -->

							<div class="entry-description">
								<?php the_content(); ?>
								<?php wp_link_pages(array( 
									'before'			=> '<div class="pagination">',
									'after' 			=> '</div>',
									'link_before' 		=> '<span>',
									'link_after'       	=> '</span>',
									'pagelink' 			=> '%',
									'echo' 				=> 1 
								) );?>
                                
							</div><!-- .entry-description -->

					</div><!-- .entry-content -->
					<ul id="nav-image" class="default-wp-page">            
						<li class="previous"><?php previous_image_link( false, __( 'Previous Image' , 'simplecatch' ) ); ?></li>
						<li class="next"><?php next_image_link( false, __( 'Next Image' , 'simplecatch' ) ); ?></li>
					</ul><!-- #nav-image -->
				</div><!-- .post -->

        <?php endwhile; ?>
                                           
        	<div class="row-end"></div>
                    
        	<?php comments_template(); ?> 
         
    </div><!-- #content -->
        
	<?php 
	if ( $layout == 'right-sidebar' || ( $layout=='default' && $themeoption_layout == 'right-sidebar') ) {	
		get_sidebar(); 
	}
	?>
             
</div><!-- #main -->
    
<?php get_footer(); ?>