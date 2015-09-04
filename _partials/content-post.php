<?php
/**
 * Template for displaying content on posts
 *
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if (!is_single() ): ?>
    <?php get_template_part('_partials/pageheader', 'post'); ?>
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

      <?php if ( comments_open() ) : ?>
        <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'jme_event_base_theme' ), __( '<b>%</b> Replies', 'jme_event_base_theme' ) ); ?></span>
      <?php endif; // End if comments_open() ?>

    </div><!-- .entry-content -->

    <footer class="entry-meta">
      
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->

