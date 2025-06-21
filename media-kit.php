<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Our Town America &centerdot; Media Kit</title>
		<?php wp_head(); ?>
	</head>
	<body class="pt">

		<?php get_template_part('assets/template-parts/top-nav'); ?>

		<?php get_template_part('assets/template-parts/media-kit/main'); ?>

		<?php get_template_part('assets/template-parts/contact-us/media-kit'); ?>

		<?php get_template_part('assets/template-parts/media-kit/download'); ?>

		<?php get_template_part('assets/template-parts/footer-nav'); ?>

		<?php wp_footer(); ?>

	</body>
</html>