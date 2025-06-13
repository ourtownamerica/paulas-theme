<?php

function add_rewrite_rules() {
	$slugs = [
		'about' => 'custom_about_page',
		'contact-us-corp' => 'custom_contact_corp_page',
		'contact-us' => 'custom_contact_corp_page',
		'advertise-local' => 'advertise_local',
		'new-mover-marketing' => 'new_mover_marketing',
		'new-movers' => 'new_mover_marketing',
		'franchise' => 'franchise',
		'blog' => 'blog'
	];
	foreach($slugs as $slug=>$var){
		add_rewrite_rule('^'.$slug.'/?$', 'index.php?'.$var.'=1', 'top');
	}
}

function add_custom_query_vars($vars) {
	$custom_vars = [
		'custom_about_page',
		'custom_contact_corp_page',
		'advertise_local',
		'new_mover_marketing',
		'franchise',
		'blog'
	];
	foreach($custom_vars as $var){
		$vars[] = $var;
	}
    return $vars;
}

function load_custom_templates($template) {
	$template_map = [
		'custom_about_page' => 'about.php',
		'custom_contact_corp_page' => 'contact-us-corp.php',
		'advertise_local' => 'advertise-local.php',
		'new_mover_marketing' => 'new-mover-marketing.php',
		'franchise' => 'franchise.php',
		'blog' => 'blog-posts.php'
	];
	foreach($template_map as $var=>$page){
		if (get_query_var($var)) {
			return TEMPLATE_DIR . '/' . $page;
		}
	}
    return $template;
}

function prevent_page_creation($data, $postarr) {
	$blacklist = [
		'about',
		'contact-us-corp',
		'contact-us',
		'advertise-local',
		'new-movers',
		'new-mover-marketing',
		'franchise',
		'blog'
	];
    if ($data['post_type'] === 'page' && in_array($data['post_name'], $blacklist)) {
        wp_die('The slug "'.$data['post_name'].'" is reserved for a static page in the theme.');
    }
    return $data;
}