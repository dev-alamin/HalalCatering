<?php 
    $data = getData();
?>

<div class="container padding-top padding-custom-second recipes">
        <?php if( !empty( $data['section_title'] ) ): ?>
            <div class="main-text text-style-allcaps heading-large text-weight-xbold secondary-font white">
                <?php echo $data['section_title']; ?>
            </div>
        <?php endif; ?>
        
        <?php if( !empty( $data['section_short_description'] ) ): ?>
            <div class="text-block">
                <?php echo $data['section_short_description']; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if( !empty( $data['feature_lists'] ) ): ?>
        <div class="container border-top margin-bottom-60">
            <div>
                <div role="list" class="collection-list-grid-3-columns border w-dyn-items">
                    
                    <?php foreach( $data['feature_lists'] as $item ): ?>
                        <div role="listitem" class="collection-item-recipe w-dyn-item">
                            <div class="link-recipes-card hover-blog w-inline-block">
                                <div class="overflow-hidden max-width-full">
                                    <img loading="lazy" src="<?php echo wp_get_attachment_image_url($item['feature_image'],'full'); ?>" alt="" class="main-image blog" />
                                </div>
                                <?php if( !empty( $item['name'] ) ): ?>
                                    <div class="card-title text-color-white text-size-large margin-top margin-medium secondary-font">
                                        <?php echo $item['name']; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( !empty( $item['designation'] ) ): ?>
                                    <div class="text-block-4"><?php echo $item['designation']; ?></div>
                                <?php endif; ?>

                                <?php if( !empty( $item['short_description'] ) ): ?>
                                    <p class="main-paragraph text-size-regular text-color-white margin-vertical margin-small">
                                        <?php echo $item['short_description']; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
