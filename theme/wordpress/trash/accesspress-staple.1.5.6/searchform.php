<?php
/**
  *
 * @package Accesspress Staple
 */
$ak_search_placeholder  =   of_get_option('search_placeholder');
$ak_search_button_text  =   of_get_option('search_button');
 ?>
<div class="search-icon">
    <i class="fa fa-search"></i>
    <div class="ak-search" style="display: none;">
    <div class="search-close"><i class="fa fa-close"></i></div>
     <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
        <label>
            <span class="screen-reader-text">Search for:</span>
            <input type="search" title="Search for:" name="s" value="" placeholder="<?php echo esc_attr($ak_search_placeholder); ?>" class="search-field">
        </label>
        <input type="submit" value="<?php echo esc_attr($ak_search_button_text); ?>" class="search-submit">
     </form> 
    </div>
</div> 