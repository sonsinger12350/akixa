<?php
if (!defined('ABSPATH')) {
    exit;
}

function site__get( $name = '', $default = '' ) {
	$value = $default;

	if( isset($_GET[$name]) ) {
		if( is_array($default) ) {
			return array_map('sanitize_text_field', $_GET[$name]);
		}
		
		$value = sanitize_text_field( $_GET[$name] );
		if( is_numeric($default) ) {
			$value = (int) $value;
		}
	}

	return $value;
}

function get_product_near( $id, $type ) {
	if (empty($id) || empty($type)) return null;

	global $wpdb;

	$where = $type == 'prev' ? " AND p.ID < $id " : " AND p.ID > $id ";

	$sql = "SELECT 
		p.ID, 
		p.post_title AS name
		FROM wp_posts p 
		WHERE p.post_type = 'product' AND p.post_status = 'publish' $where
		ORDER BY p.ID ASC 
		LIMIT 1
	";
	$result = $wpdb->get_results($sql);

	if (empty($result)) return null;
	
	$result[0]->image = get_the_post_thumbnail_url($result[0]->ID, 'thumbnail');

	return $result[0];
}