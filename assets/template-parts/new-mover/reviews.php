<div class="why-nmm p-3 yellow-side-bg-right pt-5">
	<div class="container">
		<h6 class="sm-header text-center">WHAT CONSUMERS SAY</h6>
		<h1 class="text-forest mx-auto short-header text-center">New Mover Envelops That Make a Great First Impression</h1>
		
		<?php
			$reviews = json_decode('[
				{
					"review": "I felt so welcomed when my partner and I received this welcome gift packet! This will give us a chance to explore our new city and see what it has to offer.",
					"author": "Dom Brown"
				},
				{
					"review": "New mover marketing is a great service to get people who have just moved into a new area, plugged in with the community and local businesses. Also a great opportunity for businesses to advertise.",
					"author": "Jenny Jagard"
				},
				{
					"review": "I received a very thoughtful package of coupons when I moved into my new apartment & I used the free pizza coupon on a night that I didn’t have anything to cook. It was very thoughtful!",
					"author": "Audrey Angstrom"
				},
				{
					"review": "The new movers package made me even more in love with Temecula. I feel like they really took their time with it! Even the envelope itself! I really appreciated the discounts it gave! It definitely helps after a new move! Also we much appreciate the certificate that was given!",
					"author": "Jessica Rangel"
				},
				{
					"review": "This was such a wonderful surprise after moving into our new home. We discovered a great local bakery and even got a free loaf of sourdough. What a great way to feel welcomed!",
					"author": "Marie Sandoval"
				},
				{
					"review": "As a small business owner, I’ve seen real results from sponsoring the new mover program. It brings in new customers we might not have reached otherwise.",
					"author": "Kyle Mendez"
				},
				{
					"review": "Moving is expensive, so getting a packet full of discounts and gift certificates was incredibly helpful. We’ve already used several and plan to try more!",
					"author": "Rachel Liu"
				},
				{
					"review": "The new mover program has become a core part of our local marketing strategy. It’s targeted, affordable, and brings in high-quality foot traffic.",
					"author": "Sandra Everett"
				},
				{
					"review": "It felt like the community rolled out the red carpet for us! We got to try a few local restaurants right away and even found a great pet groomer through the coupons.",
					"author": "Anthony Rivera"
				},
				{
					"review": "I moved into town with my family and we were overwhelmed at first. Getting this envelope of local offers helped us feel like part of the community within days.",
					"author": "Joanne Keller"
				},
				{
					"review": "This program is genius. Our coffee shop saw a 20% increase in new customers during our first month participating. We\'ll definitely renew!",
					"author": "Dylan Tran"
				},
				{
					"review": "I had no idea this kind of thing even existed! The discounts made a big difference as we were settling in, and we discovered some really charming local shops too.",
					"author": "Marisol Gomez"
				},
				{
					"review": "Sponsoring the welcome package has been one of our best outreach efforts. It’s cost-effective and builds real community goodwill.",
					"author": "Eric LaMont"
				},
				{
					"review": "Our real estate agent handed us this welcome envelope and it instantly made us feel at home. We’ve been exploring the town through these offers ever since.",
					"author": "Natalie Kim"
				}
			]');
		?>

		<div id="review-carousel-track">
			<?php foreach($reviews as $review): ?>
				<div class="review-card-item p-3">
					<div class="mb-3"><img src='<?php echo get_template_directory_uri()."/assets/images/quote.png"; ?>' /></div>
					<p><?php echo $review->review; ?></p>
					<b>- <?php echo $review->author; ?></b>
				</div>
			<?php endforeach; ?>
		</div>



	</div>
</div>