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

	$('.seek-tab-menu .item .menu-title').on('click', function() {
		if (!$(this).closest('.seek-tab').hasClass('active')) {
			let tab = $(this).parent().attr('data-tab');

			$('.seek-tab').removeClass('active');
			$('.seek-tab-menu .item').removeClass('active');
			$(`.seek-tab.tab-${tab}`).addClass('active');
			$(`.seek-tab-menu .item[data-tab="${tab}"]`).addClass('active');

			$('.seek-tab-menu .item').each(function() {
				if (Number($(this).attr('data-tab')) > Number(tab)+1) {
					$(this).addClass('hide');
				}
				else {
					$(this).removeClass('hide');
				}
			});
		}
	});

	var $contents = $('.seek-tab');
    var $window = $(window);

    $window.on('scroll', function() {
        $contents.each(function(index) {
            let $currentContent = $(this);
			let currentTab = $currentContent.attr('data-tab');
            let $nextContent = $contents.eq(index + 1);
			let $menu = $(`.seek-tab-menu .item[data-tab="${currentTab}"]`);
			let $lastContent = $contents.last();
			let headerHeight = 90;

			if ($window.scrollTop() >= $lastContent.offset().top + $lastContent.outerHeight() - $window.height() + headerHeight) {
                $contents.removeClass('sticky');
				$('.seek-tab-menu .item').removeClass('sticky');
            } else {
                if ($nextContent.length) {
					let nextContentTop = $nextContent.offset().top;

					if ($window.scrollTop() >= nextContentTop - $currentContent.outerHeight() - headerHeight) {
						$currentContent.addClass('sticky');
						$menu.addClass('sticky');
					} else {
						$currentContent.removeClass('sticky');
						$menu.removeClass('sticky');
					}
				}

				if (currentTab == 3) {
					let height = calculateVerticalDistance($('.seek-tab-menu .item[data-tab="3"]'), $('.seek-tab-menu .item[data-tab="4"]'));

					$('.seek-tab-menu .item .process-line').css('height', height+'px');
				}
            }
        });
    });

	function calculateVerticalDistance($element1, $element2) {
		// Lấy tọa độ của hai phần tử
		const offset1 = $element1.offset();
		const offset2 = $element2.offset();
	
		// Tính khoảng cách theo chiều dọc (top)
		const verticalDistance = Math.abs(offset2.top - offset1.top);
	
		return verticalDistance;
	}
});