<?php 
    $data = getData();
?>
<div class="specialist-section wf-section">
    <div data-easing="ease" data-duration-in="800" data-duration-out="400" class="tabs w-tabs">
    <div class="tabs-content w-tab-content">
        <div class="tab-pane w-tab-pane w--tab-active">
        <div class="column max-width container padding-vertical padding-custom-third">

            <?php if( !empty( $data['title'] ) ): ?>
                <div class="main-text heading-small secondary-font margin-bottom">
                    <?php echo $data['title']; ?>
                </div>
            <?php endif; ?>

            <div class="image overflow-hidden show-tablet"><img sizes="(max-width: 479px) 91vw, (max-width: 767px) 84vw, 100vw" srcset="<?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 500w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 800w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 1214w" src="<?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?>" loading="lazy" alt="" class="menu-image"></div>
            
            <?php if( !empty( $data['name'] ) ): ?>
                <div class="main-text text-style-allcaps text-size-medium secondary-font text-weight-bold"><?php echo $data['name']; ?></div>
            <?php endif; ?>

            <?php if( !empty( $data['designation'] ) ): ?>
                <div class="main-text secondary-font text-size-regular">
                    <?php echo $data['designation']; ?>
                </div>
            <?php endif; ?>

            <?php if( !empty( $data['short_des'] ) ): ?>
                <p class="main-paragraph text-size-medium text-weight-bold secondary-font">
                    <?php echo $data['short_des']; ?>
                </p>
            <?php endif; ?>

        </div>
        <div class="image overflow-hidden hide-tablet"><img sizes="(max-width: 767px) 100vw, (max-width: 991px) 495.6666564941406px, 50vw" srcset="<?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 500w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 800w,<?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 1600w, <?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?> 1988w" src="<?php echo wp_get_attachment_url( $data['feature_image'],'full' ); ?>" loading="lazy" alt="" class="menu-image specialist"></div>
        </div>
    </div>
    </div>
    <div class="line hide-tablet"></div>
</div>