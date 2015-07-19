<?php
/**
 * Main template file
 *
 */

get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
		<?php if (have_posts()): ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part( '_partials/content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else : ?>	
			<?php get_template_part('_partials/404-content'); ?>

		<?php endif; ?>
		</div><!-- #content -->
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>