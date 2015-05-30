<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Staple
 */
 $read_more_archive      =   of_get_option('read_more_archive');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php accesspress_staple_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="bttn"><?php echo __('Read More', 'accesspress-staple'); ?></a>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php accesspress_staple_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->