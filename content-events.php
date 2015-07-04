<?php 

  /* Template for displaying single-page attractions */

  $presenter = get_the_terms(get_the_ID(), 'presenter')[0];
  $location = get_the_terms(get_the_ID(), 'location')[0];
  $day = get_the_terms(get_the_ID(), 'day')[0];
  $timeslot = get_the_terms(get_the_ID(), 'timeslot')[0];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->

      <div class="entry-content">

        <section class="attraction">

          <?php if ($location != null): ?>
            <p class="where"><b>Where</b>: <a href="<?php esc_url(get_term_link($location)); ?>"><?php echo $location->name; ?></a></p>
          <?php endif; ?>

          <?php if ($day != null): ?>
            <p class="when"><b>When</b>: <?php echo $day->name; ?><?php if ($timeslot != null) { echo " at " . $timeslot->name; } ?></p>
          <?php endif; ?>

          <?php get_template_part( 'content-social', get_post_format() ); ?>

          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

          <?php if ($presenter != null): ?>
            Presented by: <a href="<?php echo get_term_link($presenter, 'presenter'); ?>"><?php echo $presenter->name; ?></a>
          <?php endif; ?>

        </section>

    </div><!-- .entry-content -->

    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
