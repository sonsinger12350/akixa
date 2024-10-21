<?php
	/**
	 * Template Name: Dự án
	 */

	$limit = 11;
	$category = !empty($_GET['type']) ? $_GET['type'] : '';

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
		if (!empty($category)) $args['category'] = [$category];
	
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
	if (!empty($category)) $args['category'] = [$category];

	$products = wc_get_products($args);

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

	$slides = get_post_gallery($post->ID, false);
	if (!empty($slides)) $slides = $slides['src'];
?>

<div class="slide">
	<div class="bg-header"></div>
	<div class="content">
		<?php if (!empty($slides)): ?>
			<div class="owl-carousel owl-theme">
				<?php foreach ($slides as $k => $v): ?>
					<div><img src="<?= $v ?>" alt="slide-<?= $k ?>" loading="lazy"></div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
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
					<?php 
						foreach ($categories as $k => $cat): 

						if ($cat->slug == 'tat-ca') {
							$cat->slug = '';
							$url = home_url('du-an');
						} 
						else {
							$url = home_url('du-an').'?type='.$cat->slug;
						}
						
					?>
						<a class="item <?= $cat->slug == $category ? 'active' : ''?>" href="<?= $url ?>"><?= $cat->name ?></a>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
		<div class="list-product margin-section">
			<?php if (!empty($products)): ?>
				<div class="list row mt-4">
					<?php foreach ($products as $k => $product): ?>
						<?php
							get_template_part('template-parts/product', null, ['index' => $k, 'product' => $product]);
						?>
					<?php endforeach ?>
				</div>
				<?php if ($showBtnLoadMore): ?>
					<div class="text-center mt-4 mb-4">
						<button class="btn btn-load-more" value="0" data-url="<?= home_url('du-an') ?>" data-limit="<?= $limit ?>">XEM THÊM DỰ ÁN</button>
					</div>
				<?php endif ?>
			<?php else: ?>
				<p class="text-center mb-0">Chưa có dự án</p>
			<?php endif ?>	
		</div>
	</div>
</div>
<div class="form-contact margin-section d-none d-md-flex">
	<h3 class="title">Để lại thông tin nhận<br>tư vấn miễn phí</h3>
	<form id="contactForm" action="post" enctype="multipart/form-data" novalidate>
		<input type="hidden" name="type" value="get-advice">
		<div class="input">
			<input type="text" class="d-block mb-2" name="full_name" placeholder="Họ và tên" required>
		</div>
		<div class="input">
			<input type="text" class="d-block" name="phone" placeholder="Số điện thoại" required>
		</div>
	</form>
	<button class="btn btn-success btn-explore" type="submit" form="contactForm">Gửi cho <?= $websiteName ?> <i class="fa-solid fa-angle-right"></i></button>
</div>
	
<?php
	get_footer();
?>