<?php

/*
 * This option page is based on the class script from Hugh Lashbrooke
 * https://gist.github.com/hlashbrooke/9267467
*/

if ( ! defined( 'ABSPATH' ) ) exit;


class fws_contact_form_settings {

	private $file;
	private $settings_base;
	private $settings;

	public function __construct( $file ) {
		$this->file = $file;
		$this->settings_base = 'fwsacf-';
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_init' , array( $this, 'register_settings' ) );
		add_action( 'admin_menu' , array( $this, 'register_custom_menu_page' ) );
		add_action( 'admin_menu' , array( $this, 'add_menu_items' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( $this->file ) , array( $this, 'add_settings_link' ) );

	}

	public function init() {
		$this->settings = $this->settings_fields();

	}

	public function register_custom_menu_page() {
	    add_menu_page(
	        __( 'Ajac Contact Form', 'fws-ajax-contact-form' ),
	        __( 'Contact form', 'fws-ajax-contact-form' ),
	        'manage_options',
	        'ajax-contact-form',
	        '',
	        'dashicons-email',
	        16
	    );
	}

	public function add_menu_items() {
		add_submenu_page(
	        'ajax-contact-form',
	        __( 'Ajax Contact Form Settings', 'fws-ajax-contact-form' ),
	        __( 'Settings', 'fws-ajax-contact-form' ),
	        'manage_options',
	        'fwsacf-settings',
	        array($this, 'settings_page')
	    );
	}



	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=fwsacf-settings">' . __( 'Settings', 'fws-ajax-contact-form' ) . '</a>';
  		array_push( $links, $settings_link );
  		return $links;
	}

	private function settings_fields() {
		$settings['start'] = array(
			'title' 				=> __( 'How to start?', 'fws-ajax-contact-form' ),
			'description'						=> '
			<p>'.__( 'Add the following shortcode into your page. Use the shortcode attribute "emailsubject" to overwrite the setting for the mail subject from this page. Enter multiple subject values, divided by "|" (pipe) symbols, to create a SELECT menu. Provide an empty subject attribute to remove the subject form field. Use the show_phone=no attribute to hide the phone form field.', 'fws-ajax-contact-form').'</p>
			<p>'.__('If you like to use the responder function, just add the attribute "responder" with the ID from your responder post to your shortcode. In your responder email template your can use the placeholder %name% for the name in your salutation.', 'fws-ajax-contact-form' ).'</p>
			<h3>'.__( 'Examples', 'fws-ajax-contact-form' ).'</h3>
			<p><code>[FWSAjaxContactForm]</code> &nbsp; <code>[FWSAjaxContactForm emailsubject="My email subject"]</code>
			&nbsp; <code>[FWSAjaxContactForm show_phone="no"]</code> &nbsp; <code>[FWSAjaxContactForm responder="1"]</code></p>',
			'fields'				=> array()
		);
		$settings['config'] = array(
			'title'					=> __( 'Configuration', 'fws-ajax-contact-form' ),
			'description'			=> sprintf( __( '<p>Configure your contact form options below. If you like to change the (error) messages and/or labels, that are visible via the web form, please use a localization plugin (f.e. <a href="%s" target="_blank">%s</a>).</p>', 'fws-ajax-contact-form' ), esc_url( 'https://wordpress.org/plugins/loco-translate/' ), 'Loco Translate' ),
			'fields'				=> array(
				array(
					'id' 			=> 'mailto',
					'label'			=> __( 'Email address (to):' , 'fws-ajax-contact-form' ),
					'description'	=> __( 'The email address where you like to receive the submitted messages.', 'fws-ajax-contact-form' ),
					'type'			=> 'email',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'emailfrom',
					'label'			=> __( 'Email address (from):' , 'fws-ajax-contact-form' ),
					'description'	=> __( 'The email address which is used as the sender.', 'fws-ajax-contact-form' ),
					'type'			=> 'email',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'emailsubject',
					'label'			=> __( 'Email subject(s):' , 'fws-ajax-contact-form' ),
					'description'	=> __( 'The email subject for each message sent by the contact form. Add multiple subject rows to create a SELECT menu for your contact form.', 'fws-ajax-contact-form' ),
					'type'			=> 'textarea',
					'default'		=> __( 'A message from your website\'s contact form' , 'fws-ajax-contact-form' ),
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'thankyoumessage',
					'label'			=> __( 'Thank you - message:', 'fws-ajax-contact-form' ),
					'description'	=> __( 'Add here your personal "Thank You" message which appears after the contact form was submitted (some HTML is allowed).', 'fws-ajax-contact-form' ),
					'type'			=> 'textarea',
					'default'		=> __('Thanks, for your message. We will respond as soon as possible.', 'fws-ajax-contact-form'),
					'placeholder'	=> ''
				),
				array(
					'id' 			=> 'apiKey',
					'label'			=> __( 'IP Stack API Key:', 'fws-ajax-contact-form' ),
					'description'	=> sprintf ( __( 'Block submissions from specific countries. Therfore we use the API from ipstack to check the user\'s country code. Keep this field empty to disable that feature. Get here your (free) %s.', 'fws-ajax-contact-form' ), '<a href="https://ipstack.com" target="_blank">ipstack API key</a>'),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'blocked-countries',
					'label'			=> __( 'Blocked country codes:', 'fws-ajax-contact-form' ),
					'description'	=> __( 'Use only ISO 3166 values and commas to separate multiple country codes.', 'fws-ajax-contact-form' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'recpatcha-site-key',
					'label'			=> __( 'reCAPTCHA Site Key:', 'fws-ajax-contact-form' ),
					'description'	=> sprintf (__( 'Protect your form with Google reCAPTCHA (v3) against spam. Get here your free keys: %s', 'fws-ajax-contact-form' ), '<a href="https://www.google.com/recaptcha/intro/v3.html" target="_blank">https://www.google.com/recaptcha/intro/v3.html</a>' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'recpatcha-secret-key',
					'label'			=> __( 'reCAPTCHA Secret Key:', 'fws-ajax-contact-form' ),
					'description'	=> '',
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'hcaptcha-site-key',
					'label'			=> __( 'hCaptcha site Key:', 'fws-ajax-contact-form' ),
					'description'	=> sprintf (__( 'hCaptcha is a privacy-first CAPTCHA service. Get here your free account: %s', 'fws-ajax-contact-form' ), '<a href="https://hCaptcha.com/" target="_blank">https://hCaptcha.com/</a>' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'hcaptcha-secret',
					'label'			=> __( 'hCaptcha secret Key:', 'fws-ajax-contact-form' ),
					'description'	=> __( 'You can find your hCaptcha secret via the Settings menu in your hCaptcha dashboard.' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'include-css',
					'label'			=> __( 'Include CSS:', 'fws-ajax-contact-form' ),
					'description'	=> __( 'Include our stylesheet for your contact form.', 'fws-ajax-contact-form' ),
					'type'			=> 'checkbox',
					'default'		=> ''
				),
				array(
					'id' 			=> 'thankyou-page',
					'label'			=> __( 'Thank you page URL:', 'fws-ajax-contact-form' ),
					'description'	=> __( 'Enter here your "Thank you..." page URL. We use that URL for a redirect after the form is submitted. Leave the field empty to disable the redirect function.', 'fws-ajax-contact-form' ),
					'type'			=> 'url',
					'default'		=> '',
					'placeholder'	=> 'https://domain.com/thank-you/',
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'googleanalytics',
					'label'			=> __( 'Track page views in Google Analytics' , 'fws-ajax-contact-form' ),
					'description'	=> __( 'Track an event in Google analytics after the form is submitted (gtag.js is supported, we use the event category "contact form").', 'fws-ajax-contact-form' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> __('Event name', 'fws-ajax-contact-form' ),
					'css_class'		=> 'regular-text'
				),
				array(
					'id' 			=> 'clickyanalytics',
					'label'			=> __( 'Track goals in Clicky' , 'fws-ajax-contact-form' ),
					'description'	=> __( 'Add here the goal ID for a manual goal you\'ve already defined in Clicky (check the FAQ for information).', 'fws-ajax-contact-form' ),
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> '',
					'css_class'		=> 'regular-text'
				)
			)
		);
		$settings = apply_filters( 'plugin_settings_fields', $settings );
		return $settings;
	}

	public function register_settings() {
		if( is_array( $this->settings ) ) {
			foreach( $this->settings as $section => $data ) {
				add_settings_section( $section, $data['title'], array( $this, 'settings_section' ), 'fws_ajax_contact_form_settings' );
				foreach( $data['fields'] as $field ) {
					$option_name = $this->settings_base . $field['id'];
					register_setting( 'fws_ajax_contact_form_settings', $option_name );
					add_settings_field( $field['id'], $field['label'], array( $this, 'display_field' ), 'fws_ajax_contact_form_settings', $section, array( 'field' => $field ) );
				}
			}
		}
	}

	public function settings_section( $section ) {
		$html = $this->settings[ $section['id'] ]['description'];
		echo $html;
	}

	public function display_field( $args ) {
		$field = $args['field'];
		$html = '';
		$option_name = $this->settings_base . $field['id'];
		$option = get_option( $option_name );
		$data = '';
		if( isset( $field['default'] ) ) {
			$data = $field['default'];
			if( $option ) {
				$data = $option;
			}
		}
		switch( $field['type'] ) {
			case 'textarea':
				$html .= '<textarea id="' . esc_attr( $field['id'] ) . '" rows="5" cols="50" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '">' . $data . '</textarea><br />'. "\n";
			break;
			case 'checkbox':
				$checked = '';
				if( $option && 'on' == $option ){
					$checked = 'checked="checked"';
				}
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . $field['type'] . '" name="' . esc_attr( $option_name ) . '" ' . $checked . '/>' . "\n";
			break;
			default:
				$css = ($field['css_class']) ? $field['css_class'] : '';
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . $field['type'] . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" value="' . $data . '" class="'.$css.'" /><br />' . "\n";
			break;

		}
		$html .= '<label for="' . esc_attr( $field['id'] ) . '"><span class="description">' . $field['description'] . '</span></label>' . "\n";
		echo $html;
	}

	public function settings_page() {
		$screen = get_current_screen();
		if ( $screen->id != 'contact-form_page_fwsacf-settings' ) {
			return;
		}
		$html = '<div class="wrap" id="plugin_settings">' . "\n";
		$html .= '<h2>' . __('Ajax Contact Form Options', 'fws-ajax-contact-form' ) . '</h2>' . "\n";
		$html .= '<form method="post" action="options.php">' . "\n";

		ob_start();
		settings_fields( 'fws_ajax_contact_form_settings' );
		do_settings_sections( 'fws_ajax_contact_form_settings' );
		$html .= ob_get_clean();
		$html .= '<p class="submit">' . "\n";
		$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr( __( 'Save Settings' , 'fws-ajax-contact-form' ) ) . '" />' . "\n";
		$html .= '</p>' . "\n";
		$html .= '</form>' . "\n";
		$html .= '</div>' . "\n";
		echo $html;
	}
}
$fws_contact_form_settings = new fws_contact_form_settings( __FILE__ );
