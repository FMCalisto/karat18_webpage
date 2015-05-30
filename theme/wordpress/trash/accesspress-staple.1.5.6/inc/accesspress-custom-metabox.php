<?php
add_action('add_meta_boxes', 'accesspress_staple_add_sidebar_layout_box');
function accesspress_staple_add_sidebar_layout_box()
{
    
    add_meta_box(
                 'accesspress_staple_sidebar_layout', // $id
                 'Sidebar Layout', // $title
                 'accesspress_staple_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
}
$accesspress_staple_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'accesspress-staple' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'accesspress-staple' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'both-sidebar' => array(
                        'value'     => 'both-sidebar',
                        'label'     => __( 'Both Sidebar', 'accesspress-staple' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'accesspress-staple' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

    );
    

function accesspress_staple_sidebar_layout_callback()
{ 
global $post , $accesspress_staple_sidebar_layout;
wp_nonce_field( basename( __FILE__ ), 'accesspress_staple_sidebar_layout_nonce' ); 
?>

<table class="form-table">
<tr>
<td colspan="4"><em class="f13">Choose Sidebar Template</em></td>
</tr>

<tr>
<td>
<?php  
   foreach ($accesspress_staple_sidebar_layout as $field) {  
                $accesspress_staple_sidebar_metalayout = get_post_meta( $post->ID, 'accesspress_staple_sidebar_layout', true ); ?>

                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                <input type="radio" name="accesspress_staple_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $accesspress_staple_sidebar_metalayout ); if(empty($accesspress_staple_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                </label>
                </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
</td>
</tr>
<tr>
    <td><em class="f13">You can set up the sidebar content <a href="<?php echo admin_url('/themes.php?page=theme_options'); ?>">here</a></em></td>
</tr>
</table>

<?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function accesspress_staple_save_sidebar_layout( $post_id ) { 
    global $accesspress_staple_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'accesspress_staple_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'accesspress_staple_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
    

    foreach ($accesspress_staple_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'accesspress_staple_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['accesspress_staple_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'accesspress_staple_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'accesspress_staple_sidebar_layout', $old);  
        } 
     } // end foreach   
     
}
add_action('save_post', 'accesspress_staple_save_sidebar_layout');