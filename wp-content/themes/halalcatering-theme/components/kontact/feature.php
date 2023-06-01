<?php
    $data = getData();
?>
    <div class="filter fixed"></div>
    <div class="container padding-custom-first contact">
        <h1
            data-w-id="eaf20e1c-873c-d9d6-cbd6-4b139445270e"
            style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
            class="main-heading heading-large text-style-allcaps wow fadeInUp"
            data-wow-duration="1s"
            data-wow-delay="0s"
        >
            Kontakt os her
        </h1>
        <p
            data-w-id="926b5c67-f0fc-b1ec-5f9d-6aede5101b0d"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
            class="main-paragraph text-size-medium max-width margin-top margin-large wow fadeInUp"
            data-wow-duration="1s"
            data-wow-delay="0s"
        >
            <?php
                if( !empty( $data['short_description'] ) ): 
                    echo $data['short_description'];
                endif;
                ?>

                <?php
                if( !empty( $data['address'] ) ): 
                    echo $data['address'];
                endif;
                ?>

            <?php  if( !empty( $data['email'] ) ):  ?>
                <a href="mailto::<?php echo $data['email'] ?>" class="link hover">
                    <?php echo $data['email'] ?>
                </a><br />
            <?php endif; ?>

            <?php  if( !empty( $data['phone'] ) ):  ?>
                <?php echo $data['phone'] ?>
            <?php endif; ?>
        </p>
        <img
            src="<?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?>"
            loading="lazy"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
            data-w-id="4fc0226b-b60e-6034-d07d-6597025b1c45"
            srcset="<?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 500w, <?php echo wp_get_attachment_image_url( $data['feature_image'],'full' ) ?> 1000w"
            sizes="(max-width: 479px) 92vw, (max-width: 767px) 95vw, (max-width: 991px) 84vw, (max-width: 1439px) 820px, 57vw"
            alt=""
            class="contact-image wow fadeInUp"
            data-wow-duration="1s"
            data-wow-delay="0s"
        />
    </div>
