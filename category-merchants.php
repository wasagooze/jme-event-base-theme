<?php
/**
 * Template for displaying Attraction Archive pages
 */

$args = array( 'post_type' => 'attraction', 'category_name' => 'merchants');
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
          <li class="attraction-thumbnail" style="background-image:url('<?php echo $large_image_url[0]; ?>');">
          	<?php the_title(); ?>          	
          </li>
          </a>
        <?php endwhile; ?>
        </li>

      <?php else : ?>

        <article id="post-0" class="post no-results not-found">
          <header class="entry-header">
            <h1 class="entry-title">Nothing Found</h1>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
          </div><!-- .entry-content -->
        </article><!-- #post-0 -->

      <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
