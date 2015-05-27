<?php
/**
 * The template for displaying all single posts.
 *
 * @package ultra
 */

get_header(); ?>
		
	<header class="entry-header">
		<div class="container">
			<h1 class="entry-title"><?php echo get_the_title(); ?></h1><?php ultra_breadcrumb(); ?>
		</div><!-- .container -->
	</header><!-- .entry-header -->

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="entry-meta">
		<div class="container">
			<?php ultra_posted_on(); ?>
		</div><!-- .container -->	
	</div><!-- .entry-meta -->		

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php get_template_part( 'content', 'single' ); ?>

	 			<?php if ( siteorigin_setting( 'navigation_post_nav' ) ) the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>
