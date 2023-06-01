<?php 
   $data = getData();  
   
   $args = array(  
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'ASC',
    );
    $loop = new WP_Query($args);
?>

<?php if ($loop->have_posts()) : ?>
<section class="shop-section wf-section">
    <div class="w-layout-grid grid-2-columns border">

        <?php if( !empty( $data['left_title'] )): ?>
            <div class="column padding-left padding-xxlarge padding-custom border-right">
                <div
                    class="main-text secondary-font text-weight-bold second text-style-allcaps"
                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;"
                >
                    <?php echo $data['left_title']; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( !empty( $data['left_title'] )): ?>
            <div class="column padding-left padding-xxlarge padding-custom second">
                <div
                    class="main-text secondary-font text-weight-bold text-style-allcaps text-size-large"
                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 1;"
                >
                        <?php echo $data['right_title']; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="collection-list-wrapper-product w-dyn-list">
        <div role="list" class="collection-list-grid-3-columns w-dyn-items">

            <?php while ($loop->have_posts()) : $loop->the_post();global $product; ?>
            <div
                style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                class="collection-item overflow-hidden w-dyn-item"
            >
                <a href="<?php the_permalink(); ?>" class="card-product container w-inline-block">
                    <div
                        class="wrapper-image"
                        style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                    >
                        <img
                            src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>"
                            loading="lazy"
                            data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_main_image_4dr%22%2C%22to%22%3A%22src%22%7D%5D"
                            alt=""
                            sizes="(max-width: 479px) 92vw, (max-width: 767px) 95vw, (max-width: 991px) 40vw, (max-width: 1439px) 24vw, 22vw"
                            srcset="
                                <?php echo wp_get_attachment_url( $product->get_image_id() ); ?>  500w,
                                <?php echo wp_get_attachment_url( $product->get_image_id() ); ?>  800w,
                                <?php echo wp_get_attachment_url( $product->get_image_id() ); ?>  1000w
                            "
                            class="main-image"
                        />
                        <div class="filter-card-image" style="opacity: 0;"></div>
                    </div>

                    <div class="info-card-wrapper padding-vertical padding-small display-flex-horizontal" style="color: rgb(62, 61, 59);">
                        <?php 
                            $product_title = '';
                                if( !empty(  carbon_get_post_meta(get_the_ID(),'product_home_title') ) ):
                                    $product_title = carbon_get_post_meta(get_the_ID(),'product_home_title');
                            ?>
                                <div class="column">
                                    <div class="main-text text-size-medium secondary-font text-style-allcaps text-weight-bold lefttext"><?php echo the_title(); ?></div>
                                    <div class="row display-flex-horizontal second"><div class="main-text text-size-regular margin-top margin-xsmall"><?php echo $product_title; ?></div></div>
                                </div>
                            <?php endif; ?>

                        <div class="column border-radius"><div class="main-text text-size-medium redish">
                            <?php echo $product->get_price(); ?>
                        </div></div>

                    </div>
                </a>
            </div>
            <?php endwhile ?>

        </div>
    </div>

    <div class="main-image hero" style="background-image: url( <?php echo wp_get_attachment_url( $data['bg_image'],'full' ) ?> );"></div>

</section>

<?php endif ?>