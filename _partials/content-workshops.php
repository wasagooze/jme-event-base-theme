<?php 

  /* Template for displaying single-page workshops */

  $presenters = get_the_terms(get_the_ID(), 'presenter');
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if (!is_single() ): ?>
    <header class="entry-header">
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?></a>
      </h1>
        <?php if ($presenters[0] != null): ?>
          <h2 class="byline">
          Presented by: <?php echo get_presenter_list(); ?>
        </h2>
      <?php endif; ?>
    </header><!-- .entry-header -->
  <?php endif; ?>

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
