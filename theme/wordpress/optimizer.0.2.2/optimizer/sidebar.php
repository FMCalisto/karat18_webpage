<?php 
/**
 * The Sidebar for Optimizer
 *
 * Stores the sidebar area of the template. loaded in other template files with get_sidebar();
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

            <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
                <div id="sidebar" class="home_sidebar <?php if(!empty($optimizer['hide_mob_rightsdbr'])){ echo 'mobile_hide_sidebar';} ?>">
                    <div class="widgets">  
                            <?php dynamic_sidebar('sidebar'); ?>
                     </div>
                 </div>
            <?php endif; ?>
