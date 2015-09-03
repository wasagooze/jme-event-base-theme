<?php
/**
 * Template for displaying content on posts
 *
 */
?>

<?php if (get_post_type(get_the_ID()) == 'attraction') : ?>
        <?php get_template_part( 'content-attraction', get_post_format() ); ?>
<?php else: ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">

      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'jme-event-base-theme' ) . '</span>', 'after' => '</div>' ) ); ?>

    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php if ( comments_open() ) : ?>
        <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'jme_event_base_theme' ), __( '<b>%</b> Replies', 'jme_event_base_theme' ) ); ?></span>
      <?php endif; // End if comments_open() ?>
      
      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->

