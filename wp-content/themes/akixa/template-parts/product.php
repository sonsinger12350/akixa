<?php
	defined('ABSPATH') || exit; // Ngăn truy cập trái phép
	if (empty($args['product'])) return;
	$product = $args['product'];
	$cf_product = get_post_meta($product->id);
	$col = 'col-lg-4';

	if (!empty($args['index'])) {
		if (in_array($args['index'], [2,6])) $col = 'col-lg-8';
	}
?>

<div class="item <?= $col ?> product">
	<div class="image">
		<?= $product->get_image('full') ?>
		<a class="bg-detail" href="<?= $product->get_permalink() ?>">Chi tiết</a>
	</div>
	<div class="content">
		<div>
			<h4><?= $product->name ?></h4>
			<ul>
				<li>Diện tích đất: <?= $cf_product['land_area'][0] ?></li>
				<li>Diện tích xây dựng: <?= $cf_product['construction_area'][0] ?></li>
			</ul>
		</div>
		<p class="short-desc"><?= nl2br(wp_strip_all_tags($product->short_description)) ?></p>
	</div>
</div>