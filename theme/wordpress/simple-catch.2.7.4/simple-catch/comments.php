<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
 ?>
	
    <?php 
	// Do not delete these lines 
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
			
	// Standard WordPress comments security
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'simplecatch' ); ?></p>
		<?php return;
	} ?>
	
	<?php // You can start editing here -- including this comment! 
	if ( have_comments() ): ?>
		<div id="comments">	
            <h2 id="comments-title">
                <?php comments_number(__( 'No Comments', 'simplecatch' ), __( '1 Comment', 'simplecatch' ), __( '% Comments', 'simplecatch' ) );?>
            </h2><!-- #comments -->
    
            <div class="navigation clearfix">
                <div class="alignleft">
                    <?php previous_comments_link();?>
                </div>
                <div class="alignright">
                    <?php next_comments_link(); ?>
                </div>
            </div> <!-- .navigation -->
    
            <ul class="commentlist">
                <?php wp_list_comments();?>
            </ul>
            
             <div class="navigation clearfix">
                <div class="alignleft">
                    <?php previous_comments_link();?>
                </div>
                <div class="alignright">
                    <?php next_comments_link(); ?>
                </div>
            </div> <!-- .navigation -->
            
     	</div><!-- .comment-wrap -->            
	<?php else: // this is displayed if there are no comments so far

		if (comments_open()): // If comments are open, but there are no comments.
          
		else: // comments are closed ?>
           <p class="nocomments"><?php _e( 'Comments are closed.', 'simplecatch' );?></p>
    	<?php endif; 
		
	endif;?>
	
    <?php comment_form(); ?>