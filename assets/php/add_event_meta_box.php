<?php

/**
 * Add the meta box which holds the custom fields for the Event post type
 * @return void
 */
function add_event_meta_box() {
	add_meta_box(
		'event_details_meta_box', // ID
		'Event Details', // Title
		'render_event_meta_box', // Callback
		'event', // Post type
		'normal', // Context
		'default' // Priority
	);
}

/**
 * Render the inputs for the custom fields in the event type
 * @param mixed $post
 * @return void
 */
function render_event_meta_box($post) {

	// Event details
	$event_title = get_post_meta($post->ID, '_event_title', true);
	$event_description = get_post_meta($post->ID, '_event_description', true);
	
	$event_image_id = get_post_meta($post->ID, '_event_image_id', true);
	$event_image_url = $event_image_id ? wp_get_attachment_url($event_image_id) : '';

	$event_start = get_post_meta($post->ID, '_event_start', true);
	$event_end = get_post_meta($post->ID, '_event_end', true);

	$event_address = get_post_meta($post->ID, '_event_address', true);
	$event_city = get_post_meta($post->ID, '_event_city', true);
	$event_state = get_post_meta($post->ID, '_event_state', true);
	$event_zip = get_post_meta($post->ID, '_event_zip', true);
	$event_booth = get_post_meta($post->ID, '_event_booth', true);

	wp_nonce_field('save_event_meta', 'event_meta_nonce');

	?>
	<h6>Event Title</h6>
	<p><b>The title of the event.</b></p>
	<input type="text" name="event_title" id="event_title_input" value="<?php echo esc_attr($event_title); ?>" style="width:100%;" />
	<br><br>

	<h6>Event Start and End Date/Time</h6>
	<p class="mb-0">Start Date and Time</p>
	<input type="datetime-local" name="event_start" id="event_start_input" value="<?php echo esc_attr($event_start); ?>" style="width:100%;" />
	<br>
	<p class="mb-0 mt-2">End Date and Time</p>
	<input type="datetime-local" name="event_end" id="event_end_input" value="<?php echo esc_attr($event_end); ?>" style="width:100%;" />
	<br><br>

	<h6>Event Location</h6>
	<p class="mb-0">Address</p>
	<input type="text" name="event_address" id="event_address_input" value="<?php echo esc_attr($event_address); ?>" style="width:100%;" />
	<br>
	<p class="mb-0 mt-2">City</p>
	<input type="text" name="event_city" id="event_city_input" value="<?php echo esc_attr($event_city); ?>" style="width:100%;" />
	<br>
	<p class="mb-0 mt-2">State</p>
	<select name="event_state" id="event_state_input" style="width:100%;">
		<option value=""></option>
		<option value="AL" <?php if($event_state === "AL") echo "selected"; ?>>Alabama</option>
		<option value="AK" <?php if($event_state === "AK") echo "selected"; ?>>Alaska</option>
		<option value="AZ" <?php if($event_state === "AZ") echo "selected"; ?>>Arizona</option>
		<option value="AR" <?php if($event_state === "AR") echo "selected"; ?>>Arkansas</option>
		<option value="CA" <?php if($event_state === "CA") echo "selected"; ?>>California</option>
		<option value="CO" <?php if($event_state === "CO") echo "selected"; ?>>Colorado</option>
		<option value="CT" <?php if($event_state === "CT") echo "selected"; ?>>Connecticut</option>
		<option value="DE" <?php if($event_state === "DE") echo "selected"; ?>>Delaware</option>
		<option value="DC" <?php if($event_state === "DC") echo "selected"; ?>>District Of Columbia</option>
		<option value="FL" <?php if($event_state === "FL") echo "selected"; ?>>Florida</option>
		<option value="GA" <?php if($event_state === "GA") echo "selected"; ?>>Georgia</option>
		<option value="HI" <?php if($event_state === "HI") echo "selected"; ?>>Hawaii</option>
		<option value="ID" <?php if($event_state === "ID") echo "selected"; ?>>Idaho</option>
		<option value="IL" <?php if($event_state === "IL") echo "selected"; ?>>Illinois</option>
		<option value="IN" <?php if($event_state === "IN") echo "selected"; ?>>Indiana</option>
		<option value="IA" <?php if($event_state === "IA") echo "selected"; ?>>Iowa</option>
		<option value="KS" <?php if($event_state === "KS") echo "selected"; ?>>Kansas</option>
		<option value="KY" <?php if($event_state === "KY") echo "selected"; ?>>Kentucky</option>
		<option value="LA" <?php if($event_state === "LA") echo "selected"; ?>>Louisiana</option>
		<option value="ME" <?php if($event_state === "ME") echo "selected"; ?>>Maine</option>
		<option value="MD" <?php if($event_state === "MD") echo "selected"; ?>>Maryland</option>
		<option value="MA" <?php if($event_state === "MA") echo "selected"; ?>>Massachusetts</option>
		<option value="MI" <?php if($event_state === "MI") echo "selected"; ?>>Michigan</option>
		<option value="MN" <?php if($event_state === "MN") echo "selected"; ?>>Minnesota</option>
		<option value="MS" <?php if($event_state === "MS") echo "selected"; ?>>Mississippi</option>
		<option value="MO" <?php if($event_state === "MO") echo "selected"; ?>>Missouri</option>
		<option value="MT" <?php if($event_state === "MT") echo "selected"; ?>>Montana</option>
		<option value="NE" <?php if($event_state === "NE") echo "selected"; ?>>Nebraska</option>
		<option value="NV" <?php if($event_state === "NV") echo "selected"; ?>>Nevada</option>
		<option value="NH" <?php if($event_state === "NH") echo "selected"; ?>>New Hampshire</option>
		<option value="NJ" <?php if($event_state === "NJ") echo "selected"; ?>>New Jersey</option>
		<option value="NM" <?php if($event_state === "NM") echo "selected"; ?>>New Mexico</option>
		<option value="NY" <?php if($event_state === "NY") echo "selected"; ?>>New York</option>
		<option value="NC" <?php if($event_state === "NC") echo "selected"; ?>>North Carolina</option>
		<option value="ND" <?php if($event_state === "ND") echo "selected"; ?>>North Dakota</option>
		<option value="OH" <?php if($event_state === "OH") echo "selected"; ?>>Ohio</option>
		<option value="OK" <?php if($event_state === "OK") echo "selected"; ?>>Oklahoma</option>
		<option value="OR" <?php if($event_state === "OR") echo "selected"; ?>>Oregon</option>
		<option value="PA" <?php if($event_state === "PA") echo "selected"; ?>>Pennsylvania</option>
		<option value="RI" <?php if($event_state === "RI") echo "selected"; ?>>Rhode Island</option>
		<option value="SC" <?php if($event_state === "SC") echo "selected"; ?>>South Carolina</option>
		<option value="SD" <?php if($event_state === "SD") echo "selected"; ?>>South Dakota</option>
		<option value="TN" <?php if($event_state === "TN") echo "selected"; ?>>Tennessee</option>
		<option value="TX" <?php if($event_state === "TX") echo "selected"; ?>>Texas</option>
		<option value="UT" <?php if($event_state === "UT") echo "selected"; ?>>Utah</option>
		<option value="VT" <?php if($event_state === "VT") echo "selected"; ?>>Vermont</option>
		<option value="VA" <?php if($event_state === "VA") echo "selected"; ?>>Virginia</option>
		<option value="WA" <?php if($event_state === "WA") echo "selected"; ?>>Washington</option>
		<option value="WV" <?php if($event_state === "WV") echo "selected"; ?>>West Virginia</option>
		<option value="WI" <?php if($event_state === "WI") echo "selected"; ?>>Wisconsin</option>
		<option value="WY" <?php if($event_state === "WY") echo "selected"; ?>>Wyoming</option>
	</select>
	<br>
	<p class="mb-0 mt-2">Zip Code</p>
	<input type="text" name="event_zip" id="event_zip_input" value="<?php echo esc_attr($event_zip); ?>" style="width:100%;" />
	<br>
	<p class="mb-0 mt-2">Booth/Section/Area</p>
	<input type="text" name="event_booth" id="event_booth_input" value="<?php echo esc_attr($event_booth); ?>" style="width:100%;" />
	<br>
	<br><br>

	<h6>Event Image</h6>
	<p><b>Select an event-relevant image to be displayed for the event.</b></p>
	<div class="event-image-upload-wrapper">
		<input type="hidden" id="event_image_id" name="event_image_id" value="<?php echo esc_attr($event_image_id); ?>" />

		<button type="button" class="button upload-image-button">Upload/Select Image</button>
		<button type="button" class="button remove-image-button" style="<?php echo empty($event_image_id) ? 'display:none;' : ''; ?>">Remove Image</button>

		<div class="event-image-preview">
			<?php if ($event_image_url) : ?>
				<img src="<?php echo esc_url($event_image_url); ?>" alt="Event Image Preview" />
			<?php endif; ?>
		</div>
	</div>
	<br>

	<h6>Event Description</h6>
	<p><b>A few sentences or paragraphs about the event.</b></p>
	<?php
	$editor_settings = array(
		'textarea_name' => 'event_description', // The name of the textarea input field
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

	wp_editor($event_description, 'event_description_editor', $editor_settings);

}

function save_event_meta_data($post_id) {
	if (!isset($_POST['event_meta_nonce']) || !wp_verify_nonce($_POST['event_meta_nonce'], 'save_event_meta')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	if (isset($_POST['event_title'])) {
		update_post_meta($post_id, '_event_title', sanitize_text_field($_POST['event_title']));
	}

	if (isset( $_POST['event_start'])) {
		$event_start = sanitize_text_field($_POST['event_start']);
		update_post_meta($post_id, '_event_start', $event_start);
	} else {
		delete_post_meta($post_id, '_event_start');
	}

	$address_parts = ['address', 'city', 'state', 'zip', 'booth'];
	foreach($address_parts as $part){
		if (isset( $_POST['event_'.$part])) {
			$event_address_part = sanitize_text_field($_POST['event_'.$part]);
			update_post_meta($post_id, '_event_'.$part, $event_address_part);
		} else {
			delete_post_meta($post_id, '_event_'.$part);
		}
	}

	if (isset( $_POST['event_end'])) {
		$event_end = sanitize_text_field($_POST['event_end']);
		update_post_meta($post_id, '_event_end', $event_end);
	} else {
		delete_post_meta($post_id, '_event_end');
	}

	if (isset( $_POST['event_image_id'])) {
		$new_image_id = absint($_POST['event_image_id']); // Sanitize as integer
		update_post_meta($post_id, '_event_image_id', $new_image_id);
	} else {
		delete_post_meta($post_id, '_event_image_id'); // Delete if empty
	}

	if (isset($_POST['event_description'])){
		$new_rich_description = wp_kses_post($_POST['event_description']);
		update_post_meta($post_id, '_event_description', $new_rich_description);
	} else {
		delete_post_meta($post_id, '_event_description');
	}
}

function event_enqueue_admin_scripts( $hook_suffix ) {
	if ('post.php' != $hook_suffix && 'post-new.php' != $hook_suffix) return;
	if ('event' != $GLOBALS['typenow']) return;

	wp_enqueue_media();
	wp_enqueue_script('event-media-uploader', TEMPLATE_DIR_URI.'/assets/js/event-media-uploader.js', ['jquery'], null, true);

	wp_add_inline_style('wp-admin', '
		.event-image-preview img {
			max-width: 150px;
			height: auto;
			display: block;
			margin-top: 10px;
		}
	');
}

function set_event_custom_title( $data, $postarr ) {
	if (isset($data['post_type']) && 'event' === $data['post_type']){
		$data['post_title'] = isset($_POST['event_title']) ? sanitize_text_field($_POST['event_title']) : 'Untitled Event';
		$data['post_name'] = sanitize_title($data['post_title']);
	}
	return $data;
}