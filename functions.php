<?php

define('TEMPLATE_DIR_URI', get_template_directory_uri());
define('TEMPLATE_DIR', get_template_directory());

// Enqueue theme style sheets
require TEMPLATE_DIR . '/assets/php/enqueue_styles.php';
paulas_theme_enqueue_styles();

// Enqueue theme javascripts
require TEMPLATE_DIR . '/assets/php/enqueue_scripts.php';
paulas_theme_enqueue_scripts();