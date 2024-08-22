$(document).ready(function () {
	$('.owl-carousel').owlCarousel({
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

	$('.seek-tab-menu .item .menu-title').on('click', function() {
		if (!$(this).closest('.seek-tab').hasClass('active')) {
			let tab = $(this).parent().attr('data-tab');

			$('.seek-tab').removeClass('active');
			$('.seek-tab-menu .item').removeClass('active');
			$(`.seek-tab.tab-${tab}`).addClass('active');
			$(`.seek-tab-menu .item[data-tab="${tab}"]`).addClass('active');
		}
	});

	$('.open-menu-mobile').on('click', function() {
		$('.menu-collapse').toggleClass('show');
	});
});