<?php

// Add the Ultra Flex theme
function ultra_metaslider_themes($themes, $current){
	$themes .= "<option value='ultra' class='option flex' ".selected('ultra', $current, false).">".__('Ultra (Flex)', 'ultra')."</option>";
	return $themes;
}
add_filter('metaslider_get_available_themes', 'ultra_metaslider_themes', 5, 2);

// Change the Flex name space if the Ultra theme is selected
function ultra_metaslider_flex_params($options, $slider_id, $settings) {
    if(!empty($settings['theme']) && $settings['theme'] == 'ultra') { 
        $options['namespace'] = '"flex-ultra-"'; 
    } 
    return $options;
} 
add_filter('metaslider_flex_slider_parameters', 'ultra_metaslider_flex_params', 10, 3);

function ultra_metaslider_filter_flex_slide($html, $slide, $settings){
	if( is_admin() && !empty($GLOBALS['ultra_is_main_slider']) ) return $html;

	if(!empty($slide['caption']) && function_exists('filter_var') && filter_var($slide['caption'], FILTER_VALIDATE_URL) !== false) {

		$settings['height'] = round( $settings['height'] / 1200 * $settings['width'] );
		$settings['width'] = 1200;

		$html = sprintf("<img src='%s' class='ms-default-image' width='%d' height='%d' />", $slide['thumb'], intval($settings['width']), intval($settings['height']));

		if (strlen($slide['url'])) {
			$html = '<a href="' . esc_url( $slide['url'] ) . '" target="' . esc_attr( $slide['target'] ) . '">' . $html . '</a>';
		}

		$caption = '<div class="content">';
		if (strlen($slide['url'])) $caption .= '<a href="' . $slide['url'] . '" target="' . $slide['target'] . '">';
		$caption .= sprintf('<img src="%s" width="%d" height="%d" />', esc_url($slide['caption']), intval($settings['width']), intval($settings['height']));
		if (strlen($slide['url'])) $caption .= '</a>';
		$caption .= '</div>';

		$html = $caption . $html;

		$thumb = isset($slide['data-thumb']) && strlen($slide['data-thumb']) ? " data-thumb=\"{$slide['data-thumb']}\"" : "";

		$html = '<li style="display: none;"' . $thumb . ' class="ultra-slide-with-image">' . $html . '</li>';
	}

	return $html;
}
add_filter('metaslider_image_flex_slider_markup', 'ultra_metaslider_filter_flex_slide', 10, 3);
 
// Add Meta Slider options to Theme Settings
function siteorigin_metaslider_get_options($has_demo = true){
	$options = array( '' => __('None', 'ultra') );

	if($has_demo) $options['demo'] = __('Demo Slider', 'ultra');

	if(class_exists('MetaSliderPlugin')){
		$sliders = get_posts(array(
			'post_type' => 'ml-slider',
			'numberposts' => 200,

		));

		foreach($sliders as $slider) {
			$options['meta:'.$slider->ID] = __('Slider: ', 'ultra').$slider->post_title;
		}
	}

	return $options;
}

// Install links
function siteorigin_metaslider_install_link(){
	if(function_exists('siteorigin_plugin_activation_install_url')) {
		return siteorigin_plugin_activation_install_url('ml-slider', 'MetaSlider');
	}
	else {
		return 'http://downloads.wordpress.org/plugin/ml-slider.zip';
	}
}

function siteorigin_metaslider_affiliate(){
	return 'https://getdpd.com/cart/hoplink/15318?referrer=1ag7po4k2uas40wowgw';
}
add_filter('metaslider_hoplink', 'siteorigin_metaslider_affiliate');


// Add a meta box for page slider selection
function ultra_metaslider_page_setting_metabox(){
	add_meta_box('ultra-metaslider-page-slider', __('Page Meta Slider', 'ultra'), 'ultra_metaslider_page_setting_metabox_render', 'page', 'side');
}
add_action('add_meta_boxes', 'ultra_metaslider_page_setting_metabox');

function ultra_metaslider_page_setting_metabox_render($post){
	$metaslider = get_post_meta($post->ID, 'ultra_metaslider_slider', true);

	$is_home = $post->ID == get_option( 'page_on_front' );
	// If we're on the home page and the user hasn't explicitly set something here use the 'home_slider' theme setting.
	if ( $is_home && empty( $metaslider ) ) {
		$metaslider = siteorigin_setting( 'home_slider' );
	}
	// Default settings to theme setting.
	$metaslider_stretch = siteorigin_setting( 'home_slider_stretch' );
	$metaslider_overlap = siteorigin_setting( 'home_header_overlaps' );
	//Include the demo slider in the options if it's the home page.
	$options = siteorigin_metaslider_get_options($is_home);
	if ( metadata_exists( 'post', $post->ID, 'ultra_metaslider_slider_stretch' ) ) {
		$metaslider_stretch = get_post_meta($post->ID, 'ultra_metaslider_slider_stretch', true);
	}
	if ( metadata_exists( 'post', $post->ID, 'ultra_metaslider_slider_overlap' ) ) {
		$metaslider_overlap = get_post_meta($post->ID, 'ultra_metaslider_slider_overlap', true);
	}	

	?>
	<label><strong><?php _e('Display Page Meta Slider', 'ultra') ?></strong></label>
	<p>
		<select name="ultra_page_metaslider">
			<?php foreach($options as $id => $name) : ?>
				<option value="<?php echo esc_attr($id) ?>" <?php selected($metaslider, $id) ?>><?php echo esc_html($name) ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p class="checkbox-wrapper">
		<input id="ultra_page_metaslider_stretch" name="ultra_page_metaslider_stretch" type="checkbox" <?php checked( $metaslider_stretch ) ?> />
		<label for="ultra_page_metaslider_stretch"><?php _e('Stretch Page Meta Slider', 'ultra') ?></label>
	</p>
	<p class="checkbox-wrapper">
		<input id="ultra_page_metaslider_overlap" name="ultra_page_metaslider_overlap" type="checkbox" <?php checked( $metaslider_overlap ) ?> />
		<label for="ultra_page_metaslider_overlap"><?php _e('Overlap Header', 'ultra') ?></label>
	</p>	
	<?php
	wp_nonce_field('save', '_ultra_metaslider_nonce');
}

function ultra_metaslider_page_setting_save($post_id){
	if( empty($_POST['_ultra_metaslider_nonce']) || !wp_verify_nonce($_POST['_ultra_metaslider_nonce'], 'save') ) return;
	if( !current_user_can('edit_post', $post_id) ) return;
	if( defined('DOING_AJAX') ) return;

	update_post_meta($post_id, 'ultra_metaslider_slider', $_POST['ultra_page_metaslider']);

	$slider_stretch = filter_input(INPUT_POST, 'ultra_page_metaslider_stretch') == "on";
	update_post_meta($post_id, 'ultra_metaslider_slider_stretch', $slider_stretch );

	$slider_overlap = filter_input(INPUT_POST, 'ultra_page_metaslider_overlap') == "on";
	update_post_meta($post_id, 'ultra_metaslider_slider_overlap', $slider_overlap );
	
	// If we're on the home page update the 'home_slider' theme setting as well.
	if ( $post_id == get_option( 'page_on_front' ) ) {
		siteorigin_settings_set( 'home_slider', $_POST['ultra_page_metaslider'] );
		siteorigin_settings_set( 'home_slider_stretch', $slider_stretch );
		siteorigin_settings_set( 'home_header_overlaps', $slider_overlap );
	}
}
add_action('save_post', 'ultra_metaslider_page_setting_save');