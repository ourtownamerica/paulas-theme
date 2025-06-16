<?php

/**
 * Enqueue all the styles for the theme
 * @return void
 */
function paulas_theme_enqueue_styles(){
	$theme = wp_get_theme();

	// Load Bootstrap on every page
	$bootstrap_path = TEMPLATE_DIR_URI.'/assets/css/bootstrap.min.css';
	wp_enqueue_style('bootstrap', $bootstrap_path, [], $theme->get('Version'));

	// Load fonts css
	$fonts_path = TEMPLATE_DIR_URI.'/assets/css/fonts.css';
	wp_enqueue_style('fonts', $fonts_path, [], $theme->get('Version'));

	// Load fontawesome css
	$fontawesome_path = TEMPLATE_DIR_URI.'/assets/fontawesome/css/all.min.css';
	wp_enqueue_style('fontawesome', $fontawesome_path, [], $theme->get('Version'));

	// Load aos css
	$aos_path = TEMPLATE_DIR_URI.'/assets/css/aos.css';
	wp_enqueue_style('aos', $aos_path, [], $theme->get('Version'));

	// Load slick css
	$slick_path = TEMPLATE_DIR_URI.'/assets/css/slick.css';
	wp_enqueue_style('slick', $slick_path, [], $theme->get('Version'));

	// Load slick css
	$slick_theme_path = TEMPLATE_DIR_URI.'/assets/css/slick-theme.css';
	wp_enqueue_style('slick-theme', $slick_theme_path, ['slick'], $theme->get('Version'));

	// Load main theme css
	$theme_path = TEMPLATE_DIR_URI.'/assets/css/paulas_theme.css';
	wp_enqueue_style('paulas_theme', $theme_path, ['bootstrap', 'fonts'], $theme->get('Version'));


}