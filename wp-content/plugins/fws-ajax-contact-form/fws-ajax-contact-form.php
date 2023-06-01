<?php
/*
Plugin Name: Ajax Contact Form
Version: 1.2.1.1
Description: An easy to use Ajax contact form with inbuilt features to prevent contact form spam.
Author: Olaf Lederer
Author URI: https://www.olaflederer.com/
Text Domain: fws-ajax-contact-form
Domain Path: /languages/
License: GPL v3

Ajax Contact Form
Copyright (C) 2022, Olaf Lederer - https://www.finalwebsites.com/

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

define('STFWSACF_DIR', plugin_dir_path( __FILE__ ));

include_once STFWSACF_DIR.'incl/options.php';
include_once STFWSACF_DIR.'incl/shortcodes.php';

if ( is_admin() ) {
	register_deactivation_hook(__FILE__, 'fwsacf_deactivate');
}
add_action( 'plugins_loaded', 'FWSACF_load_textdomain' );

function FWSACF_load_textdomain() {
	load_plugin_textdomain( 'fws-ajax-contact-form', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function FWSACF_add_query_vars( $vars ) {
  $vars[] = "dynsubject";
  return $vars;
}
add_filter( 'query_vars', 'FWSACF_add_query_vars' );

function FWS_contactform_add_script() {
	global $post;
    wp_register_script( 'fws-contactform-script', plugin_dir_url(__FILE__).'assets/contact.js', array('jquery'), null, true );
    $site_key = null;
    if ($site_key = get_option('fwsacf-recpatcha-site-key')) {
		wp_register_script( 'fws-recaptcha', '//www.google.com/recaptcha/api.js?render='.$site_key, null, null, true );
	} elseif ($hc_site_key = get_option('fwsacf-hcaptcha-site-key')) {
		wp_register_script( 'fws-hcaptcha', '//js.hcaptcha.com/1/api.js', null, null, true );
	}
    $script_vars = array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'plugin_base_path' => plugin_dir_url(__FILE__),
		'googleanalytics' => get_option('fwsacf-googleanalytics'),
		'clickyanalytics' => get_option('fwsacf-clickyanalytics'),
		'js_alt_loading' => __( 'Loading...', 'fws-ajax-contact-form' ),
		'js_msg_empty_fields' => __( 'At least one of the form fields is empty.', 'fws-ajax-contact-form' ),
		'js_msg_invalid_email' => __( 'The entered email address isn\'t valid.', 'fws-ajax-contact-form' )
	);
	if ($thankyou_url = get_option('fwsacf-thankyou-page')) $script_vars['thankyou_page_url'] = $thankyou_url;
    if ($site_key) $script_vars['site_key'] = $site_key;
    wp_localize_script( 'fws-contactform-script', 'ajax_object_acf', $script_vars );

    wp_register_style( 'fws-contactform-style', plugin_dir_url(__FILE__).'assets/style.css' );
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'FWSAjaxContactForm') ) {
        wp_enqueue_script( 'fws-contactform-script');
		if (get_option('fwsacf-include-css')) {
			wp_enqueue_style( 'fws-contactform-style' );
		}
		if ($site_key) {
			wp_enqueue_script( 'fws-recaptcha' );
		} elseif ($hc_site_key) {
			wp_enqueue_script( 'fws-hcaptcha' );
		}
	}
}
add_action('wp_enqueue_scripts', 'FWS_contactform_add_script');

add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if ( 'hcaptcha' !== $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' async defer src', $tag );
}, 10, 2 );

function FWS_additional_postypes() {
	$args = array(
		'labels' => array(
			'edit_item' => __( 'Form submission', 'fws-ajax-contact-form' ),
		),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => 'ajax-contact-form',
		'menu_icon' => 'dashicons-open-folder',
		'rewrite' => false,
		'show_in_admin_bar' => false,
		'label'  => __('Submissions', 'fws-ajax-contact-form' ),
		'supports' => array( 'title' ),
		'capabilities' => array(
			'create_posts' => 'do_not_allow'
		),
		'map_meta_cap' => true
	);
	register_post_type( 'submissions', $args );
	$args = array(
		'labels' => array(
			'edit_item' => __( 'Responder templates', 'fws-ajax-contact-form' ),
		),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => 'ajax-contact-form',
		'menu_icon' => 'dashicons-media-document',
		'rewrite' => false,
		'show_in_admin_bar' => false,
		'label'  => __('Responders', 'fws-ajax-contact-form' ),
		'supports' => array( 'title', 'editor' )
	);
	register_post_type( 'responders', $args );
}
add_action('init', 'FWS_additional_postypes');

function FWS_remove_post_type_edit_screen() {
    global $typenow;
    if($typenow && $typenow === 'submissions'){
        remove_post_type_support( 'submissions', 'title' );
    }
}
add_action( 'load-post.php', 'FWS_remove_post_type_edit_screen', 10 );

// Create the meta box
function fwsacf_responder_fields_meta_box() {

    $screens = array( 'responders' );

    foreach ( $screens as $screen ) {
        add_meta_box(
            'fwsacf_extra_fields_item',
            __('Optinal email fields', 'fws-ajax-contact-form'),
            'fwsacf_email_fields_content',
            'responders',
            'normal'
        );
    }
}
add_action( 'add_meta_boxes', 'fwsacf_responder_fields_meta_box' );

// Create the meta box content
function fwsacf_email_fields_content($post) {

    wp_nonce_field( 'fwsacf_meta_box', 'fwsacf_meta_box_nonce' );

    $mail_preview = get_post_meta($post->ID, '_mail_preview', true);
    $mail_footer = get_post_meta($post->ID, '_mail_footer', true);

    $html = '
    <p>
		<label>'.__('Pre header', 'fws-ajax-contact-form').'</label>
		<input type="text" name="mail_preview" value="'.$mail_preview.'" style="width:100%;">
	</p>
	<p>
		<label>'.__('Email footer', 'fws-ajax-contact-form').'</label>
		<input type="text" name="mail_footer" value="'.$mail_footer.'" style="width:100%;">
	</p>';
    echo $html;
}

// Save the selection
function fwsacf_email_fields_save_postdata($post_id) {
    if ( ! isset( $_POST['fwsacf_meta_box_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['fwsacf_meta_box_nonce'], 'fwsacf_meta_box' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$mail_preview = ($_POST['mail_preview'] != '') ? sanitize_text_field($_POST['mail_preview']) : '';
	update_post_meta($post_id, '_mail_preview', $mail_preview);

	$mail_footer = ($_POST['mail_footer'] != '') ? sanitize_text_field($_POST['mail_footer']) : '';
	update_post_meta($post_id, '_mail_footer', $mail_footer);
}
add_action( 'save_post', 'fwsacf_email_fields_save_postdata' );

function check_IP_address_ipstack() {
    $valid = true;
	if ($key = get_option('fwsacf-apiKey')) {
        $ip = $_SERVER['REMOTE_ADDR'];
		$url = 'https://api.ipstack.com/'.$ip.'?access_key='.$key;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		//print_r($response);
		$obj = json_decode($response);
		$cc = str_replace(' ', '', get_option('fwsacf-blocked-countries'));
		if ($obj->country_code) {
            if (in_array($obj->country_code, explode(',', $cc))) {
			    $valid = false;
            }
		}
	}
    return $valid;
}

function FWS_ajax_contactform_action_callback() {
	$error = '';
	$status = 'error';
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
		$error = __( 'All fields are required to enter.' , 'fws-ajax-contact-form' );
	} else {
		if (!wp_verify_nonce($_POST['_acf_nonce'], 'ajax_contactform')) {
			$error = __( 'Verification error, try again.' , 'fws-ajax-contact-form' );
		} else {
			$valid_captcha = true;
			$error_code = '';
			if ($_POST['title'] != '') { // honeypot
				$valid_captcha = false;
				$error_code = 'non-empty-honeypot';
			} else {
				if (empty($_COOKIE['acf_loadtime']) || $_COOKIE['acf_loadtime'] > (time()-15)) {
					$valid_captcha = false;
					$error_code = 'invalid-cookie';
				} else {
					if ($secret = get_option('fwsacf-recpatcha-secret-key')) {
						if (isset($_POST['recaptcha_response'])) {
							$recaptcha_response = sanitize_text_field($_POST['recaptcha_response']);
							//var_dump($recaptcha_response);
							$request = wp_remote_get('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha_response);
							$request_body = wp_remote_retrieve_body( $request );
							$recaptcha = json_decode($request_body);
							$codes = 'error-codes';
							if ($recaptcha->success) {
								if ($recaptcha->score < 0.5) {
									$valid_captcha = false;
								}
							} else {
								$error_code = $recaptcha->$codes[0];
							}
						} else {
							$valid_captcha = false;

						}
					} elseif ($hc_site_key = get_option('fwsacf-hcaptcha-site-key')) {
						$response = FWS_validate_hcaptcha($_POST['h-captcha-response']);
						if (is_string($response)) {
							$valid_captcha = false;
							$error_code = $response;
						} else {
							$valid_captcha = $response;
						}
					}
				}
			}
			if ($valid_captcha) {
				$name = sanitize_text_field($_POST['name']);
				$email = sanitize_email($_POST['email']); // is_email() voor validatie toev.
				$phone = sanitize_text_field($_POST['phone']);
				$current_url = esc_url($_POST['current_url']);
				$ip_check = check_IP_address_ipstack();
				$resp_id = intval($_POST['responder_id']);
				if ($ip_check) {
					if (!empty($_POST['mailsubject'])) {
						$subject = sanitize_text_field($_POST['mailsubject']);
					} else {
						$subject = __( 'A message from your website\'s contact form' , 'fws-ajax-contact-form' );
						if ($subject_option = get_option('fwsacf-emailsubject')) {
							$subj_parts = explode(PHP_EOL, $subject_option);
							if (count($subj_parts) == 1) $subject = $subject_option;
						}
					}
					$message = $msg = sanitize_textarea_field($_POST['message']);
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL.PHP_EOL,  __('Sender\'s name', 'fws-ajax-contact-form' ), $name);
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL, __('Email address', 'fws-ajax-contact-form' ), $email);
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL, __('Phone number', 'fws-ajax-contact-form' ), $phone);
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL.PHP_EOL, __( 'IP address' , 'fws-ajax-contact-form' ), $_SERVER['REMOTE_ADDR']);
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL, __( 'User agent' , 'fws-ajax-contact-form' ), sanitize_text_field($_SERVER['HTTP_USER_AGENT']));
					$message .= sprintf( '%1$s%2$s: %3$s', PHP_EOL, __('Submitted via', 'fws-ajax-contact-form' ), $current_url);
					$to = get_option('fwsacf-mailto', get_option('admin_email'));
					$sitename = strtolower( $_SERVER['SERVER_NAME'] );
					if ( substr( $sitename, 0, 4 ) == 'www.' ) {
						$sitename = substr( $sitename, 4 );
					}
					$emailfrom = get_option('fwsacf-emailfrom', 'noreply@'.$sitename);
					$header = 'From: '.get_option('blogname').' <'.$emailfrom.'>'.PHP_EOL;
					$header .= 'Reply-To: '.$email.PHP_EOL;
					if ( wp_mail($to, $subject, $message, $header) ) {
						$status = 'success';
						$thankyou = get_option('fwsacf-thankyoumessage');
						$error = ($thankyou != '') ? $thankyou : __( 'Thanks, for your message. We will respond as soon as possible.' , 'fws-ajax-contact-form' );
						$submit_data = array(
							'name' => $name,
							'email' => $email,
							'phone' => $phone,
							'subject' => $subject,
							'message' => $msg,
							'ipadr' => $_SERVER['REMOTE_ADDR'],
							'useragent' => sanitize_text_field($_SERVER['HTTP_USER_AGENT']),
							'via' => $current_url,
						);
						FWS_create_submission_post($submit_data);
						do_action( 'fwsacf_after_success_form', $email, $name );
						if ($resp_id > 0) FWS_send_responder_mail($resp_id, $email, $name, $sitename);
					} else {
						$error = __( 'The script can\'t send this email message.' , 'fws-ajax-contact-form' );
					}
				} else {
					$error = __('This contact form is currently not active.' , 'fws-ajax-contact-form');
				}
			} else {
				if ( current_user_can('administrator') ) {
					$error = sprintf (__( 'Spam check didn\'t pass, try again (%s).' , 'fws-ajax-contact-form' ), $error_code);
				} else {
					$error = __( 'Spam check didn\'t pass, try again.' , 'fws-ajax-contact-form' );
				}
			}
		}
	}
	$resp = array('status' => $status, 'errmessage' => $error);
	wp_send_json($resp);
}
add_action( 'wp_ajax_contactform_action', 'FWS_ajax_contactform_action_callback' );
add_action( 'wp_ajax_nopriv_contactform_action', 'FWS_ajax_contactform_action_callback' );

function FWS_ajax_contactform_loadtime_callback() {
	if (isset($_COOKIE['acf_loadtime'])) {
		return;
	} else {
		setcookie("acf_loadtime", time(), 0, '/', $_SERVER['HTTP_HOST']);
	}
}
add_action( 'wp_ajax_cf_loadtime', 'FWS_ajax_contactform_loadtime_callback' );
add_action( 'wp_ajax_nopriv_cf_loadtime', 'FWS_ajax_contactform_loadtime_callback' );

function FWS_validate_hcaptcha($catcha_resp) {
	$secret = get_option('fwsacf-hcaptcha-secret');
	$data = array(
        'secret' => $secret,
        'response' => $catcha_resp,
		//'remoteip' => $_SERVER['REMOTE_ADDR']
    );
	//var_dump($data);
	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);
	//var_dump($response);
	$responseData = json_decode($response);
	if ($responseData->success) {
	    return true;
	} else {
		$codes = 'error-codes';
		return $responseData->$codes[0];
	}
}

function FWS_send_responder_mail($resp_id, $to, $name, $sitename) {
	$post = get_post($resp_id);
	$emailfrom = get_option('fwsacf-emailfrom', 'noreply@'.$sitename);
	$subject = $post->post_title;
	$mail_preview = get_post_meta($post->ID, '_mail_preview', true);
	$mail_footer = get_post_meta($post->ID, '_mail_footer', true);
	$message = str_replace('%name%', $name, apply_filters( 'the_content', $post->post_content ));
	$message = str_replace('<img class=', '<img border="0" style="border:0; outline:none; text-decoration:none; display:block;" class=', $message);
	$html = wp_remote_request( plugins_url( 'incl/emailtemplate.html', __FILE__ ));
	$html = str_replace(
		array('##PREHEADER##', '##BODYCONTENT##', '##FOOTER##'),
		array(esc_html($mail_preview), $message, esc_html($mail_footer)),
		$html['body']
	);
	$header = 'From: '.get_option('blogname').' <'.$emailfrom.'>'.PHP_EOL;
	add_filter( 'wp_mail_content_type', 'fws_set_html_content_type' );
	wp_mail($to, $subject, $html, $header);
	remove_filter( 'wp_mail_content_type', 'fws_set_html_content_type' );
}

function FWS_set_html_content_type() {
	return 'text/html';
}



function FWS_create_submission_post($data) {
	$title = $data['name'].': '.$data['subject'];
	$content = '
<table>
	<tr>
		<th>'.__('Name', 'fws-ajax-contact-form' ).'</th>
		<td>'.$data['name'].'</td>
	</tr>
	<tr>
		<th>'.__('Email address', 'fws-ajax-contact-form' ).'</th>
		<td><a href="mailto:'.$data['email'].'">'.$data['email'].'</a></td>
	</tr>
	<tr>
		<th>'.__('Phone', 'fws-ajax-contact-form' ).'</th>
		<td>'.$data['phone'].'</td>
	</tr>
	<tr>
		<th>'.__('Message', 'fws-ajax-contact-form' ).'</th>
		<td>'.nl2br($data['message']).'</td>
	</tr>
	<tr>
		<th>'.__('IP address', 'fws-ajax-contact-form' ).'</th>
		<td>'.$data['ipadr'].'</td>
	</tr>
	<tr>
		<th>'.__('User agent', 'fws-ajax-contact-form' ).'</th>
		<td>'.$data['useragent'].'</td>
	</tr>
	<tr>
		<th>'.__('Submitted via', 'fws-ajax-contact-form' ).'</th>
		<td>'.$data['via'].'</td>
	</tr>
</table>';
	$new_post = array(
		'post_title'    => wp_strip_all_tags( $title ),
		'post_content'  => $content,
		'post_status'   => 'publish',
		'post_type' => 'submissions'
	);
	wp_insert_post( $new_post );
}

function FWS_add_content_before_editor($post) {
	if ('submissions' == get_post_type()) {
		echo '
<style>
table { width: 100%;border-spacing: 0; }
.subject-title { font-size:18px;line-height:2em; }
.submit-date { font-size:14px;line-height:3em; }
th { text-align:left;white-space: nowrap;width:150px;vertical-align:top;background-color:#E5E5E5; }
th, td { padding:20px;border:1px solid #ddd;font-size:14px; }
td { background-color:#fff; }
</style>';
		echo '
<div class="subject-title">'.$post->post_title.' - #'.$post->ID.'</div>
<div class="submit-date">'.__('Submitted', 'fws-ajax-contact-form' ).': '.get_the_date('', $post).' '.get_the_time('', $post).'</div>';
		echo $post->post_content;
	}
}
add_action( 'edit_form_after_title', 'FWS_add_content_before_editor', 1, 10 );

function FWS_hide_publishing_actions(){
	global $post;
	if ($post->post_type == 'submissions') {
		echo '
<style>
#misc-publishing-actions, #minor-publishing-actions, #publish.button { display:none; }
</style>
		';
	}
}
add_action('admin_head-post.php', 'FWS_hide_publishing_actions');
add_action('admin_head-post-new.php', 'FWS_hide_publishing_actions');

function FWS_modify_list_row_actions( $actions, $post ) {
    if ( $post->post_type == 'submissions' && $post->post_status != 'trash' ) {
        unset($actions['inline hide-if-no-js']);
        $url = admin_url( 'post.php?post='.$post->ID.'&amp;action=edit' );
		$actions['edit'] = sprintf(
			'<a href="%1$s">%2$s</a>',
            esc_url( $url ),
            esc_html( __( 'View', 'fws-ajax-contact-form' ) )
        );
    }
    return $actions;
}
add_filter( 'post_row_actions', 'FWS_modify_list_row_actions', 10, 2 );

function fwsacf_deactivate() {
	// nothing to do
}
