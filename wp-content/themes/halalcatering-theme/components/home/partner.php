<?php
    $data = getData();
?>

<section class="partner-section">
    <div class="container">

        <?php if( !empty( $data['title'] ) ): ?>
            <h2><?php echo $data['title']; ?></h2>
        <?php endif; ?>

        <?php if( !empty( $data['partners'] ) ): ?>
            <div class="partner-wrapper">
                <?php foreach( $data['partners'] as $item ): ?>
                    <figure>
                        <?php echo wp_get_attachment_image(  $item['partner_logo'],'full',array( "alt" => $data['title']) ); ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>