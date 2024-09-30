$(document).ready(function () {
	let slide = $('.work-place .slide .owl-carousel');

	slide.owlCarousel({
		loop: false,
		margin: 24,
		nav: true,
		navText: ['<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'],
		dots: false,
		autoplay: false,
		autoplayTimeout: 5000,
		responsive: {
			0: {
				items: 2
			},
			991: {
				items: 3
			},
			767: {
				items: 2
			}
		}
	});
});