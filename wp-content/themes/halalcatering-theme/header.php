<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fb
 */

// Exit if afbessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, height=device-height">
	<meta name="theme-color" content="#131548">
	
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
	<script type="text/javascript">WebFont.load({  google: {    families: ["Noto Sans:regular,700","Poppins:200,300,regular,500,600"]  }});</script>

	<style>
		* {
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
	</style>

	<?php wp_head(); ?>	

	<?php 
		$style_hidden = '';
		if ( ! empty( $_POST['add-to-cart'] ) ):
			$style_hidden = 'hidden';
		endif;

		if ( ! empty( $_POST['update_cart'] ) ):
			$style_hidden = 'hidden';
		endif;
	?>
	
</head>


<body style="overflow:<?php echo $style_hidden; ?>" <?php body_class(); ?>>




