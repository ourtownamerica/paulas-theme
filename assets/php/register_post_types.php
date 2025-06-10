<?php

function register_custom_post_types() {

	// Register the Industry post types
	register_post_type('industry', [
		'labels' => [
			'name' => 'Industries',
			'singular_name' => 'Industry',
			'add_new' => 'Add Industry',
			'add_new_item' => 'Add Industry',
			'edit_item' => 'Edit Industry',
			'new_item' => 'New Industry',
			'view_item' => 'View Industry Page',
			'search_items' => 'Search Industries',
			'not_found' => 'No industries found',
			'not_found_in_trash' => 'No industries found in Trash',
			'all_items' => 'All Industries',
			'archives' => 'Industry Archives',
			'item_published' => 'Industry Published'
		],
		'description' => 'Industries serviced by Our Town America.',
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'industries'],
		'show_in_rest' => true,
		'supports' => [],
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-businesswoman'
	]);

	remove_post_type_support('industry', 'title');
    remove_post_type_support('industry', 'editor');
}