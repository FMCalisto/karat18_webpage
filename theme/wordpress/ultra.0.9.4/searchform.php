<?php
/**
 * The template for displaying search forms.
 *
 * @package ultra
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'ultra', 'label', 'ultra' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'ultra' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'ultra' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ultra' ) ?>" />
</form>