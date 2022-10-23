<?php
global $ariacms;
global $params;
global $database;
global $ariaConfig_template;
global $analytics_code;



$quantity =(trim($_REQUEST["quantity"]) != '' && trim($_REQUEST["quantity"]) != 'undefined') ? trim($_REQUEST["quantity"]) : 1;
$query = "SELECT * FROM `e4_posts` where post_type = 'product' order by rating desc limit 0,6";
$database->setQuery($query);
$products_rating = $database->loadObjectList();
$count_comment =0;

$query = "SELECT * FROM `e4_posts` where post_type = 'product' order by rating desc limit 0,6";
$database->setQuery($query);
$products_rating = $database->loadObjectList();

		// danh mục con
$query =  'SELECT c.id,c.parent FROM `e4_posts` a LEFT JOIN e4_term_relationships b on a.id = b.object_id LEFT JOIN e4_term_taxonomy c on c.id = b.term_taxonomy_id WHERE a.id = '.$detail[id].' and c.taxonomy = "product_category"';
$database->setQuery($query);
$category = $database->loadRow();
	//danh mục cha
$dad_category =  'SELECT id FROM `e4_term_taxonomy` WHERE parent = '.$category['parent'].' and taxonomy = "product_category"';

$query = "SELECT * FROM `e4_posts_image` where object_id =".$detail["id"] ;
$database->setQuery($query);
$products_image = $database->loadObjectList();

$query = "SELECT * FROM `e4_comment` where post_id = ".$detail[id]." order by id asc";
$database->setQuery($query);
$comments = $database->loadObjectList();
$comment_count =count($comments);

	// sản phẩm liên quan
$query = "SELECT a.* FROM `e4_posts` a where a.id in (select a.id from `e4_posts` a 
LEFT JOIN e4_term_relationships b on a.id = b.object_id 
LEFT JOIN e4_term_taxonomy c on c.id = b.term_taxonomy_id 
WHERE a.post_type = 'product' and a.id != {$detail['id']} and c.id in(".$dad_category.")) order by a.id desc limit 0,6";
$database->setQuery($query);
$products_recent = $database->loadObjectList();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$detail["title_vi"]?></title>
<base  />
<link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/product/zoom.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/swiper/css/swiper.min.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/plaza/cloudzoom/css/cloud-zoom.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/theme/default/stylesheet/plaza/swatches/swatches.css" type="text/css" rel="stylesheet" media="screen" />
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
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">
<script src="/templates/traid/catalog/view/javascript/jquery/jquery-2.1.1.min.js" ></script>

<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.jquery.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/swatches/swatches.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
<script src="/templates/traid/catalog/view/javascript/common.js" ></script>
<!-- <link href="aenean-luctus-non-metus.html" rel="canonical" /> -->
<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
<!-- Quick view -->
<!-- <script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script> -->
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



<body class="product-product">
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


		<div id="product-product" class="container">
			<ul class="breadcrumb">
				<li><a href="<?=$ariacms->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
				<li><a href="#"><?=$detail[$params->title]?></a></li>
			</ul>
			<div class="row">
				<div id="content" class="col-sm-12">


					<div class="product-details">	
						<div class="row"> 																

							<div class="col-sm-6 col-lg-6 product-image-details">
								<input type="hidden" id="check-use-zoom" value="<?=$detail['id']?>" />
								<input type="hidden" id="light-box-position" value="<?=$detail['id']?>" />
								<input type="hidden" id="product-identify" value="<?=$detail['id']?>" />
								<div class="lightbox-container"></div>
								<div class="product-zoom-image">
									
									<a href="<?=$detail['image']?>" class="cloud-zoom main-image" id="product-cloud-zoom" style="width: 600px; height: 600px;"
										rel=" showTitle: false ,
										zoomWidth:800,zoomHeight:800,
										position:'inside', adjustX: 0 ">
										<img src="<?=$detail['image']?>" title="<?=$detail[$params->title]?>" alt="<?=$detail[$params->title]?>" />
									</a>
								</div>
								<div class="additional-container">
									<div class="swiper-viewport">
										<div class="additional-images swiper-container">

											<div class="swiper-wrapper">
												<?php foreach ($images as $key => $image) {
													?>
													<div class="item swiper-slide">
														<a class="cloud-zoom-gallery sub-image" id="product-image-options-" href="<?=$image->image_link?>" title="Aenean luctus non metus"
															rel="useZoom: 'product-cloud-zoom', smallImage: '<?=$image->image_link?>'" data-pos="2">
															<img src="<?=$image->image_link?>" title="Aenean luctus non metus" alt="Aenean luctus non metus" />
														</a>
													</div>
												<?php } ?>
											</div>

										</div>
										<div class="swiper-pager">
											<div class="swiper-button-next additional-button-next"></div>
											<div class="swiper-button-prev additional-button-prev"></div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-sm-6 col-lg-6 product-info-details">
								<div class="inner">
									<h1><?=$detail[$params->title]?></h1>


									<p class="price">
										<span class="price-new"><?=$detail['product_sale']?> VNĐ</span> <span class="price-old"><?=$detail['product_price']?>VNĐ</span>
									</p>

									<ul class="list-unstyled">
										<li ><?=_PRODUCT_CATEGORY?>: <a href=""><?php if($_SESSION['steam_lang'] == en){echo $detail['danhmuc_en'] ;}
										else {
											echo $detail['danhmuc_vi'];
										}?></a></li>
										<?php if($detail['post_status']=='active') { ?>
										<li><?=_STATUS?>: <span><?=_IN_STOCK?></span></li>
								        	<?php } else {?>
                                        <li><?=_STATUS?>: <span><?=_OUT_OF_STOCK?></span></li>
								        	<?php } ?>	
										<li>
											<hr>
										</li>
										 <div class="woocommerce-product-rating">
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:<?=($detail['rating']/5)*100?>%">
                                            	<?=$detail['rating']?> stars rating
                                            </div>
											<a href="" class="woocommerce-review-link" rel="nofollow">(<span class="count"><?= $comment_count?></span> customer review)</a></div>
									</ul>

									<div id="product"> 								


																		
												
													<div class="form-group">
														<label class="control-label" for="input-quantity"><?=_QUANTITY?></label>
														<input type="text" name="quantity" value="<?= $quantity?>" size="2" id="input-quantity" class="form-control" />
														<input type="hidden" name="product_id" value="<?=$detail['id']?>" /> 
														<label class="control-label" for="input-quantity">Kg</label>
														<button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block" onclick="addCart(<?=$detail['id']?>)"><?=_ADD_TO_CART?>
															
														</button>
                                            
														<div class="btn-group">
															<button type="button"  class="btn btn-default btn-wishlist" title="Add to Wish List" onclick="addWish(<?=$detail['id']?>)"> <?=_ADD_TO_WISHLIST?></button>
														</div>
                                                        <?php //unset($_SESSION['orderCart']);
                                                        //print_r($_SESSION['orderCart']); ?>
													</div>
												</div>
											

												</div>
											</div>
										</div>
									</div>
									<div class="product-info-details-more">
										<div class="inner">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab-description" data-toggle="tab"><?= _DESCRIPTION?></a></li>
												<!-- <li><a href="#tab-specification" data-toggle="tab">Specification</a></li> -->
												<li><a href="#tab-review" data-toggle="tab"> <?= _REVIEWS?> (<?= $comment_count?>)  </a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab-description">
													<?php if($_SESSION['steam_lang'] == en){echo $detail['content_en'] ;}
										else {
											echo $detail['content_vi'];
										}?>
												</div>
											<!-- 	<div class="tab-pane" id="tab-specification">
													<table class="table table-bordered">
														<thead>
															<tr>
																<td colspan="2"><strong>Processor</strong></td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Clockspeed</td>
																<td>100mhz</td>
															</tr>
														</tbody>
													</table>
												</div> -->
												<div class="tab-pane" id="tab-review">
													
														<div id="review"></div>
														<h2><?=_Add_a_review?></h2>
														<form class="form-horizontal"  method="post" id="commentform">
														<div class="form-group required">
															<div class="col-sm-12">
																<label class="control-label" for="input-name" ><?=_FULLNAME?></label>
																<input type="text"  value="" id="name" name="name" class="form-control" />
															</div>
														</div>
														<div class="form-group required">
															<div class="col-sm-12">
																<label class="control-label" for="" ><?=_EMAIL?></label>
																<input type="text"  value="" id="email" name="email" class="form-control" />
															</div>
														</div>
														<div class="form-group required">
															<div class="col-sm-12">
																<label class="control-label" for="input-review"><?=_Your_review?></label>
																<textarea rows="10"  class="form-control id="content" name="content""></textarea>
																<div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
															</div>
														</div>
														<div class="form-group required">
															<div class="col-sm-12">
																<label class="control-label" id="rating" name="rating"><?=_Your_rating?></label>
																&nbsp;&nbsp;&nbsp; Bad&nbsp;
																<input type="radio" name="rating" value="1" />
																&nbsp;
																<input type="radio" name="rating" value="2" />
																&nbsp;
																<input type="radio" name="rating" value="3" />
																&nbsp;
																<input type="radio" name="rating" value="4" />
																&nbsp;
																<input type="radio" name="rating" value="5" />
															&nbsp;Good</div>
														</div>

														<div class="buttons clearfix">
								
															<div class="pull-right">
																<button type="submit" id="submit" onclick="comment(<?= $detail['id']?>);" name="submit" class="btn btn-primary"><?= _Submit?></button>
															</div>
														</div>
													</form>
												</div>
												<script>
													function comment(id){
														
														var rating = $("#rating").val();
														if ( rating < 1) {													  
														    return;
														}
														
														var content = $("#content").val();
														if ( content == "") {
														   alert("Bạn chưa điền comment");
														   document.getElementById("content").focus();
														    return;
														}
														
														var name = $("#name").val();
														if (name == "") {
														   alert("Bạn chưa điền tên");
														   document.getElementById("name").focus();
														    return;
														   
														}
														
														var mail = $("#email").val();
														if (!mail.includes("@")) {
														   alert("Bạn chưa điền mail");
														    document.getElementById("email").focus();
														   return;
														}												
														var f = "id=" + id + "&rating=" + rating + "&content=" + content+"&name=" + name+"&mail=" + mail;
														var _url = "<?= $ariacms->actual_link ?>ajax/ajax.comment.php?"+f;
														$.ajax({
															url: _url,
															data: f,
															cache: false,
															context: document.body,
															success: function(data) {
																alert("Đánh giá thành công");
																$("#review").html(data);
															}
														});
													}
												</script>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>  

						<?= $ariacms->getBlock("footer_traid");?>
					</div> 
				</body>
				</html>







