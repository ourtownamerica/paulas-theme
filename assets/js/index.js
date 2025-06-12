

AOS.init();

const client_carousel = document.querySelector('.logo-carousel');
if(client_carousel){
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
}

const samples_carousel = document.querySelector('.samples-carousel');
if(samples_carousel){
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
}



document.querySelectorAll('form.contact-us-form').forEach(form=>{
	form.addEventListener('submit', e=>{
		e.preventDefault();
		alert('not implemented');
	});
});

document.querySelectorAll('.topnavbar .dropdown').forEach(function (dropdown) {
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

// Contact us map
let zee_map = document.getElementById('contact-us-map');
if(zee_map) (async ()=>{

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

})();

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

const review_carousel_track = document.getElementById('review-carousel-track');
if(review_carousel_track) jQuery(function($) {
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

	AOS.refresh();
});
