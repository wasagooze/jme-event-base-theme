<?php 

  /* Template for displaying single-page attractions */
  
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part('_partials/pageheader'); ?>

      <div class="entry-content">

        <section class="attraction">

          <?php get_template_part( '_partials/social'); ?>

          <?php //get_template_part('content', 'schedule'); ?>

          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

          <?php get_template_part('_partials/tag-list'); ?>

          <?php get_template_part('_partials/presenter-bio'); ?>

        </section>

    </div><!-- .entry-content -->

    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
