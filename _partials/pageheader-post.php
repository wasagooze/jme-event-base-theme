<?php
	$description = get_the_author_meta('description');
?>

<header class="entry-header">
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
	<?php if (is_category('blog') || in_category('blog') && $description != "") {
		get_template_part('_partials/byline', get_post_type());
	} ?>
</header><!-- .entry-header -->