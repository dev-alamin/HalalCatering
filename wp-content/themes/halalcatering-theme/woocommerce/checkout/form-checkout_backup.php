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
		
		<form method="post" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
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
										<?php
										if ( ! empty( $cart_item['additional_title'] ) ) {
											foreach ( $cart_item['additional_title'] as $title ) {
												echo '<p>' . $title . '</p>';
											}
										}
										?>
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
		
		<form data-node-type="commerce-checkout-shipping-methods-wrapper" class="w-commerce-commercecheckoutshippingmethodswrapper roundedBorder">
			<div class="w-commerce-commercecheckoutblockheader block-header roundedBorder">
				<h4>Leveringsmetode</h4>
			</div>
			<fieldset class="block-content bottomBorder">
				<div data-node-type="commerce-checkout-shipping-methods-list" class="w-commerce-commercecheckoutshippingmethodslist shipping-method-list">
					<label class="w-commerce-commercecheckoutshippingmethoditem block-content">
						<input type="radio" required="" checked="" name="shipping-method-choice" value="pickup">
						<div class="moveALittle">Jeg henter selv</div>
					</label>
				</div>
				<div data-node-type="commerce-checkout-shipping-methods-list" class="w-commerce-commercecheckoutshippingmethodslist shipping-method-list">
					<label class="w-commerce-commercecheckoutshippingmethoditem block-content">
						<input type="radio" required="" name="shipping-method-choice" value="home">
						<div class="moveALittle">Levering til adresse</div>
					</label>
				</div>
				
				<div data-node-type="commerce-checkout-shipping-methods-list" class="w-commerce-commercecheckoutshippingmethodslist shipping-method-list" id="homeZipContainer">
					<fieldset class="w-commerce-commercecheckoutblockcontent block-content"><label class="w-commerce-commercecheckoutlabel">Post nr. *</label><input type="text" class="w-commerce-commercecheckoutshippingfullname text-field no-margin" name="postnrForPris" id="postnrForPris" required="">
						<div class="w-commerce-commercecheckoutrow">
						</div>
						
						<div class="feedbackDelivery">
						</div>
						
						<div class="checkDeliveryPrice">
							<button id="beregnPrisBtn">Beregn pris</button>
						</div>
					</fieldset>
				</div>
			</fieldset>
		</form>
		
		
		<form data-node-type="commerce-checkout-shipping-methods-wrapper" class="w-commerce-commercecheckoutshippingmethodswrapper roundedBorder">
			<input type="hidden" id="totalAmountItems" value="50">
			<input type="hidden" id="subtotalCart" value="55000">
			<div class="w-commerce-commercecheckoutblockheader block-header roundedBorder">
				<h4>Ønsket dato og tid</h4>
			</div>
			<fieldset class="w-commerce-commercecheckoutblockcontent block-content bottomBorder">
				<div class="w-commerce-commercecheckoutrow">
				</div>
				
				<div>
					<input type="text" id="datetimepicker">
				</div>
				
				<div class="feedbackDate">
				</div>
				
				<div class="checkDeliveryPrice">
					<button id="testIfPossible">Test hvis muligt</button>
				</div>
			</fieldset>
		</form>
		
		
		<!--form data-node-type="commerce-checkout-customer-info-wrapper" class="w-commerce-commercecheckoutcustomerinfowrapper roundedBorder">
		  <div class="w-commerce-commercecheckoutblockheader block-header roundedBorder">
			<h4>Kunde info</h4>
		  </div>
		  <fieldset class="w-commerce-commercecheckoutblockcontent block-content bottomBorder"><label class="w-commerce-commercecheckoutlabel">Email *</label><input type="text" class="w-commerce-commercecheckoutemailinput text-field no-margin w-commerce-commercecheckoutshippingfullname" name="email" required=""><label class="w-commerce-commercecheckoutlabel">Telefon nr. *</label><input type="tel" class="w-commerce-commercecheckoutemailinput text-field no-margin" name="tlf" required=""></fieldset>
		</form-->
		
		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			
			<?php if ( $checkout->get_checkout_fields() ) : ?>
				
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				
				<div class="col2-set" id="customer_details">
					<div class="col-1">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>
					
					<div class="col-2">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>
				
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			
			<?php endif; ?>
			
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			
			<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
			
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
			
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
			
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		
		</form>
		<div class="w-commerce-commercecheckoutpaymentinfowrapper">
			<div class="w-commerce-commercecheckoutblockheader block-header roundedBorder">
				<h4>Betaling</h4>
			</div>
			<fieldset class="w-commerce-commercecheckoutblockcontent block-content bottomBorder"><label class="w-commerce-commercecheckoutlabel">The view of this area is Gateway dependant.</label>
			
			
			</fieldset>
		</div>
	</div>
	<div class="w-commerce-commercelayoutsidebar wrap-summary">
		<div class="w-commerce-commercecheckoutordersummarywrapper">
			<div class="w-commerce-commercecheckoutsummaryblockheader block-header roundedBorder">
				<h4>Oversigt</h4>
			</div>
			<fieldset class="w-commerce-commercecheckoutblockcontent block-content bottomBorder">
				<div class="w-commerce-commercecheckoutsummarylineitem">
					<div>Subtotal</div>
					<div id="subtotalPrice">55.000,00 DKK</div>
				</div>
				<div class="w-commerce-commercecheckoutsummarylineitem">
					<div>Levering</div>
					<div><span id="deliveryPrice">0,00</span> DKK</div>
				</div>
				<div class="w-commerce-commercecheckoutsummarylineitem">
					<div>Total</div>
					<div><span id="totalPrice">55.000,00</span> DKK</div>
				</div>
			</fieldset>
		</div>
		<div data-w-id="6f959faa-9d9c-2414-ff1a-4186a4dea9c7" class="overflow-hidden margin-bottom hover canter">
			<a href="#" class="removeTopPadding w-commerce-commercecheckoutplaceorderbutton button is-form-submit hover">Gennemfør</a>
			<div class="line position-absolute background-color-black"></div>
		</div>
	</div>
</div>
