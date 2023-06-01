<?php 

    // 404 page
    defined( 'ABSPATH' ) || exit;
    get_header(); 

?>

<?php 
   get_template_part( 'layout/main-navigation' );  
?>

<div class="page-wrapper background-color-custom overflow-hidden">
  <div class="filter fixed"></div>

      <div class="generic-single-content">
            <div class="content-404">
                <h2><?php echo esc_html_e('Page Not Found','halalcatering'); ?></h2>
                <p><?php echo esc_html_e('Please check if your spelling is correct and try again','halalcatering'); ?></p>
                <h1><?php echo esc_html_e('404','halalcatering'); ?></h1>
                <div class="btn-group">
                    <a href="<?php echo site_url('/') ?>" class="btn-transparent">
                        <?php echo esc_html_e('Back to Home','halalcatering'); ?>
                    </a>
                </div>
            </div>
      </div>
<?php  
get_footer();