<?php


$post_type = get_post_type();

$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 
$title = jme_define_page_header_title();

$presenters = get_the_terms(get_the_ID(), 'presenter');

?>

<?php if ($post_type == 'post') {
	get_template_part('_partials/pageheader', 'post');
} else if (in_the_loop()){ ?>
<header class="entry-header">
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>">
			<?php echo jme_define_page_header_title(); ?>
		</a>
	</h1>
	<?php get_template_part('_partials/byline', get_post_type()); ?>
</header>
<?php } else { ?>

<header class="page-header">
	<h1 class="page-title">
		<?php if (is_tax('presenter')): ?>
			Presenter: <?php echo jme_define_page_header_title(); ?>
		<?php else: ?>
			<?php echo get_post_type_object(get_post_type())->labels->name; ?>
		<?php endif; ?>
	</h1>

	<?php get_template_part('_partials/filters'); ?>

	<div class="pagination-nav">
		<?php echo paginate_links(array(
		'prev_next'          => False,
		)); ?>
	</div>  

</header>
<?php } ?>