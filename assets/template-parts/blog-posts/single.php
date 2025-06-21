<div class="p-3 pt-5">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="row">
				<div class="col-md-6">
					<h6 class="sm-header-left">BLOG</h6>
					<h1 class="text-forest" data-aos="fade-down"><?php the_title(); ?></h1>
					<div class="text-muted mb-3">Posted on <?php the_time('F j, Y'); ?> | <?php the_author(); ?></div>
				</div>
				<div class="col-md-6">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

			<div class="text-center">
				<a href="<?php echo home_url('/blog'); ?>" class="btn btn-outline-leaf m-3">VIEW ALL POSTS</a>
			</div>

		<?php endwhile; else : ?>
			<p>No post found.</p>
		<?php endif; ?>
	</div>
</div>