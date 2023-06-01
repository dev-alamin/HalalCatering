<?php
/**
 * Default page template
 * Full Width only contain Header And Footer
 */


defined( 'ABSPATH' ) || exit;

get_header();
?>
	
	<div class="fixed-navigation generic-menu-top">
		<?php
		get_template_part( 'layout/main-navigation' );
		$product_id = get_the_ID();
		$product    = wc_get_product( $product_id );
		
		$gallery_images = $product->get_gallery_image_ids();
		
		$product_menu_name = '';
		if ( ! empty( carbon_get_post_meta( get_the_ID(), 'product_menu_name' ) ) ) {
			$product_menu_name = carbon_get_post_meta( get_the_ID(), 'product_menu_name' );
		}
		
		$get_price = '';
		if ( ! empty( $product->get_price() ) ) {
			$get_price = $product->get_price();
		}
		
		$product_faqs = '';
		if ( ! empty( carbon_get_post_meta( get_the_ID(), 'product_faqs' ) ) ) {
			$product_faqs = carbon_get_post_meta( get_the_ID(), 'product_faqs' );
		}

		// product have additional product or not
		$has_additional_product = '';
		if ( ! empty( carbon_get_post_meta( get_the_ID(), 'have_additional' ) ) ) {
			$has_additional_product = carbon_get_post_meta( get_the_ID(), 'have_additional' );
		}
		
		?>
	</div>

	<div class="blend-selv-menu-position-wrapper-error">
	    <div class="section-inner-error">
			<button type="button">Okay</button>
		</div>
	</div>
	
	<div class="page-wrapper background-color-black overflow-hidden halal--single-product">
		<?php if ( $has_additional_product === 2 ): ?>
			<div 
				class="container padding-custom-second wow fadeInUp"
				data-wow-duration="1s"
				data-wow-delay="0s"
				>
				<div class="splitCols">
					<div class="col1">
						<div class="introStuff">
							<?php
							$product_feature_image_top_title = '';
							if ( ! empty( carbon_get_post_meta( get_the_ID(), 'product_feature_image_top_title' ) ) ):
								$product_feature_image_top_title = carbon_get_post_meta( get_the_ID(), 'product_feature_image_top_title' );
							endif;
							if ( ! empty( $product_feature_image_top_title ) ):
								?>
								<h1 class="grayColor"><?php echo $product_feature_image_top_title; ?></h1>
							<?php endif; ?>
							
							<?php
							$product_feature_image_top_short_des = '';
							if ( ! empty( carbon_get_post_meta( get_the_ID(), 'product_feature_image_top_short_des' ) ) ):
								$product_feature_image_top_short_des = carbon_get_post_meta( get_the_ID(), 'product_feature_image_top_short_des' );
							endif;
							if ( ! empty( $product_feature_image_top_short_des ) ):
								?>
								<p class="grayColor"><?php echo $product_feature_image_top_short_des; ?></p>
							<?php endif; ?>
							
							<div class="alleImages"><img src="<?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?>"/></div>
							
						</div>
						
						<?php
						$customized_menu_item = '';
						if ( ! empty( carbon_get_post_meta( get_the_ID(), 'additional_price' ) ) ):
							$customized_menu_item = carbon_get_post_meta( get_the_ID(), 'additional_price' );
							?>
							<div class="customizeMenuDiv">
								<!--h2 class="main-heading text-size-medium text-style-allcaps margin-bottom borderBottom">Tilpas menu</h2-->
								
								<!-- additional item -->
								<?php foreach ( $customized_menu_item as $item ):
									
									$product_price = '';
									if ( ! empty( $item['product_price'] ) ):
										$product_price = $item['product_price'];
									endif;
									
									$additional_price_title = '';
									if ( ! empty( $item['additional_price_title'] ) ):
										$additional_price_title = $item['additional_price_title'];
									endif;
									
									$additional_price_short_des = '';
									if ( ! empty( $item['additional_price_short_des'] ) ):
										$additional_price_short_des = $item['additional_price_short_des'];
									endif;
									?>
									<div class="singleCategory <?php echo sanitize_title( $item['additional_price_title'] ); ?>" data-included-amount="<?php echo $item['product_amount']; ?>" data-price="<?php echo $product_price; ?>" data-slug="<?php echo sanitize_title( $item['additional_price_title'] ); ?>">
										
										<?php if ( ! empty( $additional_price_title ) ): ?>
											<h2 class="categoryTitle main-heading text-size-medium text-style-allcaps">
												<?php echo $additional_price_title; ?>
											</h2>
										<?php endif; ?>
										
										<?php if ( ! empty( $additional_price_short_des ) ): ?>
											<p class="catDesc text-size-small pB10">
												<?php echo $additional_price_short_des; ?>
											</p>
										<?php endif; ?>
										
										<div class="amountRetValgt">
                                <span class="antalValgt">
                                    <span class="missingError">
                                        <?php if ( ! empty( $item['product_extra_info'] ) ): ?>
	                                        <?php echo $item['product_extra_info']; ?>
                                        <?php endif; ?>
                                    </span>
                                </span>
										</div>
										
										<?php if ( ! empty( $item['additional_price_extra_info_item'] ) ): ?>
											<div class="retterWrap">
												<?php foreach ( $item['additional_price_extra_info_item'] as $menu_id => $menu ): ?>
													<div class="singleRetWrap" data-amount='1' data-id="<?php echo $menu_id; ?>">
														
														<?php if ( ! empty( $menu['image'] ) ): ?>
															<?php echo wp_get_attachment_image( $menu['image'], 'full' ); ?>
														<?php endif; ?>
														
														<div class="singleRetTxtBg">
															<?php if ( ! empty( $menu['title'] ) ): ?>
																<p class="main-paragraph text-size-small">
																	<?php echo $menu['title']; ?>
																</p>
															<?php endif; ?>
															
															<div class="valgtIkkeValgtDiv"><span class="choiceIcon"></span> <span class="ikkeValgt">Ikke valgt</span><span class="valgt">Valgt</span></div>
														</div>
													</div>
												<?php endforeach; ?>
											
											</div>
										<?php endif; ?>
									
									</div>
								<?php endforeach; ?>
								<!-- end additional item -->
							
							</div>
						
						<?php endif; ?>
					
					</div>
					
					<div class="col2 cartCol">
						<div class="column shop">
							<h1 class="main-heading text-size-medium text-style-allcaps margin-bottom">
								<?php echo the_title(); ?>
							</h1>
							
							<div class="main-text text-size-large margin-bottom"><input type="hidden" id="originalPrice" value="<?php echo $get_price; ?>"/><span class="theTotalPricePrKuvert"><?php echo $get_price; ?></span>,-</div>
							
							<?php
								$product_single_page_short_description = '';
								if( !empty(  carbon_get_post_meta(get_the_ID(),'product_single_page_short_description') ) ):
									$product_single_page_short_description = carbon_get_post_meta(get_the_ID(),'product_single_page_short_description');
							?>
							<p class="main-paragraph text-size-small second margin-bottom">
								<?php echo $product_single_page_short_description; ?>
							</p>
							<?php endif; ?>

							<div>
								<form class="w-commerce-commerceaddtocartform display-flex-vertical"
								      action="<?php echo esc_url( the_permalink() ); ?>"
								      method="post"
								      enctype='multipart/form-data'
								      style="
                            opacity: 1;
                            -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        "
								      class="w-commerce-commerceaddtocartform display-flex-vertical"
								>
									<label for="quantity-18894a6343cae9765778e2a293333731" class="main-text text-size-regular text-style-allcaps margin-bottom">antal</label>
									
									<?php
									
									woocommerce_quantity_input(
										array(
											'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
											'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
											'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
											'class'       => 'w-commerce-commerceaddtocartquantityinput quantity',
										)
									);
									?>
									
									<!-- product addtional_information -->
									<input type="hidden" name="custom_price">
									<?php foreach ( $customized_menu_item as $item ) : ?>
										<input type="hidden" id="additional_title_id_<?php echo sanitize_title( $item['additional_price_title'] ); ?>" name="additional_title[input_<?php echo sanitize_title( $item['additional_price_title'] ); ?>]" data-title="<?php echo $item['additional_price_title']; ?>: ">
									<?php endforeach; ?>
									<!-- product addtional_information -->

									<div class="missing-addon-item">
										<?php echo esc_html_e('Please Select Addon item properly','halalcatering'); ?>
									</div>
									
									<button id="varriation_item_counter" type="submit" style="background-color: rgb(255, 255, 255); color: rgb(62, 61, 59);" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="w-commerce-commerceaddtocartbutton add-to-cart-button text-style-allcaps"><?php echo esc_html( 'Tilføj til kurv' ); ?></button>
									
									<div style="width: 0%;" class="line-bottom"></div>
									<div style="height: 0%;" class="line-right"></div>
									<div style="width: 0%;" class="line-top"></div>
									<div style="height: 0%;" class="line-left"></div>
								
								</form>
								
								<div data-node-type="commerce-add-to-cart-error" style="display: none;" class="w-commerce-commerceaddtocarterror">
									<div
											data-node-type="commerce-add-to-cart-error"
											data-w-add-to-cart-quantity-error="Product is not available in this quantity."
											data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart."
											data-w-add-to-cart-mixed-cart-error="You can’t purchase another product with a subscription."
											data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item."
											data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site."
											data-w-add-to-cart-select-all-options-error="Please select an option in each set."
									>
										Product is not available in this quantity.
									</div>
								</div>
							</div>
							<div
									data-w-id="1f6f40a9-b800-8543-d335-868e2c34d75f"
									style="
                            -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        "
									data-current="Tab 1"
									data-easing="ease"
									data-duration-in="300"
									data-duration-out="100"
									class="tabs-second w-tabs"
							></div>
							<div class="column display-flex-vertical margin-top"></div>
						</div>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		
		<?php else: ?>
		
		<div 
			class="container padding-custom-second wow fadeInUp"
			data-wow-duration="1s"
			data-wow-delay="0s"
			>
			<div class="w-layout-grid grid-2-columns product">
				<div
						id="w-node-c185a1f1-e7ac-40d9-304d-991fa5f44169-12d51d83"
						data-w-id="c185a1f1-e7ac-40d9-304d-991fa5f44169"
						style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 1; transform-style: preserve-3d;"
						class="column"
				>
					<img
							srcset="<?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?> 500w, <?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?> 800w, <?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?> 1600w, <?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?> 2000w, <?php echo wp_get_attachment_url( $product->get_image_id(),
								'full' ); ?> 3000w"
							loading="lazy"
							src="<?php echo wp_get_attachment_url( $product->get_image_id(), 'full' ); ?>"
							sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 84vw, (max-width: 1439px) 89vw, 84vw"
							alt=""
							class="image-third  hallal-single-shop-image"
					/>
					
					<?php if ( ! empty( $gallery_images ) ): ?>
						<div class="gallery-collection-list w-dyn-list">
							
							<div role="list" class="collection-list-grid-4-columns second w-dyn-items">
								<?php foreach ( $gallery_images as $item ): ?>
									<div role="listitem" class="w-dyn-item">
										<a href="#" class="w-inline-block w-lightbox">
											<img
													srcset="<?php echo wp_get_attachment_url( $item, 'full' ); ?> 500w, <?php echo wp_get_attachment_url( $item, 'full' ); ?> 800w, <?php echo wp_get_attachment_url( $item, 'full' ); ?> 1080w, <?php echo wp_get_attachment_url( $item, 'full' ); ?> 1100w"
													loading="lazy"
													sizes="(max-width: 767px) 21vw, (max-width: 991px) 17vw, (max-width: 1439px) 140px, 10vw"
													src="<?php echo wp_get_attachment_url( $item, 'full' ); ?>"
													alt=""
													class="image-second"
											/>
											<script type="application/json" class="w-json">
                                        {
                                            "items": [
                                                {
                                                    "_id": "example_img",
                                                    "origFileName": "ris.png",
                                                    "fileName": "ris.png",
                                                    "fileSize": 1843585,
                                                    "height": 1100,
                                                    "url": "<?php echo wp_get_attachment_url( $item, 'full' ); ?>",
                                                    "width": 1100,
                                                    "type": "image"
                                                }
                                            ],
                                            "group": "More Product"
                                        }
                                    
											
											
											</script>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif ?>
				
				</div>
				<div id="w-node-_6845dea4-6dc1-8336-f7b4-034ad2adddb7-12d51d83" class="column shop">
					
					<?php if ( ! empty( $product_menu_name ) ): ?>
						<div class="row display-flex-horizontal position-absolute">
							<div
									data-w-id="ad27b7e2-7c8f-955f-6614-8a3a7c4e1ced"
									style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
									class="main-text heading-large text-style-allcaps"
							>
								<?php echo $product_menu_name; ?>
							</div>
						</div>
					<?php endif; ?>
					
					<h1
							data-w-id="40a7dda4-1c89-e5bc-0d71-f3daa5d78330"
							style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
							class="main-heading text-size-medium text-style-allcaps margin-bottom"
					>
						<?php echo the_title(); ?>
					</h1>
					
					<?php if ( ! empty( $get_price ) ): ?>
						<div class="row display-flex-vertical">
							<div class="column no-padding">
								<div class="row display-flex-horizontal second">
									<div
											data-w-id="427bbbf4-e558-c849-dc62-37ab9aca3727"
											style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
											class="main-text text-size-large margin-bottom compare"
									></div>
								</div>
								<div
										data-w-id="90bf6209-9a46-502e-a525-c902a33c89fd"
										style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
										class="main-text text-size-large margin-bottom"
								>
									<span id="genuine-product-price"><?php echo $get_price; ?></span>,-
								</div>
							</div>
						</div>
					<?php endif ?>
					
					<p
							data-w-id="95dee617-d42e-ce99-cbc0-5615968810b4"
							style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
							class="main-paragraph text-size-small second margin-bottom"
					>
						<?php echo $product->get_short_description(); ?>
					</p>
					<div>
						
						<form class="w-commerce-commerceaddtocartform display-flex-vertical"
						      action="<?php echo esc_url( the_permalink() ); ?>"
						      method="post"
						      enctype='multipart/form-data'
						      style="
                            opacity: 1;
                            -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        "
						      class="w-commerce-commerceaddtocartform display-flex-vertical"
						>
							<label for="quantity-18894a6343cae9765778e2a293333731" class="main-text text-size-regular text-style-allcaps margin-bottom">antal</label>
							
							<?php
							
							woocommerce_quantity_input(
								array(
									'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
									'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
									'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
									'class'       => 'w-commerce-commerceaddtocartquantityinput quantity',
								)
							);
							?>
							
							<button type="submit" style="background-color: rgb(255, 255, 255); color: rgb(62, 61, 59);" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="w-commerce-commerceaddtocartbutton add-to-cart-button text-style-allcaps"><?php echo esc_html( 'Tilføj til kurv' ); ?></button>
							
							<div style="width: 0%;" class="line-bottom"></div>
							<div style="height: 0%;" class="line-right"></div>
							<div style="width: 0%;" class="line-top"></div>
							<div style="height: 0%;" class="line-left"></div>
						
						</form>
						
						
						<div style="display: none;" class="w-commerce-commerceaddtocartoutofstock">
							<div>This product is out of stock.</div>
						</div>
						<div data-node-type="commerce-add-to-cart-error" style="display: none;" class="w-commerce-commerceaddtocarterror">
							<div
									data-node-type="commerce-add-to-cart-error"
									data-w-add-to-cart-quantity-error="Product is not available in this quantity."
									data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart."
									data-w-add-to-cart-mixed-cart-error="You can’t purchase another product with a subscription."
									data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item."
									data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site."
									data-w-add-to-cart-select-all-options-error="Please select an option in each set."
							>
								Product is not available in this quantity.
							</div>
						</div>
					</div>
					
					<?php if ( ! empty( $product_faqs ) ): ?>
						<div
								style="
                            opacity: 1;
                            -webkit-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -moz-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            -ms-transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                            transform: translate3d(0, 50px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                        "
								data-current="Tab 1"
								data-easing="ease"
								data-duration-in="300"
								data-duration-out="100"
								class="tabs-second w-tabs"
						>
							<div class="w-tab-menu">
								<?php
								$counter_faq = 1;
								foreach ( $product_faqs as $item ):
									$className = '';
									if ( $counter_faq === 1 ) {
										$className = 'w--current';
									}
									?>
									<a data-w-tab="Tab <?php echo $counter_faq; ?>" class="tab-link-shop shop w-inline-block w-tab-link <?php echo $className; ?>">
										<div class="text-block-5">
											<?php echo $item['faq_title'] ?>
										</div>
									</a>
									<?php $counter_faq ++;endforeach; ?>
							</div>
							<div class="w-tab-content">
								<?php
								$counter_faq_two = 1;
								foreach ( $product_faqs as $item ):
									$className_two = '';
									if ( $counter_faq_two === 1 ) {
										$className_two = 'w--tab-active';
									}
									?>
									<div data-w-tab="Tab <?php echo $counter_faq_two; ?>" class="tab-pane-tab w-tab-pane <?php echo $className_two; ?>">
										<p class="main-text text-size-regular shop">
											<?php echo $item['faq_short_des'] ?>
										</p>
									</div>
									<?php $counter_faq_two ++;endforeach; ?>
							
							</div>
						</div>
					<?php endif; ?>
					
					<div class="column display-flex-vertical margin-top"></div>
				</div>
			</div>
		</div>
		
		<?php
		$single_product_faq_title = carbon_get_theme_option( 'single_product_faq_title' );
		$single_product_faq_faq   = carbon_get_theme_option( 'single_product_faqs' );
		
		if ( $single_product_faq_title && $single_product_faq_faq ):
			?>
			<div 
				class="container faq wow fadeInUp"
				data-wow-duration="1s"
				data-wow-delay="0s"
				>
				<div
						data-w-id="c7438835-bae5-f7ad-78d8-0c0e1efcec9b"
						class="main-text text-size-large text-style-allcaps faq-margin"
				>
					<?php echo $single_product_faq_title; ?>
				</div>
				
				<?php
				if ( ! empty( $single_product_faq_faq ) ):
					$single_product_counter = 1;
					if ( $single_product_counter === 1 ):
						$single_product_counter = 'first-faq';
					endif;
					foreach ( $single_product_faq_faq as $item ):
						?>
						<div data-hover="false" style="opacity: 1;" class="dropdown <?php echo $single_product_counter; ?> w-dropdown">
							<div class="dropdown-toggle w-dropdown-toggle">
								<div class="w-icon-dropdown-toggle"></div>
								<div class="text-block-8 text-block-10">
									<?php echo $item['prodict_faq_title']; ?>
								</div>
							</div>
							<nav class="dropdown-list w-dropdown-list">
								<p class="paragraph-2"><?php echo $item['product_faq_short_des']; ?></p>
							</nav>
						</div>
						<?php $single_product_counter ++;endforeach;endif; ?>
			
			</div>
		
		<?php endif; ?>
		
		<!-- half to half -->
		<?php
		$single_half_to_half_title = '';
		if ( ! empty( carbon_get_theme_option( 'single_half_to_half_title' ) ) ) {
			$single_half_to_half_title = carbon_get_theme_option( 'single_half_to_half_title' );
		}
		
		$single_half_to_half_name = '';
		if ( ! empty( carbon_get_theme_option( 'single_half_to_half_name' ) ) ) {
			$single_half_to_half_name = carbon_get_theme_option( 'single_half_to_half_name' );
		}
		
		$single_half_to_half_designation = '';
		if ( ! empty( carbon_get_theme_option( 'single_half_to_half_designation' ) ) ) {
			$single_half_to_half_designation = carbon_get_theme_option( 'single_half_to_half_designation' );
		}
		
		$single_half_to_half_short_des = '';
		if ( ! empty( carbon_get_theme_option( 'single_half_to_half_short_des' ) ) ) {
			$single_half_to_half_short_des = carbon_get_theme_option( 'single_half_to_half_short_des' );
		}
		
		$single_half_to_half_feature_image = '';
		if ( ! empty( carbon_get_theme_option( 'single_half_to_half_feature_image' ) ) ) {
			$single_half_to_half_feature_image = carbon_get_theme_option( 'single_half_to_half_feature_image' );
		}
		?>
		<div class="specialist-section wf-section topRedBorder">
			<div 
				data-current="Tab 1" 
				class="tabs w-tabs wow fadeInUp"
				data-wow-duration="1s"
				data-wow-delay="0s"
				>
				<div class="tabs-content w-tab-content">
					<div data-w-tab="Tab 1" class="tab-pane w-tab-pane w--tab-active">
						<div class="column max-width container padding-vertical padding-custom-third">
							<?php if ( ! empty( $single_half_to_half_title ) ): ?>
								<div class="main-text heading-small secondary-font margin-bottom">
									<?php echo $single_half_to_half_title; ?>
								</div>
							<?php endif; ?>
							
							<?php if ( ! empty( $single_half_to_half_feature_image ) ): ?>
								<div class="image overflow-hidden show-tablet">
									<img
											sizes="(max-width: 479px) 91vw, (max-width: 767px) 84vw, 100vw"
											srcset="<?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 500w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 800w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 1080w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 1214w"
											src="<?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?>"
											loading="lazy"
											alt=""
											class="menu-image shop-single-specilist"
									/>
								</div>
							<?php endif; ?>
							
							<?php if ( ! empty( $single_half_to_half_name ) ): ?>
								<div class="main-text text-style-allcaps text-size-medium secondary-font text-weight-bold">
									<?php echo $single_half_to_half_name; ?>
								</div>
							<?php endif; ?>
							
							<?php if ( ! empty( $single_half_to_half_designation ) ): ?>
								<div class="main-text secondary-font text-size-regular">
									<?php echo $single_half_to_half_designation; ?>
								</div>
							<?php endif; ?>
							
							<?php if ( ! empty( $single_half_to_half_short_des ) ): ?>
								<p class="main-paragraph text-size-medium text-weight-bold secondary-font">
									<?php echo $single_half_to_half_short_des; ?>
								</p>
							<?php endif; ?>
						</div>
						
						<?php if ( ! empty( $single_half_to_half_feature_image ) ): ?>
							<div class="image overflow-hidden hide-tablet">
								<img
										sizes="(max-width: 767px) 100vw, (max-width: 991px) 495.6666564941406px, 50vw"
										srcset="<?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 500w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 800w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 1080w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 1600w, <?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?> 1988w"
										src="<?php echo wp_get_attachment_url( $single_half_to_half_feature_image, 'full' ) ?>"
										loading="lazy"
										alt=""
										class="menu-image specialist shop-single-specilist"
								/>
							</div>
						<?php endif; ?>
					
					</div>
				</div>
			</div>
			<div class="line hide-tablet"></div>
		</div><!-- end half to half -->
		
		<?php
		// Get the current product ID
		$product_id = get_the_ID();
		
		// Get the product categories
		$product_categories = wp_get_post_terms( $product_id, 'product_cat' );
		
		// Loop through the product categories and get the first category ID
		$category_id = '';
		foreach ( $product_categories as $product_category ) {
			$category_id = $product_category->term_id;
			break;
		}
		
		// Get the products from the same category
		$args             = array(
			'post_type'      => 'product',
			'posts_per_page' => 4,
			'post__not_in'   => array( $product_id ),
			'orderby'        => 'rand',
			'tax_query'      => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'id',
					'terms'    => $category_id,
				),
			),
		);
		$related_products = new WP_Query( $args );
		if ( ! empty( $related_products->have_posts() ) ):
			?>
			<div 
				class="container wow fadeInUp"
				data-wow-duration="1s"
				data-wow-delay="0s"
				>
				<div class="row display-flex-horizontal second margin-bottom">
					<div class="main-text heading-large text-style-allcaps second">
						<?php echo esc_html_e( 'Andre menuer', 'halalcatering' ); ?>
					</div>
				</div>
			</div>
			<div 
				class="collection-list-wrapper-product w-dyn-list wow fadeInUp"
				data-wow-duration="1s"
				data-wow-delay="0s"
				>
				<div role="list" class="collection-list-grid-3-columns padding w-dyn-items">
					<?php
					while ( $related_products->have_posts() ) {
						$related_products->the_post();
						global $product;
						?>
						<div role="listitem" class="collection-item no-border w-dyn-item">
							<a
									data-w-id="cb686c6a-d5f0-a210-64ee-7163283b89be"
									style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
									href="<?php echo esc_url( get_permalink( $product->get_id() ) ) ?>"
									class="card-product container hover-shop w-inline-block"
							>
								<div class="overflow-hidden">
									<?php echo wp_get_attachment_image( $product->get_image_id(), 'full', '', array( 'class' => 'main-image' ) ); ?>
								</div>
								<div class="info-card-wrapper padding-vertical padding-small display-flex-horizontal">
									<div class="column">
										<div class="main-text text-size-medium secondary-font text-style-allcaps text-weight-bold">
											<?php echo esc_html( $product->get_title() ); ?>
										</div>
										<?php
										$product_single_page_short_description = '';
											if( !empty(  carbon_get_post_meta(get_the_ID(),'product_single_page_short_description') ) ):
												$product_single_page_short_description = carbon_get_post_meta(get_the_ID(),'product_single_page_short_description');
										?>
										<div class="row display-flex-horizontal second">
											<div class="main-text text-size-regular margin-top margin-xsmall text-color-white">
												<?php echo $product_single_page_short_description; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<div class="column text-color-white">
										<div class="main-text text-size-medium"><?php echo $product->get_price_html(); ?>,-</div>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		
		<?php endif; ?>
		
		<div class="filter fixed"></div>
		
		<?php endif; ?><!-- this Endif is for specific product -->
	
	</div>


<?php
get_footer();