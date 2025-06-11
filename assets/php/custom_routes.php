<?php

function add_rewrite_rules() {
    add_rewrite_rule('^about/?$', 'index.php?custom_about_page=1', 'top');
	add_rewrite_rule('^contact-us-corp/?$', 'index.php?custom_contact_corp_page=1', 'top');
	add_rewrite_rule('^contact-us/?$', 'index.php?custom_contact_corp_page=1', 'top');
	add_rewrite_rule('^advertise-local/?$', 'index.php?advertise_local=1', 'top');
}

function add_custom_query_vars($vars) {
    $vars[] = 'custom_about_page';
	$vars[] = 'custom_contact_corp_page';
	$vars[] = 'advertise_local';
    return $vars;
}

function load_custom_templates($template) {
    if (get_query_var('custom_about_page')) {
        return TEMPLATE_DIR . '/about.php';
    }
	if (get_query_var('custom_contact_corp_page')) {
        return TEMPLATE_DIR . '/contact-us-corp.php';
    }
	if (get_query_var('advertise_local')) {
        return TEMPLATE_DIR . '/advertise-local.php';
    }
    return $template;
}

function prevent_page_creation($data, $postarr) {
    if ($data['post_type'] === 'page' && $data['post_name'] === 'about') {
        wp_die('The slug "about" is reserved for a static page in the theme.');
    }
	if ($data['post_type'] === 'page' && $data['post_name'] === 'contact-us-corp') {
        wp_die('The slug "contact-us-corp" is reserved for a static page in the theme.');
    }
	if ($data['post_type'] === 'page' && $data['post_name'] === 'contact-us') {
        wp_die('The slug "contact-us" is reserved for a static page in the theme.');
    }
	if ($data['post_type'] === 'page' && $data['post_name'] === 'advertise-local') {
        wp_die('The slug "advertise-local" is reserved for a static page in the theme.');
    }
    return $data;
}