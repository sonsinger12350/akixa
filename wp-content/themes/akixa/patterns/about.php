<?php

	/**
	 * Template Name: About
	 */

	get_header();
	$websiteName = get_bloginfo('name');

	$members = get_post_gallery($post->ID, false);
	if (!empty($members)) $members = $members['src'];
?>

<style>
	.banner .content {
		background-image: url("<?= get_template_directory_uri(); ?>/assets/images/about-banner.png");
	}

	.founder-message {
		background-image: url("<?= get_template_directory_uri(); ?>/assets/images/founder-message-bg.png");
	}

	@media (max-width: 576px) {
		.banner .content {
			background-image: url("<?= get_template_directory_uri(); ?>/assets/images/about-banner-mobile.png");
		}
	}
</style>

<div class="banner">
	<div class="bg-header"></div>
	<div class="content">
        <p class="title-mini">Về <?= $websiteName ?></p>
        <p class="title">Shining<br>tomorrow<br>now</p>
		<div class="scope" id="tam-nhin">
			<div class="scope-content">
				<p class="desc-1">Sứ mệnh chúng tôi<br>đem đến thế giới</p>
				<span></span>
				<p class="desc-2">Tạo dựng & Lan tỏa những giá<br>trị cuộc sống khác biệt</p>
			</div>
		</div>
	</div>
	<div class="desire">
		<p class="title"><span class="border"></span>Chúng tôi khao khát<br class="d-block d-sm-none"> kết nối<br class="d-none d-sm-block"> với thế giới<br class="d-block d-sm-none"> bằng tầm nhìn <br><span>rộng mở</span></span>
		<div class="content-1">
			<p class="desc">Được sáng lập từ năm 2012, thông qua những trải nghiệm cuộc sống và kinh nghiệm nhiều năm thực hành kiến trúc; cùng khát khao kiến tạo một xã hội tốt đẹp hơn, chúng tôi đã định vị lại vai trò của mình trong cách tiếp cận kiến trúc hiện đại bằng những sản phẩm độc đáo; vừa có nét quen của vật liệu tự nhiên lại vừa có nét lạ với xu hướng tương lai mà bạn chưa từng thấy.</p>
			<img src="<?= get_template_directory_uri(); ?>/assets/images/about-1.gif" alt="about-1">
		</div>
		<div class="content-2">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/about-2.gif" alt="about-1">
			<div>
				<p class="desc">Với sứ mệnh tạo dựng và lan toả những giá trị cuộc sống khác biệt, chúng tôi thiết kế, xây dựng những công trình kiến trúc có giá trị thẩm mỹ tinh tế, tạo môi trường sống chữa lành tâm hồn và sức khỏe cho con người, và cùng bạn khám phá trọn vẹn cuộc sống bằng cách của riêng bạn. Khác biệt với hạnh phúc chân thực.</p>
				<p class="quote d-none d-md-block">Chúng tôi thấu cảm với con người, văn hóa, kiến trúc, cộng đồng và thiên nhiên vĩ đại. Vì vậy, trong tất cả các dự án, hoạt động của mình, <?= $websiteName ?> luôn hướng đến sự hoà hợp giữa sức khoẻ, nụ cười của khách hàng với sức khoẻ của tự nhiên, bảo vệ môi trường chúng ta đang sống.</p>
			</div>
		</div>
		<p class="quote d-block d-md-none">Chúng tôi thấu cảm với con người, văn hóa, kiến trúc, cộng đồng và thiên nhiên vĩ đại. Vì vậy, trong tất cả các dự án, hoạt động của mình, <?= $websiteName ?> luôn hướng đến sự hoà hợp giữa sức khoẻ, nụ cười của khách hàng với sức khoẻ của tự nhiên, bảo vệ môi trường chúng ta đang sống.</p>
	</div>
</div>
<div class="value margin-section">
	<p class="title">Những nền tảng<br>giá trị cốt lõi</p>
	<p class="title-mini">chúng tôi hướng tới</p>
	<div class="list">
		<div class="item">
			<p class="number">01</p>
			<p class="content">Tận tâm<br>& Thấu hiểu</p>
		</div>
		<div class="item">
			<p class="number">02</p>
			<p class="content">Kiến tạo<br>& Phát triển</p>
		</div>
		<div class="item">
			<p class="number">03</p>
			<p class="content">Dấu ấn<br>& Chất riêng</p>
		</div>
		<div class="item">
			<p class="number">04</p>
			<p class="content">Song hành<br>& Trách nhiệm</p>
		</div>
	</div>
</div>
<div class="founder-message" id="thong-diep">
	<div class="message-1 bullet-point">
		<p class="title-mini">Thông điệp của</p>
		<p class="title">Người sáng lập</p>
		<div class="message">
			<p class="content">“Chúng tôi tin tưởng rằng các giác quan và cảm xúc của bạn sẽ được nâng niu và chăm sóc khi sống trong ngôi nhà mà chúng tôi thiết kế!”</p>
			<p class="founder">CEO/Founder - Hòa Đinh</p>
		</div>
	</div>
	<div class="message-2 bullet-point">
		<p class="title-mini">Thông điệp của</p>
		<p class="title">Đội ngũ điều hành</p>
		<div class="message">
			<p class="content">Cùng đồng hành với thế hệ nhân sự tài năng, chúng tôi lắng nghe để thấu hiểu những mong muốn và đánh thức những khát vọng lớn lao, tạo nên những giá trị sống bền vững!</p>
		</div>
	</div>
</div>
<div class="person">
	<div class="content">
		<p class="title">Những con người dẫn dắt tương lai</p>
		<div class="info">
			<div>
				<p class="desc">Tại đây, chúng tôi đang cùng nhau kiến tạo một thế giới kết nối đầy màu sắc</p>
				<p class="quote">"Chỉ có những trái tim yêu thương, thấu cảm, một tâm hồn rộng mở, hoà hợp với thiên nhiên mới có thể kết nối con người với con người và đem đến những giá trị tốt đẹp cho thế giới."</p>
				<p class="quote">Chỉ có sự trải nghiệm tuyệt vời giữa bạn - những người cộng sự yêu quý của tôi tại <?= $websiteName ?> mới có thể lan toả trải nghiệm đó với khách hàng của chúng ta"</p>
			</div>
			<img src="<?= get_template_directory_uri(); ?>/assets/images/about-person.png" alt="person">
		</div>
		<div class="hr"></div>
	</div>
</div>
<div class="team margin-section" id="doi-ngu">
	<div class="founder">
		<p class="title d-block d-md-none">Đội ngũ<br><span><?= $websiteName ?></span></p>
		<div class="image">
			<img src="<?= $members[3] ?>" alt="team-founder">
			<div class="bg-image"></div>
		</div>
		<div class="founder-info">
			<p class="title d-none d-md-block">Đội ngũ<br><span><?= $websiteName ?></span></p>
			<div class="info">
				<div>
					<p class="name">HÒA ĐINH</p>
					<p class="position">CEO/ Founder</p>
				</div>
				<p class="desc">Không chỉ đam mê thiết kế xây dựng những công trình để đời, tôi còn khát khao xây dựng những tập thể mạnh mẽ, sẵn sàng chinh phục mọi thử thách.</p>
				<ul class="desc mb-0">
					<li>Số năm kinh nghiệm: 20 năm</li>
					<li>Số công trình thiết kế: 200 công trình đã hoàn thành</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="member">
		<div class="item">
			<img src="<?= $members[0] ?>" alt="member-2">
			<div class="info">
				<p class="name">Nguyễn Thế Vĩnh Lộc</p>
				<p class="position">Kiến trúc sư</p>
				<ul class="desc mb-0">
					<li>Số năm kinh nghiệm: 10 năm</li>
					<li>Số công trình thiết kế: 95 công trình đã hoàn thành</li>
				</ul>
			</div>
		</div>
		<div class="item">
			<img src="<?= $members[1] ?>" alt="member-3">
			<div class="info">
				<p class="name">Nguyễn văn tiến</p>
				<p class="position">Kiến trúc sư</p>
				<ul class="desc mb-0">
					<li>Số năm kinh nghiệm: 10 năm</li>
					<li>Số công trình thiết kế: 95 công trình đã hoàn thành</li>
				</ul>
			</div>
		</div>
		<div class="item">
			<img src="<?= $members[2] ?>" alt="member-4">
			<div class="info">
				<p class="name">phan hằng</p>
				<p class="position">Quản lý dự án</p>
				<ul class="desc mb-0">
					<li>Số năm kinh nghiệm: 10 năm</li>
					<li>Số công trình thiết kế: 95 công trình đã hoàn thành</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>