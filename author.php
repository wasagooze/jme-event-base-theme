<?php
/**
 * Archive template for custom post types
 */

get_header(); 

?>

    <section id="primary">
      <div id="content" role="main">

      <header class="page-header">
      <h1 class="page-title author">
          Author: <?php echo get_the_author(); ?>
      </h1>

      <?php get_template_part('_partials/filters'); ?>

      <div class="pagination-nav">
        <?php echo paginate_links(array(
        'prev_next'          => False,
        )); ?>
      </div>  

      </header>
      <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( '_partials/content', get_post_type()); ?>
          <?php endwhile; ?>

        <?php get_template_part('_partials/pagefooter'); ?>

      <?php else : ?>
      
        <?php get_template_part('_partials/404-content'); ?>

      <?php endif; ?>

      </div><!-- #content -->

    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
