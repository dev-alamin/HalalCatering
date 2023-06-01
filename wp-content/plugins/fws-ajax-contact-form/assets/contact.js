function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
}
function submit_request(btn, token) {
	if (!token) token == '';
	jQuery.ajax({
		type: 'POST',
		url: ajax_object_acf.ajax_url,
		data: jQuery('#contactform').serialize() + '&recaptcha_response=' + token,
		dataType: 'json',
		beforeSend: function() {
			var message = jQuery('#message').val();
			var name = jQuery('#name').val();
			var email = jQuery('#email').val();
			if (!message || !name || !email) {
				jQuery('#contact-msg').html(ajax_object_acf.js_msg_empty_fields);
				btn.removeAttr('disabled');
				return false;
			}
			if (!isValidEmailAddress(email)) {
				jQuery('#contact-msg').html(ajax_object_acf.js_msg_invalid_email);
				btn.removeAttr('disabled');
				return false;
			}
			//console.log(this.data);
		},
		success: function(response) {
			btn.removeAttr('disabled');
			if (response.status == 'success') {
				jQuery('#contactform')[0].reset();
				jQuery('#recaptchaResponse').val();
				if (ajax_object_acf.googleanalytics) {
					if (typeof gtag != 'undefined') {
						gtag('event', 'generate_lead', {
							'event_category': 'Web forms',
							'event_label': ajax_object_acf.googleanalytics
						});
					}
				}
				if (ajax_object_acf.clickyanalytics) {
					if (typeof clicky != 'undefined') {
						clicky.goal( ajax_object_acf.clickyanalytics );
					}
				}
				if (ajax_object_acf.thankyou_page_url) {
					window.location.replace(ajax_object_acf.thankyou_page_url);
				} else {
					jQuery('#contact-msg').html(response.errmessage);
				}
			} else {
				jQuery('#contact-msg').html(response.errmessage); // todo add a different color/class for errors
			}
		}
	});
}

jQuery(document).ready(function($) {

	$.get( ajax_object_acf.ajax_url, { action: "cf_loadtime" } );

	$('#contactbutton').on('click', function (event) {
        event.preventDefault();
		var windowsize = $(window).width();
        if (windowsize >= 768) $('#contact-msg').animate({marginTop: '-30px'});
        var btn = $(this);
        btn.attr('disabled','disabled');
		$('#contact-msg').html('<img src="' + ajax_object_acf.plugin_base_path + 'assets/loading.gif" alt="' + ajax_object_acf.js_alt_loading + '">');
		if (ajax_object_acf.site_key) {
			grecaptcha.ready(function () {
				grecaptcha.execute(ajax_object_acf.site_key, { action: 'contactform_action' }).then(function (token) {
					submit_request(btn, token)
				});
			});
		} else {
			if ($('[name=h-captcha-response]').length) {
				var hcaptchaVal = $('[name=h-captcha-response]').value;
		   		if (hcaptchaVal !== "") {
		      		submit_request(btn);
		   		}
			} else {
				submit_request(btn);
			}
		}
	});
});
