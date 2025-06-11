<?php

function register_custom_post_types() {

	// Register the employees post type
	register_post_type('team', [
        'labels' => [
			'name' => 'Team Members',
			'singular_name' => 'Team Member',
			'add_new' => 'Add Team Member',
			'add_new_item' => 'Add Team Member',
			'edit_item' => 'Edit Team Member',
			'new_item' => 'New Team Member',
			'view_item' => 'View Team',
			'search_items' => 'Search Team',
			'all_items' => 'All Team Members',
			'item_published' => 'Team Member Published'
		],
        'public' => false,
        'show_ui' => true,
        'supports' => [],
        'menu_icon' => 'dashicons-groups'
    ]);

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
	remove_post_type_support('team', 'title');
    remove_post_type_support('team', 'editor');
}