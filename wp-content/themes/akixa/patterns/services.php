<?php
/**
 * Template Name: Dịch Vụ
 */
get_header(); 
?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/services.css?v=<?=time()?>">
<style>
   .banner {
      background-image: url("<?= get_template_directory_uri(); ?>/assets/images/services-banner.png");
   }
</style>

<div class="banner">
   <div class="bg-header"></div>
   <div class="content">
      <h3>Thiết kế kiến trúc vi khí hậu</h3>
      <p>AKIXA cùng bạn nuôi dưỡng sức khỏe thân - tâm - trí cho gia đình</p>
      <button type="button" class="btn btn-success btn-sm btn-explore">Đăng ký <i class="fa-solid fa-angle-right"></i></button>
   </div>
</div>
<div class="page">
   
</div>

<?php get_footer(); ?>