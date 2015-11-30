<?php
/**
 * Template for displaying categories
 *
 */

get_header(); ?>

<section id="primary">
  <div id="content" role="main">
<?php global $cat; ?>
<h1><strong><?php echo get_cat_name( $cat );?></strong></h1>
<?php echo ddpl_list( $cat ); ?>
<?php echo category_description( $cat ); ?>
     <?php if (have_posts() ) : ?>
        
        
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
            <div class="attraction-title">
              <?php the_title(); ?>
            </div>
            <div class="attraction-subhead">
              <?php echo get_post_meta(get_the_ID(), 'attraction_subhead', true ); ?>
            </div>
          </li>
          </a>
        <?php endwhile; ?>
        </li>

      <?php else : ?>      

        <?php get_template_part('_partials/404-content'); ?>

      <?php endif; ?>
      </ul>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php
	get_sidebar();
	get_footer(); 
?>
