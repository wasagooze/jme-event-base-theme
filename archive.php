<?php
/**
 * Category template
 */

get_header(); 

//$post_type = '';

// if (is_post_type_archive()) {

//   $post_type = post_type_archive_title('',false);

//   query_posts(array(
//     'post_type' => $post_type,
//     'order' => 'ASC',
//     'orderby' => 'title',
//     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )
//     )
//   );
// }

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>
        <?php get_template_part('_partials/pageheader', get_post_type()); ?>    

          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( '_partials/content', get_post_type()); ?>
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
