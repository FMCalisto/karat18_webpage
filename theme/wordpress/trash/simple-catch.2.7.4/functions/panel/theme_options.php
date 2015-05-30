<?php
/**
 * Simple Catch Theme Options
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
add_action( 'admin_init', 'simplecatch_register_settings' );
add_action( 'admin_menu', 'simplecatch_options_menu' );


/**
 * Enqueue admin script / style
 *
 * @uses wp_enqueue_script 
 * @Calling jquery, jquery-ui-tabs,jquery-cookie, jquery-ui-sortable, jquery-ui-draggable
 */
function simplecatch_admin_scripts() {
	//jquery-cookie registered in functions.php
	wp_enqueue_script( 'simplecatch_admin', get_template_directory_uri().'/functions/panel/admin.min.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable', 'farbtastic' ), '20140317', false );
	wp_enqueue_script( 'simplecatch_upload', get_template_directory_uri().'/functions/panel/add_image_scripts.min.js', array( 'jquery','media-upload','thickbox' ) );
	wp_enqueue_script( 'simplecatch_color', get_template_directory_uri().'/functions/panel/color_picker.min.js', array( 'farbtastic' ) );
	
    wp_enqueue_style( 'simplecatch_admin_style',get_template_directory_uri().'/functions/panel/admin.css', array( 'farbtastic', 'thickbox' ), '1.0', 'screen' );
}
add_action('admin_print_styles-appearance_page_theme_options', 'simplecatch_admin_scripts');


/*
 * Create a function for Theme Options Page
 *
 * @uses add_menu_page
 * @add action admin_menu 
 */
function simplecatch_options_menu() {
	
	add_theme_page( 
        __( 'Theme Options', 'simplecatch' ),           // Name of page
        __( 'Theme Options', 'simplecatch' ),           // Label in menu
        'edit_theme_options',                           // Capability required
        'theme_options',                                // Menu slug, used to uniquely identify the page
        'simplecatch_theme_options_do_page'             // Function that renders the options page
    );					

}


/*
 * Register options and validation callbacks
 *
 * @uses register_setting
 * @action admin_init
 */
function simplecatch_register_settings(){
	register_setting( 'simplecatch_options', 'simplecatch_options', 'simplecatch_theme_options_validate' );
}


/*
 * Render Simple Catch Theme Options page
 *
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function simplecatch_theme_options_do_page() {
	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
	<div id="catchthemes" class="wrap">
    	
    	<form method="post" action="options.php">
			<?php
                settings_fields( 'simplecatch_options' );
                global $simplecatch_options_settings;
                $options = $simplecatch_options_settings;				
            ?>   
            <?php if (false !== $_REQUEST['settings-updated']) : ?>
            	<div class="updated fade"><p><strong><?php _e('Options Saved', 'simplecatch'); ?></strong></p></div>
            <?php endif; ?>

			<div id="theme-option-header">
            
                <div id="theme-option-title">
                    <h2 class="title"><?php _e( 'Theme Options By', 'simplecatch' ); ?></h2>
                    <h2 class="logo">
                        <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" title="<?php esc_attr_e( 'Catch Themes', 'simplecatch' ); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri().'/functions/panel/images/catch-themes.png'; ?>" alt="<?php _e( 'Catch Themes', 'simplecatch' ); ?>" />
                        </a>
                    </h2>
                </div><!-- #theme-option-title -->
                <div id="upgradepro">
                	<a class="button" href="<?php echo esc_url(__('http://catchthemes.com/themes/simple-catch-pro/','simplecatch')); ?>" title="<?php esc_attr_e('Upgrade to Simple Catch Pro', 'simplecatch'); ?>" target="_blank"><?php printf(__('Upgrade to Simple Catch Pro','simplecatch')); ?></a>
               	</div><!-- #upgradepro -->
            
                <div id="theme-support">
                    <ul>
                    	<li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/donate/','simplecatch')); ?>" title="<?php esc_attr_e('Donate', 'simplecatch'); ?>" target="_blank"><?php printf(__('Donate','simplecatch')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/support/','simplecatch')); ?>" title="<?php esc_attr_e('Support', 'simplecatch'); ?>" target="_blank"><?php printf(__('Support','simplecatch')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://catchthemes.com/theme-instructions/simple-catch/','simplecatch')); ?>" title="<?php esc_attr_e('Theme Instruction', 'simplecatch'); ?>" target="_blank"><?php printf(__('Theme Instruction','simplecatch')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://www.facebook.com/catchthemes/','simplecatch')); ?>" title="<?php esc_attr_e('Like Catch Themes on Facebook', 'simplecatch'); ?>" target="_blank"><?php printf(__('Facebook','simplecatch')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('https://twitter.com/catchthemes/','simplecatch')); ?>" title="<?php esc_attr_e('Follow Catch Themes on Twitter', 'simplecatch'); ?>" target="_blank"><?php printf(__('Twitter','simplecatch')); ?></a></li>
                        <li><a class="button" href="<?php echo esc_url(__('http://wordpress.org/support/view/theme-reviews/simple-catch','simplecatch')); ?>" title="<?php esc_attr_e('Rate us 5 Star on WordPress', 'simplecatch'); ?>" target="_blank"><?php printf(__('5 Star Rating','simplecatch')); ?></a></li>
                   	</ul>
                </div><!-- #theme-support --> 
                 
          	</div><!-- #theme-option-header -->  
          
                     
            <div id="simplecatch_ad_tabs">
                <ul class="tabNavigation" id="mainNav">
                    <li><a href="#themeoptions"><?php _e( 'Theme Options', 'simplecatch' );?></a></li>
                    <li><a href="#postslider"><?php _e( 'Featured Post Slider', 'simplecatch' );?></a></li>
                    <li><a href="#sociallinks"><?php _e( 'Social Links', 'simplecatch' );?></a></li>
                    <li><a href="#webmaster"><?php _e( 'Webmaster Tools', 'simplecatch' );?></a></li>
                </ul><!-- .tabsNavigation #mainNav -->
                   
                <!-- Option for Theme Options -->
                <div id="themeoptions">
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Logo Options', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Header logo url:', 'simplecatch' ); ?></th>
                                        <td>
                                            <?php  if ( !empty ( $options[ 'featured_logo_header' ] ) ) { ?>
                                                <input class="upload-url" size="65" type="text" name="simplecatch_options[featured_logo_header]" value="<?php echo esc_url( $options[ 'featured_logo_header' ] ); ?>" class="upload" />
                                            <?php } else { ?>
                                                <input size="65" type="text" name="simplecatch_options[featured_logo_header]" value="<?php echo get_template_directory_uri(); ?>/images/logo-head.png" alt="logo" />
                                            <?php }  ?>                            
                                                <input id="st_upload_button" class="st_upload_button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Header Logo','simplecatch' );?>" />  
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th scope="row"><?php _e( 'Preview: ', 'simplecatch' ); ?></th>
                                        <td>                     
                                            <?php 
                                                if ( !empty( $options[ 'featured_logo_header' ] ) ) { 
                                                    echo '<img src="'.esc_url( $options[ 'featured_logo_header' ] ).'" alt="logo"/>';
                                                } else {
                                                    echo '<img src="'. get_template_directory_uri().'/images/logo-head.png" alt="logo" />';
                                                }
                                            ?>
                                         </td>
                                    </tr>
                                   	<tr>                            
                                        <th scope="row"><?php _e( 'Disable Header Logo?', 'simplecatch' ); ?></th>
                                         <input type='hidden' value='0' name='simplecatch_options[remove_header_logo]'>
                                        <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_header_logo]" value="1" <?php checked( '1', $options['remove_header_logo'] ); ?> /> <?php _e( 'Check to Disable.', 'simplecatch' ); ?></td>
                                    </tr>
                                    
                                                                        
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Disable Site Title?', 'simplecatch' ); ?></th>
                                        <input type='hidden' value='0' name='simplecatch_options[remove_site_title]'>
                                        <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_site_title]" value="1" <?php checked( '1', $options['remove_site_title'] ); ?> /> <?php _e( 'Check to Disable.', 'simplecatch' ); ?></td>
                                    </tr>  
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Disable Site Description?', 'simplecatch' ); ?></th>
                                        <input type='hidden' value='0' name='simplecatch_options[remove_site_description]'>
                                        <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_site_description]" value="1" <?php checked( '1', $options['remove_site_description'] ); ?> /> <?php _e( 'Check to Disable.', 'simplecatch' ); ?></td>
                                    </tr>
                                    <tr>   
                                        <th scope="row"><?php _e( 'Footer logo url: ', 'simplecatch' ); ?></th>
                                        <td>
                                            <?php  if ( !empty ( $options[ 'featured_logo_footer' ] ) ) { ?>
                                                <input class="upload-url" size="65" type="text" name="simplecatch_options[featured_logo_footer]" value="<?php echo esc_url( $options[ 'featured_logo_footer' ] ); ?>" class="upload" />
                                            <?php } else { ?>
                                                <input size="65" type="text" name="simplecatch_options[featured_logo_footer]" value="<?php echo get_template_directory_uri(); ?>/images/logo-foot.png" alt="logo" />
                                            <?php }  ?>                            
                                                <input id="st_upload_button" class="st_upload_button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Footer Logo','simplecatch' );?>" />  
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Preview: ', 'simplecatch' ); ?></th>
                                        <td>                     
                                            <?php 
                                                if ( !empty( $options[ 'featured_logo_footer' ] ) ) { 
                                                    echo '<img src="'.esc_url( $options[ 'featured_logo_footer' ] ).'" alt="logo"/>';
                                                } else {
                                                    echo '<img src="'. get_template_directory_uri().'/images/logo-foot.png" alt="logo" />';
                                                }
                                            ?>
                                         </td>
                                    </tr>
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Disable Footer Logo?', 'simplecatch' ); ?></th>
                                         <input type='hidden' value='0' name='simplecatch_options[remove_footer_logo]'>
                                        <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_footer_logo]" value="1" <?php checked( '1', $options['remove_footer_logo'] ); ?> /> <?php _e( 'Check to Disable.', 'simplecatch' ); ?></td>
                                    </tr>                                    
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->  

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Fav Icon Option', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                	<tr>   
                                        <th scope="row"><?php _e( 'Favicon URL:', 'simplecatch' ); ?></th>
                                        <td>
                                            <?php  if ( !empty ( $options[ 'fav_icon' ] ) ) { ?>
                                                <input class="upload-url" size="65" type="text" name="simplecatch_options[fav_icon]" value="<?php echo esc_url( $options[ 'fav_icon' ] ); ?>" class="upload" />
                                            <?php } else { ?>
                                                <input size="65" type="text" name="simplecatch_options[fav_icon]" value="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="fav icon" />
                                            <?php }  ?>                            
                                                <input id="st_upload_button" class="st_upload_button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Fav icon Logo','simplecatch' );?>" />  
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Preview: ', 'simplecatch' ); ?></th>
                                        <td>                     
                                            <?php 
                                                if ( !empty( $options[ 'fav_icon' ] ) ) { 
                                                    echo '<img src="'.esc_url( $options[ 'fav_icon' ] ).'" alt="logo"/>';
                                                } else {
                                                    echo '<img src="'. get_template_directory_uri().'/images/favicon.ico" alt="fav icon" />';
                                                }
                                            ?>
                                         </td>
                                    </tr>
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Disable Fav Icon?', 'simplecatch' ); ?></th>
                                         <input type='hidden' value='0' name='simplecatch_options[remove_fav_icon]'>
                                        <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_fav_icon]" value="1" <?php checked( '1', $options['remove_fav_icon'] ); ?> /> <?php _e( 'Check to Disable.', 'simplecatch' ); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Web Clip Icon Option', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Web Clip Icon URL:', 'simplecatch' ); ?></th>
                                        <td>
                                        	<input class="upload-url" size="65" type="text" name="simplecatch_options[web_clip]" value="<?php echo esc_url( $options [ 'web_clip' ] ); ?>" class="upload" />
                                            <input id="web-clip-image" class="st_upload_button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Upload/Change Web Clip Icon','simplecatch' );?>" />
                                     	</td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row"><?php _e( 'Preview: ', 'simplecatch' ); ?></th>
                                        <td> 
                                            <?php 
                                                if ( !empty( $options[ 'web_clip' ] ) ) { 
                                                    echo '<img src="'.esc_url( $options[ 'web_clip' ] ).'" alt="Web Clip Icon" />';
                                                } else { ?>
                                                    <p><?php _e( 'No Web Clip Icon Found. Upload Web Clip Icon.', 'simplecatch' ); ?></p>
                                               <?php
											   }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->                    
            
            		<div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Color Options', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                        	<table class="form-table">  
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Default Color Scheme', 'catcheverest' ); ?></label></th>
                                        <td>
                                            <label title="color-light" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/default.jpg" alt="color-default" /><br />
                                            <input type="radio" name="simplecatch_options[color_scheme]" id="color-default" <?php checked($options['color_scheme'], 'default'); ?> value="default"  />
                                            <?php _e( 'Default', 'catcheverest' ); ?>
                                            </label>
                                            <label title="color-dark" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/dark.jpg" alt="color-dark" /><br />
                                            <input type="radio" name="simplecatch_options[color_scheme]" id="color-dark" <?php checked($options['color_scheme'], 'dark'); ?> value="dark"  />
                                            <?php _e( 'Dark', 'catcheverest' ); ?>
                                            </label>  
                                            <label title="color-brown" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/brown.jpg" alt="color-brown" /><br />
                                            <input type="radio" name="simplecatch_options[color_scheme]" id="color-brown" <?php checked($options['color_scheme'], 'brown'); ?> value="brown"  />
                                            <?php _e( 'Brown', 'catcheverest' ); ?>
                                            </label>                                                                                 
                                        </td>
                                    </tr>                                
                                	<tr>
                                        <th>
                                            <label for="simplecatch_content_background">
                                                <?php _e( 'Content Background:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <?php printf(__('Need to replace default background?','simplecatch')); ?> <?php printf(__('<a class="button" href="%s">Click here</a>', 'simplecatch'), admin_url('themes.php?page=custom-background')); ?>
                                        </td>
                                    </tr> 
                                	<tr>
                                        <th>
                                            <label for="simplecatch_heading_color">
                                                <?php _e( 'Heading Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_heading_color" name="simplecatch_options[heading_color]" size="8" value="<?php echo ( isset( $options[ 'heading_color' ] ) ) ? esc_attr( $options[ 'heading_color' ] ) : '#444444'; ?>"  />
                                            <div id="colorpicker_heading_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>
                                            <label for="simplecatch_meta_color">
                                                <?php _e( 'Meta Description Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_meta_color" name="simplecatch_options[meta_color]" size="8" value="<?php echo ( isset( $options[ 'meta_color' ] ) ) ? esc_attr( $options[ 'meta_color' ] ) : '#999999'; ?>"  />
                                            <div id="colorpicker_meta_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>
                                            <label for="simplecatch_text_color">
                                                <?php _e( 'Text Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_text_color" name="simplecatch_options[text_color]" size="8" value="<?php echo ( isset( $options[ 'text_color' ] ) ) ? esc_attr( $options[ 'text_color' ] ) : '#555555'; ?>"  />
                                            <div id="colorpicker_text_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="simplecatch_link_color">
                                                <?php _e( 'Link Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_link_color" name="simplecatch_options[link_color]" size="8" value="<?php echo ( isset( $options[ 'link_color' ] ) ) ? esc_attr( $options[ 'link_color' ] ) : '#000000'; ?>"  />
                                            <div id="colorpicker_link_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr>
        							<tr>
                                        <th>
                                            <label for="simplecatch_widget_heading_color">
                                                <?php _e( 'Sidebar Widget Heading Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_widget_heading_color" name="simplecatch_options[widget_heading_color]" size="8" value="<?php echo ( isset( $options[ 'widget_heading_color' ] ) ) ? esc_attr( $options[ 'widget_heading_color' ] ) : '#666666'; ?>"  />
                                            <div id="colorpicker_widget_heading_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="simplecatch_widget_text_color">
                                                <?php _e( 'Sidebar Widget Text Color:', 'simplecatch' ); ?>
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="simplecatch_widget_text_color" name="simplecatch_options[widget_text_color]" size="8" value="<?php echo ( isset( $options[ 'widget_text_color' ] ) ) ? esc_attr( $options[ 'widget_text_color' ] ) : '#666666'; ?>"  />
                                            <div id="colorpicker_widget_text_color" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                                        </td>
                                    </tr>       
                                    <?php if( $options[ 'reset_color' ] == "1" ) { $options[ 'reset_color' ] = "0"; } ?>
                                    <tr>                            
                                        <th scope="row"><?php _e( 'Reset Color:', 'simplecatch' ); ?></th>
                                        <input type='hidden' value='0' name='simplecatch_options[reset_color]'>
                                        <td>
                                        	<input type="checkbox" id="headerlogo" name="simplecatch_options[reset_color]" value="1" <?php checked( '1', $options['reset_color'] ); ?> /> <?php _e( 'Check to Reset Color', 'simplecatch' ); ?>
                                       	</td>
                                    </tr>
                                </tbody>
                            </table>      
                      
                     		<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p>	
                    	</div><!-- .option-content -->
                 	</div><!-- .option-container --> 

                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Default Layout', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">  
                                <tbody>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Default Layout', 'simplecatch' ); ?></label></th>
                                        <td>
                                        	<label title="right-sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/right-sidebar.png" alt="Content-Sidebar" /><br />
                                            <input type="radio" name="simplecatch_options[sidebar_layout]" id="right-sidebar" <?php checked($options['sidebar_layout'], 'right-sidebar') ?> value="right-sidebar"  />
                                            <?php _e( 'Content on Left', 'simplecatch' ); ?>
                                            </label>
                                            
                                            <label title="left-Sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/left-sidebar.png" alt="Content-Sidebar" /><br />
                                            <input type="radio" name="simplecatch_options[sidebar_layout]" id="left-sidebar" <?php checked($options['sidebar_layout'], 'left-sidebar') ?> value="left-sidebar"  />
                                            <?php _e( 'Content on Right', 'simplecatch' ); ?>
                                            </label>
                                            
                                            <label title="no-sidebar" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/no-sidebar.png" alt="No Sidebar" /><br />
                                            <input type="radio" name="simplecatch_options[sidebar_layout]" id="no-sidebar" <?php checked($options['sidebar_layout'], 'no-sidebar') ?> value="no-sidebar"  />
                                            <?php _e( 'No Sidebar', 'simplecatch' ); ?>
                                            </label>
                                            
                                            <label title="no-sidebar-full-width" class="box"><img src="<?php echo get_template_directory_uri(); ?>/functions/panel/images/no-sidebar-fullwidth.png" alt="No Sidebar Full Width" /><br />
                                            <input type="radio" name="simplecatch_options[sidebar_layout]" id="no-sidebar-full-width" <?php checked($options['sidebar_layout'], 'no-sidebar-full-width') ?> value="no-sidebar-full-width"  />
                                            <?php _e( 'No Sidebar, Full Width', 'simplecatch' ); ?>
                                            </label>
                                                                                        
                                        </td>
                                    </tr>  
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
					<div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage / Frontpage Category Setting', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <?php _e( 'Front page posts categories:', 'simplecatch' ); ?>
                                            <p>
                                                <small><?php _e( 'Only posts that belong to the categories selected here will be displayed on the front page.', 'simplecatch' ); ?></small>
                                            </p>
                                        </th>
                                        <td>
                                            <select name="simplecatch_options[front_page_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
                                                <option value="0" <?php if ( empty( $options['front_page_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'simplecatch' ); ?></option>
                                                <?php /* Get the list of categories */ 
                                                    if( empty( $options[ 'front_page_category' ] ) ) {
                                                        $options[ 'front_page_category' ] = array();
                                                    }
                                                    $categories = get_categories();
                                                    foreach ( $categories as $category) : ?>
                                                		<option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
                                                <?php endforeach; ?>
                                            </select><br />
                                            <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL key.', 'simplecatch' ); ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->  
                    
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Search Text Settings', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">  
                                <tbody>
                                    <tr> 
                                        <th scope="row"><label><?php _e( 'Default Display Text in Search', 'simplecatch' ); ?></label></th>
                                        <td><input type="text" size="45" name="simplecatch_options[search_display_text]" value="<?php echo esc_attr( $options[ 'search_display_text'] ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label><?php _e( 'Search Button\'s text', 'simplecatch' ); ?></label></th>
                                        <td><input type="text" size="45" name="simplecatch_options[search_button_text]" value="<?php echo esc_attr( $options[ 'search_button_text' ] ); ?>" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Excerpt / More Tag Settings', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">  
                                <tbody>
									<tr>
                                        <th scope="row"><label><?php _e( 'More Tag Text', 'simplecatch' ); ?></label></th>
                                        <td><input type="text" size="45" name="simplecatch_options[more_tag_text]" value="<?php echo esc_attr( $options[ 'more_tag_text' ] ); ?>" />
                                        </td>
                                    </tr>  
                                     <tr>
                                        <th scope="row"><?php _e( 'Excerpt length(words)', 'simplecatch' ); ?></th>
                                        <td><input type="text" size="3" name="simplecatch_options[excerpt_length]" value="<?php echo intval( $options[ 'excerpt_length' ] ); ?>" /></td>
                                    </tr>  
                              	</tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                    
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Feed Redirect', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">  
                                <tbody>
									<tr>
                                        <th scope="row"><label><?php _e( 'Feed Redirect URL', 'simplecatch' ); ?></label></th>
                                        <td><input type="text" size="70" name="simplecatch_options[feed_url]" value="<?php echo esc_attr( $options[ 'feed_url' ] ); ?>" />
                                        </td>
                                    </tr>  
                               	</tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->   
                   
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Custom CSS', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside"> 
                            <table class="form-table">  
                                <tbody>       
                                    <tr>
                                        <th scope="row"><?php _e( 'Enter your custom CSS styles.', 'simplecatch' ); ?></th>
                                        <td>
                                            <textarea name="simplecatch_options[custom_css]" id="custom-css" cols="90" rows="12"><?php echo esc_attr( $options[ 'custom_css' ] ); ?></textarea>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <th scope="row"><?php _e( 'CSS Tutorial from W3Schools.', 'simplecatch' ); ?></th>
                                        <td>
                                            <a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp','simplecatch' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Click Here to Read', 'simplecatch' );?></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
                                          
                </div> <!-- #themeoptions -->  

                
                <div id="postslider">
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Add Slider Options', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">
                                <tr>                            
                                    <th scope="row"><?php _e( 'Exclude Slider post from Home page posts:', 'simplecatch' ); ?></th>
                                     <input type='hidden' value='0' name='simplecatch_options[exclude_slider_post]'>
                                    <td><input type="checkbox" id="headerlogo" name="simplecatch_options[exclude_slider_post]" value="1" <?php checked( '1', $options['exclude_slider_post'] ); ?> /></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Number of Slides', 'simplecatch' ); ?></th>
                                    <td><input type="text" name="simplecatch_options[slider_qty]" value="<?php echo intval( $options[ 'slider_qty' ] ); ?>" /></td>
                                </tr>
                                <tbody class="sortable">
                                    <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                                    <tr>
                                        <th scope="row"><label class="handle"><span class="count"><?php echo '#' . absint( $i ); ?></span> <?php _e( 'Featured Post ID', 'simplecatch' ); ?></label></th>
                                        <td><input type="text" name="simplecatch_options[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
                                        <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider', $options ) && array_key_exists ( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'simplecatch' ); ?></a>
                                        </td>
                                    </tr>                           
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                            <p><?php _e( 'Note: Here You can put your Post IDs which displays on Homepage as slider.', 'simplecatch' ); ?> </p>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
        
                    <!-- Option for More Slider Options -->
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Slider Effect Options', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">   
                                <tr>                            
                                    <th scope="row"><?php _e( 'Disable Slider Background Effect:', 'simplecatch' ); ?></th>
                                     <input type='hidden' value='0' name='simplecatch_options[remove_noise_effect]'>
                                    <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_noise_effect]" value="1" <?php checked( '1', $options['remove_noise_effect'] ); ?> /></td>
                                </tr>
        
                                <tr>
                                    <th>
                                        <label for="simplecatch_cycle_style"><?php _e( 'Transition Effect:', 'simplecatch' ); ?></label>
                                    </th>
                                    <td>
                                        <select id="simplecatch_cycle_style" name="simplecatch_options[transition_effect]">
                                            <option value="fade" <?php selected('fade', $options['transition_effect']); ?>><?php _e( 'fade', 'simplecatch' ); ?></option>
                                            <option value="wipe" <?php selected('wipe', $options['transition_effect']); ?>><?php _e( 'wipe', 'simplecatch' ); ?></option>
                                            <option value="scrollUp" <?php selected('scrollUp', $options['transition_effect']); ?>><?php _e( 'scrollUp', 'simplecatch' ); ?></option>
                                            <option value="scrollDown" <?php selected('scrollDown', $options['transition_effect']); ?>><?php _e( 'scrollDown', 'simplecatch' ); ?></option>
                                            <option value="scrollLeft" <?php selected('scrollLeft', $options['transition_effect']); ?>><?php _e( 'scrollLeft', 'simplecatch' ); ?></option>
                                            <option value="scrollRight" <?php selected('scrollRight', $options['transition_effect']); ?>><?php _e( 'scrollRight', 'simplecatch' ); ?></option>
                                            <option value="blindX" <?php selected('blindX', $options['transition_effect']); ?>><?php _e( 'blindX', 'simplecatch' ); ?></option>
                                            <option value="blindY" <?php selected('blindY', $options['transition_effect']); ?>><?php _e( 'blindY', 'simplecatch' ); ?></option>
                                            <option value="blindZ" <?php selected('blindZ', $options['transition_effect']); ?>><?php _e( 'blindZ', 'simplecatch' ); ?></option>
                                            <option value="cover" <?php selected('cover', $options['transition_effect']); ?>><?php _e( 'cover', 'simplecatch' ); ?></option>
                                            <option value="shuffle" <?php selected('shuffle', $options['transition_effect']); ?>><?php _e( 'shuffle', 'simplecatch' ); ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Transition Delay', 'simplecatch' ); ?></th>
                                    <td>
                                        <input type="text" name="simplecatch_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="4" />
                                       <span class="description"><?php _e( 'second(s)', 'simplecatch' ); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php _e( 'Transition Length', 'simplecatch' ); ?></th>
                                    <td>
                                        <input type="text" name="simplecatch_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="4" />
                                        <span class="description"><?php _e( 'second(s)', 'simplecatch' ); ?></span>
                                    </td>
                                </tr>                      
        
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container --> 
				</div><!-- #themesettings -->  
                
                <div id="sociallinks">
                	<div class="option-container">
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Facebook', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_facebook]" value="<?php echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Twitter', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_twitter]" value="<?php echo esc_url( $options[ 'social_twitter'] ); ?>" />
                                    </td>
                                </tr>
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Google+', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_googleplus]" value="<?php echo esc_url( $options[ 'social_googleplus'] ); ?>" />
                                    </td>
                                </tr>
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Pinterest', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_pinterest]" value="<?php echo esc_url( $options[ 'social_pinterest'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Youtube', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_youtube]" value="<?php echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Vimeo', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_vimeo]" value="<?php echo esc_url( $options[ 'social_vimeo' ] ); ?>" />
                                    </td>
                                </tr>
                                
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Linkedin', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_linkedin]" value="<?php echo esc_url( $options[ 'social_linkedin'] ); ?>" />
                                    </td>
                                </tr>
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Slideshare', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_slideshare]" value="<?php echo esc_url( $options[ 'social_slideshare'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Foursquare', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_foursquare]" value="<?php echo esc_url( $options[ 'social_foursquare' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Flickr', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_flickr]" value="<?php echo esc_url( $options[ 'social_flickr' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Tumblr', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_tumblr]" value="<?php echo esc_url( $options[ 'social_tumblr' ] ); ?>" />
                                    </td>
                                </tr> 
                                <tr>
                                    <th scope="row"><h4><?php _e( 'deviantART', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_deviantart]" value="<?php echo esc_url( $options[ 'social_deviantart' ] ); ?>" />
                                    </td>
                                </tr> 
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Dribbble', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_dribbble]" value="<?php echo esc_url( $options[ 'social_dribbble' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'MySpace', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_myspace]" value="<?php echo esc_url( $options[ 'social_myspace' ] ); ?>" />
                                    </td>
                                </tr> 
                                <tr>
                                    <th scope="row"><h4><?php _e( 'WordPress', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_wordpress]" value="<?php echo esc_url( $options[ 'social_wordpress' ] ); ?>" />
                                    </td>
                                </tr>                           
                                <tr>
                                    <th scope="row"><h4><?php _e( 'RSS', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_rss]" value="<?php echo esc_url( $options[ 'social_rss' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Delicious', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_delicious]" value="<?php echo esc_url( $options[ 'social_delicious' ] ); ?>" />
                                    </td>
                                </tr>                           
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Last.fm', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_lastfm]" value="<?php echo esc_url( $options[ 'social_lastfm' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Instagram', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_instagram]" value="<?php echo esc_url( $options[ 'social_instagram' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'GitHub', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_github]" value="<?php echo esc_url( $options[ 'social_github' ] ); ?>" />
                                    </td>
                                </tr> 
                                <tr> 
                                    <th scope="row"><h4><?php _e( 'Vkontakte', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_vkontakte]" value="<?php echo esc_url( $options[ 'social_vkontakte'] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'My World', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_myworld]" value="<?php echo esc_url( $options[ 'social_myworld' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Odnoklassniki', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_odnoklassniki]" value="<?php echo esc_url( $options[ 'social_odnoklassniki' ] ); ?>" />
                                    </td>
                                </tr>   
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Goodreads', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_goodreads]" value="<?php echo esc_url( $options[ 'social_goodreads' ] ); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Skype', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_skype]" value="<?php echo esc_attr( $options[ 'social_skype' ] ); ?>" />
                                    </td>
                                </tr>  
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Soundcloud', 'simplecatch' ); ?> </h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_soundcloud]" value="<?php echo esc_url( $options[ 'social_soundcloud' ] ); ?>" />
                                    </td>
                                </tr> 
                                <tr>
                                    <th scope="row"><h4><?php _e( 'Email', 'simplecatch' ); ?></h4></th>
                                    <td><input type="text" size="45" name="simplecatch_options[social_email]" value="<?php echo sanitize_email( $options[ 'social_email' ] ); ?>" />
                                    </td>
                                </tr>                                                           
                            </tbody>
                        </table><p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p>      
                	</div><!-- .option-container -->                       
                </div><!-- #sociallinks -->                
                
                <div id="webmaster">      
                    <div class="option-container">
                        <h3 class="option-toggle"><a href="#"><?php _e( 'Header and Footer Codes', 'simplecatch' ); ?></a></h3>
                        <div class="option-content inside">
                            <table class="form-table">  
                                <tbody>       
                                    <tr>
                                        <th scope="row"><?php _e( 'Code to display on Header', 'simplecatch' ); ?></th>
                                        <td>
                                        <textarea name="simplecatch_options[analytic_header]" id="analytics" rows="7" cols="80" ><?php echo esc_html( $options[ 'analytic_header' ] ); ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><?php _e('Note: Here you can put scripts from Google, Facebook etc. which will load on Header', 'simplecatch' ); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e('Code to display on Footer', 'simplecatch' ); ?></th>
                                        <td>
                                         <textarea name="simplecatch_options[analytic_footer]" id="analytics" rows="7" cols="80" ><?php echo esc_html( $options[ 'analytic_footer' ] ); ?></textarea>
                             
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><?php _e( 'Note: Here you can put scripts from Google, Facebook, Add This etc. which will load on footer', 'simplecatch' ); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                        </div><!-- .option-content -->
                    </div><!-- .option-container -->  	
                </div><!-- #webmaster -->
                		
            </div><!-- #simplecatch_ad_tabs -->
            
		</form>
        
	</div><!-- .wrap -->
<?php
}


/**
 * Validate content options
 * @param array $options
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, simplecatch_invalidate_caches
 * @return array
 */
function simplecatch_theme_options_validate( $options ) {
	global $simplecatch_options_settings;
    $input_validated = $simplecatch_options_settings;
    $input = array();
    $input = $options;
	
	// data validation for logo
	if ( isset( $input[ 'featured_logo_header' ] ) ) {
		$input_validated[ 'featured_logo_header' ] = esc_url_raw( $input[ 'featured_logo_header' ] );
	}
	if ( isset( $input['remove_header_logo'] ) ) {
		// Our checkbox value is either 0 or 1 
		$input_validated[ 'remove_header_logo' ] = $input[ 'remove_header_logo' ];
	}	
	if ( isset( $input['remove_site_title'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'remove_site_title' ] = $input[ 'remove_site_title' ];
    }
    if ( isset( $input['remove_site_description'] ) ) {
        // Our checkbox value is either 0 or 1 
        $input_validated[ 'remove_site_description' ] = $input[ 'remove_site_description' ];
    }
	if ( isset( $input[ 'featured_logo_footer' ] ) ) {
		$input_validated[ 'featured_logo_footer' ] = esc_url_raw( $input[ 'featured_logo_footer' ] );
	}
	if ( isset( $input['remove_footer_logo'] ) ) {
		// Our checkbox value is either 0 or 1 
		$input_validated[ 'remove_footer_logo' ] = $input[ 'remove_footer_logo' ];
	}
	
	//Fav Icon URL
	if ( isset( $input[ 'fav_icon' ] ) ) {
		$input_validated[ 'fav_icon' ] = esc_url_raw( $input[ 'fav_icon' ] );
	}
	if ( isset( $input['remove_fav_icon'] ) ) {
		// Our checkbox value is either 0 or 1 
		$input_validated[ 'remove_fav_icon' ] = $input[ 'remove_fav_icon' ];
	}	
	
	//Web Clip Icon URL
	if ( isset( $input[ 'web_clip' ] ) ) {
		$input_validated[ 'web_clip' ] = esc_url_raw( $input[ 'web_clip' ] );
	}	

	// data validation for Color Scheme
	if ( isset( $input['color_scheme'] ) ) {
		// Our checkbox value is either 0 or 1 
		$input_validated[ 'color_scheme' ] = $input[ 'color_scheme' ];
	}	
	
	//Color Options
	if( isset( $input[ 'heading_color' ] ) ) {
		$input_validated[ 'heading_color' ] = wp_filter_nohtml_kses( $input[ 'heading_color' ] );
	}
	if( isset( $input[ 'meta_color' ] ) ) {
		$input_validated[ 'meta_color' ] = wp_filter_nohtml_kses( $input[ 'meta_color' ] );
	}
	if( isset( $input[ 'text_color' ] ) ) {
		$input_validated[ 'text_color' ] = wp_filter_nohtml_kses( $input[ 'text_color' ] );
	}
	if( isset( $input[ 'link_color' ] ) ) {
		$input_validated[ 'link_color' ] = wp_filter_nohtml_kses( $input[ 'link_color' ] );
	}
	
	if( isset( $input[ 'widget_heading_color' ] ) ) {
		$input_validated[ 'widget_heading_color' ] = wp_filter_nohtml_kses( $input[ 'widget_heading_color' ] );
	}
	if( isset( $input[ 'widget_text_color' ] ) ) {
		$input_validated[ 'widget_text_color' ] = wp_filter_nohtml_kses( $input[ 'widget_text_color' ] );
	}		
	if ( isset( $input['reset_color'] ) ) {
		// Our checkbox value is either 0 or 1 
		$input_validated[ 'reset_color' ] = $input[ 'reset_color' ];
	}	
	
	//Reset Color Options
	if( $input[ 'reset_color' ] == 1 ) {
		global $simplecatch_options_defaults;
		$defaults = $simplecatch_options_defaults;

		$input_validated[ 'color_scheme' ] = $defaults[ 'color_scheme' ];
		$input_validated[ 'heading_color' ] = $defaults[ 'heading_color' ];
		$input_validated[ 'meta_color' ] = $defaults[ 'meta_color' ];
		$input_validated[ 'text_color' ] = $defaults[ 'text_color' ];
		$input_validated[ 'link_color' ] = $defaults[ 'link_color' ];
		$input_validated[ 'widget_heading_color' ] = $defaults[ 'widget_heading_color' ]; 
		$input_validated[ 'widget_text_color' ] = $defaults[ 'widget_text_color' ]; 
	}

    if ( isset( $input['exclude_slider_post'] ) ) {
        // Our checkbox value is either 0 or 1 
   		$input_validated[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];	
	}
	
   // Front page posts categories
	if( isset( $input['front_page_category' ] ) ) {
		$input_validated['front_page_category'] = $input['front_page_category'];
	}	
	
	//data validation for Featured Slider
	if ( isset( $input[ 'slider_qty' ] ) ) {
		$input_validated[ 'slider_qty' ] = absint( $input[ 'slider_qty' ] ) ? $input [ 'slider_qty' ] : 4;
	}
	if ( isset( $input[ 'featured_slider' ] ) ) {
		$input_validated[ 'featured_slider' ] = array();
	}	
 	if ( isset( $input[ 'slider_qty' ] ) )	{	
		for ( $i = 1; $i <= $input [ 'slider_qty' ]; $i++ ) {
			if ( !empty( $input[ 'featured_slider' ][ $i ] ) && intval( $input[ 'featured_slider' ][ $i ] ) ) {
				$input_validated[ 'featured_slider' ][ $i ] = absint($input[ 'featured_slider' ][ $i ] );
			}
		}
	}	

    if ( isset( $input['remove_noise_effect'] ) ) {
        // Our checkbox value is either 0 or 1 
		$input_validated[ 'remove_noise_effect' ] = $input[ 'remove_noise_effect' ];
    }
    
    if( isset( $input[ 'transition_effect' ] ) ) {
        $input_validated['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
    }

    // data validation for transition delay
    if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
        $input_validated[ 'transition_delay' ] = $input[ 'transition_delay' ];
    }

    // data validation for transition length
    if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
        $input_validated[ 'transition_duration' ] = $input[ 'transition_duration' ];
    }
	
	// data validation for Social Icons
	if( isset( $input[ 'social_facebook' ] ) ) {
		$input_validated[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
	}
	if( isset( $input[ 'social_twitter' ] ) ) {
		$input_validated[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
	}
	if( isset( $input[ 'social_googleplus' ] ) ) {
		$input_validated[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
	}
	if( isset( $input[ 'social_pinterest' ] ) ) {
		$input_validated[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
	}	
	if( isset( $input[ 'social_youtube' ] ) ) {
		$input_validated[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
	}
	if( isset( $input[ 'social_vimeo' ] ) ) {
		$input_validated[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
	}	
	if( isset( $input[ 'social_linkedin' ] ) ) {
		$input_validated[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
	}
	if( isset( $input[ 'social_slideshare' ] ) ) {
		$input_validated[ 'social_slideshare' ] = esc_url_raw( $input[ 'social_slideshare' ] );
	}	
	if( isset( $input[ 'social_foursquare' ] ) ) {
		$input_validated[ 'social_foursquare' ] = esc_url_raw( $input[ 'social_foursquare' ] );
	}
	if( isset( $input[ 'social_flickr' ] ) ) {
		$input_validated[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
	}
	if( isset( $input[ 'social_tumblr' ] ) ) {
		$input_validated[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
	}	
	if( isset( $input[ 'social_deviantart' ] ) ) {
		$input_validated[ 'social_deviantart' ] = esc_url_raw( $input[ 'social_deviantart' ] );
	}
	if( isset( $input[ 'social_dribbble' ] ) ) {
		$input_validated[ 'social_dribbble' ] = esc_url_raw( $input[ 'social_dribbble' ] );
	}	
	if( isset( $input[ 'social_myspace' ] ) ) {
		$input_validated[ 'social_myspace' ] = esc_url_raw( $input[ 'social_myspace' ] );
	}
	if( isset( $input[ 'social_wordpress' ] ) ) {
		$input_validated[ 'social_wordpress' ] = esc_url_raw( $input[ 'social_wordpress' ] );
	}	
	if( isset( $input[ 'social_rss' ] ) ) {
		$input_validated[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
	}
	if( isset( $input[ 'social_delicious' ] ) ) {
		$input_validated[ 'social_delicious' ] = esc_url_raw( $input[ 'social_delicious' ] );
	}	
	if( isset( $input[ 'social_lastfm' ] ) ) {
		$input_validated[ 'social_lastfm' ] = esc_url_raw( $input[ 'social_lastfm' ] );
	}	
	if( isset( $input[ 'social_instagram' ] ) ) {
		$input_validated[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
	}
	if( isset( $input[ 'social_github' ] ) ) {
		$input_validated[ 'social_github' ] = esc_url_raw( $input[ 'social_github' ] );
	}
	if( isset( $input[ 'social_vkontakte' ] ) ) {
		$input_validated[ 'social_vkontakte' ] = esc_url_raw( $input[ 'social_vkontakte' ] );
	}	
	if( isset( $input[ 'social_myworld' ] ) ) {
		$input_validated[ 'social_myworld' ] = esc_url_raw( $input[ 'social_myworld' ] );
	}	
	if( isset( $input[ 'social_odnoklassniki' ] ) ) {
		$input_validated[ 'social_odnoklassniki' ] = esc_url_raw( $input[ 'social_odnoklassniki' ] );
	}	
	if( isset( $input[ 'social_goodreads' ] ) ) {
		$input_validated[ 'social_goodreads' ] = esc_url_raw( $input[ 'social_goodreads' ] );
	}
	if( isset( $input[ 'social_skype' ] ) ) {
		$input_validated[ 'social_skype' ] = sanitize_text_field( $input[ 'social_skype' ] );
	}	
	if( isset( $input[ 'social_soundcloud' ] ) ) {
		$input_validated[ 'social_soundcloud' ] = esc_url_raw( $input[ 'social_soundcloud' ] );
	}
	if( isset( $input[ 'social_email' ] ) ) {
		$input_validated[ 'social_email' ] = sanitize_email( $input[ 'social_email' ] );
	}		
	
	//Custom CSS Style Validation
	if ( isset( $input['custom_css'] ) ) {
		$input_validated['custom_css'] = wp_kses_stripslashes($input['custom_css']);
	}
		
	//Webmaster Tool Verification
	if( isset( $input[ 'google_verification' ] ) ) {
		$input_validated[ 'google_verification' ] = wp_filter_post_kses( $input[ 'google_verification' ] );
	}
	if( isset( $input[ 'yahoo_verification' ] ) ) {
		$input_validated[ 'yahoo_verification' ] = wp_filter_post_kses( $input[ 'yahoo_verification' ] );
	}
	if( isset( $input[ 'bing_verification' ] ) ) {
		$input_validated[ 'bing_verification' ] = wp_filter_post_kses( $input[ 'bing_verification' ] );
	}	
	if( isset( $input[ 'analytic_header' ] ) ) {
		$input_validated[ 'analytic_header' ] = wp_kses_stripslashes( $input[ 'analytic_header' ] );
	}
	if( isset( $input[ 'analytic_footer' ] ) ) {
		$input_validated[ 'analytic_footer' ] = wp_kses_stripslashes( $input[ 'analytic_footer' ] );	
	}		
	
    // Layout settings verification
	if( isset( $input[ 'sidebar_layout' ] ) ) {
		$input_validated[ 'sidebar_layout' ] = $input[ 'sidebar_layout' ];
	}
    if( isset( $input[ 'more_tag_text' ] ) ) {
        $input_validated[ 'more_tag_text' ] = htmlentities( sanitize_text_field ( $input[ 'more_tag_text' ] ), ENT_QUOTES, 'UTF-8' );
    }   
    if( isset( $input[ 'search_display_text' ] ) ) {
        $input_validated[ 'search_display_text' ] = sanitize_text_field( $input[ 'search_display_text' ] );
    }
    if( isset( $input[ 'search_button_text' ] ) ) {
        $input_validated[ 'search_button_text' ] = sanitize_text_field( $input[ 'search_button_text' ] );    
    }   
    //data validation for excerpt length
    if ( isset( $input[ 'excerpt_length' ] ) ) {
        $input_validated[ 'excerpt_length' ] = absint( $input[ 'excerpt_length' ] ) ? $input [ 'excerpt_length' ] : 30;
    }

	//Feed Redirect
	if ( isset( $input[ 'feed_url' ] ) ) {
		$input_validated['feed_url'] = esc_url_raw($input['feed_url']);
	}
	
	//Clearing the theme option cache
	if( function_exists( 'simplecatch_themeoption_invalidate_caches' ) ) simplecatch_themeoption_invalidate_caches();
	
	return $input_validated;
}


/*
 * Clearing the cache if any changes in Admin Theme Option
 */
function simplecatch_themeoption_invalidate_caches(){
	delete_transient( 'simplecatch_headerdetails' ); 	// header logo on header
	delete_transient( 'simplecatch_footerlogo' );  // footer logo on footer
	delete_transient( 'simplecatch_favicon' );	  // favicon on cpanel/ backend and frontend
	delete_transient( 'simplecatch_webclip' ); // Web Clip Ioon
	delete_transient( 'simplecatch_sliders' ); // featured slider
	delete_transient( 'simplecatch_headersocialnetworks' );  // Social links on header
	delete_transient( 'simplecatch_site_verification' ); // scripts which loads on header	
	delete_transient( 'simplecatch_footercode' ); // scripts which loads on footer
	delete_transient( 'simplecatch_inline_css' ); // Custom Inline CSS
}


/*
 * Clears caching for header title and description
 */
function simplecatch_header_caching() {
	delete_transient( 'simplecatch_headerdetails' );
}
add_action('update_option_blogname','simplecatch_header_caching');
add_action('update_option_blogdescription','simplecatch_header_caching');


/*
 * Clearing the cache if any changes in post or page
 */
function simplecatch_post_invalidate_caches(){
	delete_transient( 'simplecatch_sliders' );
}

//Add action hook here save post
add_action( 'save_post', 'simplecatch_post_invalidate_caches' );