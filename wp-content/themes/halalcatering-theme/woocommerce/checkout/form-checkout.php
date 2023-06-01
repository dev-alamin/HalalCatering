<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

?>

<div class="w-commerce-commercelayoutcontainer container-second w-container cartMain">
	<div class="w-commerce-commercelayoutmain">
		
		<form class="checkout-product-list" method="post" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			<div class="w-commerce-commercecheckoutorderitemswrapper">
				<div class="w-commerce-commercecheckoutsummaryblockheader block-header roundedBorder">
					<h4>Min kurv</h4>
				</div>
				<fieldset class="w-commerce-commercecheckoutblockcontent block-content bottomBorder">
					
					<div role="list" class="w-commerce-commercecheckoutorderitemslist">
						
						<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
							
							?>
							<div role="listitem" class="w-commerce-commercecheckoutorderitem">
								<!--img src="https://uploads-ssl.webflow.com/63bd1e4212055bcdebd51d95/63ef482299a7a39fb778c002_test3.png" alt="" class="w-commerce-commercecartitemimage"-->
								<div class="w-commerce-commercecheckoutorderitemdescriptionwrapper">
									<div class="w-commerce-commerceboldtextblock">
										<?php echo $_product->get_name(); ?>
									</div>
									<div class="w-commerce-commercecheckoutorderitemquantitywrapper">
										<div>Antal kuverter:</div>
										<div><?php echo $cart_item['quantity']; ?></div>
									</div>
									<ul class="w-commerce-commercecheckoutorderitemoptionlist">
									<div class="cartSpecs">
												<?php
												if ( ! empty( $cart_item['additional_title'] ) ) {
													foreach ( $cart_item['additional_title'] as $title ) {
														$new_string = str_replace( array(':','|'), "<br>", $title);
														 ?>
															<div class="cart-popup-list">
																<?php 
																	$lists = explode( '<br>',$new_string );

																	// start FORRET
																	if ($lists[0] === 'FORRET') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			$lists[$i] = $lists[$i] . ' (+35,00 DKK)';
																		} // End additional cost

																		$forrer_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $forrer_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $forrer_counter++;
																		endforeach;

																	} // end FORRET

																	// start HOVEDRET
																	if ($lists[0] === 'HOVEDRET') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			if( $i > 1 ):
																				$lists[$i] = $lists[$i] . ' (+45,00 DKK)';
																			endif;
																		} // End additional cost

																		$forrer_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $forrer_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $forrer_counter++;
																		endforeach;

																	} // end HOVEDRET

																	// start GARNITURE
																	if ($lists[0] === 'GARNITURE' | $lists[0] === 'KARTOFLER') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			if( $i > 1 ):
																				$lists[$i] = $lists[$i] . ' (+29,00 DKK)';
																			endif;
																		} // End additional cost

																		$garniture_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $garniture_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $garniture_counter++;
																		endforeach;

																	} // end GARNITURE

																	// start SAUCER
																	if ($lists[0] === 'SAUCER') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			if( $i > 1 ):
																				$lists[$i] = $lists[$i] . ' (+15,00 DKK)';
																			endif;
																		} // End additional cost

																		$kartofler_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $kartofler_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $kartofler_counter++;
																		endforeach;

																	} // end SAUCER

																	// start SALATER
																	if ($lists[0] === 'SALATER') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			if( $i > 3 ):
																				$lists[$i] = $lists[$i] . ' (+15,00 DKK)';
																			endif;
																		} // End additional cost

																		$kartofler_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $kartofler_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $kartofler_counter++;
																		endforeach;

																	} // end SALATER

																	// start TILBEHØR
																	if ($lists[0] === 'TILBEHØR') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			$lists[$i] = $lists[$i] . ' (+19,00 DKK)';
																		} // End additional cost

																		$forrer_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $forrer_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $forrer_counter++;
																		endforeach;

																	} // end TILBEHØR


																	// start DESSERTER
																	if ($lists[0] === 'DESSERTER') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			$lists[$i] = $lists[$i] . ' (+39,00 DKK)';
																		} // End additional cost

																		$forrer_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $forrer_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $forrer_counter++;
																		endforeach;

																	} // end DESSERTER

																	// start RETTER
																	if ($lists[0] === 'RETTER') {

																		// add additional cost
																		for ($i = 1; $i < count($lists); $i++) {
																			if( $i > 4 ):
																				$lists[$i] = $lists[$i] . ' (+29,00 DKK)';
																			endif;
																		} // End additional cost

																		$forrer_counter = 1;
																		foreach( $lists as $list ): ?>
																		    <!-- show title -->
																			<?php if( $forrer_counter === 1 ): ?>
																				<div class="specTitle"><?php echo $list; ?></div>

																				<!-- show sub item name -->
																				<?php else: ?>
																					<div class="specItem"><?php echo $list; ?></div>
																					<!-- end sub item name -->

																			<?php endif; ?>
																			<!-- end show title -->
																		<?php $forrer_counter++;
																		endforeach;

																	} // end DESSERTER

																?>
															</div>
													<?php }
												}
												?>
											</div>
									</ul>
								</div>
								<div>
									<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
										<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
									</td>
								</div>
							</div>
						<?php } ?>
					
					</div>
				</fieldset>
			</div>
		</form>
		
		
		<form name="checkout" method="post" class="checkout woocommerce-checkout checkout-form-wrapper" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			<div class="w-commerce-commercecheckoutorderitemswrapper">
					<?php if ( $checkout->get_checkout_fields() ) : ?>
					
					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
					
					<div class="col2-set" id="customer_details">
						<div class="billing-form-style">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>
						
						<div class="billing-form-style">
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>
					</div>
					
					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
				
				<?php endif; ?>
				
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
				
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				
				<div id="order_review" class="woocommerce-checkout-review-order w-commerce-commercelayoutsidebar wrap-summary">
					<h3 id="order_review_heading"><?php esc_html_e( 'Oversigt', 'woocommerce' ); ?></h3>
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			
			</div>
		</form>
	</div>
</div>
