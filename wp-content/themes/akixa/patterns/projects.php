<?php

/**
 * Template Name: Dự án
 */

get_header();
$websiteName = get_bloginfo('name');
$limit = 10;
$args = array(
    'limit' => $limit
);

$products = wc_get_products($args);
$first_product = !empty($products[0]) ? $products[0] : [];
$cf_first_product = get_post_meta($first_product->id);
// echo '<pre>';print_r($first_product);exit;

$categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
	'orderby' => 'menu_order',
    'order' => 'ASC',
));
$all_category = (object) array(
    'term_id' => 0,
    'name' => 'Tất cả',
    'slug' => 'tat-ca',
);

array_unshift($categories, $all_category);

?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/projects.css?v=<?= time() ?>">

<div class="slide">
	<div class="bg-header"></div>
	<div class="content">
		<div class="owl-carousel owl-theme">
			<div>
				<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="" loading="lazy">
			</div>
			<div>
				<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="" loading="lazy">
			</div>
			<div>
				<img src="<?= get_template_directory_uri(); ?>/assets/images/home-page-bg-1.png" alt="" loading="lazy">
			</div>
		</div>
	</div>
</div>
<div class="page">
	<div class="about">
		<div class="container">
			<h3 class="block-title">
				Bạn vừa mở ra cánh cửa<br>đến không gian kiến trúc<br><span class="text-green">Vi Khí Hậu</span>
				<p class="block-desc">Không gian sống mà ở đó<br>mỗi khách hàng của <?=  $websiteName ?> đều khỏe mạnh<br>và hạnh phúc</p>
			</h3>
		</div>
	</div>
	<div class="container">
		<div class="categories margin-section">
			<div class="list-category">
				<?php if (!empty($categories)): ?>
					<?php foreach ($categories as $k => $cat): ?>
						<a class="item <?= $k ==0 ? 'active' : ''?>" href="javascript:void(0)"><?= $cat->name ?></a>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
		<div class="list-product margin-section">
			<div class="first-product product">
				<div class="image">
					<?= $first_product->get_image() ?>
					<a class="bg-detail" href="javascript:void(0)">Chi tiết</a>
				</div>
				<div class="content">
					<div>
						<h4><?= $first_product->name ?></h4>
						<ul>
							<li>Diện tích đất: <?= $cf_first_product['land_area'][0] ?></li>
							<li>Diện tích xây dựng: <?= $cf_first_product['construction_area'][0] ?></li>
						</ul>
					</div>
					<p class="short-desc"><?= nl2br($first_product->short_description) ?></p>
				</div>
			</div>
			<div class="list row mt-4">
				<?php foreach ($products as $k => $product): ?>
					<?php 
						if ($k == 0) continue;
						$cf_product = get_post_meta($product->id);
						$col = 'col-lg-4';
						if (in_array($k, [2,6])) $col = 'col-lg-8';
					?>
					<div class="item <?= $col ?> product">
						<div class="image">
							<?= $product->get_image() ?>
							<a class="bg-detail" href="javascript:void(0)">Chi tiết</a>
						</div>
						<div class="content">
							<div>
								<h4><?= $product->name ?></h4>
								<ul>
									<li>Diện tích đất: <?= $cf_product['land_area'][0] ?></li>
									<li>Diện tích xây dựng: <?= $cf_product['construction_area'][0] ?></li>
								</ul>
							</div>
							<p class="short-desc"><?= nl2br($product->short_description) ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="text-center mt-4 mb-4">
				<button class="btn btn-load-more">XEM THÊM DỰ ÁN</button>
			</div>
		</div>
	</div>
</div>
<div class="form-contact margin-section d-none d-md-flex">
	<h3 class="title">Để lại thông tin nhận<br>tư vấn miễn phí</h3>
	<form action="post">
		<div class="input">
			<input type="text" class="d-block mb-2" placeholder="Họ và tên">
		</div>
		<div class="input">
			<input type="text" class="d-block" placeholder="Số điện thoại">
		</div>
	</form>
	<button class="btn btn-success btn-explore">Gửi cho <?= $websiteName ?> <i class="fa-solid fa-angle-right"></i></button>
</div>
	
<?php
	get_footer();
?>