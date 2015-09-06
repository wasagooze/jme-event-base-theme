<?php
/**
 * Template for displaying content on posts
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if (!is_singular() ): ?>
    <?php get_template_part('_partials/pageheader', get_post_type()); ?>
  <?php endif; ?>

  <div class="entry-content">

    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'jme-event-base-theme' ) . '</span>', 'after' => '</div>' ) ); ?>

  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

