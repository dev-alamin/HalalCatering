<?php 
   $data = getData();  
   
   $args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    );
    $loop = new WP_Query($args);
?>


<!-- home blog -->
<?php if ($loop->have_posts()) : ?>
<div class="home-blog pt-80 pb-80">
    <div class="container">
        <div class="section-top display-flex">
            <?php if( !empty( $data['title'] ) ): ?>
                <h2 class="text-white">
                    <?php echo esc_html_e($data['title'],'dr_gazi'); ?>
                    <br/>
                    <span class="line"></span>
                </h2>
            <?php endif; ?>
               
            <?php if( !empty( $data['btn_text'] ) ): ?>
                <a class="btn-primary desktop" href="<?php echo esc_url(site_url( $data['btn_url'] )); ?>">
                    <?php echo esc_html_e($data['btn_text']); ?>
                    <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L2.34315 0.928932C1.95262 0.538407 1.31946 0.538407 0.928933 0.928932C0.538408 1.31946 0.538408 1.95262 0.928933 2.34315L6.58579 8L0.928932 13.6569C0.538407 14.0474 0.538407 14.6805 0.928932 15.0711C1.31946 15.4616 1.95262 15.4616 2.34315 15.0711L8.70711 8.70711ZM7 9L8 9L8 7L7 7L7 9Z" fill="#C78F53"/>
                    </svg>
                </a>
            <?php endif; ?>  
        </div>
        <div class="owl-carousel" id="blog-slider">
            <?php while ($loop->have_posts()) : $loop->the_post();global $post; ?>
                <div class="blog-item">
                    <a href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('full',[ 'alt' => esc_html ( get_the_title() ) ]); ?></a>
                    <div class="post-content">

                        <h4 class="mb-0"> 
                            <a class="text-white" href="<?php echo the_permalink(); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </h4>
                    </div>
                </div>
            <?php endwhile ?>
        </div><!-- end home carousel -->
    </div><!-- end home container -->
</div><!-- end home blog -->
<?php endif ?>