<?php 
/**
 * The Related Posts Function for Optimizer
 *
 * Displays The Post Pagination .
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<?php if($optimizer['navigation_type'] !== 'no_nav') { ?>

        <?php if('numbered' == $optimizer['navigation_type'] || 'numbered_ajax' == $optimizer['navigation_type'] ) { ?>
            <div class="ast_pagenav">
                <?php
                    global $wp_query;
                    $big = 999999999; // need an unlikely integer
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages,
                            'show_all'     => true,
                            'prev_next'    => false,
							'add_args' => false
                        
                        ) );
                ?>
            </div>
        <?php } ?>

<?php } ?>