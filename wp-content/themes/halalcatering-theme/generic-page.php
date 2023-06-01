<?php 
    // Template Name: Generic Page
    get_header(); 
?>

<div class="fixed-navigation">
    <?php 
        get_template_part( 'layout/main-navigation' );  
    ?>
</div>

<div class="single-post-wrapper">
   <div class="container">
        <div class="global-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
                <?php the_content(); ?>
            <?php endwhile ?>
            <?php endif ?> 
        </div>
    </div>
</div>

<?php 
get_footer();