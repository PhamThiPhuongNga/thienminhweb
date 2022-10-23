<?php
	global $database;
	global $ariacms;
	global $params;
	
	$query = "SELECT a.* from e4_web_home a where a.parent > 0 and `order` = 2 ORDER BY `a`.`parent` DESC  limit 1";
	$database->setQuery($query);
	$detail = $database->loadRow();
	
	$query = "SELECT *,(1 -(product_sale/product_price))*100 discount FROM `e4_posts` a left join e4_term_relationships b on b.object_id = a.id where a.post_status='active' and b.term_taxonomy_id = 41 ORDER BY id desc limit 4";
	$database->setQuery($query);
	$sales = $database->loadObjectList();
	
	if($detail['date_start'] <= time() and $detail['date_end']>=time()){
?>

<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="hot-section" style="background:url(<?= $detail["image"]?>) no-repeat 0 0px;">
					<div class="container">
						<div class="row">
							<div class="ad-info">
								<h2><?= $detail[$params->topic]?></h2>
								<h3><?= $detail[$params->title]?></h3>
								<h4><?= $detail[$params->brief]?></h4>
							</div>
						</div>
						<div class="row">
							<div class="hot-deal">
								<div class="box-timer"> 
									<span class="timer-grid" data-countdown="<?= date("Y/m/d",$detail['date_end'])?>"></span>
								</div>
								<ul class="products-grid">
									<?php foreach($sales as $sale){?>
									<li class="item col-lg-3 col-md-3 col-sm-3 col-xs-6">
										<div class="item-inner">
											<div class="item-img">
												<div class="item-img-info">
													<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $sale->url_part?>.html" title="<?= $sale->{$params->title}?>" class="product-image">
														<img src="<?= $sale->image?>" alt="Fresh Organic Mustard Leaves">
													</a>
													<?php if($sale->product_price>0){?>
													<div class="new-label new-top-left">Hot</div>
													<div class="sale-label sale-top-left">-<?= number_format($sale->discount,0) ?>%</div>
													<?php }?>
													<div class="item-box-hover">
														<div class="box-inner">
															<div class="product-detail-bnt">
																<a onclick="view(<?= $sale->id?>)"  class="button detail-bnt" id="<?= $sale->id?>">
																	<span>Quick View</span>
																</a>
															</div>
															<div class="actions">
																<div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart" data-product_id="<?= $sale->id?>"> 
																	<div class="tinv-wishlist-clear"></div>
																	<a onclick="addWish(<?= $sale->id?>)" role="button" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-shortcode" data-tinv-wl-list="[]" data-tinv-wl-product="121" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add">
																		<span class="tinvwl_add_to_wishlist-text">Add to Wishlist</span>
																	</a>
																	<div class="tinv-wishlist-clear"></div>
																	<div class="tinvwl-tooltip">Add to Wishlist</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="add_cart">
													<a onclick="addCart(<?= $sale->id?>)" href="#" data-quantity="1" class="button btn-cart button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="121" data-product_sku="KJ3SA62" aria-label="Add “Fresh Organic Mustard Leaves” to your cart" rel="nofollow"><span>Add to cart</span></a>
												</div>
											</div>
										<div class="item-info">
											<div class="info-inner">
												<div class="item-title">
													<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $sale->url_part?>.html" title="Fresh Organic Mustard Leaves"><?= $sale->{$params->title}?></a>
												</div>
												<div class="item-content">
													<div class="rating">
														<div class="ratings">
															<div class="star-rating" role="img" aria-label="Rated <?= $sale->rating?> out of 5">
																<span style="width:<?= ($sale->rating/5)*100?>%">Rated <strong class="rating"><?= $sale->rating?></strong> out of 5</span>
															</div>
														</div>
													</div>
													<div class="item-price">
														<div class="price-box">
															<span class="regular-price">
																<span class="price">
																<?php if($sale->product_price>0){?>
																	<del><span class="woocommerce-Price-amount amount">
																		<bdi><?= number_format($sale->product_price, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
																		</span>
																	</del> 
																<?php }?>
																	<ins>
																		<span class="woocommerce-Price-amount amount">
																			<bdi>
																				<?= number_format($sale->product_sale, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span>
																			</bdi>
																		</span>
																	</ins>
																</span> 
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										</div>
									</li>
									<?php }?>
								</ul>
							</div>
						</div>
						<div class="row"></div>
						<div class="loader-image" style="display:none;"></div>
						<div class="ajaxphp-results">
						</div>
					</div>
				</div>
			</div>
		</div>																	
	</div>
</div>
	<?php }?>

