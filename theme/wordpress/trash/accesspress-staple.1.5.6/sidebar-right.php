<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AccessPress Staple
 */

if(is_front_page()){
	$post_id = get_option('page_on_front');
}else{
	$post_id = $post->ID;
}
$post_class = get_post_meta( $post_id, 'accesspress_staple_sidebar_layout', true );
if($post_class=='right-sidebar' || $post_class=='both-sidebar' || !empty($post_class)){
    ?>
    <div id="secondary-right" class="widget-area right-sidebar sidebar">
        <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}    
?>