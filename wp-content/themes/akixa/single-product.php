<?php

	/**
	 * Template Name: Dự án
	 */

	get_header();

	$websiteName = get_bloginfo('name');
	$product_id = get_the_ID();
	$product = wc_get_product( $product_id );
	$images = [];

	if (!empty($product->gallery_image_ids)) {
		foreach ( $product->gallery_image_ids as $image_id ) {
			$images[] = wp_get_attachment_url( $image_id );
		}
	}

	$category_ids = $product->get_category_ids();
	$category = !empty($category_ids[0]) ? get_term( $category_ids[0], 'product_cat' ) : [];
	$cf_data = get_post_meta($product->id);
	$cf_product = array_map(function($value) {
		return $value[0];
	}, $cf_data);
	$args = array(
        'post_type' => 'product',
        'posts_per_page' => 4, // Giới hạn số lượng sản phẩm lấy ra
        'post__not_in' => array( $product_id ), // Loại trừ sản phẩm hiện tại
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $category_ids,
                'operator' => 'IN',
            ),
        ),
    );
	$related_products = new WP_Query( $args );
	$description = nl2br($product->description);
?>

<div class="page">
	<div class="product-info">
		<div class="left">
			<div class="content">
				<h1 class="block-title"><?= $product->name?></h1>
				<?php if (!empty($category)): ?>
					<div class="category">
						<p class="mb-0 title">Loại công trình</p>
						<p class="mb-0 info"><?= $category->name ?></p>
					</div>
				<?php endif ?>
				<div class="complete-time">
					<p class="mb-0 title">Thời gian hoàn thành</p>
					<p class="mb-0 info"><?= $cf_product['complete_time'] ?></p>
				</div>
			</div>
			<div class="slide">
				<?php if (!empty($images)): ?>
					<div class="owl-carousel owl-theme position-relative">
						<?php foreach ($images as $k => $image): ?>
							<a data-fancybox="gallery" href="<?= $image ?>"><img src="<?= $image ?>" alt="slide-<?= $k ?>" loading="lazy"></a>
						<?php endforeach ?>
					</div>
					<span class="owl-dot-number"></span>
				<?php endif ?>
			</div>
		</div>
		<div class="right">
			<div class="list-image custom-scrollbar">
				<?php if (!empty($images)): ?>
					<?php foreach ($images as $k => $image): ?>
						<div class="item gallery-<?= $k+1 ?>" data-slide="<?= $k ?>"><img src="<?= $image ?>" alt="gallery-<?= $k ?>" loading="lazy"></div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="product-content margin-section">
		<div class="left">
			<div class="general-info">
				<h3 class="block-title">Thông tin dự án</h3>
				<div class="detail">
					<p class="title">Địa điểm</p>
					<p class="mb-0 info"><?= $cf_product['address'] ?></p>
				</div>
				<div class="detail">
					<p class="title">Diện tích đất</p>
					<p class="mb-0 info"><?= $cf_product['land_area'] ?></p>
				</div>
				<div class="detail">
					<p class="title">Diện tích xây dựng</p>
					<p class="mb-0 info"><?= $cf_product['construction_area'] ?></p>
				</div>
			</div>
			<div class="hr"></div>
			<div class="product-description">
				<?= $description ?>
			</div>
		</div>
		<div class="right">
			<div class="contact">
				<h5 class="title">Bạn thích dự án<br>thiết kế này?</h5>
				<div>
					<p class="desc">Đăng ký ngay<br>để nhận tư vấn</p>
					<button class="btn btn-success btn-explore">Đăng ký <i class="fa-solid fa-angle-right"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="hr"></div>
	<div class="product-related margin-section">
		<h5 class="title text-uppercase">Gợi ý<br>công trình khác<br>cùng hạng mục</h5>
		<div class="list-related">
			<div class="list custom-scrollbar">
				<?php if ($related_products->have_posts()): ?>
					<?php while ($related_products->have_posts()): ?>
						<?php 
							$related_products->the_post();
							$data = wc_get_product( get_the_ID() );
							$image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						?>
						<div class="item product">
							<div class="image">
								<img src="<?= $image ?>" alt="<?= $data->name ?>" loading="lazy">
								<a class="bg-detail" href="<?= $data->get_permalink() ?>">Chi tiết</a>
							</div>
							<div class="content">
								<p class="title"><?= $data->name ?></p>
							</div>
						</div>
					<?php endwhile ?>
				<?php endif ?>
			</div>
			<div class="bg-overlay"></div>
		</div>
	</div>
	<?php if (!empty($_SESSION['product_recently'])): ?>
		<div class="hr"></div>
		<div class="product-recently margin-section mb-4">
			<h5 class="title text-uppercase">Dự án<br>gần nhất<br>bạn đã xem</h5>
			<div class="list-recently">
				<div class="list custom-scrollbar">
					<?php 
						foreach ($_SESSION['product_recently'] as $id): 
						$data = wc_get_product($id);
						$image = get_the_post_thumbnail_url($id, 'full');
					?>
						<div class="item">
							<div class="image">
								<img src="<?= $image ?>" alt="<?= $data->name ?>" loading="lazy">
								<div class="name"><?= $data->name ?></div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<div class="bg-overlay"></div>
			</div>
		</div>
	<?php endif ?>
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