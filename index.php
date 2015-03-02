<?php
/**
 * Main template file
 *
 */

$args = array( 'post_type' => 'post', 'category_name' => 'announcements');

$query = new WP_Query( $args );

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

			<?php if ( $query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php include('404-content.php'); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>