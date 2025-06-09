<?php

/**
 * Enqueue all the javascripts for the theme
 * @return void
 */
function paulas_theme_enqueue_scripts() {

	// Load Bootstrap on every page
	$bootstrap_path = TEMPLATE_DIR_URI.'/assets/js/bootstrap.bundle.js';
	wp_enqueue_script('bootstrap-js', $bootstrap_path, [], @filemtime($bootstrap_path), true);

	// Load main js on every page
	$mainjs_path = TEMPLATE_DIR_URI.'/assets/js/index.js';
	wp_enqueue_script('index-js', $mainjs_path, [], @filemtime($mainjs_path), true);

}