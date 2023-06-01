<?php


function FWS_createAjaxContactForm($atts = null) {
    $dyn_subject = get_query_var( 'dynsubject', '' );
	$atts = shortcode_atts(
		array(
			'emailsubject' => get_option('fwsacf-emailsubject'),
			'show_phone' => 'yes',
			'css_class' => '',
            'responder' => 0
		),
		$atts
	);
	$html = '
	<form id="contactform" role="form" class="'.$atts['css_class'].'">
        <div class="form-group">
            <label for="name">'.__( 'Title' , 'fws-ajax-contact-form' ).'</label>
            <input class="form-control input-sm" type="text" name="title" id="title" size="30" tabindex="1" />
        </div>
		<div class="form-group">
			<label for="name">'.__( 'Name' , 'fws-ajax-contact-form' ).'</label>
			<input class="form-control input-sm" type="text" name="name" id="name" size="30" tabindex="2" />
		</div>
		<div class="form-group">
			<label for="email">'.__( 'Email address' , 'fws-ajax-contact-form' ).'</label>
			<input class="form-control input-sm" type="email" name="email" id="email" size="30" tabindex="3" />
		</div>';
	$tabindex = 3;
	if ($atts['show_phone'] == 'yes') {
		$tabindex++;
		$html .= '
		<div class="form-group">
			<label for="phone">'.__( 'Telefoon' , 'fws-ajax-contact-form' ).'</label>
			<input class="form-control input-sm" type="text" name="phone" id="phone" size="30" tabindex="'.$tabindex.'" />
		</div>';
	}
	if ($atts['emailsubject'] != '' && !$dyn_subject) {
		$subj_parts = preg_split('/[\r\n\|]+/', $atts['emailsubject']);
		if (count($subj_parts) > 1) {
			$tabindex++;
			$html .= '
		<div class="form-group">
			<label for="message">'.__( 'Subject' , 'fws-ajax-contact-form' ).'</label>
			<select class="form-control" name="mailsubject" tabindex="'.$tabindex.'">
				<option value="">'.__('Choose one...', 'fws-ajax-contact-form').'</option>';
			foreach ($subj_parts as $part) {
				$html .= '
				<option value="'.$part.'">'.$part.'</option>';
			}
			$html .= '
			</select>
		</div>';
		} else {
			$html .= '
		<input type="hidden" name="mailsubject" value="'.esc_attr($atts['emailsubject']).'" />';
		}
	} elseif ($dyn_subject) {
        $html .= '
		<div class="form-group">
			<label for="message">'.__( 'Subject' , 'fws-ajax-contact-form' ).'</label>
            <input class="form-control" type="text" name="mailsubject" size="30" value="'.esc_attr($dyn_subject).'" readonly="readonly" />
        </div>';
    }
	$tabindex++;
	$html .= '
		<div class="form-group">
			<label for="message">'.__( 'Message' , 'fws-ajax-contact-form' ).'</label>
			<textarea class="form-control" name="message" id="message" tabindex="'.$tabindex.'" rows="8"></textarea>
		</div>';
    if ($hc_site_key = get_option('fwsacf-hcaptcha-site-key')) {
        $html .= '
        <div class="hcaptcha-container">
            <div class="h-captcha" data-sitekey="'.$hc_site_key.'"></div>
        </div>';
    }
    $html .= '
		<div class="form-group text-right clearfix">';
	global $wp;
	$current_url = home_url( $wp->request.'/' );
	$html .='
			<input type="hidden" name="action" value="contactform_action" />
            <input type="hidden" name="responder_id" value="'.intval($atts['responder']).'" />
			<input type="hidden" name="current_url" value="'.esc_attr($current_url).'" />
			'.wp_nonce_field('ajax_contactform', '_acf_nonce', true, false).'
			<button class="btn btn-primary" id="contactbutton" type="button">'.__( 'Submit' , 'fws-ajax-contact-form' ).'</button>
		</div>
	</form>
	<div id="contact-msg" class="error-message clearfix"></div>';
	return $html;
}
add_shortcode('FWSAjaxContactForm', 'FWS_createAjaxContactForm');
