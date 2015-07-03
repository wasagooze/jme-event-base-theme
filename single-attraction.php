<?php
/**
 * Template for displaying all single posts
 */

get_header(); ?>

    <section id="primary">
      <div id="content" role="main">


<?php while ( have_posts() ) : the_post(); ?>

<header class="page-header">
	<?php $category = get_top_category(get_the_category(get_the_ID())); 
	if ($category !== null): ?>
  	<h1 class="page-title"><?php echo $category->cat_name ?></h1>

  <?php $cat_id = $category->cat_ID; ?>

  <div class="attraction-filters">
  <?php echo jme_get_attraction_index($cat_id); ?>
  </div>
<?php endif; ?>
 
</header>

          <?php get_template_part( 'content-attraction', get_post_format() ); ?>

        <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>