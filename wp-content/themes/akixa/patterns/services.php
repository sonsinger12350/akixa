<?php

	/**
	 * Template Name: Dịch Vụ
	 */

	get_header();
	$websiteName = get_bloginfo('name');
?>
<style>
	.banner .content {
		background-image: url("<?= get_template_directory_uri(); ?>/assets/images/services-banner.png");
	}
</style>

<div class="banner">
	<div class="bg-header"></div>
	<div class="content">
		<div class="bg-blur"></div>
		<h3 class="title">Thiết kế kiến trúc<br>vi khí hậu</h3>
		<div class="desc">
			<p><?= $websiteName ?> cùng bạn nuôi dưỡng<br>sức khỏe thân - tâm - trí cho gia đình</p>
			<button type="button" class="btn btn-success btn-sm btn-explore">Khám phá <?= $websiteName ?> <i class="fa-solid fa-angle-right"></i></button>
		</div>
	</div>
</div>
<div class="vision bullet-point">
	<p>Khi thiết kế kiến trúc và thi công được gắn vào một bức tranh tổng quát sẽ tạo ra một công trình không chỉ có khả năng chống chịu với các điều kiện khí hậu của khu vực mà còn cung cấp một môi trường sống lành mạnh và thoải mái cho người dùng. </p>
	<p>Đó là lí do <?= $websiteName ?> theo đuổi định hướng: <b>KIẾN TRÚC VI KHÍ HẬU - KIẾN TRÚC CỦA TƯƠNG LAI</b></p>
</div>

<div class="why-choose margin-section">
	<p class="title-mini mb-2">KHÁM PHÁ LÍ DO TẠI SAO</p>
	<p class="title mb-2">khách hàng lựa chọn <?= $websiteName ?></p>
	<p class="title-mini mb-0">CHO NGÔI NHÀ CỦA MÌNH</p>
	<div class="services">
		<div class="tab">
			<div class="item active" data-tab="service-design">Dịch vụ thiết kế kiến trúc</div>
			<div class="item" data-tab="service-construction">Dịch vụ thi công</div>
		</div>
		<div class="tab-content">
			<div class="item service-design active">
				<div class="content">
					<div class="desc">
						<p>Dịch vụ thiết kế kiến trúc của <?= $websiteName ?> không chỉ tập trung vào việc tạo ra một không gian sống độc - đẹp, mà còn chú trọng đến việc nuôi dưỡng sức khỏe thân - tâm - trí cho mỗi cá nhân sống trong đó, vì chúng tôi hiểu rằng môi trường xung quanh ảnh hưởng rất lớn đến chất lượng cuộc sống của mỗi người.</p>
						<p class="mb-0"><?= $websiteName ?> áp dụng các nguyên tắc thiết kế vi khí hậu, đề cao tính bền vững thông qua việc tối ưu hóa sự tương tác đối với khí hậu địa phương trên khía cạnh nghiên cứu về <b>ánh sáng tự nhiên và thông gió.</b></p>
					</div>
					<div>
						<p class="slogan mb-4 d-none d-md-block">“Trọng tâm trong mỗi bản thiết kế từ <?= $websiteName ?><br>đều hướng về con người”</p>
						<p class="slogan mb-4 d-block d-md-none">“Trọng tâm trong mỗi bản thiết kế từ<br><?= $websiteName ?> đều hướng về con người”</p>
						<button type="button" class="btn btn-success btn-sm btn-explore">Liên hệ tư vấn <i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
				<div class="image">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-1.png" alt="service-design">
				</div>
			</div>
			<div class="item service-construction">
				<div class="content">
					<div class="desc">
						<p>Thi công một công trình đòi hỏi việc tính toán, lên kế hoạch kỹ càng để tạo nền móng cho các bước xây dựng, hoàn thiện.</p>
						<p class="mb-0">Đội ngũ kiến trúc sư và thi công của <?= $websiteName ?> làm việc chặt chẽ từ những khâu đầu tiên để lên kế hoạch, sau đó đưa vào triển khai thực tế. Đâu là phương án khả thi, <b>chọn vật liệu</b> xây dựng nào đáp ứng được mục tiêu <b>thân thiện với môi trường</b>, có thể áp dụng các phương pháp <b>xây dựng tiết kiệm nang lượng,</b>, và đảm bảo rằng các hệ thống như thông gió và chiếu sáng được lắp đặt một cách hiệu quả để giảm thiểu sử dụng năng lượng ra sao?</p>
					</div>
					<div>
						<p class="slogan mb-4">Hạnh phúc của <?= $websiteName ?> là mỗi ngày được thấy thêm một<br>công trình hoàn thiện, mà ở trong đó nuôi dưỡng, kết nối<br>con người bằng một bản thể hạnh phúc</p>
						<button type="button" class="btn btn-success btn-sm btn-explore">Liên hệ tư vấn <i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
				<div class="image">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/project-7.png" alt="service-construction">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="working margin-section">
	<p class="title">Tôn chỉ làm việc của<br><?= $websiteName ?></p>
	<div class="list">
		<div class="item">
			<p class="number">01</p>
			<p class="content">Quy trình rõ ràng và linh hoạt, luôn lấy mong muốn của khách hàng làm kim chỉ nam trong thiết kế.</p>
		</div>
		<div class="item">
			<p class="number">02</p>
			<p class="content">Sáng tạo với tính ứng dụng cao, mỗi công trình đều là sản phẩm nghệ thuật để phục vụ cuộc sống.</p>
		</div>
		<div class="item">
			<p class="number">03</p>
			<p class="content">Cẩn trọng nhưng tối ưu thời gian. Kiểm soát chất lượng chặt chẽ, bám sát tiến độ.</p>
		</div>
	</div>
</div>
<div class="workflow margin-section">
	<p class="title">Quy trình làm việc <span>8</span> bước</p>
	<div class="list">
		<div class="item">
			<div class="step">01</div>
			<div class="content">
				<div class="text">
					<p class="name">KHÁCH HÀNG LIÊN HỆ</p>
					<p class="desc">Khách hàng cung cấp thông tin sơ bộ về khu đất và nhu cầu thiết kế để chúng tôi tư vấn.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">02</div>
			<div class="content">
				<div class="text">
					<p class="name">KHẢO SÁT</p>
					<p class="desc">KTS tiến hành khảo sát khu đất và tư vấn sơ bộ về phương án bố trí mặt bằng ngay trong buổi gặp gỡ này.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">03</div>
			<div class="content">
				<div class="text">
					<p class="name">THIẾT KẾ CƠ SỞ</p>
					<p class="desc">Giai đoan concept: Mặt bằng công năng chi tiết, hình khối kiến trúc, nội thất, phong cách thiết kế, vật liệu chủ đạo và khái toán công trình.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">04</div>
			<div class="content">
				<div class="text">
					<p class="name">THẢO LUẬN LẦN 1</p>
					<p class="desc">Hai bên sẽ có buổi thảo luận và thống nhất hoặc điều chỉnh hình khối công trình và sơ đồ công năng trước khi sang giai đoạn diễn họa chi tiết.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">05</div>
			<div class="content">
				<div class="text">
					<p class="name">DIỄN HỌA 3D</p>
					<p class="desc">Các bản vẽ 3D diễn họa ngoại thất và nội thất, thể hiện rõ vật liệu, màu sắc và ánh sáng, bóng đổ lên công trình.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">06</div>
			<div class="content">
				<div class="text">
					<p class="name">THẢO LUẬN LẦN 2</p>
					<p class="desc">Hai bên thảo luận về màu sắc, vật liệu và ánh sáng; thống nhất hoặc điều chỉnh trước khi sang giai đoạn thiết kế bản vẽ thi công.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">07</div>
			<div class="content">
				<div class="text">
					<p class="name">THIẾT KẾ THI CÔNG</p>
					<p class="desc">Sau khi thống nhất được phương án concept chúng tôi thực hiện các bản vẽ chi tiết thiết kế thi công bao gồm: Hồ sơ kiến trúc; Hồ sơ kết cấu; Hồ sơ điện nước và Dự toán chi tiết.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="step">08</div>
			<div class="content">
				<div class="text">
					<p class="name">NGHIỆM THU THANH LÝ</p>
					<p class="desc">In ấn, đóng dấu gửi hồ sơ cho khách hàng và ký nghiệm thu hoàn thành thiết kế.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
		<button type="button" class="btn btn-success btn-sm btn-explore">Liên hệ tư vấn <i class="fa-solid fa-angle-right"></i></button>
	</div>
</div>
<div class="price-list margin-section">
	<div class="title">Bảng báo giá thiết kế</div>
	<div class="table-price-list">
		<table class="table table-borderless">
			<thead>
				<tr>
					<td style="width: 5%">TT</td>
					<td style="width: 20%">hạng mục</td>
					<td style="width: 10%">Đơn vị</td>
					<td style="width: 10%">Đơn giá<br><span>(ngàn đồng/m2)</span></td>
					<td style="width: 55%;">Ghi chú</td>
				</tr>
			</thead>
			<tbody>
				<tr class="highlight">
					<td>I.</td>
					<td>Thiết kế sơ bộ</td>
					<td>gói</td>
					<td></td>
					<td></td>
				</tr>
				<tr class="borderless">
					<td>1.1</td>
					<td>Khảo sát khu đất; Thiết kế ý tưởng mặt bằng công năng, quy hoạch sân vườn</td>
					<td>Gói</td>
					<td>5.000.000</td>
					<td>
						<ul class="mb-0">
							<li>Đơn vị thiết kế về khảo sát trực tiếp khu đất: đo vẽ hiện trạng, tìm hiểu địa chất, khí hậu khu vực; Khảo sát nhu cầu thiết kế của khách hàng;</li>
							<li>Dựa vào các thông tin thu thập được, thiết kế sơ bộ mặt bằng công năng toàn bộ khu đất để Khách hàng hình dung rõ nét về mong muốn của mình</li>
						</ul>
					</td>
				</tr>
				<tr class="highlight">
					<td>II.</td>
					<td>Thiết kế kiến trúc</td>
					<td>m2</td>
					<td>230.000</td>
					<td></td>
				</tr>
				<tr>
					<td>2.1</td>
					<td>Thiết kế 3D</td>
					<td>m2</td>
					<td></td>
					<td>Các bản vẽ 3D phối cảnh ngoại thất các góc công trình</td>
				</tr>
				<tr>
					<td>2.2</td>
					<td>Hồ sơ chi tiết kiến trúc</td>
					<td>m2</td>
					<td></td>
					<td>Bản vẽ chi tiết kích thước, cấu tạo, ghi chú cụ thể vật liệu, màu sắc;</td>
				</tr>
				<tr>
					<td>2.3</td>
					<td>Thiết kế kết cấu</td>
					<td>m2</td>
					<td></td>
					<td>Bản vẽ chi tiết kích thước, cấu tạo, ghi chú cụ thể vật liệu, màu sắc;</td>
				</tr>
				<tr class="borderless">
					<td>2.4</td>
					<td>Thiết kế M&E</td>
					<td>m2</td>
					<td></td>
					<td>Thiết kế sơ đồ nguyên lý điện, điện nhẹ, sơ đồ nước; bố trí chi tiết thiết bị; thống kê số lượng vật tư</td>
				</tr>
				<tr class="highlight">
					<td>IV.</td>
					<td>Thiết kế sân vườn</td>
					<td>m2</td>
					<td>100.000</td>
					<td></td>
				</tr>
				<tr>
					<td>3.1</td>
					<td>Phối cảnh 3D</td>
					<td>m2</td>
					<td></td>
					<td>Phối cảnh tổng thể, phối cảnh chi tiết thể hiện đầy đủ ý tưởng</td>
				</tr>
				<tr class="borderless">
					<td>3.2</td>
					<td>Hồ sơ chi tiết</td>
					<td>m2</td>
					<td></td>
					<td>Bản vẽ chi tiết kích thước, cấu tạo, ghi chú cụ thể vật liệu, màu sắc;</td>
				</tr>
				<tr class="highlight">
					<td>V.</td>
					<td>DỰ TOÁN CHI TIẾT</td>
					<td>
						<p class="small">10% (phí thiết kế)</p>
					</td>
					<td></td>
					<td><p class="small">Bóc tách chi tiết khối lượng, đơn giá; tổng hợp vật tư</p></td>
				</tr>
				<tr class="highlight">
					<td>VI.</td>
					<td>GIÁM SÁT TÁC GIẢ</td>
					<td><p class="small">10% (phí thiết kế) (chưa bao gồm chi phí di chuyển ngoài Hà Nội)</p></td>
					<td></td>
					<td><p class="small">Kiến trúc sư giám sát việc thi công tại công trình vào những thời điểm cần thiết (Định vị tim cột, cote sàn; hoàn thành phần thô; hoàn thành phần hoàn thiện); Kiểm tra chất lượng công trình ngoại quan; theo dõi để đảm bảo công trình đáp ứng yêu cầu thiết kế;</p></td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class="scroll-note d-block d-md-none">Vuốt sang ngang để xem toàn bộ bảng giá</p>
	<div class="text-center">
		<button type="button" class="btn btn-success btn-sm btn-explore">Liên hệ tư vấn <i class="fa-solid fa-angle-right"></i></button>
	</div>
</div>
<div class="partner margin-section">
	<p class="title-mini">Chúng tôi tự hào khi được đồng hành cùng các</p>
	<p class="title">đối tác hàng đầu</p>
	<div class="list">
		<?php for ($i = 1; $i <= 12; $i++): ?>
			<div class="item <?= $i == 1 ? 'active' : '' ?>">
				<img src="<?= get_template_directory_uri(); ?>/assets/images/partner-google.png" alt="partner-<?= $i ?>">
			</div>
		<?php endfor ?>
	</div>
</div>

<?php get_footer(); ?>