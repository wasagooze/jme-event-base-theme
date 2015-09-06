<?php

$presenters = get_the_terms(get_the_ID(), 'presenter');

if (is_single() && !empty($presenters[0])): ?>
    <?php foreach ($presenters as $term): ?>   
      <?php if (!empty($term->description)): ?>
      <section class="bio">
      <dt><a href="<?php echo get_term_link($term, 'presenter'); ?>">
        <?php echo $term->name; ?></a>
      </dt>
      <dd><?php echo $term->description; ?></dd>
      </section>
    <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>