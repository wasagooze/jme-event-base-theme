
<header class="page-header">

	<h1 class="page-title">
		Content tagged: "<?php echo single_tag_title( '', false ); ?>"
	</h1>	

	<section class="description">
	<?php if (empty(tag_description())): ?>
		Here is everything that has been tagged as "<?php echo single_tag_title(); ?>".
	<?php else: ?>
		<?php echo tag_description(); ?>
	<?php endif; ?>
	</section>

	<section class="tagcloud">
	<?php wp_tag_cloud(); ?>
	</section>

	<?php if (!is_single()): ?>
	<div class="pagination-nav">
		<?php echo paginate_links(array(
		'prev_next'          => False,
		)); ?>
	</div>  
	<?php endif; ?>

</header>