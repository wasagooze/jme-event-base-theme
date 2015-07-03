<?php
/**
 * Category template
 */

get_header(); ?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><?php single_cat_title(); ?></h1>

          <?php $cat_id = get_cat_ID(single_cat_title('', false)); ?>

          <div class="attraction-filters">
          <?php echo jme_get_attraction_index($cat_id); ?>
          </div>

          <div class="pagination-nav">
            <?php echo paginate_links(array(
              'prev_next'          => False,
            )); ?>
          </div>  
        </header>

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( 'content', get_post_format() ); ?>
          <?php endwhile; ?>

          <?php /* Pagination */ ?>

        <div class="pagination-nav">
          <?php echo paginate_links(array(
            'prev_next'          => False,
          )); ?>
        </div>

        <?php else : ?>

          <?php include('404-content.php'); ?>

        <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
