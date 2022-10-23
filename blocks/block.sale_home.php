
<?php
global $database;
global $ariacms;
global $params;
$query = "SELECT * FROM e4_posts WHERE post_type = 'post' and post_status = 'active' ORDER BY id desc LIMIT 0, 3";
$database->setQuery($query);
$posts = $database->loadObjectList();

$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_group' AND position = 'home' AND status = 'active' AND count > 0 ORDER BY e4_term_taxonomy.order LIMIT 1,3 ";
$database->setQuery($query);
$taxonomies = $database->loadObjectList();

$query = "SELECT  a.*
		FROM e4_posts a
		WHERE a.post_type = 'product' AND a.post_status = 'active' and product_price - product_sale >0
		order by a.id desc limit 0,10
		";
$database->setQuery($query);
$products = $database->loadObjectList();
?>

<div class="container">
	<div class="vc_row wpb_row vc_row-fluid best-pro vc_custom_1545648066104">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner vc_custom_1544687714545">
				<div class="wpb_wrapper">
				<?php if(count($products)>0){?>
					<div class="slider-items-products">
					<div class="new_title"><h2>Sale Now</h2><h4><?= _Quickly_shop?></h4></div>
						<div id="best-seller" class="product-flexslider hidden-buttons">
							<div class="slider-items slider-width-col4 products-grid">
								<?php foreach($products as $product){?>
								<!-- item -->
								<div class="item">
									<div class="item-inner">
										<div class="item-img">
											<div class="item-img-info">
												<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="<?= $product->{$params->title}?>" class="product-image">
												<img onload="Wpfcll.r(this,true);" src="<?= $product->image?>" data-wpfc-original-src="<?= $product->image?>" alt="Fresh Red Seedless"></a>
												<div class="new-label new-top-left">Hot</div>
												<div class="sale-label sale-top-left">-<?= number_format((($product->product_price-$product->product_sale )/$product->product_price)* 100,0) ?>%</div>
												<div class="item-box-hover">
													<div class="box-inner">
													<div class="product-detail-bnt">
														<a  class="button detail-bnt" onclick="view(<?= $product->id?>)">
														<span>Quick View</span></a>
													</div>
														<div class="actions">
															<div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart">
															<div class="tinv-wishlist-clear"></div>
															<a onclick="addWish(<?= $product->id?>)" role="button" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button fa fa-heart tinvwl-position-shortcode" data-tinv-wl-list="[]" data-tinv-wl-product="86" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="variable" data-tinv-wl-action="add" >
																<span class="tinvwl_add_to_wishlist-text">Add to Wishlist</span>
															</a>
															<div class="tinv-wishlist-clear"></div>
															<div class="tinvwl-tooltip">Add to Wishlist</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="add_cart" >
												<a onclick="addCart(<?= $product->id?>)"  class="button btn-cart button"  >
													<span>Select options</span>
												</a>
											</div>
										</div>
										<div class="item-info">
											<div class="info-inner">
											<div class="item-title">
												<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="<?= $product->{$params->title}?>"><?= $product->{$params->title}?></a>
											</div>
											<div class="item-content">
										 <div class="rating">
											 <div class="ratings">
												 <div class="star-rating" role="img" aria-label="Rated <?= $product->rating?> out of 5">
													<span style="width:<?= ($product->rating/5)*100?>%">Rated <strong class="rating"><?= $product->rating?></strong> out of 5</span>
												 </div>
											 </div>
										 </div>
										 <div class="item-price">
											 <div class="price-box">
												 <span class="regular-price">
													 <span class="price">
														 <del>
															 <span class="woocommerce-Price-amount amount">
																 <bdi>
																 <?=  number_format($product->product_price, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
															 </span>
														 </del> 
													 <ins>
														 <span class="woocommerce-Price-amount amount">
															 <bdi>
															 <?= number_format($product->product_sale, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
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
								</div><!--End item -->
								<?php }?>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="loader-image" style="display:none;"></div>
					<div class="ajaxphp-results" id="view"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php  ///print_r($_SESSION); ?>


<script>
		
	
		
	function addWishlist(id){
		var f = "pid=" + id ;
		var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php";
		
		$.ajax({
			url: _url,
			data: f,
			cache: false,
			context: document.body,
			success: function(data) {
				
				alert("Thêm sản phẩm vào giỏ thành công.");
			}
		});alert(f);
	}
</script>