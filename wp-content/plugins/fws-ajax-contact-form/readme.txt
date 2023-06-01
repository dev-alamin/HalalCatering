=== Ajax Contact Form ===
Contributors: finalwebsites
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: contact form, ajax, recaptcha, bootstrap, forms
Requires at least: 5.4
Tested up to: 6.2
Stable tag: 1.2.1.1

An easy to use Ajax contact form function with inbuilt features to prevent contact form spam.

== Description ==

This contact form plugin is used to create a simple contact form using Ajax technology and advanced spam protection (honeypot, cookie and optinally Google reCAPTCHA or hCaptcha). In contrary to most other plugins, there is no form-builder included.

= Check the features: =

* Protect your forms against spambots using a honeypot and cookeis
* Protect your forms with Google reCAPTCHA v3 or hCaptcha (optional)
* Protect forms by blocking specific countries which are not relevant for your website (optional)
* New: Collect form submissions for all your forms
* New: Responder mail function, send a HTML formatted mail in response to the form submission
* Using nonces for simple form value validation
* Works with the default wp_mail() function (use it together with the [Postmark for Wordpress](https://nl.wordpress.org/plugins/postmark-approved-wordpress-plugin/) plugin to send emails via SMTP)
* Options for the email subject and the from/to email addresses
* You can change/translate all text using a localization tool
* Translated into the Dutch language
* Optional: Redirect to a "thank you.." page
* The form HTML is compatible with the Bootstrap CSS framework
* Optional: use the CSS style-sheet included by the plugin
* Track successfully submitted forms in Google Analytics and/or Clicky

The plugin is built to keep stuff simple. If you need a complex web form or if you need a form builder, please use one of the existing form plugins. To use the "Block countries" feature you need an API key. Open a [free ipstack account](https://ipstack.com) to get a key that is good for 10.000 requests every month.


== Installation ==

The quickest method for installing the contact form is:

1. Automatically install using the built-in WordPress Plugin installer or...
1. Upload the entire `fws-ajax-contact-form` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add the shortcode [FWSAjaxContactForm] into the page of your choice.
1. Visit "Settings" and enter the necessary options. All options are explained on the contact form settings page.
1. Optionally create a responder email message and add the post ID to the contact form shortcode. Use the placeholder %name% for the name in your salutation.

== Frequently Asked Questions ==

= What are the shortcode attributes I can use? =

There are 4 different attributes:

* emailsubject - Enter one or more subject fields for your form. Or add an empty value to remove the field completely
* show_phone - Add the phone number field to your (use "yes" as the value to enable the field).
* css_class - Use a custom CSS class and add your own style to the form.
* responder - The responder post ID. Create a post and copy the ID from the browser address bar.

= How to add a manual goal in Clicky? =

If you use a Clicky premium plan it's possible to track Goals.

1. In Clicky click on Goals > Setup > Create a new goal.
1. Enter a name for the goal
1. Check the "Manual Goal" checkbox and click Submit
1. Copy/paste the ID into the field from the plugin options page

= How to use the "fwsacf_after_success_form" action hook? =

Use the following code in your theme's function.php file. For example you can submit the email address and name to your CRM or email marketing system to send out some follow up emails.

	add_action('fwsacf_after_success_form', function($email, $name) {
		// Your code here...
		// and use the variables $email and $name if needed
	}, 10, 2);

= How to use the dynamic subject feature? =

Using this feature is easy, just add the subject text as query string to the page URL where your contact form is located, for example: https://domain.com/contact/?dynsubject=yourtexthere


== Screenshots ==
1. An example of how the form looks like.
2. Settings for the *Ajax Contact form*.


== Changelog ==

= 1.2.1.1 =

* Bug fixes
	* Removed the "pause(500)" JS function which was used to delay Clicky tracking in previous versions.

= 1.2.1 =

* Enhancement
	* Responsive email template for the responder emails
	* Two new fields for the responder email (pre header and footer)

= 1.2.0 =

* Enhancement
	* New feature: Spam protection via hCaptcha (as an privacy friendly alternative to Google reCAPTCHA)
	* New feature: Spam protection using a honeypor and cookies. Note, from now these two options are always.
	* Some style correctuions to play a bit nicer with the capchta challenges.
	* Updated the Dutch translations

= 1.1.4.1 =

* Bug fixes
	* removed some un-commented debug code from the plugin file
	* fixed an error for the Google Analytics tracking inside the JS file

= 1.1.4 =

* Enhancement
	* New feature: Contact form submission, all submitted forms are stored in a custom post type.
	* New feature: Send out responder emails to the person who send you a message via your contact form.
	* The plugin has now a custom menu where you can find the submissions and the plugin settings.

= 1.1.3.1 =

* Bug fixes
   * In some situations the reCAPTCHA response was requested too late. We changed the function to get working. Please post to the WordPress forums if you see any issues.

= 1.1.3 =

* Enhancement
	* Use the new action hook "fwsacf_after_success_form" to add your custom functionality right after the form was submitted successfully. Check the FAQ for an example.
	* New shortcode attribute for an optional class inside an HTML form element.
	* Dynamic subject, check the FAQ for information on how to use this function.

* Other
	* You can now show or hide the phone number field via the shortcode attribute "show_phone".
	* Fixed the tabindex sequence because of the optional form fields
	* Changed form CSS style a little (including some cleanup)
	* Updated the Dutch translations

= 1.1.2 =

* Enhancement
	* We moved the options page code from the plugin file to a separate options page file. This way it's easier to add more options (in the future).
	* New feature: Add a thank you page. Enter the URL and the visitor is redirected to a page of your choice (after the contact form was successfully submitted).
	* All static assets are moved to the new directory "assets"

= 1.1.1 =

We solved a bug for the reCAPTCHA function. There was a problem inside the code, which marked a message as spam if it takes more than 2 minutes to send a message. Just update and the problem is gone.

* Enhancement
	* We changed the JavaScript code a bit to prevent a double submission (which was also a problem for the reCAPTCHA verification).

= 1.1.0 =

After more than 3 years a new version. The plugin worked during the whole time and it was compatible with all past WordPress versions (I use the plugin on my own website). This version has some new features and the Mailgun email address validation is removed. Please check the settings page after the update and modify the settings if necessary. Check also the translations, beside the news string, some of them are replaced by new ones.

* Enhancement
	* New feature: Prevent spam by blocking countries if they are not relevant for your website.
	* New feature: Fight spam using Google reCAPTCHA v3.
	* Update: The tracking feature for Google Analytics is updated. We now support the gtag.js version.
	* Update: The feature for multiple subjects is improved.
	* Update: The callback function is now using WordPress functions for sanitizing the field values.
	* Update: The form has now a field for a phone number (it's not a required field)

* Other
	* The Mailgun email address validation feature is removed.

= 1.0.5.1 =

* Other
	* The plugin is tested for WordPress 4.8.1

= 1.0.5 =

* Other
	* Replaced the link for the "Codestyling Localization" plugin. The plugin doesn't exist anymore, I added a link to "Loco Translate" instead.
	* The plugin is tested for WordPress 4.2

 * Bug fixes
	* Fixed some issues with the (Dutch) translation files

* Enhancement
	* The contact form message is filtered now by using the function wp_kses() before the message is added to the email message


= 1.0.4 =

* Other
	* Added .pot file for translations

* Bug fixes
	* Removed the IF statement for the API key value inside the shortcode function. Since version 1.03 the API key isn't required anymore.
	* Fixed a view option name values inside the function FWS_ajax_contactform_action_callback()

* Enhancement
	* Added Dutch translations
	* Added a new option to change the "thank you message" (I keep the old text as fallback option)
	* Code optimizations (replaced standard PHP functions and code with native WordPress functions)
	* Added default options to plugin values (where possible)
	* New: Uninstall function - All plugin option are gone on removal


= 1.0.3 =

* Other
	* Added updated screenshots

* Bug fixes
	* The object name used for wp_localize_script is changed because of possible conflicts with other plugins or themes

* Enhancement
	* The Mailgun email address validation feature is now optional. The validation process is also moved from client side code (JS) to the server side code (PHP).
	* Before the form gets submitted, a simple email address validation (regular expression) is done.
	* Now it's possible to enter multiple subjects for the email message. These subjects are used to create a SELECT menu for the contact form
	* It's possible now to translate the complete plugin


= 1.0.2.1 =

* Other
	* Added icons for the plugin repository
	* The plugin is tested for WordPress 4.0
	* Added instructions for using the track Clicky goal feature
	* Added an updated screenshot for the plugin settings

= 1.0.2 =

* Bug fixes
	* Removed some typos in the text

* Enhancement
	* Simple goal or conversion tracking for Google Analytics and Clicky


= 1.0.1 =

* Bug fixes
	* Fixed the name for the nonce verification
	* Removed the bug for the wrong addressing of the ajax call back function

* Enhancement
	* Added some screenshots and FAQ's
	* Overwrite the mail subject global setting by using a shortcode attribute


= 1.0 =
* Initial release
