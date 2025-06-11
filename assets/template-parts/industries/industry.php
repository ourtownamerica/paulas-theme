<?php while (have_posts()) : the_post(); ?>

<div class="industry-main p-3 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8" data-aos="fade-down-right">
				<h1 class="text-forest">Local marketing solutions for <span class="text-leaf"><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_name', true)); ?></span></h1>
				<?php echo get_post_meta(get_the_ID(), '_industry_description', true); ?>
				<br>
				<a href="#contact-us-btm" class="btn btn-gold px-5 py-2 mt-3">GET STARTED</a>
			</div>
			<div class="col-md-4" data-aos="fade-down-left">
				<?php
					$industry_image_id = get_post_meta(get_the_ID(), '_industry_image_id', true);
					$industry_image_url = $industry_image_id ? wp_get_attachment_url($industry_image_id) : '';
				?>
				<img src="<?php echo esc_url($industry_image_url); ?>" class="w-100" />
			</div>
		</div>
	</div>
</div>

<div class="bg-gray p-3 industry-overview pt-5">
	<div class="container">
		<h6 class="sm-header text-center">OVERVIEW</h6>
		<h1 class="text-forest mx-auto short-header text-center">Drive New Customers and Repeat Visits with Targeted Local Marketing</h1>

		<div class="row">
			<div class="col-md-8" data-aos="fade-up-right">
			
				<?php for($i=1; $i<=6; $i++):
					$header = esc_html(get_post_meta(get_the_ID(), '_industry_highlight_header_'.$i, true));
					$body = esc_html(get_post_meta(get_the_ID(), '_industry_highlight_body_'.$i, true));
					if(empty($header) && empty($body)) continue;
					?>
					<div class="d-flex align-items-start mb-3">
						<div class="circle-list-ind flex-shrink-0"><i class="fas fa-check"></i></div>
						<div class="ps-3">
							<div><b class="text-forest"><?php echo $header; ?></b></div><?php echo $body; ?>
						</div>
					</div>
				<?php endfor; ?>
				
				<a href="#contact-us-btm" class="btn btn-forest px-5 py-2 mt-3">START YOUR CAMPAIGN</a>

			</div>
			<div class="col-md-4" data-aos="fade-up-left">
				
				<img src='<?php echo get_template_directory_uri()."/assets/images/certificates.png"; ?>' class="img-fluid" />

			</div>
		</div>
		

	</div>
</div>

<div class="p-3 industry-stats pt-5">
	<div class="container">
		<h6 class="sm-header text-center">KEY STATS</h6>
		<h1 class="text-forest mx-auto short-header text-center"><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stat_header', true)); ?></h1>
		<div class="row">
			<div class="col-md-4" data-aos="fade-right">
				<h1 class="text-gold"><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_header_1', true)); ?></h1>
				<p class="text-forest"><big><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_body_1', true)); ?></big></p>
			</div>
			<div class="col-md-4" data-aos="fade-up">
				<h1 class="text-gold"><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_header_2', true)); ?></h1>
				<p class="text-forest"><big><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_body_2', true)); ?></big></p>
			</div>
			<div class="col-md-4" data-aos="fade-left">
				<h1 class="text-gold"><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_header_3', true)); ?></h1>
				<p class="text-forest"><big><?php echo esc_html(get_post_meta(get_the_ID(), '_industry_stats_body_3', true)); ?></big></p>
			</div>
		</div>
	</div>
</div>

<?php endwhile;