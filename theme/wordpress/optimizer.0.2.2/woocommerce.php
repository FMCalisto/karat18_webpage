<?php 
/**
 * The Default Woocommerce Template for Optimizer
 *
 * Displays the Woocommerce pages.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<?php get_header(); ?>

    <div class="page_wrap layer_wrapper">
    	<?php if(!is_singular()) { ?>
        <!--CUSTOM PAGE HEADER STARTS-->
            <?php get_template_part('framework/core','pageheader'); ?>
        <!--CUSTOM PAGE HEADER ENDS-->
        <?php } ?>
        <div id="content">
            <div class="center">
                <div class="single_wrap">
                    
                    <div class="single_post">

                          <div class="layerbread"><?php woocommerce_breadcrumb(); ?></div>

 						<?php woocommerce_content(); ?>
                    </div>
                
                    </div>
               
                <!--PAGE END-->
            
            
                <!--SIDEBAR START--> 
                    <?php get_sidebar(); ?>
                <!--SIDEBAR END--> 
            
                    </div>
            </div>
    </div><!--layer_wrapper class END-->

<?php get_footer(); ?>