<?php
/**
 * Plugin Name: Connest
 * Description: Plugin custom for connest
 * Author: Lucas
 * Version: 1
 *
 * Text Domain: elementor
 *
 */

// Thêm mục menu vào trang quản trị
function add_custom_admin_menu() {
	add_menu_page(
		'',     // Tiêu đề của mục menu
		'Tuyển dụng',     // Tiêu đề của menu
		'manage_options',        // Quyền truy cập cần thiết để thấy mục menu
		'career',     // Slug của menu
		'career_list', // Hàm callback để hiển thị trang của menu
		'dashicons-list-view',
		10
	);

	add_submenu_page(
		'career', // Slug của menu chính
		'Thêm mới',          // Tiêu đề của menu con
		'Thêm mới',          // Tiêu đề của trang con
		'manage_options',        // Quyền truy cập cần thiết để thấy trang con
		'career-create',          // Slug của trang con
		'career_create'  // Hàm callback để hiển thị trang con
	);

	add_menu_page(
		'',     // Tiêu đề của mục menu
		'Liên hệ',     // Tiêu đề của menu
		'manage_options',        // Quyền truy cập cần thiết để thấy mục menu
		'contact',     // Slug của menu
		'contact_list', // Hàm callback để hiển thị trang của menu
		'dashicons-email',
		11
	);
}

add_action('admin_menu', 'add_custom_admin_menu');

// Hàm callback để hiển thị trang của menu
function career_list() {
	global $wpdb;

	$search_input = '';

	if (!empty($_POST['post-search-input'])) {
		$search_input = $_POST['post-search-input'];
	}

	$table = "wp_connest_job";

	$current_page = !empty($_GET['paged']) ? $_GET['paged'] : 1;
	$items_per_page = 10; // Số mục trên mỗi trang
	$offset = ( $current_page - 1 ) * $items_per_page;
	$query = "SELECT * FROM `$table` ";

	if (!empty($search_input)) {
		$query .= " WHERE `position` LIKE '%$search_input%'";
	}

	$query .= " ORDER BY created_at DESC LIMIT {$items_per_page} OFFSET {$offset}";
	$data = $wpdb->get_results( $query );

	$total_items = $wpdb->get_var( "SELECT COUNT(id) FROM `$table`" );
	$total_pages = ceil( $total_items / $items_per_page );

	$pagination = [
		'base'      => add_query_arg( 'paged', '%#%' ),
		'format'    => '?paged=%#%',
		'current'   => $current_page,
		'total'     => $total_pages
	];

	include 'view/job-list.php';
}

function career_create() {
	global $wpdb;
	$table = "wp_connest_job";
	$data = [];

	if (!empty($_GET['id'])) {
		$data = $wpdb->get_results("SELECT * FROM `$table` WHERE `id` = ".sanitize_text_field($_GET['id']));
		$data = !empty($data[0]) ? $data[0] : [];
	}
	
	if (!empty($_POST['submit-job-form'])) {
		$inputs = [
			'position'  =>  sanitize_text_field($_POST['position']),
			'address'  =>  sanitize_text_field($_POST['address']),
			'working_time'  =>  sanitize_text_field($_POST['working_time']),
			'salary'  =>  sanitize_text_field($_POST['salary']),
			'application_deadline'  =>  sanitize_text_field($_POST['application_deadline']),
			'desc'  =>  sanitize_text_field(str_replace(PHP_EOL, "\\n", $_POST['desc'])),
			'benefits'  =>  sanitize_text_field(str_replace(PHP_EOL, "\\n", $_POST['benefits'])),
			'show'  =>  !empty($_POST['show']) ? sanitize_text_field($_POST['show']) : 0,
		];

		if (!empty($_GET['id'])) {
			if (empty($data)) {
				$notify = '
					<div id="message" class="notice notice-error is-dismissible" style="margin-left: 2px;">
						<button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
				';
				echo $notify;
				goto DONE;
			}

			$sql = "SELECT `id` FROM `$table` WHERE `position` LIKE '".$inputs['position']."' AND `id` <> ".$data->id;
			$isExist = $wpdb->get_results($sql);

			if (!empty($isExist)) {
				$notify = '
					<div id="message" class="notice notice-error is-dismissible" style="margin-left: 2px;">
						<p>Tin tuyển dụng đã tồn tại.</p>
						<button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
				';
				echo $notify;
				goto DONE;
			}

			$where = [
				'id'    =>  $data->id
			];
			$wpdb->update( $table, $inputs, $where );
			
			$notify = '
				<div id="message" class="updated notice notice-success is-dismissible" style="margin-left: 2px;">
					<p>Cập nhật dịch vụ thành công.</p>
					<button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()">
						<span class="screen-reader-text">Dismiss this notice.</span>
					</button>
				</div>
				<script>setTimeout(function() {window.location.href="'.admin_url('admin.php?page=career').'"},1000)</script>
			';

			echo $notify;
			goto DONE;
		} else {
			$sql = "SELECT `id` FROM `$table` WHERE `position` LIKE '".$inputs['position']."'";
			$isExist = $wpdb->get_results($sql);

			if (!empty($isExist) && empty($_GET['id'])) {
				$notify = '
					<div id="message" class="notice notice-error is-dismissible" style="margin-left: 2px;">
						<p>Tin tuyển dụng đã tồn tại.</p>
						<button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
				';
				echo $notify;
				goto DONE;
			}
			$wpdb->insert($table, $inputs);
			$message = 'Thêm mới tin tuyển dụng thành công.';
		}
		
		$notify = '
			<div id="message" class="updated notice notice-success is-dismissible" style="margin-left: 2px;">
				<p>'.$message.'</p>
				<button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()">
					<span class="screen-reader-text">Dismiss this notice.</span>
				</button>
			</div>
		';

		echo $notify;
		goto DONE;
	}
	
	DONE:
	include 'view/job-create.php';
}

function contact_list() {
	global $wpdb;

	$search_input = '';

	if (!empty($_POST['post-search-input'])) {
		$search_input = $_POST['post-search-input'];
	}

	$table = "{$wpdb->prefix}booking_custom_appointment";

	$current_page = !empty($_GET['paged']) ? $_GET['paged'] : 1;
	$items_per_page = 10; // Số mục trên mỗi trang
	$offset = ( $current_page - 1 ) * $items_per_page;
	$query = "SELECT * FROM `$table` ";

	if (!empty($search_input)) {
		$query .= " WHERE `full_name` LIKE '%$search_input%' OR `phone` LIKE '%$search_input%' OR `email` LIKE '%$search_input%'";
	}

	$query .= " ORDER BY date DESC, time DESC LIMIT {$items_per_page} OFFSET {$offset}";
	$data = $wpdb->get_results( $query );

	$total_items = $wpdb->get_var( "SELECT COUNT(*) FROM `$table`" );
	$total_pages = ceil( $total_items / $items_per_page );

	$pagination = [
		'base'      => add_query_arg( 'paged', '%#%' ),
		'format'    => '?paged=%#%',
		'current'   => $current_page,
		'total'     => $total_pages
	];

	$serviceData = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}booking_custom_service`");
	$services = [];

	if (!empty($serviceData)) {
		foreach ($serviceData as $v) {
			$services[$v->id] = $v->name;
		}
	}

	include 'view/listAppointment.php';
}

add_shortcode('custom_booking_appointment', 'custom_booking_appointment_shortcode');

// Hàm lưu lịch đặt của người dùng
function save_booking_custom() {
	$rs = [
		'success'	=>	0,
		'message'	=>	'',
		'data'		=>	[],
	];

	if (empty($_POST['data'])) {
		wp_send_json_error( 'Vui lòng nhập đầy đủ thông tin.' );exit;
	}

	global $wpdb;
	$data = [];
	parse_str($_POST['data'], $data);
	$data = $data['booking'];

	$inputs = [
		'service'	=>	implode(',', $data['service']),
		'full_name'	=>	$data['full_name'],
		'gender'	=>	$data['gender'],
		'email'		=>	@$data['email'],
		'phone'		=>	$data['phone'],
		'date'		=>	$data['date'],
		'time'		=>	$data['time'],
		'note'		=>	@$data['note'],
	];
	
	if (empty($wpdb->insert($wpdb->prefix.'booking_custom_appointment', $inputs))) {
		wp_send_json_error( 'Có lỗi. Vui lòng thử lại' );exit;
	}

	$inputs['service_name'] = $data['service_name'];
	send_email_notify($inputs);

	wp_send_json_success('Đặt lịch thành công.');exit;

}

add_action( 'wp_ajax_save_booking_custom', 'save_booking_custom' );
add_action( 'wp_ajax_nopriv_save_booking_custom', 'save_booking_custom' );

// Hàm lưu cấu hình
function save_booking_custom_config() {
	global $wpdb;

	if (empty($_POST['data'])) {
		wp_send_json_error('');exit;
	}

	$inputs = [];
	parse_str($_POST['data'], $inputs);

	$table = "{$wpdb->prefix}booking_custom_config";
	$key = 'email_receive_notify';

	$data = $wpdb->get_results("SELECT `key`, `value` FROM `$table` WHERE `key` = '$key'");
	$data = !empty($data[0]) ? $data[0] : [];
	$data->value = !empty($data->value) ? explode(',', $data->value) : [];
	
	if (!empty($inputs['email_receive_notify'])) {
		$emails = implode(',', array_filter($inputs['email_receive_notify']));

		if (!empty($data->value)) {
			$where = ['key' => $key];
			$wpdb->update($table, ['value' => $emails], $where);
		} else {
			$wpdb->insert($table, ['key' => $key, 'value' => $emails]);
		}
		
		$message = 'Đã lưu cấu hình.';
		
		
		$notify = '<div id="message" class="updated notice notice-success is-dismissible" style="margin-left: 2px;">'.$message.'<p> <button type="button" class="notice-dismiss" onclick="this.parentNode.parentNode.remove()"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
		';
	}

	wp_send_json_success($notify);exit;

}

add_action( 'wp_ajax_save_booking_custom_config', 'save_booking_custom_config' );
add_action( 'wp_ajax_nopriv_save_booking_custom_config', 'save_booking_custom_config' );

// Hàm xóa data trong màn hình danh sách của admin
function delete_data_connest() {
	$rs = [
		'success'	=>	0,
		'message'	=>	'',
		'data'		=>	[],
	];

	if (empty($_POST['table']) || empty($_POST['id'])) {
		wp_send_json_error( 'Vui lòng nhập đầy đủ thông tin.' );exit;
	}

	global $wpdb;
	
	$table_name = $_POST['table'];
	$where_condition = ['id'=>$_POST['id']];
	
	if (empty($wpdb->delete($table_name, $where_condition))) {
		wp_send_json_error( 'Có lỗi. Vui lòng thử lại' );exit;
	}

	wp_send_json_success('Xóa dữ liệu thành công.');exit;

}

add_action( 'wp_ajax_delete_data_connest', 'delete_data_connest' );
add_action( 'wp_ajax_nopriv_delete_data_connest', 'delete_data_connest' );

function send_email_notify($params) {
	global $wpdb;

	$data = $wpdb->get_results("SELECT `key`, `value` FROM `{$wpdb->prefix}booking_custom_config` WHERE `key` = 'email_receive_notify'");
	
	$to = !empty($data[0]) ? explode(',', $data[0]->value) : [];

	if (empty($to)) {
		return;
	}

	$subject = 'Thông báo đặt lịch khám ngày '.$params['date'].' từ khách hàng '.$params['full_name'];
	$message = '
		<table style="border: 0px;">
			<tbody>
				<tr>
					<td style="width: 100px">Ngày khám: </td>
					<td><b>'.$params['date'].'</b></td>
				</tr>
				<tr>
					<td>Giờ khám: </td>
					<td><b>'.$params['time'].'</b></td>
				</tr>
				<tr>
					<td>Khách hàng: </td>
					<td><b>'.$params['full_name'].'</b></td>
				</tr>
				<tr>
					<td>Giới tính: </td>
					<td><b>'.$params['gender'].'</b></td>
				</tr>
				<tr>
					<td>Số điện thoại: </td>
					<td><b>'.$params['phone'].'</b></td>
				</tr>
				<tr>
					<td>Dịch vụ: </td>
					<td><b>'.implode(', ', $params['service_name']).'</b></td>
				</tr>';
				
	if (!empty($params['note'])) {
		$message .= '<tr> <td>Ghi chú: </td> <td><b>'.$params['note'].'</b></td> </tr>';
	}

	$message .='</tbody></table>';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	// Gửi email
	wp_mail($to, $subject, $message, $headers);
}