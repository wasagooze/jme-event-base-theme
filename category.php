<?php
/**
 * Template for displaying categories
 *
 */

get_header(); ?>

<section id="primary">
  <div id="content" role="main">

  <?php if (have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( '_partials/content', get_post_type() ); ?>

    <?php endwhile; ?>

  	<?php else : ?>
   
		<?php get_template_part('_partials/404-content'); ?>

  	<?php endif; ?>
	</div>
</section>

<?php
	get_sidebar();
	get_footer(); 
?>