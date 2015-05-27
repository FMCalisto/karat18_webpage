<?php
/**
 * The Theme Options for Optimizer
 *
 * Displays the Theme Options of the template on backend.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */


if (!class_exists('optimizer_theme_options')) {

    class optimizer_theme_options {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            //$this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }


            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
		}

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,

          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'optimizer'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'optimizer'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'optimizer'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'optimizer'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'optimizer'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'optimizer'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'optimizer'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'optimizer') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>

                </div>
            </div>

            <?php
            ob_end_clean();

			function optimizer_upgrade() {
				ob_start();
				require(get_template_directory() . '/upgrade.php');
				return ob_get_clean();
			}
			
			function optimizer_pro_msg($ops_title, $ops_desc, $indent=false){
				if($indent == true){  $indent = 'optimizer_pro_msg_indent';  }else{  $indent = ''; }
				
				return '<div class="redux_field_th '.$indent.'"><div class="optimizer_pro_msg">'.$ops_title.'<span class="description">'.$ops_desc.'</span></div><img class="optimizer_pro_msg_img" src="'.get_template_directory_uri().'/assets/images/inpro.png" /></div>';
					
			}
			
			$product_cat ='';
		   if (class_exists('Woocommerce')) {
			   $product_cat = array('taxonomy' => array('product_cat'));
		   }
            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('Basic', 'optimizer'),
                'desc'      => '',
                'icon'      => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
				
					  array(
						  'id'=>'site_layout_id',
						  'type' => 'image_select',
						  'compiler'=>true,
						  'title' => __('Site Layout', 'optimizer'), 
						  'options' => array(
								  'site_full' => array('alt' => __('Full Width Layout', 'optimizer'), 'img' => get_template_directory_uri().'/assets/images/site_full.png'),
								  'site_boxed' => array('alt' => __('Boxed layout', 'optimizer'), 'img' => get_template_directory_uri().'/assets/images/site_boxed.png'),
							  ),
						  'default' => 'site_full'
						  ),
						  
						array(
							'id'        => 'section-boxed-start',
							'type'      => 'section',
							'title'     => __('Boxed Layout Settings', 'optimizer'),
							'required' 		=>  array('site_layout_id','equals','site_boxed'),
							'indent'    => true
						),
													
									array(
										'id'            => 'center_width',
										'type'          => 'slider',
										'title'         => __('Site Content Width', 'optimizer'),
										'subtitle'      => __('Set the width of the content box\'s width. In %', 'optimizer'),
										//'required' 		=>  array('site_layout_id','equals','site_boxed'),
										'default'       => 85,
										'min'           => 1,
										'step'          => 1,
										'max'           => 100,
										'display_value' => 'label'
									), 
									
									array(
										'id'=>'content_bg_color',
										'type' => 'color',
										'title' => __('Boxed Content Background Color ', 'optimizer'), 
										//'required' 		=>  array('site_layout_id','equals','site_boxed'),
										'default' => '#ffffff',
										'validate' => 'color',
										'transparent' => false,
										),					
			
									array(
										'id'=>'drop_shadow',
										'type' => 'checkbox',
										'title' => __('Drop Shadow', 'optimizer'),
										//'required' 		=>  array('site_layout_id','equals','site_boxed'),
										'default'  => 0,
										'customizer' => false,
									),
						
						array(
							'id'        => 'section-boxed-end',
							'type'      => 'section',
							'required' 		=>  array('site_layout_id','equals','site_boxed'),
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
						array(
							'id'=>'divider_icon',
							'type' => 'image_select',
							'compiler'=>true,
							'title' => __('Divider Icon', 'optimizer'), 
							'subtitle'=> __('Select Divider style for the Homepage Element Titles','optimizer'),
							'options' => array(
								'fa-stop' => array('alt' => __('Rhombus','optimizer'), 'img' => get_template_directory_uri().'/assets/images/dividers/fa-stop.png'),
								'fa-star' => array('alt' => __('Star','optimizer'), 'img' => get_template_directory_uri().'/assets/images/dividers/fa-star.png'),
								'fa-times' => array('alt' => __('Cross','optimizer'), 'img' => get_template_directory_uri().'/assets/images/dividers/fa-times.png'),
								'fa-bolt' => array('alt' => __('Bolt','optimizer'), 'img' => get_template_directory_uri().'/assets/images/dividers/fa-bolt.png'),
								'no_divider' => array('alt' => __('Hide Divider','optimizer'), 'img' => get_template_directory_uri().'/assets/images/dividers/no_divider.png'),
								),
							'default' => 'fa-stop'
							),

						array(
							'id'        => 'section-header-start',
							'type'      => 'section',
							'title'     => __('Header Settings', 'optimizer'),
							'indent'    => true
						),

								array(
									'id'        => 'logo_image_id',
									'type'      => 'media',
									'title'     => __('Logo/Header Image', 'optimizer'),
									'subtitle'	=>__('Click the "Upload" button to upload your Image.', 'optimizer'),
									'compiler'  => 'true'
								),
								
								array(
									'id'        => 'head_transparent',
									'type'      => 'switch',
									'title'     => __('Make Header Transparent on Frontpage', 'optimizer'),
									'default'   => true,
									'on'   => __('Yes', 'optimizer'),
									'off'   => __('No', 'optimizer'),
								),
								
								array(
									'id'=>'trans_header_color',
									'type' => 'color',
									'required' 		=>  array('head_transparent','equals',true),
									'title' => __('Transparent Header Text Color ', 'optimizer'), 
									'default' => '#ffffff',
									'validate' => 'color',
									'transparent' => false,
									),
									
								array(
									'id'       => 'head_menu_type',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Header Menu Style','optimizer'), __('Change the way your header &amp; Menu look','optimizer'), true),											
									),
									
								array(
									'id'       => 'head_sticky',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Make Header Sticky','optimizer'), __('Make the Header always stay on top, Fixed','optimizer'), true),											
									),	
					
						array(
							'id'        => 'section-header-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),

						array(
							'id'        => 'section-footer-start',
							'type'      => 'section',
							'title'     => __('Footer Settings', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
					
								array(
									'id'        => 'totop_id',
									'type'      => 'switch',
									'title'     => __('Scroll To Top Button', 'optimizer'),
									'subtitle'  => __('Turn On/Off The button that appears on bottom right when you scroll down to pages.', 'optimizer'),
									'default'   => true,
								),
								
								array(
									'id'=>'footer_text_id',
									'type' => 'editor',
									'title' => __('Footer Copyright Text', 'optimizer'), 
									'default' => '',
									'args'   => array(
										'teeny'            => false,
									)
									),
								
								array(
									'id'=>'copyright_center',
									'type' => 'switch', 
									'title' => __('Center Copyright Text', 'optimizer'),
									"default" 		=> false,
									'on' => __('Yes', 'optimizer'), 
									'off' => __('No', 'optimizer'),
									),
									
				
						array(
							'id'        => 'section-footer-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
						
				
						
						
				)
            );

            $this->sections[] = array(
                'type' => 'divide',
            );
			
           $this->sections[] = array(
                'icon'      => 'fa-desktop',
                'title'     => __('Slider Options', 'optimizer'),
                'heading'   => '',
				'fields'    => array(	
				

					
						  array(
							  'id'=>'slider_type_id',
							  'type' => 'select',
							  'title' => __('Slider Type', 'optimizer'),
							  'subtitle' => __('Select Frontpage Slider Type', 'optimizer'),
							  'options' => array(
								'static'=> __('Static Slide', 'optimizer'),
								'noslider'=>__('Disable Slider', 'optimizer')
							),
							  'desc' => __('4 More Slider types are available in PRO version', 'optimizer'),
							  'default' => 'static',
							  'customizer' => false,
							  ),

							array(
							'id'        => 'section-static-start',
							'type'      => 'section',
							'title'     => __('Static Slide Settings', 'optimizer'),
							'required' 		=>  array('slider_type_id','equals','static'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),	

								array(
									'id'=>'static_img_text_id',
									'type' => 'editor',
									'required' 		=>  array('slider_type_id','equals','static'),
										'args'   => array(
												'teeny'    => false,
												'wpautop'  => false,
											),
									'title' => __('Content', 'optimizer'), 
									'default' => __('<p style="text-align: center;"><img class="aligncenter size-full wp-image-10751" src="'. get_template_directory_uri().'/assets/images/slide_icon.png" alt="slide_icon" width="100" height="100" /></p><p style="text-align: center;"><span style="font-size: 36pt; color: #ffffff;">ADVANCED . <strong>STRONG</strong> . RELIABLE</span></p><p style="text-align: center;"><span style="color: #ffffff;">The Optimizer, an easy to customizable multi-purpose theme with lots of powerful features. </span></p>', 'optimizer'),
									),
									
								array(
									'id'=>'static_cta1_text',
									'type' => 'text',
									'required' 		=>  array('slider_type_id','equals','static'),
									'title' => __('CTA Button 1', 'optimizer'), 
									'desc' => __('Button Text', 'optimizer'), 
									'default' => 'DEMO',
									),
									
								array(
									'id'=>'static_cta1_link',
									'type' => 'text',
									'required' 		=>  array('slider_type_id','equals','static'),
									'title' => __('Button Link', 'optimizer'), 
									'desc' => __('Button Link', 'optimizer'), 
									'default' => '#',
									),
									
								array(
									'id'=>'static_cta1_bg_color',
									'type' => 'color',
									'title' => __('Background Color', 'optimizer'), 
									'desc' => __('Background Color', 'optimizer'), 
									'default' => '#36abfc',
									'transparent' => false,
									'validate' => 'color',
									),
								array(
									'id'=>'static_cta1_txt_color',
									'type' => 'color',
									'title' => __('Text Color', 'optimizer'),
									'desc' => __('Text Color', 'optimizer'),  
									'default' => '#ffffff',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'static_cta1_txt_style',
									'type' => 'select',
									'title' => __('Button Style', 'optimizer'), 
									'desc' => __('Button Style', 'optimizer'), 
									'options' => array(
										'flat'=>		__('Flat', 'optimizer'),
										'flat_big'=>	__('Flat (Big)', 'optimizer'),
										'hollow'=>		__('Hollow', 'optimizer'),
										'hollow_big'=>	__('Hollow (Big)', 'optimizer'),
										'rounded'=>		__('Rounded', 'optimizer'),
										'rounded_big'=>	__('Rounded (Big)', 'optimizer'),
									),
									'default' => 'hollow',
									),	
									
									
								array(
									'id'=>'static_cta2_text',
									'type' => 'text',
									'required' 		=>  array('slider_type_id','equals','static'),
									'title' => __('CTA Button 2', 'optimizer'), 
									'desc' => __('Button Text', 'optimizer'), 
									'default' => 'DOWNLOAD',
									),
									
								array(
									'id'=>'static_cta2_link',
									'type' => 'text',
									'required' 		=>  array('slider_type_id','equals','static'),
									'title' => __('Button Link', 'optimizer'), 
									'desc' => __('Button Link', 'optimizer'), 
									'default' => '#',
									),
									
								array(
									'id'=>'static_cta2_bg_color',
									'type' => 'color',
									'title' => __('Background Color', 'optimizer'), 
									'desc' => __('Background Color', 'optimizer'), 
									'default' => '#36abfc',
									'transparent' => false,
									'validate' => 'color',
									),
								array(
									'id'=>'static_cta2_txt_color',
									'type' => 'color',
									'title' => __('Text Color', 'optimizer'),
									'desc' => __('Text Color', 'optimizer'),  
									'default' => '#ffffff',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'static_cta2_txt_style',
									'type' => 'select',
									'title' => __('Button Style', 'optimizer'), 
									'desc' => __('Button Style', 'optimizer'), 
									'options' => array(
										'flat'=>		__('Flat', 'optimizer'),
										'flat_big'=>	__('Flat (Big)', 'optimizer'),
										'hollow'=>		__('Hollow', 'optimizer'),
										'hollow_big'=>	__('Hollow (Big)', 'optimizer'),
										'rounded'=>		__('Rounded', 'optimizer'),
										'rounded_big'=>	__('Rounded (Big)', 'optimizer'),
									),
									'default' => 'flat',
									),		
									
								array(
									'id'            => 'static_textbox_width',
									'type'          => 'slider',
									'required' 		=>  array('slider_type_id','equals','static'),
									'title'         => __('Content Box Width', 'optimizer'),
									'subtitle'      => __('Set the width of the content box\'s width. In %', 'optimizer'),
									'default'       => 85,
									'min'           => 1,
									'step'          => 1,
									'max'           => 100,
									'display_value' => 'label'
								),
						
						
							array(
								'id'        => 'section-slider-imgurl-start',
								'type'      => 'section',
								'required' 		=>  array('slider_type_id','equals','static'),
								'title'     => __('Image Background', 'optimizer'),
								'subtitle'	=>'<p>'.__('Choose a single image or multiple images(Slideshow)', 'optimizer').'</p>',
								'indent'    => true // Indent all options below until the next 'section' option is set.
								),		
								
						
											array(
												'id'        => 'static_image_id',
												'type'      => 'media',
												'required' 		=>  array('slider_type_id','equals','static'),
												'title'     => __('Slide Background Image', 'optimizer'),
												'subtitle'	=>__('Click the "Upload" button to upload your Image.', 'optimizer'),
												'compiler'  => 'true',
												'default'   => array(  'url'=>''.get_template_directory_uri().'/assets/images/slide.jpg', 'id' => 'def_statimg', 'width' => '1900', 'height' => '900',)
											),
											
											array(
												'id'       => 'static_gallery',
												'type'     => 'info',
												'required' 		=>  array('slider_type_id','equals','static'),
												'title'    => '',
												'raw_html'=>true,
												'desc' => optimizer_pro_msg(__('Slide Background Slideshow Images','optimizer'), __('Add Slideshow Background to your Slider','optimizer')),											
												),
												
											array(
												'id'       => 'static_video_id',
												'type'     => 'info',
												'required' 		=>  array('slider_type_id','equals','static'),
												'title'    => '',
												'raw_html'=>true,
												'desc' => optimizer_pro_msg(__('Slide Video Background','optimizer'), __('Add Video Background to your Slider','optimizer')),											
												),
						

								array(
								'id'        => 'section-slider-imgurl-end',
								'type'      => 'section',
								'required' 		=>  array('slider_type_id','equals','static'),
								'indent'    => false // Indent all options below until the next 'section' option is set.
							),
							
							array(
							'id'        => 'section-static-end',
							'type'      => 'section',
							'required' 		=>  array('slider_type_id','equals','static'),
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
						)
						);
					
						
			
            $this->sections[] = array(
                'type' => 'divide',
            );		

            $this->sections[] = array(
                'icon'      => 'el-icon-home',
                'title'     => __('Frontpage', 'optimizer'),
                'heading'   => '',

				 );

            $this->sections[] = array(
                'icon'      => 'el-icon-check-empty',
                'title'     => __('About', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
				
				
				
							array(
							'id'        => 'section-about-start',
							'type'      => 'section',
							'title'     => __('About', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),		
									
									
								array(
									'id'=>'about_preheader_id',
									'type' => 'text',
									'title' => __('About Pre Header', 'optimizer'),
									'default' => 'A little about...',
									'customizer' => false,
									),	
									
								array(
									'id'=>'about_header_id',
									'type' => 'text',
									'title' => __('About Header', 'optimizer'),
									'default' => 'THE OPTIMIZER',
									'customizer' => false,
									),	
											
								array(
									'id'=>'about_content_id',
									'type' => 'editor',
										'args'   => array(
												'teeny'    => false,
												'wpautop'  => false,
											),
									'title' => __('About Content', 'optimizer'), 
									'default' => 'Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.',
									),
									
								array(
									'id'=>'about_header_color',
									'type' => 'color',
									'title' => __('About Header Color ', 'optimizer'), 
									'default' => '#454751',
									'validate' => 'color',
									'transparent' => false,
									),	
									
								array(
									'id'=>'about_text_color',
									'type' => 'color',
									'title' => __('About Content Text Color ', 'optimizer'), 
									'default' => '#454751',
									'validate' => 'color',
									'transparent' => false,
									),
									
								array(
									'id'=>'about_bg_color',
									'type' => 'color',
									'title' => __('About Background Color ', 'optimizer'), 
									'default' => '#ffffff',
									'validate' => 'color',
									'transparent' => false,
									),	
		

				)
			);														

            $this->sections[] = array(
                'icon'      => 'el-icon-th',
                'title'     => __('Blocks', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(						
						
						
						array(
							'id'        => 'section-blocks-start',
							'type'      => 'section',
							'title'     => __('Blocks General Settings', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
								array(
									'id'=>'midrow_color_id',
									'type' => 'color',
									'title' => __('Blocks Background Color ', 'optimizer'), 
									'default' => '#f5f5f5',
									'validate' => 'color',
									'transparent' => false,
									),
									
								array(
									'id'=>'blocktitle_color_id',
									'type' => 'color',
									'title' => __('Blocks Title Color ', 'optimizer'), 
									'default' => '#454751',
									'validate' => 'color',
									'transparent' => false,
									),
									
								array(
									'id'=>'blocktxt_color_id',
									'type' => 'color',
									'title' => __('Blocks Text Color ', 'optimizer'), 
									'default' => '#999999',
									'validate' => 'color',
									'transparent' => false,
									),
									
									
								array(
									'id'=>'block_layout_id',
									'type' => 'image_select',
									'compiler'=>true,
									'title' => __('Block Layout', 'optimizer'), 
									'options' => array(
											'1' => array('alt' => 'Layout 1', 'img' => get_template_directory_uri().'/assets/images/block1.png'),
										),
									'default' => '1'
									),
						
						
						array(
							'id'        => 'section-blocks-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),		
				
						array(
							'id'        => 'section-block1-start',
							'type'      => 'section',
							'title'     => __('Block 1', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block1_text_id',
										'type' => 'text',
										'title' => __('Block 1 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block1_image',
										'type'      => 'media',
										'title'     => __('Block 1 Image', 'optimizer'),
										'compiler'  => 'true'
									),	

									array(
										'id'=>'block1_textarea_id',
										'type' => 'editor',
										'title' => __('Block 1 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',	
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block1-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
						
						array(
							'id'        => 'section-block2-start',
							'type'      => 'section',
							'title'     => __('Block 2', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block2_text_id',
										'type' => 'text',
										'title' => __('Block 2 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block2_image',
										'type'      => 'media',
										'title'     => __('Block 2 Image', 'optimizer'),
										'compiler'  => 'true'
									),

									array(
										'id'=>'block2_textarea_id',
										'type' => 'editor',
										'title' => __('Block 2 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',	
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block2-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
						

						array(
							'id'        => 'section-block3-start',
							'type'      => 'section',
							'title'     => __('Block 3', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block3_text_id',
										'type' => 'text',
										'title' => __('Block 3 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block3_image',
										'type'      => 'media',
										'title'     => __('Block 3 Image', 'optimizer'),
										'compiler'  => 'true'
									),

									array(
										'id'=>'block3_textarea_id',
										'type' => 'editor',
										'title' => __('Block 3 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block3-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),						
						


						

						array(
							'id'        => 'section-block4-start',
							'type'      => 'section',
							'title'     => __('Block 4', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block4_text_id',
										'type' => 'text',
										'title' => __('Block 4 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block4_image',
										'type'      => 'media',
										'title'     => __('Block 4 Image', 'optimizer'),
										'compiler'  => 'true'
									),

									array(
										'id'=>'block4_textarea_id',
										'type' => 'editor',
										'title' => __('Block 4 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',	
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block4-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),						
						
						

						array(
							'id'        => 'section-block5-start',
							'type'      => 'section',
							'title'     => __('Block 5', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block5_text_id',
										'type' => 'text',
										'title' => __('Block 5 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block5_image',
										'type'      => 'media',
										'title'     => __('Block 5 Image', 'optimizer'),
										'compiler'  => 'true'
									),

									array(
										'id'=>'block5_textarea_id',
										'type' => 'editor',
										'title' => __('Block 5 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',	
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block5-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),						
						


						

						array(
							'id'        => 'section-block6-start',
							'type'      => 'section',
							'title'     => __('Block 6', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
						
									array(
										'id'=>'block6_text_id',
										'type' => 'text',
										'title' => __('Block 6 Title', 'optimizer'),
										'default' => 'Lorem Ipsum',
										'customizer' => false,
										),	
										
									array(
										'id'        => 'block6_image',
										'type'      => 'media',
										'title'     => __('Block 6 Image', 'optimizer'),
										'compiler'  => 'true'
									),

									array(
										'id'=>'block6_textarea_id',
										'type' => 'editor',
										'title' => __('Block 6 Content', 'optimizer'), 
										'default' => '<p>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</p>',	
										'args'   => array(
											'teeny'            => false,
											'wpautop'            => false,
										)
										),
						
						array(
							'id'        => 'section-block6-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
	)
	);
	
							
            $this->sections[] = array(
                'icon'      => 'el-icon-heart-empty',
                'title'     => __('Welcome Text', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
						
						
						array(
							'id'        => 'section-welcomebox-start',
							'type'      => 'section',
							'title'     => __('Welcome Text', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),		
											
								array(
									'id'=>'welcm_textarea_id',
									'type' => 'editor',
									'title' => __('Welcome Text', 'optimizer'), 
									'default' => '<h2>Lorem ipsum dolor sit amet, consectetur  dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.</h2>',
										'args'   => array(
												'teeny'    => false,
												'wpautop'            => false,
											),
									),
									
								array(
									'id'=>'welcome_color_id',
									'type' => 'color',
									'title' => __('Welcome Section Background Color', 'optimizer'), 
									'default' => '#333333',
									'validate' => 'color',
									'transparent' => false,
									),	
									
								array(
									'id'=>'welcometxt_color_id',
									'type' => 'color',
									'title' => __('Welcome Section Text Color ', 'optimizer'), 
									'default' => '#999999',
									'validate' => 'color',
									'transparent' => false,
									),	
									
									
								array(
									'id'        => 'welcome_bg_image',
									'type'      => 'media',
									'title'     => __('Welcome Section background Image', 'optimizer'),
									'subtitle'	=>__('Click the "Upload" button to upload your Image.', 'optimizer'),
									'compiler'  => 'true',
									'default'   => array(  'url'=>''.get_template_directory_uri().'/assets/images/welcome_textbg.jpg', 'id' => 'def_welcome', 'width' => '1600', 'height' => '751',)
								),				
														
						array(
							'id'        => 'section-welcomebox-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),			
							
					)
					);						


            $this->sections[] = array(
                'icon'      => 'el-icon-file-edit',
                'title'     => __('Posts', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
						
						array(
							'id'        => 'section-frontpost-start',
							'type'      => 'section',
							'title'     => __('Frontpage Posts', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),		
											
									array(
										'id'=>'posts_title_id',
										'type' => 'text',
										'title' => __('Title', 'optimizer'), 
										'default' => __('Our Work', 'optimizer'),
										'customizer' => false,
										),
									array(
										'id'=>'posts_subtitle_id',
										'type' => 'text',
										'title' => __('Subtitle', 'optimizer'), 
										'default' => __('Check Out Our Portfolio', 'optimizer'),
										'customizer' => false,
										),
									array(
										'id'=>'front_layout_id',
										'type' => 'image_select',
										'compiler'=>true,
										'title' => __('Posts layout', 'optimizer'), 
										'desc' => __('More Post Layouts are available in the PRO version', 'optimizer'),
										'options' => array(
												'1' => array('alt' => 'Layout 1', 'img' => get_template_directory_uri().'/assets/images/layout1.png'),
												'4' => array('alt' => 'Layout 4', 'img' => get_template_directory_uri().'/assets/images/layout4.png'),
											),
										'default' => '1'
										),
										
									array(
										'id'=>'lay_show_title',
										'type' => 'checkbox',
										'title' => __('Always Display Post Titles in Layout 1 Posts', 'optimizer'), 
										'desc' => '',
										'default' => '0',
										'customizer' => false,
										),
																	
									
									array(
										'id'        => 'n_posts_type_id',
										'type'      => 'select',
										'title'     => __('Content Type', 'optimizer'),
										'options' => array('post'=>'Posts','page'=>'Pages','product'=>'Products (Woocommerce)'),
										'default' => 'post',
										'customizer' => false,
									),
									
									array(
										'id'=>'n_posts_field_id',
										'type' => 'text',
										'title' => __('Number Of Posts', 'optimizer'),
										'default' => '6',
										'customizer' => false,
										),
										
									array(
										'id'        => 'posts_cat_id',
										'type'      => 'select',
										'data'      => 'categories',
										'multi'     => true,
										'title'     => __('Display posts from these categories only', 'optimizer'),
										'subtitle'  => __('default: All categories', 'optimizer')
									),


									array(
										'id'        => 'navigation_type',
										'type'      => 'select',
										'title'     => __('Post Navigation', 'optimizer'),
										'options'   => array(
											'numbered_ajax' => __('Numbered (Ajax)', 'optimizer'), 
											'numbered' => __('Numbered', 'optimizer'),
											'no_nav' => __('Disabled', 'optimizer'), 
										),
										'default'   => 'numbered_ajax'
									),
									
								array(
									'id'=>'frontposts_title_color',
									'type' => 'color',
									'title' => __('FrontPage Posts Title & Subtitle Color', 'optimizer'), 
									'default' => '#454751',
									'validate' => 'color',
									'transparent' => false,
									),
									
								array(
									'id'=>'frontposts_color_id',
									'type' => 'color',
									'title' => __('Frontpage Posts Section Background Color', 'optimizer'), 
									'default' => '#ffffff',
									'validate' => 'color',
									'transparent' => false,
									),
			
								array(
									'id'=>'frontposts_bg_color',
									'type' => 'color',
									'title' => __('FrontPage Posts Background Color', 'optimizer'), 
									'subtitle'  => __('For Layout 2, 3, 4 & 5', 'optimizer'),
									'default' => '#ffffff',
									'validate' => 'color',
									'transparent' => false,
									),

														
						array(
							'id'        => 'section-frontpost-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),		
						

					)
				);
				
            $this->sections[] = array(
                'icon'      => 'el-icon-lines',
                'title'     => __('Elements position', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(						
													
						array(
							'id'        => 'section-sort-start',
							'type'      => 'section',
							'title'     => __('Frontpage Elements position', 'optimizer'),
							'indent'    => true // Indent all options below until the next 'section' option is set.
						),
									
									array(
										'id' => 'home_sort_id',
										'type' => 'sortable',
										'mode' => 'checkbox', // checkbox or text
										'title' => '',
										'desc' => __('Drag and Drop each element to reorder their position.', 'optimizer'),
										'options' => array(
											'about' => 'About',
											'blocks' => 'Blocks',
											'welcome-text' => 'Welcome Text',
											'posts' => 'Frontpage Posts',
											),
										'default' => array(
											'about' => 'About',
											'blocks' => 'Blocks',
											'welcome-text' => 'Welcome Text',
											'posts' => 'Frontpage Posts',
											)
									),

									
									
						array(
							'id'        => 'section-sort-end',
							'type'      => 'section',
							'indent'    => false // Indent all options below until the next 'section' option is set.
						),
						
					
                )
            );	
				
            $this->sections[] = array(
                'icon'      => 'el-icon-bullhorn pro_feat',
                'title'     => __('Call to Action', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
					)
				);
				
            $this->sections[] = array(
                'icon'      => 'el-icon-user pro_feat',
                'title'     => __('Testimonials', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
					)
				);
				
            $this->sections[] = array(
                'icon'      => 'el-icon-map-marker pro_feat',
                'title'     => __('Location Map', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
					)
				);
				
            $this->sections[] = array(
                'icon'      => 'el-icon-envelope pro_feat',
                'title'     => __('NewsLetter', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
					)
				);
				
            $this->sections[] = array(
                'icon'      => 'el-icon-website pro_feat',
                'title'     => __('Frontpage Widgets', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
					)
				);
				

			
			
 
            $this->sections[] = array(
                'icon'      => 'el-icon-photo',
                'title'     => __('Other Pages', 'optimizer'),
                );
				
            $this->sections[] = array(
                'icon'      => 'dashicons dashicons-admin-post',
                'title'     => __('Single Post', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
						array(
							'id'        => 'section-single-start',
							'type'      => 'section',
							'title'     => __('Single Post Settings', 'optimizer'),
							'indent'    => true
						),
						
								array(
									'id'=>'post_info_id',
									'type' => 'switch', 
									'title' => __('Show Post Info', 'optimizer'),
									'subtitle'=> __('Date, Author Name & Categories','optimizer'),
									"default" 		=> true,
									),

								array(
									'id'=>'post_nextprev_id',
									'type' => 'switch', 
									'title' => __('Show Next and Previous Posts', 'optimizer'),
									"default" 		=> false,
									),
									
									
								array(
									'id'=>'post_comments_id',
									'type' => 'switch', 
									'title' => __('Show Comments', 'optimizer'),
									"default" 		=> true,
									),
									
									
						array(
							'id'        => 'section-single-end',
							'type'      => 'section',
							'indent'    => false
						),
						


			 
                )
            );
			
			
            $this->sections[] = array(
                'icon'      => 'dashicons dashicons-admin-page',
                'title'     => __('Single Page', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
					

						array(
							'id'        => 'section-page-start',
							'type'      => 'section',
							'title'     => __('Single Page Settings', 'optimizer'),
							'indent'    => true
						),
						
								array(
									'id'=>'page_header_color',
									'type' => 'color',
									'title' => __('Page Header Default Background Color', 'optimizer'), 
									'default' => '#f7f7f7',
									'transparent' => false,
									'validate' => 'color',
									),
								array(
									'id'=>'page_header_txtcolor',
									'type' => 'color',
									'title' => __('Page Header Default Text Color', 'optimizer'), 
									'default' => '#555555',
									'transparent' => false,
									'validate' => 'color',
									),
									
									
									array(
										'id'=>'blog_cat_id',
										'type' => 'select',
										'data' => 'categories',
										'multi' => true,
										'title' => __('Display Blog Posts from selected Categories', 'optimizer'), 
										'desc' => __('If you have setup a Blog page with "Blog Page Template", choose the categories to get the blog posts from', 'optimizer'),
										),
										
									array(
										'id'=>'blog_num_id',
										'type' => 'text',
										'title' => __('Blog Page Posts Count ', 'optimizer'),
										'default' => 6,
										'customizer' => false,
										),
										
									array(
										'id'=>'blog_layout_id',
										'type' => 'image_select',
										'compiler'=>true,
										'title' => __('Blog Page layout', 'optimizer'), 
										'options' => array(
												'1' => array('alt' => 'Layout 1', 'img' => get_template_directory_uri().'/assets/images/blog_layout1.png'),
											),
										'default' => '1'
										),
									array(
										'id'=>'show_blog_thumb',
										'type' => 'switch', 
										'title' => __('Show Blog Page Thumbnails', 'optimizer'),
										"default" 		=> true,
										'on'      	=> __('Yes', 'optimizer'),
										'off'      	=> __('No', 'optimizer'),
										),
										
								array(
									'id'       => 'contact_page_pro',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Contact Page Settings','optimizer'), __('Setup Contact Page Email address','optimizer'),true),											
									),
									
								array(
									'id'       => 'page_header_pro',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Custom Page Header','optimizer'), __('Set Custom Page header for each page','optimizer'),true),											
									),

							
						array(
							'id'        => 'section-page-end',
							'type'      => 'section',
							'indent'    => false
						),

						
									
				
                )
            );		

			
            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Color & Font', 'optimizer'),
                );
				
            $this->sections[] = array(
                'icon'      => 'fa-circle-o',
                'title'     => __('General', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(

								//Elements Color
								array(
									'id'=>'sec_color_id',
									'type' => 'color',
									'title' => __('Base Color', 'optimizer'), 
									'default' => '#36abfc',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'sectxt_color_id',
									'type' => 'color',
									'title' => __('Text Color on Base Color', 'optimizer'), 
									'default' => '#FFFFFF',
									'transparent' => false,
									'validate' => 'color',
									),

									
								array(
									'id'=>'content_font_id',
									'type' => 'typography',
									'title' => __('Site Content Font', 'optimizer'),
									'google'=>true,
									'subsets' => true,
									'font-weight' => true,
									'text-align'=> false,
									'font-style' => false,
									'font-backup' => false,
									'color' => false,
									'preview' => true,
									'line-height' => false,
									'word-spacing' => false,
									'letter-spacing' => false,
									'default' => array(
										'font-size'=>'16px',
										'font-family'=>'Open Sans',
										'font-weight'=>'400',
										'subsets'=>'cyrillic',
										),
									),
								
								array(
									'id'=>'primtxt_color_id',
									'type' => 'color',
									'title' => __('Site content Text Color', 'optimizer'), 
									'default' => '#999999',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'       => 'custom_font_pro',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Custom Font Upload','optimizer'), __('Upload Custom font and use it everywhere in the theme.','optimizer'),false),											
									),

	
                )
            );



            $this->sections[] = array(
                'icon'      => 'fa-circle-o',
                'title'     => __('Header & Menu', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
				
				
					array(
						'id'        => 'section-color-head',
						'type'      => 'section',
						'title'     => __('Header', 'optimizer'),
						'indent'    => true
						),	
								array(
									'id'=>'logo_font_id',
									'type' => 'typography',
									'title' => __('Site Title Font', 'optimizer'),
									'subtitle' => __('Specify the body font properties.', 'optimizer'),
									'google'=>true,
									'font-backup'=>false,
									'line-height'=>false,
									'letter-spacing'=>true,
									'text-align'=> false,
									'color' => false,
									'default' => array(
										'font-size'=>'42px',
										'font-family'=>'Open Sans',
										'font-weight'=>'400',
										'letter-spacing'=>'2px',
										'subsets'=>'cyrillic'
										),
									'preview' => array('text' => 'optimizer Theme'),
									),	
								//Text Colors	
								array(
									'id'=>'logo_color_id',
									'type' => 'color',
									'title' => __('Site Title Font Color', 'optimizer'), 
									'default' => '#222222',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'head_color_id',
									'type' => 'color',
									'title' => __('Header Background Color', 'optimizer'), 
									'default' => '#fafafa',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'       => 'header_bg_pro',
									'type'     => 'info',
									'title'    => '',
									'raw_html'=>true,
									'desc' => optimizer_pro_msg(__('Header background image','optimizer'), __('Set Background Image to your header','optimizer'),true),											
									),

					array(
						'id'        => 'section-color-head-end',
						'type'      => 'section',
						'indent'    => false
						),
					array(
						'id'        => 'section-color-menu',
						'type'      => 'section',
						'title'     => __('Menu', 'optimizer'),
						'indent'    => true
						),
								array(
									'id'=>'menutxt_color_id',
									'type' => 'color',
									'title' => __('Menu Text Color (Regular)', 'optimizer'), 
									'default' => '#666666',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'menutxt_color_hover',
									'type' => 'color',
									'title' => __('Menu Text Color (Hover)', 'optimizer'), 
									'default' => '#ffffff',
									'transparent' => false,
									'validate' => 'color',
									),


								array(
									'id'=>'menu_size_id',
									'type' => 'text',
									'title' => __('Menu Font Size', 'optimizer'),
									'default' => '14px'
									),
					array(
						'id'        => 'section-color-menu-end',
						'type'      => 'section',
						'indent'    => false
						),
						
						
                )
            );
			
            $this->sections[] = array(
                'icon'      => 'fa-circle-o',
                'title'     => __('Sidebar & Widget', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
				
					
					array(
						'id'        => 'section-color-sidebar',
						'type'      => 'section',
						'title'     => __('Sidebar Widgets', 'optimizer'),
						'indent'    => true
						),
								array(
									'id'=>'sidebar_color_id',
									'type' => 'color',
									'title' => __('Sidebar Widgets Background Color', 'optimizer'), 
									'default' => '#ffffff',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'sidebar_tt_color_id',
									'type' => 'color',
									'title' => __('Sidebar Widget Title Color', 'optimizer'), 
									'default' => '#666666',
									'transparent' => false,
									'validate' => 'color',
									),
									
								array(
									'id'=>'sidebartxt_color_id',
									'type' => 'color',
									'title' => __('Sidebar Text Color', 'optimizer'), 
									'default' => '#999999',
									'transparent' => false,
									'validate' => 'color',
									),	
									
					array(
						'id'        => 'section-color-sidebar-end',
						'type'      => 'section',
						'indent'    => false
						),
						
					array(
						'id'        => 'section-color-footerwidget',
						'type'      => 'section',
						'title'     => __('Footer Widgets', 'optimizer'),
						'indent'    => true
						),
								array(
									'id'=>'footer_color_id',
									'type' => 'color',
									'title' => __('Footer Widgets Background Color', 'optimizer'), 
									'default' => '#222222',
									'transparent' => false,
									'validate' => 'color',
									),
								array(
									'id'=>'footwdgtxt_color_id',
									'type' => 'color',
									'title' => __('Footer Widget Text Color', 'optimizer'), 
									'default' => '#666666',
									'transparent' => false,
									'validate' => 'color',
									),
								
								array(
									'id'=>'footer_title_color',
									'type' => 'color',
									'title' => __('Footer Widget Title Color', 'optimizer'), 
									'default' => '#ffffff',
									'transparent' => false,
									'validate' => 'color',
									),	
									
									
									
					array(
						'id'        => 'section-color-footerwidget-end',
						'type'      => 'section',
						'indent'    => false
						),
				
                )
            );

			
            $this->sections[] = array(
                'icon'      => 'fa-circle-o',
                'title'     => __('Post & Page', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(

					array(
						'id'        => 'section-color-post',
						'type'      => 'section',
						'title'     => __('Post', 'optimizer'),
						'indent'    => true
						),
								array(
									'id'=>'ptitle_font_id',
									'type' => 'typography',
									'title' => __('Post Titles, headings and Menu Font', 'optimizer'),
									'google'=>true,
									'subsets' => true,
									'font-weight' => true,
									'font-style' => false,
									'text-align'=> false,
									'font-backup' => false,
									'color' => false,
									'preview' => true,
									'line-height' => false,
									'word-spacing' => false,
									'letter-spacing' => false,
									'font-size'=>false,
									'default' => array(
										'font-family'=>'Open Sans',
										'subsets'=>'cyrillic',
										'font-weight'=>'400'
										),
									),

									
								array(
									'id'=>'title_txt_color_id',
									'type' => 'color',
									'title' => __('Post Title Color', 'optimizer'), 
									'default' => '#666666',
									'transparent' => false,
									'validate' => 'color',
									),

									
					array(
						'id'        => 'section-color-post',
						'type'      => 'section',
						'indent'    => false
						),

				
				
                )
            );		
			
            $this->sections[] = array(
                'icon'      => 'fa-circle-o',
                'title'     => __('Other', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(
				
	
									
								array(
									'id'=>'txt_upcase_id',
									'type' => 'switch', 
									'title' => __('Turn Menu Text & All Headings to Uppercase ', 'optimizer'),
									"default" 		=> 1,
									),
									
								array(
									'id'=>'copyright_bg_color',
									'type' => 'color',
									'title' => __('Copyright Area Background', 'optimizer'), 
									'default' => '#333333',
									'transparent' => false,
									'validate' => 'color',
									),
								
								array(
									'id'=>'copyright_txt_color',
									'type' => 'color',
									'title' => __('Copyright Text Color', 'optimizer'), 
									'default' => '#999999',
									'transparent' => false,
									'validate' => 'color',
									),	
									
				
                )
            );		



            $this->sections[] = array(
                'icon'      => 'el-icon-twitter',
                'title'     => __('Social', 'optimizer'),
                );
				
            $this->sections[] = array(
                'icon'      => 'el-icon-bookmark',
                'title'     => __('Social Links', 'optimizer'),
                'heading'   => '',
				'subsection' => true,
                'fields'    => array(	
				
  
						  array(
							  'id'=>'social_button_style',
							  'type' => 'image_select',
							  'compiler'=>true,
							  'title' => __('Social links Icons Style', 'optimizer'), 
							  'options' => array(
								'simple' => array('alt' => __('Simple', 'optimizer'), 'img' => get_template_directory_uri().'/assets/images/social/social_simple.png'),
								  ),
							  'default' => 'simple'
							  ),

							array(
								'id'=>'social_bookmark_pos',
								'type' => 'button_set',
								'title' => __('Position', 'optimizer'), 
								'options' => array('header'=>'Header','footer'=>'Footer'),
								'default' => 'footer',
								),	
								
							array(
								'id'=>'social_bookmark_size',
								'type' => 'button_set',
								'title' => __('Size', 'optimizer'), 
								'options' => array('normal'=>'Normal','large'=>'large'),
								'default' => 'normal',
								),

							array(
								'id'   =>'social_divider',
								'type' => 'divide'
							),		

						  array(
							  'id'=>'facebook_field_id',
							  'type' => 'text',
							  'title' => __('Facebook URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'twitter_field_id',
							  'type' => 'text',
							  'title' => __('Twitter URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'gplus_field_id',
							  'type' => 'text',
							  'title' => __('Google Plus URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'youtube_field_id',
							  'type' => 'text',
							  'title' => __('Youtube URL ','optimizer'),
							  'validate' => 'url',
							  ),
							  
						  array(
							  'id'=>'flickr_field_id',
							  'type' => 'text',
							  'title' => __('Flickr URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'linkedin_field_id',
							  'type' => 'text',
							  'title' => __('Linkedin URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'pinterest_field_id',
							  'type' => 'text',
							  'title' => __('Pinterest URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'tumblr_field_id',
							  'type' => 'text',
							  'title' => __('Tumblr URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'instagram_field_id',
							  'type' => 'text',
							  'title' => __('Instagram URL ','optimizer'),
							  'validate' => 'url',
							  ),
						  array(
							  'id'=>'rss_field_id',
							  'type' => 'text',
							  'title' => __('RSS URL ','optimizer'),
							  'validate' => 'url',
							  ),
			 
			 
                )
            );
			

            $this->sections[] = array(
                'icon'      => 'fa-align-left',
                'title'     => __('Miscellaneous', 'optimizer'),
                'fields'    => array(

						
						array(
							'id'        => 'section-media-start',
							'type'      => 'section',
							'title'     => __('Media Settings', 'optimizer'),
							'indent'    => true
						),
										
									array(
										'id'=>'post_lightbox_id',
										'type' => 'switch', 
										'title' => __('Lightbox Feature', 'optimizer'),
										"default" 		=> true,
										),
										
									array(
										'id'=>'post_gallery_id',
										'type' => 'switch', 
										'title' => __('Enhanced Gallery', 'optimizer'),
										'subtitle' => __('Turning on this option will change all your galleries to advanced slider galleries. The gallery images will be automatically linked to "files".', 'optimizer'),
										"default" 		=> false,
										),						
						
						array(
							'id'        => 'section-media-end',
							'type'      => 'section',
							'indent'    => false
						),
																		
						
						array(
							'id'        => 'section-other-start',
							'type'      => 'section',
							'title'     => __('Other Settings', 'optimizer'),
							'indent'    => true
						),
						
									array(
										'id'=>'cat_layout_id',
										'type' => 'image_select',
										'compiler'=>true,
										'title' => __('Post layout for Category & Archive Pages', 'optimizer'), 
										'options' => array(
												'1' => array('alt' => 'Layout 1', 'img' => get_template_directory_uri().'/assets/images/layout1.png'),
												'4' => array('alt' => 'Layout 4', 'img' => get_template_directory_uri().'/assets/images/layout4.png'),
											),
										'default' => '1'
										),
										
							
						array(
							'id'        => 'section-other-end',
							'type'      => 'section',
							'indent'    => false
						),

						array(
							'id'       => 'favicon_pro',
							'type'     => 'info',
							'title'    => '',
							'raw_html'=>true,
							'desc' => optimizer_pro_msg(__('Favicon','optimizer'), __('Add favicon to your site','optimizer'), true),											
							),

                )
            );
			



            $this->sections[] = array(
                'icon'      => 'el-icon-iphone-home',
                'title'     => __('Mobile Layout', 'optimizer'),
                'fields'    => array(	
				
					
							
						array(
							'id'        => 'section-hidemob-start',
							'type'      => 'section',
							'title'     => __('Hide Items From the Mobile Version of Your Site', 'optimizer'),
							'indent'    => true
						),					
												
								array(
									'id'=>'hide_mob_slide',
									'type' => 'checkbox',
									'title' => __('Hide Slider', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),
									
								array(
									'id'=>'hide_mob_about',
									'type' => 'checkbox',
									'title' => __('Hide About Box', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),
									
								array(
									'id'=>'hide_mob_blocks',
									'type' => 'checkbox',
									'title' => __('Hide Front Page Blocks', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),
								array(
									'id'=>'hide_mob_welcm',
									'type' => 'checkbox',
									'title' => __('Hide Front Page Welcome Text', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),
		
								array(
									'id'=>'hide_mob_frontposts',
									'type' => 'checkbox',
									'title' => __('Hide Front Page Posts', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),

								array(
									'id'=>'hide_mob_rightsdbr',
									'type' => 'checkbox',
									'title' => __('Hide Right Sidebar', 'optimizer'), 
									'desc' => '',
									'default' => '0',
									'customizer' => false,
									),
							
						array(
							'id'        => 'section-hidemob-end',
							'type'      => 'section',
							'indent'    => false
						),

                )
            );
			
			
            $this->sections[] = array(
                'type' => 'divide',
            );		

			

            $this->sections[] = array(
                'icon'      => 'fa fa-code',
                'title'     => __('Custom Code', 'optimizer'),
                'fields'    => array(
				
							
						array(
							'id'        => 'section-css-start',
							'type'      => 'section',
               				'title'     => __('Custom CSS', 'optimizer'),
                			'desc'  => __('Quickly add some CSS to your theme by adding it to this block.', 'optimizer'),
							'indent'    => false
						),
								
								array(
									'id'        => 'custom-css',
									'type'      => 'textarea',
									'title'     => '',
									'validate'  => 'css',
								),
					
						array(
							'id'        => 'section-css-end',
							'type'      => 'section',
							'indent'    => false
						),

                )
            );


            $this->sections[] = array(
                'title'     => __('Import / Export', 'optimizer'),
                'desc'      => __('Import and Export your optimizer Theme settings from file, text or URL.', 'optimizer'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => __('Import Export', 'optimizer'),
                        'subtitle'      => __('Save and restore your theme options', 'optimizer'),
                        'full_width'    => false,
                    ),
                ),
            );
			
            $this->sections[] = array(
                'type' => 'divide',
            );  
			
			$this->sections[] = array(
				'title' => __('Upgrade to PRO', 'optimizer'),
				'icon' => 'fa-bolt',
				'icon_class' => 'fa-large',
				'fields' => array(
					array(
						'id'=>'optim_upgrade',
						'type' => 'info',
						'raw_html'=>true,
						'desc' => optimizer_upgrade(),
						),	
				)
			);	
                
 
        }

  /*      public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'optimizer'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'optimizer')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'optimizer'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'optimizer')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'optimizer');
        }*/

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'optimizer',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => 'Optimizer',     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'submenu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Optimizer Options', 'optimizer'),
                'page_title'        => __('Optimizer Options', 'optimizer'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', 
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'edit_theme_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => 'optimizer_options',              // Page slug used to denote the panel
                'save_defaults'     => false,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE
                    'disable_tracking'          => true,
				'sass' => array(
					'enabled'       => false,
					'page_output'   => false,
//                        'output_url'   => self::$_upload_dir // ReduxFramework::$_upload_url
				),
                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom left',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'click',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.facebook.com/layerthemes',
                'title' => __('Like Us on Facebook', 'optimizer'),
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/layer_themes',
                'title' => __('Follow Us on Twitter', 'optimizer'),
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://plus.google.com/u/0/103483167150562533630/about',
                'title' => __('Find Us on Google Plus', 'optimizer'),
                'icon'  => 'el-icon-googleplus'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.pinterest.com/layerthemes/',
                'title' => __('Find Us on Pinterest', 'optimizer'),
                'icon'  => 'el-icon-pinterest'
            );
			
            // Panel Intro text -> before the form
                $this->args['intro_text'] = __('<p><a class="doc_link" href="https://www.layerthemes.com/optimizer-documentation/" target="_blank">Documentation</a><a class="pro_link" href="https://www.layerthemes.com/theme/optimizer-upgrade/" target="_blank"><span>Upgrade To PRO</span> for 100+ Premium Features &amp; Lightning Fast Theme Support!</a></p><div style="clear:both"></div>', 'optimizer');

            // Add content after the form.
            $this->args['footer_text'] = '<div class="optim_footer"><a class="optim_changelog" target="_blank" href="https://www.layerthemes.com/optimizer-changelog/">Optimizer - '.$this->theme->display('Version').'</a></div>';
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new optimizer_theme_options();
}
