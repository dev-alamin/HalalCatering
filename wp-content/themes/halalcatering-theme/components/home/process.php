<?php
    $data = getData();
?>

<div class="container wf-section">

    <?php if( !empty( $data['title'] ) ): ?>
        <h1 class="main-text processtop">
            <?php echo $data['title']; ?>
        </h1>
    <?php endif; ?>

    <?php if( !empty( $data['process_items'] ) ): ?>
        <div class="w-layout-grid grid-2">
            
            <?php foreach( $data['process_items'] as $item ): ?>
                <div id="w-node-_7479cb24-6dea-2d62-6111-4ac6d12344df-3ad51d78">
                    <img src="<?php echo wp_get_attachment_url( $item['feature_icon'],'full' ); ?>" loading="lazy" sizes="100px" srcset="<?php echo wp_get_attachment_url( $item['feature_icon'],'full' ); ?>" alt=" <?php echo $item['title']; ?>" class="image-3">
                    <div class="text-block-11">
                        <?php echo $item['title']; ?>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    <?php endif; ?>
</div>