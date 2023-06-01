<?php
    $data = getData();
?>

    
<div class="instagram-section wf-section">
      <div data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64a7" class="main-text heading-small secondary-font margin-bottom">Følg os på Instagram</div>
      <a data-w-id="c08cff61-b01e-3d06-836f-75a83f4134e2" href="https://www.instagram.com/" target="_blank" class="overflow-hidden hover w-inline-block">
        <div data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64ab" class="main-text secondary-font text-weight-bold text-size-large">@halalCatering</div>
        <div class="line position-absolute"></div>
      </a>

      <?php $counter = 1; foreach( $data['instragram_gallery'] as $item ): ?>
        <?php if( !empty( $item ) && $counter === 1 ): ?>
            <div class="wrap-image-instagram position-absolute first"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64ae" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 2 ): ?>
            <div class="wrap-image-instagram position-absolute second"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64b0" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 3 ): ?>
            <div class="wrap-image-instagram position-absolute tenth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64b2" sizes="10vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 4 ): ?>
            <div class="wrap-image-instagram position-absolute seventh"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64b4" sizes="10vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 800w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 5 ): ?>
            <div class="wrap-image-instagram position-absolute third"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64b6" sizes="9vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 800w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 6 ): ?>
            <div class="wrap-image-instagram position-absolute eleventh"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64b8" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 7 ): ?>
            <div class="wrap-image-instagram position-absolute ninenth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64ba" sizes="15vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 8 ): ?>
            <div class="wrap-image-instagram position-absolute eighth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64bc" sizes="13vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 9 ): ?>
            <div class="wrap-image-instagram position-absolute fourth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64be" sizes="14vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 800w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 10 ): ?>
            <div class="wrap-image-instagram position-absolute sixth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64c0" sizes="17vw" srcset="<?php echo wp_get_attachment_url($item,'full'); ?> 500w, <?php echo wp_get_attachment_url($item,'full'); ?> 1000w" alt=""></div>
        <?php endif; ?>
        <?php if( !empty( $item ) && $counter === 11 ): ?>
            <div class="wrap-image-instagram position-absolute fifth"><img src="<?php echo wp_get_attachment_url($item,'full'); ?>" loading="lazy" data-w-id="aeaae4d9-a819-3082-49cf-e9aca10d64c2" alt=""></div>
        <?php endif; ?>
      <?php $counter++;endforeach; ?>
      
    
    </div>
  </div>