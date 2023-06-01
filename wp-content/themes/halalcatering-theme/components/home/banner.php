<?php
    $data = getData();
?>

<section class="hero-section wf-section">
    <div data-w-id="d3bb08eb-243e-63e8-1f01-3e8b47140bb5" style="opacity: 0;" class="main-image hero first"></div>
    <?php if( !empty( $data['video'] ) ): ?>
        <div
            data-poster-url="<?php echo wp_get_attachment_url($data['video_poster']); ?>"
            data-video-urls="<?php echo wp_get_attachment_url($data['video']); ?>"
            data-autoplay="true"
            data-loop="true"
            data-wf-ignore="true"
            class="background-video main-image w-background-video w-background-video-atom relative"
        >
            <video id="88ca279c-820e-911c-200e-858cec15c475-video" autoplay="" loop="" style="background-image: url('<?php echo wp_get_attachment_url($data['video_poster']); ?>');" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                <source src="<?php echo wp_get_attachment_url($data['video']); ?>" data-wf-ignore="true" />
                <source src="<?php echo wp_get_attachment_url($data['video']); ?>" data-wf-ignore="true" />
            </video>
            <?php if( !empty( $data['title'] ) ): ?>
                <p class="videoText main-paragraph text-size-large text-weight-semibold max-width">
                    <?php echo $data['title']; ?>
                </p>
            <?php endif; ?>  
        </div>
    <?php endif; ?>

    <?php if( !empty( $data['short_description'] ) ): ?>
        <div data-w-id="5435468c-5aff-0c86-a6a1-e82d1c8c3b58" class="container padding-vertical padding-xlarge">
            <h3 data-w-id="6dc1c52c-e64e-1e24-d3ce-decc2b4027bc" class="main-heading secondary-font heading-medium text-style-allcaps">
                <?php echo $data['short_description']; ?>
            </h3>
        </div>
    <?php endif; ?>

</section>
