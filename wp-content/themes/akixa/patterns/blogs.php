<?php
	/**
	 * Template Name: Tin Tức
	 */

	get_header();
	$websiteName = get_bloginfo('name');
	$default_img = get_template_directory_uri().'/assets/images/new-default.png';

	$args = array(
		'orderby'    => 'id',
		'order'      => 'ASC',
		'hide_empty' => false
	);
	$categories = get_categories($args);

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		'post_status' => 'publish'
	);
	$list_first_news = new WP_Query($args);
	$first_news = $list_first_news->have_posts() ? $list_first_news->posts[0] : [];
	$first_news_cats = !empty($first_news) ? get_the_category($first_news->ID) : [];
	$first_news_img = !empty($first_news) ? get_the_post_thumbnail_url($first_news->ID, 'full') : '';

	$list_new = [];
	$totalPage = 0;

	if (count($list_first_news->posts) == 4) {
		$excludeIds = array_map(function($val) {
			return $val->ID;
		}, $list_first_news->posts);

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 8,
			'post_status' => 'publish',
			'post__not_in' => $excludeIds,
			'paged' => get_query_var('paged') ? get_query_var('paged') : 1
		);
		$query = new WP_Query($args);
		if (!empty($query->posts)) $list_new = $query->posts;
	}
?>
<style>
	.banner .bg-banner {
		background-image: url("<?= get_template_directory_uri(); ?>/assets/images/news-header.png");
	}
</style>
<div class="banner">
	<div class="bg-header"></div>
	<div class="bg-banner">
		<h1 class="block-title">Tin tức - Sự kiện</h1>
	</div>
</div>

<div class="page">
	<div class="categories custom-scrollbar">
		<div class="item active" data-cat="">Tất cả</div>
		<?php if (!empty($categories)): ?>
			<?php foreach ($categories as $category): ?>
				<div class="item" data-cat="<?= $category->slug ?>"><?= $category->name ?></div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
	<div class="news">
		<?php if ($list_first_news->have_posts()) : ?>
			<div class="first-news">
				<div class="left">
					<article class="new" style="background-image: url('<?= !empty($first_news_img) ? $first_news_img : $default_img ?>')">
						<div class="content">
							<h5 class="title"><?= $first_news->post_title ?></h5>
							<div class="d-flex justify-content-between align-items-center">
								<div class="list-category">
									<?php if (!empty($first_news_cats[0])): ?>
										<span class="category"><?= $first_news_cats[0]->name ?></span>
									<?php endif ?>
								</div>
								<div class="post-date">
									<?= date('d/m/Y', strtotime($first_news->post_date)) ?>
								</div>
							</div>
						</div>
					</article>
				</div>
				<div class="right">
					<?php 
						foreach ($list_first_news->posts as $k => $news): 
						if ($k == 0) continue;
						$news_img = get_the_post_thumbnail_url($news->ID, 'full');
						$cat = get_the_category($news->ID);
					?>
						<article class="new">
							<div class="image">
								<img src="<?= !empty($news_img) ? $news_img : $default_img ?>" alt="<?= $news->post_title ?>">
							</div>
							<div class="content">
								<?php if (!empty($cat)): ?>
									<p class="category"><?= $cat[0]->name ?></p>
								<?php endif ?>
								<p class="title"><?= $news->post_title ?></p>
								<p class="post-date"><?= date('d/m/Y', strtotime($news->post_date)) ?></p>
							</div>
						</article>
					<?php endforeach ?>				
				</div>
			</div>
			<?php if (!empty($list_new)) : ?>
				<div class="list-news">
					<div class="left">
						<div class="list">
							<?php 
								foreach ($list_new as $new): 
								if ($k == 0) continue;
								$new_img = get_the_post_thumbnail_url($new->ID, 'full');
								$cat = get_the_category($new->ID);
							?>
								<article class="new">
									<div class="image">
										<img src="<?= !empty($new_img) ? $new_img : $default_img ?>" alt="<?= $new->post_title ?>">
									</div>
									<div class="content">
										<?php if (!empty($cat)): ?>
											<p class="category"><?= $cat[0]->name ?></p>
										<?php endif ?>
										<p class="title"><?= $new->post_title ?></p>
										<p class="post-date"><?= date('d/m/Y', strtotime($new->post_date)) ?></p>
									</div>
								</article>
							<?php endforeach ?>
						</div>
						<div class="pagination">
							<div class="btn-paginate btn-prev">
								<i class="fa-solid fa-angle-left"></i>
							</div>
							<div class="list-page">
								<span class="item active"></span>
								<span class="item"></span>
								<span class="item"></span>
							</div>
							<div class="btn-paginate btn-next">
								<i class="fa-solid fa-angle-right"></i>
							</div>
						</div>
					</div>
					<div class="right">
						<div class="ads-banner">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/ads-bg.png" alt="ads">
						</div>
						<div class="form-contact">
							<h5 class="title">Cập nhật tin tức<br>mới nhất từ <?= $websiteName ?></h5>
							<form action="">
								<div class="input">
									<input type="text" placeholder="Họ và tên">
								</div>
								<div class="input">
									<input type="text" placeholder="Số điện thoại">
								</div>
								<button class="btn btn-success btn-explore">Đăng ký <i class="fa-solid fa-angle-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<p>Không có bài viết nào đã xuất bản.</p>
		<?php endif; ?>
	</div>

<?php wp_reset_postdata(); // Khôi phục dữ liệu gốc sau vòng lặp ?>
</div>

	
<?php
	get_footer();
?>