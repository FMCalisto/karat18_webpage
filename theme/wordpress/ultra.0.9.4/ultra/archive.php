<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultra
 */

get_header(); ?>

	<header class="page-header">
		<div class="container">
			<div class="title-wrapper">
				<?php 
					the_archive_title( '<h1 class="page-title">', '</h1>' ); 
					the_archive_description( '<div class="taxonomy-description">', '</div>' ); 
				?>
			</div><!-- .title-wrapper --><?php ultra_breadcrumb(); ?>
		</div><!-- .container -->
	</header><!-- .page-header -->	

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php get_template_part( 'loops/loop-blog' ); ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .container -->

<?php get_footer(); ?>