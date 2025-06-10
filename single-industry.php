<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Industry Highlights</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/industries/industry'); ?>

		<?php get_template_part('assets/template-parts/services'); ?>

		<?php get_template_part('assets/template-parts/see-how'); ?>

		<?php get_template_part('assets/template-parts/industries/samples-carousel'); ?>

		<?php get_template_part('assets/template-parts/contact-us'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>