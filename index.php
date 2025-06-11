<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Home</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/home/carousel'); ?>

		<?php get_template_part('assets/template-parts/services'); ?>

		<?php get_template_part('assets/template-parts/home/dm-feature'); ?>

		<?php get_template_part('assets/template-parts/home/why-ota'); ?>

		<?php get_template_part('assets/template-parts/home/clients-carousel'); ?>

		<?php get_template_part('assets/template-parts/home/media-kit'); ?>

		<?php get_template_part('assets/template-parts/contact-us/contact-us'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>