
<?php 
/**
 * Default page template
 * Full Width only contain Header And Footer
 */


defined( 'ABSPATH' ) || exit;

get_header(); 
?>

<div class="fixed-navigation">
    <?php 
        get_template_part( 'layout/main-navigation' );  
        $product_id = get_the_ID();
        $product = wc_get_product( $product_id );

        $gallery_images = $product->get_gallery_image_ids();

        $product_menu_name = '';
        if( !empty( carbon_get_post_meta( get_the_ID(), 'product_menu_name' ) ) ){
            $product_menu_name = carbon_get_post_meta( get_the_ID(), 'product_menu_name' );
        }

        $get_price = '';
        if( !empty( $product->get_price() ) ){
            $get_price = $product->get_price();
        }

        $product_faqs = '';
        if( !empty( carbon_get_post_meta( get_the_ID(), 'product_faqs' ) ) ){
            $product_faqs = carbon_get_post_meta( get_the_ID(), 'product_faqs' );
        }
        
    ?>
</div>

<div class="page-wrapper background-color-black overflow-hidden">
    <div class="container padding-custom-second">
        <div class="w-layout-grid grid-2-columns product">
            <div
                id="w-node-c185a1f1-e7ac-40d9-304d-991fa5f44169-12d51d83"
                data-w-id="c185a1f1-e7ac-40d9-304d-991fa5f44169"
                style="
                    -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    opacity: 1;
                "
                class="column"
            >
                <img
                    srcset="<?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 500w, <?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 800w, <?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 1600w, <?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 2000w, <?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?> 3000w"
                    loading="lazy"
                    src="<?php echo wp_get_attachment_url( $product->get_image_id(),'full' ); ?>"
                    sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 84vw, (max-width: 1439px) 89vw, 84vw"
                    alt=""
                    class="image-third"
                />

                <?php if(  !empty( $gallery_images ) ): ?>

                    <div class="gallery-collection-list w-dyn-list">

                        <?php foreach( $gallery_images as $item ): ?>
                            <div role="list" class="collection-list-grid-4-columns second w-dyn-items">
                                <div role="listitem" class="w-dyn-item">
                                    <a href="#" class="w-inline-block w-lightbox">
                                        <img
                                            srcset="<?php echo wp_get_attachment_url( $item,'full' ); ?> 500w, <?php echo wp_get_attachment_url( $item,'full' ); ?> 800w, <?php echo wp_get_attachment_url( $item,'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $item,'full' ); ?> 1100w"
                                            loading="lazy"
                                            sizes="(max-width: 767px) 21vw, (max-width: 991px) 17vw, (max-width: 1439px) 140px, 10vw"
                                            src="<?php echo wp_get_attachment_url( $item,'full' ); ?>"
                                            alt=""
                                            class="image-second"
                                        />
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif ?>
            </div>
            <div id="w-node-_6845dea4-6dc1-8336-f7b4-034ad2adddb7-12d51d83" class="column shop">

                <?php if( !empty( $product_menu_name ) ): ?>
                    <div class="row display-flex-horizontal position-absolute">
                        <div
                            data-w-id="ad27b7e2-7c8f-955f-6614-8a3a7c4e1ced"
                            style="
                                opacity: 1;
                                -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            "
                            class="main-text heading-large text-style-allcaps"
                        >
                            <?php echo $product_menu_name; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <h1
                    data-w-id="40a7dda4-1c89-e5bc-0d71-f3daa5d78330"
                    style="
                        opacity: 1;
                        -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    "
                    class="main-heading text-size-medium text-style-allcaps margin-bottom"
                >
                    <?php echo the_title(); ?>
                </h1>

                
                <?php if( !empty( $get_price ) ): ?>
                    <div class="row display-flex-vertical">
                        <div class="column no-padding">
                            <div class="row display-flex-horizontal second">
                                <div
                                    style="
                                        opacity: 1;
                                        -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                        -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                        -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                        transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                    "
                                    class="main-text text-size-large margin-bottom compare"
                                ></div>
                            </div>
                            <div style="opacity: 1;" class="main-text text-size-large margin-bottom"><?php echo $get_price; ?>,-</div>
                        </div>
                    </div>
                <?php endif ?>

                <p
                    style="
                        opacity: 1;
                        -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                    "
                    class="main-paragraph text-size-small second margin-bottom"
                >
                <?php echo $product->get_short_description(); ?>
                </p>
                <div>
                
                <?php 
                    if ( ! $product->is_purchasable() ) {
                        return;
                    }
                    
                    echo wc_get_stock_html( $product ); // WPCS: XSS ok.
                    
                    if ( $product->is_in_stock() ) : ?>
                    
                        <form class="cart" 
                            action="<?php echo esc_url( site_url('/cart') ); ?>" 
                            method="post" 
                            enctype='multipart/form-data'
                            style="
                                opacity: 1;
                                -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                                transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            "
                            class="w-commerce-commerceaddtocartform display-flex-vertical"
                            >
                            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
                    
                            <?php
                    
                                woocommerce_quantity_input(
                                    array(
                                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                                        'class'       => 'w-commerce-commerceaddtocartquantityinput quantity',
                                    )
                                );
                            ?>
                    
                            <button type="submit" style="background-color: rgb(255, 255, 255); color: rgb(62, 61, 59);" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="w-commerce-commerceaddtocartbutton add-to-cart-button text-style-allcaps"><?php echo esc_html( 'Tilføj til kurv' ); ?></button>

                            <div style="width: 0%;" class="line-bottom"></div>
                            <div style="height: 0%;" class="line-right"></div>
                            <div style="width: 0%;" class="line-top"></div>
                            <div style="height: 0%;" class="line-left"></div>

                        </form>
                    
                        <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
                    
                    <?php endif; ?>

                    <div style="display: none;" class="w-commerce-commerceaddtocartoutofstock">
                        <div>This product is out of stock.</div>
                    </div>
                    <div data-node-type="commerce-add-to-cart-error" style="display: none;" class="w-commerce-commerceaddtocarterror">
                        <div
                            data-node-type="commerce-add-to-cart-error"
                            data-w-add-to-cart-quantity-error="Product is not available in this quantity."
                            data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart."
                            data-w-add-to-cart-mixed-cart-error="You can’t purchase another product with a subscription."
                            data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item."
                            data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site."
                            data-w-add-to-cart-select-all-options-error="Please select an option in each set."
                        >
                            Product is not available in this quantity.
                        </div>
                    </div>
                </div>

                <?php if( !empty( $product_faqs ) ): ?>
                    <div
                        style="
                            opacity: 1;
                            -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        "
                        data-current="Tab 1"
                        data-easing="ease"
                        data-duration-in="300"
                        data-duration-out="100"
                        class="tabs-second w-tabs"
                    >
                        <div class="w-tab-menu">
                            <?php
                                $counter_faq = 1; 
                                foreach( $product_faqs as $item ): 
                                $className = '';
                                if( $counter_faq === 1 ){
                                    $className = 'w--current';
                                }
                                ?>
                                <a data-w-tab="Tab <?php echo  $counter_faq; ?>" class="tab-link-shop shop w-inline-block w-tab-link <?php echo $className; ?>">
                                    <div class="text-block-5">
                                        <?php echo $item['faq_title'] ?>
                                    </div>
                                </a>
                            <?php $counter_faq++;endforeach; ?>
                        </div>
                        <div class="w-tab-content">
                            <?php
                                $counter_faq_two = 1; 
                                foreach( $product_faqs as $item ): 
                                $className_two = '';
                                if( $counter_faq_two === 1 ){
                                    $className_two = 'w--tab-active';
                                }
                                ?>
                                <div data-w-tab="Tab <?php echo  $counter_faq_two; ?>" class="tab-pane-tab w-tab-pane <?php echo $className_two; ?>">
                                    <p class="main-text text-size-regular shop">
                                        <?php echo $item['faq_short_des'] ?>
                                    </p>
                                </div>
                            <?php $counter_faq_two++;endforeach; ?>

                        </div>
                    </div>
                <?php endif; ?>

                <div class="column display-flex-vertical margin-top"></div>
            </div>
        </div>
    </div>

<?php 
     $faq_title = carbon_get_post_meta( get_the_ID(), 'single_product_faq_title' );
    $faqs = carbon_get_post_meta( get_the_ID(), 'single_product_faqs' );
    if( $faq_title && $faqs ):
    ?>
    <div class="container faq">
        <div
            data-w-id="c7438835-bae5-f7ad-78d8-0c0e1efcec9b"
            style="
                -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                opacity: 1;
            "
            class="main-text text-size-large text-style-allcaps faq-margin"
        >
           
        </div>

        <?php
            if( !empty( $faqs ) ):
            $single_product_counter = 1;
            if( $single_product_counter === 1 ):
                $single_product_counter = 'first-faq';
            endif;
            foreach( $faqs as $item ):
        ?>
            <div data-hover="false" style="opacity: 1;" class="dropdown <?php echo  $single_product_counter; ?> w-dropdown">
                <div class="dropdown-toggle w-dropdown-toggle">
                    <div class="w-icon-dropdown-toggle"></div>
                    <div class="text-block-8 text-block-10">
                        <?php echo $item['prodict_faq_title']; ?>
                    </div>
                </div>
                <nav class="dropdown-list w-dropdown-list">
                    <p class="paragraph-2"><?php echo $item['product_faq_short_des']; ?></p>
                </nav>
            </div>
        <?php $single_product_counter++;endforeach;endif; ?>

    </div>
<?php endif; ?>

<!-- keto rightbar -->
    <div class="specialist-section wf-section topRedBorder">
        <div data-current="Tab 1" data-easing="ease" data-duration-in="800" data-duration-out="400" class="tabs w-tabs">
            <div class="tabs-content w-tab-content">
                <div data-w-tab="Tab 1" class="tab-pane w-tab-pane w--tab-active">
                    <div class="column max-width container padding-vertical padding-custom-third">
                        <div class="main-text heading-small secondary-font margin-bottom"><strong>KETO </strong>specialists</div>
                        <div class="image overflow-hidden show-tablet">
                            <img
                                sizes="(max-width: 479px) 91vw, (max-width: 767px) 84vw, 100vw"
                                srcset="images/1_1-p-500.jpeg 500w, images/1_1-p-800.jpeg 800w, images/1_1-p-1080.jpeg 1080w, images/1_1.jpg 1214w"
                                src="images/1_1.jpg"
                                loading="lazy"
                                alt=""
                                class="menu-image"
                            />
                        </div>
                        <div class="main-text text-style-allcaps text-size-medium secondary-font text-weight-bold">Doc. Helena Miels</div>
                        <div class="main-text secondary-font text-size-regular">Keto specialst- lorem ipsum</div>
                        <p class="main-paragraph text-size-medium text-weight-bold secondary-font">Vi er dedikeret til at give vores kunder den bedst mulige spiseoplevelse, og det starter med at sikre, at al vores mad er halalvenlig.</p>
                    </div>
                    <div class="image overflow-hidden hide-tablet">
                        <img
                            sizes="(max-width: 767px) 100vw, (max-width: 991px) 495.6666564941406px, 50vw"
                            srcset="images/chefs-p-500.jpg 500w, images/chefs-p-800.jpg 800w, images/chefs-p-1080.jpg 1080w, images/chefs-p-1600.jpg 1600w, images/chefs.jpg 1988w"
                            src="images/chefs.jpg"
                            loading="lazy"
                            alt=""
                            class="menu-image specialist"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="line hide-tablet"></div>
    </div>
<?php endif ?>

    <div class="container">
        <div class="row display-flex-horizontal second margin-bottom">
            <div class="main-text heading-large text-style-allcaps second">Andre menuer</div>
        </div>
    </div>
    <div class="collection-list-wrapper-product w-dyn-list">
        <div role="list" class="collection-list-grid-3-columns padding w-dyn-items">
            <div role="listitem" class="collection-item no-border w-dyn-item">
                <a data-w-id="cb686c6a-d5f0-a210-64ee-7163283b89be" style="opacity: 0;" href="#" class="card-product container hover-shop w-inline-block">
                    <div class="overflow-hidden">
                        <img
                            sizes="(max-width: 479px) 92vw, (max-width: 767px) 95vw, (max-width: 991px) 37vw, (max-width: 1439px) 24vw, 22vw"
                            loading="lazy"
                            style="
                                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);
                                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);
                                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);
                                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);
                            "
                            src="images/ris.png"
                            srcset="images/ris-p-500.png 500w, images/ris-p-800.png 800w, images/ris-p-1080.png 1080w, images/ris.png 1100w"
                            alt=""
                            class="main-image"
                        />
                    </div>
                    <div class="info-card-wrapper padding-vertical padding-small display-flex-horizontal">
                        <div class="column">
                            <div class="main-text text-size-medium secondary-font text-style-allcaps text-weight-bold">Catering menu</div>
                            <div class="row display-flex-horizontal second">
                                <div class="main-text text-size-regular margin-top margin-xsmall text-color-white">This is some text inside of a div block.</div>
                            </div>
                        </div>
                        <div class="column text-color-white">
                            <div class="main-text text-size-medium">159,-</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="filter fixed"></div>
</div>


<?php 
get_footer();