<?php
/**
 * Template for displaying content
 *
 */
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
      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'jme-event-base-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php if ( 'post' == get_post_type() ) : ?>
      <?php endif; ?>
      <?php $show_sep = false; ?>
      <?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
      <?php
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( __( ', ', 'jme-event-base-theme' ) );
        if ( $categories_list ):
      ?>
      <span class="cat-links">
        <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'jme-event-base-theme' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
        $show_sep = true; ?>
      </span>
      <?php endif; // End if categories ?>
      <?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
      <?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
      <?php
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( ', ', 'jme-event-base-theme' ) );
        if ( $tags_list ):
        if ( $show_sep ) : ?>
      <span class="sep"> | </span>
        <?php endif; // End if $show_sep ?>
      <span class="tag-links">
        <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'jme-event-base-theme' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
        $show_sep = true; ?>
      </span>
      <?php endif; // End if $tags_list ?>
      <?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

      <?php if ( comments_open() ) : ?>
      <?php if ( $show_sep ) : ?>
      <span class="sep"> | </span>
      <?php endif; // End if $show_sep ?>
      <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'jme-event-base-theme' ) . '</span>', __( '<b>1</b> Reply', 'jme-event-base-theme' ), __( '<b>%</b> Replies', 'jme-event-base-theme' ) ); ?></span>
      <?php endif; // End if comments_open() ?>

      <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
