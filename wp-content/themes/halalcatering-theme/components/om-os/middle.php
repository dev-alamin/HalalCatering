<?php 
    $data = getData();
?>

    <?php if( !empty( $data['section_title'] ) ): ?>
        <div class="container padding-custom3">
            <h3
                data-w-id="60066ee7-0f4f-1972-083c-51d7b7f48988"
                style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                class="main-heading secondary-font heading-medium text-style-allcaps wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay="0s"
            >
                <?php echo $data['section_title']; ?>
            </h3>
        </div>
    <?php endif; ?>

    <div data-w-id="f0f3892b-dde8-d0bb-d621-c61a8baf10f3" class="components-section position-relative display-flex wf-section om-os-section">

        <?php
                $scroll_counter = 200;
                if( !empty( $data['animated_text'] ) ):
                $right_section_class = '';
                $counter_for_slider = 2;

                foreach( $data['animated_text'] as $key=>$text ):
                
                if( $counter_for_slider%2==0 ):
                    $right_section_class = 'left-to-right';
                    else:
                    $right_section_class = '';
                endif;
        ?>
        <div class="container <?php echo $right_section_class; ?>" speed="<?php echo $scroll_counter; ?>">
            <div class='scrolling-text'>
            <h2 class="scrolling-text-content main-text heading-xlarge secondary-font text-style-allcaps opacity"><?php echo $text['title']; ?></h2>
            </div>
        </div>

        <?php  $counter_for_slider+=1;$scroll_counter+=30;endforeach;endif; ?>

        <div class="container-image position-absolute">
            <div class="overflow-hidden max-width">
                <img
                    src="<?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?>"
                    loading="lazy"
                    style="transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
                    data-w-id="97b4239c-0551-6769-05a3-e4116614630e"
                    srcset="<?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 500w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 800w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 1080w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 1600w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 2000w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 3000w"
                    sizes="(max-width: 479px) 100vw, (max-width: 991px) 300px, (max-width: 1439px) 454px, 28vw"
                    alt=""
                    class="main-image  wow fadeInUp"
                    data-wow-duration="1s"
                    data-wow-delay="0s"
                />
            </div>
            <?php if( !empty( $data['trademark'] ) ): ?>
            <img
                src="<?php echo wp_get_attachment_image_url( $data['trademark'],'full' ) ?>"
                loading="lazy"
                alt=""
                class="main-image position-absolute about"
                style="will-change: transform; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
            />
            <?php endif; ?>
        </div>
    </div>
