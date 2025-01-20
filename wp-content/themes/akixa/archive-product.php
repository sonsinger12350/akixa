<?php
	function getMinMaxPrice() {
		global $wpdb;

		$results = $wpdb->get_row("
			SELECT 
				MIN(CAST(pm.meta_value AS UNSIGNED)) AS min_price,
				MAX(CAST(pm.meta_value AS UNSIGNED)) AS max_price
			FROM {$wpdb->postmeta} pm
			JOIN {$wpdb->posts} p ON pm.post_id = p.ID
			WHERE pm.meta_key = '_price'
			AND pm.meta_value > 0
			AND p.post_type = 'product'
			AND p.post_status = 'publish'
		");

		$min_price = 0;
		$max_price = 0;

		if (!empty($results)) {
			$min_price = $results->min_price;
			$max_price = $results->max_price;
		}

		return ['min_price' => $min_price, 'max_price' => $max_price];
	} 

	$limit = 12;
	$category = !empty($_GET['type']) ? $_GET['type'] : '';
	$keyword = !empty($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';

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
		if (!empty($keyword)) $args['s'] = $keyword;
	
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

	$priceRange = getMinMaxPrice();

	$min_price = !empty(site__get('min-price')) ? site__get('min-price') : $priceRange['min_price'];
	$max_price = !empty(site__get('max-price')) ? site__get('max-price') : $priceRange['max_price'];

	$websiteName = get_bloginfo('name');

	$args = array(
		'fields' => 'ids',
		'post_type' => 'product',
		'posts_per_page' => $limit,
		'post_status' => 'publish',
	);

	if (!empty($category)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'id',
				'terms'    => array($category),
			),
		);
	}

	if (!empty($keyword)) $args['s'] = $keyword;

	$meta_query = ['relation' => 'AND'];

	if (!empty(site__get('min-price'))) {
		$meta_query[] = array(
			'key'     => '_price',
			'value'   => $min_price,
			'compare' => '>=',
			'type'    => 'NUMERIC',
		);
	}

	if (!empty(site__get('max-price'))) {
		$meta_query[] = array(
			'key'     => '_price',
			'value'   => $max_price,
			'compare' => '<=',
			'type'    => 'NUMERIC',
		);
	}

	if (!empty($meta_query)) $args['meta_query'] = $meta_query;

	$query = new WP_Query($args);
	$products = $query->posts;

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
	if (count($products) >= $limit) $showBtnLoadMore = 1;

	$slides = get_post_gallery($post->ID, false);
	if (!empty($slides)) $slides = $slides['src'];

	$categories_tree = get_product_categories_tree();
?>
<script>
	var priceRange = <?= json_encode($priceRange) ?>;
	var current_min_price = <?= $min_price ?>;
	var current_max_price = <?= $max_price ?>;
</script>

<div class="page">
	<div class="container">
		<div class="breadcrumb">
			<?= yoast_breadcrumb() ?>
		</div>
		<div class="body">
			<div class="left">
				<div class="filter filter-category">
					<p class="title">Danh mục</p>
					<ul class="product-categories">
						<?php if (!empty($categories_tree)): ?>
							<?php foreach ($categories_tree as $cat): ?>
								<li class="cat-item cat-parent">
									<div class="d-flex justify-content-between">
										<a href="<?= $cat['link'] ?>" class="link-parent"><?= $cat['name'] ?> (<?= $cat['count'] ?>)</a>
										<?php if (!empty($cat['children'])): ?>
											<span class="toggle-category"><i class="fa-solid fa-angle-down"></i></span>
										<?php endif ?>
									</div>
									<?php if (!empty($cat['children'])): ?>
										<ul class="children-categories">
											<?php foreach ($cat['children'] as $child): ?>
												<li class="cat-item cat-children">
													<a href="<?= $child['link'] ?>" class="link-children"><?= $child['name'] ?> (<?= $child['count'] ?>)</a>
												</li>
											<?php endforeach ?>
										</ul>
									<?php endif ?>
								</li>
							<?php endforeach ?>
						<?php endif ?>	
					</ul>
				</div>
				<form class="filter filter-price">
					<p class="title">Giá</p>
					<div class="widget-area filter-price-widget mb-3">
						<input type="hidden" name="min-price">
						<input type="hidden" name="max-price">
						<div id="slider-range"></div>
						<div class="range-price-show"><p>Khoảng giá:</p> <span class="min-price"><?= wc_price($priceRange['min_price']) ?></span> - <span class="max-price"><?= wc_price($priceRange['max_price']) ?></span></div>
					</div>
					<div class="text-end">
						<a class="btn btn-outline-dark me-3" href="<?= home_url('shop') ?>">Xóa bộ lọc</a>
						<button class="btn btn-dark" type="submit">Lọc</button>
					</div>
				</form>
			</div>
			<div class="right">
				<form id="search-form" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" name="keyword" value="<?= $keyword ?>" placeholder="Nhập tên sản phẩm để tìm kiếm">
						<span class="submit-search"><i class="fa-solid fa-magnifying-glass"></i></span>
					</div>
				</form>
				<div class="list-product">
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
						<?php if (!empty($keyword)): ?>
							<h4 class="text-center mb-0 mt-4">Không tìm thấy kết quả. Vui lòng sử dụng từ khóa khác</h4>
						<?php else: ?>
							<h4 class="text-center mb-0 mt-4">Chưa có dự án</h4>
						<?php endif ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	get_footer();
?>