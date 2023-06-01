<?php
    $data = getData();
?>


<div class="partner-results">
    <div class="container">
        
        <?php if( !empty( $data['section_title'] ) ): ?>
            <h2 data-aos="fade-up" data-aos-delay="50"  data-aos-duration="1000">
                <?php echo $data['section_title']; ?>
            </h2>
        <?php endif; ?>

        <div class="description-wrapper">
            <div class="half-width" data-aos="fade-left" data-aos-delay="100"  data-aos-duration="1000">
                <?php if( !empty( $data['video_url'] ) ): ?>
                    <div class="video-wrapper">
                        <iframe src="<?php echo $data['video_url']; ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>
            </div>
            <div class="half-width content" data-aos="fade-right" data-aos-delay="150"  data-aos-duration="1000">
                
                <?php if( !empty( $data['title'] ) ): ?>
                    <h3><?php echo $data['title']; ?></h3>
                <?php endif; ?>

                <?php if( !empty( $data['investor_name'] ) ): ?>
                    <h4><?php echo $data['investor_name']; ?></h4>
                <?php endif; ?>

                <?php if( !empty( $data['short_des'] ) ): ?>
                    <p><?php echo $data['short_des']; ?></p>
                <?php endif; ?>

                <?php if( !empty( $data['btn_url'] ) ): ?>
                    <a href="<?php echo $data['btn_url']; ?>" class="btn-primary">
                        <?php echo esc_html_e('Ready to Scale ?','halalcatering'); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>

        <?php 
            if( !empty( $data['description_investor'] ) ): ?>
            <div class="extra-description" data-aos="fade-up" data-aos-delay="200"  data-aos-duration="1000">
                
                <?php if( !empty( $data['crb_content'] ) ): ?>
                    <?php echo $data['crb_content']; ?>
                <?php endif; ?>

                <?php if( !empty( $data['btn_url'] ) ): ?>
                    <a href="<?php echo $data['btn_url']; ?>" class="btn-primary">
                        <?php echo esc_html_e('Ready to Scale ?','halalcatering'); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>