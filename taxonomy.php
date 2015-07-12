<?php
/**
 * Taxonomy template
 */
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 

get_header(); 

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>
        
        <?php get_template_part('pageheader', $post_type); ?>   
        
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>       	 	
            <?php get_template_part( 'content', get_post_type() ); ?>
          <?php endwhile; ?>

        <?php else : ?>

          <?php include('404-content.php'); ?>

        <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
