<?php
class View
{
	static function viewhome()
	{
		global $ariacms;
		global $params;
		global $database;
		global $ariaConfig_template;
		global $analytics_code;
		$i = 0;
		//print_r($_SESSION);
		if ($_SESSION['orderCart']) {
			foreach ($_SESSION['orderCart'] as $productID => $quantity) {
				$i += $quantity;
			}
			$id= array();
			foreach ($_SESSION['orderCart'] as $productID=>$value) {
				array_push($id,$productID); 
			}
		}
		$id=implode(",",$id);
		$query = "SELECT  a.*
		FROM e4_posts a
		WHERE  a.id in ({$id})";
		$database->setQuery($query);
		$products = $database->loadObjectList();
		$total=0;
		foreach ($products as $product){
			$total_bandau += ($_SESSION['orderCart'][$product->id] * $product->product_sale);
			$total += ($_SESSION['orderCart'][$product->id] * $product->product_sale)+(($_SESSION['orderCart'][$product->id] * $product->product_sale) * $product->VAT)/100+($_SESSION['orderCart'][$product->id] * $product->Eco_tax);
		}
		
		//print_r($_SESSION['orderWishlist']);die;
		$count = count($id);
		?>
		<!DOCTYPE html>
		<html dir="ltr" lang="en">
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title><?= _CHECKOUT?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>

			<link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
			<link href="/templates/traid/catalog/view/javascript/jquery/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />
			<!-- icon font -->
			<link href="/templates/traid/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
			<link href="/templates/traid/catalog/view/javascript/ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />
			<!-- end icon font -->
			<!-- end -->
			<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/stylesheet.css" rel="stylesheet">
			<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/header/header1.css" rel="stylesheet">
			<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/theme.css" rel="stylesheet">
			<link href="/templates/traid/catalog/view/javascript/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
			<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
			<script src="/templates/traid/catalog/view/javascript/jquery/jquery-3.1.1.min.js" ></script>

			<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
			<script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
			<script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
			<script src="/templates/traid/catalog/view/javascript/common.js" ></script>
			<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
			<!-- Quick view -->
			<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
			<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script>
			<script src="/templates/traid/catalog/view/javascript/plaza/quickview/quickview.js" ></script>
			<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/quickview/quickview.css" rel="stylesheet" type="text/css" />
			<!-- General -->
			<!-- Sticky Menu -->
			<script >
				$(document).ready(function () {	
					var height_box_scroll = $('.scroll-fix').outerHeight(true);
					$(window).scroll(function () {
						if ($(this).scrollTop() > 800) {
							$('.scroll-fix').addClass("scroll-fixed");
							$('body').css('padding-top',height_box_scroll);
						} else {
							$('.scroll-fix').removeClass("scroll-fixed");
							$('body').css('padding-top',0);
						}
					});
				});
			</script>
			<!-- Scroll Top -->
			<script>
				$("#back-top").hide();
				$(function () {
					$(window).scroll(function () {
						if ($(this).scrollTop() > $('body').height()/3) {
							$('#back-top').fadeIn();
						} else {
							$('#back-top').fadeOut();
						}
					});
					$('#back-top').click(function () {
						$('body,html').animate({scrollTop: 0}, 800);
						return false;
					});
				});
			</script>
			<!-- Advance -->
			<!-- Bootstrap Js -->
			<script src="/templates/traid/catalog/view/javascript/bootstrap/js/bootstrap.min.js" ></script>
		</head> 

		<body class="checkout-cart">
			<div class="wrapper">
				<div id="back-top"><i class="ion-chevron-up"></i></div>
				<div id="header" class="header-absolute" >	
					<nav id="top" >
						<div class="container">
							<div class="static-nav"><?= $ariacms->web_information->{$params->slogan} ?></div>


						</div>
					</nav>
					<?= $ariacms->getBlock("header_traid"); ?>

				</div>



				<div id="checkout-cart" class="container">
					<ul class="breadcrumb">
						<li><a href="<?=$ariacms->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
						<li><a href=""><?= _CHECKOUT?></a></li>
					</ul>

					<div class="row">
						<div id="content" class="col-sm-9">
							<h1><?= _CHECKOUT?>
						</h1>

						<form name="checkout" method="post" class="checkout woocommerce-checkout" action="#" enctype="multipart/form-data">
							
							<fieldset id="account" style="width: 740px;">
								<legend><?= _BILLING_DETAILS?></legend>

								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-lastname"><?=_FULLNAME?></label>
									<div class="col-sm-10">
										<input type="text" name="fullname"  placeholder="<?=_FULLNAME?>" id="fullname" class="form-control" />
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-lastname"><?= _ADDRESS?></label>
									<div class="col-sm-10">
										<input type="text" name="address"  placeholder="<?= _ADDRESS?>" id="address" class="form-control" />
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-email"><?=_EMAIL?></label>
									<div class="col-sm-10">
										<input type="email" name="email"  placeholder="<?=_EMAIL?>" id="email" class="form-control" />
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-telephone"><?=_PHONE?></label>
									<div class="col-sm-10">
										<input type="tel" name="phone" placeholder="<?=_PHONE?>" id="phone" class="form-control" />
									</div>
								</div>

								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-telephone"><?= _CONTENT?></label>
									<div class="col-sm-10">
										<textarea  name="content"  id="phone" class="form-control" id="order_comments"   rows="3" cols="5">
										</textarea>
									</div>
								</div>
							</fieldset>
							




							
							<div class="row">
								<div class="col-sm-4 col-sm-offset-8">
									<h3 id="order_review_heading"><?= _YOUR_ORDER?></h3>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="text-right"><?= _PRODUCT?></th>
												<th class="text-right"><?= _SUBTOTAL?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($products as $product){?>			
												<tr class="cart_item">
													<td class="text-right">
														<?= $product->title_vi?>&nbsp;<strong class="product-quantity">&times;&nbsp;<?= $_SESSION['orderCart'][$product->id]?></strong>											
													</td>
													<td class="text-right">
														<span class="woocommerce-Price-amount amount">
															<bdi><span class="woocommerce-Price-currencySymbol"></span><?= $_SESSION['orderCart'][$product->id]* $product->product_sale?> VNĐ</bdi>
														</span>					
													</td>
												</tr>
											<?php }?>
										</tbody>

									</table>


									<table class="table table-bordered"> 
										<tr>
											<td class="text-right"><strong><?= _SUBTOTAL?>:</strong></td>
											<td class="text-right"><?=number_format($total_bandau)?> VNĐ</td>
										</tr>

										<tr>
											<td class="text-right"><strong><?=_TOTAL?></strong></td>
											<td class="text-right"><?=number_format($total)?> VNĐ</td>
										</tr>
									</table> 

									<div id="payment" class="woocommerce-checkout-payment">

										<div class="form-row place-order">						
											<div class="woocommerce-terms-and-conditions-wrapper">
												<div class="woocommerce-privacy-policy-text">
													<p><?= _Your_personal_data?></p>
												</div>
											</div>
											<input type="hidden" name="total" value="<?= $total?>">
											<button type="submit" class="button alt" name="btnSubmit" id="place_order" value="Place order" data-value="Place order"><?= _PLACE_ORDER?></button>

										</div>
									</div>
								

								</div>
							</div>



							
						</form>


						
						<script>
							function deleteCart(id){
								var f = "pid=" + id + "&type=delete";
								var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php?"+f;
								$.ajax({
									url: _url,
									data: f,
									cache: false,
									context: document.body,
									success: function(data) {
										alert("Xóa thành công ra giỏ hàng");
										location.reload();
									}
								});
							}
						</script>
						<script>
							function editCart(id){
								var quantity = $("#quantity_"+id).val();
								if (typeof quantity == "undefined"||quantity < 1){
									alert("Số lượng sản phẩn không được bé hơn 1");
									quantity = 1;
								}
								else{
									var f = "pid=" + id + "&type=edit&quantity="+quantity;
									var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php?"+f;
									$.ajax({
										url: _url,
										data: f,
										cache: false,
										context: document.body,
										success: function(data) {
											location.reload();
										}
									});
								}
							}
						</script>
<!-- <div class="buttons clearfix">
	<div class="pull-left"><a href="<?=$ariacms->actual_link?>/san-pham.html" class="btn btn-default">Continue Shopping</a></div>
	<div class="pull-right"><a href="<?=$ariacms->actual_link?>/giao-hang.html" class="btn btn-primary"><?=_PROCEED_TO_CHECKOUT?></a></div>
</div> -->
</div>
</div>
</div>	
<?= $ariacms->getBlock("footer_traid"); ?>	

</div>
</body>

</html>
<?php
}
}
?>
