    <footer>
		<div class="footer-content">
			<div class="logo">
				<img src="<?= get_template_directory_uri(); ?>/assets/images/logo-white.png?v=1" alt="">
				<button type="button" class="btn btn-success btn-sm btn-explore">ĐĂNG KÝ <i class="fa-solid fa-angle-right"></i></button>
			</div>
			<div class="content">
				<div class="menu-footer">
					<div class="d-flex justify-content-between align-items-start">
						<div class="row">
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Về ConNest</p>
								<a href="<?= home_url( '/ve-connest' ) ?>#thong-diep">Thông điệp nhà sáng lập</a>
								<a href="<?= home_url( '/ve-connest' ) ?>#tam-nhin">Tầm nhìn - Sứ mệnh</a>
								<a href="<?= home_url( '/ve-connest' ) ?>#doi-ngu">Đội ngũ</a>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Dịch vụ</p>
								<a href="<?= home_url( '/dich-vu' ) ?>">Thiết kế vi khi hậu</a>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Dự án</p>
								<a href="<?= home_url( '/du-an' ) ?>">Thiết kế sân vườn</a>
								<a href="<?= home_url( '/du-an' ) ?>">Thiết kế nhà 1 tầng</a>
								<a href="<?= home_url( '/du-an' ) ?>">Thiết kế nhà 2 tầng</a>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Tin tức</p>
								<a href="<?= home_url( '/blog' ) ?>">Blog</a>
								<a href="<?= home_url( '/tuyen-dung' ) ?>">Tuyển dụng</a>
							</div>
						</div>
						<button type="button" class="btn btn-success btn-sm btn-explore">ĐĂNG KÝ <i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
				<hr class="text-green">
				<div class="info">
					<div class="d-flex justify-content-between align-items-end">
						<div class="row">
							<div class="col-lg-3 col-12">
								<p class="fw-bold">CÔNG TY CỔ PHẦN TOKI</p>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Văn phòng Hà Nội</p>
								<a href="#">DM5-12A Vạn Phúc - Hà Đông - Hà Nội</a>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Văn phòng Đà Nẵng</p>
								<a href="#">B3.11-16 Trương Minh Giảng - KĐT Phú Mỹ An - Hòa Hải - Ngũ Hành Sơn - Đà Nẵng</a>
							</div>
							<div class="col-lg-3 col-6">
								<p class="fw-bold">Kết nối với chúng tôi</p>
								<a href="tel: 0988870288">Hotline: 0988 870 288</a>
							</div>
						</div>
						<div class="social-icon gap-3">
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/zalo-logo.svg" alt="Zalo">
							</a>
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/facebook-logo.svg" alt="Zalo">
							</a>
							<a href="#">
								<img src="<?= get_template_directory_uri(); ?>/assets/images/youtube-logo.svg" alt="Zalo">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right d-flex justify-content-between gap-3">
			<p>ConNest © 2024, All Rights Reserved</p>
			<p>Designed by DuocViec Agency</p>
		</div>
	</footer>
</body>
<?php
	global $post;
	$jsFiles = [
		'trang-chu' => get_template_directory_uri().'/assets/js/index.js?v='.time(),
		'du-an' => get_template_directory_uri().'/assets/js/projects.js?v='.time(),
		'product' => get_template_directory_uri().'/assets/js/single-product.js?v='.time(),
		'blog' => get_template_directory_uri().'/assets/js/blog.js?v='.time(),
		'dich-vu' => get_template_directory_uri().'/assets/js/services.js?v='.time(),
	];
?>
<script src="<?= get_template_directory_uri().'/assets/js/main.js?v='.time() ?>"></script>
<?php if (!empty($jsFiles[$post->post_name])): ?>
	<script src="<?= $jsFiles[$post->post_name] ?>"></script>
<?php else:?>
	<?php if (!empty($jsFiles[$post->post_type])): ?>
		<script src="<?= $jsFiles[$post->post_type] ?>"></script>
	<?php endif ?>
<?php endif ?>
</html>