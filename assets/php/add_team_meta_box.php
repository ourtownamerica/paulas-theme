<?php

/**
 * Add the meta box which holds the custom fields for the Team member post type
 * @return void
 */
function add_team_meta_box() {
	add_meta_box(
		'team_details_meta_box', // ID
		'Team Member Details', // Title
		'render_team_meta_box', // Callback
		'team', // Post type
		'normal', // Context
		'default' // Priority
	);
}

/**
 * Render the inputs for the custom fields in the Team member type
 * @param mixed $post
 * @return void
 */
function render_team_meta_box($post) {

	$is_new_post = ($post->ID === 0 || get_post_status($post->ID) === 'auto-draft');

	// Team Member details
	$team_member_name = get_post_meta($post->ID, '_team_member_name', true);
	$team_member_weight = get_post_meta($post->ID, '_team_member_weight', true);
	$team_member_dept = get_post_meta($post->ID, '_team_member_dept', true);
	$team_member_title = get_post_meta($post->ID, '_team_member_title', true);
	$team_member_image_id = get_post_meta($post->ID, '_team_member_image_id', true);
	$team_member_image_url = $team_member_image_id ? wp_get_attachment_url($team_member_image_id) : '';

	if(empty($team_member_weight) && $team_member_weight !== 0 && $team_member_weight !== '0'){
		$team_member_weight = '100';
	}

	$depts = ['Inside Sales', 'Outside Sales', 'Production', 'IT Dept', 'HR', 'Graphics Dept', 'Sponsor Services', 'Accounting'];

	wp_nonce_field('save_team_meta', 'team_meta_nonce');

	?>
	<h6>Team Member Name</h6>
	<p><b>The full name of the team member as it should appear on the About page.</b></p>
	<input type="text" name="team_member_name" id="team_member_name_input" value="<?php echo esc_attr($team_member_name); ?>" style="width:100%;" />
	<br><br>

	<h6>Team Member Title</h6>
	<p><b>The title, role, or position of the team member to be shown. This may be left blank.</b></p>
	<input type="text" name="team_member_title" id="team_member_title_input" value="<?php echo esc_attr($team_member_title); ?>" style="width:100%;" />
	<br><br>

	<h6>Department</h6>
	<p><b>What department does this team member work in? This may be left blank.</b></p>
	<select name="team_member_dept" id="team_member_dept_input" style="width:100%;">
		<option value=""<?php if(empty($team_member_dept)) echo ' selected'; ?>>Not shown</option>
		<?php foreach($depts as $dept): ?>
			<option value="<?php echo $dept; ?>"<?php if($team_member_dept === $dept) echo ' selected'; ?>><?php echo $dept; ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>

	<h6>Image</h6>
	<p><b>A square image of the team member. Please crop the image to be a square or else the page will look goofy.</b></p>
	<div class="team-image-upload-wrapper">
		<input type="hidden" id="team_member_image_id" name="team_member_image_id" value="<?php echo esc_attr($team_member_image_id); ?>" />

		<button type="button" class="button upload-image-button">Upload/Select Image</button>
		<button type="button" class="button remove-image-button" style="<?php echo empty($industry_image_id) ? 'display:none;' : ''; ?>">Remove Image</button>

		<div class="team-image-preview">
			<?php if ($team_member_image_url) : ?>
				<img src="<?php echo esc_url($team_member_image_url); ?>" alt="Team Member Image Preview" />
			<?php endif; ?>
		</div>
	</div>
	<br>

	<h6>Weight</h6>
	<p><b>Not their physical weight. This is for ordering purposes. The lower the number, the higher up in the list they will appear.</b></p>
	<input type="number" name="team_member_weight" id="team_member_weight_input" value="<?php echo esc_attr($team_member_weight); ?>" style="width:100%;" />

	<?php
}

function save_team_meta_data($post_id) {
	if (!isset($_POST['team_meta_nonce']) || !wp_verify_nonce($_POST['team_meta_nonce'], 'save_team_meta')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	if (isset($_POST['team_member_name'])) {
		update_post_meta($post_id, '_team_member_name', sanitize_text_field($_POST['team_member_name']));
	}

	if (isset($_POST['team_member_weight'])) {
		update_post_meta($post_id, '_team_member_weight', absint($_POST['team_member_weight']));
	}

	if (isset($_POST['team_member_title'])) {
		$new_team_member_title = sanitize_text_field($_POST['team_member_title']);
		update_post_meta($post_id, '_team_member_title', $new_team_member_title);
	} else {
		delete_post_meta($post_id, '_team_member_title'); // Delete if empty
	}

	if (isset($_POST['team_member_dept'])) {
		$new_team_member_dept = sanitize_text_field($_POST['team_member_dept']);
		update_post_meta($post_id, '_team_member_dept', $new_team_member_dept);
	} else {
		delete_post_meta($post_id, '_team_member_dept'); // Delete if empty
	}

	if (isset( $_POST['team_member_image_id'])) {
		$new_image_id = absint($_POST['team_member_image_id']); // Sanitize as integer
		update_post_meta($post_id, '_team_member_image_id', $new_image_id);
	} else {
		delete_post_meta($post_id, '_team_member_image_id'); // Delete if empty
	}
}

function team_enqueue_admin_scripts( $hook_suffix ) {
	if ('post.php' != $hook_suffix && 'post-new.php' != $hook_suffix) return;
	if ('team' != $GLOBALS['typenow']) return;

	wp_enqueue_media();
	wp_enqueue_script('team-member-media-uploader', TEMPLATE_DIR_URI.'/assets/js/team-member-media-uploader.js', ['jquery'], null, true);

	wp_add_inline_style('wp-admin', '
		.team-image-preview img {
			max-width: 150px;
			height: auto;
			display: block;
			margin-top: 10px;
		}
	');
}

function set_team_custom_title( $data, $postarr ) {
	if (isset($data['post_type']) && 'team' === $data['post_type']){
		$data['post_title'] = isset($_POST['team_member_name']) ? sanitize_text_field($_POST['team_member_name']) : 'Nameless Person';
		$data['post_name'] = sanitize_title($data['post_title']);
	}
	return $data;
}