<?php
/**
 * Main template file
 *
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			<?php if (have_posts()): ?>
			<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<?php include('404-content.php'); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>