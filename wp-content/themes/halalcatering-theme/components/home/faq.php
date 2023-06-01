<?php
    $data = getData();
?>

<div class="container bottompad wf-section">
    
      <?php if( !empty( $data['title'] ) ): ?>
        <div class="main-text secondary-font text-weight-bold second makerromtop">
            <?php echo $data['title']; ?>
        </div>
      <?php endif; ?>

      <?php 
        if( !empty( $data['fq_items'] ) ): 
        foreach( $data['fq_items'] as $item ):
        ?>
        <div data-hover="false" data-delay="0" data-w-id="68f0ad26-1c26-b509-4f4b-fa819b5be143" style="opacity:1" class="dropdown-2 w-dropdown">
            <div class="dropdown-toggle-2 firstfaq w-dropdown-toggle">
            <div class="w-icon-dropdown-toggle"></div>
                <?php if( !empty( $item['title'] ) ): ?>
                    <div class="text-block-10 faqfont"> <?php echo $item['title']; ?></div>
                <?php endif; ?>
            </div>
            <?php if( !empty( $item['short_des'] ) ): ?>
                <nav class="dropdown-list-2 w-dropdown-list">
                    <p class="paragraph-3 fontans">
                        <?php echo $item['short_des']; ?>
                    </p>
                </nav>
            <?php endif; ?>
        </div>
      <?php endforeach;endif; ?>

      <div class="form formpaading w-form styleForm">
         <?php echo do_shortcode( '[contact-form-7 id="173" title="Get In Touch" html_class="form-second"]' ) ?>
      </div>
</div>