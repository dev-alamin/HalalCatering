<?php 
    $data = getData();

    $args = array(  
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'ASC',
    );
    $loop = new WP_Query($args);
?>

<div class="page-wrapper background-color-black padding-top overflow-hidden">
    <div class="filter fixed"></div>

    <div class="shop-slider-title">
        <ul>
            <li>
                 <div class="display-flex-horizontal margin-bottom">
            <div
                class="main-text heading-xlarge secondary-font shop"
            >
                <span class="tab-link outline shop">
                    <?php echo $data['shop_title']; ?>
                </span>
            </div>
        </div>
            </li>
            <li>
                 <div class="display-flex-horizontal margin-bottom">
            <div
                class="main-text heading-xlarge secondary-font shop"
            >
                <span class="tab-link outline shop">
                    <?php echo $data['shop_title']; ?>
                </span>
            </div>
        </div>
            </li>
            <li>
                 <div class="display-flex-horizontal margin-bottom">
            <div
                class="main-text heading-xlarge secondary-font shop"
            >
                <span class="tab-link outline shop">
                    <?php echo $data['shop_title']; ?>
                </span>
            </div>
        </div>
            </li>
            <li>
                 <div class="display-flex-horizontal margin-bottom">
            <div
                class="main-text heading-xlarge secondary-font shop"
            >
                <span class="tab-link outline shop">
                    <?php echo $data['shop_title']; ?>
                </span>
            </div>
        </div>
            </li>
        </ul>
    </div>


    <section class="hero-section shop padding-bottom wf-section">
        <?php if( !empty( $data['banner_image'] ) ): ?>
            <img
                src="<?php echo wp_get_attachment_image_url( $data['banner_image'],'full' ) ?>"
                loading="lazy"
                style="
                    -webkit-transform: translate3d(0, 218px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    -moz-transform: translate3d(0, 218px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    -ms-transform: translate3d(0, 218px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    transform: translate3d(0, 218px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    opacity: 1;
                "
                sizes="100vw"
                srcset="<?php echo wp_get_attachment_image_url( $data['banner_image'],'full' ) ?> 800w, <?php echo wp_get_attachment_image_url( $data['banner_image'],'full' ) ?> 1080w, <?php echo wp_get_attachment_image_url( $data['banner_image'],'full' ) ?> 1500w"
                alt=""
                class="main-image hero shop-page-banner"
            />
        <?php endif; ?>

        <?php if( !empty( $data['section_title'] ) ): ?>
            <div class="row position-relative padding-custom-third">
                <div class="main-heading secondary-font heading-medium">
                    <?php echo $data['section_title']; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($loop->have_posts()) : ?>
            <div class="collection-list-wrapper-product w-dyn-list">
                <div role="list" class="collection-list-grid-3-columns padding w-dyn-items">
        
                    <?php while ($loop->have_posts()) : $loop->the_post();global $product; ?>
                    <div
                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                        class="collection-item no-border w-dyn-item"
                    >

                   

                        <a
                            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                            href="<?php the_permalink(); ?>"
                            class="card-product container hover-shop w-inline-block"
                        >
                            <div class="overflow-hidden">
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
                            </div>
                            <div class="info-card-wrapper padding-vertical padding-small display-flex-horizontal">
                                <?php 
                                    $product_title = '';
                                        if( !empty(  carbon_get_post_meta(get_the_ID(),'product_home_title') ) ):
                                            $product_title = carbon_get_post_meta(get_the_ID(),'product_home_title');
                                    ?>
                                        <div class="column">
                                            <div class="main-text text-size-medium secondary-font text-style-allcaps text-weight-bold"><?php echo the_title(); ?></div>
                                            <div class="main-text text-size-regular margin-top margin-xsmall text-color-white"><?php echo $product_title; ?></div>
                                        </div>
                                    <?php endif; ?>
        
                                <div class="column text-color-white"><div class="main-text text-size-medium">
                                    <?php echo $product->get_price(); ?>
                                </div></div>
        
                            </div>
                        </a>

                    </div>
                    <?php endwhile ?>
        
                </div>
            </div>
        <?php endif ?>

        <div class="container wf-section dark">

            <?php if( !empty( $data['title'] ) ): ?>
                <h1 class="main-text processtop">
                    <?php echo $data['title']; ?>
                </h1>
            <?php endif; ?>
        
            <?php if( !empty( $data['process_items'] ) ): ?>
                <div class="w-layout-grid grid-2">
                    
                    <?php foreach( $data['process_items'] as $item ): ?>
                        <div id="w-node-_7479cb24-6dea-2d62-6111-4ac6d12344df-3ad51d78">
                            <img src="<?php echo wp_get_attachment_url( $item['feature_icon'],'full' ); ?>" loading="lazy" sizes="100px" srcset="<?php echo wp_get_attachment_url( $item['feature_icon'],'full' ); ?>" alt=" <?php echo $item['title']; ?>" class="image-3">
                            <div class="text-block-11">
                                <?php echo $item['title']; ?>
                            </div>
                        </div>
                    <?php endforeach ?>
        
                </div>
            <?php endif; ?>
        </div>
        
    </section>
</div>



