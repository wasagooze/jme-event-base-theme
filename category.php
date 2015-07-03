<?php
/**
 * Category template
 */

get_header(); ?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><?php echo single_cat_title( '', false ); ?></h1>

          <p class="page-description">
            <?php
              $category_description = category_description();
              if ( ! empty( $category_description ) ) {
                echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
              }
            ?>
          </p>
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
