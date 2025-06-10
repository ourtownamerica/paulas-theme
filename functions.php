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