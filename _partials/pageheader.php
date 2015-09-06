<?php



$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 

$selected = 0;
if ($term != null) {
	$selected = (int) $term->term_id;
} 
if (is_single()) {
	$selected = get_the_id();
}

$post_type = get_post_type();

$title = jme_define_page_header_title();

?>

<?php if ($post_type == 'post') {
	get_template_part('_partials/pageheader', 'post');
} else if (in_the_loop()){ ?>
<header class="entry-header">
	<h1 class="entry-title">
		<?php echo $title; ?>
	</h1>
</header>
<?php } else { ?>

<header class="page-header">
	<h1 class="page-title">
		<?php if (is_tax('presenter')): ?>
			Presenter:
		<?php endif; ?>
		<?php echo $title; ?>
	</h1>

	<?php if (!is_author()): ?>
		<div class="attraction-filters">
			<?php if ($post_type != null): ?>
			<label for="<?php echo $post_type; ?>-dropdown">
				Filter By Name: <?php echo jme_post_type_dropdown($post_type, $selected, "All " . get_post_type_object($post_type)->labels->name); ?>
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
				Filter By Presenter: <?php echo jme_taxonomy_dropdown($selected, 'presenter', $post_type); ?>		
			</label>
			<?php endif; ?>
		</div>	
	<?php endif; ?>

	<section class="description">
		<?php if ($term != null) {
			echo $term->description; 
		} else if (is_author()) {
			echo get_the_author_meta("description"); 
		} ?>
	</section>

	<div class="pagination-nav">
		<?php echo paginate_links(array(
		'prev_next'          => False,
		)); ?>
	</div>  

</header>
<?php } ?>