<?php
	/**
	 * Template Name: Dự án
	 */

	$limit = 11;
	if (!empty($_GET['isAjax'])) {
		$data = [
			'continue' => 0,
			'content' => '',
		];
		$offset = $_GET['offset'];

		if (!$offset) {
			wp_send_json_success($data);exit;
		}

		$args = array(
			'limit' => $limit,
			'offset' => $offset
		);
	
		$products = wc_get_products($args);

		if (empty($products)) {
			wp_send_json_success($data);exit;
		}

		$html = '';

		foreach ($products as $k => $product) {
			ob_start();
			get_template_part('template-parts/product', null, ['product' => $product]);
			$html .= ob_get_clean();
		}

		$data['continue'] = count($products) >= $limit ? 1 : 0;
		$data['content'] = $html;

		wp_send_json_success($data);
		exit;
	}

	get_header();
	$websiteName = get_bloginfo('name');
	$args = array(
		'limit' => $limit,
		'orderby' => 'menu_order',
    	'order'   => 'ASC'
	);

	$products = wc_get_products($args);
	$first_product = !empty($products[0]) ? $products[0] : [];
	$cf_first_product = get_post_meta($first_product->id);

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

	$showBtnLoadMore = 0;
	if (count($products) > $limit) $showBtnLoadMore = 1;
?>

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
						<a class="item <?= $k ==0 ? 'active' : ''?>" href="<?= home_url($cat->slug) ?>"><?= $cat->name ?></a>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
		<div class="list-product margin-section">
			<div class="first-product product">
				<div class="image">
					<?= $first_product->get_image('full') ?>
					<a class="bg-detail" href="<?= $first_product->get_permalink() ?>">Chi tiết</a>
				</div>
				<div class="content">
					<div>
						<h4><?= $first_product->name ?></h4>
						<ul>
							<li>Diện tích đất: <?= $cf_first_product['land_area'][0] ?></li>
							<li>Diện tích xây dựng: <?= $cf_first_product['construction_area'][0] ?></li>
						</ul>
					</div>
					<p class="short-desc"><?= nl2br(wp_strip_all_tags($first_product->short_description)) ?></p>
				</div>
			</div>
			<div class="list row mt-4">
				<?php foreach ($products as $k => $product): ?>
					<?php
						if ($k == 0) continue;
						get_template_part('template-parts/product', null, ['index' => $k, 'product' => $product]);
					?>
				<?php endforeach ?>
			</div>
			<? if ($showBtnLoadMore): ?>
			<div class="text-center mt-4 mb-4">
				<button class="btn btn-load-more" value="0" data-url="<?= home_url('du-an') ?>" data-limit="<?= $limit ?>">XEM THÊM DỰ ÁN</button>
			</div>
			<? endif ?>
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