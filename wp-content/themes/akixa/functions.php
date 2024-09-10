<?php
function theme_setup() {
    // Thêm hỗ trợ cho menu
    add_theme_support('menus');

    // Đăng ký các vị trí menu
    register_nav_menus(array(
        'primary' => __('Primary Menu'), // Đăng ký vị trí menu "Primary"
        'footer'  => __('Footer Menu'),  // Có thể thêm nhiều vị trí khác
    ));
}
add_action('after_setup_theme', 'theme_setup');

function register_my_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu'), // Vị trí menu với tên 'primary'
    ));
}
add_action('init', 'register_my_menus');

function save_recently_viewed_product() {
    if (is_product()) {
        global $post;

        $product_id = $post->ID;
        if (!isset($_SESSION['product_recently'])) $_SESSION['product_recently'] = [];
        if (($key = array_search($product_id, $_SESSION['product_recently'])) !== false) unset($_SESSION['product_recently'][$key]);
        array_unshift($_SESSION['product_recently'], $product_id);

        // Giới hạn danh sách sản phẩm đã xem gần đây
        $_SESSION['product_recently'] = array_slice($_SESSION['product_recently'], 0, 10);
    }
}
add_action('template_redirect', 'save_recently_viewed_product');