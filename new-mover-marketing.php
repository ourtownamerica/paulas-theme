<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Home</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/new-mover/main'); ?>

		<?php get_template_part('assets/template-parts/new-mover/overview'); ?>

		<?php get_template_part('assets/template-parts/new-mover/why'); ?>

		<?php get_template_part('assets/template-parts/new-mover/features'); ?>

		<?php get_template_part('assets/template-parts/see-how'); ?>

		<?php get_template_part('assets/template-parts/new-mover/reviews'); ?>

		<?php get_template_part('assets/template-parts/contact-us/contact-us'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

		
	</body>
</html>