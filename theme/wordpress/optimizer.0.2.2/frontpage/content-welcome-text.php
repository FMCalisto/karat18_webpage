<?php 
/**
 * The WELCOME TEXT BOX  for Optimizer
 *
 * Displays The WELCOME TEXT BOX Element on Frontpage
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<!--Text Block START-->
    <div class="text_block <?php if(!empty($optimizer['hide_mob_welcm'])){ echo 'mobile_hide_welcome';} ?>">
        <div class="text_block_wrap">
            <div class="center">
            	<?php echo do_shortcode($optimizer['welcm_textarea_id']); ?>
            </div>
        </div>
    </div>
<!--Text Block END-->
