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

	$('.open-menu-mobile').on('click', function() {
		$(this).toggleClass('active');
		$('.menu-collapse-mobile').toggleClass('active');
	});

	$('.open-menu-desktop').on('click', function() {
		$(this).toggleClass('active');
		$('.main-menu').toggleClass('active');

		if ($('header .content').hasClass('d-none')) {
			setTimeout(() => {
				$('header .content').toggleClass('d-none');
			}, 300);
		}
		else {
			$('header .content').toggleClass('d-none');
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
					let height = seekTabHeight();
					let lastElementHeight = $('.seek-tab.tab-3').outerHeight();
					let nextHeight = 120-Math.round(height*100/lastElementHeight)+'%';

					$('.seek-tab-menu .item .process-line').css('height', nextHeight);
				}
            }
        });
    });
	function seekTabHeight() {
		let $lastElement = $('.seek-tab.tab-4');
		let windowHeight = $(window).height();
		let lastElementOffsetTop = $lastElement.offset().top;
		let scrollTop = $(window).scrollTop();
		let lastElementHeight = $lastElement.outerHeight();
		let visibleHeight = Math.min(windowHeight, lastElementOffsetTop + lastElementHeight - scrollTop) - Math.max(0, lastElementOffsetTop - scrollTop);

		return Math.max(0, Math.min(visibleHeight, lastElementHeight));
	}
});