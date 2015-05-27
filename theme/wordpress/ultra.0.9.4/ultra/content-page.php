<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ultra
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && siteorigin_setting('pages_featured_image') ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>			
	<?php endif; ?>	

	<div class="entry-content">
		<?php the_content(); ?>
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
