<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Staple
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="outer-wrap">
        <div id="inner-wrap">
            <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'accesspress-staple' ); ?></a>
            
            <?php 
                $ak_logo_alignment = '';
                $ak_nav_alignment = '';
                $no_slider = '';
                $header_style_class ='';
                $ak_social_header = of_get_option('social_footer_header');
                $header_style =of_get_option('header_type');
                $ak_nav = of_get_option('logo_alignment');
                $ak_search_placeholder  =   of_get_option('search_placeholder');
                $ak_search_button_text  =   of_get_option('search_button');
                if($ak_nav=='center'){
                    $ak_logo_alignment = 'logo-center';
                    $ak_nav_alignment = 'menu-center';
                }
                elseif($ak_nav=='right'){
                    $ak_logo_alignment = 'logo-right';
                    $ak_nav_alignment = 'menu-right';
                }
               if(of_get_option('enable_slider')==0){ $no_slider="no_slider"; }
                if($header_style=='classic'){ $header_style_class = 'classic'; }    
            ?>
            
            <header id="masthead" class="site-header <?php echo esc_attr($no_slider, 'accesspress-staple')." ".esc_attr($header_style_class, 'accesspress-staple'); ?>" role="banner">
                
                 <?php if($ak_social_header==0){ 
                ?><div class="header-social">
                    <div class="ak-container">
                    <div class="ak_header_social">
                        <?php do_action('accesspress_social'); ?>
                    </div> 
                    </div>
                   </div>
                <?php
                }
                ?>
                
                
                <div class="ak-container">
               
                    <div class="site-branding <?php echo esc_attr($ak_logo_alignment, 'accesspress-staple') ?>">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> 
                           <?php
                           $header_image = of_get_option('logo');
                            if(!empty($header_image)): ?>       
                            <img src="<?php echo esc_url(of_get_option('logo')); ?>" alt="staple-logo" />
                            <?php else:
                            ?>
                            <h1><?php echo bloginfo('title'); ?></h1>
                            <div class="tagline"><?php echo bloginfo('description'); ?></div>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="menu-wrap <?php echo esc_attr($ak_nav_alignment, 'accesspress-staple'); ?>">
                    <?php if($ak_nav == 'left' || $ak_nav == 'right' ){?>
                    <?php if(of_get_option('show_search')==1){ ?>                        
                    <?php get_search_form() ?>
                    <?php }}?>            
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle"><?php _e( 'Primary Menu', 'accesspress-staple' ); ?></button>
                        <div class="clearfix"> </div>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>  
                    </nav><!-- #site-navigation -->
                    <?php if($ak_nav == 'center'){?>
                    <?php if(of_get_option('show_search')!=0){ ?>                        
                    <?php get_search_form() ?>
                    <?php }}?>   
                </div>

                <div class="responsive-header">
                    <a class="nav-btn" id="nav-open-btn" href="#nav"></a>
                </div>   
                </div>
 
            </header><!-- #masthead -->

            <nav id="nav">
                <div class="block">
                    <div class="menu-responsive-header-container">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>  
                    </div>
                    <a class="close-btn" id="nav-close-btn" href="#top"><i class="fa fa-close"> </i> </a>
                </div>
            </nav><!-- #site-navigation -->


            <?php 
            $accesspress_show_slider = of_get_option('show_slider') ;
            if(empty($accesspress_show_slider) || $accesspress_show_slider == "no"):
            endif;
            ?>
            <div id="content" class="site-content">
            
            <?php 
            if(is_home() || is_front_page()) :
                $ed_slider = of_get_option('enable_slider');
                if($ed_slider==1):?>
                <section class="slider-wrapper">
                  <?php do_action('accesspress_bxslider');?>
                  </section>
                  <?php
                endif;
            endif;
            ?>