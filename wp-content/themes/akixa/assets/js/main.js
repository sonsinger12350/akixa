$(document).ready(function () {
	$('.open-menu-mobile').on('click', function() {
		$(this).toggleClass('active');
		$('.menu-collapse-mobile').toggleClass('active');
	});

	$('.open-menu-desktop').on('click', function() {
		$(this).toggleClass('active');
		$('.main-menu').toggleClass('active');
		$('header').toggleClass('active-menu');

		if ($('header .content').hasClass('d-none')) {
			setTimeout(() => {
				$('header .content').toggleClass('d-none');
			}, 500);
		}
		else $('header .content').toggleClass('d-none');
		
		if ($('header').hasClass('scroll-down')) {
			if ($('header').hasClass('active-menu')) $('header .logo img').attr('src', $('header .logo img').attr('data-black'));
			else $('header .logo img').attr('src', $('header .logo img').attr('data-white'));
		}

		activeMenu();
	});

	var $window = $(window);

	if (screen.width > 576) {
		$window.on('scroll', function() {
			if ($(window).scrollTop() > 100) {
				$('header').addClass('scroll-down');

				if (!$('header').hasClass('active-menu')) {
					$('.open-menu-desktop').click();
				}
			}
			else {
				if ($('header').hasClass('scroll-down')) {
					$('header').removeClass('scroll-down');
				}

				if ($('header').hasClass('active-menu')) {
					$('.open-menu-desktop').click();
				}
			}
	
			activeMenu();
		});
	}
	else {
		$('header').addClass('scroll-down');
		activeMenu();
	}

	function activeMenu() {
		if ($('header').hasClass('active-menu')) {
			$('header .logo img').attr('src', $('header .logo img').attr('data-black'));
		} 
		else {
			if ($('header').hasClass('header-2')) {
				$('header .logo img').attr('src', $('header .logo img').attr('data-white'));
			}
			else {
				if ($('header').hasClass('scroll-down')) {
					$('header .logo img').attr('src', $('header .logo img').attr('data-white'));
				}
				else {
					$('header .logo img').attr('src', $('header .logo img').attr('data-black'));
				}
			}
		}
	}
});