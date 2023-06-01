<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$text_align  = is_rtl() ? 'right' : 'left';
$margin_side = is_rtl() ? 'left' : 'right';

foreach ( $items as $item_id => $item ) :
	$product       = $item->get_product();
	$sku           = '';
	$purchase_note = '';
	$image         = '';

	if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		continue;
	}

	if ( is_object( $product ) ) {
		$sku           = $product->get_sku();
		$purchase_note = $product->get_purchase_note();
		$image         = $product->get_image( $image_size );
	}

	?>
	<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
		<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align: middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;">
		<?php

		// Show title/image etc.
		if ( $show_image ) {
			echo wp_kses_post( apply_filters( 'woocommerce_order_item_thumbnail', $image, $item ) );
		}

		// Product name.
		echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) );

		// SKU.
		if ( $show_sku && $sku ) {
			echo wp_kses_post( ' (#' . $sku . ')' );
		}

		// allow other plugins to add additional product information here.
		do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text ); ?>

		<div class="cartSpecs">
			<?php
			if ( ! empty( $item['additional_title'] ) ) {
				foreach ( $item['additional_title'] as $title ) {
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

		</td>
		<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
			<?php
			$qty          = $item->get_quantity();
			$refunded_qty = $order->get_qty_refunded_for_item( $item_id );

			if ( $refunded_qty ) {
				$qty_display = '<del>' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';
			} else {
				$qty_display = esc_html( $qty );
			}
			echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $qty_display, $item ) );
			?>
		</td>
		<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
			<?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?>
		</td>
	</tr>
	<?php

	if ( $show_purchase_note && $purchase_note ) {
		?>
		<tr>
			<td colspan="3" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
				<?php
				echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) );
				?>
			</td>
		</tr>
		<?php
	}
	?>

<?php endforeach; ?>
