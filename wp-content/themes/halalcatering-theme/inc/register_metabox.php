<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Widget;

add_action( 'carbon_fields_register_fields', 'custom_meta_fields' );

function custom_meta_fields() {

    $main_theme_options = Container::make( 'theme_options', __( 'General Setting','halalcatering' ) )

    ->set_icon('dashicons-admin-generic')
    ->set_page_menu_position( 8 )
    ->add_tab( __( 'General','halalcatering' ), array(
        Field::make( 'image', 'company_logo', __( 'Company Logo','halalcatering' ) )
        ->set_help_text( 'Image size height:111px width: 183px' ),
        Field::make( 'text', 'email_address', __( 'Email','halalcatering' ) ),
        Field::make( 'text', 'calendy_link', __( 'Calendy Link','halalcatering' ) ),
        Field::make( 'header_scripts', 'crb_header_scripts', __( 'Header Scripts','halalcatering' ) ),
        Field::make( 'footer_scripts', 'crb_footer_scripts', __( 'Footer Scripts','halalcatering' ) ),
    ))

    ->add_tab( __( 'Menus','halalcatering' ), array(
        Field::make( 'complex', 'menus', __( 'Add Menu' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'menu_text', 'Menus Text' ),
            Field::make( 'text', 'menu_links', 'Menus Link' )
        ) ),
    ))

    ->add_tab( __( 'Single product page','halalcatering' ), array(
        Field::make( 'text', 'single_product_faq_title', 'Single product FAQ Title' ),
        Field::make( 'complex', 'single_product_faqs', __( 'Single Product FAQ' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'prodict_faq_title', 'Title' ),
            Field::make( 'textarea', 'product_faq_short_des', 'Short Description' )
        ) ),

    ))

    ->add_tab( __( 'Single product half to half section','halalcatering' ), array(

        // half to half section
        Field::make( 'text', 'single_half_to_half_title', 'Title' ),
        Field::make( 'text', 'single_half_to_half_name', 'Name' ),
        Field::make( 'text', 'single_half_to_half_designation', 'Designation' ),
        Field::make( 'textarea', 'single_half_to_half_short_des', 'Short Description' ),
        Field::make( 'image', 'single_half_to_half_feature_image', 'Feature Image' ),
    ))

    ->add_tab( __( 'Footer Section','halalcatering' ), array(
        Field::make( 'text', 'footer_title', 'Footer Title' ),
        Field::make( 'text', 'footer_form', 'Footer FORM' ),
        Field::make( 'text', 'copyright_section', 'Copyright' ),
        Field::make( 'text', 'menu_title', 'Menu Title' ),
        Field::make( 'complex', 'footer_menu', __( 'Footer Menu' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'menu_text', 'Menus Text' ),
            Field::make( 'text', 'menu_links', 'Menus Link' )
        ) ),
        Field::make( 'text', 'address_title', 'Address Title' ),
        Field::make( 'textarea', 'halal_adress', 'Address' ),
        Field::make( 'text', 'social_menu_title', 'Social Menu Title' ),
        Field::make( 'complex', 'social_menus', __( 'Add Social Menu' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'menu_text', 'Menus Text' ),
            Field::make( 'text', 'menu_links', 'Menus Link' )
        ) ),
    ));

    Container::make('post_meta', __('Product Information','dr_gazi'))
    ->where('post_type', '=', 'product')
    ->add_fields(array(
        Field::make( 'radio', 'have_additional', __( 'Have Additional Product Or Not' ) )
        ->set_options( array(
            '1' => 'No',
            '2' => 'Yes',
        ) ),
        Field::make( 'textarea', 'product_home_title', __( 'Product Info' ) ), 
        Field::make( 'text', 'product_menu_name', __( 'Product Menu Name' ) ),

        // product image top title
        Field::make( 'text', 'product_feature_image_top_title', __( 'Product Image top Information' ) ), 
        Field::make( 'textarea', 'product_feature_image_top_short_des', __( 'Product Image top short description' ) ),
        Field::make( 'textarea', 'product_single_page_short_description', __( 'Single Page Short Description' ) ),

        // product additional price
        Field::make( 'complex', 'additional_price', __( 'Additional price & item' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'additional_price_title', 'Title' ),
            Field::make( 'textarea', 'additional_price_short_des', 'Short Description' ),
            Field::make( 'text', 'product_price', 'Price' ),
            Field::make( 'text', 'product_amount', 'Amount' ),
            Field::make( 'text', 'product_extra_info', 'Extra Info' ),

            Field::make( 'complex', 'additional_price_extra_info_item', __( 'Add Item' ) )
            ->set_layout('tabbed-vertical')
            ->add_fields( array(
                Field::make( 'image', 'image', 'Image' ),
                Field::make( 'textarea', 'title', 'Title' ),
            ) ), 
        ) ), 

        Field::make( 'complex', 'product_faqs', __( 'Product FAQs' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'faq_title', 'FAQ Title' ),
            Field::make( 'textarea', 'faq_short_des', 'Short Description' )
        ) ), 
    ));

}