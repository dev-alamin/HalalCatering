<?php 
    // Template Name: Black Template
    get_header(); 
?>

<?php 
    get_template_part( 'layout/main-navigation' );  
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
    <?php the_content(); ?>
<?php endwhile ?>
<?php endif ?> 

<?php 
get_template_part( 'layout/footer_two' );