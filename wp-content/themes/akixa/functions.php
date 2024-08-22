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