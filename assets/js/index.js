

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