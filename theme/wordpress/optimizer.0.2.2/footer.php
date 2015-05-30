<?php 
/**
 * The Footer for Optimizer
 *
 * Displays the footer area of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

	<?php /*To Top Button */?>
	<?php if (!empty ($optimizer['totop_id'])) { ?>
    <a class="to_top"><i class="fa-angle-up fa-2x"></i></a>
    <?php } ?>



<!--Footer Start-->
<div class="footer_wrap layer_wrapper <?php if(!empty($optimizer['hide_mob_footwdgt'])){ echo 'mobile_hide_footer';} ?>">

<div id="footer"<?php if (!empty ($optimizer['copyright_center'])) { ?> class="footer_center"<?php } ?>>
    <div class="center">
    <?php if ( is_active_sidebar( 'foot_sidebar' ) ) { ?>
        <!--Footer Widgets START-->
        <div class="widgets">
        	<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Footer Widgets', 'optimizer')) ) : ?><?php endif; ?>
        	</ul>
        </div>
        <!--Footer Widgets END-->
	<?php } ?>
        
    </div>
        <!--Copyright Footer START-->
            <div id="copyright" class="soc_right<?php if (!empty ($optimizer['copyright_center'])) { ?> copyright_center<?php } ?>">
                <div class="center">
                
                    <!--Site Copyright Text START-->
                        <?php if (!empty ($optimizer['footer_text_id'])) { ?>
                        	<div class="copytext">
                                <?php $foot = html_entity_decode($optimizer['footer_text_id']); $foot = stripslashes($foot); echo do_shortcode($foot); ?>
                        	</div>
                        <?php }else{ ?>
        					<div class="copytext"><?php printf( __( 'Theme by %s', 'optimizer' ), '<a target="_blank" href="https://www.layerthemes.com/">Layerthemes</a>' ); ?></div>
        				<?php } ?>
                    <!--Site Copyright Text END-->
               
               <div class="foot_right_wrap">  
                    <!--SOCIAL ICONS START-->
                        <?php if ('footer' == $optimizer['social_bookmark_pos']) { ?>
                        <div class="foot_soc"><?php get_template_part('framework/core','social'); ?></div>
                        <?php } ?>
                    <!--SOCIAL ICONS END-->
                </div>
                
                </div><!--Center END-->

            </div>
        <!--Copyright Footer END-->
</div>
<!--Footer END-->



    
</div><!--layer_wrapper class END-->


<?php wp_footer(); ?>
</body>
</html>