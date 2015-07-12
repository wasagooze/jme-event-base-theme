<?php
/**
 * Shows archive page still uses post thumbnails
 */

get_header(); 

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if (have_posts() ) : ?>
        
        <?php get_template_part('pageheader', $post_type); ?>    

        <ul class="category-listing">
        <?php /* Start the Loop */ ?>
        <?php while (have_posts() ) : the_post(); ?>
       	 	<a href="<?php the_permalink(); ?>">
            <?php 
            $large_image_url = '';
            if ( has_post_thumbnail() ) {
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' )[0];
            }
          ?>  
          <li class="attraction-thumbnail" style="background-image:url('<?php echo $large_image_url; ?>');">
            <div class="attraction-title"><?php the_title(); ?></div>
            <div class="attraction-subhead"><?php echo get_post_meta(get_the_ID(), 'attraction_subhead', true ); ?></div>
          </li>
          </a>
        <?php endwhile; ?>
        </li>

      <?php else : ?>

        <?php include('404-content.php'); ?>

      <?php endif; ?>
      </ul>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
