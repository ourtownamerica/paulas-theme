<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Franchise</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/franchise/main'); ?>

		<?php get_template_part('assets/template-parts/franchise/overview'); ?>

		<?php get_template_part('assets/template-parts/franchise/franchise'); ?>

		<?php get_template_part('assets/template-parts/franchise/stories'); ?>

		<?php get_template_part('assets/template-parts/franchise/intranet-login'); ?>

		<?php get_template_part('assets/template-parts/contact-us/contact-us'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>