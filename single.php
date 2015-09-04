<?php
/**
 * Template for displaying all single posts
 */

get_header(); 

$post_type = get_post_type();

?>

<section id="primary">
	<div id="content" role="main">			

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part('_partials/pageheader', $post_type); ?>
			
			<?php get_template_part( '_partials/content', $post_type); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>
		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>