<?php
	global $post;
	$websiteName = get_bloginfo('name');
	$title = $post->post_name == 'trang-chu' ? $websiteName : $post->post_title . ' - '.$websiteName;
	$description = get_bloginfo('description');
	$menu_locations = get_nav_menu_locations();
	$primary_menu_items = wp_get_nav_menu_items($menu_locations['primary']);
	$cssFiles = [
		'trang-chu' => get_template_directory_uri().'/assets/css/index.css?v='.time(),
		'dich-vu' => get_template_directory_uri().'/assets/css/services.css?v='.time()
	];

	$pageHeader2 = [
		'dich-vu',
		'du-an'
	];

	$isHeader2 = in_array($post->post_name, $pageHeader2) ? true : false;
	$logo = get_template_directory_uri()."/assets/images/logo.png";
	if ($isHeader2) $logo = get_template_directory_uri()."/assets/images/logo-white.png";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta name="description" content="<?= $description ?>">
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

	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css?v=<?=time()?>">
	<?php if (!empty($cssFiles[$post->post_name])): ?>
		<link rel="stylesheet" href="<?= $cssFiles[$post->post_name] ?>">
	<?php endif ?>
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/responsive.css?v=<?=time()?>">
</head>

<body>
	<header class="<?= $isHeader2 ? 'scroll-down header-2' : ''?>">
		<a class="logo d-block" href="<?= home_url() ?>">
			<img src="<?= $logo ?>" alt="<?= $websiteName ?>" data-black="<?= get_template_directory_uri(); ?>/assets/images/logo.png" data-white="<?= get_template_directory_uri(); ?>/assets/images/logo-white.png">
		</a>
		<div class="center">
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
			<?php if (!$isHeader2): ?>
				<div class="content">
					<h1 class="title">Thiết kế kiến trúc<br>vi khí hậu</h1>
					<p class="text-grey block-desc">Nơi không chỉ thiết kế những công trình kiến trúc có <b>giá trị thẩm mỹ</b> tinh tế, mà còn tạo <b>môi trường sống lí tưởng</b> cho sức khỏe thể chất và tinh thần của bạn và gia đình.</p>
				</div>
			<?php endif ?>
		</div>
		<div class="hamburger">
			<a href="javascript:void(0)" class="open-menu-desktop d-sm-flex d-none">
				<i class="fa-solid fa-bars"></i>
				<i class="fa-solid fa-xmark"></i>
			</a>
			<a href="javascript:void(0)" class="open-menu-mobile d-sm-none">
				<i class="fa-solid fa-bars"></i>
				<i class="fa-solid fa-xmark"></i>
			</a>
		</div>
		<div class="menu-collapse-mobile d-sm-none">
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