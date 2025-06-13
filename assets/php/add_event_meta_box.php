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

	// Industry details
	$event_title = get_post_meta($post->ID, '_event_title', true);
	$event_description = get_post_meta($post->ID, '_event_description', true);
	
	$event_image_id = get_post_meta($post->ID, '_event_image_id', true);
	$event_image_url = $event_image_id ? wp_get_attachment_url($event_image_id) : '';

	wp_nonce_field('save_event_meta', 'event_meta_nonce');

	?>
	<h6>Event Title</h6>
	<p><b>The title of the event.</b></p>
	<input type="text" name="event_title" id="event_title_input" value="<?php echo esc_attr($event_title); ?>" style="width:100%;" />
	<br><br>

	<h6>Event Image</h6>
	<p><b>Select an event-relevant image to be displayed for the event.</b></p>
	<div class="industry-image-upload-wrapper">
		<input type="hidden" id="event_image_id" name="event_image_id" value="<?php echo esc_attr($event_image_id); ?>" />

		<button type="button" class="button upload-image-button">Upload/Select Image</button>
		<button type="button" class="button remove-image-button" style="<?php echo empty($event_image_id) ? 'display:none;' : ''; ?>">Remove Image</button>

		<div class="industry-image-preview">
			<?php if ($event_image_url) : ?>
				<img src="<?php echo esc_url($event_image_url); ?>" alt="Industry Image Preview" />
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