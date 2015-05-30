<?php global $optimizer; ?>

<div id="stat_img" class="<?php if(!empty($optimizer['static_image_id']['url'])){ ?> stat_has_img<?php } ?><?php if(!empty($optimizer['static_gallery'])){ ?> stat_has_slideshow<?php } ?>">

	<div class="stat_content">
    	<div class="stat_content_inner">
            <div class="center">
                <?php echo do_shortcode($optimizer['static_img_text_id']); ?>
               
               <div class="cta_buttons">
				   <?php if(!empty($optimizer['static_cta1_text'])) { ?>
                   <a class="static_cta1 lts_button lt_rounded cta_<?php echo esc_attr($optimizer['static_cta1_txt_style']); ?>" href="<?php echo do_shortcode(esc_url($optimizer['static_cta1_link'])); ?>"><?php echo do_shortcode($optimizer['static_cta1_text']); ?></a>
                   <?php } ?>
				   <?php if(!empty($optimizer['static_cta2_text'])) { ?>
                   <a class="static_cta2 lts_button lt_rounded cta_<?php echo esc_attr($optimizer['static_cta2_txt_style']); ?>" href="<?php echo do_shortcode(esc_url($optimizer['static_cta2_link'])); ?>"><?php echo do_shortcode($optimizer['static_cta2_text']); ?></a>
                   <?php } ?>
               </div> 
            </div>
        </div>
	</div>
    

	<?php $statimg = $optimizer['static_image_id']; ?>
		<?php if(!empty($statimg['url'])){ ?>
    		<img id="<?php echo esc_attr($statimg['id']); ?>" class="stat_bg_img"  width="<?php echo absint($statimg['width']); ?>" height="<?php echo absint($statimg['height']); ?>" src="<?php echo esc_url($statimg['url']); ?>" />
		<?php } ?>

</div>