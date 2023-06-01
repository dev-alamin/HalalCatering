<?php 
/**
 * Default page template
 * Full Width only contain Header And Footer
 */


defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) : the_post(); 

?>

<?php 
   get_template_part( 'layout/main-navigation' );  
?>

<div class="page-wrapper background-color-custom overflow-hidden">
  <div class="filter fixed"></div>

      <?php the_content(); ?>
<?php  
endwhile;
get_footer();
