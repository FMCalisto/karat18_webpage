<?php 
/**
 * Posts Layout 1 for Optimizer
 *
 * Displays The Posts in Layout 1 
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;
?>
    <div class="lay1">
        <div class="center">
        
        <?php /* If homepage Display the Title */?>
        <?php if ( is_home() ) { ?>
            <div class="homeposts_title">
            	<?php if($optimizer['posts_title_id']) { ?><h2 class="home_title"><?php echo do_shortcode($optimizer['posts_title_id']); ?></h2><?php }?>
                <?php if($optimizer['posts_subtitle_id']) { ?><div class="home_subtitle"><?php echo do_shortcode(esc_textarea(($optimizer['posts_subtitle_id']))); ?></div><?php }?>
                    <?php if($optimizer['posts_title_id']) { ?>
						<?php get_template_part('template_parts/divider','icon'); ?>
                    <?php }?>
            </div>
        <?php }?>
        
        
            <div class="lay1_wrap <?php if(!empty($optimizer['lay_show_title']) ) { ?>lay1_tt_on<?php }?>">
				  <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                  
                      <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                                 
       
                  <!--POST THUMBNAIL START-->
                      <div class="post_image">
                      
                      	<!--Post Image Hover-->
                          <div class="img_hover"></div>
                          
                          <!--CALL POST IMAGE-->
                          <?php if ( has_post_thumbnail() ) : ?>
                          
                          <div class="imgwrap">    
                              <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); echo $image[0]; ?>" title="<?php echo _e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php echo _e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>

                              </div>                 
                          <a href="<?php the_permalink();?>"><?php the_post_thumbnail('optimizer_thumb'); ?></a>
                          </div>
                          
                          <?php elseif(!optimizer_gallery_thumb() == ''): ?>
                          <div class="imgwrap">
							<div class="icon_wrap animated fadeInUp">
                              		<a href="<?php the_permalink();?>" title="<?php echo _e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                          <a href="<?php the_permalink();?>"><img src="<?php echo optimizer_gallery_thumb();?>" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/></a></div>
                          
                          <?php elseif(!optimizer_first_image() == ''): ?>
                          <div class="imgwrap">       
                              <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); echo $image[0]; ?>" title="<?php echo _e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php echo _e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>

                              </div>            
                          <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_first_image('optimizer_thumb'); ?>" /></a></div>
                          
                          <?php else : ?>
                          <div class="imgwrap">
							<div class="icon_wrap animated fadeInUp">
                              		<a href="<?php the_permalink();?>" title="<?php echo _e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                          <a href="<?php the_permalink();?>"><img src="<?php echo optimizer_placeholder_image();?>" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/></a></div>   
                                   
                          <?php endif; ?>
                          
                          <!--POST CONTENT-->
                          <div class="post_content">
                          <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                          </div>
                          
                      </div>
                    <!--POST THUMBNAIL END-->  

                      </div>
              <?php endwhile ?> 
  
              <?php endif ?>
              
            </div><!--lay1_wrap class end-->
        
        
        
        <!--PAGINATION START-->
        <?php get_template_part( 'framework/core','pagination' ); ?> 
        <!--PAGINATION END-->
        
        <?php wp_reset_query(); ?>
       </div><!--center class end-->
    </div><!--lay1 class end-->