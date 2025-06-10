<div class="container">
	<h1>Our Town America Supports a Number of Industries, Including....</h1>
	<?php
	if (have_posts()) {

		echo '<ul>';
		while (have_posts()){ 
			the_post();
			echo "<li><a href=\"".get_permalink()."\">".esc_html(get_post_meta(get_the_ID(), '_industry_name', true))."</a></li>";	
		}
		echo '</ul>';

		// Pagination links
		the_posts_pagination([
			'prev_text'		  => 'Previous page',
			'next_text'		  => 'Next page',
			'before_page_number' => '<span class="meta-nav screen-reader-text">Page </span>'
		]);

	} else {
		echo '<p>No industries found.</p>';
	}

	?>
</div>