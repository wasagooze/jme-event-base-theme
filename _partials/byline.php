<?php
	$presenters = get_the_terms(get_the_ID(), 'presenter');
?>

<h2 class="byline">

<?php if (get_post_type() == 'post'): ?>
	by <b><?php the_author_posts_link(); ?></b> on <b><?php echo the_time(get_option('date_format')); ?></b>
<?php elseif (!empty($presenters[0])): ?>
	Presented by: <?php echo get_presenter_list(); ?>
<?php endif; ?>
</h2>
