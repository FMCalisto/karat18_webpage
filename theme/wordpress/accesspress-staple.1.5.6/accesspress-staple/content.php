<?php
/**
 * @package AccesspressAgency
 */
?>
<?php
$cat_event = of_get_option('team_member_category');
$cat_testimonial = of_get_option('testomonial_category');
$cat_portfolio = of_get_option('portfolio_section');
$cat_feature  =   of_get_option('feature_section');
$cat_af      =   of_get_option('feature_awesome_section');
$layout_team_member = of_get_option('team_member_layout');
$read_more_port      =   of_get_option('read_more_portfolio');
$read_more_archive      =   of_get_option('read_more_archive');
$read_more_team      =   of_get_option('read_more_team');
?>


<?php if(!empty($cat_event) && is_category() && is_category($cat_event)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
    
        
        
	<div class="entry-content">
		<?php if($layout_team_member=='grid'): ?>
        <div class="team-block">
                <figure class="team-image">
                <?php if (has_post_thumbnail()):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'team-image'); ?>
			  <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /><?php
            endif;
            ?>
                <div class="team-hover">
                    <div class="team-hover-icon"><a href="<?php the_permalink(); ?>"><i class="fa fa-link">  </i></a> </div>
                    <div class="team-hover-text"><?php echo esc_attr(accesspress_excerpt(get_the_content(), 60));?></div>
                </div>
                </figure>
             </div>        
        
        <?php 
        else:        
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
		?>
		<div class="cat-event-image">
		<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
		</div>
		<?php } ?>
		<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
		<?php 
		?>
		    <div><?php echo esc_attr(accesspress_excerpt( get_the_content() , 400 )) ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php echo esc_attr($read_more_team);?></a>
        <?php endif;?>        
	</div><!-- .entry-content -->
    
            
</article>

<?php elseif(!empty($cat_feature) && is_category() && is_category($cat_feature)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false ); 
		?>
		<div class="cat-event-image">
		<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
		</div>
		<?php } ?>
		<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
		<?php 
		?>
		    <div><?php echo esc_attr(accesspress_excerpt( get_the_content() , 400 )); ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php echo esc_attr($read_more_archive);?></a>
	</div><!-- .entry-content -->
</article>

<?php elseif(!empty($cat_af) && is_category() && is_category($cat_af)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-event-list">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false ); 
		?>
		<div class="cat-event-image">
		<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
		</div>
		<?php } ?>
		<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
		<?php 
		?>
		    <div><?php echo esc_attr(accesspress_excerpt( get_the_content() , 400 )) ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php echo esc_attr($read_more_archive);?></a>
	</div><!-- .entry-content -->
</article>


<?php elseif(!empty($cat_testimonial) && is_category() && is_category($cat_testimonial)): ?>

<article id="post-<?php the_ID(); ?>" class="cat-testimonial-list clearfix">
	<header class="entry-header">
	<div class="cat-testimonial-image">
	<?php 
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
		?>
		<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
		<?php }else {?>	
		<img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-fallback.jpg" alt="<?php the_title(); ?>">
		<?php }?>
	</div>
		

	<h2 class="entry-title"><?php the_title(); ?></h2>
	
	</header><!-- .entry-header -->

	<div class="cat-testimonial-excerpt">
		    <?php the_content(); ?>
	</div>
</article>

<?php elseif(!empty($cat_portfolio) && is_category() && is_category($cat_portfolio)): 
$ak_port_style = of_get_option('portfolio_layout');
?>
<div class="portfolio-archive clearfix <?php if($ak_port_style=='list'){ echo 'list'; } ?>">
<article id="post-<?php the_ID(); ?>" class="cat-portfolio-list ">
<?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumbnail', false ); 
if($ak_port_style=='list'){ ?>
<div class="cat-portfolio-image">
		<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
</div>
<div class="cat-portfolio-content">
<h3 class="entry-title"><?php the_title(); ?></h3>
    <div class="port-content"><?php echo esc_attr(accesspress_excerpt(get_the_content(), 250, true)); ?></div>
    <a  class="bttn" href="<?php the_permalink(); ?>"><?php echo esc_attr($read_more_port); ?></a>

</div>
    <?php 
 } 
 else{
 ?>

	<a class="fancybox-gallery" href="<?php the_permalink(); ?>" data-lightbox-gallery="gallery">
    <div class="cat-portfolio-image">
		<div class="cat-port-image-wrapper"> <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"> </div>

    <div class="portofolio-layout-wrap">
    	<div class="portofolio-layout-wrapper">
	   		<a class="read-more" href="<?php the_permalink(); ?>"> <i class="fa fa-link"> </i> </a>
	    		<h1 class="entry-title"><?php the_title(); ?></h1>  
	    </div>   
    </div>
</div>
	
        
    </a>
    <?php }?>
</article>
</div>
<?php else: ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php accesspress_staple_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_attr($read_more_archive); ?></a>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if(has_post_thumbnail()){?>
		<div class="archive-thumbnail">
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'archive-image'); 
            if(has_post_thumbnail()){
              ?>
              <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /><?php
              
            }
            ?> 
		</div>
		<?php } ?>
		<div class="short-content">
		<?php echo esc_attr(accesspress_excerpt( get_the_content() , 600 )); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_attr($read_more_archive); ?></a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-staple' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'accesspress-staple' ) );
				if ( $categories_list && accesspress_staple_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'accesspress-staple' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'accesspress-staple' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'accesspress-staple' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php //edit_post_link( __( 'Edit', 'accesspress-staple' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php endif; ?>