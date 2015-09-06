<footer class="content-footer">
  <div class="pagination-nav">
    <?php 
    echo paginate_links(array(
      'prev_next' => False,
    )); 
    ?>

  </div>

  <?php if (get_post_type() !== 'post' && get_post_type() != 'page'): ?>
  <section class="tagcloud">
	<?php wp_tag_cloud(); ?>
	</section>
<?php endif; ?>

</footer>