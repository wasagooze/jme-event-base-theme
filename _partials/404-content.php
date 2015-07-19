<article id="post-0" class="post error404 not-found">
  <header class="entry-header">
    <h1 class="entry-title">Page not found!</h1>  
  </header>

  <div class="entry-content">
    <?php if ( is_active_sidebar( '404-template' ) ) : ?>
      <?php dynamic_sidebar( '404-template'); ?>
    <?php else: ?>
      <p>It appears that the page you seek may have been devoured by some fearsome beast!</p>
      <p>Possibly multiple fearsome beasts!</p>
      <p>We dearly apologize! Prithee, would you do us the kindness of <a href="/">clicking over to a different part of our website</a>, instead?</p>
    <?php endif; ?>
    
  </div><!-- .entry-content -->
</article><!-- #post-0 -->