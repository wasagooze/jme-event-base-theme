<?php 

$presenters = get_the_terms(get_the_ID(), 'presenter');

?>

<?php if (!empty($presenters )) : ?>
<aside class="presenter-list">
  <?php if ($presenters[0] != null): ?>
    <b>Presenter<?php if (count($presenters) > 1): ?>s<?php endif; ?></b>: 
    <ul>
    <?php foreach ($presenters as $presenter): ?>
      <li><a href="<?php echo get_term_link($presenter, 'presenter'); ?>"><?php echo $presenter->name; ?></a></li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</aside>
<?php endif; ?>