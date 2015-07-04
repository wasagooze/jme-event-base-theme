<?php
/**
 * Template for displaying all single posts
 */

get_header(); 

$post_type = get_post_type();

?>

<section id="primary">
	<div id="content" role="main">			

	<?php get_template_part('pageheader', $post_type); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', $post_type); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>