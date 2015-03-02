<?php 

  /* Template for displaying single-page attractions */

  if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
  }

  $id = get_the_ID();
  $video = get_post_meta( $id, 'attraction_video', true);
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->
      <?php else : ?>
      <div class="entry-content">

        <section class="attraction">
  
          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

          <?php if (is_single() && $video !== ''): ?>
            <iframe src='<?php echo $video; ?>' frameborder='0' allowfullscreen='allowfullscreen'></iframe>
          <?php endif; ?>
         
          <?php get_template_part( 'content-social', get_post_format() ); ?>

        </section>


    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
      
      <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="200px" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
      
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
