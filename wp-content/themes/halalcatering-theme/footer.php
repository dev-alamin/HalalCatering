<?php
    /**
     * The template for displaying the footer
     *
     * Contains the closing of the #content div and all content after
     *
     * @package understrap
     */

    // Exit if accessed directly.
    defined('ABSPATH') || exit;

?>


<div class="footer">
    <div class="filter"></div>
    <div class="container display-flex-horizontal">
      
      <!-- footer left section -->
      <div class="column max-width">
        <?php if( !empty( carbon_get_theme_option('footer_title') ) ): ?>
            <div class="main-text text-color-white text-size-medium text-style-allcaps secondary-font text-weight-bold">
                <?php echo carbon_get_theme_option('footer_title'); ?>
            </div>
        <?php endif; ?>
       
        <div class="main-form w-form">

          <?php if( !empty( carbon_get_theme_option('footer_form') ) ): ?>
              <?php echo do_shortcode( carbon_get_theme_option('footer_form') ); ?>
          <?php endif; ?>
          
        </div>
      </div>
      <!-- end footer left section -->
      <div class="column max-width second">
        <div class="w-layout-grid grid-3-columns footer">
          <div class="column display-flex-vertical">
            <?php if( !empty( carbon_get_theme_option('menu_title') ) ): ?>
                <div class="heading-footer text-style-allcaps text-size-regular secondary-font text-weight-bold text-color-white margin-bottom margin-small">
                  <?php echo carbon_get_theme_option('menu_title'); ?>
                </div>
            <?php endif; ?>

            <?php 
              if( !empty( carbon_get_theme_option('footer_menu') ) ):
              foreach( carbon_get_theme_option('footer_menu') as $item ):
              ?>
            <div class="overflow-hidden margin-bottom margin-xsmall hover">
              <a href="<?php echo $item['menu_links']; ?>" aria-current="page" class="main-link text-size-small text-color-white text-style-allcaps secondary-font w--current">
                <?php echo $item['menu_text']; ?>
              </a>
              <div class="line position-absolute"></div>
            </div>
            <?php endforeach;endif; ?>

          </div>
          <div class="column display-flex-vertical">
            <?php if( !empty( carbon_get_theme_option('address_title') ) ): ?>
              <div class="heading-footer text-style-allcaps text-size-regular secondary-font text-weight-bold text-color-white margin-bottom margin-small"><?php echo carbon_get_theme_option('address_title'); ?></div>
            <?php endif; ?>

            <?php if( !empty( carbon_get_theme_option('halal_adress') ) ): ?>
              <div class="overflow-hidden margin-bottom margin-xsmall hover">
                <div class="line position-absolute"></div>
                <p class="paragraph"><?php echo carbon_get_theme_option('halal_adress'); ?></p>
              </div>
            <?php endif; ?>
            <div class="overflow-hidden margin-bottom margin-xsmall hover">
              <div class="line position-absolute"></div>
            </div>
            <div class="overflow-hidden margin-bottom margin-xsmall hover">
              <div class="line position-absolute"></div>
            </div>
          </div>
          <div class="column display-flex-vertical">
            <?php if( !empty( carbon_get_theme_option('social_menu_title') ) ): ?>
              <div class="heading-footer text-style-allcaps text-size-regular secondary-font text-weight-bold text-color-white margin-bottom margin-small">
                <?php echo carbon_get_theme_option('social_menu_title'); ?>
              </div>
            <?php endif; ?>

            <?php 
              if( !empty( carbon_get_theme_option('social_menus') ) ):
              foreach( carbon_get_theme_option('social_menus') as $item ):
            ?>

            <div class="overflow-hidden margin-bottom margin-xsmall hover">
              <a href="<?php echo $item['menu_links']; ?>" class="main-link text-size-small text-color-white text-style-allcaps secondary-font">
                <?php echo $item['menu_text']; ?>
              </a>
              <div class="line position-absolute"></div>
            </div>
            <?php endforeach;endif; ?>

          </div>
        </div>
      </div>
    </div>
    <?php if( !empty( carbon_get_theme_option('copyright_section') ) ): ?>
      <div class="container display-flex-horizontal">
        <div class="main-text text-color-white text-size-small secondary-font">&copy; <?php echo date('Y'); ?> <?php echo carbon_get_theme_option('copyright_section'); ?></div>
        <div class="main-text text-color-white text-size-small secondary-font footerlastpad"></div>
      </div>
  <?php endif; ?>

  </div>

        <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
        <?php wp_footer();?>
    </body>
</html>