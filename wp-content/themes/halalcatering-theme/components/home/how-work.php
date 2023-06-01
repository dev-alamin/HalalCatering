<?php
    $data = getData();
?>

<section class="how-works">
    <div class="container">
        <div class="section-head">

            <?php if( !empty( $data['title'] ) ): ?>
                <h2 data-aos="fade-up" data-aos-delay="50"  data-aos-duration="1000">
                    <?php echo $data['title']; ?>
                </h2>
            <?php endif; ?>

            <?php if( !empty( $data['short_des'] ) ): ?>
                <p data-aos="fade-up" data-aos-delay="120"  data-aos-duration="1000">
                    <?php echo $data['short_des']; ?>
                </p>
            <?php endif; ?>

        </div>

        <?php  if( !empty( $data['work_items'] ) ): ?>
            <div class="section-wrapper">
                <?php  foreach( $data['work_items'] as $item ): ?>
                    <div class="item" data-aos="fade-right" data-aos-delay="140"  data-aos-duration="1000">
                        <img src="src/images/icon/01.png" alt="<?php echo $item['title']; ?>">
                        <?php
                            if( !empty( $item['feature_image'] ) ): 
                                echo wp_get_attachment_image(  $item['feature_image'],full,array( "alt" => $item['title']) );
                            endif;
                        ?>

                        <?php if( !empty( $item['title'] ) ): ?>
                            <h3><?php echo $item['title']; ?></h3>
                        <?php endif; ?>

                        <?php if( !empty( $item['short_des'] ) ): ?>
                            <p><?php echo $item['short_des']; ?></p>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>