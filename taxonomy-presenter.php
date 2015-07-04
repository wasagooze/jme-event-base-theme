<?php
/**
 * Category template
 */
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 

get_header(); ?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><a href="/workshops">Workshops</a>: by <?php echo $term->name; ?> </h1>                            

         <?php get_template_part('workshop-filters',  get_post_format()); ?>

          <div class="pagination-nav">
            <?php echo paginate_links(array(
              'prev_next'          => False,
            )); ?>
          </div>  
        </header>
        
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( 'content-workshop', get_post_format() ); ?>
          <?php endwhile; ?>

          <?php /* Pagination */ ?>


  <article <?php post_class(); ?>>
    <header class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">About <?php echo $term->name; ?></a></h1>
    </header><!-- .entry-header -->

      <div class="entry-content">
        <?php echo term_description(); ?>
      </div><!-- .entry-content -->
  </article><!-- #post-<?php the_ID(); ?> -->

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
