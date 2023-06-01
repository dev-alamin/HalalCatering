<?php
/**
 * The template for displaying search forms
 *
 * @package fb
 */

// Exit if afbessed directly.
defined( 'ABSPATH' ) || exit;
$col_cross_arrow = '<svg width="32" height="32" viewBox="0 0 32 32" fill="#5f5f5f" xmlns="http://www.w3.org/2000/svg"><path fill="#000" d="M10.6825 23.6603L16.1541 18.1887L21.6258 23.6603C22.2824 24.3169 23.1579 24.3169 23.8145 23.6603C24.4711 23.0037 24.4711 22.1283 23.8145 21.4717L18.3428 16L23.8145 10.5283C24.4711 9.87174 24.4711 8.99628 23.8145 8.33968C23.1579 7.68308 22.2824 7.68308 21.6258 8.33968L16.1541 13.8113L10.6825 8.33968C10.0259 7.68308 9.15042 7.68308 8.49382 8.33968C7.83722 8.99628 7.83722 9.87174 8.49382 10.5283L13.9655 16L8.49382 21.4717C7.83722 22.1283 7.83722 23.0037 8.49382 23.6603C9.15042 24.3169 10.0259 24.3169 10.6825 23.6603Z" fill="#070716"/></svg>';
$search_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ccc" d="M21.172 24l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z"/></svg>';
?>

<form class="searchform" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<h6 class="title"><?php echo _e( 'Search', 'halalcatering' ) ?></h6>
	<button type="button" class="popup-modal-dismiss"><?php echo esc_html( $col_cross_arrow ); ?></button>

	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'halalcatering' ); ?>" value="<?php the_search_query(); ?>">
		<button type="submit"><?php echo esc_html( $search_icon ) ?></button>		
	</div>
</form>
