<?php
/**
 * @package ultra
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_single() && has_post_thumbnail() && siteorigin_setting('blog_archive_featured_image') ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>	
		</div>	
	<?php elseif ( is_single() && has_post_thumbnail() && siteorigin_setting('blog_archive_featured_image') ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>				
	<?php endif; ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ultra_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( siteorigin_setting( 'blog_archive_content' ) == 'excerpt' ) the_excerpt(); else the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ultra' ) . '</span>',
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ultra_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->