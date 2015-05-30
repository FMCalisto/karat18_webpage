<?php 
/**
 * The ABOUT BOX  for Optimizer
 *
 * Displays The ABOUT TEXT BOX Element on Frontpage
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<!--ABOUT Block START-->
        <div class="text_block_wrap <?php if(!empty($optimizer['hide_mob_about'])){ echo 'mobile_hide_about';} ?>">
            <div class="center">
                <div class="about_inner">
                    <?php if($optimizer['about_preheader_id']) { ?><span class="about_pre"><?php echo do_shortcode($optimizer['about_preheader_id']); ?></span><?php } ?>
                    <?php if($optimizer['about_header_id']) { ?><h1 class="about_header"><?php echo do_shortcode($optimizer['about_header_id']); ?></h1>
                    	<!--DIVIDER-->
						<?php get_template_part('template_parts/divider','icon'); ?>
                      <?php } ?>  
                        
                    <div class="about_content"><?php echo do_shortcode($optimizer['about_content_id']); ?></div>
                </div>
        	</div>
    	</div>
<!--ABOUT Block END-->
