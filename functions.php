<?php

define('TEMPLATE_DIR_URI', get_template_directory_uri());
define('TEMPLATE_DIR', get_template_directory());

// Enqueue theme style sheets
require TEMPLATE_DIR . '/assets/php/enqueue_styles.php';
paulas_theme_enqueue_styles();

// Enqueue theme javascripts
require TEMPLATE_DIR . '/assets/php/enqueue_scripts.php';
paulas_theme_enqueue_scripts();

// Register post types
require TEMPLATE_DIR . '/assets/php/register_post_types.php';
add_action('init', 'register_custom_post_types');

// Add custom fields for the industry posts
require TEMPLATE_DIR . '/assets/php/add_industry_meta_box.php';
add_action('add_meta_boxes', 'add_industry_meta_box');
add_action('save_post', 'save_industry_meta_data');
add_action('admin_enqueue_scripts', 'industry_enqueue_admin_scripts');
add_filter('wp_insert_post_data', 'set_industry_custom_title', 99, 2);

// Add custom fields for the events posts
require TEMPLATE_DIR . '/assets/php/add_event_meta_box.php';
add_action('add_meta_boxes', 'add_event_meta_box');
add_action('save_post', 'save_event_meta_data');
add_action('admin_enqueue_scripts', 'event_enqueue_admin_scripts');
add_filter('wp_insert_post_data', 'set_event_custom_title', 99, 2);

// Add custom fields for the team members
require TEMPLATE_DIR . '/assets/php/add_team_meta_box.php';
add_action('add_meta_boxes', 'add_team_meta_box');
add_action('save_post', 'save_team_meta_data');
add_action('admin_enqueue_scripts', 'team_enqueue_admin_scripts');
add_filter('wp_insert_post_data', 'set_team_custom_title', 99, 2);

// Custom routing rules for static pages
require TEMPLATE_DIR . '/assets/php/custom_routes.php';
add_action('init', 'add_rewrite_rules');
add_filter('query_vars', 'add_custom_query_vars');
add_filter('template_include', 'load_custom_templates');
add_filter('wp_insert_post_data', 'prevent_page_creation', 10, 2);

// Enable thumbnails in blog posts
add_theme_support('post-thumbnails');

// Disable certain admin things
require TEMPLATE_DIR . '/assets/php/disable_admin_sections.php';
add_action('customize_register', 'disable_customizer', 99);