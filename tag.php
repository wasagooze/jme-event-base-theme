<?php
/**
 * Tag template
 */

get_header(); 

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <?php get_template_part('_partials/tagheader'); ?>    

          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( '_partials/content', get_post_type(get_the_ID())); ?>
          <?php endwhile; ?>

        <footer class="content-footer">
          <div class="pagination-nav">
            <?php 
            echo paginate_links(array(
              'prev_next' => False,
            )); 
            ?>

          </div>
        </footer>

      <?php else : ?>
      
        <?php get_template_part('_partials/404-content'); ?>

      <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
