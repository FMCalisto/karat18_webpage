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
if($post_class=='left-sidebar' || $post_class=='both-sidebar'){
    ?>
    <div id="secondary-left" class="widget-area left-sidebar sidebar">
        <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'left-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}
?>
