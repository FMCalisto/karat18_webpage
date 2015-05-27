<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ultra
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-main">

			<div class="container">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<div class="clear"></div>
			</div><!-- .container -->
		
		</div><!-- .main-footer -->

		<?php get_template_part( 'parts/bottom-bar' ); ?>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>