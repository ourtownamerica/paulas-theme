<?php 
while (have_posts()) : the_post(); 

$event_image_id = get_post_meta(get_the_ID(), '_event_image_id', true);
$event_image_url = $event_image_id ? wp_get_attachment_url($event_image_id) : '';
if(empty($event_image_url)) $event_image_url =  get_template_directory_uri()."/assets/images/event-default-thumb.png";
$event_name = esc_html(get_post_meta(get_the_ID(), '_event_title', true));
$start_time = esc_html(get_post_meta(get_the_ID(), '_event_start', true));
$end_time = esc_html(get_post_meta(get_the_ID(), '_event_end', true));
$event_address = esc_html(get_post_meta(get_the_ID(), '_event_address', true));
$event_city = esc_html(get_post_meta(get_the_ID(), '_event_city', true));
$event_state = esc_html(get_post_meta(get_the_ID(), '_event_state', true));
$event_zip = esc_html(get_post_meta(get_the_ID(), '_event_zip', true));
$event_booth = esc_html(get_post_meta(get_the_ID(), '_event_booth', true));
$event_desc = esc_html(get_post_meta(get_the_ID(), '_event_description', true));
?>

<div class="event-main p-3 pt-5">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="text-forest"><?php echo $event_name ?></span></h1>
				<img src="<?php echo $event_image_url; ?>" />
				<p><?php echo $start_time; ?> - <?php echo $end_time; ?></p>
				<p><?php echo $event_address; ?> <?php echo $event_city; ?>, <?php echo $event_state; ?> <?php echo $event_zip; ?></p>
				<p><?php echo $event_booth; ?></>
				<br>
				<?php echo $event_desc; ?>
			</div>
		</div>
	</div>
</div>

<?php endwhile;