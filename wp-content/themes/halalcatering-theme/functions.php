<?php
@ini_set( 'upload_max_size', '1G' );
@ini_set( 'post_max_size', '1G' );
@ini_set( 'max_execution_time', '300' );
/**
 * MU Sea functions and definitions
 *
 * @package MU Sea
 */

// Exit if afbessed directly.
defined( 'ABSPATH' ) || exit;

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMG', THEMEROOT . '/src/img' );
define( 'ICON', THEMEROOT . '/dist/icons' );
define( 'JS', THEMEROOT . '/dist/js' );
define( 'CSS', THEMEROOT . '/dist/css' );

$attire_includes = array(
	'/theme-setup.php',                    // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/cpt.php',
	'/register_metabox.php',                // Register Metabox
	'/gutenberg-blocks.php',                // Register Carbon field component
	'/admin-style.php',                        // SOme css for admin styling
	'/search-bar.php',
	'/custom-taxonomy.php',
	'/custom-checkout.php',
);


foreach ( $attire_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

// register menu
register_nav_menus( array(
	'primary'      => __( 'Primary Menu', 'halalcatering' ),
	'footer_menu'  => __( 'Footer Menu', 'halalcatering' ),
	'privacy_menu' => __( 'Privacy Policy Menu', 'halalcatering' ),
) );


function getData() {
	return get_query_var( 'component_data', [] );
}

function setData( $data ) {
	return set_query_var( 'component_data', $data );
}

add_theme_support( 'post-thumbnails' );


add_action( 'admin_head', function () {
	echo "
    <style>
    .cf-block__fields {
        padding: 30px;
	}
	
	.block-editor-block-list__block:nth-child(even){
		background-color: #eff4fc;
	}
	.block-editor-block-list__block:nth-child(odd){
		background-color: rgba(16, 49, 107, 0.01);
	}

	.block-editor .cf-separator h3{
		
		text-align: center;
}
    </style>
    ";
} );

// function check content exist or not
function isExist( $content_block ) {
	if ( ! empty( $content_block ) ) {
		echo $content_block;
	}
}

// function check empty with tag
function isExistWithTag( $content_block, $tag, $className = '', $attriName = [] ) {
	$attr = '';
	foreach ( $attriName as $key => $val ) {
		$attr .= sprintf( '%s="%s" ', $key, $val );
	}
	if ( ! empty( $content_block ) ) {
		printf( '<%s class="%s" %s>%s</%s>', $tag, $className, $attr, $content_block, $tag );
	}
}


// Remove existing checkout field
add_filter( 'woocommerce_checkout_fields', 'remove_checkout_field' );

function remove_checkout_field( $fields ) {
	// Remove the "billing_company" field
	unset( $fields['billing']['billing_company'] );
	
	return $fields;
}

/*****************add to cart item*********************/
add_filter( 'woocommerce_add_cart_item_data', function ( $cart_item ) {
	if ( isset( $_POST['custom_price'] ) ) {
		$cart_item['custom_price'] = sanitize_text_field( $_POST['custom_price'] );
	}
	
	if ( isset( $_POST['additional_title'] ) ) {
		$additional_title = array_map( 'sanitize_text_field', $_POST['additional_title'] );
		
		$cart_item['additional_title'] = array_filter( $additional_title );
	}
	
	return $cart_item;
} );

add_action( 'woocommerce_before_calculate_totals', function ( $cart_object ) {
	foreach ( $cart_object->get_cart() as $hash => $item ) {
		if ( ! empty( $item['custom_price'] ) ) {
			$item['data']->set_price( $item['custom_price'] );
		}
	}
} );

add_filter( 'woocommerce_get_item_data', function ( $data, $cart_item ) {
	if ( ! empty( $cart_item['additional_title'] ) ) {
		foreach ( $cart_item['additional_title'] as $title ) {
			$titles = explode( ':', $title );
			
			$data[] = array(
				'name'  => $titles[0],
				'value' => '<div><small>' . $titles[1] . '</small></div>'
			);
		}
	}
	
	return $data;
}, 10, 2 );

add_action( 'woocommerce_add_order_item_meta', function ( $item_id, $item ) {
	if ( ! empty( $item['additional_title'] ) ) {
		wc_add_order_item_meta( $item_id, 'additional_title', $item['additional_title'], true );
	}
}, 10, 2 );

add_action( 'woocommerce_after_order_itemmeta', 'gl_additional_title_meta', 10, 2 );
add_action( 'woocommerce_order_item_meta_end', 'gl_additional_title_meta', 10, 2 );
function gl_additional_title_meta( $item_id, $item ) {
	if ( ! empty( $item['additional_title'] ) ) {
		foreach ( $item['additional_title'] as $title ) {
			echo '<div style="opacity: .6;">' . $title . '</div>';
		}
	}
}


/**=======================
 * Billing details text
 * ==========================*/
function wc_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Billing details' :
			$translated_text = __( '', 'woocommerce' );
			break;
	}
	
	return $translated_text;
}

add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );



add_filter('woocommerce_checkout_fields', 'set_max_postcode_length');
function set_max_postcode_length($fields)
{
    // Set the max length for 'billing_postcode' field
    $fields['billing']['billing_postcode']['maxlength'] = 4;
    $fields['postcode']['validation']['postcode'] = '/^[1-9][0-9]{3,4}$/';
    // Set the range for 'postcode' field in default address fields
    $fields['postcode']['custom_attributes'] = array(
    'min' => '1000',
    'max' => '9999',
    );

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'set_postcode_range');
function set_postcode_range($fields)
{
    // Set the range for 'billing_postcode' field
    $fields['billing']['billing_postcode']['maxlength'] = 4;
    $fields['billing']['billing_postcode']['custom_attributes'] = array(
        'min' => '1000',
        'max' => '9999',
    );

    return $fields;
}


add_filter( 'woocommerce_package_rates', function ( $rates ) {

	if( isset( $_POST['post_data'] ) ):
		
		parse_str( $_POST['post_data'], $post_data );
		
		if ( isset( $post_data['billing_leveringsmetode'] ) ) {
			switch ( $post_data['billing_leveringsmetode'] ) {
				case 'Jeg_henter_selv':
					unset( $rates['halal_catering_shipping_method'] );
					break;
				case 'Levering_til_adresse':
					unset( $rates['local_pickup:10'] );
					break;
			}
		}

	endif;
	
	return $rates;
}, 99 );

add_action( 'woocommerce_checkout_update_order_review', function () {
	foreach ( WC()->cart->get_shipping_packages() as $package_key => $package ) {
		WC()->session->set( 'shipping_for_package_' . $package_key, true );
	}
	
	WC()->cart->calculate_shipping();
} );

add_action( 'wp_footer', function () {
	if ( is_checkout() ) {
		?>
		<script>
			jQuery( document ).ready( function ( $ ) {
				$( 'input[name="billing_leveringsmetode"]' ).on( 'change', function () {
					$( 'body' ).trigger( 'update_checkout' );
				} );
			} );
		</script>
		<?php
	}
}, 99 );	
 
add_action( 'woocommerce_after_checkout_validation', function ( $data, $errors ) {
	if ( $data['billing_leveringsmetode'] == 'Jeg_henter_selv' ) {
		$errors->remove( 'billing_postcode_required' );
	}
}, 99, 2 );

add_filter('woocommerce_checkout_fields', 'remove_t_from_checkout_datetime');
function remove_t_from_checkout_datetime($fields) {
    // Replace the 'T' separator with a space for the datetime-local field
    $fields['billing']['datetimepicker']['type'] = 'text';
    return $fields;
}


function change_shop_button_link($url) {
    // Modify the URL as per your requirement
    $new_url = '/shop';
    return $new_url;
}
add_filter('woocommerce_return_to_shop_redirect', 'change_shop_button_link');

