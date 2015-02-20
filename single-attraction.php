<?php
/**
 * Template for displaying all single posts
 */

get_header(); 

function show_video($video) {
  $output = '';
  if ($video) {
      $output .= "<iframe src='{$video}' frameborder='0' allowfullscreen='allowfullscreen'></iframe>";
  }
  return $output;
}

?>

		<section id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
            <?php 
              // get relevant metadata

              $id = get_the_ID();
              $website = get_post_meta( $id, 'attraction_website', true ); 
              $facebook = get_post_meta( $id, 'attraction_facebook', true ); 
              $twitter = get_post_meta( $id, 'attraction_twitter', true);
              $video = get_post_meta( $id, 'attraction_video', true);
            ?>
					  <article id="post-<?php echo $id; ?>" <?php post_class(); ?>>

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
              
              <a href="<?php echo $website; ?>"><?php the_post_thumbnail(); ?></a>

              <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jme-event-base-theme' ) ); ?>

              <?php echo show_video($video); ?>

              <ul class="social">
                <?php if ( $website != '') : ?>
                  <li><a href="<?php echo $website; ?>" class="web" rel="me" target="_blank">Offical Website</a></li>
                <?php endif; ?>
                <?php if ( $twitter != '') : ?>
                  <li><a href="http://twitter.com/<?php echo $twitter; ?>" class="tw" rel="me" target="_blank">Twitter</a></li>
                <?php endif; ?>
                <?php if ( $facebook != '') : ?>
                  <li><a href="<?php echo $facebook; ?>" class="fb" rel="me" target="_blank">Facebook</a></li>
                <?php endif; ?>
             </ul>
             
              </section>
              </div><!-- .entry-content -->
            <?php endif; ?>

            <footer class="entry-meta">
              <?php edit_post_link( __( 'Edit', 'jme-event-base-theme' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-meta -->

          </article>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>