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

      <div class="entry-content">

        <section class="attraction">
  
          <?php get_template_part( 'content-social', get_post_format() ); ?>

          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

          <?php if (is_single() && $video !== ''): ?>
            <iframe src='<?php echo $video; ?>' frameborder='0' allowfullscreen='allowfullscreen'></iframe>
          <?php endif; ?>

        </section>


    </div><!-- .entry-content -->

    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
