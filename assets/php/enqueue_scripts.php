<?php

/**
 * Enqueue all the javascripts for the theme
 * @return void
 */
function paulas_theme_enqueue_scripts() {
	$theme = wp_get_theme();
	
	// Load Bootstrap on every page
	$bootstrap_path = TEMPLATE_DIR_URI.'/assets/js/bootstrap.bundle.js';
	wp_enqueue_script('bootstrap-js', $bootstrap_path, [], $theme->get('Version'), true);

	// Load aos js on every page
	$aosjs_path = TEMPLATE_DIR_URI.'/assets/js/aos.js';
	wp_enqueue_script('aos-js', $aosjs_path, [], $theme->get('Version'), true);

	wp_enqueue_script('jquery');

	// Load aos js on every page
	$slickjs_path = TEMPLATE_DIR_URI.'/assets/js/slick.min.js';
	wp_enqueue_script('slick-js', $slickjs_path, ['jquery'], $theme->get('Version'), true);

	// Load main js on every page
	$mainjs_path = TEMPLATE_DIR_URI.'/assets/js/index.js';
	wp_enqueue_script('index-js', $mainjs_path, ['bootstrap-js', 'aos-js', 'jquery', 'slick-js'], $theme->get('Version'), true);
	wp_localize_script('index-js', 'wpData', [
		'templateUrl' => TEMPLATE_DIR_URI
	]);

	// Load admin js on admin pages
	$admin_js = TEMPLATE_DIR_URI.'/assets/js/admin.js';
	wp_enqueue_script('my-admin-js', $admin_js, [], $theme->get('Version'), true);

}