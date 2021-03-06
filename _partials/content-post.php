<?php
/**
 * Template for displaying content on posts
 *
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if (!is_single() ): ?>
    <?php get_template_part('_partials/pageheader', get_post_type()); ?>
  <?php endif; ?>

    <div class="entry-content">

      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

      <?php if (is_single() && in_category('blog')): ?>
        <section class="bio">
          <h1><?php the_author_posts_link(); ?></h1>
          <p>
            <?php echo get_the_author_meta('description'); ?>
          </p>
        </section>
      <?php endif; ?>

    </div><!-- .entry-content -->

    <footer class="entry-meta">
      
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->

