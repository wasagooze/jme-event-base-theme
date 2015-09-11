<?php
	$post_type = get_post_type();
	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 

	$selected = 0;
	if ($term != null) {
		$selected = (int) $term->term_id;
	} 
	if (is_single()) {
		$selected = get_the_id();
	}
?>

<div class="attraction-filters">

	<?php if (!is_tax('presenter')): ?>
	<label for="<?php echo $post_type; ?>-dropdown">
		Filter By Name: <?php echo jme_post_type_dropdown($post_type, $selected, "All " . get_post_type_object($post_type)->labels->name); ?>
	</label>
	<?php endif; ?>

	<?php if (has_taxonomy($post_type, 'presenter')): ?>
	<label for="presenter-dropdown">
		Filter By Presenter: <?php echo jme_taxonomy_dropdown($selected, 'presenter', null); ?>		
	</label>
<?php endif; ?>
</div>	