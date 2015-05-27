<?php 
/**
 * The index page of Optimizer
 *
 * Displays the home page elements.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;
?>

<?php get_header(); ?>

<?php if ( is_front_page() ) { ?>
<div class="home_wrap layer_wrapper">
	<div class="fixed_wrap fixindex">


<?php
$home_blocks = $optimizer['home_sort_id'];

if ($home_blocks):

foreach ($home_blocks as $key=>$value) {

    switch($key) {
	//About Section
    case 'about':
    ?>
    <?php $about = $optimizer['home_sort_id']; if(!empty($about['about'])){ ?>
    	<div class="home_blocks aboutblock"><?php get_template_part('frontpage/content','about'); ?></div>
	<?php } ?>
    
    <?php
    //Welcome Text
	break;
    case 'welcome-text':
    ?>
    <?php $welcome = $optimizer['home_sort_id']; if(!empty($welcome['welcome-text'])){ ?>
    	<div class="home_blocks welcmblock"><?php get_template_part('frontpage/content','welcome-text'); ?></div>
    <?php } ?>
    
    <?php
	//Blocks
	break;
    case 'blocks':
    ?>
    <?php $blocks = $optimizer['home_sort_id']; if(!empty($blocks['blocks'])){ ?>
		<div class="home_blocks ast_blocks"><?php get_template_part('frontpage/content','blocks'); ?></div>
    <?php } ?>
    
    <?php
	//Front Page Posts
    break;
    case 'posts':
    ?>
    	<?php $homeposts = $optimizer['home_sort_id']; if(!empty($homeposts['posts'])){ ?>
            <div class="home_blocks postsblck <?php if(!empty($optimizer['hide_mob_frontposts'])){ echo 'mobile_hide_posts';} ?>">
            <!--Latest Posts-->
				  <?php if('product' == $optimizer['n_posts_type_id']){ ?>
                      <?php get_template_part('template_parts/post','woo'); ?>
                  <?php }else{ ?>
                      <?php get_template_part('template_parts/post','layout'.absint($optimizer['front_layout_id']).''); ?>
                  <?php } ?>

            <!--Latest Posts END-->
            </div>
        <?php } ?>


    <?php
    break;
    }

}

endif;
?>


</div>
</div><!--layer_wrapper class END-->

<?php }else{ ?>
<div class="fixed_site">
	<div class="fixed_wrap fixindex">
	<?php get_template_part('template_parts/post','layout4'); ?> 
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>