<header class="entry-header">
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
	<?php if (is_category('blog') || in_category('blog')): ?>
		<?php if (!empty(get_the_author_meta('description'))): ?>
		<h2 class="byline">
		by <b><?php the_author_posts_link(); ?></b> on <b><?php echo the_time(get_option('date_format')); ?></b>
		</h2>
		<?php endif; ?>
	<?php endif; ?>
</header><!-- .entry-header -->