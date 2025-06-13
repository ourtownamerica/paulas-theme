<?php

/**
 * Add the meta box which holds the custom fields for the Industry post type
 * @return void
 */
function add_industry_meta_box() {
	add_meta_box(
		'industry_details_meta_box', // ID
		'Industry Details', // Title
		'render_industry_meta_box', // Callback
		'industry', // Post type
		'normal', // Context
		'default' // Priority
	);
}

/**
 * Render the inputs for the custom fields in the Industry type
 * @param mixed $post
 * @return void
 */
function render_industry_meta_box($post) {

	$is_new_post = ($post->ID === 0 || get_post_status($post->ID) === 'auto-draft');

	// Industry details
	$industry_name = get_post_meta($post->ID, '_industry_name', true);
	$industry_description = get_post_meta($post->ID, '_industry_description', true);

	$default_industry_highlights = [[
		'header' => 'High-Intent Targeting',
		'body' => 'Connect with new residents who are actively looking for new businesses to patronize.'
	],[
		'header' => 'Exclusing Category Placement',
		'body' => 'Be the only business in your category featured in our welcome envelope — no competing offers.'
	],[
		'header' => 'Repeat Business Built In',
		'body' => 'Follow up with thank-you postcards, birthday greetings, and personalized offers to encourage repeat visits.'
	],[
		'header' => 'End-to-End Simplicity',
		'body' => 'We handle everything from design and printing to delivery and tracking, so you can focus on your business.'
	],[
		'header' => 'Trackable ROI',
		'body' => 'Monitor redemptions and campaign performance in real time with our TruTrak® app.'
	]];

	$max_industry_highlights = 6;
	$industry_highlights = [];
	for($i=1; $i<=$max_industry_highlights; $i++){
		$header = get_post_meta($post->ID, '_industry_highlight_header_'.$i, true);
		$body = get_post_meta($post->ID, '_industry_highlight_body_'.$i, true);

		if($is_new_post && empty($header)) $header = $default_industry_highlights[$i-1]['header'];
		if($is_new_post && empty($body)) $body = $default_industry_highlights[$i-1]['body'];

		$industry_highlights[] = [
			'header' => $header,
			'body' => $body,
		];
	}
	
	$industry_image_id = get_post_meta($post->ID, '_industry_image_id', true);
	$industry_image_url = $industry_image_id ? wp_get_attachment_url($industry_image_id) : '';

	$industry_stat_header = get_post_meta($post->ID, '_industry_stat_header', true);
	if($is_new_post && empty($industry_stat_header)) $industry_stat_header = "Drive Traffic with Targeted Mail";

	$default_industry_stats = [[
		'header' => '59%',
		'body' => 'of customers say they enjoy getting mail about local businesses and offers.'
	],[
		'header' => '3x more',
		'body' => 'businesses that use direct mail with an offer see three times more redemptions than digital-only campaigns.'
	],[
		'header' => '87%',
		'body' => 'of new movers patronize businesses that advertise with direct mail in the first 30 days after moving.'
	]];
	for($i=1; $i<=3; $i++){
		$header = get_post_meta($post->ID, '_industry_stats_header_'.$i, true);
		$body = get_post_meta($post->ID, '_industry_stats_body_'.$i, true);

		if($is_new_post && empty($header)) $header = $default_industry_stats[$i-1]['header'];
		if($is_new_post && empty($body)) $body = $default_industry_stats[$i-1]['body'];

		$industry_stats[] = [
			'header' => $header,
			'body' => $body,
		];
	}

	wp_nonce_field('save_industry_meta', 'industry_meta_nonce');

	?>
	<h6>Industry Name</h6>
	<p><b>The name of the industry, eg., Restaurants or Car Dealerships.</b></p>
	<input type="text" name="industry_name" id="industry_name_input" value="<?php echo esc_attr($industry_name); ?>" style="width:100%;" />
	<br><br>

	<h6>Industry Image</h6>
	<p><b>Select an industry-relevant image to be displayed next to the description.</b></p>
	<div class="industry-image-upload-wrapper">
		<input type="hidden" id="industry_image_id" name="industry_image_id" value="<?php echo esc_attr($industry_image_id); ?>" />

		<button type="button" class="button upload-image-button">Upload/Select Image</button>
		<button type="button" class="button remove-image-button" style="<?php echo empty($industry_image_id) ? 'display:none;' : ''; ?>">Remove Image</button>

		<div class="industry-image-preview">
			<?php if ($industry_image_url) : ?>
				<img src="<?php echo esc_url($industry_image_url); ?>" alt="Industry Image Preview" />
			<?php endif; ?>
		</div>
	</div>
	<br>

	<h6>Industry Description</h6>
	<p><b>A few sentences or paragraphs about how OTA can benefit compnaies in this industry.</b></p>
	<?php
	$editor_settings = array(
		'textarea_name' => 'industry_description', // The name of the textarea input field
		'textarea_rows' => 10,						   // Number of rows for the editor
		'teeny'		 => true,						 // True for a "teeny" (simplified) toolbar
		'media_buttons' => false,						// True to show the Add Media button
		'tinymce'	   => array(
			'toolbar1'	  => 'bold,italic,underline,link,unlink,blockquote,strikethrough,bullist,numlist,pastetext,removeformat,undo,redo', // Simple toolbar
			'toolbar2'	  => '', // No second toolbar
			'paste_as_text' => true, // Force paste as plain text
		),
		'quicktags'	 => false,						// True to show the HTML mode (quicktags) buttons
	);

	wp_editor($industry_description, 'industry_description_editor', $editor_settings);

	
	?>
	<br>
	<h6>Industry Highlights</h6>
	<p><b>Up to 6 bullet points. Defaults are provided, but you can tailor them to this industry if desired.</b></p>
	<?php for($i=1; $i<=$max_industry_highlights; $i++): ?>
		<label>Highlight #<?php echo $i; ?></label>
		<input type="text" name="industry_highlight_header_<?php echo $i; ?>" id="industry_highlight_header_<?php echo $i; ?>_input" value="<?php echo esc_attr($industry_highlights[$i-1]['header']); ?>" style="width:100%;" placeholder="Highlight #<?php echo $i; ?> header" />
		<input type="text" name="industry_highlight_body_<?php echo $i; ?>" id="industry_highlight_body_<?php echo $i; ?>_input" value="<?php echo esc_attr($industry_highlights[$i-1]['body']); ?>" style="width:100%;" placeholder="Highlight #<?php echo $i; ?> body" />
		<br><br>
	<?php endfor; ?>

	<h6>Industry Stats</h6>
	<p><b>Up to 3 statistics relvant to this industry. You may also customize the Stats section header of the industry page.</b></p>

	<label>Stats Section Header</label>
	<input type="text" name="industry_stat_header" id="industry_stat_header_input" value="<?php echo esc_attr($industry_stat_header); ?>" style="width:100%;" />
	<br><br>

	<?php for($i=1; $i<=3; $i++): ?>
		<label>Statistic #<?php echo $i; ?></label>
		<input type="text" name="industry_stats_header_<?php echo $i; ?>" id="industry_stats_header_<?php echo $i; ?>_input" value="<?php echo esc_attr($industry_stats[$i-1]['header']); ?>" style="width:100%;" placeholder="Stat #<?php echo $i; ?> header" />
		<input type="text" name="industry_stats_body_<?php echo $i; ?>" id="industry_stats_body_<?php echo $i; ?>_input" value="<?php echo esc_attr($industry_stats[$i-1]['body']); ?>" style="width:100%;" placeholder="Stat #<?php echo $i; ?> body" />
		<br><br>
	<?php endfor; ?>

	<?php
}

function save_industry_meta_data($post_id) {
	if (!isset($_POST['industry_meta_nonce']) || !wp_verify_nonce($_POST['industry_meta_nonce'], 'save_industry_meta')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	if (isset($_POST['industry_name'])) {
		update_post_meta($post_id, '_industry_name', sanitize_text_field($_POST['industry_name']));
	}

	if (isset( $_POST['industry_image_id'])) {
		$new_image_id = absint($_POST['industry_image_id']); // Sanitize as integer
		update_post_meta($post_id, '_industry_image_id', $new_image_id);
	} else {
		delete_post_meta($post_id, '_industry_image_id'); // Delete if empty
	}

	if (isset($_POST['industry_description'])){
		$new_rich_description = wp_kses_post($_POST['industry_description']);
		update_post_meta($post_id, '_industry_description', $new_rich_description);
	} else {
		delete_post_meta($post_id, '_industry_description');
	}

	$max_industry_highlights = 6;
	for($i=1; $i<=$max_industry_highlights; $i++){
		if (isset($_POST['industry_highlight_header_'.$i])){
			$new_header = sanitize_text_field($_POST['industry_highlight_header_'.$i]);
			update_post_meta($post_id, '_industry_highlight_header_'.$i, $new_header);
		} else {
			delete_post_meta($post_id, '_industry_highlight_header_'.$i);
		}
		if (isset($_POST['industry_highlight_body_'.$i])){
			$new_body = sanitize_text_field($_POST['industry_highlight_body_'.$i]);
			update_post_meta($post_id, '_industry_highlight_body_'.$i, $new_body);
		} else {
			delete_post_meta($post_id, '_industry_highlight_body_'.$i);
		}
	}

	if (isset($_POST['industry_stat_header'])){
		$new_stat_header = sanitize_text_field($_POST['industry_stat_header']);
		update_post_meta($post_id, '_industry_stat_header', $new_stat_header);
	} else {
		delete_post_meta($post_id, '_industry_stat_header');
	}

	for($i=1; $i<=3; $i++){
		if (isset($_POST['industry_stats_header_'.$i])){
			$new_header = sanitize_text_field($_POST['industry_stats_header_'.$i]);
			update_post_meta($post_id, '_industry_stats_header_'.$i, $new_header);
		} else {
			delete_post_meta($post_id, '_industry_stats_header_'.$i);
		}
		if (isset($_POST['industry_stats_body_'.$i])){
			$new_body = sanitize_text_field($_POST['industry_stats_body_'.$i]);
			update_post_meta($post_id, '_industry_stats_body_'.$i, $new_body);
		} else {
			delete_post_meta($post_id, '_industry_stats_body_'.$i);
		}
	}
}

function industry_enqueue_admin_scripts( $hook_suffix ) {
	if ('post.php' != $hook_suffix && 'post-new.php' != $hook_suffix) return;
	if ('industry' != $GLOBALS['typenow']) return;

	wp_enqueue_media();
	wp_enqueue_script('industry-media-uploader', TEMPLATE_DIR_URI.'/assets/js/industry-media-uploader.js', ['jquery'], null, true);

	wp_add_inline_style('wp-admin', '
		.industry-image-preview img {
			max-width: 150px;
			height: auto;
			display: block;
			margin-top: 10px;
		}
	');
}

function set_industry_custom_title( $data, $postarr ) {
	if (isset($data['post_type']) && 'industry' === $data['post_type']){
		$data['post_title'] = isset($_POST['industry_name']) ? sanitize_text_field($_POST['industry_name']) : 'Untitled Industry';
		$data['post_name'] = sanitize_title($data['post_title']);
	}
	return $data;
}