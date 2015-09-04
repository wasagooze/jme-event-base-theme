<?php
/**
 * Template Name: Sidebar Template
 *
 * Description: A Page Template that adds a sidebar to pages.
 *
 */

get_header(); ?>

<section id="primary">
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part('_partials/pageheader', 'page'); ?>

			<?php get_template_part( '_partials/content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>