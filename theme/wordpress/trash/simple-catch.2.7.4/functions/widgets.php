<?php
/**
 * Register sidebars and widget areas.
 */
function simplecatch_widgets_init() {
	
	register_widget( 'CustomTagWidget' );
	register_widget( 'simplecatch_social_widget' );
	register_widget( 'simplecatch_adspace_widget' );
	
	register_sidebar( array( 
		'name'          => __( 'sidebar', 'simplecatch' ),
		'id'            => 'sidebar',
		'description'   => __( 'sidebar', 'simplecatch' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><hr/>' 
	) ); 
	
 }
add_action( 'widgets_init', 'simplecatch_widgets_init' );


/** 
 * Extends class wp_widget
 * 
 * Creates a function CustomTagWidget
 * $widget_ops option array passed to wp_register_sidebar_widget().
 * $control_ops option array passed to wp_register_widget_control().
 * $name, Name for this widget which appear on widget bar.
 */
class CustomTagWidget extends WP_Widget {
		
	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function CustomTagWidget() {
		$widget_ops = array( 'classname' => 'simplecatch_tag_widget', 'description' => __( 'Displays Custom Tag Cloud designed for Simple Catch Theme.', 'simplecatch' ) );
		$this->WP_Widget( 'simplecatch_tag_widget', __( '1. Simple Catch: Tag Clouds', 'simplecatch' ), $widget_ops );
		$this->alt_option_name = 'simplecatch_tag_widget';
	}		
		
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : 'Tags';
			
		echo $before_widget;
	
		if ( $title ):
			echo $before_title . $title . $after_title;
		endif;
		
		if ( function_exists( 'simplecatch_custom_tag_cloud' ) ):
			simplecatch_custom_tag_cloud();
		endif;
		
		echo $after_widget;
	}
		
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
		
	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Tags' ) );
		$title = esc_attr( $instance[ 'title' ] );
		
		/**
		 * Constructs title attributes  for use in form() field
		 * @return string Name attribute for $field_name
		 */
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">' . 'Title:' . '</label><input class="widefat" id="' . 
		$this->get_field_id( 'title' ) . '" name="' .       $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" /> </p>';
				
	}
}// end CustomTagWidget class


/** 
 * Extends class wp_widget
 * 
 * Creates a function simplecatch_social_widget
 * $widget_ops option array passed to wp_register_sidebar_widget().
 * $control_ops option array passed to wp_register_widget_control().
 * $name, Name for this widget which appear on widget bar.
 */
class simplecatch_social_widget extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function simplecatch_social_widget() {
		$widget_ops = array( 'classname' => 'simplecatch_social_widget', 'description' => __( 'Displays Social Icons added from Theme Options Panel.', 'simplecatch' ) );
		$this->WP_Widget( 'simplecatch_social_widget', __( '2. Simple Catch: Social Icons', 'simplecatch' ), $widget_ops );
		$this->alt_option_name = 'simplecatch_social_widget';
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
	
		echo $before_widget;
		
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 
		
		if ( function_exists( 'simplecatch_headersocialnetworks' ) ):
			simplecatch_headersocialnetworks();
		endif;
		
		echo $after_widget;
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
		
	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'' ) );
		$title = esc_attr( $instance[ 'title' ] );
		
		/**
		 * Constructs title attributes  for use in form() field
		 * @return string Name attribute for $field_name
		 */
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">' . 'Title:' . '</label><input class="widefat" id="' . 
		$this->get_field_id( 'title' ) . '" name="' .       $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" /> </p>';
				
	}
}// end simplecatch_social_widget class


/**
 * Makes a custom Widget for Displaying Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 2.6.4
 */
class simplecatch_adspace_widget extends WP_Widget {
	
	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function simplecatch_adspace_widget() {
		$widget_ops = array( 'classname' => 'widget_simplecatch_adspace_widget', 'description' => __( 'Use this widget to add any type of Advertisement as a widget.', 'simplecatch' ) );
		$this->WP_Widget( 'widget_simplecatch_adspace_widget', __( '3. Simple Catch: Advertisement', 'simplecatch' ), $widget_ops );
		$this->alt_option_name = 'widget_simplecatch_adspace_widget';
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'adcode' => '', 'image' => '', 'href' => '', 'target' => '0', 'alt' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$adcode = esc_textarea( $instance[ 'adcode' ] );
		$image = esc_url( $instance[ 'image' ] );
		$href = esc_url( $instance[ 'href' ] );
		$target = $instance['target'] ? 'checked="checked"' : '';
		$alt = esc_attr( $instance[ 'alt' ] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','simplecatch'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Advertisement Code:','simplecatch'); ?></label>
                <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo $adcode; ?></textarea>
            </p>
            <p><strong>or</strong></p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','simplecatch'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','simplecatch'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'simplecatch' ); ?></label>
		</p>        
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','simplecatch'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['adcode'] = wp_kses_stripslashes($new_instance['adcode']);
		$instance['image'] = esc_url_raw($new_instance['image']);
		$instance['href'] = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance['alt'] = sanitize_text_field($new_instance['alt']);
		
		return $instance;
	}	
	
	/**
	 * Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance['title'] ) ? $instance[ 'title' ] : '';
		$adcode = !empty( $instance['adcode'] ) ? $instance[ 'adcode' ] : '';
		$image = !empty( $instance['image'] ) ? $instance[ 'image' ] : '';
		$href = !empty( $instance['href'] ) ? $instance[ 'href' ] : '';
		$target = !empty( $instance[ 'target' ] ) ? 'true' : 'false';
		$alt = !empty( $instance['alt'] ) ? $instance[ 'alt' ] : '';

		if ( $target == "true" ) :
			$base = '_blank'; 	
		else:
			$base = '_self'; 	
		endif;	
			
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} 

		if ( $adcode != '' ) {
			echo $adcode;
		}
		elseif ( $image != '' ) {
        	echo '<a href="'.$href.'" target="'.$base.'"><img src="'. $image.'" alt="'.$alt.'" /></a>';
		}
		else {
			_e( 'Add Advertisement Code or Image URL', 'simplecatch' );
		}
		echo $after_widget;
	}

} 