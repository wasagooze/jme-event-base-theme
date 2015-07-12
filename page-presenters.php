<?php
/**
 * Presenter Page
 */

get_header(); 

$terms = get_terms('presenter'); 

?>

    <section id="primary">
      <div id="content" role="main">

      <?php if (!empty($terms)): ?>
        

      <article <?php post_class(); ?>>
      <header class="entry-header">
          <h1 class="entry-title">Presenter Bios</a></h1>                            
      </header>

      <div class="entry-content">
      <dl>
      <?php foreach ($terms as $term): ?>        
        
        <dt><a href="<?php echo get_term_link($term, 'presenter'); ?>"><?php echo $term->name; ?></a></dt>
        <dd><?php echo $term->description; ?></dd>
      <?php endforeach; ?>
      </dl>
      </div>

      </article>

        <?php else : ?>

          <?php include('404-content.php'); ?>

        <?php endif; ?>

      </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
