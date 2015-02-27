<?php
/**
 * Template for displaying Attraction Archive pages
 */

$category_name = get_category(get_query_var('cat'))->slug;

$args = array( 'post_type' => 'any', 'category_name' => $category_name);

$query = new WP_Query( $args );

get_header(); ?>

    <section id="primary">
      <div id="content" role="main">

      <?php if ( $query->have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><?php echo single_cat_title( '', false ); ?></h1>

          <?php
            $category_description = category_description();
            if ( ! empty( $category_description ) ) {
              echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
            }
          ?>
        </header>

        <ul class="category-listing">
        <?php /* Start the Loop */ ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
       	 	<a href="<?php the_permalink(); ?>">
       	 	<?php 
						if ( has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						}
					?>	
          <li class="attraction-thumbnail">
          	<div class="attraction-title"><?php the_title(); ?></div>
          </li>
          </a>
        <?php endwhile; ?>
        </li>

      <?php else : ?>

        <?php include('404-content.php'); ?>

      <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
