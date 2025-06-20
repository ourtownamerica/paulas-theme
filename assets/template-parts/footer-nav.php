<div class="footer-nav p-3 pt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo get_template_directory_uri()."/assets/images/logo-white.png"; ?>" />
			</div>
			<div class="col-md-6">
				<div class="text-center mb-2">
					Subscribe to our newsletter<br />and get notified about our latest news and updates
				</div>
				<form id="subscribe-footer">
					<div class="alert alert-danger d-none" id="subscribe-footer-error"></div>
					<div class="alert alert-success d-none" id="subscribe-footer-success"></div>
					<div class="input-group mb-3">
						<input id='subscribe-footer-email' type="text" class="form-control" placeholder="Your Email" aria-label="Your Email" aria-describedby="subscribe-addon-btn">
						<button class="btn btn-gold" type="submit" id="subscribe-addon-btn">Subscribe</button>
					</div>
				</form>
			</div>
		</div>
		<hr class="white-hr" />
		<div class="row">
			<div class="col-md-3">
				<b class="d-block mb-2">SERVICES</b>
				<a class="d-block mb-2" href="<?php echo home_url('/new-mover-marketing'); ?>">New Mover Marketing</a>
				<a class="d-block mb-2" href="<?php echo home_url('/birthday-program'); ?>">Birthday Program</a>
				<a class="d-block mb-2" href="<?php echo home_url('/every-door-direct-mail'); ?>">EDDM Postcard</a>
				<a class="d-block mb-2" href="<?php echo home_url('/targeted-postcard'); ?>">Targeted Postcard</a>
				<a class="d-block mb-4" href="<?php echo home_url('/digital-marketing'); ?>">Digital Marketing</a>

				<a class="d-block mb-4" href="<?php echo home_url('/about'); ?>"><b class="d-block">ABOUT US</b></a>
			</div>
			<div class="col-md-3">
				<b class="d-block mb-2">INDUSTRY FOCUS</b>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/automotive/'); ?>">Automotive</a>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/dental/'); ?>">Dental</a>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/hair-salons/'); ?>">Hair Salons</a>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/pet-care/'); ?>">Pet Care</a>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/pizzarias/'); ?>">Pizzarias</a>
				<a class="d-block mb-2" href="<?php echo home_url('/industries/supermarket/'); ?>">Supermarket</a>
				<a class="d-block mb-4" href="<?php echo home_url('/industries'); ?>">...And More</a>
			</div>
			<div class="col-md-3">
				<b class="d-block mb-2">FRANCHISE</b>
				<a class="d-block mb-2" href="<?php echo home_url('/franchise'); ?>">Become a Franchisee</a>
				<a class="d-block mb-2" href="https://rockwell.ourtownamerica.com/intra/">Franchise Intranet</a>
				<a class="d-block mb-4" href="<?php echo home_url('/channel-partner'); ?>">Channel Partner</a>

				<b class="d-block mb-2">RESOURCES</b>
				<a class="d-block mb-2" href="<?php echo home_url('/testimonials'); ?>">Testimonials</a>
				<a class="d-block mb-2" href="<?php echo home_url('/case-studies'); ?>">Case Studies</a>
				<a class="d-block mb-2" href="<?php echo home_url('/events'); ?>">Events</a>
				<a class="d-block mb-2" href="<?php echo home_url('/in-the-news'); ?>">In the News</a>
				<a class="d-block mb-2" href="<?php echo home_url('/blog'); ?>">Blog</a>
				<a class="d-block mb-4" href="<?php echo home_url('/survey'); ?>">New Mover Survey</a>
			</div>
			<div class="col-md-3">
				<b class="d-block mb-2">CONTACT US</b>
				<a class="d-block mb-2" href="<?php echo home_url('/contact-us'); ?>">Corporate</a>
				<a class="d-block mb-4" href="<?php echo home_url('/advertise-local'); ?>">Your Local Franchise</a>

				<span class="d-block mb-4">13900 US 19 North,<br>Clearwater, FL 33764</span>

				<a href="tel:+18004978360" class="d-block mb-4"><span class="text-gold text-lg"><big><b>800-497-8360</b></big></span></a>

				<b class="d-block mb-2">CONNECT WITH US</b>

				<a href="https://www.facebook.com/OurTownAmericaofTampaBay/" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-facebook.png"; ?>" /></a>
				<a href="https://www.instagram.com/ourtownamerica/" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-insta.png"; ?>" /></a>
				<a href="https://x.com/OurTownAmerica" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-x.png"; ?>" /></a>
				<a href="https://www.linkedin.com/company/ourtown-america-inc-/" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-linkedin.png"; ?>" /></a>
				<a href="https://www.youtube.com/ourtownamerica" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-youtube.png"; ?>" /></a>
				<a href="https://www.google.com/search?q=our+town+america" class="d-inline-block"><img src="<?php echo get_template_directory_uri()."/assets/images/contact-us-google.png"; ?>" /></a>
			</div>
		</div>
		<div >
			<small class="float-start text-start">
				&copy <?php echo date('Y'); ?> Our Town America | All Rights Reserved
			</small>
			<small class="float-end text-end">
				<a href="<?php echo home_url('/privacy-policy'); ?>">Privacy Policy</a>
			</small>
			<div class="clearfix"></div>
		</div>
	</div>
</div>