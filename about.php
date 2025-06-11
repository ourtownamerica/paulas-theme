<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; About Us</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/about/main'); ?>

		<?php get_template_part('assets/template-parts/about/our-story'); ?>

		<?php get_template_part('assets/template-parts/about/our-mission'); ?>

		<?php get_template_part('assets/template-parts/about/team'); ?>

		<?php get_template_part('assets/template-parts/contact-us/contact-us-white'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>