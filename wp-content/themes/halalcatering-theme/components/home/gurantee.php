<?php
    $data = getData();
?>

<section class="guarantee half-to-half">
    <div class="container">
        <div class="content">
            <?php if( !empty( $data['title'] ) ): ?>
                <h2 data-aos="fade-up" data-aos-delay="50"  data-aos-duration="1000">
                    <?php echo $data['title']; ?>
                </h2>
            <?php endif; ?>

            <?php if( !empty( $data['short_description'] ) ): ?>
                <p data-aos="fade-up" data-aos-delay="120"  data-aos-duration="1000">
                    <?php echo $data['short_description']; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="thumbnail" data-aos="fade-up" data-aos-delay="150"  data-aos-duration="1000">
            <?php
                if( !empty( $data['feature_image'] ) ): 
                    echo wp_get_attachment_image(  $data['feature_image'],'full',array( "alt" => $data['title']) );
                endif;
            ?>
        </div>
    </div>
</section>