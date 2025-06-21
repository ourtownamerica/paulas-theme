
/****************************************************************************
 * Initialize the animations
 ****************************************************************************/
AOS.init();


/****************************************************************************
 * Carousel of client logos
 ****************************************************************************/
(async (client_carousel)=>{
	if(!client_carousel) return;

	const logos = document.querySelectorAll('.client-logo');
	const prevBtn = document.querySelector('.logo-carousel-wrapper .carousel-nav.prev');
	const nextBtn = document.querySelector('.logo-carousel-wrapper .carousel-nav.next');

	const visibleCount = Math.floor(client_carousel.parentElement.offsetWidth / (logos[0].offsetWidth + 20));
	const totalItems = logos.length;

	// Clone first `visibleCount` logos and append them to the end
	for (let i = 0; i < visibleCount; i++) {
		const clone = logos[i].cloneNode(true);
		client_carousel.appendChild(clone);
	}

	let scrollIndex = 0;
	const itemWidth = logos[0].offsetWidth + 20;

	let nextCarousel = () => {
		scrollIndex++;
		client_carousel.style.transition = 'transform 0.5s ease';
		client_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;

		if (scrollIndex === totalItems) {
			// Reset to start instantly after transition
			setTimeout(() => {
				client_carousel.style.transition = 'none';
				scrollIndex = 0;
				client_carousel.style.transform = `translateX(0)`;
			}, 500);
		}
	};

	setInterval(nextCarousel, 3000);

	nextBtn.addEventListener('click', nextCarousel);

	prevBtn.addEventListener('click', () => {
		if (scrollIndex === 0) {
			scrollIndex = totalItems;
			client_carousel.style.transition = 'none';
			client_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
			// Force reflow before animating back
			requestAnimationFrame(() => {
				client_carousel.style.transition = 'transform 0.5s ease';
				scrollIndex--;
				client_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
			});
		} else {
			scrollIndex--;
			client_carousel.style.transition = 'transform 0.5s ease';
			client_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
		}
	});

	window.addEventListener('resize', () => {
		client_carousel.style.transition = 'none';
		client_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
	});

})(document.querySelector('.logo-carousel'));


/****************************************************************************
 * Mailings samples carousel
 ****************************************************************************/
(async (samples_carousel)=>{
	if(!samples_carousel) return;

	const samples = document.querySelectorAll('.samples-carousel-img');
	const prevBtn = document.querySelector('.samples-carousel-wrapper .carousel-nav.prev');
	const nextBtn = document.querySelector('.samples-carousel-wrapper .carousel-nav.next');

	const visibleCount = Math.floor(samples_carousel.parentElement.offsetWidth / (samples[0].offsetWidth + 20));
	const totalItems = samples.length;

	// Clone first `visibleCount` samples and append them to the end
	for (let i = 0; i < visibleCount; i++) {
		const clone = samples[i].cloneNode(true);
		samples_carousel.appendChild(clone);
	}

	let scrollIndex = 0;
	const itemWidth = samples[0].offsetWidth + 40;

	let nextCarousel = () => {
		scrollIndex++;
		samples_carousel.style.transition = 'transform 0.5s ease';
		samples_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;

		if (scrollIndex === totalItems) {
			// Reset to start instantly after transition
			setTimeout(() => {
				samples_carousel.style.transition = 'none';
				scrollIndex = 0;
				samples_carousel.style.transform = `translateX(0)`;
			}, 500);
		}
	};

	setInterval(nextCarousel, 3000);

	nextBtn.addEventListener('click', nextCarousel);

	prevBtn.addEventListener('click', () => {
		if (scrollIndex === 0) {
			scrollIndex = totalItems;
			samples_carousel.style.transition = 'none';
			samples_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
			// Force reflow before animating back
			requestAnimationFrame(() => {
				samples_carousel.style.transition = 'transform 0.5s ease';
				scrollIndex--;
				samples_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
			});
		} else {
			scrollIndex--;
			samples_carousel.style.transition = 'transform 0.5s ease';
			samples_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
		}
	});

	window.addEventListener('resize', () => {
		samples_carousel.style.transition = 'none';
		samples_carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
	});

})(document.querySelector('.samples-carousel'));


/****************************************************************************
 * "Become a Franchisee" contact form
 ****************************************************************************/
(async (forms)=>{
	forms.forEach(form=>{
		
		let submitting = false;
		let firstname = document.getElementById('zee-contact-us-form-first-name');
		let lastname = document.getElementById('zee-contact-us-form-last-name');
		let email = document.getElementById('zee-contact-us-form-email');
		let phone = document.getElementById('zee-contact-us-form-phone');
		let territory = document.getElementById('zee-contact-us-form-territory');
		let reference = document.getElementById('zee-contact-us-form-reference');
		let message = document.getElementById('zee-contact-us-form-message');

		let error_div = document.getElementById('zee-contact-us-form-error');
		let success_div = document.getElementById('zee-contact-us-form-success');

		form.addEventListener('submit', async function(e){
			e.preventDefault();
			if(submitting) return;
			submitting = true;

			error_div.classList.add('d-none');
			success_div.classList.add('d-none');

			let res = await fetch('https://rockwell.ourtownamerica.com/intra/api/website/index.php', {
				method: 'POST',
				headers: {'Content-Type': 'application/json'},
				body: JSON.stringify({
					action: "contact-zee",
					first: firstname.value.trim(),
					last: lastname.value.trim(),
					phone: phone.value.trim(),
					email: email.value.trim(),
					territory: territory.value.trim(),
					reference: reference.value.trim(),
					message: message.value.trim(),
				})
			}).then(r => r.json());
			if(res?.has_error){
				error_div.innerHTML = res.message;
				error_div.classList.remove('d-none');
				submitting = false;
			}else{
				success_div.innerHTML = `Someone will be in touch soon!`;
				success_div.classList.remove('d-none');
			}

		});


	});
})(document.querySelectorAll('form.zee-contact-us-form'));


/****************************************************************************
 * Open nav dropdowns on hover
 ****************************************************************************/
(async (dropdowns)=>{
	dropdowns.forEach(function (dropdown) {
		dropdown.addEventListener('mouseenter', function () {
			const toggle = this.querySelector('.dropdown-toggle');
			const menu = this.querySelector('.dropdown-menu');
			toggle.classList.add('show');
			menu.classList.add('show');
		});

		dropdown.addEventListener('mouseleave', function () {
			const toggle = this.querySelector('.dropdown-toggle');
			const menu = this.querySelector('.dropdown-menu');
			toggle.classList.remove('show');
			menu.classList.remove('show');
		});
	});
})(document.querySelectorAll('.topnavbar .dropdown'));


/****************************************************************************
 * Franchisee Google Map
 ****************************************************************************/
(async (zee_map)=>{
	if(!zee_map) return;

	await loadGoogleMaps();

	let map = new google.maps.Map(zee_map, {
		center: new google.maps.LatLng(39.50, -98.35),
		zoom: 4,
		zoomControl: false,
		mapTypeControl: false,
		scaleControl: false,
		streetViewControl: false,
		rotateControl: false,
		fullscreenControl: false,
		mapTypeId: google.maps.MapTypeId.STREET
	});

	let zees = await fetch('https://rockwell.ourtownamerica.com/intra/api/website/index.php', {
		method: 'POST',
		headers: {'Content-Type': 'application/json'},
		body: JSON.stringify({action: 'get_zees'})
	}).then(r => r.json());

	const formatPhoneNumber = (phone) => {
		const digits = phone.replace(/\D/g, '');
		if (digits.length !== 10) return phone;
		const area = digits.slice(0, 3);
		const prefix = digits.slice(3, 6);
		const line = digits.slice(6);
		return `(${area}) ${prefix}-${line}`;
	}

	const renderZee = zee => {
		document.getElementById('zee-display-area').innerHTML = `<p class='text-forest'><big><b>${zee.city}, ${zee.state}</b></big></p>
		<p class='text-forest mb-0'>${zee.contactfirst} ${zee.contactlast}</p>
		<a href="mailto:${zee.email}" class="mb-0 d-block mb-3 regularlink">${zee.email}</a>
		<a href="tel:+1${zee.primaryphone}" class="d-block biglink text-leaf"><b>${formatPhoneNumber(zee.primaryphone)}</b></a>`;
	};

	zees.data.forEach(zee=>{

		const marker = new google.maps.Marker({
			position: { lat: zee.latitude, lng: zee.longitude },
			map: map,
			icon: {
				url: `${wpData.templateUrl}/assets/images/map-pin.png`,
				scaledSize: new google.maps.Size(30, 30)
			}
		});

		const infoWindow = new google.maps.InfoWindow({
			content: `<b>${zee.city}, ${zee.state}</b>`
		});

		marker.addListener('mouseover', () => {
			infoWindow.open(map, marker);
		});

		marker.addListener('mouseout', () => {
			infoWindow.close();
		});

		marker.addListener('click', () => {
			renderZee(zee);
		});
	});

	const getDistance = (lat1, lon1, lat2, lon2) => {
		const R = 6371; // Radius of Earth in km
		const dLat = (lat2 - lat1) * Math.PI / 180;
		const dLon = (lon2 - lon1) * Math.PI / 180;
		const a = 
			Math.sin(dLat / 2) * Math.sin(dLat / 2) +
			Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
			Math.sin(dLon / 2) * Math.sin(dLon / 2);
		const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		return R * c; // distance in km
	};

	const getClosestZee = (lat, lng) => {
		let closest = null;
		let distance = null;
		zees.data.forEach(zee=>{
			let dist = getDistance(lat, lng, zee.latitude, zee.longitude);
			if(closest === null || distance > dist){
				distance = dist;
				closest = zee;
			}
		});
		return closest;
	};

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(position) => {
				const lat = position.coords.latitude;
				const lng = position.coords.longitude;
				renderZee(getClosestZee(lat, lng));
			},
			(error) => {
				console.error('Error getting location:', error.message);
			}
		);
	}

	document.getElementById('contact-mapform').addEventListener('submit', async function(e){
		e.preventDefault();
		let addr = document.getElementById('contact-address-input').value.trim();
		let res = await fetch('https://rockwell.ourtownamerica.com/intra/api/website/index.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/json'},
			body: JSON.stringify({action: 'geocode', location: addr})
		}).then(r => r.json());
		if(res?.data?.geocode?.formatted){
			document.getElementById('contact-address-input').value = res.data.geocode.formatted;
			renderZee(getClosestZee(res.data.geocode.lat, res.data.geocode.lng));
		}
	});
})(document.getElementById('contact-us-map'));


/****************************************************************************
 * Subscribe form in footer
 ****************************************************************************/
(async (subscribe_footer_form)=>{
	if(!subscribe_footer_form) return;

	let submitting = false;
	let error_div = document.getElementById('subscribe-footer-error');
	let success_div = document.getElementById('subscribe-footer-success');
	subscribe_footer_form.addEventListener('submit', async function(e){
		e.preventDefault();
		if(submitting) return;
		submitting = true;
		error_div.classList.add('d-none');
		success_div.classList.add('d-none');
		let email = document.getElementById('subscribe-footer-email').value.trim();
		let res = await fetch('https://robert-prod.ourtownamerica.com/intra/api/website/index.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/json'},
			body: JSON.stringify({action: 'subscribe', email})
		}).then(r => r.json());
		if(res?.has_error){
			error_div.innerHTML = res.message;
			error_div.classList.remove('d-none');
			submitting = false;
		}else{
			success_div.innerHTML = `You're subscribed!`;
			success_div.classList.remove('d-none');
		}
	});

})(document.getElementById('subscribe-footer'));


/****************************************************************************
 * Contact at us form at bottom of most pages
 ****************************************************************************/
(async (contact_us_form)=>{
	if(!contact_us_form) return;

	let submitting = false;
	let firstname = document.getElementById('contact-us-form-first-name');
	let lastname = document.getElementById('contact-us-form-last-name');
	let company = document.getElementById('contact-us-form-company-name');
	let zip = document.getElementById('contact-us-form-zip-code');
	let phone = document.getElementById('contact-us-form-phone');
	let email = document.getElementById('contact-us-form-email');
	let error_div = document.getElementById('contact-us-form-error');
	let success_div = document.getElementById('contact-us-form-success');

	contact_us_form.addEventListener('submit', async function(e){
		e.preventDefault();
		if(submitting) return;
		submitting = true;

		error_div.classList.add('d-none');
		success_div.classList.add('d-none');

		let res = await fetch('https://rockwell.ourtownamerica.com/intra/api/website/index.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/json'},
			body: JSON.stringify({
				action: "contact-lead",
				first: firstname.value.trim(),
				last: lastname.value.trim(),
				company: company.value.trim(),
				zip: zip.value.trim(),
				phone: phone.value.trim(),
				email: email.value.trim()
			})
		}).then(r => r.json());
		if(res?.has_error){
			error_div.innerHTML = res.message;
			error_div.classList.remove('d-none');
			submitting = false;
		}else{
			success_div.innerHTML = `Someone will be in touch soon!`;
			success_div.classList.remove('d-none');
		}

	});
})(document.getElementById('contact-us-form'));


/****************************************************************************
 * Helper function to load Google Maps if it is not loaded yet
 ****************************************************************************/
async function loadGoogleMaps() {
	if (document.getElementById('google-maps-script')) return;

	const script = document.createElement('script');
	script.id = 'google-maps-script';
	script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDOt7i0oBD4X7Rza4NLu9XcaS5SV0vhZQI';
	script.async = true;
	script.defer = true;

	document.head.appendChild(script);

	// Wait until the script loads
	return new Promise((resolve, reject) => {
		script.onload = () => resolve();
		script.onerror = () => reject(new Error('Failed to load Google Maps script'));
	});
}


/****************************************************************************
 * Reviews carousel
 ****************************************************************************/
(async (review_carousel_track)=>{
	if(!review_carousel_track) return;

	// Load jQuery... yes, we need jQuery for this
	const $ = await new Promise(jQuery);

	$(review_carousel_track).slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		centerMode: false,
		prevArrow: `<span class='slick-prev text-forest'><i class="fas fa-chevron-left"></i></span>`,
		nextArrow: `<span class='slick-next text-forest'><i class="fas fa-chevron-right"></i></span>`,
		responsive: [{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},{
			breakpoint: 600,
			settings: {
				slidesToShow: 2
			}
		},{
			breakpoint: 480,
			settings: {
				slidesToShow: 1
			}
		}]
	});

	// Refresh the animations library since the dom has changed
	AOS.refresh();

})(document.getElementById('review-carousel-track'));


/****************************************************************************
 * Media Kit Form
 ****************************************************************************/
(async (contact_us_form)=>{
	if(!contact_us_form) return;

	let submitting = false;
	let firstname = document.getElementById('mk-contact-us-form-first-name');
	let lastname = document.getElementById('mk-contact-us-form-last-name');
	let email = document.getElementById('mk-contact-us-form-email');
	let error_div = document.getElementById('mk-contact-us-form-error');

	let main_div = document.querySelector('.media-kit-main');
	let form_div = document.querySelector('#contact-us-media-kit');
	let download_div = document.querySelector('.media-kit-download');

	contact_us_form.addEventListener('submit', async function(e){
		e.preventDefault();
		if(submitting) return;
		submitting = true;

		error_div.classList.add('d-none');

		let res = await fetch('https://robert-prod.ourtownamerica.com/intra/api/website/index.php', {
			method: 'POST',
			headers: {'Content-Type': 'application/json'},
			body: JSON.stringify({
				action: 'media-kit', 
				email: email.value.trim(), 
				firstname: firstname.value.trim(), 
				lastname: lastname.value.trim()
			})
		}).then(r => r.json());
		if(res?.has_error){
			error_div.innerHTML = res.message;
			error_div.classList.remove('d-none');
			submitting = false;
		}else{
			main_div.classList.add('d-none');
			form_div.classList.add('d-none');
			download_div.classList.remove('d-none');
		}

	});

})(document.getElementById('mk-contact-us-form'));
