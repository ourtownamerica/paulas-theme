<?php

/**
 * Enqueue all the styles for the theme
 * @return void
 */
function paulas_theme_enqueue_styles(){

	// Load Bootstrap on every page
	$bootstrap_path = TEMPLATE_DIR_URI.'/assets/css/bootstrap.min.css';
	wp_enqueue_style('bootstrap', $bootstrap_path, [], @filemtime($bootstrap_path));

	// Load fonts css
	$fonts_path = TEMPLATE_DIR_URI.'/assets/css/fonts.css';
	wp_enqueue_style('fonts', $fonts_path, [], @filemtime($fonts_path));

	// Load fontawesome css
	$fontawesome_path = TEMPLATE_DIR_URI.'/assets/fontawesome/css/all.min.css';
	wp_enqueue_style('fontawesome', $fontawesome_path, [], @filemtime($fontawesome_path));

	// Load aos css
	$aos_path = TEMPLATE_DIR_URI.'/assets/css/aos.css';
	wp_enqueue_style('aos', $aos_path, [], @filemtime($aos_path));

	// Load slick css
	$slick_path = TEMPLATE_DIR_URI.'/assets/css/slick.css';
	wp_enqueue_style('slick', $slick_path, [], @filemtime($slick_path));

	// Load slick css
	$slick_theme_path = TEMPLATE_DIR_URI.'/assets/css/slick-theme.css';
	wp_enqueue_style('slick-theme', $slick_theme_path, ['slick'], @filemtime($slick_theme_path));

	// Load main theme css
	$theme_path = TEMPLATE_DIR_URI.'/assets/css/paulas_theme.css';
	wp_enqueue_style('paulas_theme', $theme_path, ['bootstrap', 'fonts'], @filemtime($theme_path));


}