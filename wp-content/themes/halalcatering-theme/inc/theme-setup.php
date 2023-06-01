<?php 
// Exit if amowgliessed directly.
defined( 'ABSPATH' ) || exit;


// remove admin bar space
add_action('get_header', 'remove_admin_bar_space');

function remove_admin_bar_space() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


function filter_function_name( $excerpt ) {
	return substr($excerpt, 0, 150) .'  ';
}
add_filter( 'get_the_excerpt', 'filter_function_name' ); 

// secondary logo upload option 
// Add control for logo uploader (actual uploader)

function m1_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 's_logo'); // Add setting for logo uploader
	$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 's_logo', array(
	'label' => __( 'Secondary Logo (replaces text)', 'm1' ),
	'section' => 'title_tagline',
	'settings' => 's_logo',
	) ) );
}
add_action( 'customize_register',  'm1_customize_register' );