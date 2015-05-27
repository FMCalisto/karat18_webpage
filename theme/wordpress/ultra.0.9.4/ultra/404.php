<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ultra
 */

get_header(); ?>

	<header class="page-header">
		<div class="container">
			<h1 class="page-title"><?php echo wp_kses_post( siteorigin_setting('text_404_heading') ); ?></h1><?php ultra_breadcrumb(); ?>
		</div><!-- .container -->
	</header><!-- .page-header -->		

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<div class="page-content">
						<p><?php echo wp_kses_post( siteorigin_setting('text_404_copy') ); ?></p>

						<?php get_search_form(); ?>

						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

						<?php if ( ultra_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php _e( 'Most Used Categories', 'ultra' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->
						<?php endif; ?>

						<?php
							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'ultra' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>

						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->

	<?php get_footer(); ?>
