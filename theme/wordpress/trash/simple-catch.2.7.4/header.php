<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="top-bg"></div>
  		<div class="layout-978">
        	<?php 
        		// Funcition to show the header logo, site title and site description
        		if ( function_exists( 'simplecatch_headerdetails' ) ) :
					simplecatch_headerdetails(); 
				endif;
			?>

        	<div class="social-search">
				<?php
                    // simplecatch_headersocialnetworks displays social links given from theme option in header 
                    if ( function_exists( 'simplecatch_headersocialnetworks' ) ) :
                        simplecatch_headersocialnetworks(); 
                    endif;
                    // get search form
                    get_search_form();
                ?>      
        	</div><!-- .social-search -->
    		<div class="row-end"></div>
            <?php 
				// simplecatch_headersocialnetworks displays social links given from theme option in header 
				if ( function_exists( 'simplecatch_custom_header_image' ) ) :
					simplecatch_custom_header_image(); 
				endif;
			?>
            <div id="mainmenu">
            	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </div><!-- #mainmenu-->  
            <div class="row-end"></div>
               
			<?php 
                // Display slider in home page and breadcrumb in other pages 
                if ( function_exists( 'simplecatch_sliderbreadcrumb' ) ) :
                    simplecatch_sliderbreadcrumb(); 
                endif;
            ?> 
		</div><!-- .layout-978 -->
    <div class="bottom-bg"></div>
</div><!-- #header -->