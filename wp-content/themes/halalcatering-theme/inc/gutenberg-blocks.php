<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('carbon_fields_register_fields', 'halalcatering_register_components');

function halalcatering_register_components()
{

    // Hero banner block
    Block::make( __( 'Hero banner Block','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'file', 'video', 'Background Video' )->set_width(50),
        Field::make( 'image', 'video_poster', 'Video Poster' )->set_width(50),
        Field::make( 'text', 'title', 'Title' ),
        Field::make( 'textarea', 'short_description', 'Short Description' ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Hero banner Block','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/banner' );            
    });

    //@end block

    // What we do
    Block::make( __( 'What we do','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'title', 'Title' ),
        Field::make( 'textarea', 'short_description', 'Short Description' ),
        Field::make( 'textarea', 'video_url', 'Video URL' ),
        Field::make( 'text', 'btn_url', 'Button URL' ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'What we do','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/what-we-do' );            
    });

    //@end block


    // Home Product Section
    Block::make( __( 'Home Product Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'left_title', __( 'Left Title' ) ),
        Field::make( 'text', 'right_title', __( 'Right Title' ) ),
        Field::make( 'image', 'bg_image', __( 'Feature Image' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Home Product Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/products' );            
    });

    //@end block

    // Home Specilist Section
    Block::make( __( 'Home Specilist Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'title', __( 'Title' ) ),
        Field::make( 'text', 'name', __( 'Name' ) ),
        Field::make( 'text', 'designation', __( 'Designation' ) ),
        Field::make( 'textarea', 'short_des', __( 'Short Des' ) ),
        Field::make( 'image', 'feature_image', __( 'Feature Image' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Home Specilist Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/specilist' );            
    });

    //@end block

    // Process Section
    Block::make( __( 'Process Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'title', __( 'Title' ) ),
        Field::make( 'complex', 'process_items', __( 'Process Item' ) )
         ->add_fields( array(
             Field::make( 'image', 'feature_icon', 'Feature Icon' ),
             Field::make( 'text', 'title', __( 'Title' ) ),
         ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Process Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/process' );            
    });

    //@end block

    // FAQ Section
    Block::make( __( 'FAQ Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'title', __( 'Form Title' ) ),
        Field::make( 'complex', 'fq_items', __( 'FAQ ITEM' ) )
         ->add_fields( array(
             Field::make( 'text', 'title', 'Title' ),
             Field::make( 'textarea', 'short_des', __( 'Short Description' ) ),
         ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'FAQ Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/faq' );            
    });

    //@end block

    // Instragram Section
    Block::make( __( 'Instragram Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'title', __( 'Page Title' ) ),
        Field::make( 'text', 'instragram_page', __( 'Instragram Page' ) ),
        Field::make( 'text', 'page_link', __( 'Page Link' ) ),
        Field::make( 'media_gallery', 'instragram_gallery', __( 'Media Gallery' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Instragram Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/home/instragram' );            
    });

    //@end block

    // Shop page Compontent Section
    Block::make( __( 'Shop page Compontent Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'section_title', __( 'Section Title' ) ),
        Field::make( 'text', 'shop_title', __( 'Shop Title' ) ),
        Field::make( 'image', 'banner_image', __( 'Featire Image' ) ),
        Field::make( 'text', 'title', __( 'Progress Title' ) ),
        Field::make( 'complex', 'process_items', __( 'Process Item' ) )
         ->add_fields( array(
             Field::make( 'image', 'feature_icon', 'Feature Icon' ),
             Field::make( 'text', 'title', __( 'Title' ) ),
         ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Shop page Compontent Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/shop/shop' );            
    });

    //@end block

    // OMOS Section
    Block::make( __( 'OMOS Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'section_title', __( 'Section Title' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'OMOS Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/om-os/omos' );            
    });

    //@end block

    // OM OS Top Banner Section
    Block::make( __( 'OM OS Top Banner Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'section_title', __( 'Section Title' ) ),
        Field::make( 'text', 'sub_title', __( 'Subtitle Title' ) ),
        Field::make( 'textarea', 'short_description', __( 'Short Description' ) ),
        Field::make( 'image', 'feature_image_one', __( 'Feature Image One' ) ),
        Field::make( 'image', 'feature_image_two', __( 'Feature Image two' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'OM OS Top Banner Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/om-os/top-banner' );            
    });

    //@end block

    // OM OS Middle Section
    Block::make( __( 'OM OS Middle Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'textarea', 'section_title', __( 'Section Title' ) ),
        Field::make( 'image', 'feature_image', __( 'Feature Image' ) ),
        Field::make( 'image', 'trademark', __( 'Trademark' ) ),
        Field::make( 'complex', 'animated_text', __( 'Animated Text' ) )
         ->add_fields( array(
             Field::make( 'text', 'title', __( 'Title' ) ),
         ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'OM OS Middle Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/om-os/middle' );            
    });

    //@end block

    // OM OS Feature Section
    Block::make( __( 'OM OS Feature Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'section_title', __( 'Section Title' ) ),
        Field::make( 'textarea', 'section_short_description', __( 'Section Short Description' ) ),
        Field::make( 'complex', 'feature_lists', __( 'Feature list' ) )
        ->set_layout('tabbed-vertical')
         ->add_fields( array(
             Field::make( 'image', 'feature_image', __( 'Feature Image' ) ),
             Field::make( 'text', 'name', __( 'Name' ) ),
             Field::make( 'text', 'designation', __( 'Designation' ) ),
             Field::make( 'text', 'short_description', __( 'Short Description' ) ),
         ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'OM OS Feature Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/om-os/feature' );            
    });

    //@end block

    // Kontakt Section
    Block::make( __( 'Kontakt Section','halalcatering' ) )
    ->add_fields( array(
        Field::make( 'text', 'section_title', __( 'Section Title' ) ),
        Field::make( 'textarea', 'short_description', __( 'Short Description' ) ),
        Field::make( 'image', 'feature_image', __( 'Feature Image' ) ),
        Field::make( 'textarea', 'address', __( 'Address' ) ),
        Field::make( 'text', 'email', __( 'Email' ) ),
        Field::make( 'text', 'phone', __( 'Phone' ) ),
      ))
    ->set_icon( 'star-filled' )
    ->set_keywords( [ __( 'Kontakt Section','halalcatering'  ) ] )
    ->set_description( __( 'Custom Block','halalcatering' ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        setData($fields);
        get_template_part( 'components/kontact/feature' );            
    });

    //@end block

}
