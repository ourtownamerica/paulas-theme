<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Industries</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/industries/industries'); ?>

		<?php get_template_part('assets/template-parts/contact-us'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>