<?php
	$selected = 0;

	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 
	if ($term != null) {
		$selected = (int) $term->term_id;
	} 
	if (is_single()) {
		$selected = get_the_id();
	}

$post_type = '';
$post_type_label = '';

if (is_single()) {
	$post_type = get_post_type();
} else {
	$post_type = get_query_var('post_type');
}

$post_type_label = get_post_type_object($post_type)->label;

?>

<header class="page-header">
	<h1 class="page-title"><a href="<?php get_post_type_archive_link($post_type) ?>"><?php echo $post_type_label; ?></a></h1>

	<div class="attraction-filters">
		<label for="<?php echo $post_type; ?>-dropdown">
		Filter By Name: <?php echo jme_post_type_dropdown($post_type, $selected, "All " . $post_type_label); ?>
		</label>
	</div>

	<?php if (!is_single()): ?>
	<div class="pagination-nav">
		<?php echo paginate_links(array(
		'prev_next'          => False,
		)); ?>
	</div>  
	<?php endif; ?>

</header>