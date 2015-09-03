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
$title = '';

if (is_single()) {
	$post_type = get_post_type();
} else {
	$post_type = get_query_var('post_type');
}

if ($post_type != '') {
	$title = get_post_type_object($post_type)->labels->name;	
} else {
	$title = $term->name;
}

function has_taxonomy($post_type, $taxonomy) {
	if ($post_type == null) {
		return false;
	}
	$obj = get_post_type_object($post_type);
	return in_array($taxonomy, $obj->taxonomies);
}

?>

<?php if ($post_type != 'post'): ?>
<header class="page-header">

	<h1 class="page-title">
		<?php if (is_tax('presenter')): ?>
			Presenter:
		<?php endif; ?>
		<?php echo $title; ?>
	</h1>	

	<div class="attraction-filters">
		<?php if ($post_type != null): ?>
		<label for="<?php echo $post_type; ?>-dropdown">
			Filter By Name: <?php echo jme_post_type_dropdown($post_type, $selected, "All " . $title); ?>
		</label>
		<?php endif; ?>

		<?php /* if (has_taxonomy($post_type, 'location') || is_tax('location')): ?>
		<label for="location-dropdown">
			Filter By Location: <?php echo jme_taxonomy_dropdown($selected, 'location', $post_type); ?>
		</label>		
		<?php endif; */ ?>

		<?php /* if (has_taxonomy($post_type, 'weekday') || is_tax('weekday')): ?>
		<label for="weekday-dropdown">
			Filter By Day: <?php echo jme_taxonomy_dropdown($selected, 'weekday', $post_type); ?>
		</label>		
		<?php endif; */ ?>

		<?php if (has_taxonomy($post_type, 'presenter') || is_tax('presenter')): ?>
		<label for="presenter-dropdown">
			Filter By Presenter: <?php echo jme_taxonomy_dropdown($selected, 'presenter',$post_type); ?>		
		</label>
		<?php endif; ?>
	</div>	

	<?php if ($term != null): ?>
		<section class="description"><?php echo $term->description; ?></section>
	<?php endif; ?>

	<?php if (!is_single()): ?>
	<div class="pagination-nav">
		<?php echo paginate_links(array(
		'prev_next'          => False,
		)); ?>
	</div>  
	<?php endif; ?>

</header>
<?php endif; ?>