<div class="p-3 pt-5">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
			<h1 class="text-forest mb-3" data-aos="fade-down"><?php the_title(); ?></h1>
			<h6 class="sm-header-left-forest text-uppercase"><?php the_category(', '); ?></h6>

			<?php if (has_post_thumbnail()) : ?>
				<div class="mb-4">
					<?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow']); ?>
				</div>
			<?php endif; ?>

			<div class="text-muted mb-3">Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?></div>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

		<?php endwhile; else : ?>
			<p>No post found.</p>
		<?php endif; ?>
	</div>
</div>