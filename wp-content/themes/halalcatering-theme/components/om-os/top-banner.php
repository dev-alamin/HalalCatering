<?php 
    $data = getData();
?>

<div class="filter fixed"></div>
    <div class="container padding-custom-first about">
        <div class="row display-flex-horizontal">
            <?php if( !empty( $data['section_title'] ) ): ?>
                <h1
                    data-w-id="0f258dc8-4e36-9854-2c26-fdab056c350c"
                    class="wow fadeInUp main-heading heading-xlarge text-style-allcaps margin-top"
                    data-wow-duration="1s"
                    data-wow-delay="0s"
                >
                    <?php echo esc_html_e( $data['section_title'],'halalcatering' ); ?>
                </h1>
            <?php endif; ?>

            <?php if( !empty( $data['sub_title'] ) ): ?>
                <div class="paragraph-wrap">
                    <p
                        data-w-id="3fefc020-099a-9b0b-75b9-0b11dc417a77"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        class="wow fadeInUp main-paragraph text-size-large text-weight-semibold max-width text-align-right"
                        data-wow-duration="1s"
                        data-wow-delay="0s"
                    >
                        Stay fit_
                    </p>
                    <p
                        data-w-id="3fefc020-099a-9b0b-75b9-0b11dc417a79"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        class="wow fadeInUp main-paragraph text-size-large text-weight-semibold max-width"
                        data-wow-duration="1s"
                        data-wow-delay="0s"
                    >
                        <?php echo esc_html_e( $data['sub_title'],'halalcatering' ); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div class="row padding-top padding-large">
        <div class="w-layout-grid grid-2-columns custom-columns">
            <?php if( !empty( $data['feature_image_one'] ) ): ?>
                <div 
                    id="w-node-_16b9fae0-01e6-beda-1d11-addf8db6c562-17d51d7c" 
                    class="column padding-bottom hide-tablet"
                    >
                    <img
                        src="<?php echo wp_get_attachment_image_url( $data['feature_image_one'],'full' ) ?>"
                        loading="lazy"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        data-w-id="b77d147d-63d9-2dc2-1ffc-777cbffd3c82"
                        srcset="<?php echo wp_get_attachment_image_url( $data['feature_image_one'],'full' ) ?> 500w, <?php echo wp_get_attachment_image_url( $data['feature_image_one'],'full' ) ?> 750w"
                        sizes="100vw"
                        alt=""
                        class="main-image"
                    />
                </div>
            <?php endif; ?>
            <div id="w-node-b1451217-6216-9098-e6f4-ba4929e5c262-17d51d7c" class="column padding">
                <div class="overflow-hidden">
                    <img
                        src="<?php echo wp_get_attachment_image_url( $data['feature_image_two'],'full' ) ?>"
                        loading="lazy"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        data-w-id="6701150c-6c2b-52a5-acbf-a242b06160f4"
                        srcset="<?php echo wp_get_attachment_image_url( $data['feature_image_two'],'full' ) ?> 500w, <?php echo wp_get_attachment_image_url( $data['feature_image_two'],'full' ) ?> 800w, <?php echo wp_get_attachment_image_url( $data['feature_image_two'],'full' ) ?> 1080w, <?php echo wp_get_attachment_image_url( $data['feature_image_two'],'full' ) ?> 1100w"
                        sizes="(max-width: 479px) 92vw, (max-width: 767px) 95vw, (max-width: 991px) 88vw, 100vw"
                        alt=""
                        class="main-image about wow fadeInUp"
                        data-wow-duration="1s"
                        data-wow-delay="0s"
                    />
                </div>
                <?php if( !empty( $data['short_description'] ) ): ?>
                    <p
                        data-w-id="beb5a472-ef51-cf5d-ec9d-290aaa471203"
                        style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                        class="main-paragraph text-size-medium max-width margin-top margin-xxlarge wow fadeInUp"
                        data-wow-duration="1s"
                        data-wow-delay="0s"
                    >
                        <?php echo $data['short_description']; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>