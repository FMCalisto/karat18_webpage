<?php get_header(); 
$wl_theme_options = weblizar_get_options();
if ($wl_theme_options['_frontpage']=="1" && is_front_page())
{	get_template_part('home','slideshow'); 
	get_template_part('home','services'); 
	$wl_theme_options = weblizar_get_options();
	if($wl_theme_options['portfolio_home'] == "1") {
	get_template_part('home','portfolio'); 
	}
	if($wl_theme_options['show_blog'] == "1") {
	get_template_part('home','blog');
	}
	get_footer();
}
 else 
{	
	if(get_page_template_slug( get_the_ID() )) {	
		$temp_name= get_page_template_slug( get_the_ID() );
		$temp_name =str_replace('.php', '', $temp_name);
		get_template_part( $temp_name );
	} else	{	
		get_template_part( 'page' );
	} 
}	?>