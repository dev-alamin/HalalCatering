<?php
$data = getData();

if ( is_user_logged_in() ) {
	$class = "top-30px";
}

$display_flex = '';
if ( ! empty( $_POST['add-to-cart'] ) ):
	$display_flex = 'flex';
endif;

if ( ! empty( $_POST['update_cart'] ) ):
	$display_flex = 'flex';
endif;

?>


<div class="preloader-section"></div>

<div data-animation="default" data-collapse="all" data-duration="0" data-easing="ease" data-easing2="linear" role="banner" class="navbar container w-nav">
	<?php if ( ! empty( carbon_get_theme_option( 'company_logo' ) ) ): ?>
		<a
				href="<?php echo site_url( '/' ); ?>"
				aria-current="page"
				class="brand w-nav-brand w--current">
			<img src="<?php echo wp_get_attachment_url( carbon_get_theme_option( 'company_logo' ) ); ?>" loading="eager" width="80" height="Auto" alt="" sizes="80px" srcset="<?php echo wp_get_attachment_url( carbon_get_theme_option( 'con_feature_image' ) ); ?>" class="image-2">
		</a>
	<?php endif; ?>
	
	<nav role="navigation" class="nav-menu w-nav-menu">
		<div class="wrap-nav-menu container display-flex-horizontal">
			<div class="column">
				<div class="main-text secondary-font text-color-white menu text-style-allcaps text-weight-bold">LINKS</div>
				<div class="w-layout-grid grid-2-columns menu">
					<div id="w-node-a30f3749-5169-c8e9-d0a1-d7d7321496d2-321496ca" class="column display-flex-vertical">
						<div class="wrap-link-menu">
							<a href="<?php echo site_url( '/' ); ?>" aria-current="page" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover w--current">Forside</a>
							<div class="line position-absolute"></div>
						</div>
						<div class="wrap-link-menu">
							<a href="<?php echo site_url( '/shop' ); ?>" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover">Shop</a>
							<div class="line position-absolute"></div>
						</div>
						<div class="wrap-link-menu">
							<a href="<?php echo site_url( '/om-os' ); ?>" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover">Om os</a>
							<div class="line position-absolute"></div>
						</div>
						<div class="wrap-link-menu show-mobile-portrate">
							<a href="<?php echo site_url( '/kontakt' ); ?>" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover">Kontakt</a>
							<div class="line position-absolute"></div>
						</div>
						<div class="wrap-link-menu main">
							<a href="mailto:info@halalcatering.dk" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover mail">info@halalcatering.dk</a>
							<div class="line position-absolute"></div>
						</div>
					</div>
					<div id="w-node-a30f3749-5169-c8e9-d0a1-d7d7321496db-321496ca" class="column display-flex-vertical hide-mobile-landscape">
						<div class="wrap-link-menu hide-mobile-portrate">
							<a href="<?php echo site_url( '/kontakt' ); ?>" class="main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small hover">Kontakt</a>
							<div class="line position-absolute"></div>
						</div>
						<div class="w-layout-grid grid-3-columns icon menu">
							<a id="w-node-a4d8fa66-efdc-b2bd-188a-3f459896ad21-321496ca" href="#" class="social-link-block-navbar hover w-inline-block">
								<div class="social-icon w-embed">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="100%" height="100%" fill="currentColor" viewbox="0 0 56.693 56.693" enable-background="new 0 0 56.693 56.693" xml:space="preserve">
                      <g>
	                      <path d="M28.347,5.155c-13.6,0-24.625,11.025-24.625,24.625c0,13.602,11.025,24.625,24.625,24.625   c13.598,0,24.623-11.023,24.623-24.625C52.97,16.181,41.944,5.155,28.347,5.155z M42.062,41.741c0,1.096-0.91,1.982-2.031,1.982   H16.613c-1.123,0-2.031-0.887-2.031-1.982V18.052c0-1.094,0.908-1.982,2.031-1.982H40.03c1.121,0,2.031,0.889,2.031,1.982V41.741z"></path>
	                      <path d="M33.099,26.441c-2.201,0-3.188,1.209-3.74,2.061v0.041h-0.027c0.01-0.012,0.02-0.027,0.027-0.041v-1.768h-4.15   c0.055,1.17,0,12.484,0,12.484h4.15v-6.973c0-0.375,0.027-0.744,0.137-1.012c0.301-0.744,0.984-1.52,2.129-1.52   c1.504,0,2.104,1.146,2.104,2.824v6.68h4.15V32.06C37.878,28.224,35.829,26.441,33.099,26.441z"></path>
	                      <path d="M20.864,20.712c-1.419,0-2.349,0.934-2.349,2.159c0,1.197,0.9,2.158,2.294,2.158h0.027c1.447,0,2.348-0.961,2.348-2.158   C23.157,21.646,22.284,20.712,20.864,20.712z"></path>
	                      <rect x="18.762" y="26.734" width="4.151" height="12.484"></rect>
                      </g>
                    </svg>
								</div>
							</a>
							<a href="#" class="social-link-block-navbar hover w-inline-block">
								<div class="social-icon w-embed">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="100%" height="100%" viewbox="0 0 56.693 56.693" enable-background="new 0 0 56.693 56.693" xml:space="preserve" fill="currentColor">
                      <path d="M28.347,5.157c-13.6,0-24.625,11.027-24.625,24.625c0,13.6,11.025,24.623,24.625,24.623c13.6,0,24.625-11.023,24.625-24.623  C52.972,16.184,41.946,5.157,28.347,5.157z M34.864,29.679h-4.264c0,6.814,0,15.207,0,15.207h-6.32c0,0,0-8.307,0-15.207h-3.006  V24.31h3.006v-3.479c0-2.49,1.182-6.377,6.379-6.377l4.68,0.018v5.215c0,0-2.846,0-3.398,0c-0.555,0-1.34,0.277-1.34,1.461v3.163  h4.818L34.864,29.679z"></path>
                    </svg>
								</div>
							</a>
							<a href="#" class="social-link-block-navbar hover w-inline-block">
								<div class="social-icon w-embed">
									<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 25 25" fill="none">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M20.4522 4.72446C18.4011 2.67108 15.6736 1.53976 12.7676 1.53857C6.77983 1.53857 1.90643 6.41157 1.90409 12.4012C1.90326 14.3159 2.40349 16.1847 3.35418 17.8321L1.81299 23.4614L7.57186 21.9508C9.15856 22.8162 10.9451 23.2724 12.7632 23.273H12.7676C12.768 23.273 12.7674 23.273 12.7677 23.273C18.7549 23.273 23.6286 18.3996 23.6311 12.4098C23.6321 9.50711 22.5032 6.77776 20.4522 4.72446ZM12.7676 21.4384H12.7639C11.1438 21.4378 9.55468 21.0024 8.16836 20.1798L7.83869 19.9841L4.42129 20.8806L5.33348 17.5487L5.11878 17.207C4.21496 15.7694 3.73761 14.1079 3.73831 12.4018C3.74025 7.42347 7.79084 3.37332 12.7713 3.37332C15.1829 3.37407 17.45 4.31453 19.1548 6.02123C20.8595 7.72792 21.7978 9.9965 21.7968 12.4091C21.7948 17.3878 17.7443 21.4384 12.7676 21.4384Z" fill="currentColor"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7202 14.6757C17.4488 14.5399 16.1143 13.8833 15.8655 13.7927C15.6167 13.7021 15.4357 13.6568 15.2548 13.9285C15.0738 14.2002 14.5536 14.8116 14.3953 14.9928C14.237 15.1739 14.0786 15.1967 13.8072 15.0607C13.5358 14.9248 12.6611 14.6383 11.6244 13.7135C10.8174 12.9937 10.2727 12.1049 10.1143 11.8331C9.95596 11.5614 10.0974 11.4145 10.2333 11.2791C10.3554 11.1574 10.5048 10.9621 10.6405 10.8036C10.7762 10.6451 10.8215 10.5318 10.9119 10.3508C11.0024 10.1696 10.9572 10.0111 10.8893 9.87524C10.8215 9.73937 10.2786 8.40332 10.0524 7.85973C9.83205 7.33052 9.6083 7.40222 9.44166 7.3938C9.28357 7.38591 9.10237 7.38428 8.92144 7.38428C8.74051 7.38428 8.44638 7.45223 8.19763 7.72391C7.94884 7.99568 7.24756 8.65242 7.24756 9.98835C7.24756 11.3244 8.22021 12.6152 8.35594 12.7963C8.49163 12.9775 10.27 15.7191 12.9929 16.8949C13.6405 17.1746 14.1461 17.3416 14.5403 17.4667C15.1906 17.6733 15.7823 17.6441 16.25 17.5742C16.7715 17.4963 17.856 16.9176 18.0821 16.2836C18.3084 15.6495 18.3084 15.106 18.2404 14.9928C18.1726 14.8796 17.9917 14.8116 17.7202 14.6757Z" fill="currentColor"></path>
									</svg>
								</div>
							</a>
							<a href="#" class="social-link-block-navbar hover w-inline-block">
								<div class="social-icon w-embed">
									<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewbox="0 0 56.7 56.7">
										<defs>
											<style>.cls-1 {
													fill: currentColor;
												}</style>
										</defs>
										<circle class="cls-1" cx="28.1" cy="30" r="4.4"></circle>
										<path class="cls-1" d="M33.6,19.2h-11a5.46,5.46,0,0,0-3.9,1.4,5.46,5.46,0,0,0-1.4,3.9v11a5.51,5.51,0,0,0,1.5,4,5.64,5.64,0,0,0,3.9,1.4H33.6a5.46,5.46,0,0,0,3.9-1.4A5.12,5.12,0,0,0,39,35.6v-11a5.64,5.64,0,0,0-1.4-3.9A5.35,5.35,0,0,0,33.6,19.2ZM28.1,36.8a6.8,6.8,0,0,1,0-13.6,6.8,6.8,0,1,1,0,13.6Zm7.1-12.3a1.6,1.6,0,1,1,1.6-1.6A1.58,1.58,0,0,1,35.2,24.5Z"></path>
										<path class="cls-1" d="M28.3,5.2A24.6,24.6,0,1,0,52.9,29.8,24.58,24.58,0,0,0,28.3,5.2ZM41.4,35.6a7.93,7.93,0,0,1-2.2,5.7,7.78,7.78,0,0,1-5.6,2.1H22.7a7.78,7.78,0,0,1-5.6-2.1,7.53,7.53,0,0,1-2.2-5.7v-11a7.4,7.4,0,0,1,7.8-7.8h11a7.37,7.37,0,0,1,7.7,7.8Z"></path>
									</svg>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap-image-hover overflow-hidden static hide-tablet">
				<div class="overflow-hidden wrap-image-hover">
					<img src="images/snack1a.jpg" loading="lazy" sizes="100vw" srcset="images/snack1a-p-500.jpeg 500w, images/snack1a-p-800.jpeg 800w, images/snack1a.jpg 1000w" alt="" class="main-image absolute"><img src="images/box12.jpg" loading="lazy" sizes="100vw" srcset="images/box12-p-500.jpeg 500w, images/box12.jpg 1000w" alt="" class="main-image absolute"><img src="images/eiliv-sonas-aceron-ZuIDLSz3XLg-unsplash-2.jpg" loading="lazy" alt="" class="main-image absolute"><img src="images/nadine-primeau-l5Mjl9qH8VU-unsplash.jpg" loading="lazy" alt="" class="main-image absolute">
				</div>
			</div>
			<div class="filter"></div>
		</div>
	</nav>
	
	<a href="<?php echo site_url( '/shop' ); ?>" class="moveALittleLeft main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small makeroomlink">Shop</a>
	<a href="<?php echo site_url( '/om-os' ); ?>" class="moveALittleLeft main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small makeroomlink noleftauto">Om os</a>
	<a href="<?php echo site_url( '/kontakt' ); ?>" class="moveALittleLeft main-link text-size-medium text-color-white text-style-allcaps margin-bottom margin-small makeroomlink norrightpad noleftauto">Kontakt</a>
	<div data-node-type="commerce-cart-wrapper" data-open-product="" data-wf-cart-type="modal" data-wf-cart-query="" data-wf-page-link-href-prefix="" class="w-commerce-commercecartwrapper cart">
		<a href="#" data-node-type="commerce-cart-open-link" class="w-commerce-commercecartopenlink cart-button w-inline-block toggleCart">
			<div class="text-cart w-inline-block">Kurv</div>
			<?php
			global $woocommerce;
			$cart        = $woocommerce->cart;
			$total_items = $cart->get_cart_contents_count();
			
			?>
			<div class="w-commerce-commercecartopenlinkcount cart-quantity">
				<?php echo $total_items; ?>
			</div>
		</a>
		
		
		<div id="popOpCart" class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-modal" style="display:<?php echo $display_flex; ?>">
			<div class="w-commerce-commercecartcontainer cart-container background-custom-color">
				<div class="w-commerce-commercecartheader block-header">
					<h4 class="w-commerce-commercecartheading cart-heading">DIN KURV </h4>
					<a href="#" class="w-commerce-commercecartcloselink close-button w-inline-block closePopCart">
						<svg class="icon-cart" width="16px" height="16px" viewbox="0 0 16 16">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g fill-rule="nonzero" fill="#FFFFFF">
									<polygon points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8 9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835 2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524 2.38388348 6.23223305 8"></polygon>
								</g>
							</g>
						</svg>
					</a>
				</div>
				 
				
				<div class="w-commerce-commercecartformwrapper">

					<form class="w-commerce-commercecartform default-state" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
						<?php do_action( 'woocommerce_before_cart_table' ); ?>
				
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>
				
								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				
									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										
										

										?>
									
										<div class="w-commerce-commercecartitem">
											<div class="w-commerce-commercecartiteminfo display-flex-vertical">
												<div class="w-commerce-commercecartproductname">
													<?php echo $_product->get_name(); ?>
												</div><!-- end product name -->
												<div>
													<?php 
														$update_subtotal_price = $cart_item['line_total'];
														echo wc_price( $update_subtotal_price );  ?>
												</div><!-- end price -->

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

												<a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" class="remove-button overflow-hidden w-inline-block">
													<div class="main-link removelink">Fjern fra kurv</div>
													<div class="line position-absolute black"></div>
												</a>
												
											</div>
											<?php
												if ( $_product->is_sold_individually() ) {
													$min_quantity = 1;
													$max_quantity = 1;
												} else {
													$min_quantity = 0;
													$max_quantity = $_product->get_max_purchase_quantity();
												}
					
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_class'  => 'custom-class',
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $max_quantity,
														'min_value'    => $min_quantity,
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
					
												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
											?>
										</div>
										
										
										<?php
									}
								}
								?>
				
								<?php do_action( 'woocommerce_cart_contents' ); ?>
			
				
								<?php do_action( 'woocommerce_after_cart_contents' ); ?>
								
						<?php do_action( 'woocommerce_after_cart_table' ); ?>
					
								
						<div class="w-commerce-commercecartfooter cart-footer">

							<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Opdater indkøbsvogn', 'woocommerce' ); ?>"><?php esc_html_e( 'Opdater indkøbsvogn', 'woocommerce' ); ?></button>
				
							<?php do_action( 'woocommerce_cart_actions' ); ?>
	
							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

							<div class="w-commerce-commercecartlineitem">
								
								<div class="cart-text"><?php echo esc_html_e( 'Subtotal', 'halalcatering' ); ?></div>
								
								<?php
									$cartCounter = WC()->cart;

									if ( $cartCounter->is_empty() ):
								?>
								<div class="w-commerce-commercecartordervalue">
									0
								</div>
								<?php else: 
									$subtotal_price =  WC()->cart->subtotal;
									?>
									<div class="w-commerce-commercecartordervalue">
										<?php
											echo wc_price($subtotal_price);
										?>
									</div>
								<?php endif; ?>
							</div>
							<div>
								<div class="overflow-hidden margin-bottom left hover">
									<a href="<?php echo esc_url( site_url( '/checkout' ) ); ?>" value="Fortsæt til chekout" class="w-commerce-commercecartcheckoutbutton main-button black">
										<?php echo esc_html_e( 'Fortsæt til chekout', 'halalcatering' ); ?>
									</a>
									<div class="line position-absolute background-color-black" style="transform: translate3d(-101%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d;"></div>
								</div>
							</div>
						</div>

					</form>

						</div>
		
			
			</div>
		</div>
	
	
	</div>
	<div class="menu-button hover show-mobile-portrate w-nav-button">
		<div class="top-line"></div>
		<div class="bottom-line"></div>
	</div>
</div>
	