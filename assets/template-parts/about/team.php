<div class="about-team p-3 bg-gray pt-5">
	<div class="container">
		<h6 class="sm-header text-center">OUR TEAM</h6>
		<h1 class="text-forest mx-auto short-header text-center">Meet the Team Behind Our Mission</h1>
		
		<?php 
		
		$employees = new WP_Query([
			'post_type' => 'team',
			'posts_per_page' => -1,
			// 'meta_key' => '_team_member_weight',
			// 'orderby' => 'meta_value_num',
			// 'order' => 'ASC',
		]);

		$i = 0;
		while ($employees->have_posts()){
			$employees->the_post();
			if ($i % 4 === 0) echo '<div class="row">';

			$image_id = get_post_meta(get_the_ID(), '_team_member_image_id', true);
			$image_url = $image_id ? wp_get_attachment_url($image_id) : get_template_directory_uri()."/assets/images/person-placeholder.png";
			$name = get_post_meta(get_the_ID(), '_team_member_name', true);
			$title = get_post_meta(get_the_ID(), '_team_member_title', true);
			$dept = get_post_meta(get_the_ID(), '_team_member_dept', true);
			if(!empty($title) && !empty($dept)) $title .= ' &centerdot; ';
			$title .= $dept;
			
			$column = ($i % 4) + 1;
			$aos = "fade-right";
			if($column === 2) $aos = "fade-up-right";
			if($column === 3) $aos = "fade-up-left";
			if($column === 4) $aos = "fade-left";
			?>
				<div class="col-md-3 text-center" data-aos="<?php echo $aos; ?>">
					<img src="<?php echo $image_url; ?>" class="img-thumbnail w-75" />
					<div class="mb-2">
						<b><?php echo $name; ?></b><br>
						<span><?php echo $title; ?></span>
					</div>
				</div>
			<?php
			$i++;
    		if ($i % 4 === 0) echo '</div>';
		}
		if ($i % 4 !== 0) echo '</div>'; // close final row if not already closed

		?>

	</div>
</div>