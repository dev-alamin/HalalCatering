<?php 
    // Template Name: Fixed Navigation Template
    get_header(); 
?>
<div class="fixed-navigation">
    <?php 
        get_template_part( 'layout/main-navigation' );  
    ?>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
    <?php the_content(); ?>
<?php endwhile;endif ?> 

<?php 
get_footer();