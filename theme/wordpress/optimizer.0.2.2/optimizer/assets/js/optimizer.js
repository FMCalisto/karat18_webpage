/**
 * The Javascript file for Optimizer
 *
 * Stores all the javascript of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */

jQuery(window).ready(function() {


	/*CHECK IF TOUCH ENABLED DEVICE*/
	function is_touch_device() {
	 return (('ontouchstart' in window)
		  || (navigator.MaxTouchPoints > 0)
		  || (navigator.msMaxTouchPoints > 0));
	}
 

	if (is_touch_device()) {
		jQuery('body').addClass('touchon');
	}

	//MENU Animation
	if (jQuery(window).width() > 768) {
		
		jQuery('#topmenu ul > li').not('#topmenu ul > li.megamenu').hoverIntent(function(){
			jQuery(this).find('.sub-menu, ul.children').not('.sub-menu .sub-menu, ul.children ul.children').removeClass('animated fadeOut').addClass('animated fadeInUp menushow');
		}, function(){
			jQuery(this).find('.sub-menu, ul.children').not('.sub-menu .sub-menu, ul.children ul.children').addClass('animated fadeOut').delay(300).queue(function(next){ jQuery(this).removeClass("animated fadeInUp menushow");next();});
	});
	
		jQuery('#topmenu ul li ul li').not('#topmenu ul li.megamenu ul li').hoverIntent(function(){
			jQuery(this).find('.sub-menu, ul.children').removeClass('animated fadeOut').addClass('animated fadeInUp menushow');
		}, function(){
			jQuery(this).find('.sub-menu, ul.children').addClass('animated fadeOut').delay(300).queue(function(next){
						jQuery(this).removeClass("animated fadeInUp menushow");next();});
		});
	
	}

	//BLOCKS Equal height
	jQuery('.block_type1 .midrow_blocks_wrap').waitForImages(function() {
		jQuery('.mid_block_content').matchHeight();
	});
	
	//Layout1 Animation
	var divs = jQuery(".lay1 .hentry");
	for(var i = 0; i < divs.length; i+=3) {
	  divs.slice(i, i+3).wrapAll("<div class='ast_row'></div>");
	}
	if (jQuery(window).width() < 1200) {
		var flaywidth = jQuery('.lay1 .hentry').width();
		jQuery('.lay1 .post_image').css({"maxHeight":(flaywidth * 66)/100});
	}
	jQuery('.lay1 .postitle a:empty').closest("h2").addClass('no_title');
	jQuery('.no_title').css({"padding":"0"});
	
	jQuery('.lay1 h2.postitle a').each(function() {
        if(jQuery(this).height() >80){   jQuery(this).parent().parent().parent().addClass('lowreadmo');   }
    });
	jQuery('.lts_layout1 .listing-item h2').each(function() {
        if(jQuery(this).outerHeight() >76){   jQuery(this).parent().addClass('lowreadmo');   }
    });
	
	// TO_TOP
	jQuery(window).bind("scroll", function() {
		if (jQuery(this).scrollTop() > 800) {
			jQuery(".to_top").fadeIn('slow');
		} else {
			jQuery(".to_top").fadeOut('fast');
		}
	});
	jQuery(".to_top").click(function() {
	  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});

	//Hide Homepage Elemnts if empty
	jQuery('.home_blocks').each(function () {
		if(jQuery(this).html().length > 3) {
			jQuery(this).addClass('activeblock');
			}
	});
	jQuery('.lay1, .lay2, .lay3, .lay4, .lay5, .lay6').not(':has(.hentry), :has(.type-product)').css({"display":"none"});


	//STATIC SLIDER IMAGE FIXED
	jQuery('.stat_has_img').waitForImages(function() {
		var statimg = jQuery(".stat_has_img .stat_bg_img").attr('src');
		var statimgheight = jQuery(".stat_has_img .stat_bg_img").height();
		var hheight = jQuery(".header").height();
		jQuery("body.home").prepend('<div class="stat_bg" style="background-image:url('+statimg+'); height:'+statimgheight+'px" /><div class="stat_bg_overlay overlay_off" style="height:'+statimgheight+'px" />');
		jQuery('#slidera').css({"minHeight":"initial"});
		
		//Static Slider Fade on scroll
		jQuery('.home .stat_has_img').waypoint(function() {
		  jQuery(".home .stat_bg_overlay").removeClass("overlay_off").addClass("overlay_on");
		}, { offset: '-170px' });	

		//Header color on scroll
		jQuery('.home .stat_has_img').waypoint(function() {
		  jQuery(".is-sticky .header").addClass("headcolor");
		}, { offset: '-'+statimgheight/3+'px' });	
		
		jQuery('.home .stat_has_img').waypoint(function() {
		  jQuery(".home .stat_bg_overlay").removeClass("overlay_on").addClass("overlay_off");
		  jQuery(".is-sticky .header").removeClass("headcolor");
		}, { offset: '-90px' });
	});	
	jQuery('.stat_has_img').waitForImages(function() {
		var resizeTimer;
		jQuery(window).resize(function() {
		  clearTimeout(resizeTimer);
		  resizeTimer = setTimeout(function() {
			var body_size = jQuery('.stat_has_img .stat_bg_img').height();
			jQuery('#stat_img, .stat_bg').height(body_size);
		  }, 50);
		});
	});
	


jQuery(window).bind("load resize", function() {
	if (jQuery(window).width() <= 480) {	
		jQuery(".stat_bg_img").css({"opacity":"0"});
		jQuery('.stat_content_inner').waitForImages(function() { jQuery("#stat_img").height(jQuery(".stat_content_inner").height());  });
		var statbg = jQuery(".stat_bg_img").attr('src');
		jQuery("#stat_img").css({"background":"url("+statbg+")", "background-repeat":"no-repeat", "background-size":"cover"});
	}
	if (jQuery(window).width() <= 960 <= 480) {	
		var statbg = jQuery(".stat_bg_img").attr('src');
		jQuery("#stat_img").css({"background":"url("+statbg+") top center", "background-repeat":"no-repeat", "background-size":"cover"});
		jQuery('.has_trans_header .stat_content_inner, .has_trans_header .header').waitForImages(function() { 
			var mhheight = jQuery(".has_trans_header .header").height();
			jQuery(".has_trans_header .stat_content_inner").css({"paddingTop":mhheight});
			
		});
	}
});
//WAYPOINT ANIMATIONS
if (jQuery(window).width() > 480) {	
	
		jQuery('.home #zn_nivo, .home #accordion').waitForImages(function() {
			//Header color on scroll
			var sliderheight = jQuery('.home #zn_nivo, .home #accordion').height();
			jQuery('.home #zn_nivo, .home #accordion').waypoint(function() {
			  jQuery(".is-sticky .header").addClass("headcolor");
			}, { offset: '-'+sliderheight/2+'px' });	
			
			jQuery('.home #zn_nivo, .home #accordion').waypoint(function() {
			  jQuery(".is-sticky .header").removeClass("headcolor");
			}, { offset: '-90px' });
		});	
		
			
	//ABOUT ANIMATION
	jQuery('.aboutblock .text_block_wrap').css({"opacity":"0"});
	jQuery('.aboutblock .text_block_wrap').waypoint(function() {
	  jQuery(this).addClass('animated fadeInUp');
	}, { offset: '90%' });
	  
	//BLOCKS Animation
	jQuery('.block_type2 .midrow_blocks .midrow_block').css({"opacity":"0"});
	jQuery('.block_type1 .midrow_blocks').waypoint(function() {
		jQuery(this).addClass('animated bounceIn');
	  }, { offset: '90%' });
	jQuery('.block_type2 .midrow_blocks .midrow_block').waypoint(function() {
		jQuery(this).addClass('animated fadeInUp');
	  }, { offset: '90%' });
	
	//WELCOME Animation
	jQuery('.welcmblock .text_block_wrap').css({"opacity":"0"});
	jQuery('.welcmblock .text_block_wrap').waypoint(function() {
		jQuery(this).addClass('animated fadeIn');
	  }, { offset: '90%' });
	  
	//Posts Animation
	jQuery('.home .postsblck .center').css({"opacity":"0"});
	jQuery('.home .postsblck .center').waypoint(function() {
		jQuery(this).addClass('animated fadeInUp');
	  }, { offset: '85%' });

}



//Next Previous post button Link
    var link = jQuery('.ast-next > a').attr('href');
    jQuery('.right_arro').attr('href', link);

    var link = jQuery('.ast-prev > a').attr('href');
    jQuery('.left_arro').attr('href', link);

	//Gallery Template
	jQuery("#sidebar .widget_pages ul li a, #sidebar .widget_meta ul li a, #sidebar .widget_nav_menu ul li a, #sidebar .widget_categories ul li a, #sidebar .widget_recent_entries ul li a, #sidebar .widget_recent_comments ul li, #sidebar .widget_archive ul li, #sidebar .widget_rss ul li").prepend('<i class="fa-double-angle-right"></i> ');
	jQuery('#sidebar .fa-double-angle-right').css({"opacity":"0.5"});



//Mobile Menu
	var padmenu = jQuery("#simple-menu").html();
	jQuery('#simple-menu').sidr({
      name: 'sidr-main',
      source: '#topmenu',
	  side: 'right'
    });
	jQuery(".sidr").prepend("<div class='pad_menutitle'>"+padmenu+"<span><i class='fa-times'></i></span></div>");
	
	jQuery(".pad_menutitle span").click(function() {
		jQuery.sidr('close', 'sidr-main')
		preventDefaultEvents: false;
		
	});
	//If the topmenu is empty remove it
	if (jQuery(window).width() < 1025) {
		if(jQuery("#topmenu:has(ul)").length == 0){
			jQuery('#simple-menu').addClass('hide_mob_menu');
		}
	}


//NivoSlider Navigation Bug Fix
if (jQuery(window).width() < 480) {
	jQuery(".nivo-control").text('');
}

	//slider porgressbar loader
	jQuery(function () {
		var n = 0,
			$imgs = jQuery('.slider-wrapper .sldimg'),
			val = 100 / $imgs.length,
			$bar = jQuery('#astbar');
			$progrssn = jQuery('.progrssn');
	
		$imgs.load(function () {
			n = n + val;
			// for displaying purposes
			$progrssn.css({"bottom":n + '%'});
			var numTruncated = parseFloat(n).toFixed(0);
			$bar.text(numTruncated+'%');
		});
		
	});
	jQuery('.slider-wrapper').waitForImages(function() {
		jQuery("#zn_nivo, .nivo-controlNav, #slide_acord, .nivoinner").css({"display":"block"});
		jQuery(".pbar_wrap").fadeOut();
	});
	
	//HEADER SWITCH
	jQuery('#slidera').has('#stat_img').addClass('selected_stat');
	jQuery('#slidera').has('.slide_wrap').addClass('selected_slide');


	if (jQuery(window).width() < 1025) {
	 jQuery('.dlthref').removeAttr("href");
	}

	//WIDGET BORDER
	jQuery("#sidebar .widget .widgettitle, .related_h3, h3#comments, #reply-title").after("<span class='widget_border' />");
	
	//Rearragnge comment form box
	jQuery(".comm_wrap").insertAfter(".comment-form-comment");
	jQuery(".comm_wrap input").placeholder();
	
	//404 class is not being added in body
	jQuery('body').has('.error_msg').addClass('error404');
	
	//Next-Previous Post Image Check
	jQuery(".nav-box.ast-prev, .nav-box.ast-next").not(":has(img)").addClass('navbox-noimg');
	
	//Hide Footer if Empty
	jQuery(".foot_soc").not(":has(i)").addClass('hide_footsoc');
	
	//Make sure the footer always stays to the bottom of the page when the page is short
	var docHeight = jQuery(window).height();
	var footerHeight = jQuery('#footer').height();
	var footerTop = jQuery('#footer').position().top + footerHeight;
	   
	if (footerTop < docHeight) {  jQuery('#footer').css('margin-top', 1 + (docHeight - footerTop) + 'px');  }
});
