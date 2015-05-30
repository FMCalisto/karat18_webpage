<?php 
/**
 * The Custom Javascript for Optimizer
 *
 * Loads the Custom Javascript of the template in the footer.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<?php if( 'static' == $optimizer['slider_type_id'] && empty($optimizer['head_transparent'])){ ?>
<script type="text/javascript">
	jQuery(window).load(function() {
		//STATIC SLIDER IMAGE FIXED
		var statimgheight = jQuery(".stat_has_img img").height();
		<?php if ( is_admin_bar_showing() ) { ?>var hheight = jQuery(".header").height() + 32;<?php }else{ ?>var hheight = jQuery(".header").height();<?php } ?>
		jQuery('.stat_bg').css({"background-position-y":hheight+"px", "top":hheight+"px"});
		jQuery('.stat_bg_overlay').css({ "top":hheight+"px"});
		});		
		jQuery(window).on('scroll', function() {
			var scrollTop = jQuery(this).scrollTop();
			var hheight = jQuery(".header").height();
				if ( !scrollTop ) {
					jQuery('.stat_bg').css({"background-position-y":hheight+"px"});
				}else{
					jQuery('.stat_bg').css({"background-position-y":"0px"});
				}
		});

</script>

<?php } ?>


<?php /*?><!------------------------------------------------------------Other Javascripts--------------------------------------------------------><?php */?>

<script type="text/javascript">
jQuery(document).ready(function(){
	//Parallax EFFECTS
	<?php if( $optimizer['welcome_bg_image']['url']){ ?>jQuery('.text_block').parallax("50%", 2.7);<?php } ?>
});	

jQuery(window).load(function() {
	//Submenu position Fix
	var headinner = jQuery(".head_inner").outerHeight()
	jQuery('#topmenu .menu-header li.megamenu > ul').css({"marginTop":"0px", "top": headinner/1.2+'px'});
});


//Hide Slider until its loaded
jQuery('#zn_nivo, .nivo-controlNav').css({"display":"none"});	

	//Midrow Blocks Equal Width
	if(jQuery('.midrow_block').length == 4){ jQuery('.midrow_blocks').addClass('fourblocks'); }
	if(jQuery('.midrow_block').length == 3){ jQuery('.midrow_blocks').addClass('threeblocks'); }
	if(jQuery('.midrow_block').length == 2){ jQuery('.midrow_blocks').addClass('twoblocks'); }
	if(jQuery('.midrow_block').length == 1){ jQuery('.midrow_blocks').addClass('oneblock'); }

<?php if ('numbered_ajax' == $optimizer['navigation_type']) { ?>
//AJAX PAGINATION
jQuery(document).ready(function(){

jQuery('.ast_pagenav span').replaceWith(function() {
		var pathname = window.location.pathname;
    var url = (jQuery(this).text());
	 <?php global $wp; $current_url = add_query_arg( $wp->query_string, '', home_url('/', $wp->request ) ); ?>
	 if (jQuery("span.page-numbers").prev().length === 0) {
    return '<a class="page-numbers current" href="<?php echo $current_url ?><?php if(is_category() || is_search() || is_author() || $template = get_post_meta( get_the_ID(), '_wp_page_template', true ) == 'page-blog_template.php') { ?>&paged=1<?php }else{ ?>?paged=1<?php } ?>" target="_blank">' + url + '</a>';
	 }else{
		    return '<a class="page-numbers current" href="<?php echo $current_url ?>" target="_blank">' + url + '</a>'; 
	 }
});

jQuery('.ast_pagenav span.page-numbers').each(function () {
	var pathname = window.location.pathname;
	
    var href = jQuery(this).attr('href');
	<?php if(is_category() || is_tag() || is_search() || is_author()) {  ?>
	jQuery(this).attr('href', href + '&paged=1');
	<?php }else{ ?>
    jQuery(this).attr('href', href + '?paged=1');
	<?php } ?>	
});

jQuery('.ast_pagenav a').each(function(){
        
	<?php if(is_category() || is_search() || is_author()) {  ?>
	this.href = '<?php echo $current_url ?>&paged='+jQuery(this).text()+'';
	<?php }else{ ?>
    this.href = this.href.replace('/page/', '?paged=');
	<?php } ?>
});
    jQuery('.ast_pagenav a').on('click', function(e)  {
	jQuery('.ast_pagenav a, span.page-numbers').removeClass('current'); // remove if already existant
    jQuery(this).addClass('current');


	e.preventDefault();

	
	<?php 
	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );

	if( is_author() || ($template == 'template_parts/page-blog_template.php' ) ){  ?>
	//Layout 4 Ajax
	var link = jQuery(this).attr('href');
	jQuery('.lay4_inner').html('<div class="ast_ajaxwrap"><div class="ast_ajax"></div></div>').load(link + '.lay4_inner .hentry', function(){
    jQuery('.lay4_inner').fadeIn(500); 
	jQuery(".hentry").hide().each(function() {
  	jQuery(this).fadeIn(500, "easeInSine");
	});
	//Layout 4 Ajax END
	<?php }else{ ?>
	
	
<?php if("1" == $optimizer['cat_layout_id'] && !is_home()){ ?>
	//Layout 1 Ajax
			var link = jQuery(this).attr('href');
	jQuery('.lay1_wrap').html('<div class="ast_ajaxwrap"><div class="ast_ajax"></div></div>').load(link + '.lay1_wrap .hentry', function(){
		

		var divs = jQuery(".lay1 .hentry");
		for(var i = 0; i < divs.length; i+=3) {
		  divs.slice(i, i+3).wrapAll("<div class='ast_row'></div>");
		}

	if (jQuery(window).width() < 1200) {	
		var flaywidth = jQuery('.lay1 .hentry').width();
		jQuery('.lay1 .ast_row').height( (flaywidth * 66)/100);
		jQuery('.lay1 .post_image').css({"maxHeight":(flaywidth * 66)/100});
	}
		  
	if (jQuery(window).width() > 360) {			  
		jQuery('.lay1_wrap').fadeIn(500); 
		jQuery(".hentry").hide().each(function() {
		jQuery(this).fadeIn(500, "easeInSine");
		});
	}
	jQuery('.lay1 h2.postitle a').each(function() {
        if(jQuery(this).height() >80){   jQuery(this).parent().parent().parent().addClass('lowreadmo');   }
    });
	//Layout 1 Ajax END
<?php }elseif("1" == $optimizer['front_layout_id'] && is_home()){ ?>
	//Layout 1 Ajax
			var link = jQuery(this).attr('href');
	jQuery('.lay1_wrap').html('<div class="ast_ajaxwrap"><div class="ast_ajax"></div></div>').load(link + '.lay1_wrap .hentry', function(){
		

		var divs = jQuery(".lay1 .hentry");
		for(var i = 0; i < divs.length; i+=3) {
		  divs.slice(i, i+3).wrapAll("<div class='ast_row'></div>");
		}

	
	if (jQuery(window).width() < 1200) {	
		var flaywidth = jQuery('.lay1 .hentry').width();
		jQuery('.lay1 .ast_row').height( (flaywidth * 66)/100);
		jQuery('.lay1 .post_image').css({"maxHeight":(flaywidth * 66)/100});
	}
			  
	if (jQuery(window).width() > 360) {			  
		jQuery('.lay1_wrap').fadeIn(500); 
		jQuery(".hentry").hide().each(function() {
		jQuery(this).fadeIn(500, "easeInSine");
		});

	}
	jQuery('.lay1 h2.postitle a').each(function() {
        if(jQuery(this).height() >80){   jQuery(this).parent().parent().parent().addClass('lowreadmo');   }
    });
	//Layout 1 Ajax END
<?php } ?>

<?php if("4" == $optimizer['cat_layout_id'] && !is_home()){ ?>
	//Layout 4 Ajax
	var link = jQuery(this).attr('href');
	jQuery('.lay4_inner').html('<div class="ast_ajaxwrap"><div class="ast_ajax"></div></div>').load(link + '.lay4_inner .hentry', function(){
    jQuery('.lay4_inner').fadeIn(500); 
	jQuery(".hentry").hide().each(function() {
  	jQuery(this).fadeIn(500, "easeInSine");
	});
	//Layout 4 Ajax END
<?php }elseif("4" == $optimizer['front_layout_id']&& is_home()){ ?>
	//Layout 4 Ajax
	var link = jQuery(this).attr('href');
	jQuery('.lay4_inner').html('<div class="ast_ajaxwrap"><div class="ast_ajax"></div></div>').load(link + '.lay4_inner .hentry', function(){
    jQuery('.lay4_inner').fadeIn(500); 
	jQuery(".hentry").hide().each(function() {
  	jQuery(this).fadeIn(500, "easeInSine");
	});
	//Layout 4 Ajax END
<?php } ?>

<?php } ?>	
	
	});

    });

});  // end ready function
<?php } ?>
</script> 