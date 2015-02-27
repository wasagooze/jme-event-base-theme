<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		<div id="supplementary" class="three">

		<div id="first" class="widget-area" role="complementary">
			<?php 
			if (is_active_sidebar('footer-sidebar-1')){
				dynamic_sidebar('footer-sidebar-1');
			}
			?>
		</div>

			<div id="second" class="widget-area" role="complementary">
			<?php 
			if (is_active_sidebar('footer-sidebar-2')){
				dynamic_sidebar('footer-sidebar-2');
			}
			?>
		</div>		
			
		<div id="third" class="widget-area" role="complementary">
			<?php 
			if (is_active_sidebar('footer-sidebar-3')){
				dynamic_sidebar('footer-sidebar-3');
			}
			?>
		</div><!-- #third .widget-area -->
	</div>

	<div class="copyright">
		<?php if (is_active_sidebar('footer-copyright')) { dynamic_sidebar( 'footer-copyright'); } ?>
		
		<?php get_template_part( 'footer-social', get_post_format() ); ?>
 	</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>