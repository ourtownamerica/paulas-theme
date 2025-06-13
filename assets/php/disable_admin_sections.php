<?php

function disable_customizer( $wp_customize ) {
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'nav_menus' );
	$wp_customize->remove_section( 'widgets' );
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'manus' );
}
