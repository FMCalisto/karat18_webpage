<?php $wl_theme_options = weblizar_get_options();
	/*
	* Home slider settings save
	*/
	if(isset($_POST['weblizar_settings_save_general']))
	{	
		if($_POST['weblizar_settings_save_general'] == 1) 
		{
				foreach($_POST as  $key => $value)
				{
					$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
				}				
				
				if($_POST['text_title']){
				echo $wl_theme_options['text_title']=sanitize_text_field($_POST['text_title']); } 
				else
				{ echo $wl_theme_options['text_title']=""; }
				if($_POST['_frontpage']){
				echo $wl_theme_options['_frontpage']=sanitize_text_field($_POST['_frontpage']); } 
				else
				{ echo $wl_theme_options['_frontpage']=""; }		
					
				update_option('enigma_options', stripslashes_deep($wl_theme_options));
		}	
		if($_POST['weblizar_settings_save_general'] == 2) 
		{
			wl_reset_general_setting();
		}
	}
	/*
	* Home slider settings save
	*/
	if(isset($_POST['weblizar_settings_save_home-image']))
	{	
		if($_POST['weblizar_settings_save_home-image'] == 1) {
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			
			update_option('enigma_options', stripslashes_deep( $wl_theme_options ));
			
		}	
		if($_POST['weblizar_settings_save_home-image'] == 2) 
		{	
			wl_reset_slide_image_setting();
		}
	}
	/*
	* Home Blog and site intro settings save
	*/
	
	if(isset($_POST['weblizar_settings_save_portfolio-settings']))
	{	
		if($_POST['weblizar_settings_save_portfolio-settings'] == 1) 
		{
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			if($_POST['portfolio_home']){
				echo $wl_theme_options['portfolio_home']=sanitize_text_field($_POST['portfolio_home']); } 
				else
				{ echo $wl_theme_options['portfolio_home']=""; } 
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
			
		}	
		if($_POST['weblizar_settings_save_portfolio-settings'] == 2) 
		{
			wl_reset_portfolio_setting();
		}
	}
	/*
	* Home service setting 
	*/
	if(isset($_POST['weblizar_settings_save_home-service']))
	{	
		if($_POST['weblizar_settings_save_home-service'] == 1) 
		{	
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=$_POST[$key];	
			}
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
			
		}	
		if($_POST['weblizar_settings_save_home-service'] == 2) 
		{	
			wl_reset_service_setting();
		}
	}
	/*
	* social media link Settings
	*/
	if(isset($_POST['weblizar_settings_save_social']))
	{	
		if($_POST['weblizar_settings_save_social'] == 1) 
		{
			
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			
			// Social Icons footer section yes or on
			if(isset($_POST['footer_section_social_media_enbled']))
			{  $wl_theme_options['footer_section_social_media_enbled'] = $_POST['footer_section_social_media_enbled'];
			} else {  	echo $wl_theme_options['footer_section_social_media_enbled'] = "";	} 
			
			// Social Icons footer section yes or on
			if(isset($_POST['header_social_media_in_enabled']))
			{  $wl_theme_options['header_social_media_in_enabled'] = $_POST['header_social_media_in_enabled'];
			} else {  	echo $wl_theme_options['header_social_media_in_enabled'] = "";	}
			
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
			
		}	
		if($_POST['weblizar_settings_save_social'] == 2) 
		{
			wl_reset_social_setting();
		}
	}
	/*
	* footer customization Settings
	*/
	if(isset($_POST['weblizar_settings_save_footer']))
	{	
		if($_POST['weblizar_settings_save_footer'] == 1) 
		{
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
		}	
		if($_POST['weblizar_settings_save_footer'] == 2) 
		{
			wl_reset_footer_customizations_setting();
		}
	}
	/*
	* footer Callout Settings
	*/
	if(isset($_POST['weblizar_settings_save_footercall']))
	{	
		if($_POST['weblizar_settings_save_footercall'] == 1) 
		{
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
		}	
		if($_POST['weblizar_settings_save_footercall'] == 2) 
		{
			wl_reset_footer_footercall_setting();
		}
	}
	
	/*
	* HOme-Blog Settings
	*/
	if(isset($_POST['weblizar_settings_save_homeblog']))
	{	
		if($_POST['weblizar_settings_save_homeblog'] == 1) 
		{
			foreach($_POST as  $key => $value)
			{
				$wl_theme_options[$key]=sanitize_text_field($_POST[$key]);	
			}
			if($_POST['show_blog']){
				echo $wl_theme_options['show_blog']=sanitize_text_field($_POST['show_blog']); } 
				else
				{ echo $wl_theme_options['show_blog']=""; }
			update_option('enigma_options', stripslashes_deep($wl_theme_options));
		}	
		if($_POST['weblizar_settings_save_homeblog'] == 2) 
		{
			wl_reset_footer_homeblog_setting();
		}
	}
?>