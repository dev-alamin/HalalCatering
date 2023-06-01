<?php
    /* Template Name: Search */   
    
    defined( 'ABSPATH' ) || exit;
    
    $data = getData();


    get_header();
    ?>

<div class="fixed-navigation">
    <?php 
        get_template_part( 'layout/main-navigation' );  
    ?>
</div>


<section class="search__results">
    <div class="container">
        <div class="h4">
            <!-- This extra div is necessary for the animation -->
            <div class="texts">
                <?php printf( __( ' Results for: %s', 'halalcatering' ), '<span>' . get_search_query() . '</span>' ); ?>
            </div>
        </div>
        <div class="programs__list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                <?php endwhile; ?>
                <?php else: ?>
                    <h2><?php echo esc_html_e("No result found"); ?></h2>
            <?php endif; ?>
        
        </div>
    </div>
</section>
        

<?php get_footer(); ?>