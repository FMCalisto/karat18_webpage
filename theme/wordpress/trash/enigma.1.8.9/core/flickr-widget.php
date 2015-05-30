<?php 

// Flickr widget for Enigma WordPress theme

class wl_flickr_widget extends WP_Widget {

	function wl_flickr_widget() {
		parent::WP_Widget(false, $name = 'Flickr widget', array('description' => __('Displays your latest Flickr photos.', 'weblizar') ));	
	}
	
	function widget($args, $instance) {
	
		// Outputs the content of the widget
		extract($args); // Make before_widget, etc available.
		
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$fli_id = $instance['id'];
		$fli_number = $instance['number'];
		$unique_id = $args['widget_id'];
		
		echo $before_widget;
		
		
		if (!empty($widget_title)) {
		
			echo $before_title . $widget_title . $after_title;
			
		} ?>
		
			<div id="flickr_badge_wrapper">
				
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fli_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $fli_id; ?>"></script>
			
			</div>
					
			<!--<p class="widgetmore"><a href="http://www.flickr.com/photos/<?php //echo "$fli_id"; ?>"><?php //_e('More on Flickr', 'weblizar') . ' &raquo;'; ?></a></p>-->
		
		<?php echo $after_widget; 
	}
	
	
	function update($new_instance, $old_instance) {
	
		//update and save the widget
		$instance = array();
        $instance['widget_title'] = strip_tags($new_instance['widget_title']);
        $instance['fli_id'] = strip_tags($new_instance['fli_id']);
        $instance['number'] = (int)strip_tags($new_instance['number']);
		return $new_instance;
		
	}
	
	function form($instance) {
		// Get the options into variables, escaping html characters on the way
		$instance = wp_parse_args((array) $instance, array('widget_title' => ''));
        $widget_title = isset($instance['widget_title']) ? esc_attr($instance['widget_title']) : 'Flickr';
        $fli_id = isset($instance['fli_id']) ? esc_attr($instance['fli_id']) : '121500546@N06';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
		?>		
		<p>
			<label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php  _e('Title', 'weblizar'); ?>:
			<input id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" class="widefat" value="<?php echo $widget_title; ?>" /></label>
		</p>
				
		
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID (use <a target="_blank" href="http://www.idgettr.com">idGettr</a>):', ''); ?>
			<input id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" class="widefat" value="<?php echo $fli_id; ?>" /></label>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of images to display:', 'weblizar'); ?>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" class="widefat" value="<?php echo $number; ?>" /></label>
		</p>
		
		<?php
	}
}
register_widget('wl_flickr_widget'); ?>