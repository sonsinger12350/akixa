<?php

	/**
	 * Template Name: Liên hệ
	 */

	get_header();
	$websiteName = get_bloginfo('name');
?>

<style>
	.banner .content {
		background-image: url("<?= get_template_directory_uri(); ?>/assets/images/contact-banner.jpeg");
	}
</style>

<div class="banner">
	<div class="bg-header"></div>
	<div class="content">
		<div class="scope">
			<div class="scope-content">
				<p class="title">Chào mừng bạn đến với <?= $websiteName ?>!</p>
				<span class="line"></span>
				<div class="branch">
					<div class="branch-1">
						<p class="name">Văn phòng Hà Nội:</p>
						<ul>
							<li>DM5-12A Vạn Phúc - Hà Đông - Hà Nội</li>
						</ul>
					</div>					
					<div class="branch-2">
						<p class="name">Văn phòng Đà Nẵng:</p>
						<ul class="mb-0">
							<li>B3.11-16 Trương Minh Giảng - KĐT Phú Mỹ An - Hòa Hải - Ngũ Hành Sơn - Đà Nẵng</li>
							<li>Điện thoại: 035 922 6017</li>
							<li>Email: <a href="mailto:Lienhe@connest.vn">Lienhe@connest.vn</a></li>
							<li>Website: <a href="<?= home_url() ?>"><?= home_url() ?></a></li>
						</ul>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contact">
	<p class="title">Liên hệ với chúng tôi</p>
	<form class="form-contact">
		<div class="left">
			<div>
				<div class="input-custom">
					<label for="name">Họ và tên</label>
					<input type="text" name="name">
				</div>
				<div class="input-custom">
					<label for="name">Địa chỉ</label>
					<input type="text" name="name">
				</div>
				<div class="input-custom">
					<label for="name">Điện thoại</label>
					<input type="text" name="name">
				</div>
			</div>
			<div>
				<button type="submit" class="btn btn-success btn-sm btn-explore d-none d-xl-block">Gửi <?= $websiteName ?> <i class="fa-solid fa-angle-right"></i></button>
			</div>
		</div>
		<div class="right">
			<p class="info">Thông tin công trình</p>
			<div class="input-custom">
				<label for="name">Địa điểm khu đất</label>
				<input type="text" name="name">
			</div>
			<div class="input-info-area">
				<div class="item">
					<p class="item-title">Diện tích khu đất</p>
					<div class="input text">
						<input type="text" name="land_area">
						<span>m<sup>2</sup></span>
					</div>
				</div>
				<div class="item">
					<p class="item-title">Số phòng ngủ</p>
					<div class="input number">
						<div class="action" data-action="minus"><i class="fa-solid fa-minus"></i></div>
						<input type="number" min="1" value="1">
						<div class="action" data-action="plus"><i class="fa-solid fa-plus"></i></div>
					</div>
				</div>
				<div class="item">
					<p class="item-title">Thời gian xây dựng dự kiến</p>
					<div class="input date">
						<div class="day"><input type="number" max="31"><span>/</span></div>
						<div class="month"><input type="number" max="12"><span>/</span></div>
						<div class="year"><input type="number" max="9999"></div>
					</div>
				</div>
			</div>
			<div class="input-custom">
				<label for="name">Yêu cầu khác</label>
				<input type="text" name="name">
			</div>
			<div class="upload-image">
				<label id="dropFile">
					<input type="file" name="image[]" multiple>
					<div class="content">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/icon/upload.svg" alt="upload-image">
						<p class="upload-title">Kéo ảnh vào đây để đăng tải hình ảnh khu đất</p>
						<span>hoặc</span>
						<div class="block-upload">Tải lên từ máy tính</div>
						<div class="upload-desc">
							<p>Kích thước tối đa: <span>10Mb</span></p>
							<p>Định dạng hỗ trợ: <span>JPG, PNG</span></p>
						</div>
					</div>
				</label>
				<div class="list-image-sample d-none">
					<div class="item">
						<img src="http://localhost/akixa/wp-content/themes/akixa/assets/images/contact-banner.jpeg" alt="" class="image">
						<p class="name">IMG.2847</p>
						<img src="<?= get_template_directory_uri(); ?>/assets/images/icon/close.svg" alt="delete-image" class="delete">
					</div>
				</div>
				<div class="list-image"></div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<button type="submit" class="btn btn-success btn-sm btn-explore d-block d-xl-none">Gửi <?= $websiteName ?> <i class="fa-solid fa-angle-right"></i></button>
		</div>
	</form>
</div>
<?php get_footer(); ?>