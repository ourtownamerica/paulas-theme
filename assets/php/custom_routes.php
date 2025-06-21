<?php

function add_rewrite_rules() {
	$slugs = [
		'about' => 'custom_about_page',
		'contact-us-corp' => 'custom_contact_corp_page',
		'contact-us' => 'custom_contact_corp_page',
		'advertise-local' => 'advertise_local',
		'new-mover-marketing' => 'new_mover_marketing',
		'new-movers' => 'new_mover_marketing',
		'birthday-program' => 'birthday_program',
		'franchise' => 'franchise',
		'blog' => 'blog',
		'every-door-direct-mail' => 'eddm',
		'targeted-postcard' => 'targeted_postcard',
		'digital-marketing' => 'digital_marketing',
		'channel-partner' => 'channel_partner',
		'testimonials' => 'testimonials',
		'case-studies' => 'case_studies',
		'in-the-news' => 'in_the_news',
		'survey' => 'survey',
		'privacy-policy' => 'privacy_policy',
		'media-kit' => 'media_kit'
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
		'blog',
		'birthday_program',
		'eddm',
		'targeted_postcard',
		'digital_marketing',
		'channel_partner',
		'testimonials',
		'case_studies',
		'in_the_news',
		'survey',
		'privacy_policy',
		'media_kit'
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
		'blog' => 'blog-posts.php',
		'birthday_program' => 'birthday-program.php',
		'eddm' => 'every-door-direct-mail.php',
		'targeted_postcard' => 'targeted-postcard.php',
		'digital_marketing' => 'digital-marketing.php',
		'channel_partner' => 'channel-partner.php',
		'testimonials' => 'testimonials.php',
		'case_studies' => 'case-studies.php',
		'in_the_news' => 'in-the-news.php',
		'survey' => 'survey.php',
		'privacy_policy' => 'privacy-policy.php',
		'media_kit' => 'media-kit.php'
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
		'blog',
		'birthday-program',
		'every-door-direct-mail',
		'targeted-postcard',
		'digital-marketing',
		'channel-partner',
		'testimonials',
		'case-studies',
		'in-the-news',
		'survey',
		'privacy-policy',
		'media-kit'
	];
    if ($data['post_type'] === 'page' && in_array($data['post_name'], $blacklist)) {
        wp_die('The slug "'.$data['post_name'].'" is reserved for a static page in the theme.');
    }
    return $data;
}