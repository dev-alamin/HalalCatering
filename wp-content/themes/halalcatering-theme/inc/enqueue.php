<?php
/**
 * fb enqueue scripts
 *
 * @package fb
 */

// Exit if afbessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'enqueue_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function enqueue_scripts() {

		// Get the theme data.
		$the_theme     = wp_get_theme();

		wp_enqueue_style( 'normalize-styles', get_theme_file_uri() . '/assets/css/normalize.css',array(), '1.0.0');
		wp_enqueue_style( 'webflow-styles', get_theme_file_uri() . '/assets/css/webflow.css',array(), '1.0.0');
		
		wp_enqueue_style( 'datetimepicker-styles', get_theme_file_uri() . '/assets/css/jquery.datetimepicker.css',array(), '1.0.0');
		wp_enqueue_style( 'keto-styles', get_theme_file_uri() . '/assets/css/keto-template-da0e39.webflow.css',array(), '1.0.0');
		wp_enqueue_style( 'abdel-styles', get_theme_file_uri() . '/assets/css/abdel.css',array(), '1.0.0');
		wp_enqueue_style( 'custom-styles', get_theme_file_uri() . '/assets/css/custom.css',array(), '1.0.0');
		wp_enqueue_style( 'animate-styles', get_theme_file_uri() . '/assets/css/animate.css',array(), '1.0.0');
		wp_enqueue_style( 'ticker-styles', get_theme_file_uri() . '/assets/css/ticker.min.css',array(), '1.0.0');

		wp_register_script( 'wow__js', get_theme_file_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('wow__js');

		wp_register_script( 'jConveyorTicker__js', get_theme_file_uri() . '/assets/js/jquery.jConveyorTicker.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('jConveyorTicker__js');

		wp_register_script( 'custom__js', get_theme_file_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('custom__js');

          // Localize the script and pass the necessary data
        wp_localize_script('custom__js', 'hc_custom_js_data', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('hc_shipping_nonce')
        ));

		wp_register_script( 'moment__js','https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('moment__js');

		wp_register_script( 'datetimepicker__js', get_theme_file_uri() . '/assets/js/jquery.datetimepicker.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('datetimepicker__js');

		

		wp_register_script( 'webflow__js', get_theme_file_uri() . '/assets/js/webflow.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('webflow__js');

		wp_register_script( 'abdel__js', get_theme_file_uri() . '/assets/js/abdel.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('abdel__js');

		wp_register_script( 'contact__js', get_theme_file_uri() . '/assets/js/contact-form-script.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('contact__js');

	}

} 

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
