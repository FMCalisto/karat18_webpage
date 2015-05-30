<?php
/**
 * Custome Function for theme template
 * 
 * 
 */
    function accesspress_web_layout($classes){
	    if(of_get_option('webpage_layout') == 'boxed'){
	        $classes[]= 'boxed-layout';
	    }
        elseif(of_get_option('webpage_layout') == 'fullwidth'){
            $classes[]='fullwidth';
        }
        
	    return $classes;
   }
   add_filter( 'body_class', 'accesspress_web_layout' );
   
   function accesspress_sidebar_layout($classes){
    global $post;
        if( is_404()){
		$classes[] = ' ';
		}elseif(is_singular()){
	    $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
	    if(empty($post_class)){
        $post_class = 'right-sidebar';
        $classes[] = $post_class;}
        else{
        $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
        $classes[] = $post_class;}
		}else{
		$classes[] = 'right-sidebar';	
		}
        return $classes;
   }
   add_filter('body_class', 'accesspress_sidebar_layout');

   
    function accesspress_bxslidercb(){
        $accesspress_slider_category = of_get_option('cagegory_as_slider');
		$accesspress_show_pager = (!of_get_option('show_pager') || of_get_option('show_pager') == "yes") ? "true" : "false";
		$accesspress_show_controls = (!of_get_option('show_controls') || of_get_option('show_controls') == "yes") ? "true" : "false";
		$accesspress_auto_transition = (!of_get_option('slider_auto_transition') || of_get_option('slider_auto_transition') == "yes") ? "true" : "false";
		$accesspress_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
		$accesspress_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
		$accesspress_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');
		$accesspress_show_caption = of_get_option('show_slider_caption');       
        ?>
        <section id="main-slider" class="slider">
       <script type="text/javascript">
            jQuery(function($){
				$('#main-slider .bx-slider').bxSlider({
					//adaptiveHeight: true,
					pager: <?php echo esc_attr($accesspress_show_pager); ?>,
					controls: <?php echo esc_attr($accesspress_show_controls); ?>,
					mode: '<?php echo esc_attr($accesspress_slider_transition); ?>',
					auto : '<?php echo esc_attr($accesspress_auto_transition); ?>',
					pause: '<?php echo esc_attr($accesspress_slider_pause); ?>',
					speed: '<?php echo esc_attr($accesspress_slider_speed); ?>'
				});
			});
        </script>
        <?php
		if( !empty($accesspress_slider_category)) :

				$loop = new WP_Query(array(
						'cat' => $accesspress_slider_category,
						'posts_per_page' => -1    
					));
                    ?>
                    <div class="bx-slider">
                    <?php
					if($loop->have_posts()) : 
					while($loop->have_posts()) : $loop-> the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
                    
                     ?>
                    <div class="slides">
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />
                    <?php if($accesspress_show_caption == 'show'): ?>
				<div class="caption-wrapper">  
				<div class="ak-container">
					<div class="slider-caption">
						<div class="mid-content">
							<div class="small-caption"> <?php the_title(); ?> </div>
                            <div class="slider-content">
	                            <?php the_content(); 
	                            ?>
                        	</div>
							<a href="<?php the_permalink(); ?>" class="slider-btn"> <?php echo esc_attr(of_get_option('slider_button_text')); ?> </a>
						</div>
					</div>
				</div>
				</div>
                    <?php  endif; ?>
				</div>
				<?php endwhile; ?>
                 </div>
				
                    <?php endif; ?>		
            
        <?php else: ?>

            <div class="bx-slider">
	        <div class="slides">
					<img src="<?php echo get_template_directory_uri(); ?>/images/access-agencybg.png" alt="slider1"/>
                    <?php if($accesspress_show_caption == 'show'): ?>
                <div class="caption-wrapper">    
				<div class="ak-container">	
					<div class="slider-caption">
						<div class="mid-content">
							<div class="small-caption"> <?php echo __('CREATIVE AGENCY/WEBSITE DEVELOPMENT/COPYWRITER', 'accesspress-staple'); ?></div>
							<h1 class="caption-title"> <?php echo __('AccessPress', 'accesspress-staple'); ?> <span>  <?php echo __('Staple', 'accesspress-staple'); ?> </span> </h1>
							<div class="caption-description"> <?php echo __('consectetuer adipiscing elit.  Aenean commodo ligula eget dolor.', 'accesspress-staple'); ?></div>
							<a href="#" class="slider-btn">  <?php echo __('Details', 'accesspress-staple'); ?> </a>
						</div>
					</div>
				</div>
				</div>
                    <?php  endif; ?>
				</div>
				
			</div>
			<?php  endif; ?>
		</section>
<?php
}
add_action('accesspress_bxslider','accesspress_bxslidercb', 10);

function accesspress_social_cb(){
	$facebooklink = of_get_option('facebook');
	$twitterlink = of_get_option('twitter');
	$google_pluslink = of_get_option('google_plus');
	$youtubelink = of_get_option('youtube');
	$pinterestlink = of_get_option('pinterest');
	$linkedinlink = of_get_option('linkedin');
	$flickrlink = of_get_option('flicker');
	$vimeolink = of_get_option('vimeo');
	$instagramlink = of_get_option('instagram');
	$tumblrlink = of_get_option('tumbler');
	$rsslink = of_get_option('rss');
	$deliciouslink = of_get_option('delicious');
	$githublink = of_get_option('github');
	$stumbleuponlink = of_get_option('stumbleupon');
	$skypelink = of_get_option('skype'); 
    ?>
	<div class="social-icons ">
		<?php if(!empty($facebooklink)){ ?>
		<a href="<?php echo esc_url(of_get_option('facebook')); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('twitter')); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($google_pluslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('google_plus')); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo esc_url(of_get_option('youtube')); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('pinterest')); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('linkedin')); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($flickrlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('flicker')); ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($vimeolink)){ ?>
		<a href="<?php echo esc_url(of_get_option('vimeo')); ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('instagram')); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($tumblrlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('tumblr')); ?>" class="tumblr" data-title="tumblr" target="_blank"><i class="fa fa-tumblr"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($deliciouslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('delicious')); ?>" class="delicious" data-title="delicious" target="_blank"><i class="fa fa-delicious"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($rsslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('rss')); ?>" class="rss" data-title="rss" target="_blank"><i class="fa fa-rss"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($githublink)){ ?>
		<a href="<?php echo of_get_option('github'); ?>" class="github" data-title="github" target="_blank"><i class="fa fa-github"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($stumbleuponlink)){ ?>
		<a href="<?php echo of_get_option('stumbleupon'); ?>" class="stumbleupon" data-title="stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($skypelink)){ ?>
		<a href="<?php echo __('skype:', 'accesspress-staple').esc_url(of_get_option('skype')); ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
    </div>
<?php
}
add_action('accesspress_social','accesspress_social_cb', 10);

function accesspress_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}

function accesspress_excerpt( $accesspress_content , $accesspress_letter_count){
		$accesspress_letter_count = !empty($accesspress_letter_count) ? $accesspress_letter_count : 100 ;
		$accesspress_striped_content = strip_tags($accesspress_content);
		$accesspress_excerpt = mb_substr($accesspress_striped_content, 0 , $accesspress_letter_count);
		if(strlen($accesspress_striped_content) > strlen($accesspress_excerpt)){
			$accesspress_excerpt.= "...";
		}
		return $accesspress_excerpt;
	}

//Dynamic styles on header
function accesspress_header_styles_scripts(){
	$favicon = of_get_option('favicon');
	$custom_css = of_get_option('custom_code_css');
    $cta_bg_v = of_get_option('call_to_action_bg');
    $custom_js = of_get_option('custom_code_analytics');
	$image_url = get_template_directory_uri()."/images/";
    if(!empty($favicon)):
	echo "<link type='image/png' rel='icon' href='".esc_url($favicon)."'/>\n";
    endif;
	echo "<style type='text/css' media='all'>"; 
	echo $custom_css;
    if(!empty($cta_bg_v)){
    $cta_bg =   '.call-to-action {background: url("'.esc_url(of_get_option('call_to_action_bg')).'") no-repeat scroll center top rgba(0, 0, 0, 0);';
    echo $cta_bg;
    }
   	echo "</style>\n"; 

	echo "<script>\n";
	echo $custom_js;
	echo "</script>\n";
}

add_action('wp_head','accesspress_header_styles_scripts');



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.2
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

add_action( 'tgmpa_register', 'accesspress_register_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function accesspress_register_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'      => 'AccessPress Social Share',
            'slug'      => 'accesspress-social-share',
            'required'  => false,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        
        array(
            'name'      => 'AccessPress Social Counter',
            'slug'      => 'accesspress-social-counter',
            'required'  => false,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        
        array(
            'name'      => 'AccessPress Social Icons',
            'slug'      => 'accesspress-social-icons',
            'required'  => false,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

        array(
            'name'      => 'AccessPress Custom CSS',
            'slug'      => 'accesspress-custom-css',
            'required'  => false,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'accesspress-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'accesspress-staple' ),
            'menu_title'                      => __( 'Install Plugins', 'accesspress-staple' ),
            'installing'                      => __( 'Installing Plugin: %s', 'accesspress-staple' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'accesspress-staple' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' , 'accesspress-staple' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' , 'accesspress-staple' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' , 'accesspress-staple'), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' , 'accesspress-staple'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' , 'accesspress-staple'), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' , 'accesspress-staple' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'accesspress-staple' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' , 'accesspress-staple'), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'accesspress-staple' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'accesspress-staple' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'accesspress-staple' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}