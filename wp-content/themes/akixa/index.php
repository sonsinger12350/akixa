<?php
	$menu_locations = get_nav_menu_locations();
	$primary_menu_items = wp_get_nav_menu_items($menu_locations['primary']);
	
	$seekTabs = [
		1 => [
			'desc1' => 'Kiến trúc từ thiên nhiên, kiến trúc từ khí hậu hay theo sân vườn, biệt thự... có phải tất cả đều ở trong những quy luật thiết kế bao la và cần định nghĩa theo cách riêng?',
			'desc2' => 'Con người - một bản thể vốn được vận hành đồng điệu với thiên nhiên. Vậy nên việc nghiên cứu và ứng dụng các yếu tố ánh sáng, không khí, nhiệt độ, âm thanh... vào không gian sống sẽ tác động tích cực đến sức khỏe của chúng ta.',
		],
		2 => [
			'desc1' => 'Trái Đất gieo mầm cho các khu vực với khí hậu khác nhau từ đất đai, độ ẩm và không khí riêng biệt. Vậy “sự sống” sẽ thay đổi như thế nào ở mỗi khu vực?',
			'desc2' => 'Hành trình sống của chúng ta giống như gieo trồng một cái cây, thu hoạch quả ngọt hay đắng còn tùy thuộc và hạt mầm và cách ta chăm sóc nó. Để gieo những hạt mầm tích cực đầu tiên cho không gian sống của bạn - Hãy để AKIXA song hành nhé!',
		],
		3 => [
			'desc1' => 'Sự tỏa sáng của Mặt trời, Mặt trăng hay các Ngôi sao...như gửi tới thông điệp “luôn có ánh sáng phía cuối con đường – chỉ cần có niềm tin và hành động là sẽ thấy”.',
			'desc2' => 'AKIXA tin rằng khi bạn hiểu mình, hiểu sứ mệnh, năng lượng tiềm ẩn bên trong cũng như kiên trì ươm mầm cho không gian sống, rồi sẽ đến lúc nơi đó tỏa sáng với vầng hào quang rực rỡ nhất.',
		],
		4 => [
			'desc1' => 'Bạn có biết: Vũ trụ không bao giờ đứng yên mà luôn luôn thay đổi, cũng như chúng ta luôn luôn vận động để trở thành phiên bản tốt nhất - chuyển hóa theo hướng tích cực và lan tỏa năng lượng tới mọi người.',
			'desc2' => '“Hành trình vạn dặm bắt đầu từ một bước chân”, nếu bạn chưa biết nên bắt đầu từ đâu, thì AKIXA luôn ở đây lắng nghe và đồng hành cùng bạn dựng xây những nét vẽ, viên gạch đầu tiên cho không gian sống an hòa của bạn.',
		]
	];

	$seekTabsMenu = [
		1 => 'Khai phá',
		2 => 'Ươm mầm',
		3 => 'Tỏa sáng',
		4 => 'Sẻ chia',
	];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Akixa</title>
	<link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/assets/images/logo.png" sizes=32x32/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<!-- OwlCarousel2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

	<title>Document</title>
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css?v=<?=time()?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/responsive.css?v=<?=time()?>">
	<style>
		.body .seek-tabs .content .seek-tab.tab-1 .left {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/seak-tab-1.png");
		}

		.body .seek-tabs .content .seek-tab.tab-2 .left {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/seak-tab-2.png");
		}

		.body .seek-tabs .content .seek-tab.tab-3 .left {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/seak-tab-3.png");
		}

		.body .seek-tabs .content .seek-tab.tab-4 .left {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/seak-tab-4.png");
		}

		.body .invitation {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/invitation.png");
		}
	</style>
</head>

<body>
	<header>
		<div class="logo">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
		</div>
		<div class="main-menu">
			<?php
				wp_nav_menu(
					array(
						'container'  => '',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'theme_location' => 'primary',
					)
				);
			?>
		</div>
		<div class="menu-mobile">
			<a href="javascript:void(0)" class="open-menu-mobile d-lg-none">
				<i class="fa-solid fa-bars"></i>
			</a>
		</div>
		<div class="menu-collapse">
			<div class="card card-body">
				<?php
					wp_nav_menu(
						array(
							'container'  => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'theme_location' => 'primary',
						)
					);
				?>
			</div>
		</div>
	</header>
	<div class="page container-fluid">
		<div class="body">
			<div class="header container">
				<div class="head">
					<h1 class="title">Thiết kế kiến trúc vi khí hậu</h1>
					<p class="text-grey">Nơi không chỉ thiết kế những công trình kiến trúc có giá trị thẩm mỹ tinh tế, mà còn tạo môi trường sống lí tưởng cho sức khỏe thể chất và tinh thần của bạn và gia đình.</p>
				</div>
			</div>
			<div class="slide position-relative">
				<div class="owl-carousel owl-theme">
					<div>
						<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="">
					</div>
					<div>
						<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="">
					</div>
					<div>
						<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="">
					</div>
				</div>
				<button type="button" class="btn btn-success btn-sm btn-explore">KHÁM PHÁ AKIXA <i class="fa-solid fa-angle-right"></i></button>
			</div>
			<div class="about margin-section">
				<h3 class="flex-1">Nền tảng thiết kế <span class="text-green">vì sức khỏe</span> của bạn và gia đình.</h3>
				<div class="flex-1 content bullet-point">
					<p>Với AKIXA, kiến trúc là phải hòa hợp với thiên nhiên và con người; hình thức bên ngoài chịu ảnh hưởng bởi địa hình; khí hậu, tính bản địa; hình thức bên trong ảnh hưởng nhiều bởi nhu cầu tiện nghi của con người gồm nhiệt độ, độ ẩm, âm thanh, ánh sáng; Và người kiến trúc sư muốn tạo ra được hình thức công trình thì bắt buộc phải giải quyết các vấn đề nảy sinh của bối cảnh khu đất và nhu cầu sử dụng;</p>
					<button type="button" class="btn btn-success btn-sm btn-explore">KHÁM PHÁ AKIXA <i class="fa-solid fa-angle-right"></i></button>
				</div>
			</div>
			<div class="project margin-section">
				<div class="project-gallery">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-1.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-2.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-3.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-4.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-5.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-6.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-7.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-8.png" alt="">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-9.png" alt="">
				</div>
				<div class="content">
					<h3>Cùng khám phá những <span class="text-green">dự án tuyệt vời</span> mà chúng tôi đã đồng hành.</h3>
					<div class="detail bullet-point">
						<p class="text-grey">Ngôi nhà của chúng ta không chỉ dừng lại là một nơi để ở. Với triết lý ”Kiến trúc vi khí hậu - Thiết kế kiến trúc phải kết hợp nghệ thuật và khoa học thực tiễn” chúng tôi mong muốn mọi công trình kiến trúc của mình sẽ giúp bạn hạnh phúc cả về tinh thần và thể chất. Đó cũng chính là điều khiến AKIXA trở nên độc đáo và đặc biệt.</p>
						<p class="text-grey mb-4">Chúng tôi tin rằng, người kể truyện không chỉ đến từ AKIXA. Hãy cùng khám phá những dự án tuyệt vời mà chúng tôi đã cùng đồng hành.</p>
						<button type="button" class="btn btn-success btn-sm btn-explore">KHÁM PHÁ AKIXA <i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
			</div>
			<div class="seek-tabs margin-section">
				<div class="head d-flex justify-content-between mb-4">
					<div class="left">HÀNH TRÌNH<br>CỦA THIÊN NHIÊN</div>
					<div class="center d-flex justify-content-center">
						<div class="d-flex align-items-center">
							<span class="border-left"></span>
							<p>SONG HÀNH</p>
							<span class="border-right"></span>
						</div>
					</div>
					<div class="right">CÙNG HÀNH TRÌNH<br>CỦA BẠN</div>
				</div>
				<div class="content">
					<div class="position-relative">
						<?php foreach ($seekTabs as $k => $tab):?>
							<div class="seek-tab tab-<?=$k?> <?= $k == 1 ? 'active' : ''?>">
								<div class="left">
									<p class="title">Hành trình<br>của thiên nhiên</p>
									<p class="desc"><?=$tab['desc1']?></p>
								</div>
								<div class="right">
									<p class="title">Hành trình<br>của bạn</p>
									<p class="desc"><?=$tab['desc2']?></p>
								</div>
							</div>
						<?php endforeach?>
						<div class="seek-tab-menu">
							<?php foreach ($seekTabsMenu as $k => $v):?>
								<div class="item <?= $k == 1 ? 'active' : ''?>" data-tab="<?=$k?>">
									<p class="menu-title"><?=$v?></p>
									<p class="dot"><span></span></p>
								</div>
							<?php endforeach?>
						</div>
						<div class="bg-overlay"></div>
					</div>
				</div>
			</div>
			<div class="invitation margin-section">
				<p class="title">Hãy để <span class="text-green">AKIXA</span><br>trở thành người đồng hành<br>trong hành trình của bạn!</p>
				<div class="position-relative">
					<div class="bullet-point">
						<div class="content">
							<p>Vì cuộc đời là của chính mình, nên hãy trải nghiệm sự khác biệt, để nâng cao bản thân mình lên một tầng cao mới, cùng <b>thiết kế kiến trúc vi khí hậu đến từ AKIXA.</b></p>
							<button type="button" class="btn btn-success btn-sm btn-explore">KHÁM PHÁ AKIXA <i class="fa-solid fa-angle-right"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-content">
			<div class="logo">
				<img src="<?= get_template_directory_uri(); ?>/assets/images/logo_white.png" alt="">
			</div>
			<div class="content">
				<div class="menu-footer">
					<div class="d-flex justify-content-between align-items-start">
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Về Akixa</p>
								<a href="#">Thông điệp nhà sáng lập</a>
								<a href="#">Tầm nhìn - Sứ mệnh</a>
								<a href="#">Đội ngũ</a>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Dịch vụ</p>
								<a href="#">Thiết kế vi khi hậu</a>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Dự án</p>
								<a href="#">Thiết kế sân vườn</a>
								<a href="#">Thiết kế nhà 1 tầng</a>
								<a href="#">Thiết kế nhà 2 tầng</a>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Tin tức</p>
								<a href="#">Blog</a>
								<a href="#">Tuyển dụng</a>
							</div>
						</div>
						<button type="button" class="btn btn-success btn-sm btn-explore">ĐĂNG KÝ <i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
				<hr class="text-green">
				<div class="info">
					<div class="d-flex justify-content-between align-items-end">
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">CÔNG TY CỔ PHẦN TOKI</p>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Văn phòng Hà Nội</p>
								<a href="#">DM5-12A Vạn Phúc - Hà Đông - Hà Nội</a>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Văn phòng Đà Nẵng</p>
								<a href="#">B3.11-16 Trương Minh Giảng - KĐT Phú Mỹ An - Hòa Hải - Ngũ Hành Sơn - Đà Nẵng</a>
							</div>
							<div class="col-lg-3 col-sm-6">
								<p class="fw-bold">Kết nối với chúng tôi</p>
								<a href="tel: 0988870288">Hotline: 0988 870 288</a>
							</div>
						</div>
						<div class="social-icon gap-3">
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/zalo-logo.png" alt="Zalo">
							</a>
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/facebook-logo.png" alt="Zalo">
							</a>
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/youtube-logo.png" alt="Zalo">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right d-flex justify-content-between gap-3">
			<p>AKIXA © 2024, All Rights Reserved</p>
			<p>Designed by DuocViec Agency</p>
		</div>
	</footer>
</body>
<script src="<?= get_template_directory_uri(); ?>/assets/js/index.js?v=<?=time()?>"></script>

</html>