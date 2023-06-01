<?php 
/**
 * Default page template
 * Full Width only contain Header And Footer
 */


defined( 'ABSPATH' ) || exit;

get_header(); 
global $post;

while ( have_posts() ) : the_post();
?>

<?php 
   get_template_part( 'layout/main-navigation' );  
?>

<section class="heading-top">
    <div class="container">

        <?php if(!empty(carbon_get_theme_option('company_logo'))): ?>
            <a class="logo" href="<?php echo esc_url( home_url() ); ?>">
                <?php echo wp_get_attachment_image( carbon_get_theme_option('company_logo'), 'full', '',array( 'alt' => '', 'loading' => true, )  ); ?>
            </a>
        <?php endif ?>

        <div class="banner-right">
            <?php if(!empty(carbon_get_theme_option('email_address'))): ?>
                <a class="email" href="mailto::<?php echo carbon_get_theme_option('email_address'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 4.5C5.20435 4.5 4.44129 4.81607 3.87868 5.37868C3.31607 5.94129 3 6.70435 3 7.5V7.8015L12 12.648L21 7.803V7.5C21 6.70435 20.6839 5.94129 20.1213 5.37868C19.5587 4.81607 18.7956 4.5 18 4.5H6ZM21 9.5055L12.3555 14.16C12.2462 14.2188 12.1241 14.2496 12 14.2496C11.8759 14.2496 11.7538 14.2188 11.6445 14.16L3 9.5055V16.5C3 17.2956 3.31607 18.0587 3.87868 18.6213C4.44129 19.1839 5.20435 19.5 6 19.5H18C18.7956 19.5 19.5587 19.1839 20.1213 18.6213C20.6839 18.0587 21 17.2956 21 16.5V9.5055Z" fill="black"/>
                    </svg>   
                    <?php echo esc_html_e('Say Hello','halalcateringl'); ?>
                </a>
            <?php endif ?>

            <?php if(!empty(carbon_get_theme_option('calendy_link'))): ?>
                <a class="btn-primary" href="<?php echo carbon_get_theme_option('calendy_link'); ?>"><?php echo esc_html_e('Ready to Scale ?','halalcateringl'); ?></a>
            <?php endif ?>
        </div>
    </div>
</section>

<div class="single-post-wrapper">
    <div class="container">

        <a class="back" href="<?php echo site_url('/blogs'); ?>">
            
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.837675 5.54673C0.713508 5.67164 0.643812 5.8406 0.643812 6.01673C0.643812 6.19285 0.713508 6.36182 0.837675 6.48673L6.17101 11.8201C6.29854 11.9293 6.46259 11.9864 6.63038 11.9799C6.79816 11.9734 6.95732 11.9038 7.07605 11.7851C7.19478 11.6664 7.26433 11.5072 7.27082 11.3394C7.2773 11.1716 7.22023 11.0076 7.11101 10.8801L2.25101 6.02006L7.11767 1.16006C7.24321 1.03453 7.31374 0.864263 7.31374 0.686728C7.31374 0.509194 7.24321 0.338931 7.11767 0.213395C6.99214 0.0878591 6.82188 0.017334 6.64434 0.017334C6.46681 0.0173339 6.29654 0.0878591 6.17101 0.213395L0.837675 5.54673Z" fill="white"/>
            </svg>

            <?php echo esc_html_e('Back','dr_gazi'); ?>

        </a>
        <div class="global-content">
            <p class="date"><?php echo get_the_date('d M Y'); ?></p>
            <a href="<?php echo the_permalink(); ?>" class="feature-image-single"><?php echo the_post_thumbnail('full'); ?></a>
            <?php 
                the_content(); 
            ?>
        </div>
    </div>
</div>

<?php 

   $args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => array($post->ID),
    );
    $loop = new WP_Query($args);
?>

<div class="related-posts">

    <div class="container">
        <h2><?php echo esc_html_e("Also you like",'dr_gazi'); ?></h2>
    </div>
    <div class="container">

    <?php 
        $animation_delay = 20;
        while ($loop->have_posts()) : $loop->the_post();global $post;
    ?>
    <!-- posts blog -->
    <div data-aos='fade-up' data-aos-delay="<?php echo $animation_delay; ?>"  data-aos-duration="1000" class="blog-item <?php if( $blog_counter <= 1 ): echo 'sticky-blog'; endif; ?>">
        <a class="feature-thumbnail" href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('full'); ?></a>
        <div class="post-content">

            <div class="category-list-item">
                <?php 
                    $categories = get_the_category();
                    if ( !empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                ?>
                <span class="date">
                    <span></span>
                    <?php echo the_date('d M Y'); ?>
                </span>
            </div>

            <h3 class="mb-0"> 
                <a class="text-white" href="<?php echo the_permalink(); ?>">
                    <?php echo substr(get_the_title(),0,62); ?>
                </a>
            </h3>

        </div>
    </div>
    <!-- end posts -->
    <?php 
    if( $animation_delay === 80 ){
        $animation_delay=20;
    }else{
        $animation_delay+=10;
    }
    endwhile ?>


    </div>
</div>

<?php  
endwhile;
get_footer();
