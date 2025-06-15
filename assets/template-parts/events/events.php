<div class="container p-3 pt-4">
	<?php
	if (have_posts()) {
		echo '<div class="row g-4">';

		while (have_posts()){ 
			the_post();
			
			$event_image_id = get_post_meta(get_the_ID(), '_event_image_id', true);
			$event_image_url = $event_image_id ? wp_get_attachment_url($event_image_id) : '';
			if(empty($event_image_url)) $event_image_url =  get_template_directory_uri()."/assets/images/event-default-thumb.png";
			$event_name = esc_html(get_post_meta(get_the_ID(), '_event_title', true));
			$datetime = esc_html(get_post_meta(get_the_ID(), '_event_start', true));
			$event_date = 'TBA';
			if(!empty($datetime)){
				list($date, $time) = explode('T', $datetime);
				list($year, $month, $date) = explode("-", $date);
				$mo = date('F', mktime(0, 0, 0, $month, 1));
				$event_date = $mo . ' ' . intval($date). ', \'' . substr($year, -2);
			}
			$event_city = esc_html(get_post_meta(get_the_ID(), '_event_city', true));
			$event_state = esc_html(get_post_meta(get_the_ID(), '_event_state', true));
			$event_booth = esc_html(get_post_meta(get_the_ID(), '_event_booth', true));
			?>
			<div class="col-md-4 d-flex">
				<article <?php post_class('card p-0 shadow-sm h-100 w-100'); ?>>
					<div class="event-thumb card-img-top" style="background-image: url(<?php echo esc_url($event_image_url); ?>)"></div>
					<div class="card-body d-flex flex-column">
						<h5 class="post-title card-title text-forest mb-2"><a href="<?php the_permalink(); ?>"><?php echo $event_name; ?></a></h5>
						<div class="mb-2" style="display: flex; justify-content: space-between;"">
							<?php if(!empty($event_date)): ?>
								<small class="text-xs me-3"><span class="text-gold"><i class="far fa-calendar-alt"></i></span> <?php echo $event_date; ?></small>
							<?php endif; ?>
							<?php if(!empty($event_city) && !empty($event_state)): ?>
								<small class="text-xs me-3"><span class="text-gold"><i class="fas fa-map-marker-alt"></i></span> <?php echo $event_city.', '.$event_state; ?></small>
							<?php endif; ?>
							<?php if(!empty($event_booth)): ?>
								<small class="text-xs bg-gold text-white px-2 rounded"><?php echo $event_booth; ?></small>
							<?php endif; ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="btn btn-outline-leaf">LEARN MORE</a>
					</div>
				</article>
			</div>
			<?php
		}

		echo '</div>';

		// Pagination links
		the_posts_pagination([
			'prev_text'		  => 'Previous page',
			'next_text'		  => 'Next page',
			'before_page_number' => '<span class="meta-nav screen-reader-text">Page </span>'
		]);

	} else {
		echo '<p>No events found.</p>';
	}

	?>
</div>