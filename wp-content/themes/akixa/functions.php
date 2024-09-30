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

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

add_action('template_redirect', 'save_recently_viewed_product');

function ajax_load_posts() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $excludeIds = isset($_POST['excludeIds']) ? $_POST['excludeIds'] : array();

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
        'post__not_in'   => $excludeIds,
        'paged'          => $paged
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Trả về dữ liệu HTML hoặc JSON
            get_template_part('template-parts/content', get_post_format());
        endwhile;
    else :
        echo 'No more posts.';
    endif;

    wp_die(); // Kết thúc AJAX
}

add_action('wp_ajax_load_posts', 'ajax_load_posts');
add_action('wp_ajax_nopriv_load_posts', 'ajax_load_posts');
