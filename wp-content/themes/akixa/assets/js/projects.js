$(document).ready(function () {
	let slide = $('.slide .owl-carousel');
	slide.on('initialized.owl.carousel', function(event) {
		$('.bg-blur-mobile').appendTo('.slide .owl-carousel');
	});
	slide.owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		navText: ['<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'],
		dots: true,
		autoplay: true,
		autoplayTimeout: 5000,
		responsive: {
			0: {
				items: 1
			}
		}
	});
});