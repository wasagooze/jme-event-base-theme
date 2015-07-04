<?php
/**
 * Category template
 */

get_header(); 

$post_type = '';

if (is_post_type_archive()) {

  $post_type = post_type_archive_title('',false);

  query_posts(array(
    'post_type' => $post_type,
    'order' => 'ASC',
    'orderby' => 'title',
    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )
    )
  );

}

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>
        <?php get_template_part('pageheader', $post_type); ?>    

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( 'content', $post_type); ?>
          <?php endwhile; ?>

          <?php /* Pagination */ ?>

        <footer class="content-footer">
        <div class="pagination-nav">
          <?php 
          echo paginate_links(array(
            'prev_next' => False,
          )); 
          ?>

        </div>
        </footer>

      <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
