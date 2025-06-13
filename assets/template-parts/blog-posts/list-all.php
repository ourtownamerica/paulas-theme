<div class="container p-3 pt-4">
	<div class="mb-4 text-center">
		<?php $activecat = get_query_var('cat'); ?>
		<a href="<?php echo home_url('/blog/'); ?>" class="blogfilterlink <?php echo empty($activecat) ? ' activecat' : ''; ?>">All</a>
		<?php
			$categories = get_categories(['hide_empty' => true]);
			foreach ($categories as $category) {
				$class = $activecat == $category->term_id ? 'activecat blogfilterlink' : 'blogfilterlink';
				echo ' | <a class="'.$class.'" href="'.esc_url(home_url('/blog/').'?cat='.$category->term_id).'">'.esc_html($category->name).'</a>';
			}
		?>
	</div>

	<?php

	$paged = get_query_var('paged') ?: 1;
	$cat_filter = get_query_var('cat');

	$query_args = [
		'post_type' => 'post',
		'paged'     => $paged,
	];

	if ($cat_filter) {
		$query_args['cat'] = $cat_filter;
	}

	$query = new WP_Query($query_args);

	if($query->have_posts()){
		echo '<div class="row g-4">';
		while($query->have_posts()){
			$query->the_post();
			$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
			if(!$thumb_url) $thumb_url =  get_template_directory_uri()."/assets/images/default-blog-img.png";
			?>
			<div class="col-md-4 d-flex">
				<article <?php post_class('card p-0 shadow-sm h-100 w-100'); ?>>
					<div class="post-thumb card-img-top" style="background-image: url(<?php echo esc_url($thumb_url); ?>)"></div>
					<div class="card-body d-flex flex-column">
						<h5 class="post-title card-title text-forest mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<a href="<?php the_permalink(); ?>" class="btn btn-outline-leaf">READ MORE</a>
					</div>
				</article>
			</div>
			<?php
		}
		echo '</div>';
		?>
		<div class="mt-5">
			<?php
			echo paginate_links([
				'total' => $query->max_num_pages,
			]);
			?>
		</div>
		<?php
	}else{
		echo "<p>No posts yet!</p>";
	}
	?>
</div>