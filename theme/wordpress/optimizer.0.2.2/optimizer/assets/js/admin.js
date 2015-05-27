// JavaScript Document
jQuery(window).ready(function() {
	jQuery("#redux-sub-footer").after("<a class='lt_logo' target='_blank' href='http://layerthemes.com'>Layerthemes</a>");
	jQuery('.redux-group-tab .form-table tr').each( function(){ 
	var classtr = jQuery(this).find('fieldset').attr('id');
	jQuery(this).addClass('tr_' + classtr);
	});
	
//PRO Message
jQuery('.subsection .redux-group-tab-link-li').each(function(index, element) {
    jQuery(this).has('.pro_feat').addClass('non_clickable');
});

//Image Select TootlIp	
jQuery('.redux-image-select img').qtip({ content: { attr: 'alt'}, style: {classes: 'qtip-dark'}});
jQuery('.non_clickable').qtip({ content: pro_msg, style: {classes: 'qtip-dark'}});


//Blocks Accordion
jQuery("#section-section-block1-start h3, #section-section-block2-start h3, #section-section-block3-start h3, #section-section-block4-start h3, #section-section-block5-start h3, #section-section-block6-start h3").prepend('<i class="el-icon-plus" /> ');
jQuery("#section-table-section-block1-start, #section-table-section-block2-start, #section-table-section-block3-start, #section-table-section-block4-start, #section-table-section-block5-start, #section-table-section-block6-start").css({"height":"0px", "overflow":"hidden", "display":"block"});

jQuery('#section-section-block1-start, #section-section-block2-start, #section-section-block3-start, #section-section-block4-start, #section-section-block5-start, #section-section-block6-start').toggle(function(){ 
jQuery("#section-table-section-block1-start, #section-table-section-block2-start, #section-table-section-block3-start, #section-table-section-block4-start, #section-table-section-block5-start, #section-table-section-block6-start").animate({"height":"0px"});
			jQuery(this).next().animate({"height":"800px"});
			jQuery(this).find("h3 i").removeClass("el-icon-plus").addClass("el-icon-minus");
		},function(){
			jQuery(this).next().animate({"height":"0px"});
			jQuery(this).find("h3 i").removeClass("el-icon-minus").addClass("el-icon-plus");
		});

//SLIDE CTA BUTTONS
jQuery("#optimizer-static_cta1_link, #optimizer-static_cta1_txt_style").appendTo(".tr_optimizer-static_cta1_text td");
jQuery("#optimizer-static_cta1_bg_color, #optimizer-static_cta1_txt_color").appendTo(".tr_optimizer-static_cta1_text td");

jQuery("#optimizer-static_cta2_link, #optimizer-static_cta2_txt_style").appendTo(".tr_optimizer-static_cta2_text td");
jQuery("#optimizer-static_cta2_bg_color, #optimizer-static_cta2_txt_color").appendTo(".tr_optimizer-static_cta2_text td");

jQuery(".tr_optimizer-static_cta1_link, .tr_optimizer-static_cta1_bg_color, .tr_optimizer-static_cta1_txt_color, .tr_optimizer-static_cta1_txt_style, .tr_optimizer-static_cta2_link, .tr_optimizer-static_cta2_bg_color, .tr_optimizer-static_cta2_txt_color, .tr_optimizer-static_cta2_txt_style").hide();


//UPGRADE TO PRO BLINK
function animateBolt() {
	jQuery('.redux-sidebar .redux-group-tab-link-a i.fa-bolt').animate({fontSize:'24px'}, 170, function(){
		jQuery('.redux-sidebar .redux-group-tab-link-a i.fa-bolt').animate({fontSize:'18px'}, 170, function(){
				animateBolt();
		});
	});
}
animateBolt();


//DatePicker
var date = jQuery('#offline_date_id').datepicker({ dateFormat: 'mm/dd/yy' }).val();
jQuery("#ui-datepicker-div").wrap('<div class="ll-skin-nigran" />');

///Documentation
jQuery(".docu_front").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_front").delay(300).fadeIn();});
jQuery(".docu_img").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_img").delay(300).fadeIn();});
jQuery(".docu_vid").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_vid").delay(300).fadeIn();});
jQuery(".docu_blog").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_blog").delay(300).fadeIn();});
jQuery(".docu_contct").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_contct").delay(300).fadeIn();});
jQuery(".docu_bg").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_bg").delay(300).fadeIn();});
jQuery(".docu_headr").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_headr").delay(300).fadeIn();});
jQuery(".docu_menu").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_menu").delay(300).fadeIn();});
jQuery(".docu_styling").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_styling").delay(300).fadeIn();});
jQuery(".docu_wdgts").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_wdgts").delay(300).fadeIn();});
jQuery(".docu_shorts").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_shorts").delay(300).fadeIn();});
jQuery(".docu_supp").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_supp").delay(300).fadeIn();});
jQuery(".docu_gallery").click(function() {jQuery('#ast_docu').fadeOut();jQuery("#docu_gallery").delay(300).fadeIn();});

jQuery(".docuback").click(function() {jQuery('#docu_gallery, #docu_front, #docu_img, #docu_vid, #docu_blog, #docu_contct, #docu_bg, #docu_headr, #docu_menu, #docu_styling, #docu_wdgts, #docu_shorts, #docu_supp').fadeOut();jQuery("#ast_docu").delay(300).fadeIn();});

//UPGRADE
	jQuery("#sub_ex, #sub_compare").hide();
	jQuery('.up_ul li').click(function(){
    	jQuery('.up_ul li').removeClass("active");
    	jQuery(this).addClass("active");
	});
	
		jQuery('.ast_why_pro').click(function(){ 
			jQuery(".sub_ex, .sub_compare").hide();
			jQuery(".sub_feat").fadeIn(300); 
		});
		jQuery('.ast_example').click(function(){ 
			jQuery(".sub_feat, .sub_compare").hide();
			jQuery(".sub_ex").fadeIn(300); 
		});
		jQuery('.ast_compare').click(function(){ 
			jQuery(".sub_ex, .sub_feat").hide();
			jQuery(".sub_compare").fadeIn(300); 
		});



jQuery("#info-optim_upgrade").parent().find("h3:first").hide();
	
	jQuery(".prem_box").toggle(function(){
		jQuery(".prem_box p").removeClass("active");
		jQuery(this).animate({"opacity":"1"}).siblings().animate({"opacity":"0.3"});
		jQuery(this).find("p").addClass("active");
	}, function(){
		jQuery(this).find("p").removeClass("active");
		jQuery(this).siblings().animate({"opacity":"1"});
	});

jQuery('.pro strong').qtip({  content: { attr: 'data-tooltip'},    style: {classes: 'qtip-tipsy' } });

(function($){$.fn.alterClass=function(removals,additions){var self=this;if(removals.indexOf("*")===-1){self.removeClass(removals);return!additions?self:self.addClass(additions)}var patt=new RegExp("\\s"+removals.replace(/\*/g,"[A-Za-z0-9-_]+").split(" ").join("\\s|\\s")+"\\s","g");self.each(function(i,it){var cn=" "+it.className+" ";while(patt.test(cn))cn=cn.replace(patt," ");it.className=$.trim(cn)});return!additions?self:self.addClass(additions)}})(jQuery);

/*!
 * jquery-timepicker v1.5.1 - A jQuery timepicker plugin inspired by Google Calendar. It supports both mouse and keyboard navigation.
 * Copyright (c) 2015 Jon Thornton - http://jonthornton.github.com/jquery-timepicker/
 * License: 
 */

!function(a){"object"==typeof exports&&exports&&"object"==typeof module&&module&&module.exports===exports?a(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(a){var b=a[0];return b.offsetWidth>0&&b.offsetHeight>0}function c(b){if(b.minTime&&(b.minTime=u(b.minTime)),b.maxTime&&(b.maxTime=u(b.maxTime)),b.durationTime&&"function"!=typeof b.durationTime&&(b.durationTime=u(b.durationTime)),"now"==b.scrollDefault?b.scrollDefault=u(new Date):b.scrollDefault?b.scrollDefault=u(b.scrollDefault):b.minTime&&(b.scrollDefault=b.minTime),b.scrollDefault&&(b.scrollDefault=f(b.scrollDefault,b)),"string"===a.type(b.timeFormat)&&b.timeFormat.match(/[gh]/)&&(b._twelveHourTime=!0),b.disableTimeRanges.length>0){for(var c in b.disableTimeRanges)b.disableTimeRanges[c]=[u(b.disableTimeRanges[c][0]),u(b.disableTimeRanges[c][1])];b.disableTimeRanges=b.disableTimeRanges.sort(function(a,b){return a[0]-b[0]});for(var c=b.disableTimeRanges.length-1;c>0;c--)b.disableTimeRanges[c][0]<=b.disableTimeRanges[c-1][1]&&(b.disableTimeRanges[c-1]=[Math.min(b.disableTimeRanges[c][0],b.disableTimeRanges[c-1][0]),Math.max(b.disableTimeRanges[c][1],b.disableTimeRanges[c-1][1])],b.disableTimeRanges.splice(c,1))}return b}function d(b){var c=b.data("timepicker-settings"),d=b.data("timepicker-list");if(d&&d.length&&(d.remove(),b.data("timepicker-list",!1)),c.useSelect){d=a("<select />",{"class":"ui-timepicker-select"});var f=d}else{d=a("<ul />",{"class":"ui-timepicker-list"});var f=a("<div />",{"class":"ui-timepicker-wrapper",tabindex:-1});f.css({display:"none",position:"absolute"}).append(d)}if(c.noneOption)if(c.noneOption===!0&&(c.noneOption=c.useSelect?"Time...":"None"),a.isArray(c.noneOption)){for(var h in c.noneOption)if(parseInt(h,10)==h){var i=e(c.noneOption[h],c.useSelect);d.append(i)}}else{var i=e(c.noneOption,c.useSelect);d.append(i)}c.className&&f.addClass(c.className),null===c.minTime&&null===c.durationTime||!c.showDuration||(f.addClass("ui-timepicker-with-duration"),f.addClass("ui-timepicker-step-"+c.step));var k=c.minTime;"function"==typeof c.durationTime?k=u(c.durationTime()):null!==c.durationTime&&(k=c.durationTime);var m=null!==c.minTime?c.minTime:0,n=null!==c.maxTime?c.maxTime:m+w-1;m>=n&&(n+=w),n===w-1&&"string"===a.type(c.timeFormat)&&c.show2400&&(n=w);for(var p=c.disableTimeRanges,q=0,v=p.length,h=m;n>=h;h+=60*c.step){var x=h,z=t(x,c);if(c.useSelect){var A=a("<option />",{value:z});A.text(z)}else{var A=a("<li />");A.data("time",86400>=x?x:x%86400),A.text(z)}if((null!==c.minTime||null!==c.durationTime)&&c.showDuration){var B=s(h-k,c.step);if(c.useSelect)A.text(A.text()+" ("+B+")");else{var C=a("<span />",{"class":"ui-timepicker-duration"});C.text(" ("+B+")"),A.append(C)}}v>q&&(x>=p[q][1]&&(q+=1),p[q]&&x>=p[q][0]&&x<p[q][1]&&(c.useSelect?A.prop("disabled",!0):A.addClass("ui-timepicker-disabled"))),d.append(A)}if(f.data("timepicker-input",b),b.data("timepicker-list",f),c.useSelect)b.val()&&d.val(g(b.val(),c)),d.on("focus",function(){a(this).data("timepicker-input").trigger("showTimepicker")}),d.on("blur",function(){a(this).data("timepicker-input").trigger("hideTimepicker")}),d.on("change",function(){o(b,a(this).val(),"select")}),o(b,d.val()),b.hide().after(d);else{var D=c.appendTo;"string"==typeof D?D=a(D):"function"==typeof D&&(D=D(b)),D.append(f),l(b,d),d.on("mousedown","li",function(){b.off("focus.timepicker"),b.on("focus.timepicker-ie-hack",function(){b.off("focus.timepicker-ie-hack"),b.on("focus.timepicker",y.show)}),j(b)||b[0].focus(),d.find("li").removeClass("ui-timepicker-selected"),a(this).addClass("ui-timepicker-selected"),r(b)&&(b.trigger("hideTimepicker"),f.hide())})}}function e(b,c){var d,e,f;return"object"==typeof b?(d=b.label,e=b.className,f=b.value):"string"==typeof b?d=b:a.error("Invalid noneOption value"),c?a("<option />",{value:f,"class":e,text:d}):a("<li />",{"class":e,text:d}).data("time",f)}function f(b,c){if(a.isNumeric(b)||(b=u(b)),null===b)return null;var d=b%(60*c.step);return d>=30*c.step?b+=60*c.step-d:b-=d,b}function g(a,b){return a=f(a,b),null!==a?t(a,b):void 0}function h(){return new Date(1970,1,1,0,0,0)}function i(b){var c=a(b.target),d=c.closest(".ui-timepicker-input");0===d.length&&0===c.closest(".ui-timepicker-wrapper").length&&(y.hide(),a(document).unbind(".ui-timepicker"))}function j(a){var b=a.data("timepicker-settings");return(window.navigator.msMaxTouchPoints||"ontouchstart"in document)&&b.disableTouchKeyboard}function k(b,c,d){if(!d&&0!==d)return!1;var e=b.data("timepicker-settings"),f=!1,g=30*e.step;return c.find("li").each(function(b,c){var e=a(c);if("number"==typeof e.data("time")){var h=e.data("time")-d;return Math.abs(h)<g||h==g?(f=e,!1):void 0}}),f}function l(a,b){b.find("li").removeClass("ui-timepicker-selected");var c=u(n(a),a.data("timepicker-settings"));if(null!==c){var d=k(a,b,c);if(d){var e=d.offset().top-b.offset().top;(e+d.outerHeight()>b.outerHeight()||0>e)&&b.scrollTop(b.scrollTop()+d.position().top-d.outerHeight()),d.addClass("ui-timepicker-selected")}}}function m(b,c){if(""!==this.value&&"timepicker"!=c){var d=a(this);if(!d.is(":focus")||b&&"change"==b.type){var e=d.data("timepicker-settings"),f=u(this.value,e);if(null===f)return void d.trigger("timeFormatError");var g=!1;if(null!==e.minTime&&f<e.minTime?g=!0:null!==e.maxTime&&f>e.maxTime&&(g=!0),a.each(e.disableTimeRanges,function(){return f>=this[0]&&f<this[1]?(g=!0,!1):void 0}),e.forceRoundTime){var h=f%(60*e.step);h>=30*e.step?f+=60*e.step-h:f-=h}var i=t(f,e);g?o(d,i,"error")&&d.trigger("timeRangeError"):o(d,i)}}}function n(a){return a.is("input")?a.val():a.data("ui-timepicker-value")}function o(a,b,c){if(a.is("input")){a.val(b);var d=a.data("timepicker-settings");d.useSelect&&"select"!=c&&a.data("timepicker-list").val(g(b,d))}return a.data("ui-timepicker-value")!=b?(a.data("ui-timepicker-value",b),"select"==c?a.trigger("selectTime").trigger("changeTime").trigger("change","timepicker"):"error"!=c&&a.trigger("changeTime"),!0):(a.trigger("selectTime"),!1)}function p(c){var d=a(this),e=d.data("timepicker-list");if(!e||!b(e)){if(40!=c.keyCode)return!0;y.show.call(d.get(0)),e=d.data("timepicker-list"),j(d)||d.focus()}switch(c.keyCode){case 13:return r(d)&&y.hide.apply(this),c.preventDefault(),!1;case 38:var f=e.find(".ui-timepicker-selected");return f.length?f.is(":first-child")||(f.removeClass("ui-timepicker-selected"),f.prev().addClass("ui-timepicker-selected"),f.prev().position().top<f.outerHeight()&&e.scrollTop(e.scrollTop()-f.outerHeight())):(e.find("li").each(function(b,c){return a(c).position().top>0?(f=a(c),!1):void 0}),f.addClass("ui-timepicker-selected")),!1;case 40:return f=e.find(".ui-timepicker-selected"),0===f.length?(e.find("li").each(function(b,c){return a(c).position().top>0?(f=a(c),!1):void 0}),f.addClass("ui-timepicker-selected")):f.is(":last-child")||(f.removeClass("ui-timepicker-selected"),f.next().addClass("ui-timepicker-selected"),f.next().position().top+2*f.outerHeight()>e.outerHeight()&&e.scrollTop(e.scrollTop()+f.outerHeight())),!1;case 27:e.find("li").removeClass("ui-timepicker-selected"),y.hide();break;case 9:y.hide();break;default:return!0}}function q(c){var d=a(this),e=d.data("timepicker-list");if(!e||!b(e))return!0;if(!d.data("timepicker-settings").typeaheadHighlight)return e.find("li").removeClass("ui-timepicker-selected"),!0;switch(c.keyCode){case 96:case 97:case 98:case 99:case 100:case 101:case 102:case 103:case 104:case 105:case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 65:case 77:case 80:case 186:case 8:case 46:l(d,e);break;default:return}}function r(a){var b=a.data("timepicker-settings"),c=a.data("timepicker-list"),d=null,e=c.find(".ui-timepicker-selected");if(e.hasClass("ui-timepicker-disabled"))return!1;if(e.length&&(d=e.data("time")),null!==d)if("string"==typeof d)a.val(d),a.trigger("selectTime").trigger("changeTime").trigger("change","timepicker");else{var f=t(d,b);o(a,f,"select")}return!0}function s(a,b){a=Math.abs(a);var c,d,e=Math.round(a/60),f=[];return 60>e?f=[e,x.mins]:(c=Math.floor(e/60),d=e%60,30==b&&30==d&&(c+=x.decimal+5),f.push(c),f.push(1==c?x.hr:x.hrs),30!=b&&d&&(f.push(d),f.push(x.mins))),f.join(" ")}function t(b,c){if(null!==b){var d=new Date(v.valueOf()+1e3*b);if(!isNaN(d.getTime())){if("function"===a.type(c.timeFormat))return c.timeFormat(d);for(var e,f,g="",h=0;h<c.timeFormat.length;h++)switch(f=c.timeFormat.charAt(h)){case"a":g+=d.getHours()>11?x.pm:x.am;break;case"A":g+=d.getHours()>11?x.PM:x.AM;break;case"g":e=d.getHours()%12,g+=0===e?"12":e;break;case"G":e=d.getHours(),b===w&&(e=24),g+=e;break;case"h":e=d.getHours()%12,0!==e&&10>e&&(e="0"+e),g+=0===e?"12":e;break;case"H":e=d.getHours(),b===w&&(e=24),g+=e>9?e:"0"+e;break;case"i":var i=d.getMinutes();g+=i>9?i:"0"+i;break;case"s":b=d.getSeconds(),g+=b>9?b:"0"+b;break;case"\\":h++,g+=format.charAt(h);break;default:g+=f}return g}}}function u(a,b){if(""===a)return null;if(!a||a+0==a)return a;if("object"==typeof a)return 3600*a.getHours()+60*a.getMinutes()+a.getSeconds();a=a.toLowerCase().replace(".",""),("a"==a.slice(-1)||"p"==a.slice(-1))&&(a+="m");var c=new RegExp("^([0-2]?[0-9])\\W?([0-5][0-9])?\\W?([0-5][0-9])?\\s*("+x.am.replace(".","")+"|"+x.pm.replace(".","")+"|"+x.AM.replace(".","")+"|"+x.PM.replace(".","")+")?$"),d=a.match(c);if(!d)return null;var e=parseInt(1*d[1],10),f=d[4],g=e;if(12>=e&&f){var h=d[4]==x.pm||d[4]==x.PM;g=12==e?h?12:0:e+(h?12:0)}var i=1*d[2]||0,j=1*d[3]||0,k=3600*g+60*i+j;if(!f&&b&&b._twelveHourTime&&b.scrollDefault){var l=k-b.scrollDefault;0>l&&l>=w/-2&&(k=(k+w/2)%w)}return k}var v=h(),w=86400,x={am:"am",pm:"pm",AM:"AM",PM:"PM",decimal:".",mins:"mins",hr:"hr",hrs:"hrs"},y={init:function(b){return this.each(function(){var e=a(this),f=[];for(var g in a.fn.timepicker.defaults)e.data(g)&&(f[g]=e.data(g));var h=a.extend({},a.fn.timepicker.defaults,f,b);h.lang&&(x=a.extend(x,h.lang)),h=c(h),e.data("timepicker-settings",h),e.addClass("ui-timepicker-input"),h.useSelect?d(e):(e.prop("autocomplete","off"),e.on("click.timepicker focus.timepicker",y.show),e.on("change.timepicker",m),e.on("keydown.timepicker",p),e.on("keyup.timepicker",q),m.call(e.get(0)))})},show:function(c){var e=a(this),f=e.data("timepicker-settings");if(c){if(!f.showOnFocus)return!0;c.preventDefault()}if(f.useSelect)return void e.data("timepicker-list").focus();j(e)&&e.blur();var g=e.data("timepicker-list");if(!e.prop("readonly")&&(g&&0!==g.length&&"function"!=typeof f.durationTime||(d(e),g=e.data("timepicker-list")),!b(g))){y.hide(),g.show();var h={};h.left="rtl"==f.orientation?e.offset().left+e.outerWidth()-g.outerWidth()+parseInt(g.css("marginLeft").replace("px",""),10):e.offset().left+parseInt(g.css("marginLeft").replace("px",""),10),e.offset().top+e.outerHeight(!0)+g.outerHeight()>a(window).height()+a(window).scrollTop()?(g.addClass("ui-timepicker-positioned-top"),h.top=e.offset().top-g.outerHeight()+parseInt(g.css("marginTop").replace("px",""),10)):(g.removeClass("ui-timepicker-positioned-top"),h.top=e.offset().top+e.outerHeight()+parseInt(g.css("marginTop").replace("px",""),10)),g.offset(h);var l=g.find(".ui-timepicker-selected");if(l.length||(n(e)?l=k(e,g,u(n(e))):f.scrollDefault&&(l=k(e,g,f.scrollDefault))),l&&l.length){var m=g.scrollTop()+l.position().top-l.outerHeight();g.scrollTop(m)}else g.scrollTop(0);return a(document).on("touchstart.ui-timepicker mousedown.ui-timepicker",i),f.closeOnWindowScroll&&a(document).on("scroll.ui-timepicker",i),e.trigger("showTimepicker"),this}},hide:function(){var c=a(this),d=c.data("timepicker-settings");return d&&d.useSelect&&c.blur(),a(".ui-timepicker-wrapper").each(function(){var c=a(this);if(b(c)){var d=c.data("timepicker-input"),e=d.data("timepicker-settings");e&&e.selectOnBlur&&r(d),c.hide(),d.trigger("hideTimepicker")}}),this},option:function(b,e){return this.each(function(){var f=a(this),g=f.data("timepicker-settings"),h=f.data("timepicker-list");if("object"==typeof b)g=a.extend(g,b);else if("string"==typeof b&&"undefined"!=typeof e)g[b]=e;else if("string"==typeof b)return g[b];g=c(g),f.data("timepicker-settings",g),h&&(h.remove(),f.data("timepicker-list",!1)),g.useSelect&&d(f)})},getSecondsFromMidnight:function(){return u(n(this))},getTime:function(a){var b=this,c=n(b);if(!c)return null;a||(a=new Date);var d=u(c),e=new Date(a);return e.setHours(d/3600),e.setMinutes(d%3600/60),e.setSeconds(d%60),e.setMilliseconds(0),e},setTime:function(a){var b=this,c=b.data("timepicker-settings");if(c.forceRoundTime)var d=g(a,c);else var d=t(u(a),c);return o(b,d),b.data("timepicker-list")&&l(b,b.data("timepicker-list")),this},remove:function(){var a=this;if(a.hasClass("ui-timepicker-input")){var b=a.data("timepicker-settings");return a.removeAttr("autocomplete","off"),a.removeClass("ui-timepicker-input"),a.removeData("timepicker-settings"),a.off(".timepicker"),a.data("timepicker-list")&&a.data("timepicker-list").remove(),b.useSelect&&a.show(),a.removeData("timepicker-list"),this}}};a.fn.timepicker=function(b){return this.length?y[b]?this.hasClass("ui-timepicker-input")?y[b].apply(this,Array.prototype.slice.call(arguments,1)):this:"object"!=typeof b&&b?void a.error("Method "+b+" does not exist on jQuery.timepicker"):y.init.apply(this,arguments):this},a.fn.timepicker.defaults={className:null,minTime:null,maxTime:null,durationTime:null,step:30,showDuration:!1,showOnFocus:!0,timeFormat:"g:ia",scrollDefault:null,selectOnBlur:!1,disableTouchKeyboard:!1,forceRoundTime:!1,appendTo:"body",orientation:"ltr",disableTimeRanges:[],closeOnWindowScroll:!1,typeaheadHighlight:!0,noneOption:!1,show2400:!1}});

/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

(function(e){e.fn.unveil=function(t,n){function f(){var t=u.filter(function(){var t=e(this);if(t.is(":hidden"))return;var n=r.scrollTop(),s=n+r.height(),o=t.offset().top,u=o+t.height();return u>=n-i&&o<=s+i});a=t.trigger("unveil");u=u.not(a)}var r=e(window),i=t||0,s=window.devicePixelRatio>1,o=s?"data-src-retina":"data-src",u=this,a;this.one("unveil",function(){var e=this.getAttribute(o);e=e||this.getAttribute("data-src");if(e){this.setAttribute("src",e);if(typeof n==="function")n.call(this)}});r.on("scroll.unveil resize.unveil lookup.unveil",f);f();return this}})(window.jQuery||window.Zepto);

//jQuery Timepicker
jQuery('#offline_time_id').timepicker({ 'timeFormat': 'H:i' });
});

jQuery(document).ready(function() {
  jQuery(".screenp img").unveil();
});