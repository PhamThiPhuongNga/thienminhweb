<?php
class View
{
	static function viewhome()
	{
		global $ariacms;
		global $params;
		global $database;
		global $ariaConfig_template;
		?>
		<!DOCTYPE html>
		<html dir="ltr" lang="en">
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title><?= _VIEW_CART ?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>

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
						<li><a href=""><?= _YOUR_WISHLIST?></a></li>
					</ul>
					
					<?php if ($_SESSION['orderWishlist']) {
									$id= array();
									foreach ($_SESSION['orderWishlist'] as $productID=>$value) {
										array_push($id,$productID); 
									}
								}
								//print_r($_SESSION['orderWishlist']);die;
								$id=implode(",",$id);
								$count = count($id);
								$query = "SELECT  a.* FROM e4_posts a WHERE  a.id in ({$id})";
								$database->setQuery($query);
								$products = $database->loadObjectList();?>
					<div class="row">
						<div id="content" class="col-sm-12">
							<h1><?= _YOUR_WISHLIST?>
						</h1>

						<?php if($count ==0){?>
							<p class="cart-empty"> <?=_YOUR_WISHLIST." "._EMPTY?></p>
							<p class="return-to-shop">
								<a class="button wc-backward" href="<?= $ariacms->actual_link ?>"><?= _RETURN_TO_SHOP?></a>
							</p>
						<?php }else{?>




							<form action="" method="post" enctype="multipart/form-data">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<td class="text-center"><?=_Image?></td>
												<td class="text-center"><?=_PRODUCT_NAME?></td>
												
												<td class="text-center"><?=_UNIT_PRICE?></td>
											
											</tr>
										</thead>
										<tbody>
											<?php foreach($products as $product){?>
												<tr>
													<td class="text-center"> <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><img src="<?=$product->image_thumb?>" alt="<?=$product->{$params->title}?>" title="<?=$product->{$params->title}?>" class="img-thumbnail" /></a> </td>
													<td class="text-center"><a href=""><?=$product->{$params->title}?></a>                                  <br />
               <!--  <small>Delivery Date: 2011-04-22</small>                                  <br />
               	<small>Reward Points: 900</small>                 --> </td>
               	<!--  <td class="text-left">Product 21</td> -->
             
               		<td class="text-center"><?=number_format($product->product_sale+($product->product_sale*$product->VAT)/100+$product->Eco_tax)?> VNĐ <br />
               			<small><strong>Eco Tax:</strong> <?=$product->Eco_tax?> VNĐ/<?=_PRODUCT?></small>                                  <br />
               			<small><strong>VAT(%):</strong> <?=$product->VAT?> %</small> 
               		</td>
               		<td class="text-center">
																	<a href="" onclick="deleteWish(<?= $product->id?>)" name="tinvwl-remove" value="<?= $product->id?>" title="<?= _REMOVE?>"><b>X</b></a>
																</td>
               	</tr>
               <?php }?>
           </tbody>

       </table>
   </div>
</form>

<?php } ?>	
<script>
	function deleteWish(id){
		var f = "pid=" + id + "&type=delete";
		var _url = "<?= $ariacms->actual_link ?>ajax/ajax.wishlist.php?"+f;
		if(confirm("Bạn có chắc là muốn xóa không?")){
			$.ajax({
				url: _url,
				data: f,
				cache: false,
				context: document.body,
				success: function(data) {
					alert("Xóa thành công ra danh sách yêu thích");
					location.reload();
				}
			});
		}
	}
</script>

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