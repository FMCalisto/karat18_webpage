<?php 
/**
 * The Custom Style for Optimizer
 *
 * Loads the dynamically generated Css in the header of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
?>
<?php function optimizer_dynamic_css() { ?>
<?php global $optimizer; ?>
<style type="text/css">
<?php if( 'site_boxed' == $optimizer['site_layout_id']){ ?>
	/*BOXED LAYOUT*/
	.layer_wrapper {width: <?php echo absint($optimizer['center_width']); ?>%!important;float: left;margin: 0 <?php $centerwidth = absint($optimizer['center_width']); echo (100- $centerwidth)/2; ?>%!important;
	background: <?php echo $optimizer['content_bg_color']; ?>;
	<?php if( !empty($optimizer['drop_shadow'])){ ?>box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);<?php } ?>}
	.stat_bg, .stat_bg_overlay{width: <?php echo absint($optimizer['center_width']); ?>%!important;}
	.site_boxed .social_buttons{background: <?php echo $optimizer['content_bg_color']; ?>;}
	.center {width: 95%!important;margin: 0 auto;}
	.head_top .center{ width:95%!important;}
<?php } ?>

/*Site Content Text Style*/
body, textarea, input{ font-family:<?php echo $optimizer['content_font_id']['font-family']; ?>;font-size:<?php echo $optimizer['content_font_id']['font-size']; ?>;font-weight:<?php echo $optimizer['content_font_id']['font-weight']; ?>;}

.single_metainfo, .single_post .single_metainfo a, a:link, a:visited, .single_post_content .tabs li a{ color:<?php echo $optimizer['primtxt_color_id']; ?>;}

<?php if ( is_single() || is_page() || is_category() || is_tag() || is_author() || (get_post_type() == 'product' && is_archive()) ) { ?>
.page_head, .author_div{ background:<?php echo $optimizer['page_header_color']; ?>; color:<?php echo $optimizer['page_header_txtcolor']; ?>!important;}
.page_head .postitle{color:<?php echo $optimizer['page_header_txtcolor']; ?>!important;}	
.page_head .layerbread a{color:<?php echo $optimizer['page_header_txtcolor']; ?>!important;}	
<?php } ?>

/*-----------------------------Static Slider Content box width------------------------------------*/
<?php if($optimizer['slider_type_id'] =='noslider'){ ?>#slidera{min-height:initial;}<?php } ?>
.stat_content_inner .center{width:<?php echo absint($optimizer['static_textbox_width']); ?>%!important;}

/*STATIC SLIDE CTA BUTTONS COLORS*/
.static_cta1.cta_hollow, .static_cta1.cta_hollow_big{ background:transparent!important; color:<?php echo $optimizer['static_cta1_txt_color']; ?>!important;}
.static_cta1.cta_flat, .static_cta1.cta_flat_big, .static_cta1.cta_rounded, .static_cta1.cta_rounded_big, .static_cta1.cta_hollow:hover, .static_cta1.cta_hollow_big:hover{ background:<?php echo $optimizer['static_cta1_bg_color']; ?>!important; color:<?php echo $optimizer['static_cta1_txt_color']; ?>!important; border-color:<?php echo $optimizer['static_cta1_bg_color']; ?>!important;}
.static_cta2.cta_hollow, .static_cta2.cta_hollow_big{ background:transparent!important; color:<?php echo $optimizer['static_cta2_txt_color']; ?>!important;}
.static_cta2.cta_flat, .static_cta2.cta_flat_big, .static_cta2.cta_rounded, .static_cta2.cta_rounded_big, .static_cta2.cta_hollow:hover, .static_cta2.cta_hollow_big:hover{ background:<?php echo $optimizer['static_cta2_bg_color']; ?>!important; color:<?php echo $optimizer['static_cta2_txt_color']; ?>!important;border-color:<?php echo $optimizer['static_cta2_bg_color']; ?>!important;}

/*-----------------------------COLORS------------------------------------*/
		/*Header Color*/
		.header{ position:relative!important; background:<?php echo $optimizer['head_color_id']; ?>;}
		<?php if('noslider' == $optimizer['slider_type_id']){ ?>
		/*Header Color*/
		body .header{ position:relative!important; background:<?php echo $optimizer['head_color_id']; ?>;}
		.page #slidera, .single #slidera, .archive #slidera, .search #slidera, .error404 #slidera{ height:auto!important;}
		<?php } ?>
		
		<?php if(!empty($optimizer['head_transparent'])){ ?>
		.home .header_wrap {width: 100%;float: left;position:relative;}
		.home .header{position: absolute!important;z-index: 999;top: 0;}
		
		.home .header{ background:transparent!important;}
		.home .header .logo h2, .home .header .logo h1, .home .header .logo h2 a, .home .header .logo h1 a, .home span.desc{ color:<?php echo $optimizer['trans_header_color']; ?>!important;}
		.home #topmenu ul li a{ color:<?php echo $optimizer['trans_header_color']; ?>!important;}
		<?php } ?>
		.home.has_trans_header.page .header{background:<?php echo $optimizer['head_color_id']; ?>!important;}
		@media screen and (max-width: 480px){
		.home.has_trans_header .header{ background:<?php echo $optimizer['head_color_id']; ?>!important;}
		}

<?php if($optimizer['sec_color_id']){ ?>
/*Secondary Color*/
.widget_border, .heading_border, #wp-calendar #today, .thn_post_wrap .more-link:hover, .moretag:hover, .search_term #searchsubmit, .error_msg #searchsubmit, #searchsubmit, .optimizer_pagenav a:hover, .nav-box a:hover .left_arro, .nav-box a:hover .right_arro, .pace .pace-progress, .homeposts_title .menu_border, .pad_menutitle, span.widget_border, .ast_login_widget #loginform #wp-submit, .prog_wrap, .lts_layout1 a.image, .lts_layout2 a.image, .lts_layout3 a.image, .rel_tab:hover .related_img, .wpcf7-submit, .woo-slider #post_slider li.sale .woo_sale, .nivoinner .slide_button_wrap .lts_button, #accordion .slide_button_wrap .lts_button{background:<?php echo $optimizer['sec_color_id']; ?>;} 

.img_hover{background:rgba(<?php echo optimizer_hex2rgb($optimizer['sec_color_id']);?>, 0.7)!important;}

.share_active, .comm_auth a, .logged-in-as a, .citeping a, .lay3 h2 a:hover, .lay4 h2 a:hover, .lay5 .postitle a:hover, .nivo-caption p a, .acord_text p a, p.form-submit #submit, .org_comment a, .org_ping a, .contact_submit input:hover, .widget_calendar td a, .ast_biotxt a, .ast_bio .ast_biotxt h3, .lts_layout2 .listing-item h2 a:hover, .lts_layout3 .listing-item h2 a:hover, .lts_layout4 .listing-item h2 a:hover, .rel_tab:hover .rel_hover, .post-password-form input[type~=submit], .bio_head h3, .blog_mo a:hover, .ast_navigation a:hover, .org_comment a, .thn_post_wrap a:link, .thn_post_wrap a:visited, .lts_lightbox_content a:link, .lts_lightbox_content a:visited, .athor_desc a:link, .athor_desc a:visited{color:<?php echo $optimizer['sec_color_id'] ?>!important;}
#home_widgets .widget .thn_wgt_tt, #sidebar .widget .thn_wgt_tt, #footer .widget .thn_wgt_tt, .astwt_iframe a, .ast_bio .ast_biotxt h3, .ast_bio .ast_biotxt a, .nav-box a span, .lay2 h2.postitle:hover a{color:<?php echo $optimizer['sec_color_id'] ?>!important;}
.pace .pace-activity{border-top-color: <?php echo $optimizer['sec_color_id']; ?>!important;border-left-color: <?php echo $optimizer['sec_color_id']; ?>!important;}
.pace .pace-progress-inner{box-shadow: 0 0 10px <?php echo $optimizer['sec_color_id'] ?>, 0 0 5px <?php echo $optimizer['sec_color_id']; ?>;
  -webkit-box-shadow: 0 0 10px <?php echo $optimizer['sec_color_id'] ?>, 0 0 5px <?php echo $optimizer['sec_color_id']; ?>;
  -moz-box-shadow: 0 0 10px <?php echo $optimizer['sec_color_id'] ?>, 0 0 5px <?php echo $optimizer['sec_color_id']; ?>;}

.fotorama__thumb-border, .ast_navigation a:hover{ border-color:<?php echo $optimizer['sec_color_id'] ?>!important;}


/*Text Color on Secondary Element*/
.icon_round a, #wp-calendar #today, .moretag:hover, .search_term #searchsubmit, .error_msg #searchsubmit, .optimizer_pagenav a:hover, .ast_login_widget #loginform #wp-submit, #searchsubmit, .prog_wrap, .rel_tab .related_img i, .lay1 h2.postitle a, .nivoinner .slide_button_wrap .lts_button, #accordion .slide_button_wrap .lts_button{color:<?php echo $optimizer['sectxt_color_id']; ?>!important;}
.thn_post_wrap .listing-item .moretag:hover, body .lts_layout1 .listing-item .title, .lts_layout2 .img_wrap .optimizer_plus, .img_hover .icon_wrap a, body .thn_post_wrap .lts_layout1 .icon_wrap a, .wpcf7-submit, .woo-slider #post_slider li.sale .woo_sale{color:<?php echo $optimizer['sectxt_color_id']; ?>!important;}

<?php } ?>

<?php if($optimizer['sidebar_color_id']){ ?>
#sidebar .widget{ background:<?php echo $optimizer['sidebar_color_id']; ?>!important;}
#sidebar .widget .widget_wrap{ color:<?php echo $optimizer['sidebartxt_color_id']; ?>!important;}
<?php } ?>

<?php if($optimizer['footer_title_color']){ ?>
#footer .widgets .widgettitle, #copyright a{color:<?php echo $optimizer['footer_title_color']; ?>!important;}
<?php } ?>

<?php if($optimizer['footer_color_id']){ ?>
/*FOOTER WIDGET COLORS*/
#footer{background: <?php echo $optimizer['footer_color_id']; ?>!important;}
#footer .widgets .widget a, #footer .widgets{color:<?php echo $optimizer['footwdgtxt_color_id']; ?>!important;}
<?php } ?>
/*COPYRIGHT COLORS*/
#copyright{background: <?php echo $optimizer['copyright_bg_color']; ?>!important;}
#copyright a, #copyright{color: <?php echo $optimizer['copyright_txt_color']; ?>!important;}
.foot_soc .social_bookmarks a{color:<?php echo $optimizer['copyright_txt_color'] ?>!important;}
.foot_soc .social_bookmarks.bookmark_hexagon a:before {border-bottom-color: rgba(<?php echo optimizer_hex2rgb($optimizer['copyright_txt_color']);?>, 0.3)!important;}
.foot_soc .social_bookmarks.bookmark_hexagon a i {background:rgba(<?php echo optimizer_hex2rgb($optimizer['copyright_txt_color']);?>, 0.3)!important;}
.foot_soc .social_bookmarks.bookmark_hexagon a:after { border-top-color:rgba(<?php echo optimizer_hex2rgb($optimizer['copyright_txt_color']);?>, 0.3)!important;}

/*MENU Text Color*/
#topmenu ul li a{color:<?php echo $optimizer['menutxt_color_id'] ?>!important;}
#topmenu ul li.menu_hover a{border-color:<?php echo $optimizer['menutxt_color_hover']; ?>!important;}
#topmenu ul li.menu_hover>a{color:<?php echo $optimizer['menutxt_color_hover'] ?>!important;}
#topmenu ul li ul{border-color:<?php echo $optimizer['menutxt_color_hover']; ?> transparent transparent transparent!important;}

#topmenu ul li ul li a:hover{ background:<?php echo $optimizer['sec_color_id']; ?>; color:<?php echo $optimizer['sectxt_color_id']; ?>!important;}
.head_soc .social_bookmarks a{color:<?php echo $optimizer['menutxt_color_id'] ?>!important;}
.head_soc .social_bookmarks.bookmark_hexagon a:before {border-bottom-color: rgba(<?php echo optimizer_hex2rgb($optimizer['menutxt_color_id']);?>, 0.3)!important;}
.head_soc .social_bookmarks.bookmark_hexagon a i {background:rgba(<?php echo optimizer_hex2rgb($optimizer['menutxt_color_id']);?>, 0.3)!important;}
.head_soc .social_bookmarks.bookmark_hexagon a:after { border-top-color:rgba(<?php echo optimizer_hex2rgb($optimizer['menutxt_color_id']);?>, 0.3)!important;}


/*ABOUT Color*/
.aboutblock{background-color:<?php echo $optimizer['about_bg_color']; ?>; }
.about_header, .about_pre{color:<?php echo $optimizer['about_header_color']; ?>;}
.about_content{color:<?php echo $optimizer['about_text_color']; ?>;}
.aboutblock span.div_left, .aboutblock span.div_right{background:<?php echo $optimizer['about_header_color']; ?>;}
.aboutblock span.div_middle{color:<?php echo $optimizer['about_header_color']; ?>;}

/*BLOCKS Color*/
.midrow{ background:<?php echo $optimizer['midrow_color_id']; ?>!important;}
.midrow, .midrow a{ color:<?php echo $optimizer['blocktxt_color_id']; ?>;}
.midrow h3{color:<?php echo $optimizer['blocktitle_color_id']; ?>!important;}


/*WELCOME TEXT BACKGROUND Color*/
.text_block{background-color:<?php echo $optimizer['welcome_color_id']; ?>!important; <?php if ($optimizer['welcome_bg_image'])  { ?>background-image:url('<?php $welcmimg = $optimizer['welcome_bg_image'];  echo $welcmimg['url']; ?>');<?php } ?>}
.text_block{color:<?php echo $optimizer['welcometxt_color_id']; ?>;}


/*FRONT PAGE POSTS Background COLOR*/
.home .lay1, .home .lay2, .home .lay3, .home .lay4, .home .lay5{ background:<?php echo $optimizer['frontposts_color_id']; ?>!important;}
.homeposts_title .home_title, .homeposts_title .home_subtitle, #nav-below a{ color:<?php echo $optimizer['frontposts_title_color']; ?>!important;}
.postsblck span.div_left, .postsblck span.div_right{background:<?php echo $optimizer['frontposts_title_color']; ?>;}
.postsblck span.div_middle{color:<?php echo $optimizer['frontposts_title_color']; ?>;}
.lay2 .hentry, .lay3 .hentry, .lay4 .hentry, .lay5 .hentry, .lay5 .single_post{background:<?php echo $optimizer['frontposts_bg_color']; ?>!important;}

/*-------------------------------------TYPOGRAPHY--------------------------------------*/
/*LOGO*/
.logo h2, .logo h1, .logo h2 a, .logo h1 a{ font-family:<?php echo $optimizer['logo_font_id']['font-family']; ?>!important; font-size:<?php echo $optimizer['logo_font_id']['font-size']; ?>!important; color:<?php echo $optimizer['logo_color_id']; ?>!important;letter-spacing:<?php echo $optimizer['logo_font_id']['letter-spacing']; ?>; font-weight:<?php echo $optimizer['logo_font_id']['font-weight']; ?>;}
#simple-menu{color:<?php echo $optimizer['logo_color_id']; ?>!important;}
body.home.has_trans_header #simple-menu{color:<?php echo $optimizer['trans_header_color']; ?>!important;}
span.desc{color:<?php echo $optimizer['logo_color_id']; ?>!important;}

/*Post Titles, headings and Menu Font*/
h1, h2, h3, h4, h5, h6, #topmenu ul li a, .postitle, .product_title{ font-family:<?php echo $optimizer['ptitle_font_id']['font-family']; ?>!important;font-weight:<?php echo $optimizer['ptitle_font_id']['font-weight']; ?>!important;}

<?php if((!empty($optimizer['txt_upcase_id']))){ ?>
#topmenu ul li a, .midrow_block h3, .lay1 h2.postitle, .more-link, .moretag, .single_post .postitle, .related_h3, .comments_template #comments, #comments_ping, #reply-title, #submit, #sidebar .widget .widgettitle, #sidebar .widget .widgettitle a, .search_term h2, .search_term #searchsubmit, .error_msg #searchsubmit, #footer .widgets .widgettitle, .home_title, body .lts_layout1 .listing-item .title, .lay4 h2.postitle, .lay2 h2.postitle a, #home_widgets .widget .widgettitle, .product_title, .page_head h1{ text-transform:uppercase; letter-spacing:1px;}
<?php } ?>

#topmenu ul li a{font-size:<?php echo $optimizer['menu_size_id']; ?>!important;}
#topmenu ul li {line-height: <?php echo $optimizer['menu_size_id']; ?>;}

<?php if($optimizer['primtxt_color_id']){ ?>
/*Body Text Color*/
body, .home_cat a, .contact_submit input, .comment-form-comment textarea{ color:<?php echo $optimizer['primtxt_color_id']; ?>!important;}
.single_post_content .tabs li a{ color:<?php echo $optimizer['primtxt_color_id']; ?>!important;}
.thn_post_wrap .listing-item .moretag{ color:<?php echo $optimizer['primtxt_color_id']; ?>!important;}
<?php } ?>	
	

<?php if($optimizer['title_txt_color_id']){ ?>
/*Post Title */
.postitle, .postitle a, .nav-box a, h3#comments, h3#comments_ping, .comment-reply-title, .related_h3, .nocomments, .lts_layout2 .listing-item h2 a, .lts_layout3 .listing-item h2 a, .lts_layout4 .listing-item h2 a, .author_inner h5, .product_title, .woocommerce-tabs h2, .related.products h2{ text-decoration:none; color:<?php echo $optimizer['title_txt_color_id'] ?>!important;}
<?php } ?>
<?php if($optimizer['sidebar_tt_color_id']){ ?>
/*Widget Title Color */
#sidebar .widget .widgettitle, #sidebar .widget .widgettitle a{color:<?php echo $optimizer['sidebar_tt_color_id'] ?>!important;}
<?php } ?>	
<?php if($optimizer['sidebartxt_color_id']){ ?>
#sidebar .widget li a, #sidebar .widget{ color:<?php echo $optimizer['sidebartxt_color_id'] ?>;}
<?php } ?>


<?php if(!empty($optimizer['lay_show_title']) ) { ?>
.lay1 .post_content h2{ background:rgba(<?php echo optimizer_hex2rgb($optimizer['sec_color_id']);?>, 0.7)!important;bottom: 0;position: absolute;width: 100%;box-sizing: border-box;}
.lay1 h2.postitle a{font-size: 0.7em!important;}
.lay1 .post_content{ top:auto!important; bottom:0;}
.img_hover .icon_wrap{bottom: 50%;}
.lay1 .lay1_tt_on .post_image.lowreadmo .icon_wrap {top: 40px;}
<?php } ?>

<?php if(!$optimizer['show_blog_thumb'] ) { ?>
.page-template-template_partspage-blog_template-php .lay4 .post_content{width:100%;}
<?php } ?>

@media screen and (max-width: 480px){
body.home.has_trans_header .header .logo h1 a{ color:<?php echo $optimizer['logo_color_id']; ?>!important;}
body.home.has_trans_header .header #simple-menu{color:<?php echo $optimizer['logo_color_id']; ?>!important;}
}
/*USER'S CUSTOM CSS---------------------------------------------------------*/
<?php if ( ! empty ( $optimizer['custom-css'] ) ) { ?><?php echo $optimizer['custom-css']; ?><?php } ?>
/*---------------------------------------------------------*/
</style>
<!--[if IE 9]>
<style type="text/css">
.text_block_wrap, .home .lay1, .home .lay2, .home .lay3, .home .lay4, .home .lay5, .home_testi .looper, #footer .widgets{opacity:1!important;}
#topmenu ul li.megamenu{ position:static!important;}
</style>
<![endif]-->
<?php } ?>
<?php if(is_child_theme()){ add_action( 'wp_print_styles', 'optimizer_dynamic_css'); }else{ add_action( 'wp_head', 'optimizer_dynamic_css'); } ?>